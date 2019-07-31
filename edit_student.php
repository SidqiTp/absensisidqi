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
                                        <a href="#">Student</a>
                                    </li>
                                    <li class="active">
                                        Edit Student
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Student</h4>
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
                            $row = $ds->all_edit_student($id); 
                            $ug = $ds->all_edit_student_group($id); 
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" value="<?php echo $row->name; ?>" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" name="username" value="<?php echo $row->username; ?>" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" value="<?php echo $row->password; ?>" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Type</label>
                                            <div class="col-md-9">
                                                <select name="type" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                <option value="dosen" <?php if($row->type == "dosen"){ echo "selected"; }; ?> >dosen</option>
                                                <option value="mahasiswa" <?php if($row->type == "mahasiswa"){ echo "selected"; }; ?> >mahasiswa</option>
                                                <option value="etc" <?php if($row->type == "etc"){ echo "selected"; }; ?> >etc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Group Name</label>
                                            <div class="col-md-9">
                                                <select name="group" class="form-control" required="">
                                                <option> - PILIH - </option>
                                                    <?php 
                                                        $sub = $ds->all_group();
                                                        foreach ($sub as $key) {
                                                    ?>
                                                    <option value="<?php echo $key->id; ?>" <?php if($ug->group_id == $key->id){ echo "selected"; }; ?> ><?php echo $key->group_name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="home.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                            <button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-save"></span> Edit</button>
                                        </div>
                                        <?php $ds->edit_data_student($id); ?>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>