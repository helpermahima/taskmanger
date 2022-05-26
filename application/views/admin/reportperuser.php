<!--     <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<div class="panel-body">
 <div class="form-group">
     <div class="row">
         <div class="col-md-3">
             <label>Employee</label> 
             <select data-placeholder="Choose Employee..." class="my_select_opt select-search" tabindex="2" name="user_id" id="userid"> 
                 <option value=""></option> 
                 <?php foreach($result as $s){  ?>
                 <option value="<?php echo $s['id']; ?>"><?php echo $s['username']; ?> </option> 
                 <?php } ?>
             </select> 
         </div> 
     </div><br>
        <div class="form-actions"> 
            <button id="btn" class="btn btn-success">Generate</button> 
        </div>
        <div class="row">
        <div class="col-md-8">
          
                <div class="tab-content">
                    <div class="tab-pane active fade in" id="all-tasks">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php $this->load->view('admin/includes/alert'); ?>
                                <h6 class="panel-title"><i class="icon-paragraph-justify2"></i>Task List</h6>
                            </div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Task Description</th>
                                        <th class="task-priority">Priority</th>
                                        <th class="task-str_date">StartDate</th>
                                        <th class="task-deadline">Deadline</th>
                                        <th class="task-progress">Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="tableData">
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                </div>
        </div>
 </div>
</div>
<
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 6, "asc" ]]
    } );
} );
</script>
<script type="text/javascript">
  $("#btn").on('click',function(){
    var id= $("#userid").val();
    var high = '';
    var status = '';
    // alert(id);
    $.ajax({

    url: '<?php echo admin_url("report/generateReport"); ?>',
    type:'POST',
    data: 'id='+id,
    dataType: 'json',
    success: function(response){
    var tableData ='<tr>';

      $.each(response,function(index,value){
        // console.log(value.title);
        if(value.priority== 1){
          high = "<span class='label label-danger'>High</span>";
        }
        if(value.priority== 2){
          high = "<span class='label label-info'>Normal</span>";
        }
        if(value.priority== 3){
          high = "<span class='label label-success'>low</span>";
        }
        if(value.status== 1){
          status = "Completed";
        }
        if(value.status== 0){
          status = "Incomplete";
        }
        if(value.status== 2){
          status = "Under Review";
        }
        tableData += "<td class='task-desc'>"+value.description+"</td><td class='task-center'>"+high+"</td><td class='task-desc'>"+value.str_date+"</td><td class='task-desc'>"+value.deadline+"</td><td class='task-desc'>"+status+"</td></tr>";
      });
    $("#tableData").html(tableData);
    }
    });
  });
</script>