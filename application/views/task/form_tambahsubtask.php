<div class="row">
    <form method="post" class="form-horizontal" action="<?php echo base_url();?>task/simpansubtask">
    <div class="span6">
      <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3>Sub Pekerjaan</h3>
        </div>
          <div class="widget-content" id="subtaskarea">
          <?php if(!empty($message)){ ?>
            <h1><?php echo $message; ?></h1>
          <?php } ?>
          <div class="control-group">
              <label class="control-label" for="subtask">Nama Sub Task 1</label>
              <div class="controls">
                <input type="text" class="span3" id="subtask[]" name="subtask[]" value="" placeholder="Nama Sub Task">
                <input type="hidden" class="span3" id="idtask" name="idtask" value="<?php echo $id_task;?>" placeholder="Nama Sub Task">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="descsubtask">Deskripsi Sub Task 1</label>
              <div class="controls">
                <input type="text" class="span3" id="descsubtask[]" name="descsubtask[]" value="" placeholder="Deskripsi Sub Task">
              </div>
            </div>
          </div>
                     
          </div>
          
          <div class="form-actions">
            <input type="button" class="btn btn-success" name="" value="Tambah" onclick="addsubtask()">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
    </div>
</form>
</div>

<script type="text/javascript">

  var counter=2;
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
</script>
