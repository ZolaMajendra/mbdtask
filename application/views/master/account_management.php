<div class="row">

    <div class="span10">
      <div class="widget">
          <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Daftar Akun</h3>
          </div>
          
          <div class="widget-content">
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-detail-profile" aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="modal-detail-profile">Detail Akun</h3>
              </div>
              <div class="modal-body">
                  <form action="<?php echo base_url()?>master/manage_account" method="POST">
                  <table class="table">
                  </table>
                  </form>
              </div>
              <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>

            <div class="botton_add">                
                <a href="<?php echo base_url()?>master/manage_account" class="btn btn-primary"> Tambah Akun </a>
            </div>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th> No. </th> 
                  <th> Email </th>
                  <th> Username </th>
                  <th> Cabang </th>
                  <th> Role </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($accounts) {
                  $no = 1;
                  foreach ($accounts as $key => $account) { 
                    if($account["account_id"] > 2){?>
                  <tr>
                    <td> <?php echo $no ?></td>
                    <td> <?php echo $account["account_email"]; ?> </td>
                    <td> <?php echo $account["account_username"]; ?></td>
                    <td> <?php echo $account["branch"]["branch_name"]; ?> </td>
                    <td> <?php echo $roles[$account["account_role"]["role_id"]]; ?> </td>
                    <td>
                      <a href="#" class="btn btn-small btn-success edit-modal" data-id="<?php echo $account["account_id"]; ?>"> Detail </a>
                      <a href="<?php echo base_url().'master/inactivate_account/'.$account["account_id"] ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Nonaktifkan </i></a>
                    </td>
                  </tr>
                <?php
                    $no++; 
                    }
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