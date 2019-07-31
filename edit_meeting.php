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
                            <h4 class="page-title">Edit Meeting</h4>
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
                            $user = $ds->meeting_user_group($id);
                  $row = $ds->all_edit_meeting($id); 
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
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
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Room</label>
                                            <div class="col-md-9">
                                                <select name="room" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $room = $ds->all_room();
                                                        foreach ($room as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>" <?php if($row->room_id == $key->id){ echo "selected"; } ?> ><?php echo $key->room_name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Subject</label>
                                            <div class="col-md-9">
                                                <select name="subject" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_subject();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>" <?php if($row->subject_id == $key->id){ echo "selected"; } ?> ><?php echo $key->subject_name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User</label>
                                            <div class="col-md-9">
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>" ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"  ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"  ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"  ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"  ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <select name="user[]" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_student();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>"  ><?php echo $key->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <!-- <textarea name="user" cols="40" rows="5"></textarea> -->
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="meeting.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                            <button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-save"></span> Edit</button>
                                        </div>
                                        <?php $ds->edit_data_meeting($id); ?>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>