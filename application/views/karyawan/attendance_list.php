<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Rekap Absensi Karyawan</h3>
          </div>
          
          <div class="widget-content">
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Date </th>
                  <th> Name </th>
                  <th> Attendance </th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($karyawan_attendance as $key => $attendance) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo date('d-m-Y', strtotime($attendance["attendance_date"]))?></td>
                    <td> <?php echo $attendance["profile"]["profile_firstname"].' '.$attendance["profile"]["profile_lastname"]?> </td>
                    <td> <?php echo $attendance_notes[$attendance["attendance"]]; ?> </td>                    
                  </tr>
                <?php 
                  }
                ?>
                
              </tbody>
            </table>
          </div>
          <!-- /widget-content --> 
        </div>
    </div>

</div>