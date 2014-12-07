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
                <h3 class="page-header">Manage User Privileges</h3>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
                <a href="<?php echo base_url(); ?>admin/insert_privilege" class="btn btn-block btn-social btn-bitbucket">
                    <i class="fa fa-plus"></i> Insert New Privilege
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Privileges
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php echo form_open(current_url()); ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Privilege Name</th>
                                        <th>Description</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    <?php foreach ($privileges as $privilege) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/update_privilege/<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>">
                                                    <?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'name')]; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'description')]; ?></td>
                                            <td><?php if ($this->flexi_auth->is_privileged('Delete Users')) { ?>
                                                    <input type="checkbox" name="delete_privilege[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>]" value="1"/>
                                                <?php } else { ?>
                                                    <input type="checkbox" disabled="disabled"/>
                                                    <small>Not Privileged</small>
                                                    <input type="hidden" name="delete_privilege[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>]" value="0"/>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><br>
                                            <?php $disable = (!$this->flexi_auth->is_privileged('Update Privileges') && !$this->flexi_auth->is_privileged('Delete Privileges')) ? 'disabled="disabled"' : NULL; ?>
                                            <input type="submit" name="submit" value="Delete Checked Privileges" class="btn btn-primary" <?php echo $disable; ?>/>
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

