<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar Kantor Cabang</h3>
          </div>
          
          <div class="widget-content">
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-detail-profile" aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="modal-detail-profile">Detail Profile</h3>
              </div>
              <div class="modal-body">
                  <form action="<?php echo base_url()?>master/manage_branch" method="POST">
                  <table class="table">
                  </table>
                  </form>
              </div>
              <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>

            <div class="botton_add">                
                <a href="<?php echo base_url()?>master/manage_branch" class="btn btn-primary"> Tambah Cabang </a>
            </div>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Nama </th>
                  <th> Alamat </th>
                  <th> No. Telp </th>
                  <th> Kota </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($branches) {
                  foreach ($branches as $key => $branch) { ?>
                  <tr>
                    <td> <?php echo $key+1; ?></td>
                    <td> <?php echo $branch["branch_name"]; ?> </td>
                    <td> <?php echo $branch["branch_address"]; ?></td>
                    <td> <?php echo $branch["branch_telp"]; ?> </td>
                    <td> <?php echo $branch["city"]["nama_kota"]; ?> </td>
                    <td> <?php echo ($branch["is_active"]==1) ? "Aktif" : "Tidak aktif"; ?> </td>
                    <td>
                      <a href="#" class="btn btn-small btn-success edit-modal" data-id="<?php echo $branch["branch_id"]?>"> Detail </a>
                      <a href="<?php echo base_url().'karyawan/inactivate_account/'.$branch["branch_id"] ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Nonaktifkan </i></a>
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