<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3><?php echo $_title?></h3>
        </div>
        <div class="widget-content">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th> <strong>No</strong></th>
              <th> <strong>Nama</strong></th>
              <th> <strong>No. Kwitansi</strong></th>              
              <th> <strong>Jenis</strong></th>
              <th> <strong>Tanggal</strong></th>
              <th> <strong>Jumlah</strong></th>
              <th> <strong>Kekurangan</strong></th>
            </tr>                
            </thead>
            <?php $ctr=1; for ($i=0; $i < count($pembayaran); $i++) {
              if($pembayaran[$i]['jenis']){
                echo "<tr>";
                echo "<td>".($ctr++)."</td>";
                echo "<td>".$pembayaran[$i]['siswa'][0]['nama']."</td>";
                echo "<td>".$pembayaran[$i]['no_kwitansi']."</td>";
                echo "<td>".$pembayaran[$i]['jenis']."</td>";
                echo "<td>".$pembayaran[$i]['tgl_pembayaran']."</td>";
                echo "<td>Rp. ".number_format($pembayaran[$i]['jumlah'],2,",",".")."</td>";
                echo "<td>Rp. ".number_format($pembayaran[$i]["biaya_bimbel"],2,",",".")."</td>";
                echo "</tr>";
              }  
            }?>            
          </table>
        </div>
      </div>
    </div>

</div>
<script type="text/javascript">
  window.onload = function(){
    var printContents = document.getElementById('ctn').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     
     window.print();

    //document.body.innerHTML = originalContents;
  }
</script>