
                <div class="tab-content">
                    <!-- First tab -->
                    <div class="tab-pane active fade in" id="all-tasks">
                        <!-- Tasks table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-paragraph-justify2"></i>Task List</h6> <span class="pull-right label label-danger"><?php echo count($result); ?></span> </div>
                            <div class="datatable-tasks">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Task Description</th>
                                            <th class="task-priority">Priority</th>
                                            <th class="task-date-added">Date Added</th>
                                            <th class="task-deadline">Deadline</th>
                                            <th class="task-progress">Status</th>
                                            <th colspan="2" class="task-tools text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
foreach($result as $r){ 

?>
                                        <tr>
                                            <td class="task-desc"> <a href="<?php echo site_url('employee/task/view/'.$r->id); ?>"><?php echo $r->title; ?></a> </td>
                                            <td class="text-center">
                                            <?php if($r->priority == '1'){ ?>
                                            <span class="label label-danger">High</span>
                                            <?php }if($r->priority == '2'){ ?>
                                            <span class="label label-info">Normal</span>
                                            <?php }if($r->priority == '3'){ ?>
                                            <span class="label label-success">Low</span>
                                            <?php } ?>

                                            </td>
                                            
                                            <td>
                                                <?php echo date("D, jS M, Y ", $r->created); ?>
                                            </td>


                                            <td><i class="icon-clock"></i> <strong class="text-danger"><?php echo $r->deadline; ?></strong> </td>
                                            
                                            <td> <?php if($r->status == '0'){ echo "Incomplete"; } elseif ($r->status =='2') {
                                                echo "Submitted";
                                            } else{ echo "Complete"; } ?> </td>
                                        <?php if($r->status == '0'){ ?>
                                            <td><a href="<?php echo site_url('employee/task/submit/'.$r->id); ?>"><i class="icon-checkmark3"></i></a></td>
                                        <?php }
                                        else{ ?>
                                            <td><span style="color:red">Your task is under review</span></td>
                                         <?php } ?> 
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a class="btn btn-success"  href="<?php echo site_url('employee/task/view/'.$r->id); ?>">View</a>

                                                </div>
                                            </td>
                                        </tr>
<?php } ?>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /tasks table -->
                    </div>
                    <!-- /first tab -->

                </div>