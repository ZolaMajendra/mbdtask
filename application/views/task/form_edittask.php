<div class="row">
    <form method="post" class="form-horizontal" action="<?php echo base_url();?>task/ubahtask">
    <div class="span6">
      <div class="widget">

        <div class="widget-header"><a href="<?php echo base_url().'task/listtask?status='.$status?>" title="Back"><i class="icon-arrow-left"></i></a>
          <h3>Form Sunting Pekerjaan</h3>
        </div>
        <div class="widget-content">
        <?php if(!empty($message)){ ?>
          <h1><?php echo $message; ?></h1>
        <?php } ?>
            
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="notiket">Nomor Tiket</label>
                    <div class="controls">
                      <input type="text" class="span3" id="notiket" name="notiket" value="<?php echo $task['nomor_tiket']?>" placeholder="Nomor Tiket">
                      <input type="hidden" class="span3" id="idtask" name="idtask" value="<?php echo $task['id_task']?>" placeholder="">
                      <input type="hidden" class="span3" id="status" name="status" value="<?php echo $status?>" placeholder="">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="asignee">Asignee</label>
                    <div class="controls">
                      <input type="text" class="span3" id="asignee" name="asignee" value="<?php echo $task['asignee']?>" placeholder="Asignee">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="Desctiket">Deskripsi</label>
                    <div class="controls">
                      <textarea class="span3" id="desctiket" name="desctiket"><?php echo $task['deskripsi']?></textarea>
                    </div>    
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </fieldset>            
        </div>
      </div>
    </div>
</form>
</div>

<script type="text/javascript">
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
