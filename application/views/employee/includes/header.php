<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=config_item('site_name');?> | Employee Panel</title>
        <link href="<?php echo admin_css('bootstrap.min.css');  ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('londinium-theme.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('styles.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('icons.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('jquery-ui.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('fontawesome-iconpicker.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">    
        

        <script type="text/javascript" src="<?php echo admin_js('jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/charts/sparkline.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uniform.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/select2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputmask.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/autosize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputlimit.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/listbox.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/multiselect.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/validate.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/tags.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/switch.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uploader/plupload.full.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uploader/plupload.queue.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/daterangepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/fancybox.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/moment.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/jgrowl.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/datatables.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/colorpicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/fullcalendar.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/timepicker.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/collapsible.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('application.js'); ?>"></script>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<style>
 #notifications_counter {
         display:block;
         position:absolute;
         background:#E1141E;
         color:#FFF;
         font-size:12px;
         font-weight:normal;
         padding:1px 3px;
         margin:-8px 0 0 25px;
         border-radius:2px;
         -moz-border-radius:2px; 
         -webkit-border-radius:2px;
         z-index:1;
         }
#show_notification p{
         margin-left:10px;
		 margin-top:10px;
         }
         </style>




    </head>
    <body class="sidebar-wide">
        <!-- Navbar -->
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url('employee'); ?>">
                    <h6><?php echo $this->setting->site_title; ?></h6>
                </a>
                <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
                    <span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                    <span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i>
                </button>
            </div>
            <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
                <li class="user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        
                        <span><?=$this->session->userdata('student_name');?></span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right icons-right">

                        <li><a href="<?=site_url('employee/login/logout');?>"><i class="icon-exit"></i> Logout</a></li>
                    </ul>
                </li>
                <!-- <li> -->

                <!-- <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-envelope"></span> Envelope 
        </button> -->
                <!-- </li> -->
                <li class="user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <sup><span class="badge badge-warning navbar-badge"></span></sup></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right icons-right"> 
                    <body style="margin:0;padding:0;">





<div id="notifications">
<h3>Notifications</h3>
<div style="height:300px; width: 300px;" id="show_notification">
<?php
    foreach ($comments as $key => $value) {
        echo $value->comment;
        ?>
        <br>
        <?php
    }
?>

                  



</div>
</div>
                     
                     </ul>
                   
                  
               </div>
            </li>
                         </div>   
                </li>
            </ul>
        </div>
       
                        