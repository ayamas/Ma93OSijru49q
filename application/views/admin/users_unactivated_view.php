<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">User Accounts Not Activated in 31 Days</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Show function used to return all accounts that have not been activated within 31 days since registation. All accounts listed can then optionally be deleted.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($message)) { ?>
                    <div id="message">
                        <br>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Accounts Not Activated in 31 Days
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th class="text-center">User Group</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <?php if (!empty($users)) { ?>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/update_user_account/<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>">
                                                    <?php echo $user[$this->flexi_auth->db_column('user_acc', 'email')]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $user['upro_first_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['upro_last_name']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $user[$this->flexi_auth->db_column('user_group', 'name')]; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo ($user[$this->flexi_auth->db_column('user_acc', 'active')] == 1) ? 'Active' : 'Inactive'; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><br>
                                            <input type="submit" name="delete_unactivated" value="Delete Listed Users" class="btn btn-primary"/>
                                        </td>
                                    </tr>
                                </tfoot>
                            <?php } else { ?>
                                <tbody>
                                    <tr>
                                        <td colspan="5">
                                            No users are available.
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>