<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar Siswa</h3>
          </div>
          
          <div class="widget-content">
          <?php if(!empty($message)){ 
          if($message){ ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Data berhasil dihapus.
              </div>
            <?php }else { ?>
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Gagal!</strong> Data gagal dihapus!!!.
              </div>          
          <?php }} ?>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th>
                  <th> Nama </th>
                  <th> Kelas </th>
                  <th> Alamat </th>
                  <th> Sekolah </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($siswa) {
                  foreach ($siswa as $key => $data) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $data["nama"]; ?> </td>
                    <td> <?php echo $data["kelas"][0]["nama_kelas"]; ?> </td>
                    <td> <?php echo $data["alamat"]; ?> </td>
                    <td> <?php echo $data["sekolah"]; ?> </td>
                    <td> 
                      <a class="btn btn-small btn-success" onclick="lihatDetail('<?php echo $data['id_siswa']; ?>')" data-toggle="modal" data-target="#myModal">Lihat Detail</a>
                      <a href="<?php echo base_url().'siswa/editSiswa/'.$data['id_siswa']; ?>" class="btn btn-small btn-info">Edit</a>
                      <a href="<?php echo base_url().'siswa/hapusSiswa?id='.$data['id_siswa']; ?>" class="btn btn-small btn-danger" onclick="return confirm('Anda yakin menghapus data siswa: <?php echo $data['nama']?>')">Hapus</a>
                      <a href="<?php echo base_url().'siswa/cetakDataSiswa/'.$data['id_siswa']; ?>" target="blank" class="btn btn-small btn-warning">Cetak</a>
                    </td>
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

  function lihatDetail(id_siswa){
    // $('#isidetail').append("halo, "+id_siswa);
    $('#isidetail').html('');
    $('#isidetail').append('<img src="<?php echo base_url()?>assets/img/ajax-load.gif">');
    $.ajax({
      url: '<?php echo base_url()?>siswa/getDetailSiswa',
      data: {id_siswa : id_siswa},
      typeData: 'json',
      type: 'POST',
      success: function(data){
        data = JSON.parse(data);
        var content = '<tr><td><strong>Nama</strong></td><td>'+data.nama+'</td></tr>'+
                      '<tr><td><strong>NIA</strong></td><td>'+data.nia+'</td></tr>'+
                      '<tr><td><strong>Agama</strong></td><td>'+data.agama+'</td></tr>'+
                      '<tr><td><strong>Program</strong></td><td>'+data.kelas+'</td></tr>'+
                      '<tr><td><strong>Telepon</strong></td><td>'+data.telepon+'</td></tr>'+
                      '<tr><td><strong>Alamat</strong></td><td>'+data.alamat+'</td></tr>'+
                      '<tr><td><strong>TTL</strong></td><td>'+data.tempat_lahir+', '+data.tgl_lahir+'</td></tr>'+
                      '<tr><td><strong>Ayah</strong></td><td>'+data.ayah_siswa+'</td></tr>'+
                      '<tr><td><strong>Telp Ayah</strong></td><td>'+data.telp_ayah+'</td></tr>'+
                      '<tr><td><strong>Ibu</strong></td><td>'+data.ibu_siswa+'</td></tr>'+
                      '<tr><td><strong>Telp Ibu</strong></td><td>'+data.telp_ibu+'</td></tr>';
        $('#isidetail').html('');
        $('#isidetail').append(content);
      }
    });
  }
</script>