<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><?php echo $page_title; ?></h3>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($status) && $status == 'failed_login_users') { ?>
                    <p>Show database to display all user accounts that have a high number of failed login attempts since the users last successful login. Such data could be used to highlight potential brute force hacking attempts on user accounts.</p>
                <?php } else { ?>
                    <?php if (isset($status) && $status == 'active_users') { ?>
                        <p>Show database query to display all users that have activated their account since registration.</p>
                    <?php } else { ?>
                        <p>Show database query to display all users that have not activated their account since registration.</p>
                    <?php } ?>
                <?php } ?>
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
                        <?php echo $page_title; ?>
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
                                    <?php if (isset($status) && $status == 'failed_login_users') { ?>
                                        <th class="text-center"
                                            title="The number of consecutive failed login attempts made since the user last successfully logged in.">
                                            Failed Attempts</th>
                                    <?php } ?>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <?php if (!empty($users)) { ?>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo $base_url; ?>auth_admin/update_user_account/<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>">
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
                                            <?php if (isset($status) && $status == 'failed_login_users') { ?>
                                                <td class="text-center">
                                                    <?php echo $user[$this->flexi_auth->db_column('user_acc', 'failed_logins')]; ?>
                                                </td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <?php echo ($user[$this->flexi_auth->db_column('user_acc', 'active')] == 1) ? 'Active' : 'Inactive'; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <tr>
                                        <td colspan="<?php echo (isset($status) && $status == 'failed_login_users') ? '6' : '5'; ?>">
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