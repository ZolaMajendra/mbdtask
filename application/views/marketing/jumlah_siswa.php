<div class="row">

    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3><?php echo $_title; ?></h3>
        </div>
        <div class="widget-content">
                <!-- <fieldset>                   -->                 
                  <div class="control-group" id="lapHarianCtn">                                         
                    <table class="table table-striped table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th> Kelas </th>
                          <th> Jumlah </th>
                        </tr>
                      </thead>
                      <tbody id="tblctn">
                        <?php foreach($data_siswa as $idx => $value){ ?>
                          <tr>
                            <td><?php echo $idx+1; ?></td>
                            <td><?php echo $value['kelas']; ?></td>
                            <td><?php echo $value['jumlah_siswa']." siswa"; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>                                                    
                  
                  <div class="form-actions">                    
                    <button class="btn" onclick="cetak()">Cetak</button>
                  </div>
                <!-- </fieldset> -->
        </div>
      </div>
    </div>

</div>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mohon Tunggu</h4>
      </div>
      <div class="modal-body" align="center">
          <img src="<?php echo base_url()?>assets/img/ajax-load.gif">           
      </div>
    </div>
  </div>
</div>