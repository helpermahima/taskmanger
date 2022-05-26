<?php
error_reporting(0);
if (isset($result)) {
    $path = admin_url('task/update/' . $result->id);
} else {
    $path = admin_url('task/save');
}
?>
       <form action="<?= $path; ?>" method="post" enctype="multipart/form-data" role="form"> 
           <div class="panel panel-default"> 
               <div class="panel-heading">
                   <h6 class="panel-title">
                   <i class="icon-paragraph-justify2"></i>
                   <?php if (isset($result)) { echo "Edit Task"; } else{ echo "Add Task "; }  ?>
                   </h6>
               </div> 
               <div class="panel-body">
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                               <label>Title</label> 
                               <input type="text" name="title" class="form-control" value="<?php if(isset($result->title)){echo $result->title;}?>">
                           </div> 
                           <div class="col-md-6">
                               <label>Employee</label> 
                               <select data-placeholder="Choose Employee..." class="my_select_opt select-search" tabindex="2" name="user_id"> 
                                   <option value=""></option> 
                                   <?php foreach($users as $s){  ?>
                                   <option value="<?php echo $s->id; ?>"<?php if(isset($result)){ if($result->user_id == $s->id){ echo "selected"; } }  ?>><?php echo $s->name; ?> </option> 
                                   <?php } ?>
                               </select> 
                           </div> 

                       </div>
                   </div>

                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-12">
                               <label>Description</label> 
                               <textarea name="description" class="form-control"><?php if(isset($result->description)){ echo $result->description; } ?></textarea>
                           </div>                                                    
                       </div>                       
                   </div>


                   <div class="form-group">
                       <div class="row">

                           <div class="col-md-3">
                             <label>File</label>
                             <input type="file" class="styled form-control" id="report-screenshot" name="file">
                           </div> 

                           <div class="col-md-3">
                               <label>Deadline</label> 
                               <input type="text" name="deadline" id="datepicker" class="form-control" value="<?php if(isset($result->deadline)){echo $result->deadline;}?>">
                           </div> 
                           <div class="col-md-3">
                               <label>Start Date</label> 
                               <input type="text" name="str_date" id="datepicker" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
                           </div> 
                           <div class="col-md-3">
                               <label>Priority</label> 
                               <select data-placeholder="Choose Priority..." class="my_select_opt select-search" tabindex="2" name="priority" >
                                 <option value=""></option> 
                                 <option value="1" <?php if(isset($result)){ if($result->priority == '1'){ echo "selected"; } } ?>> High</option>
                                 <option value="2" <?php if(isset($result)){ if($result->priority == '2'){ echo "selected"; } } ?>> Normal</option>
                                 <option value="3" <?php if(isset($result)){ if($result->priority == '3'){ echo "selected"; } } ?>> Low</option>
                               </select>
                           </div>
     

                       </div>
                       
                   </div>


                   <div class="form-actions text-right"> 
                        
                       <a href="<?php echo admin_url('task'); ?>" class="btn btn-danger">Cancel</a> 
                       
                  <!-- <a href=> -->

                      <input type="submit" value="<?php if(isset($result->name)){ echo "Update Task"; }else{  echo "Add Task"; }  ?>" class="btn btn-primary" onclick="test()"> 
                      </div>
               </div>
           </div>
       </form>
                      <script>
                          function test(){
                            //   window.console.log("help");
                        alert('hrlp');
                          }
                      </script>
