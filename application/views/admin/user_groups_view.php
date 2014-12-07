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
                <h3 class="page-header">Manage User Groups</h3>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
                <a href="<?php echo base_url(); ?>admin/insert_user_group" class="btn btn-block btn-social btn-bitbucket">
                    <i class="fa fa-plus"></i> Insert New User Group
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Groups
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php echo form_open(current_url()); ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Description</th>
                                        <th>Is Admin Group</th>
                                        <th>User Group Privileges</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    <?php foreach ($user_groups as $group) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/update_user_group/<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')]; ?>">
                                                    <?php echo $group[$this->flexi_auth->db_column('user_group', 'name')]; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $group[$this->flexi_auth->db_column('user_group', 'description')]; ?></td>
                                            <td><?php echo ($group[$this->flexi_auth->db_column('user_group', 'admin')] == 1) ? "Yes" : "No"; ?></td>
                                            <td><a href="<?php echo base_url() . 'admin/update_group_privileges/' . $group[$this->flexi_auth->db_column('user_group', 'id')]; ?>">Manage</a></td>
                                            <td>
                                                <?php if ($this->flexi_auth->is_privileged('Delete User Groups')) { ?>
                                                    <input type="checkbox" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')]; ?>]" value="1"/>
                                                <?php } else { ?>
                                                    <input type="checkbox" disabled="disabled"/>
                                                    <small>Not Privileged</small>
                                                    <input type="hidden" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')]; ?>]" value="0"/>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><br>
                                            <?php $disable = (!$this->flexi_auth->is_privileged('Update User Groups') && !$this->flexi_auth->is_privileged('Delete User Groups')) ? 'disabled="disabled"' : NULL; ?>
                                            <input type="submit" name="submit" value="Delete Checked User Groups" class="btn btn-primary" <?php echo $disable; ?>/>
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

