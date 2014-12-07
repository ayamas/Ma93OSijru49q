<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();

        // To load the CI benchmark and memory usage profiler - set 1==1.
        if (1 == 2) {
            $sections = array(
                'benchmarks' => TRUE, 'memory_usage' => TRUE,
                'config' => TRUE, 'controller_info' => TRUE, 'get' => TRUE, 'post' => TRUE, 'queries' => TRUE,
                'uri_string' => TRUE, 'http_headers' => TRUE, 'session_data' => TRUE
            );
            $this->output->set_profiler_sections($sections);
            $this->output->enable_profiler(TRUE);
        }

        // Load required CI libraries and helpers.
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');
        $this->load->library('Layouts');

        // Redirect users logged in via password (However, not 'Remember me' users, as they may wish to login properly).
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            // Preserve any flashdata messages so they are passed to the redirect page.
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }

            // Redirect logged in admins (For security, admin users should always sign in via Password rather than 'Remember me'.
            if ($this->flexi_auth->is_admin()) {
                redirect('admin/dashboard');
            } else {
                redirect('member/dashboard');
            }
        }

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Login / Registration
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

    /**
     * index
     * Forwards to 'login'.
     */
    function index() {
        $this->login();
    }

    /**
     * login
     * Login page used by all user types to log into their account.
     * Users without an account can register for a new account.
     * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
     */
    function login() {  
        
        // If 'Login' form has been submited, attempt to log the user in.
        if ($this->input->post('login_user')) {
            $this->load->model('auth_model');
            $this->auth_model->login();
        }

        // CAPTCHA
        // Check whether there are any existing failed login attempts from the users ip address and whether those attempts have exceeded the defined threshold limit.
        // If the user has exceeded the limit, generate a 'CAPTCHA' that the user must additionally complete when next attempting to login.
        if ($this->flexi_auth->ip_login_attempts_exceeded()) {
            $this->data['captcha'] = $this->flexi_auth->recaptcha(TRUE);
        }

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        
        // Set the page title
        $this->layouts->set_title('Welcome');
        
        // Include any css that needed. This is chained method, so just add all file like below
        $this->layouts->add_css('assets/css/bootstrap.css')
                      ->add_css('assets/css/sb-admin-2.css');
        
        // Include any js that needed
        $this->layouts->add_js('assets/js/jquery.js')
                      ->add_js('assets/js/bootstrap.min.js');
        
        $this->layouts->viewPublic('public/login_view', $this->data);
    }


    /**
     * register_account
     * User registration page used by all new users wishing to create an account.
     * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
     */
    function register_account() {
        // Redirect user away from registration page if already logged in.
        if ($this->flexi_auth->is_logged_in()) {
            redirect('auth');
        }
        // If 'Registration' form has been submitted, attempt to register their details as a new account.
        else if ($this->input->post('register_user')) {
            $this->load->model('auth_model');
            $this->auth_model->register_account();
        }
        
        // Always show captcha during registration
        $this->data['captcha'] = $this->flexi_auth->recaptcha(TRUE);

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        // Set the page title
        $this->layouts->set_title('Register New Account');
        
        // Include any css that needed. This is chained method, so just add all file like below
        $this->layouts->add_css('assets/css/bootstrap.css')
                      ->add_css('assets/css/sb-admin-2.css');
        
        // Include any js that needed
        $this->layouts->add_js('assets/js/jquery.js')
                      ->add_js('assets/js/bootstrap.min.js');
        
        $this->layouts->viewPublic('public/register_view', $this->data);
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Account Activation
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

    /**
     * activate_account
     * User account activation via email.
     */
    function activate_account($user_id, $token = FALSE) {
        // The 3rd activate_user() parameter verifies whether to check '$token' matches the stored database value.
        // This should always be set to TRUE for users verifying their account via email.
        // Only set this variable to FALSE in an admin environment to allow activation of accounts without requiring the activation token.
        $this->flexi_auth->activate_user($user_id, $token, TRUE);

        // Save any public status or error messages (Whilst suppressing any admin messages) to CI's flash session data.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    /**
     * resend_activation_token
     * Resend user an activation token via email.
     * If a user has not received/lost their account activation email, they can request a new activation email to be sent to them.
     */
    function resend_activation_token() {
        // If the 'Resend Activation Token' form has been submitted, resend the user an account activation email.
        if ($this->input->post('send_activation_token')) {
            $this->load->model('auth_model');
            $this->auth_model->resend_activation_token();
        }

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        
        // Set the page title
        $this->layouts->set_title('Resend Activation Token');
        
        // Include any css that needed. This is chained method, so just add all file like below
        $this->layouts->add_css('assets/css/bootstrap.css')
                      ->add_css('assets/css/sb-admin-2.css');
        
        // Include any js that needed
        $this->layouts->add_js('assets/js/jquery.js')
                      ->add_js('assets/js/bootstrap.min.js');
        
        $this->layouts->viewPublic('public/resend_activation_token_view', $this->data);
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Forgotten Password
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

    /**
     * forgotten_password
     * Send user an email to verify their identity. Via a unique link in this email, the user is redirected to the site so they can then reset their password.
     *
     * Note: This is step 1 of an example of allowing users to reset a forgotten password manually. 
     * See the auto_reset_forgotten_password() function below for an example of directly emailing the user a new randomised password.
     */
    function forgotten_password() {
        // If the 'Forgotten Password' form has been submitted, then email the user a link to reset their password.
        if ($this->input->post('send_forgotten_password')) {
            $this->load->model('auth_model');
            $this->auth_model->forgotten_password();
        }

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        // Set the page title
        $this->layouts->set_title('Forgot Password');
        
        // Include any css that needed. This is chained method, so just add all file like below
        $this->layouts->add_css('assets/css/bootstrap.css')
                      ->add_css('assets/css/sb-admin-2.css');
        
        // Include any js that needed
        $this->layouts->add_js('assets/js/jquery.js')
                      ->add_js('assets/js/bootstrap.min.js');
        
        $this->layouts->viewPublic('public/forgot_password_view', $this->data);
    }

    /**
     * manual_reset_forgotten_password
     * This is step 2 (The last step) of an example of allowing users to reset a forgotten password manually. 
     * See the auto_reset_forgotten_password() function below for an example of directly emailing the user a new randomised password.
     * In this demo, this page is accessed via a link in the 'views/includes/email/forgot_password.tpl.php' email template, which must be set to 'auth/manual_reset_forgotten_password/...'.
     */
    function manual_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        // If the 'Change Forgotten Password' form has been submitted, then update the users password.
        if ($this->input->post('change_forgotten_password')) {
            $this->load->model('auth_model');
            $this->auth_model->manual_reset_forgotten_password($user_id, $token);
        }

        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        $this->load->view('demo/public_examples/forgot_password_update_view', $this->data);
    }

    /**
     * auto_reset_forgotten_password
     * This is an example of automatically reseting a users password as a randomised string that is then emailed to the user. 
     * See the manual_reset_forgotten_password() function above for the manual method of changing a forgotten password.
     * In this demo, this page is accessed via a link in the 'views/includes/email/forgot_password.tpl.php' email template, which must be set to 'auth/auto_reset_forgotten_password/...'.
     */
    function auto_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        // forgotten_password_complete() will validate the token exists and reset the password.
        // To ensure the new password is emailed to the user, set the 4th argument of forgotten_password_complete() to 'TRUE' (The 3rd arg manually sets a new password so set as 'FALSE').
        // If successful, the password will be reset and emailed to the user.
        $this->flexi_auth->forgotten_password_complete($user_id, $token, FALSE, TRUE);

        // Set a message to the CI flashdata so that it is available after the page redirect.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Logout
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

    /**
     * logout
     * This example logs the user out of all sessions on all computers they may be logged into.
     * In this demo, this page is accessed via a link on the demo header once a user is logged in.
     */
    function logout() {
        // By setting the logout functions argument as 'TRUE', all browser sessions are logged out.
        $this->flexi_auth->logout(TRUE);

        // Set a message to the CI flashdata so that it is available after the page redirect.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    /**
     * logout_session
     * This example logs the user only out of their CURRENT browser session (e.g. Internet Cafe), but no other logged in sessions (e.g. Home and Work).
     * In this demo, this controller method is actually not linked to. It is included here as an example of logging a user out of only their current session.
     */
    function logout_session() {
        // By setting the logout functions argument as 'FALSE', only the current browser session is logged out.
        $this->flexi_auth->logout(FALSE);

        // Set a message to the CI flashdata so that it is available after the page redirect.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */