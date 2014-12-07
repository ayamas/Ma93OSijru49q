<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>admin/dashboard">Generic Admin Site Title</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">        
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url(); ?>admin/update_account"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="<?php echo ($this->uri->segment(2)==='dashboard')?'active':''?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li class="<?php echo (($this->uri->segment(2)==='manage_user_accounts')
                                        ||($this->uri->segment(2)==='update_user_account')
                                        ||($this->uri->segment(2)==='update_user_privileges') 
                                        ||($this->uri->segment(2)==='manage_user_groups')
                                        ||($this->uri->segment(2)==='update_user_group')
                                        ||($this->uri->segment(2)==='update_group_privileges')
                                        ||($this->uri->segment(2)==='insert_user_group')
                                        ||($this->uri->segment(2)==='manage_privileges')
                                        ||($this->uri->segment(2)==='insert_privilege')
                                        ||($this->uri->segment(2)==='update_privilege')
                                        ||($this->uri->segment(2)==='list_user_status')
                                        ||($this->uri->segment(2)==='delete_unactivated_users')
                                        ||($this->uri->segment(2)==='failed_login_users'))?'active':''?>">
                    <a href="#"><i class="fa fa-user fa-fw"></i> User Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/manage_user_accounts" class="<?php echo (($this->uri->segment(2)==='manage_user_accounts')||($this->uri->segment(2)==='update_user_account')||($this->uri->segment(2)==='update_user_privileges'))?'active':''?>">User Accounts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/manage_user_groups" class="<?php echo (($this->uri->segment(2)==='manage_user_groups')||($this->uri->segment(2)==='update_user_group')||($this->uri->segment(2)==='update_group_privileges')||($this->uri->segment(2)==='insert_user_group'))?'active':''?>">User Groups</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/manage_privileges" class="<?php echo (($this->uri->segment(2)==='manage_privileges')||($this->uri->segment(2)==='update_privilege')||($this->uri->segment(2)==='insert_privilege'))?'active':''?>">User Privileges</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/list_user_status/active" class="<?php echo (($this->uri->segment(2)==='list_user_status')&&($this->uri->segment(3)==='active'))?'active':''?>">Active User's List</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/list_user_status/inactive" class="<?php echo (($this->uri->segment(2)==='list_user_status')&&($this->uri->segment(3)==='inactive'))?'active':''?>">Inactive User's List</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/delete_unactivated_users" class="<?php echo (($this->uri->segment(2)==='delete_unactivated_users'))?'active':''?>">Unactivated User's List</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/failed_login_users" class="<?php echo (($this->uri->segment(2)==='failed_login_users'))?'active':''?>">Failed Login Users</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="<?php echo (($this->uri->segment(1)==='backup')
                                        ||($this->uri->segment(2)==='xxxx')
                                        ||($this->uri->segment(2)==='xxxx') 
                                        ||($this->uri->segment(2)==='xxxx'))?'active':''?>">
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Site Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backup" class="<?php echo (($this->uri->segment(1)==='backup')&&($this->uri->segment(2)===FALSE))?'active':''?>">Perform Backup</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backup/optimize_db" class="<?php echo (($this->uri->segment(1)==='backup')&&($this->uri->segment(2)==='optimize_db'))?'active':''?>">Optimized Database</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>