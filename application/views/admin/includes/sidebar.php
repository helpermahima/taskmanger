<div class="sidebar collapse">
    <div class="sidebar-content">
        <!-- User dropdown -->
        <div class="user-menu dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo site_url('uploads/logo/'.$logo->image); ?>" alt="">
                <div class="user-info"><?php echo $logo->site_title; ?><span><?php echo $logo->site_email; ?></span>
                </div>
            </a>
            <div class="popup dropdown-menu dropdown-menu-right"> 
                <div class="thumbnail"> 
                    <div class="thumb">
                        <img alt="" src="<?php echo site_url('uploads/logo/'.$logo->image); ?>">
                        <div class="thumb-options">
                            <span>
                                <a href="<?php echo admin_url('settings'); ?>" class="btn btn-icon btn-success">
                                    <i class="icon-pencil"></i>
                                </a>
                            </span>
                        </div> 
                    </div> 
                    <div class="caption text-center"> 
                        <h6><?php echo $logo->site_title; ?><small><?php echo $logo->site_email; ?></small></h6> 
                    </div> 
                </div> 
                <ul class="list-group">

                </ul>
            </div>
        </div>
        <!-- /user dropdown -->
        <!-- Main navigation -->
        <ul class="navigation">
            <li class="<?php if(!isset($title)){ echo "active"; } ?>">
                <a href="<?php echo admin_url(); ?>"><span>Dashboard</span> <i class="icon-screen2"></i></a>
            </li>

            <li class="<?php if($this->uri->segment('2')=='users'){ echo "active"; } ?>">
                <a href="<?php echo admin_url('users'); ?>"><span>Users</span> <i class="icon-people"></i></a>
            </li>  


            <li class="<?php if($this->uri->segment('2')=='task'){ echo "active"; } ?>">
                <a href="<?php echo admin_url('task'); ?>"><span>Task</span> <i class="icon-numbered-list"></i></a>
            </li>
            <li>
                <a href="#" class="expand <?php if($this->uri->segment('2') == 'report' ){ echo "level-opened"; } ?>"><span>Reports</span> <i class="icon-wrench"></i></a>
                <ul>
                    <li><a href="<?php echo admin_url('report/reportPerMonth'); ?>">Report Per Month</a></li>
                    <li><a href="<?php echo admin_url('report/reportPerUser'); ?>">Report Per User</a></li>
                   
                    <!-- <li><a href="<?php echo admin_url('settings'); ?>">Site Settings</a></li> -->

                </ul>
            </li>



            <li>
                <a href="#" class="expand <?php if($this->uri->segment('2') == 'settings' || $this->uri->segment('2') == 'user_management'){ echo "level-opened"; } ?>"><span>Settings</span> <i class="icon-wrench"></i></a>
                <ul>
                    <li><a href="<?php echo admin_url('settings/profile'); ?>">Company Profile</a></li>
                    <li><a href="<?php echo admin_url('user_management'); ?>">User Management</a></li>
                    <li><a href="<?php echo admin_url('settings'); ?>">Site Settings</a></li>

                </ul>
            </li>


        </ul>
        <!-- /main navigation -->
    </div>
</div>
