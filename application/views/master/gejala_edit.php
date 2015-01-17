<div class="row">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <i class="icon-star"></i>
        <h3>FORM EDIT</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">
        <b><center>Edit Gejala</center></b><br>
        <form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url(); ?>master/gejala/update/<?php echo $detail->id_gejala; ?>">
          <fieldset>
            <div class="control-group">                     
              <label class="control-label">Kode Gejala</label>
              <div class="controls">
                <input type="text" class="span3" name="kode" value="<?php echo $detail->kd_gejala;?>"/>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="control-group">                     
              <label class="control-label">Gejala</label>
              <div class="controls">
                <input type="text" class="span3" name="gejala" value="<?php echo $detail->gejala;?>"/>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="form-actions" style="margin-bottom: -30px;">
              <input type="submit" class="btn btn-primary" value="Update"/> 
              <input type="reset" class="btn btn-warning" value="Cancel"/>
            </div> <!-- /form-actions -->
          </fieldset>
        </form>
      </div> <!-- /widget-content -->        
    </div> <!-- /widget -->
  </div>
</div>