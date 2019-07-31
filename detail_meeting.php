<?php 
include "header.php";

?>

            
<div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    
                                    <li>
                                        <a href="#">Meeting</a>
                                    </li>
                                    <li class="active">
                                        Edit Meeting
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Meeting Info</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-box">
                            <!-- <h4 class="m-t-0 header-title"><b>Input Types</b></h4> -->
                            <?php 
                                $id = $_GET['id'];
                                $users = $ds->all_detail_user_meeting($id); 
                                $row = $ds->all_detail_meeting($id); 
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Start</label>
                                            <div class="col-md-9">
                                                <label class="control-label"><?php echo $row->start; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">End</label>
                                            <div class="col-md-9">
                                                <label class="control-label"><?php echo $row->end; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Room</label>
                                            <div class="col-md-9">
                                                <label class="control-label"><?php echo $row->room_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Subject</label>
                                            <div class="col-md-9">
                                                <label class="control-label"><?php echo $row->subject_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User</label>
                                            <div class="col-md-9">
                                            <?php 
                                            foreach ($users as $key) { ?>
                                                <label class="control-label"><?php echo $key->name; ?></label>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="meeting.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Close</a>
                                        </div>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>