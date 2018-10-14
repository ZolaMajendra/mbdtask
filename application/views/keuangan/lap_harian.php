<div class="row">

    <div class="span8">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Pendapatan Harian</h3>
        </div>
        <div class="widget-content">
              <form method="post" action="<?php echo base_url()?>keuangan/lapHarian">
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
                          <th> Program </th>
                          <th> Jumlah </th>
                        </tr>
                      </thead>
                      <tbody id="tblctn">
                      </tbody>
                    </table>
                  </div>                                                    
                  
                  <div class="form-actions">                    
                    <button name="btn_cetak" id="btn_cetak" class="btn" value="1" formtarget="_blank" disabled="">Cetak</button>
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
          url: "<?php echo base_url(); ?>keuangan/lapHarian/",
          data: { tgl: $("#tgl").val()},
          dataType: "json",
          type: "POST",
          success: function(data){
            //data = JSON.parse(data); 
              $('#myModal').modal('hide');           
              $('#tblctn').html('');
              ctn='';
              if(data.length <= 0){
                ctn = '<tr><td>Data tidak ditemukan</td></tr>';
                $('#btn_cetak').attr('disabled', 'disabled');
              }
              else{
                for(var i=0; i<data.length; i++){
                ctn += '<tr><td>'+(i+1)+
                      '<td>'+data[i].tgl_pembayaran+'</td>'+
                      '<td>'+data[i].kelas+'</td>'+
                      '<td>Rp. '+data[i].pendapatanrp+'</td>'+
                      '</td></tr>';
                }
                ctn += '<tr><td colspan=3><strong>Total Pendapatan Tanggal '+ $("#tgl").val() +'</strong></td><td><strong>Rp. '+ data[data.length-1].totalrp +'</strong></td></tr>';
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