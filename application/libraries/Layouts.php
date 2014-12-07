<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Layouts Class. PHP5 only.
 *
 */
class Layouts {

    private $CI;
    private $title_for_layout = NULL;
    private $title_separator = ' | ';
    private $includes = array();

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function set_title($title) {
        $this->title_for_layout = $title;
    }

    public function viewPublic($view_name, $params = array(), $layout = 'public') {
        // Handle the site's title. If NULL, don't add anything. If not, add a 
        // separator and append the title.
        if ($this->title_for_layout !== NULL) {
            $separated_title_for_layout = $this->title_separator . $this->title_for_layout;
        }

        // Load the view's content, with the params passed
        $view_content = $this->CI->load->view($view_name, $params, TRUE);

        // Now load the layout, and pass the view we just rendered
        $this->CI->load->view('layouts/' . $layout, array(
            'content_for_layout' => $view_content,
            'title_for_layout' => $separated_title_for_layout
        ));
    }
    
    public function viewMember($view_name, $params = array(), $layout = 'member') {
        // Handle the site's title. If NULL, don't add anything. If not, add a 
        // separator and append the title.
        if ($this->title_for_layout !== NULL) {
            $separated_title_for_layout = $this->title_separator . $this->title_for_layout;
        }

        // Load the view's content, with the params passed
        $view_content = $this->CI->load->view($view_name, $params, TRUE);

        // Now load the layout, and pass the view we just rendered
        $this->CI->load->view('layouts/' . $layout, array(
            'content_for_layout' => $view_content,
            'title_for_layout' => $separated_title_for_layout
        ));
    }
    
    public function viewAdmin($view_name, $params = array(), $layout = 'admin') {
        // Handle the site's title. If NULL, don't add anything. If not, add a 
        // separator and append the title.
        if ($this->title_for_layout !== NULL) {
            $separated_title_for_layout = $this->title_separator . $this->title_for_layout;
        }

        // Load the view's content, with the params passed
        $view_content = $this->CI->load->view($view_name, $params, TRUE);

        // Now load the layout, and pass the view we just rendered
        $this->CI->load->view('layouts/' . $layout, array(
            'content_for_layout' => $view_content,
            'title_for_layout' => $separated_title_for_layout
        ));
    }

    public function add_css($path, $prepend_base_url = TRUE) {
        if ($prepend_base_url) {
            $this->includes[] = base_url() . $path;
        } else {
            $this->includes[] = $path;
        }

        return $this; // This allows chain-methods
    }
    
    public function add_js($path, $prepend_base_url = TRUE) {
        if ($prepend_base_url) {
            $this->includes[] = base_url() . $path;
        } else {
            $this->includes[] = $path;
        }

        return $this; // This allows chain-methods
    }

    public function print_css() {
        // Initialize a string that will hold all includes
        $final_css = '';

        foreach ($this->includes as $include) {
            if (preg_match('/css$/', $include)) {
                $final_css .= '<link href="' . $include . '" rel="stylesheet" type="text/css" />'."\n";
            }
        }
        return $final_css;
    }
    
    public function print_js() {
        // Initialize a string that will hold all includes
        $final_js = '';

        foreach ($this->includes as $include) {
            if (preg_match('/js$/', $include)) {
                $final_js .= '<script type="text/javascript" src="' . $include . '"></script>'."\n";
            }
        }
        return $final_js;
    }

}
