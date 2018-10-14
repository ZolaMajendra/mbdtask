<style type="text/css">
    .control-label.left{
        /*text-align: left;*/
    }
</style>
<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Absen Karyawan</h3>
          </div>
          
          <div class="widget-content">
            <form class="form-horizontal" method="POST">
                <div class="control-group">                     
                    <label class="control-label left" for="firstname">Tanggal</label>
                    <div class="controls">

                        <input type="text" class="span2 date_picker" name="date_attendance" value="<?php echo $date_selected?>" placeholder="Tanggal Kehadiran" readonly>
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>    
                </div>
                <table class="table table-striped table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th style="width:8%"> No. </th> 
                      <th style="width:40%"> Nama </th>
                      <th style="width:30%"> Jabatan </th>
                      <th style="width:22%"> Kehadiran </th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  foreach ($karyawan_data as $key => $karyawan) {
                  ?>
                      <tr>
                        <td> 
                            <?php echo $key+1; ?> 
                            <input type="hidden" name="accounts[]" value="<?php echo $karyawan["account_id"] ?>">
                        </td>
                        <td> <?php echo $karyawan["profile_firstname"].' '.$karyawan["profile_lastname"]; ?> </td>
                        <td> <?php echo $karyawan["appointment"]["appointment_name"]; ?> </td>
                        <td> 
                          <select name="attendance_note[]">
                              <option value="1"> Hadir </option>
                              <option value="2"> Ijin </option>
                              <option value="3"> Sakit </option>
                              <option value="4"> Tanpa Keterangan </option>
                          </select>
                        </td>
                      </tr>
                  <?php
                  }
                  ?>
                    
                  </tbody>
                </table>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" name="save_attendance" value="submit">Save</button>
                    <button class="btn">Cancel</button>
                </div>
    
            </form>
          </div>
        </div>
    </div>

</div>