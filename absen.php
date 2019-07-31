<?php 
include "header.php";

?>

  <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                       
                            <h4 class="page-title">Attendance Data</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Attendance Data</b></h4>
                            <div align="center"><a href="add_absen.php" class="btn btn-success tambah">Add Attendance</button></a>
                             <br>
                            <br>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <!-- <th>Option</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $meet = $ds->all_absen();
                                    $no = 1;
                                    foreach ($meet as $key) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key->name; ?></td>
                                    <td><?php echo $key->start; ?></td>
                                    <td><?php echo $key->end; ?></td>
                                    <!-- <td> 
                                        <a href="edit_absen.php?id=<?php echo $key->kode; ?>" class="btn btn-primary  waves-effect"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button idne="<?php echo $key->kode; ?>" class="btn btn-danger waves-effect waves-light btndel" ><span class="glyphicon glyphicon-trash"></span></button>
                                    </td> -->
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


                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center;">
                                            <h4>Anda Yakin Ingin Menghapus Data ini ?</h4>
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Iya</button>
                                        </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

