<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Kas Kecil</h3>
        </div>
        <div class="widget-content">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th> <strong>No</strong></th>
              <th> <strong>Tanggal</strong></th>
              <th> <strong>No. Item</strong></th>              
              <th> <strong>Uraian</strong></th>
              <th> <strong>Jumlah</strong></th>
              <th> <strong>Harga Satuan</strong></th>
              <th> <strong>Debit</strong></th>
              <th> <strong>Kredit</strong></th>
              <th> <strong>Saldo</strong></th>
            </tr>                
            </thead>
            <?php for ($i=0; $i < count($dataprint) - 1; $i++) {
              //var_dump($dataprint);die();
              echo "<tr>";
              echo "<td>".($i+1)."</td>";
              echo "<td>".$dataprint[$i]['tgl_kk']."</td>";
              echo "<td>".$dataprint[$i]['no_item']."</td>";
              echo "<td>".$dataprint[$i]['uraian_item']."</td>";
              echo "<td>".$dataprint[$i]['jumlah_item']."</td>";
              echo "<td>Rp. ".$dataprint[$i]['harga_satuan_rp']."</td>";
              echo "<td>Rp. ".$dataprint[$i]['debit_rp']."</td>";
              echo "<td>Rp. ".$dataprint[$i]['kredit_rp']."</td>";
              echo "<td></td>";
              echo "</tr>";              
            }?>            
            <tr><td colspan=6><strong>Total</strong></td><td><strong>Rp. <?php echo $dataprint[sizeof($dataprint)-1]['tot_deb_rp']; ?></strong></td><td><strong>Rp. <?php echo $dataprint[sizeof($dataprint)-1]['tot_kre_rp']; ?></strong></td><td><strong>Rp. <?php echo $dataprint[sizeof($dataprint)-1]['saldo_rp']?></strong></td></tr>
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