<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar Program Kerja</h3>
          </div>
          
          <div class="widget-content">
            <div class="botton_add">
                <a href="<?php echo base_url()?>psycocare/add_proker" type="button" class="btn btn-primary"><i class="btn-icon-only icon-plus"> Tambah Proker </i></a>
            </div>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Tahun Ajaran </th>
                  <th> Semester </th>
                  <th> Date Created </th>
                  <th> Created by </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($proker_psycocare) {
                  foreach ($proker_psycocare as $key => $proker) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $proker["thn_ajaran"]; ?> </td>
                    <td> <?php echo $proker["semester"]; ?> </td>
                    <td> <?php echo date('d-m-Y',strtotime($proker["created_timestamp"])); ?> </td>
                    <td> <?php echo $proker["created_by"]; ?></td>
                    <td>
                      <a href="<?php echo base_url().'document/proker/'.$proker['filename']?>" class="btn btn-small btn-success" target="_blank"> <i class="btn-icon-only  icon-download-alt" > Download </i></a>
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