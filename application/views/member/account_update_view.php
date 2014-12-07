<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($message)) { ?>
                    <div id="message">
                        <br>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <h3 class="page-header">User Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update User Profile
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="update_first_name" value="<?php echo set_value('update_first_name', $user['upro_first_name']); ?>" class="form-control" />
                                </div>                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="update_last_name" value="<?php echo set_value('update_last_name', $user['upro_last_name']); ?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Phone Number</label>                                    
                                    <input type="text" id="phone_number" name="update_phone_number" value="<?php echo set_value('update_phone_number', $user['upro_phone']); ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <?php $newsletter = ($user['upro_newsletter'] == 1); ?>
                                            <input type="checkbox" id="newsletter" name="update_newsletter" value="1" <?php echo set_checkbox('update_newsletter', 1, $newsletter); ?>/>Subscribe to Newsletter
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" id="email" name="update_email" value="<?php echo set_value('update_email', $user[$this->flexi_auth->db_column('user_acc', 'email')]); ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="update_username" value="<?php echo set_value('update_username', $user[$this->flexi_auth->db_column('user_acc', 'username')]); ?>" class="form-control" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Password</label><br>
                                    <a href="<?php echo base_url(); ?>member/change_password">Click here to change your password</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="update_account" id="submit" value="Submit" class="btn btn-outline btn-default">Update Profile</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

