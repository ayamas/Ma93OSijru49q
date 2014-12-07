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
                <h3 class="page-header">Update User Group</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update User Group
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="group">Group Name</label>
                                    <input type="text" id="group" name="update_group_name" value="<?php echo set_value('update_group_name', $group[$this->flexi_auth->db_column('user_group', 'name')]); ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Group Description</label>
                                    <textarea id="description" name="update_group_description" class="form-control" rows="3"><?php echo set_value('update_group_description', $group[$this->flexi_auth->db_column('user_group', 'description')]); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php $ugrp_admin = ($group[$this->flexi_auth->db_column('user_group', 'admin')] == 1); ?>
                                    <label>Is Admin Group?</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="admin" name="update_group_admin" value="1" <?php echo set_checkbox('update_group_admin', 1, $ugrp_admin); ?> />Yes
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="admin" style="padding-right: 20px;">User Group Privileges</label>
                                    <a href="<?php echo base_url(); ?>admin/update_group_privileges/<?php echo $group['ugrp_id']; ?>">Manage Privileges for this User Group</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="update_user_group" id="submit" value="Submit" class="btn btn-outline btn-default">Update Profile</button>
                        <a href="<?php echo base_url(); ?>admin/manage_user_groups" class="btn btn-outline btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

