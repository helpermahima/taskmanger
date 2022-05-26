       <!-- Page header --> 
        <div class="page-header">
            <div class="page-title">
                <h3>Dashboard <small>Welcome <?=$this->session->userdata('student_name');?>,</small></h3>
            </div>
        </div>
        <!-- /page header -->
        

<?php if($this->session->flashdata('msg')){ ?>        
<div class="alert alert-success fade in block-inner"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<i class="icon-checkmark-circle"></i><?php echo $this->session->flashdata('msg'); ?> </div>
<?php } ?>


        <!-- Breadcrumbs line -->
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                <li class="active"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; } ?></li>
            </ul>
            <div class="visible-xs breadcrumb-toggle">
                <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
            </div>

        </div>
        <!-- /breadcrumbs line --> 


