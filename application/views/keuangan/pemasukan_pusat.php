<div class="row">

    <div class="span6">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Pemasukan dari Pusat</h3>
        </div>
        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url()?>keuangan/add_pusat_inc">
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="tgl">Tanggal</label>
                    <div class="controls">
                      <input type="text" class="span2" id="tgl" name="tgl" value="" placeholder="Tanggal">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="noitem">Jumlah</label>
                    <div class="controls">
                      <input type="text" class="span2" id="jumlah" name="jumlah" value="" placeholder="Jumlah Uang">
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
    $(function(){
      $("#tgl").datepicker({
        dateFormat: 'dd-mm-yy'
      });

      $("#jumlah").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });
    });  
</script>