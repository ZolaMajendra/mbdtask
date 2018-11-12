<div class="row">

    <div class="span8">
      <div class="widget" id="ctn">
      <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" width="300">
      <p><br/></p><!-- line break -->
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Data Siswa</h3>
        </div>
        <div class="widget-content">
          <table class="table">
            <tbody>
              <tr>
                <td> <strong>Nama</strong></td>
                <td>: <?php echo $siswa['nama']; ?></td>
              </tr>
              <tr>
                <td> <strong>NIA</strong></td>
                <td>: <?php echo $siswa['nia']; ?></td>
              </tr>
              <tr>
                <td> <strong>Alamat</strong></td>
                <td>: <?php echo ($siswa['alamat']); ?></td>
              </tr>
              <tr>
                <td> <strong>Kelas</strong></td>
                <td>: <?php echo $siswa['kelas']; ?></td>
              </tr>
              <tr>
                <td> <strong>Telepon</strong></td>
                <td>: <?php echo $siswa['telepon']; ?></td>
              </tr>
              <tr>
                <td> <strong>TTL</strong></td>
                <td>: <?php echo $siswa['tempat_lahir'].", ".$siswa['tgl_lahir']; ?></td>
              </tr>
              <tr>
                <td> <strong>Nama Ayah</strong></td>
                <td>: <?php echo $siswa['ayah_siswa']; ?></td>
              </tr>
              <tr>
                <td> <strong>Telepon Ayah</strong></td>
                <td>: <?php echo $siswa['telp_ayah']; ?></td>
              </tr>
              <tr>
                <td> <strong>Nama Ibu</strong></td>
                <td>: <?php echo $siswa['ibu_siswa']; ?></td>
              </tr>
              <tr>
                <td> <strong>Telepon Ibu</strong></td>
                <td>: <?php echo $siswa['telp_ibu']; ?></td>
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