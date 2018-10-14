<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Kas Besar</h3>
        </div>
        <div class="widget-content">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th> <strong>No</strong></th>
              <th> <strong>Tanggal</strong></th>            
              <th> <strong>Uraian</strong></th>
              <th> <strong>Debit</strong></th>
              <th> <strong>Kredit</strong></th>
              <th> <strong>Saldo</strong></th>
            </tr>                
            </thead>
            <?php 
              //var_dump($dataprint);die();
              echo "<tr>";
              echo '<td rowspan="7">1</td>';
              echo '<td rowspan="7">'.$tgl.'</td>';
              echo '<tr><td><strong>SALDO AWAL</strong></td><td></td><td></td><td></td></tr>';
              echo '<tr><td>Penerimaan dari bimbel</td>';
              echo '<td>Rp. '.$dataprint['p_bimbel_rp'].'</td><td></td><td></td></tr>';
              echo '<tr><td>Penerimaan pusat</td>';
              echo '<td>Rp. '.$dataprint['p_pusat_rp'].'</td><td></td><td></td></tr>';
              echo '<tr><td>Pengeluaran kas kecil</td>';
              echo '<td></td><td>Rp. '.$dataprint['pengeluaran_rp'].'</td><td></td></tr>';
              echo '<tr><td>Pengisian kas kecil</td>';
              echo '<td></td><td>Rp. '.$dataprint['pengisian_rp'].'</td><td></td></tr>';
              echo '<tr><td>Setor ke: <strong>'.$dataprint['setor_kepada'].'</strong></td>';
              echo '<td></td><td>Rp. '.$dataprint['setor_rp'].'</td><td></td></tr>';
              echo '</tr>';
            ?>
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