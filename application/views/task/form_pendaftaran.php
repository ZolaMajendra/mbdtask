<div class="row">
    <form method="post" class="form-horizontal" action="<?php echo base_url();?>task/tambahtask">
    <div class="span6">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Form Rekam Tiket</h3>
        </div>
        <div class="widget-content">
        <?php if(!empty($message)){ ?>
          <h1><?php echo $message; ?></h1>
        <?php } ?>
            
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="notiket">Nomor Tiket</label>
                    <div class="controls">
                      <input type="text" class="span3" id="notiket" name="notiket" value="" placeholder="Nomor Tiket">
                    </div>    
                  </div>
                                    
                  <!-- <div class="control-group">                     
                    <label class="control-label" for="jenistiket">Jenis Tiket</label>
                    <div class="controls">
                      <?php echo form_dropdown('jenistiket', $tiket, '', 'class="span2" id="jenistiket"'); ?>
                    </div>    
                  </div> -->

                  <div class="control-group">                     
                    <label class="control-label" for="asignee">Asignee</label>
                    <div class="controls">
                      <!-- <?php echo form_dropdown('asignee', $user, '', 'class="span2" id="asignee"'); ?> -->
                      <input type="text" class="span3" id="asignee" name="asignee" value="" placeholder="Asignee">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="Desctiket">Deskripsi</label>
                    <div class="controls">
                      <textarea class="span3" id="desctiket" name="desctiket"></textarea>
                    </div>    
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </fieldset>            
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Sub Pekerjaan</h3>
        </div>
          <div class="widget-content" id="subtaskarea">
                     
          </div>
          
          <div class="form-actions">
            <input type="button" class="btn btn-success" name="" value="Tambah" onclick="addsubtask()">
          </div>
    </div>
</form>
</div>

<script type="text/javascript">

  var counter=1;
  function addsubtask(){
    var subtask = '<div class="control-group">'+
              '<label class="control-label" for="subtask">Nama Sub Task '+counter+'</label>'+
              '<div class="controls">'+
                '<input type="text" class="span3" id="subtask[]" name="subtask[]" value="" placeholder="Nama Sub Task">'+
              '</div>'+    
            '</div>'+

            '<div class="control-group">'+
              '<label class="control-label" for="descsubtask">Deskripsi Sub Task '+counter+'</label>'+
              '<div class="controls">'+
                '<input type="text" class="span3" id="descsubtask[]" name="descsubtask[]" value="" placeholder="Deskripsi Sub Task">'+
              '</div>'+
            '</div>'+
          '</div>';

    $("#subtaskarea").append(subtask);
    counter++;
  }

  $(function () {
        $("#asignee").autocomplete({
            source: function(request, response) {
                $.ajax({ 
                    url: "<?php echo base_url(); ?>task/allusers/",
                    data: { kode: $("#asignee").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                        response(data);
                    }                        
                });
            },
            select: function(event, ui){
                var itemselected = ui.item.value;
                $('#asignee').val(ui.item.account_username);
            }
        });
    });

</script>
