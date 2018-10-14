<div class="row">
    <form method="post" class="form-horizontal" action="<?php echo base_url();?>siswa/tambahSiswa">
    <div class="span7">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Form Pendaftaran Siswa</h3>
        </div>
        <div class="widget-content">
        <?php if(!empty($message)){ ?>
          <h1><?php echo $message; ?></h1>
        <?php } ?>
            
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="firstname">Nama</label>
                    <div class="controls">
                      <input type="text" class="span3" id="nama" name="nama" value="" placeholder="Nama Lengkap Siswa">                      
                      <input type="text" class="span2" id="namapgl" name="namapgl" value="" placeholder="Nama Panggilan">
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
                      <?php echo form_dropdown('kelas', $kelas, '', 'class="span2" id="kelas" disabled="disabled"'); ?>
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="kelas">Kelas di UNIQ</label>
                    <div class="controls">
                      <!-- <input type="text" class="span2" id="kelas" name="kelas" value="" placeholder="Kelas Siswa"> -->
                      <?php echo form_dropdown('kelas_uniq', $kelas_uniq, '', 'class="span2"'); ?>
                    </div>    

                  </div>                   
                  
                  <div class="control-group">                     
                    <label class="control-label" for="sekolah">Sekolah</label>
                    <div class="controls">
                      <input type="text" class="span4" id="sekolah" name="sekolah" value="" placeholder="Sekolah Siswa">
                    </div>    
                  </div>                    
                  
                  <div class="control-group">                     
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                      <input type="text" class="span4" id="alamat" name="alamat" value="" placeholder="Alamat Siswa">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="ttl">TTL</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tempat" name="tempat" value="" placeholder="Tempat Lahir">
                      <input type="text" class="span2" id="tgllahir" name="tgllahir" value="" placeholder="Tanggal Lahir">
                    </div>    
                  </div>    

                  <div class="control-group">                     
                    <label class="control-label" for="agama">Agama</label>
                    <div class="controls">
                      <!-- <input type="text" class="span4" id="agama" name="agama" value="" placeholder="Agama Siswa"> -->
                      <?php echo form_dropdown('agama', $agama, '', 'class="span2"'); ?>
                    </div>    
                  </div>   

                  <div class="control-group">                     
                    <label class="control-label" for="telepon">Telepon</label>
                    <div class="controls">
                      <input type="text" class="span4" id="telepon" name="telepon" value="" placeholder="Telepon Siswa">
                    </div>    
                  </div>                               

                  <div class="control-group">                     
                    <label class="control-label" for="ayah">Nama Ayah</label>
                    <div class="controls">
                      <input type="text" class="span2" id="ayah" name="ayah" value="" placeholder="Nama Ayah">
                      <input type="text" class="span2" id="jobayah" name="jobayah" value="" placeholder="Pekerjaan Ayah">
                    </div>    
                  </div> 

                  <div class="control-group">                     
                    <label class="control-label" for="tlpayah">Telepon Ayah</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tlpayah" name="tlpayah" value="" placeholder="Telepon Ayah">
                    </div>    
                  </div>                  

                  <div class="control-group">                     
                    <label class="control-label" for="ibu">Nama Ibu</label>
                    <div class="controls">
                      <input type="text" class="span2" id="ibu" name="ibu" value="" placeholder="Nama Ibu">
                      <input type="text" class="span2" id="jobibu" name="jobibu" value="" placeholder="Pekerjaan Ibu">
                    </div>    
                  </div>                  

                  <div class="control-group">                     
                    <label class="control-label" for="tlpibu">Telepon Ibu</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tlpibu" name="tlpibu" value="" placeholder="Telepon Ibu">
                    </div>    
                  </div>                                    
                  
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button> 
                    <button class="btn">Cancel</button>
                  </div>
                </fieldset>            
        </div>
      </div>
    </div>
    <div class="span5">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Form Biaya Pendaftaran Siswa</h3>
        </div>
          <div class="widget-content">
            <div class="control-group">                     
              <label class="control-label" for="firstname">Biaya Daftar</label>
              <div class="controls">
                <input type="text" class="span3" id="biaya_daftar" name="biaya_daftar" value="" placeholder="Biaya Pendaftaran">                                      
              </div>    
            </div>

            <div class="control-group">                     
              <label class="control-label" for="firstname">Biaya Bimbel</label>
              <div class="controls">
                <input type="text" class="span3" id="biaya_bimbel" name="biaya_bimbel" value="" placeholder="Biaya Bimbel">                                      
              </div>    
            </div>

          </div>          
      </div>
    </div>
</form>
</div>

<script type="text/javascript">
  $(function(){
    $("#tgllahir").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  });

  $("#biaya_daftar").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

  $("#biaya_bimbel").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

  function jenjangOnChange(){
    var jenjang = $("#jenjang").val();
    var jenjangSd = {"4SD": "4 SD", "5SD": "5 SD", "6SD": "6 SD"};
    var jenjangSmp = {"7SMP": "7 SMP", "8SMP": "8 SMP", "9SMP": "9 SMP"};
    var jenjangSma = {"10SMA": "10 SMA", "11SMA": "11 SMA", "12SMA": "12 SMA"};
    var jenjangSmk = {"10SMK" :"10 SMK", "11SMK": "11 SMK", "12SMK": "12 SMK"};
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
          $("#kelas").append($("<option></option>").attr("value", key).text(value));
        });
    }else{
      $("#kelas").children('option:not(:first)').remove();
      $("#kelas").attr("disabled", "disabled");
    }
  }
</script>
