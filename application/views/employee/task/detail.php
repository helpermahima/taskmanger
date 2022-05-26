            <div class="row">
                <div class="col-lg-8">
                    <!-- Task description -->
                    <div class="block">
                        <h5><?php echo $result->title; ?></h5>

                        <div class="panel-footer">
                            <div class="pull-left">
                                <ul class="footer-links-group">
                                    <li><i class="icon-plus-circle muted"></i> Added on: <a href="#" class="text-semibold"><?php echo date("D, jS M, Y ", $result->created); ?></a></li>
                                    <li><i class="icon-checkmark-circle muted"></i> Due by: <a href="#" class="text-semibold">
                                    <?php 
                                    $date =  strtotime($result->deadline);
                                    echo date("D, jS M, Y ", $date);
                                    ?></a></li>

                                    <li><i class="icon-file muted"></i> File: <a href="<?php echo site_url('uploads/files/'.$result->file); ?>" class="text-semibold">
                                        <?php echo  $result->file; ?>
                                    </a></li>
                                    
                                </ul>
                            </div>

                        </div>
<hr/>
<p><?php echo $result->description; ?></p>



                    </div>
                    <!-- /task description -->
                    <!-- Comments list -->
                    <h6 class="heading-hr"><i class="icon-bubble"></i> Comments</h6>
                    <div class="block">



    <?php
foreach($comments as $c){ 
if($c->user_type == 'employee'){
    $user = $this->db->get_where('users', array('id'=>$c->user_id))->row();
}if($c->user_type == 'admin'){
    $user = $this->db->get_where('admin', array('id'=>$c->user_id))->row();
}


    ?>

    
                        <div class="media">    
                            <div class="media-body"><a href="#" class="media-heading"><?php echo $user->name; ?></a>
                                <?php echo $c->comment; ?>
                                <?php if($c->file != ''){ ?>
                                <a href="<?php echo site_url('uploads/files/'.$c->file); ?>" class="btn btn-link btn-icon pull-right"><i class="icon-download"></i><?php echo $c->file; ?></a>
                                <?php } ?>
                                </div>
                        </div>
<?php } ?>



                    </div>
                    <!-- /comments list -->
                    <!-- Add comment form -->

        <div class="block">
            <h6><i class="icon-bubble-plus"></i> Add comment</h6>
            <div class="well">
                            <form action="<?php echo site_url('employee/task/comment/'.$result->id); ?>" role="form" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Comment: </label>
                                    <textarea rows="5" cols="5" placeholder="Your Comment..." class="elastic form-control" name="comment"></textarea>
                                </div>
                              
                                
                                
                                <div class="form-group">
                                    <label>File: </label>
                                    <input type="file" class="styled form-control" id="report-screenshot" name="file">
                                </div>
                                
                                <div class="form-actions text-right">
                                    <input type="submit" value="Add comment" class="btn btn-primary"> </div>
                                </form>
                        </div>
                    </div>
                    <!-- /add comment form -->
                </div>
                <div class="col-lg-4">

                    <!-- Attached files -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h6 class="panel-title"><i class="icon-link"></i> Attached files</h6></div>
                        <ul class="list-group">
                        <?php foreach($comments as $c){ if($c->file != ''){ ?>
                            <li class="list-group-item has-button"><i class="icon-file-pdf"></i> <a href="<?php echo site_url('uploads/files/'.$c->file); ?>"><?php echo $c->file; ?></a> <a href="<?php echo site_url('uploads/files/'.$c->file); ?>" class="btn btn-link btn-icon"><i class="icon-download"></i></a></li>
                        <?php } } ?>    
                        </ul>
                    </div>
                    <!-- /attached files -->

                </div>
            </div>