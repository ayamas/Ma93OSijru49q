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
                <h3 class="page-header">Password Management</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" value="<?php echo set_value('current_password'); ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" id="new_password" name="new_password" value="<?php echo set_value('new_password'); ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirm New Password:</label>
                                    <input type="password" id="confirm_new_password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password'); ?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="change_password" id="submit" value="Submit" class="btn btn-outline btn-default">Change Password</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>