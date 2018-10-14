<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar </h3>
          </div>
          
          <div class="widget-content">
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Bulan </th>
                  <th> Nama </th>
                  <th> Gaji </th>
                  <th> Aksi </th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($karyawan_salary as $key => $salary) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo date('d-m-Y', strtotime($salary["slip_month"]))?></td>
                    <td> <?php echo $salary["profile"]["profile_firstname"].' '.$salary["profile"]["profile_lastname"]?> </td>
                    <?php $total_salary = $salary["nilai_kontrak"]+$salary["mengajar"]+$salary["mengajar_luar"]+$salary["piket"]+$salary["pembahasan"]+$salary["pembahasan_luar"]+$salary["kelebihan_jam"] -$salary["cicilan"]-$salary["pinalti"]-$salary["keterlambatan"]; ?>
                    <td> <?php echo number_format($total_salary, 0, ',', '.').',-'?> </td>
                    <td> <a href="<?php echo base_url().'karyawan/salary_print/'.$salary["slip_id"]; ?>" target="blank" class="btn btn-small btn-warning">Cetak</a> </td>
                  </tr>
                <?php 
                  }
                ?>
                
              </tbody>
            </table>
          </div>
        </div>
    </div>

</div>