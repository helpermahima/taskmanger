<?php include('includes/header.php'); ?>

<div class="page-container">

    <?php include('includes/sidebar.php'); ?>

    <div class="page-content">

    <?php include('includes/breadcums.php'); ?>    

    <?php 
            if(isset($main)){
                $this->load->view('employee/'.$main);
            }else{
                $this->load->view('employee/dashboard',$comments);
            }
           
    ?>        


 <?php include('includes/footer.php'); ?>