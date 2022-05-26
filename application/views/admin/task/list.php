
    <!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<a href="<?php echo admin_url('task/add'); ?>" class="btn btn-success add_new" type="button"><i class="icon-plus"></i>Add New</a>  
                <div class="tab-content">
                    <div class="tab-pane active fade in" id="all-tasks">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php $this->load->view('admin/includes/alert'); ?>
                                <h6 class="panel-title"><i class="icon-paragraph-justify2"></i>Task List</h6>
                                <span class="pull-right label label-danger">Total Tasks:<?php echo count($result); ?></span> 
                            </div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Task Description</th>
                                        <th>Task Assigned To</th>
                                        <th class="task-priority">Priority</th>
                                        <th class="task-date-added">Date Added</th>
                                        <th class="task-str_date">StartDate</th>
                                        <th class="task-deadline">Deadline</th>
                                        <th class="task-progress">Status</th>
                                        <th class="task-progress">Active</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($result as $r){ 
                                    ?>
                                    <tr>
                                        <td class="task-desc"> <a href="<?php echo admin_url('task/view/'.$r["id"]); ?>"><?php echo $r['title']; ?></a> </td>
                                        <td class="text-center"><?php echo $r['name']; ?> </td>
                                        <td class="text-center">
                                        <?php if($r['priority'] == '1'){ ?>
                                        <span class="label label-danger">High</span>
                                        <?php }if($r['priority'] == '2'){ ?>
                                        <span class="label label-info">Normal</span>
                                        <?php }if($r['priority'] == '3'){ ?>
                                        <span class="label label-success">Low</span>
                                        <?php } ?>

                                        </td>                                        
                                        <td>
                                            <?php echo date("D, jS M, Y ", $r['created']); ?>
                                        </td>
                                        <td><i class="icon-clock"></i> <strong class="text-danger"><?php echo $r['str_date']; ?></strong> </td>
                                        <td><i class="icon-clock"></i> <strong class="text-danger"><?php echo $r['deadline']; ?></strong> </td>
                                        <td> <?php if($r['status'] == '0'){ echo "Incomplete"; } else if($r['status'] == '2'){echo "Under Review "; } else{ echo "Complete"; } ?> </td>
                                        <td>
                                        <?php if($r['status'] != '1'){ ?>
                                            <a href="<?php echo admin_url('task/edit/'.$r['id']); ?>"><i class="icon-pencil"></i></a>
                                            <a href="<?php echo admin_url('task/complete/'.$r['id']); ?>"><i class="icon-checkmark3"></i></a>
                                        <?php } ?>                                                        
                                            <a href="<?php echo admin_url('task/delete/'.$r['id']); ?>" onclick="return confirm('Are you sure want to delete?')"><i class="icon-remove"></i></a>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                                <?php } ?> 
                        </div>
                    </div>
                </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 6, "asc" ]]
    } );
} );
</script>

 
    
    </script>
</body>
</html>