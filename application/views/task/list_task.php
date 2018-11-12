<div class="row">

    <div class="span12">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>List Pekerjaan</h3>
          </div>
          
          <div class="widget-content">
          <?php if(!empty($message)){ 
          if($message){ ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Data berhasil diupdate.
              </div>
            <?php }else { ?>
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Gagal!</strong> Data gagal diupdate!!!.
              </div>          
          <?php }} ?>
            
            <div class="control-group">                     
              <label class="control-label" for="asignee">Status</label>
              <div class="controls">
                <select class="span2" id="status" onchange="statusOnChange()">
                  <option value="ALL">Semua Status</option>
                  <option value="TODO" <?php echo ($status=="TODO") ? "selected" : "" ?>>TO DO</option>
                  <option value="PROGRESS" <?php echo ($status=="PROGRESS") ? "selected" : "" ?>>IN PROGRESS</option>
                  <option value="DONE" <?php echo ($status=="DONE") ? "selected" : "" ?>>DONE</option>
                </select>
              </div>    
            </div>

            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th>
                  <th> Nomor Tiket </th>
                  <th> Asignee </th>
                  <th> Deskripsi </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($task) {
                  foreach ($task as $key => $data) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $data["nomor_tiket"]; ?> </td>
                    <td> <?php echo $data["asignee"]; ?> </td>
                    <td> <?php echo $data["deskripsi"]; ?> </td>
                    <td> <?php echo $data["status_task"]; ?> </td>
                    <td>
                      <?php if($data["status_task"] == "TO DO"){ ?>
                        <a href="<?php echo base_url().'task/updatetask?idtask='.$data['id_task'].'&status=TODO';?>" class="btn btn-small btn-warning" title='Ubah ke "IN PROGRESS"' onclick="return confirm('Apakah Anda yakin mengubah status pekerjaan ini menjadi IN PROGRESS?')"><span class="icon icon-signal"></span></a>
                        <a href="<?php echo base_url().'task/getsubtask?idtask='.$data['id_task'].'&status=TODO';?>" class="btn btn-small btn-info" title="Lihat Sub Pekerjaan"><span class="icon icon-tags"></span></a>
                        <a href="<?php echo base_url().'task/edittask?idtask='.$data['id_task'].'&status=TODO';?>" class="btn btn-small btn-secondary" title="Sunting Pekerjaan"><span class="icon icon-edit"></span></a>
                        <a href="<?php echo base_url().'task/hapustask?idtask='.$data['id_task'].'&status=TODO';?>" class="btn btn-small btn-danger" title="Hapus Pekerjaan" onclick="return confirm('Apakah Anda yakin menghapus pekerjaan ini?')"><span class="icon icon-trash"></span></a>
                      <?php } else if($data["status_task"] == "IN PROGRESS") { ?>
                        <a href="<?php echo base_url().'task/updatetask?idtask='.$data['id_task'].'&status=PROGRESS';?>" class="btn btn-small btn-success" title='Ubah ke "DONE"' onclick="return confirm('Apakah Anda yakin mengubah status pekerjaan ini menjadi DONE?')"><span class="icon icon-ok-circle"></span></a>
                        <a href="<?php echo base_url().'task/getsubtask?idtask='.$data['id_task'].'&status=PROGRESS';?>" class="btn btn-small btn-info" title="Lihat Sub Pekerjaan"><span class="icon icon-tags"></span></a>
                        <a href="<?php echo base_url().'task/edittask?idtask='.$data['id_task'].'&status=PROGRESS';?>" class="btn btn-small btn-secondary" title="Sunting Pekerjaan"><span class="icon icon-edit"></span></a>
                      <?php } else if ($data["status_task"] == "DONE"){ ?>
                        <a href="<?php echo base_url().'task/getsubtask?idtask='.$data['id_task'].'&status=DONE';?>" class="btn btn-small btn-info" title="Lihat Sub Pekerjaan"><span class="icon icon-tags"></span></a>
                      <?php } else { ?>
                        <a href="<?php echo base_url().'task/getsubtask?idtask='.$data['id_task'];?>" class="btn btn-small btn-info" title="Lihat Sub Pekerjaan"><span class="icon icon-tags"></span></a>
                        <a href="<?php echo base_url().'task/edittask?idtask='.$data['id_task'];?>" class="btn btn-small btn-secondary" title="Sunting Pekerjaan"><span class="icon icon-edit"></span></a>
                        <a href="<?php echo base_url().'task/hapustask?idtask='.$data['id_task'];?>" class="btn btn-small btn-danger" title="Hapus Pekerjaan" onclick="return confirm('Apakah Anda yakin menghapus pekerjaan ini?')"><span class="icon icon-trash"></span></a></td>
                      <?php }?>
                  </tr>
                <?php 
                  }
                } 
                ?>                
              </tbody>
            </table>
          </div>
          <!-- /widget-content --> 
        </div>
    </div>

</div>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Siswa</h4>
      </div>
      <div class="modal-body" align="center">
          <table class="table" id="isidetail">
           
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('#myTable').dataTable();
  });

  function statusOnChange(){
    var status = $('#status').val();
    if(status){
      window.location.href = "<?php echo base_url(); ?>task/listtask?status="+status;
    }
  }

</script>