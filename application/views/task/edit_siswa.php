<div class="row">

    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Form Edit Data Siswa</h3>
        </div>
        <div class="widget-content">
        <?php if(!empty($message)){ 
          if($message){ ?>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Berhasil!</strong> Data berhasil diupdate.
            </div>
          <?php }else { ?>
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Gagal!</strong> Data gagal diupdate.
            </div>          
        <?php }} ?>
            <form method="post" class="form-horizontal" action="<?php echo base_url();?>siswa/updateSiswa">
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="firstname">Nama</label>
                    <div class="controls">
                      <input type="text" class="span3" id="nama" name="nama" value="<?php echo $datas['nama']?>" placeholder="Nama Lengkap Siswa">                      
                      <input type="text" class="span2" id="namapgl" name="namapgl" value="<?php echo $datas['panggilan']?>" placeholder="Nama Panggilan">
                      <input type="hidden" class="span2" id="idsiswa" name="idsiswa" value="<?php echo $datas['id_siswa']?>" placeholder="Nama Panggilan">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="jenjang">Jenjang</label>
                    <div class="controls">
                      <!-- <input type="text" class="span2" id="kelas" name="kelas" value="" placeholder="Kelas Siswa"> -->
                      <?php echo form_dropdown('jenjang', $jenjang, '', 'class="span2" id="jenjang" onchange="jenjangOnChange()"'); ?>
                    </div>    
                  </div>
                                    
                  <div class="control-group">                     
                    <label class="control-label" for="kelas">Kelas</label>
                    <div class="controls">
                      <!-- <input type="text" class="span2" id="kelas" name="kelas" value="" placeholder="Kelas Siswa"> -->
                      <?php echo form_dropdown('kelas', $dd_kelas, '', 'class="span2" id="kelas"'); ?>
                    </div>    
                  </div>      

                  <div class="control-group">                     
                    <label class="control-label" for="kelas">Kelas di UNIQ</label>
                    <div class="controls">
                      <!-- <input type="text" class="span2" id="kelas" name="kelas" value="" placeholder="Kelas Siswa"> -->
                      <?php echo form_dropdown('kelas_uniq', $dd_kelas_uniq, $datas["id_kelas"], 'class="span2"'); ?>
                    </div>    

                  </div>                
                  
                  <div class="control-group">                     
                    <label class="control-label" for="sekolah">Sekolah</label>
                    <div class="controls">
                      <input type="text" class="span4" id="sekolah" name="sekolah" value="<?php echo $datas['sekolah']?>" placeholder="Sekolah Siswa">
                    </div>    
                  </div>                    
                  
                  <div class="control-group">                     
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                      <input type="text" class="span4" id="alamat" name="alamat" value="<?php echo $datas['alamat']?>" placeholder="Alamat Siswa">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="ttl">TTL</label>
                    <div class="controls">
                      <input type="text" class="span3" id="tempat" name="tempat" value="<?php echo $datas['tempat_lahir']?>" placeholder="Tempat Lahir">
                      <input type="text" class="span3" id="tgllahir" name="tgllahir" value="<?php echo date('d-m-Y', strtotime($datas['tgl_lahir']))?>" placeholder="Tanggal Lahir">
                    </div>    
                  </div>    

                  <div class="control-group">                     
                    <label class="control-label" for="agama">Agama</label>
                    <div class="controls">
                      <input type="text" class="span4" id="agama" name="agama" value="<?php echo $datas['agama']?>" placeholder="Agama Siswa">
                    </div>    
                  </div>   

                  <div class="control-group">                     
                    <label class="control-label" for="telepon">Telepon</label>
                    <div class="controls">
                      <input type="text" class="span4" id="telepon" name="telepon" value="<?php echo $datas['telepon']?>" placeholder="Telepon Siswa">
                    </div>    
                  </div>                               

                  <div class="control-group">                     
                    <label class="control-label" for="ayah">Nama Ayah</label>
                    <div class="controls">
                      <input type="text" class="span2" id="ayah" name="ayah" value="<?php echo $datas['ayah_siswa']?>" placeholder="Nama Ayah">
                      <input type="text" class="span2" id="jobayah" name="jobayah" value="<?php echo $datas['pekerjaan_ayah']?>" placeholder="Pekerjaan Ayah">
                    </div>    
                  </div> 

                  <div class="control-group">                     
                    <label class="control-label" for="tlpayah">Telepon Ayah</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tlpayah" name="tlpayah" value="<?php echo $datas['telp_ayah']?>" placeholder="Telepon Ayah">
                    </div>    
                  </div>                  

                  <div class="control-group">                     
                    <label class="control-label" for="ibu">Nama Ibu</label>
                    <div class="controls">
                      <input type="text" class="span2" id="ibu" name="ibu" value="<?php echo $datas['ibu_siswa']?>" placeholder="Nama Ibu">
                      <input type="text" class="span2" id="jobibu" name="jobibu" value="<?php echo $datas['pekerjaan_ibu']?>" placeholder="Pekerjaan Ibu">
                    </div>    
                  </div>                  

                  <div class="control-group">                     
                    <label class="control-label" for="tlpibu">Telepon Ibu</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tlpibu" name="tlpibu" value="<?php echo $datas['telp_ibu']?>" placeholder="Telepon Ibu">
                    </div>    
                  </div>                                    
                  
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button> 
                    <button class="btn">Cancel</button>
                  </div>
                </fieldset>
            </form>

        </div>
      </div>
    </div>

</div>

<script type="text/javascript">

  $(document).ready(function(){
    var jenjang = {"SD": "SD", "SMP": "SMP", "SMA": "SMA", "SMK": "SMK"};
    var jenjangSiswa = '<?php echo $datas["kelas"]; ?>';
    var jenjangSiswa = jenjangSiswa.substring(1);
    
    $("#jenjang").children('option:not(:first)').remove();
    $.each(jenjang, function(key, value){
      if(key == jenjangSiswa)
        $("#jenjang").append($("<option selected></option>").attr("value", key).text(value));
      else
        $("#jenjang").append($("<option></option>").attr("value", key).text(value));
    });
    jenjangOnChange();
  });

    $("#tgllahir").datepicker({
      dateFormat: 'dd-mm-yy'
    });

    function jenjangOnChange(){
    var jenjang = $("#jenjang").val();
    var jenjangSd = {"4SD": "4 SD", "5SD": "5 SD", "6SD": "6 SD"};
    var jenjangSmp = {"7SMP": "7 SMP", "8SMP": "8 SMP", "9SMP": "9 SMP"};
    var jenjangSma = {"10SMA": "10 SMA", "11SMA": "11 SMA", "12SMA": "12 SMA"};
    var jenjangSmk = {"10SMK" :"10 SMK", "11SMK": "11 SMK", "12SMK": "12 SMK"};
    var kelasSiswa = '<?php echo $datas["kelas"]; ?>';
    var jenjangArr = '';

    if(jenjang != 0){

      if(jenjang == 'SD'){
        jenjangArr = jenjangSd;
      }else if(jenjang == 'SMP'){
        jenjangArr = jenjangSmp;
      }else if(jenjang == 'SMA'){
        jenjangArr = jenjangSma;
      }else if(jenjang == 'SMK'){
        jenjangArr = jenjangSmk;
      }

      $("#kelas").removeAttr("disabled");
      $("#kelas").children('option:not(:first)').remove();
      $.each(jenjangArr, function(key, value){
        if(key == kelasSiswa)
          $("#kelas").append($("<option selected></option>").attr("value", key).text(value));
        else
          $("#kelas").append($("<option></option>").attr("value", key).text(value));
        });
    }else{
      $("#kelas").children('option:not(:first)').remove();
      $("#kelas").attr("disabled", "disabled");
    }
  }

</script>