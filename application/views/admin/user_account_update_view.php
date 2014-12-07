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
                <h3 class="page-header">Update Account of <?php echo $user['upro_first_name'] . ' ' . $user['upro_last_name']; ?></h3>
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
                                    <input type="text" id="first_name" name="update_first_name" value="<?php echo set_value('update_first_name',$user['upro_first_name']);?>" class="form-control" />
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
                                    <label for="email_address">Email Address</label>
                                    <input type="text" id="email_address" name="update_email_address" value="<?php echo set_value('update_email_address', $user[$this->flexi_auth->db_column('user_acc', 'email')]); ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="update_username" value="<?php echo set_value('update_username', $user[$this->flexi_auth->db_column('user_acc', 'username')]); ?>" class="form-control" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="group">Group:</label>
                                    <select id="group" name="update_group" class="form-control">
                                                <?php foreach ($groups as $group) { ?>
                                                    <?php $user_group = ($group[$this->flexi_auth->db_column('user_group', 'id')] == $user[$this->flexi_auth->db_column('user_acc', 'group_id')]) ? TRUE : FALSE; ?>
                                            <option value="<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')]; ?>" <?php echo set_select('update_group', $group[$this->flexi_auth->db_column('user_group', 'id')], $user_group); ?>>
                                                <?php echo $group[$this->flexi_auth->db_column('user_group', 'name')]; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Privileges</label><br>
                                    <a href="<?php echo base_url().'admin/update_user_privileges/'.$user[$this->flexi_auth->db_column('user_acc', 'id')];?>">Manage User Privileges</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="update_users_account" id="submit" value="Submit" class="btn btn-outline btn-default">Update Profile</button>
                        <a href="<?php echo base_url(); ?>admin/manage_user_accounts" class="btn btn-outline btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

