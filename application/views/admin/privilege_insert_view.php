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
                <h3 class="page-header">Insert New Privilege</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Insert New Privilege
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="privilege">Privilege Name</label>
                                    <input type="text" id="privilege" name="insert_privilege_name" value="<?php echo set_value('insert_privilege_name'); ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Privilege Description</label>
                                    <textarea id="description" name="insert_privilege_description" class="form-control" rows="3"><?php echo set_value('insert_privilege_description'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="insert_privilege" id="submit" value="Submit" class="btn btn-outline btn-default">Insert New Privilege</button>
                        <a href="<?php echo base_url(); ?>admin/manage_privileges" class="btn btn-outline btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>