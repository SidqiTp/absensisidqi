<?php 
include "header.php";

?>

            
<div class="wrapper">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-subject pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    
                                    <li>
                                        <a href="#">Subject</a>
                                    </li>
                                    <li class="active">
                                        Edit Subject
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Subject</h4>
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
                            $row = $ds->all_edit_subject($id);
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-subject">
                                            <label class="col-md-3 control-label">Subject Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" value="<?php echo $row->subject_name; ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-subject">
                                            <label class="col-md-3 control-label">Group Name</label>
                                            <div class="col-md-9">
                                                <select name="group" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $group = $ds->all_group();
                                                        foreach ($group as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>" <?php if($row->class == $key->id){ echo "selected"; } ?>  ><?php echo $key->group_name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-subject">
                                            <label class="col-md-3 control-label">Semester</label>
                                            <div class="col-md-9">
                                                <input type="text" name="ses" class="form-control" value="<?php echo $row->year_semester; ?>" required="">
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="data_subject.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                            <button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-save"></span> Edit</button>
                                        </div>
                                        <?php $ds->edit_data_subject($id); ?>
                                    </form>
                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>