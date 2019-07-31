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
                                        <a href="#">Attendance</a>
                                    </li>
                                    <li class="active">
                                        Add Attendance
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Attendance</h4>
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
                                            <label class="col-md-4 control-label">Meeting</label>
                                            <div class="col-md-8">
                                                <select name="meeting" class="form-control" required="">
                                                <option> - CHOOSE - </option>
                                                    <?php 
                                                        $sub = $ds->all_meeting();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->kode; ?>"><?php echo $key->subject_name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">User</label>
                                            <div class="col-md-8">
                                                <select name="nama" class="form-control" required="">
                                                <option> - CHOOSE - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Start</label>
                                            <div class="col-md-4">
                                                <input type="date" name="start_date" class="form-control" required="">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="time" name="start_time" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End</label>
                                            <div class="col-md-4">
                                                <input type="date" name="end_date" class="form-control" required="">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="time" name="end_time" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="group.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                                            <button class="btn btn-success" name="add" type="submit"><span class="glyphicon glyphicon-save"></span> Add</button>
                                        </div>
                                        <?php $ds->add_data_absen(); ?>
                                    </form>
                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>