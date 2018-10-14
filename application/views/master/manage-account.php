<div class="row">
    <form id="edit-profile" class="form-horizontal" method="post">
    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Informasi Akun Cabang</h3>
        </div>
        <div class="widget-content">
            <fieldset>
                <input type="hidden" name="branch_id" value="<?php echo isset($detail_account) ? $detail_account['branch_id'] : ''; ?>">
                <div class="control-group">                     
                    <label class="control-label" for="email">Nama</label>
                    <div class="controls">
                        <input type="text" class="span4" name="email" value="<?php echo isset($detail_account) ? $detail_account['branch_name'] : ''; ?>" placeholder="Nama Lengkap">                      
                    </div>    
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" class="span4" name="email" value="<?php echo isset($detail_account) ? $detail_account['branch_name'] : ''; ?>" placeholder="Email">                      
                    </div>    
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input type="text" class="span4" name="username" value="<?php echo isset($detail_account) ? $detail_account['branch_name'] : ''; ?>" placeholder="Username">                      
                    </div>    
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="text" class="span4" name="password" value="<?php echo isset($detail_account) ? $detail_account['branch_name'] : ''; ?>" placeholder="Password">                      
                    </div>    
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="passwordConf">Konfirmasi Password</label>
                    <div class="controls">
                        <input type="text" class="span4" name="passwordConf" value="<?php echo isset($detail_account) ? $detail_account['branch_name'] : ''; ?>" placeholder="Konfirmasi Password">                      
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="branch">Cabang</label>
                    <div class="controls">
                        <?php $branch_kota = isset($detail_account) ? $detail_account['id_kota'] : ''; ?>
                        <?php echo form_dropdown('branch', $branches, $branch_kota, 'class="span4"'); ?>
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="role">Role</label>
                    <div class="controls">
                        <?php $branch_kota = isset($detail_account) ? $detail_account['id_kota'] : ''; ?>
                        <?php echo form_dropdown('role', $roles, $branch_kota, 'class="span4"'); ?>
                    </div>
                </div>
            </fieldset>

        </div>
      </div>
    </div>

    <div class="span12">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="save_branch" value="submit">Save</button>
            <button class="btn">Cancel</button>
        </div>
    </div>
    </form>

</div>