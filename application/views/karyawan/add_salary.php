<style id='hideMonth'></style>

<div class="row">
    <form id="edit-profile" class="form-horizontal" method="post">
    <div class="span6">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Input Gaji Karyawan</h3>
        </div>
        <div class="widget-content">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="selectSemester">Nama</label>
                    <div class="controls">
                        <select name="karyawan" class="span4">
                            <?php 
                            foreach ($list_karyawan as $key => $karyawan) {
                            ?>
                                <option value="<?php echo $karyawan['account_id']; ?>"><?php echo $karyawan['profile_firstname'].' '.$karyawan['profile_lastname']?></option>
                            <?php
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="selectSemester">Bulan</label>
                    <div class="controls">
                        <input type="text" class="span4 month_picker" name="txtBulan" value="" placeholder="Bulan" readonly>
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="nilai_kontrak">Nilai Kontrak Harian</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="nilai_kontrak" value="" placeholder="Nilai kontrak">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="mengajar">Mengajar</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="mengajar" value="" placeholder="Mengajar">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="mengajar_luar">Mengajar Luar</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="mengajar_luar" value="" placeholder="Mengajar luar">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="piket">Piket</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="piket" value="" placeholder="Piket">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="pembahasan">Pembahasan Dalam Kota</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="pembahasan" value="" placeholder="Pembahasan dalam kota">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="pembahasan_luar">Pembahasan Luar Kota</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="pembahasan_luar" value="" placeholder="Pembahasan Luar Kota">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="kelebihan_jam">Kelebihan jam kerja</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="kelebihan_jam" value="" placeholder="Kelebihan jam kerja">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="tunjangan">Tunjangan</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="tunjangan" value="" placeholder="Tunjangan">
                    </div>
                </div>
            </fieldset>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Pengurangan </h3>
        </div>
        <div class="widget-content">
            <fieldset>                  
                <div class="control-group">                     
                    <label class="control-label" for="sisa_pinjaman">Sisa Pinjaman</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="sisa_pinjaman" value="" placeholder="Sisa Pinjaman">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="tgl_pinjaman">Tgl Pinjaman</label>
                    <div class="controls">
                        <input type="text" class="span4 date_picker" name="tgl_pinjaman" value="" placeholder="Tanggal Pinjam" readonly="">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="cicilan">Cicilan</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="cicilan" value="" placeholder="Cicilan">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="pinalti">Pinalti</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="pinalti" value="" placeholder="Pinalti">
                    </div>
                </div>
                <div class="control-group">                     
                    <label class="control-label" for="keterlambatan">Keterlambatan</label>
                    <div class="controls">
                        <input type="text" class="span4 price-field" name="keterlambatan" value="" placeholder="Keterlambatan">
                    </div>
                </div>
            </fieldset>
        </div>
        
      </div>
    </div>
    <div class="span12">
        <div class="widget-footer">
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="add_salary" value="submit">Save</button>
                <button class="btn">Cancel</button>
            </div>
        </div>
    </div>
    </form>

</div>