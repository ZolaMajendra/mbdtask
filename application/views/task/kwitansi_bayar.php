<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Kwitansi Pembayaran Siswa</h3>
        </div>
        <div class="widget-content">
          <table class="table">
            <tbody>
              <tr>
                <td> <strong>No. Kwitansi</strong></td>
                <td>: <?php echo $pembayaran['no_kwitansi']; ?></td>
              </tr>
              <tr>
                <td> <strong>Terima Dari</strong></td>
                <td>: <?php echo $pembayaran['siswa'][0]['nama']; ?></td>
              </tr>
              <tr>
                <td> <strong>Uang Sejumlah</strong></td>
                <td>: Rp. <?php echo number_format($pembayaran['jumlah'],2,",","."); ?></td>
              </tr>
              <tr>
                <td> <strong>Untuk Pembayaran</strong></td>
                <td>: <?php echo $pembayaran['jenis']; ?></td>
              </tr>
            </tbody>
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