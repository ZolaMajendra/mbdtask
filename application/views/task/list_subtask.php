<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"><a href="<?php echo base_url().'task/listtask?status='.$status?>" title="Back"><i class="icon-arrow-left"></i></a>
            <h3>List Sub Pekerjaan</h3>
          </div>
          
          <div class="widget-content">
          <?php if(isset($message)){ 
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

            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th>
                  <th> Judul </th>
                  <th> Deskripsi </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($subtask) {
                  foreach ($subtask as $key => $data) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $data["judul_subtask"]; ?> </td>
                    <td> <?php echo $data["deskripsi"]; ?> </td>
                    <td>
                      <?php if(empty($data['url_file'])){ ?>
                          <a href="<?php echo base_url().'task/filesubtask?idtask='.$data['id_task'].'&idsubtask='.$data['id_subtask'].'&status='.$status;?>" class="btn btn-small btn-success" title='Upload File'>Upload file</a>
                      <?php }
                      else{ ?>
                          <a class="btn btn-small btn-info" onclick="lihatDetail('<?php echo $data["url_file"]; ?>')" data-toggle="modal" data-target="#myModal">Lihat File</a>
                      <?php }?>
                          <a href="<?php echo base_url().'task/editsubtask?idsubtask='.$data['id_subtask'].'&status='.$status;?>" class="btn btn-small btn-secondary" title="Sunting Sub Task"><span class="icon icon-edit"></span></a>
                          <a href="<?php echo base_url().'task/hapussubtask?idsubtask='.$data['id_subtask'].'&idtask='.$data['id_task'].'&status='.$status;?>" class="btn btn-small btn-danger" title="Hapus Sub Task" onclick="return confirm('Apakah Anda yakin menghapus sub pekerjaan ini?')"><span class="icon icon-trash"></span></a>
                    </td>
                  </tr>
                <?php 
                  }
                } 
                ?>                
              </tbody>
            </table>
                  <div class="form-actions">
                    <a href="<?php echo base_url().'task/tambahsubtask?idtask='.$idtask;?>" class="btn btn btn-secondary" title="Tambah Sub Pekerjaan"><span class="icon icon-plus"></span><strong> Tambah Sub Pekerjaan</strong></a>
                  </div>
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

  function lihatDetail(file_path){
    $('#isidetail').html('');
    $('#isidetail').append('<img src="<?php echo base_url()?>document/'+file_path+'">');
  }

  function statusOnChange(){
    var status = $('#status').val();
    if(status){
      window.location.href = "<?php echo base_url();?>task/listtask?status="+status;
    }
  }

</script>