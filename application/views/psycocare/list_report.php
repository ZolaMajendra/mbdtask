<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar Laporan</h3>
          </div>
          
          <div class="widget-content">
            <div class="botton_add">
                <a href="<?php echo base_url()?>psycocare/add_report" type="button" class="btn btn-primary"><i class="btn-icon-only icon-plus"> Tambah Laporan </i></a>
            </div>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Bulan </th>
                  <th> Tahun Ajaran </th>
                  <th> Semester </th>
                  <th> Date Created </th>
                  <th> Created by </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($laporan_psycocare) {
                  foreach ($laporan_psycocare as $key => $laporan) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $laporan["month"];?> </td>
                    <td> <?php echo $laporan["thn_ajaran"]; ?> </td>
                    <td> <?php echo $laporan["semester"]; ?> </td>
                    <td> <?php echo date('d-m-Y',strtotime($laporan["created_timestamp"])); ?> </td>
                    <td> <?php echo $laporan["created_by"]; ?></td>
                    <td>
                      <a href="<?php echo base_url().'document/laporan/'.$laporan['filename']?>" class="btn btn-small btn-success" target="_blank"> <i class="btn-icon-only  icon-download-alt" > Download </i></a>
                      <!-- <a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Delete </i></a> -->
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