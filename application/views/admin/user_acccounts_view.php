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
                <h3 class="page-header">Manage User Accounts</h3>
            </div>
        </div>
        <div class="row">
            <?php echo form_open(current_url()); ?>
            <div class="col-md-4 col-md-offset-8">
                <div class="input-group custom-search-form">
                    <input type="text" id="search" name="search_query" value="<?php echo set_value('search_users', $search_query); ?>" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" value="Search" name="search_users" />
                    </span>
                </div>          
            </div>
            <?php echo form_close(); ?>
        </div><br>
        <div class="row">
            <?php echo form_open(current_url()); ?>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Users
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Group</th>
                                        <th>User Privileges</th>
                                        <th>Account Suspended</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($users)) { ?>
                                    <tbody>
                                        <?php foreach ($users as $user) { ?>
                                            <tr>
                                                <td><a href="<?php echo base_url() . 'admin/update_user_account/' . $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>">
                                                        <?php echo $user[$this->flexi_auth->db_column('user_acc', 'email')]; ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $user['upro_first_name']; ?></td>
                                                <td><?php echo $user['upro_last_name']; ?></td>
                                                <td><?php echo $user[$this->flexi_auth->db_column('user_group', 'name')]; ?></td>
                                                <td><a href="<?php echo base_url() . 'admin/update_user_privileges/' . $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>">Manage</a></td>
                                                <td>
                                                    <input type="hidden" name="current_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="<?php echo $user[$this->flexi_auth->db_column('user_acc', 'suspend')]; ?>"/>
                                                    <!-- A hidden 'suspend_status[]' input is included to detect unchecked checkboxes on submit -->
                                                    <input type="hidden" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="0"/>

                                                    <?php if ($this->flexi_auth->is_privileged('Update Users')) { ?>
                                                        <input type="checkbox" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="1" <?php echo ($user[$this->flexi_auth->db_column('user_acc', 'suspend')] == 1) ? 'checked="checked"' : ""; ?>/>
                                                    <?php } else { ?>
                                                        <input type="checkbox" disabled="disabled"/>
                                                        <small>Not Privileged</small>
                                                        <input type="hidden" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="0"/>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($this->flexi_auth->is_privileged('Delete Users')) { ?>
                                                        <input type="checkbox" name="delete_user[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="1"/>
                                                    <?php } else { ?>
                                                        <input type="checkbox" disabled="disabled"/>
                                                        <small>Not Privileged</small>
                                                        <input type="hidden" name="delete_user[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')]; ?>]" value="0"/>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7"><br>
                                                <?php $disable = (!$this->flexi_auth->is_privileged('Update Users') && !$this->flexi_auth->is_privileged('Delete Users')) ? 'disabled="disabled"' : NULL; ?>
                                                <input type="submit" name="update_users" value="Update / Delete Users" class="btn btn-primary" <?php echo $disable; ?>/>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <?php } else { ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="highlight_red">
                                                No users are available.
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

