<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Pendapatan Harian</h3>
        </div>
        <div class="widget-content">
          <table class="table  table-bordered">
            <thead>
            <tr>
              <th> <strong>No</strong></th>
              <th> <strong>Tanggal</strong></th>
              <th> <strong>Program</strong></th>              
              <th> <strong>Jumlah</strong></th>
            </tr>                
            </thead>
            <?php foreach ($dataprint as $key => $value) {
              echo "<tr>";
              echo "<td>".($key+1)."</td>";
              echo "<td>".$value['tgl_pembayaran']."</td>";
              echo "<td>".$value['kelas']."</td>";
              echo "<td>Rp. ".$value['pendapatanrp']."</td>";
              echo "</tr>";
            }?>
            <tr><td colspan=3><strong>Total Pendapatan Tanggal <?php echo $tgl; ?></strong></td><td><strong>Rp. <?php echo $dataprint[sizeof($dataprint)-1]['totalrp'];?> </strong></td></tr>
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