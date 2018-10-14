<div class="row">

    <div class="span12">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Histori Pembayaran Siswa</h3>
          </div>
          
          <div class="widget-content">
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th>
                  <th> Nama </th>
                  <th> No. Kwitansi </th>
                  <th> Jenis </th>
                  <th> Tanggal </th>
                  <th> Jumlah </th>
                  <th> Kekurangan </th>
                  <th> Persentase </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($pembayaran) {
                  $biaya_bimbel = '';
                  foreach ($pembayaran as $key => $data) {
                    if($data['jenis']){ ?>                
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $data["siswa"][0]["nama"]; ?> </td>
                    <td> <?php echo $data["no_kwitansi"]; ?> </td>
                    <td> <?php echo $data["jenis"]; ?> </td>
                    <td> <?php echo date('d-m-Y', strtotime($data["tgl_pembayaran"])); ?> </td>
                    <td> <?php echo "Rp. ". number_format($data["jumlah"],2,",","."); ?> </td>
                    <td> <?php echo "Rp. ". number_format($data["biaya_bimbel"],2,",","."); ?> </td>
                    <td> <?php echo number_format(100-(($data["biaya_bimbel"]/$biaya_bimbel)*100),2,",",".").'%';?> </td>
                    <td>
                      <a href="<?php echo base_url().'siswa/cetak_kwitansi/'.$data['id_pembayaran']; ?>" target="blank" class="btn btn-small btn-warning">Cetak Kwitansi</a>
                      <a href="<?php echo base_url().'siswa/cetak_pembayaran_siswa/'.$data['siswa'][0]['id_siswa']; ?>" target="blank" class="btn btn-small btn-success">Cetak Data</a>
                    </td>            
                  </tr>
                <?php 
                  }else{
                    $biaya_bimbel = $data["biaya_bimbel"];
                  }
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
<script type="text/javascript">
  $(function(){
    $('#myTable').dataTable();
  });
</script>