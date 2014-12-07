<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-info">
                <?php if (!empty($message)) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <div class="panel-heading">
                    <h3 class="panel-title">New Registration</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url()); ?>
                    <fieldset>
                        <div class="form-group">
                            <input type="text" id="first_name" name="register_first_name" value="<?php echo set_value('register_first_name'); ?>" class="form-control" placeholder="First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" id="last_name" name="register_last_name" value="<?php echo set_value('register_last_name'); ?>" class="form-control" placeholder="Last Name"/>
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="text" id="phone_number" name="register_phone_number" value="<?php echo set_value('register_phone_number'); ?>" class="form-control" placeholder="Phone Number"/>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="newsletter" name="register_newsletter" value="1" <?php echo set_checkbox('register_newsletter',1);?> />Subscribe to Newsletter
                                </label>
                            </div>                             
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="text" id="email_address" name="register_email_address" value="<?php echo set_value('register_email_address'); ?>" class="form-control" placeholder="Email Address"/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="username" name="register_username" value="<?php echo set_value('register_username'); ?>" class="form-control" placeholder="IC number"/>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="register_password" value="<?php echo set_value('register_password'); ?>" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirm_password" name="register_confirm_password" value="<?php echo set_value('register_confirm_password'); ?>" class="form-control" placeholder="Confirm Password"/>
                        </div>
                        <div class="form-group">
                            <?php
                            if (isset($captcha)) {
                                echo "<div>\n";
                                echo $captcha;
                                echo "</div>\n";
                            }
                            ?>
                        </div>


                        <input type="submit" name="register_user" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block"/>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div style="text-align: right;">
                Already registered? <a href="<?php echo base_url() ?>">Log In</a>
            </div>            
        </div>
    </div>
</div>