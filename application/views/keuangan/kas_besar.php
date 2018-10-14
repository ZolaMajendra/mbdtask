<div class="row">
  <form id="" class="form-horizontal" method="POST" action="<?php echo base_url()?>keuangan/add_kas_besar">
    <div class="span6">
      <div class="widget">
      <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Pemasukan (Debit)</h3>
        </div>
        <div class="widget-content">
            <fieldset>                  
              <div class="control-group">                     
                <label class="control-label" for="tgl">Tanggal</label>
                <div class="controls">
                  <input type="text" class="span2" id="tgl" name="tgl" value="" placeholder="Tanggal">
                </div>    
              </div>

              <div class="control-group">                     
                <label class="control-label" for="uangbimbel">Bimbel</label>
                <div class="controls">
                  <input type="text" readonly class="span2" id="uangbimbel" name="uangbimbel" value="" placeholder="Penerimaan Biaya Bimbel">
                </div>    
              </div>

              <div class="control-group">                     
                <label class="control-label" for="uangpusat">Pemasukan dari Pusat</label>
                <div class="controls">
                  <input type="text" class="span2" id="uangpusat" name="uangpusat" value="" placeholder="Pemasukan dari Pusat">
                </div>    
              </div>

              <div class="form-actions">     
                <button type="submit" class="btn btn-primary">OK</button>                
                <a href="<?php echo base_url();?>keuangan/rekap_kas_besar"><input type="button" class="btn" value="Lihat Rekap"/></a>
              </div>
            </fieldset>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Kas Kecil (Kredit)</h3>
        </div>
        <div class="widget-content">

          <div class="control-group">                     
            <label class="control-label" for="pengeluaran">Pengeluaran</label>
            <div class="controls">
              <input type="text" readonly class="span2" id="pengeluaran" name="pengeluaran" value="" placeholder="Pengeluaran Kas Kecil">
            </div>    
          </div>

          <div class="control-group">                     
            <label class="control-label" for="pengisian">Pengisian</label>
            <div class="controls">
              <input type="text" class="span2" id="pengisian" name="pengisian" value="" placeholder="Pengisian Kas Kecil">
            </div>    
          </div>                                                 

          <div class="control-group">                     
            <label class="control-label" for="setor">Setor</label>
            <div class="controls">
              <input type="text" class="span2" id="setor" name="setor" value="" placeholder="Setoran">
              <input type="text" class="span2" id="setorkpd" name="setorkpd" value="" placeholder="Setor Kepada">
            </div>    
          </div>
        </div>
      </div>
    </div>
</form>
</div>

<script type="text/javascript">  
    $(function(){
      $("#tgl").datepicker({
        dateFormat: 'dd-mm-yy'
      });

      $("#uangbimbel").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

      $("#uangpusat").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

      $("#pengeluaran").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true,
        allowNegative: true
      });

      $("#pengisian").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });

      $("#setor").priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.',
        clearOnEmpty: true
      });    

      $("#tgl").change(function(){
            $.ajax({ 
            url: "<?php echo base_url(); ?>keuangan/lapHarian/",
            data: { tgl: $("#tgl").val()},
            dataType: "json",
            type: "POST",
            success: function(data){
              if(data.length <= 0){
                $('#uangbimbel').val('');
                $('#uangbimbel').val(0);
              }
              else{
                $('#uangbimbel').val('');
                var value = data[data.length-1].totalrp;
                var substr = value.substring(0, value.length-3)
                $('#uangbimbel').val(substr);
              }                
            }                        
        });
      
      $.ajax({ 
          url: "<?php echo base_url(); ?>keuangan/get_kas_kecil/",
          data: { tgl: $("#tgl").val(), ajax: 1},
          dataType: "json",
          type: "POST",
          success: function(data){
              if(!data){
                $('#pengeluaran').val('');
                $('#pengeluaran').val(0);
              }
              else{
                $('#pengeluaran').val('');
                var value = data[data.length-1].saldo_rp;
                var substr = value.substring(0, value.length-3)
                $('#pengeluaran').val(substr);
              }              
          }                        
        });

      });

    });  

    
</script>