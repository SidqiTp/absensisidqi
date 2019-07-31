<?php 
include "header.php";

?>

  <div class="wrapper">
            <div class="container">

            <?php $ds->del_meeting(); ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                       
                            <h4 class="page-title">Meeting Data</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Meeting Data</b></h4>
                            <div align="center"><a href="add_meeting.php" class="btn btn-success tambah">Add Meeting</button></a>
                             <br>
                            <br>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Room</th>
                                    <th>Subject</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $meet = $ds->all_meeting();
                                    $no = 1;
                                    foreach ($meet as $key) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key->start; ?></td>
                                    <td><?php echo $key->end; ?></td>
                                    <td><?php echo $key->room_name; ?></td>
                                    <td><?php echo $key->subject_name; ?></td>
                                    <td> 
                                        <a href="edit_meeting.php?id=<?php echo $key->kode; ?>" class="btn btn-primary  waves-effect"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="detail_meeting.php?id=<?php echo $key->kode; ?>" class="btn btn-info  waves-effect"><span class="glyphicon glyphicon-list"></span></a>
                                        <button idne="<?php echo $key->kode; ?>" class="btn btn-danger waves-effect waves-light btndel" ><span class="glyphicon glyphicon-trash"></span></button>
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

