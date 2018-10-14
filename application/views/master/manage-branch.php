<div class="row">
    <form id="edit-profile" class="form-horizontal" method="post">
    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Informasi Kantor Cabang</h3>
        </div>
        <div class="widget-content">
            <fieldset>
                <input type="hidden" name="branch_id" value="<?php echo isset($detail_branch) ? $detail_branch['branch_id'] : ''; ?>">                
                <div class="control-group">                     
                    <label class="control-label" for="firstname">Nama Cabang</label>
                    <div class="controls">
                        <input type="text" class="span4" name="branch_name" value="<?php echo isset($detail_branch) ? $detail_branch['branch_name'] : ''; ?>" placeholder="Nama Cabang">                      
                    </div>    
                </div>
                
                <div class="control-group">                     
                    <label class="control-label" for="phoneNumber">Alamat</label>
                    <div class="controls">
                        <input type="text" class="span4" name="branch_address" value="<?php echo isset($detail_branch) ? $detail_branch['branch_address'] : ''; ?>" placeholder="Alamat">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="city">Kota</label>
                    <div class="controls">
                        <?php $branch_kota = isset($detail_branch) ? $detail_branch['id_kota'] : ''; ?>
                        <?php echo form_dropdown('city', $list_kota, $branch_kota, 'class="span4"'); ?>
                    </div>
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="branch_telp">No. Telp</label>
                    <div class="controls">
                        <input type="text" class="span4" name="branch_telp" value="<?php echo isset($detail_branch) ? $detail_branch['branch_telp'] : ''; ?>" placeholder="No. Telp">
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