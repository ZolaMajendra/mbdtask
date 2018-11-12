<div class="row">
    <form method="post" class="form-horizontal" action="<?php echo base_url();?>task/ubahsubtask">
    <div class="span6">
      <div class="widget">

        <div class="widget-header"><a href="<?php echo base_url().'task/getsubtask?idtask='.$subtask['id_task'].'&status='.$status;?>" title="Back"><i class="icon-arrow-left"></i></a>
          <h3>Form Sunting Sub Pekerjaan</h3>
        </div>
        <div class="widget-content">
        <?php if(!empty($message)){ ?>
          <h1><?php echo $message; ?></h1>
        <?php } ?>
            
                <fieldset>                  
                  <div class="control-group">                     
                    <label class="control-label" for="subtask">Sub Pekerjaan</label>
                    <div class="controls">
                      <input type="text" class="span3" id="subtask" name="subtask" value="<?php echo $subtask['judul_subtask']?>" placeholder="Sub Pekerjaan">
                      <input type="hidden" class="span3" id="idsubtask" name="idsubtask" value="<?php echo $subtask['id_subtask']?>" placeholder="">
                      <input type="hidden" class="span3" id="idtask" name="idtask" value="<?php echo $subtask['id_task']?>" placeholder="">
                    </div>    
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="descsubtask">Deskripsi</label>
                    <div class="controls">
                      <input type="text" class="span3" id="descsubtask" name="descsubtask" value="<?php echo $subtask['deskripsi']?>" placeholder="Deskripsi">
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
