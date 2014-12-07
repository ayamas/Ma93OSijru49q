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
                <h3 class="page-header">Update User Privileges of '<?php echo $user['upro_first_name'] . ' ' . $user['upro_last_name']; ?>', Member of Group '<?php echo $user['ugrp_name']; ?>'</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Privileges
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php echo form_open(current_url()); ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Privilege Name</th>
                                        <th>Description</th>
                                        <th>User Has Individual Privilege</th>
                                        <th>Has Privilege From User Group</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    <?php foreach ($privileges as $privilege) { ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][id]" value="<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>"/>
                                                <?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'name')]; ?>
                                            </td>
                                            <td><?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'description')]; ?></td>
                                            <td>
                                                <?php
                                                // Define form input values.
                                                $current_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $user_privileges)) ? 1 : 0;
                                                $new_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $user_privileges)) ? 'checked="checked"' : NULL;
                                                ?>
                                                <input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][current_status]" value="<?php echo $current_status ?>"/>
                                                <input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][new_status]" value="0"/>
                                                <input type="checkbox" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][new_status]" value="1" <?php echo $new_status ?>/>
                                            </td>
                                            <td><?php echo (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges) ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><br>
                                            <button type="submit" name="update_user_privilege" id="submit" value="Update User Privileges" class="btn btn-outline btn-default">Update User Privileges</button>
                                            <a href="<?php echo base_url(); ?>admin/manage_user_accounts" class="btn btn-outline btn-default">Cancel</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

