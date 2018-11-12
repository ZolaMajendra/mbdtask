<div class="row">
    <form enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php echo base_url();?>task/simpanfile">
    <div class="span12">
      <div class="widget">

        <div class="widget-header"><a href="<?php echo base_url().'task/getsubtask?idtask='.$idtask.'&status='.$status?>" title="Back"><i class="icon-arrow-left"></i></a>
          <h3>Form Upload Tiket</h3>
        </div>
        <div class="widget-content">
                <fieldset>                  
                  <div class="control-group">         
                    <label class="control-label" for="asignee">Sub Task</label>
                      <div class="controls">
                        <h3 for="notiket"><?php echo $subtask['judul_subtask']?></h3>
                      </div>
                  </div>

                  <div class="control-group">                     
                    <label class="control-label" for="subtaskfile">File</label>
                    <div class="controls">
                        <input type="file" class="span3" name="subtaskfile" value="">
                        <input type="hidden" class="span3" name="idsubtask" value="<?php echo $idsubtask;?>">
                        <input type="hidden" class="span3" name="idtask" value="<?php echo $idtask;?>">
                    </div>    
                  </div>

                  <div class="control-group">
                      <div class="controls">
                        <ul>
                          <li>Filetype: .jpg, .jpeg, .png</li>
                          <li>Max. Size: 2MB</li>
                        </ul>
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

</script>
