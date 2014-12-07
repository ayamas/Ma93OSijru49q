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
                <h3 class="page-header">Insert User Group</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Insert New User Group
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="group">Group Name</label>
                                    <input type="text" id="group" name="insert_group_name" value="<?php echo set_value('insert_group_name');?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Group Description</label>
                                    <textarea id="description" name="insert_group_description" class="form-control" rows="3"><?php echo set_value('insert_group_description');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Is Admin Group?</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="admin" name="insert_group_admin" value="1" <?php echo set_checkbox('insert_group_admin',1);?> />Yes
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" name="insert_user_group" id="submit" value="Submit" class="btn btn-outline btn-default">Insert User Group</button>
                        <a href="<?php echo base_url(); ?>admin/manage_user_groups" class="btn btn-outline btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

