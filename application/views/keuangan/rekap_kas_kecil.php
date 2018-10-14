<div class="row">

    <div class="span12">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Rekap Kas Kecil</h3>
        </div>
        <div class="widget-content">
              <form method="post" action="<?php echo base_url()?>keuangan/get_kas_kecil">
                <!-- <fieldset>                   -->
                  <div class="control-group">                                         
                    <div class="controls">
                      <input type="text" class="span2" id="tgl" name="tgl" value="" placeholder="Tanggal">
                      <button class="btn btn-primary" onclick="cari()" data-toggle="modal" data-target="#myModal">Cari</button>                      
                    </div>    
                  </div>                                                      

                  <div class="control-group" id="lapHarianCtn">                                         
                    <table class="table table-striped table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th> Tanggal </th>
                          <th> No. Item </th>
                          <th> Uraian </th>
                          <th> Jumlah Item </th>
                          <th> Harga Satuan </th>
                          <th> Debit </th>
                          <th> Kredit </th>
                          <th> Saldo </th>
                        </tr>
                      </thead>
                      <tbody id="tblctn">
                      </tbody>
                    </table>
                  </div>                                                    
                  
                  <div class="form-actions">                    
                    <button name="btn_cetak" id="btn_cetak" class="btn" formtarget="_blank" value="1" disabled="">Cetak</button>
                  </div>
                <!-- </fieldset> -->
              </form>
        </div>
      </div>
    </div>

</div>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mohon Tunggu</h4>
      </div>
      <div class="modal-body" align="center">
          <img src="<?php echo base_url()?>assets/img/ajax-load.gif">           
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">  
  $(function(){
      $("#tgl").datepicker({
        dateFormat: 'dd-mm-yy'
      });
    });

    function cari(){
      var ctn = '';
      $.ajax({ 
          url: "<?php echo base_url(); ?>keuangan/get_kas_kecil/",
          data: { tgl: $("#tgl").val(), ajax: 1},
          dataType: "json",
          type: "POST",
          success: function(data){
            //data = JSON.parse(data); 
              $('#myModal').modal('hide');
              $('#tblctn').html('');
              ctn='';
              if(!data){
                ctn = '<tr><td>Data tidak ditemukan</td></tr>';
                $('#btn_cetak').attr('disabled', 'disabled');
              }
              else{
                for(var i=0; i<data.length-1; i++){
                ctn += '<tr><td>'+(i+1)+'</td>'+
                      '<td>'+data[i].tgl_kk+'</td>'+
                      '<td>'+data[i].no_item+'</td>'+
                      '<td>'+data[i].uraian_item+'</td>'+
                      '<td>'+data[i].jumlah_item+'</td>'+
                      '<td>Rp. '+data[i].harga_satuan_rp+'</td>'+
                      '<td>Rp. '+data[i].debit_rp+'</td>'+
                      '<td>Rp. '+data[i].kredit_rp+'</td>'+
                      '<td></td>'+
                      '</tr>';
                }
                ctn += '<tr><td colspan=6><strong>Total</strong></td><td><strong>Rp. '+ data[data.length-1].tot_deb_rp +
                '</strong></td><td><strong>Rp. '+ data[data.length-1].tot_kre_rp +'</strong></td>'+
                '<td><strong>Rp. '+ data[data.length-1].saldo_rp +'</strong></td>'+
                '</tr>';
                $('#btn_cetak').removeAttr('disabled', 'disabled');
              }
              $('#tblctn').append(ctn);
          }                        
      });
    }

    function cetak() {
     var printContents = document.getElementById('lapHarianCtn').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     
     window.print();

     document.body.innerHTML = originalContents;
    }
    
</script>