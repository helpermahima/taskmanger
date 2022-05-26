<?php  

error_reporting(0);

include('includes/header.php'); ?>

<div class="page-container">

    <?php include('includes/sidebar.php'); ?>

    <div class="page-content">

    <?php include('includes/breadcums.php'); ?>    

    <?php 
    // print_r($result);die;
            if(isset($main)){
                $this->load->view('admin/'.$main,$res);
            }else{
                $this->load->view('admin/dashboard',$res);
            }
    ?>        


 <?php include('includes/footer.php'); ?>