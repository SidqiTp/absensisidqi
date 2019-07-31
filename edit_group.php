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
                                        <a href="#">Group</a>
                                    </li>
                                    <li class="active">
                                        Edit Group
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Group</h4>
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
                            $row = $ds->all_edit_group($id); 
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Group Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" value="<?php echo  $row->group_name; ?>" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="group.php" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                            <button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-save"></span> Tambah</button>
                                        </div>
                                        <?php $ds->edit_data_group($id); ?>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
<?php include "footer.php"; ?>