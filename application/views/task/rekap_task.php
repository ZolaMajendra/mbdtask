<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Rekap Pekerjaan</h3>
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
              <label class="control-label" for="asignee">Tanggal</label>
              <div class="controls">
                <input type="text" class="span2" id="tglmulai" name="tglmulai" value="<?php echo !empty($mulai) ? $mulai : '' ?>" placeholder="Tanggal Awal">
                <input type="text" class="span2" id="tglakhir" name="tglakhir" value="<?php echo !empty($akhir) ? $akhir : '' ?>" placeholder="Tanggal Akhir">
                <select class="span2" id="status">
                  <option value="ALL">Semua Status</option>
                  <option value="TODO" <?php echo ($status=="TODO") ? "selected" : "" ?>>TO DO</option>
                  <option value="PROGRESS" <?php echo ($status=="PROGRESS") ? "selected" : "" ?>>IN PROGRESS</option>
                  <option value="DONE" <?php echo ($status=="DONE") ? "selected" : "" ?>>DONE</option>
                </select>
                <button class="btn btn-primary" onclick="cari()">Cari</button>
              </div>    
            </div>

            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th>
                  <th> Nomor Tiket </th>
                  <th> Asignee </th>
                  <th> Deskripsi </th>
                  <th> Pekerjaan Direkam </th>
                  <th> Pekerjaan Diupdate </th>
                  <th> Status </th>
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
                    <td> <?php echo $data["created_at"]; ?> </td>
                    <td> <?php echo $data["updated_at"]; ?> </td>
                    <td> <?php echo $data["status_task"]; ?> </td>
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
      $("#tglmulai").datepicker({
        dateFormat: 'dd-mm-yy'
      });
    });

  $(function(){
      $("#tglakhir").datepicker({
        dateFormat: 'dd-mm-yy'
      });
    });

  $(function(){
    $('#myTable').dataTable();
  });

  function cari(){
    var status = $('#status').val();
    var tglmulai = $("#tglmulai").val();
    var tglakhir = $("#tglakhir").val();
    
    /*if (status === "" || tglmulai === "" || tglakhir === ""){
      alert("Mohon lengkapi tanggal dan status pekerjaan");
    }*/

    if(status){
      window.location.href = "<?php echo base_url(); ?>task/rekap?status="+status+"&tglmulai="+tglmulai+"&tglakhir="+tglakhir;
    }
  }

</script>