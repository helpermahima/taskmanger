<?php
error_reporting(0);
if (isset($user)) {
    $path = admin_url('users/update/' . $user->id);
} else {
    $path = admin_url('users/save');
}
?>
       <form action="<?= $path; ?>" method="post" enctype="multipart/form-data" role="form"> 
           <div class="panel panel-default"> 
               <div class="panel-heading">
                   <h6 class="panel-title">
                   <i class="icon-user"></i>
                   <?php if (isset($user)) { echo "Edit User"; } else{ echo "Add User "; }  ?>
                   </h6>
               </div> 
               <div class="panel-body">
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                               <label>Name</label> 
                               <input type="text" name="name" class="form-control" value="<?php if(isset($user->name)){echo $user->name;}?>">
                               <?php echo form_error('name'); ?>
                           </div> 
                           <div class="col-md-6">
                               <label>Email</label> 
                               <input type="text" name="email" class="form-control" value="<?php if(isset($user->email)){echo $user->email;}?>">
                               <?php echo form_error('email'); ?>
                           </div>                                                    
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                               <label>Username</label> 
                               <input type="text" name="username" class="form-control" value="<?php if(isset($user->username)){echo $user->username;}?>">
                               <?php echo form_error('username'); ?>
                           </div>                                                    
                       </div>                       
                   </div>


                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                               <label>Password</label> 
                               <input type="password" name="password" class="form-control" value="">
                               <?php echo form_error('password'); ?>
                           </div> 
                           <div class="col-md-6">
                               <label>Repeat Password</label> 
                               <input type="password" name="repeat_password" class="form-control" value="">
                               <?php echo form_error('repeat_password'); ?>
                           </div>
                                                                                                        
                       </div>
                           <?php
    if (isset($user->name)) { ?>
        <p>leave password fields blank if you dont want to change the password</p>
<?php    }
    ?>                         
                   </div>


                   <div class="form-actions text-right"> 
                        
                       <a href="<?php echo admin_url('users'); ?>" class="btn btn-danger">Cancel</a> 
                       <input type="submit" value="<?php if(isset($user->name)){ echo "Update User"; }else{  echo "Add User"; }  ?>" class="btn btn-primary"> 
                   </div>
               </div>
           </div>
       </form>
