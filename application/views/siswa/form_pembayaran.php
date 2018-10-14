<div class="row">

    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Form Pembayaran Siswa</h3>
        </div>
        <div class="widget-content">
        
            <form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url()?>siswa/tambahPembayaran">
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="firstname">Nama</label>
                    <div class="controls">                    
                      <input type="text" class="span2" id="nama" name="nama" value="" placeholder="Nama Siswa">
                      <input type="hidden" class="span2" id="idsiswa" name="idsiswa" value="" placeholder="ID Siswa">
                    </div>    
                  </div>                  

                  <div class="control-group">                     
                    <label class="control-label" for="tgl">Tanggal</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tgl" name="tgl" value="" placeholder="Tanggal">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="jenis">No. Kwitansi</label>
                    <div class="controls">
                      <input type="text" class="span2" id="kwitansi" name="kwitansi" value="" placeholder="Nomor Kwitansi">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="jenis">Jenis</label>
                    <div class="controls">
                      <?php echo form_dropdown('jenis', $jenis_bayar, '', 'class="span2" id="jenis" onchange="jenisBayarOnChange()"'); ?>
                      <input type="text" class="span2" id="pembayaranlain" name="pembayaranlain" value="" placeholder="Jenis Pembayaran">
                    </div>    
                  </div>                  
                  
                  <div class="control-group">                     
                    <label class="control-label" for="kelas">Kelas di UNIQ</label>
                    <div class="controls">
                      <!-- <input type="text" class="span2" id="kelas" name="kelas" value="" placeholder="Kelas Siswa"> -->
                      <?php echo form_dropdown('kelas', $kelas, '', 'readonly="" class="span2" id="kelas" onchange="kelasUniqOnChange()" disabled="disabled"'); ?>
                      <input type="text" class="span2" id="kelasuniq" name="kelasuniq" value="" placeholder="Kelas di Uniq">
                    </div>    

                  </div>                                                    

                  <div class="control-group">                     
                    <label class="control-label" for="nominal">Nominal</label>
                    <div class="controls">
                      <input type="text" class="span2" id="nominal" name="nominal" value="" placeholder="Nominal">
                    </div>    
                  </div> 

                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </fieldset>
            </form>

        </div>
      </div>
    </div>

</div>

<script type="text/javascript">      

    $(document).ready(function(){
      $("#pembayaranlain").hide();
      $("#kelasuniq").hide();
    });

    $("#tgl").datepicker({
      dateFormat: 'dd-mm-yy'
    });

    $("#nominal").blur(function(){
       $(this).parseNumber({format:"#,###.00", locale:"us"});
       $(this).formatNumber({format:"#,###.00", locale:"us"});
    });

    $(function () {
        $("#nama").autocomplete({
            source: function(request, response) {
                $.ajax({ 
                    url: "<?php echo base_url(); ?>siswa/allSiswa/",
                    data: { kode: $("#nama").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                        response(data);
                    }                        
                });
            },
            select: function(event, ui){
                var itemselected = ui.item.value;
                $('#idsiswa').val(ui.item.id);
                $('#kelas').val(ui.item.id_kelas);
            }


        });
    });

    $("#nominal").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

    function jenisBayarOnChange(){
      var jenisBayar = $("#jenis").val();

      if(jenisBayar == 'lainnya'){
        $("#pembayaranlain").show();
      }else{
        $("#pembayaranlain").val("");
        $("#pembayaranlain").hide();
      }
    }

    function kelasUniqOnChange(){
      var jenisBayar = $("#kelas").val();

      if(jenisBayar == 'lainnya'){
        $("#kelasuniq").show();
      }else{
        $("#kelasuniq").hide();
      }
    }
</script>