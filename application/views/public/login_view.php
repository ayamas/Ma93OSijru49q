<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-info">
                <?php if (!empty($message)) { ?>
                    <div id="message">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url()); ?>
                    <fieldset>
                        <div class="form-group">
                            <input type="text" id="identity" name="login_identity" value="<?php echo set_value('login_identity'); ?>" class="form-control" autofocus placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="login_password" value="<?php echo set_value('login_password'); ?>" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>Remember Me
                            </label>
                        </div>
                        <div class="form-group">
                            <?php
                            if (isset($captcha)) {
                                echo $captcha;
                            }
                            ?>
                        </div>
                        <input type="submit" name="login_user" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block"/>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div style="text-align: right;">
                New User? <a href="<?php echo base_url() ?>auth/register_account">Register New Account</a><br>
                Lost your password? <a href="<?php echo base_url() ?>auth/forgotten_password">Reset Password</a><br>
                Need to reactivate your account? <a href="<?php echo base_url() ?>auth/resend_activation_token">Send New Activation Token</a>
            </div>            
        </div>
    </div>
</div>