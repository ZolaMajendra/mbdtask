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
                        <input type="text" class="span3" name="txtFullname" value="<?php echo isset($detail_account['profile_firstname']) ? $detail_account['profile_firstname'].' '.$detail_account['profile_lastname'] : ''?>" placeholder="Nama Lengkap Karyawan">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtAppointment">Jabatan</label>
                    <div class="controls">
                        <?php echo $appointment = isset($detail_account['appointment']['appoitnmen_id']) ? $detail_account['appointment']['appoitnmen_id'] : FALSE; ?>
                        <?php echo form_dropdown('txtAppointment', $list_jabatan, $appointment, 'class="span3"'); ?>
                    </div>    
                </div>
                
                <div class="control-group">                     
                    <label class="control-label" for="phoneNumber">No. HP</label>
                    <div class="controls">
                        <input type="text" class="span3" name="phoneNumber" value="<?php echo isset($detail_account['phone_number']) ? $detail_account['phone_number'] : ''; ?>" placeholder="No. HP Karyawan">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                        <input type="text" class="span3" name="txtAddress" value="<?php echo isset($detail_account['address']) ? $detail_account['address'] : ''; ?>" placeholder="Alamat Karyawan">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtBirthPlace">Tempat Lahir</label>
                    <div class="controls">
                        <input type="text" class="span3" name="txtBirthPlace" value="<?php echo isset($detail_account['birthplace']) ? $detail_account['birthplace'] : ''; ?>" placeholder="Tempat Lahir">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="txtBirthDate">Tanggal Lahir</label>
                    <div class="controls">
                        <input type="text" class="span3 date_picker" name="txtBirthDate" value="<?php echo isset($detail_account['birthdate']) ? date('d-m-Y', strtotime($detail_account['birthdate'])) : ''; ?>" placeholder="Tanggal Lahir">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="lastStudy">Pendidikan Terakhir</label>
                    <div class="controls">
                        <select name="lastStudy" class="span3">
                            <?php $education = isset($detail_account['education']) ? isset($detail_account['education']) : '';?>
                            <option value="0">--pendidikan--</option>
                            <option value="SMA" <?php $education=='SMA' ? 'selected' : ''; ?>> SMA/SMK</option>
                            <option value="D1" <?php $education=='D1' ? 'selected' : ''; ?>> Diploma (D1)</option>
                            <option value="D3" <?php $education=='D3' ? 'selected' : ''; ?>> Diploma (D3)</option>
                            <option value="S1" <?php $education=='S1' ? 'selected' : ''; ?>> Sarjana (S1)</option>
                            <option value="S2" <?php $education=='S2' ? 'selected' : ''; ?>> Magister (S2)</option>
                            <option value="S3" <?php $education=='S3' ? 'selected' : ''; ?>> Doktor (S3)</option>
                        </select>
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="institutionStudy">Institusi</label>
                    <div class="controls">
                        <input type="text" class="span3" name="institutionStudy" value="<?php echo isset($detail_account['college']) ? $detail_account['college'] : ''; ?>" placeholder="Institusi Pendidikan">
                    </div>    
                </div>

                <div class="control-group">                     
                  <label class="control-label" for="bankName">Nama Bank</label>
                  <div class="controls">
                    <input type="text" class="span3" name="bankName" value="<?php echo isset($detail_account['bank_name']) ? $detail_account['bank_name'] : ''; ?>" placeholder="Nama Bank">
                  </div>    
                </div>

                <div class="control-group">                     
                  <label class="control-label" for="bankAccount">No. Rekening</label>
                  <div class="controls">
                    <input type="text" class="span3" name="bankAccount" value="<?php echo isset($detail_account['bank_account']) ? $detail_account['bank_account'] : ''; ?>" placeholder="No.Rekening">
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
                        <?php $branch = isset($detail_account['branch_id']) ? $detail_account['branch_id'] : ''; ?>
                        <?php echo form_dropdown("txtBranch", $list_branch, $branch, 'class="span3"');?>
                      </div>
                    </div>

                    <div class="control-group">                     
                      <label class="control-label" for="txtEmail">Email</label>
                      <div class="controls">
                        <input type="text" class="span3" name="txtEmail" value="<?php echo isset($detail_account['account']['account_email']) ? $detail_account['account']['account_email'] : ''; ?>" placeholder="Email Karyawan">
                      </div>    
                    </div>   

                    <div class="control-group">                     
                      <label class="control-label" for="txtUsername">Username</label>
                      <div class="controls">
                        <input type="text" class="span3" name="txtUsername" value="<?php echo isset($detail_account['account']) ? $detail_account['account']['account_username'] : ''; ?>" placeholder="Username Karyawan" <?php echo isset($detail_account['account']) ? 'readonly' : ''?>>
                      </div>    
                    </div>
                    <?php if (!isset($detail_account['account'])){?>
                    <div class="control-group">                     
                      <label class="control-label" for="txtPassword">Password</label>
                      <div class="controls">
                        <input type="password" class="span3" name="txtPassword" value="" placeholder="Password">
                      </div>    
                    </div>
                    <?php } ?>
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