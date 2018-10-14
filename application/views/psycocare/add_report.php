<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>

<div class="row">
    <form enctype="multipart/form-data" id="edit-profile" class="form-horizontal" method="post">
    <div class="span10">
      <div class="widget">

        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Tambah Laporan </h3>
        </div>
        <div class="widget-content">
            <fieldset> 
                <div class="control-group">
                    <label class="control-label" for="selectSemester">Bulan</label>
                    <div class="controls">
                        <input type="text" class="span4 month_picker" name="txtBulan" value="" placeholder="Bulan" readonly>
                    </div>
                </div>                 
                <div class="control-group">                     
                    <label class="control-label" for="selectSemester">Semester</label>
                    <div class="controls">
                        <select name="selectSemester" class="span4">
                            <option value="0">-- Semester --</option>
                            <option value="gasal">Gasal</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>    
                </div>
                
                <div class="control-group">                     
                    <label class="control-label" for="thnAjaran">Tahun Ajaran</label>
                    <div class="controls">
                        <input type="text" class="span4" name="thnAjaran" value="" placeholder="Tahun Ajaran">
                    </div>    
                </div>

                <div class="control-group">                     
                    <label class="control-label" for="reportFile">File</label>
                    <div class="controls">
                        <input type="file" class="span3" name="reportFile" value="">
                    </div>    
                </div>
            </fieldset>

        </div>
        <div class="widget-footer">
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="save_report" value="submit">Save</button>
                <button class="btn">Cancel</button>
            </div>
        </div>
      </div>
    </div>
    </form>

</div>