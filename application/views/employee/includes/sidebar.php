<div class="sidebar collapse">
    <div class="sidebar-content">
        <!-- User dropdown -->
        <div class="user-menu dropdown">
            <a href="#" >
               
                <div class="user-info"><?php echo $this->setting->site_title; ?><span><?php echo $this->setting->site_email; ?></span>
                </div>
            </a>

        </div>
        <!-- /user dropdown -->
        <!-- Main navigation -->
        <ul class="navigation">
            <li class="<?php if(!isset($title)){ echo "active"; } ?>">
                <a href="<?php echo site_url('employee'); ?>"><span>Dashboard</span> <i class="icon-screen2"></i></a>
            </li>

            <li class="<?php if($this->uri->segment('2')=='task'){ echo "active"; } ?>">
                <a href="<?php echo site_url('employee/task'); ?>"><span>My Tasks</span> </a>
            </li>  
         





        </ul>
        <!-- /main navigation -->
    </div>
</div>
