<div class="row">

    <div class="span7">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Kas Kecil</h3>
        </div>
        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url()?>keuangan/addKasKecil">
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="tgl">Tanggal</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tgl" name="tgl" value="" placeholder="Tanggal">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="noitem">No Item</label>
                    <div class="controls">
                      <input type="text" class="span2" id="noitem" name="noitem" value="" placeholder="No Item">
                    </div>    
                  </div>                                                      

                  <div class="control-group">                     
                    <label class="control-label" for="deskripsi">Deskripsi</label>
                    <div class="controls">
                      <?php echo form_dropdown('deskripsi', $deskripsi, '', 'class="span2" id="deskripsi" onchange="deskripsiOnChange()"'); ?>
                      <input type="text" class="span2" id="deskripsilain" name="deskripsilain" value="" placeholder="Deskripsi">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="jml">Jumlah</label>
                    <div class="controls">
                      <input type="number" class="span2" id="jml" name="jml" value="" placeholder="Jumlah Item">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="harga">Harga Satuan</label>
                    <div class="controls">
                      <input type="text" class="span2" id="harga" name="harga" value="" placeholder="Harga Satuan">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="kategori">Kategori</label>
                    <div class="controls">
                      <select id="kategori" name="kategori" class="span2">
                        <option value="0">-- Silahkan Pilih --</option>
                        <option value="debit">Debit</option>
                        <option value="kredit">Kredit</option>
                      </select>
                    </div>    
                  </div>
                  
                  <div class="form-actions">     
                    <button type="submit" class="btn btn-primary">Save</button>                
                    <a href="<?php echo base_url();?>keuangan/rekap_kas_kecil"><input type="button" class="btn" value="Lihat Rekap"/></a>
                  </div>
                </fieldset>
            </form>

        </div>
      </div>
    </div>    
</div>

<script type="text/javascript"> 

      $(document).ready(function(){
        $("#deskripsilain").hide();
      });

      $("#tgl").datepicker({
        dateFormat: 'dd-mm-yy'
      });

      $("#harga").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

      function deskripsiOnChange(){
      var deskripsi = $("#deskripsi").val();

      if(deskripsi == 'Lain-lain'){
        $("#deskripsilain").show();
      }else{
        $("#deskripsilain").hide();
      }
    }
</script>