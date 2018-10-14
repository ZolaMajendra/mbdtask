<div class="row">
    <form id="edit-profile" class="form-horizontal" method="post">
    <div class="span6">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Informasi Profil Karyawan</h3>
        </div>
        <div class="widget-content">
            <fieldset>                  
                <div class="control-group">                     
                    <label class="control-label" for="firstname">Nama</label>
                    <div class="controls">
                        <input type="text" class="span3" name="txtFullname" value="<?php echo $detail_karyawan['profile_firstname'].' '.$detail_karyawan['profile_lastname']; ?>" placeholder="Nama Lengkap Karyawan">                      
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtAppointment">Jabatan</label>
                    <div class="controls">
                        <?php echo form_dropdown('txtAppointment', $list_jabatan, $detail_karyawan['appointment_id'], 'class="span3"'); ?>
                    </div>    
                </div>
                
                <div class="control-group">                     
                    <label class="control-label" for="phoneNumber">No. HP</label>
                    <div class="controls">
                        <input type="text" class="span3" name="phoneNumber" value="<?php echo $detail_karyawan['phone_number']?>" placeholder="No. HP Karyawan">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                        <input type="text" class="span3" name="txtAddress" value="<?php echo $detail_karyawan['profile_address']?>" placeholder="Alamat Karyawan">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtBirthPlace">Tempat Lahir</label>
                    <div class="controls">
                        <input type="text" class="span3" name="txtBirthPlace" value="<?php echo $detail_karyawan['birthplace']?>" placeholder="Tempat Lahir">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtBirthDate">Tanggal Lahir</label>
                    <div class="controls">
                        <input type="text" class="span3 date_picker" name="txtBirthDate" value="<?php echo date('d-m-Y', strtotime($detail_karyawan['birthdate']))?>" placeholder="Tanggal Lahir" readonly>
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="lastStudy">Pendidikan Terakhir</label>
                    <div class="controls">
                        <select name="lastStudy" class="span3">
                            <option value="0">--pendidikan--</option>
                            <option value="SMA" <?php echo ($detail_karyawan['education']=='SMA') ? 'selected' : ''; ?>> SMA/SMK</option>
                            <option value="D1" <?php echo ($detail_karyawan['education']=='D1') ? 'selected' : ''; ?>> Diploma (D1)</option>
                            <option value="D3" <?php echo ($detail_karyawan['education']=='D3') ? 'selected' : ''; ?>> Diploma (D3)</option>
                            <option value="S1" <?php echo ($detail_karyawan['education']=='S1') ? 'selected' : ''; ?>> Sarjana (S1)</option>
                            <option value="S2" <?php echo ($detail_karyawan['education']=='S2') ? 'selected' : ''; ?>> Magister (S2)</option>
                            <option value="S3" <?php echo ($detail_karyawan['education']=='S3') ? 'selected' : ''; ?>> Doktor (S3)</option>
                        </select>
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="institutionStudy">Institusi</label>
                    <div class="controls">
                        <input type="text" class="span3" name="institutionStudy" value="<?php echo $detail_karyawan['college']?>" placeholder="Institusi Pendidikan">
                    </div>    
                </div>

                <div class="control-group">                     
                  <label class="control-label" for="bankName">Nama Bank</label>
                  <div class="controls">
                    <input type="text" class="span3" name="bankName" value="<?php echo $detail_karyawan['bank_name']?>" placeholder="Nama Bank">
                  </div>    
                </div>

                <div class="control-group">                     
                  <label class="control-label" for="bankAccount">No. Rekening</label>
                  <div class="controls">
                    <input type="text" class="span3" name="bankAccount" value="<?php echo $detail_karyawan['bank_account']?>" placeholder="No.Rekening">
                  </div>    
                </div>
            </fieldset>

        </div>
      </div>
    </div>

    <div class="span6">
        <div class="widget">

            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Informasi Account Karyawan</h3>
            </div>
            <div class="widget-content">

                <fieldset>
                    <div class="control-group">                     
                      <label class="control-label" for="txtBranch">Cabang</label>
                      <div class="controls">                        
                        <?php echo form_dropdown("txtBranch", $list_branch, $detail_karyawan['branch_id'], 'class="span3"');?>                    
                      </div>    
                    </div>

                    <div class="control-group">                     
                      <label class="control-label" for="txtEmail">Email</label>
                      <div class="controls">
                        <input type="text" class="span3" name="txtEmail" value="<?php echo $detail_karyawan['account']['account_email']?>" placeholder="Email Karyawan" readonly>
                      </div>    
                    </div>   

                    <div class="control-group">                     
                      <label class="control-label" for="txtUsername">Username</label>
                      <div class="controls">
                        <input type="text" class="span3" name="txtUsername" value="<?php echo $detail_karyawan['account']['account_username']?>" placeholder="Username Karyawan" readonly>                      
                      </div>    
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

    <div class="span12">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="save_karyawan" value="submit">Save</button>
            <button class="btn">Cancel</button>
        </div>
    </div>
    </form>

</div>