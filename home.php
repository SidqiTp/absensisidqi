<?php 
include "header.php";

?>

  <div class="wrapper">
            <div class="container">
            <?php $ds->del_student(); ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title">User Data</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>User Data</b></h4>
                            <div class="col-md-8"><a href="add_student.php" class="btn btn-success tambah">Add User</a></div>    
                            <div class="col-md-4" style="text-align:right;">
                            <form class="form-horizontal" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                <div class="col-md-9" align="right"><input type="file" name="file" id="file" accept=".csv" class="form-control" /></div>
                                <div><button  type="submit" id="submit" name="import"  class="btn btn-warning" >Import</button></div>
                            </form>
                            </div>
                                   
                             <br>
                            <br>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Type</th>
                                    <!-- <th>Group</th> -->
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $stu = $ds->all_student();
                                    $no = 1;
                                    foreach ($stu as $key) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key->name; ?></td>
                                    <td><?php echo $key->username; ?></td>
                                    <td><?php echo $key->type; ?></td>
                                    <td> 
                                        <a href="edit_student.php?id=<?php echo $key->id; ?>" class="btn btn-primary  waves-effect"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button idne="<?php echo $key->id; ?>" class="btn btn-danger waves-effect waves-light btndel" ><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                </div>

<?php include "footer.php"; ?>
<?php
$conn = mysqli_connect("localhost", "id10297522_root", "admin", "id10297522_db_absen");

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into user (name,username,password,nfc,type)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
		        echo "<meta http-equiv='refresh' content='1; URL=home.php' />";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<script>
    $(function(){

      $('.tambah').click(function(){
        $('#tambah').modal('show');
      });

        $('#example1').DataTable({
            responsive: true
        });

  
  


    });
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center;">
                                            <h4>Are you sure want to delete this?</h4>
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">No</button>
                                            <button type="submit" name="del" class="btn btn-danger waves-effect waves-light">Yes</button>
                                        </div>

                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

