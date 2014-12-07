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
                <h3 class="page-header">Update Privilege</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Privilege
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="privilege">Privilege Name</label>
                                    <input type="text" id="privilege" name="update_privilege_name" value="<?php echo set_value('update_privilege_name', $privilege[$this->flexi_auth->db_column('user_privileges', 'name')]);?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Privilege Description:</label>
                                    <textarea id="description" name="update_privilege_description" class="form-control" rows="3"><?php echo set_value('update_privilege_description', $privilege[$this->flexi_auth->db_column('user_privileges', 'description')]);?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="update_privilege" id="submit" value="Submit" class="btn btn-outline btn-default">Update Privilege</button>
                        <a href="<?php echo base_url(); ?>admin/manage_privileges" class="btn btn-outline btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>