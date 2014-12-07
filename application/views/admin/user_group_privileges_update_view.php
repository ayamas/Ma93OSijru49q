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
                <h3 class="page-header">Update User Group Privileges of Group '<?php echo $group['ugrp_name']; ?>'</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Group Privileges
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php echo form_open(current_url()); ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Privilege Name</th>
                                        <th>Description</th>
                                        <th>User Has Privilege</th>
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
                                                $current_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges)) ? 1 : 0;
                                                $new_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges)) ? 'checked="checked"' : NULL;
                                                ?>
                                                <input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][current_status]" value="<?php echo $current_status ?>"/>
                                                <input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][new_status]" value="0"/>
                                                <input type="checkbox" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][new_status]" value="1" <?php echo $new_status ?>/>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><br>
                                            <button type="submit" name="update_group_privilege" id="submit" value="Update Group Privileges" class="btn btn-outline btn-default">Update User Privileges</button>
                                            <a href="<?php echo base_url(); ?>admin/manage_user_groups" class="btn btn-outline btn-default">Cancel</a>
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

