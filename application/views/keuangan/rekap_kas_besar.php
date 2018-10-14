<div class="row">

    <div class="span12">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Rekap Kas Besar</h3>
        </div>
        <div class="widget-content">
              <form method="post" action="<?php echo base_url()?>keuangan/get_kas_besar">
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
                          <th> Uraian </th>
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
          url: "<?php echo base_url(); ?>keuangan/get_kas_besar/",
          data: { tgl: $("#tgl").val()},
          dataType: "json",
          type: "POST",
          success: function(data){
            //data = JSON.parse(data);            
              $('#myModal').modal('hide');
              $('#tblctn').html('');
              ctn='';
              if(data == null){
                ctn = '<tr><td>Data tidak ditemukan</td></tr>';
                $('#btn_cetak').attr('disabled', 'disabled');
              }
              else{
                
                ctn += '<tr>'+
                          '<td rowspan="7">1</td>'+
                          '<td rowspan="7">'+ $("#tgl").val() +'</td>'+
                          '<tr><td><strong>SALDO AWAL</strong></td><td></td><td></td><td></td></tr>'+
                          '<tr><td>Penerimaan dari bimbel</td>'+
                          '<td>Rp. '+data.p_bimbel_rp+'</td><td></td><td></td></tr>'+
                          '<tr><td>Penerimaan pusat</td>'+
                          '<td>Rp. '+data.p_pusat_rp+'</td><td></td><td></td></tr>'+
                          '<tr><td>Pengeluaran kas kecil</td>'+
                          '<td></td><td>Rp. '+data.pengeluaran_rp+'</td><td></td></tr>'+
                          '<tr><td>Pengisian kas kecil</td>'+
                          '<td></td><td>Rp. '+data.pengisian_rp+'</td><td></td></tr>'+
                          '<tr><td>Setor ke: <strong>'+data.setor_kepada+'</strong></td>'+
                          '<td></td><td>Rp. '+data.setor_rp+'</td><td></td></tr>'+
                        '</tr>';
                
                /*ctn += '<tr><td colspan=6><strong>Total</strong></td><td>Rp. '+ data[data.length-1].tot_deb_rp +
                '<td>Rp. '+ data[data.length-1].tot_kre_rp +'</td>'+
                '<td>Rp. '+ data[data.length-1].saldo_rp +'</td>'+
                '</td></tr>';*/
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