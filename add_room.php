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
                                        <a href="#">Room</a>
                                    </li>
                                    <li class="active">
                                        Add Room
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Room</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-box">
                            <!-- <h4 class="m-t-0 header-title"><b>Input Types</b></h4> -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Room Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="room.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                                            <button class="btn btn-success" name="add" type="submit"><span class="glyphicon glyphicon-save"></span> Add</button>
                                        </div>
                                        <?php $ds->add_data_room(); ?>
                                    </form>
                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>