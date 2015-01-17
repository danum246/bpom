<div class="row">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <i class="icon-star"></i>
        <h3>FORM EDIT</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">
        <b><center>Edit Gejala</center></b><br>
        <form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url(); ?>master/pangan/update/<?php echo $detail->id_pangan; ?>">
          <fieldset>
            <div class="control-group">                     
              <label class="control-label">Kode Pangan</label>
              <div class="controls">
                <input type="text" class="span3" name="kode" value="<?php echo $detail->kd_pangan;?>" required/>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="control-group">                     
              <label class="control-label">Pangan</label>
              <div class="controls">
                <input type="text" class="span3" name="pangan" value="<?php echo $detail->pangan;?>" required/>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="control-group" id="">
                <label class="control-label">Keterangan</label>
                <div class="controls">
                    <textarea class="span3" name="ket" required><?php echo $detail->keterangan;?></textarea>
                </div>
            </div>
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