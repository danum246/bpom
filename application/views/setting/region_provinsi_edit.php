<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">PROVINSI</h4>
</div>
<form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/update_prov/<?php echo $detail->id_provinsi; ?>" method="post">
    <div class="modal-body" style="margin-left: -60px;">    
        <div class="control-group" id="">
            <label class="control-label">Provinsi</label>
            <div class="controls">
                <input type="text" class="span4" name="provinsi" class="form-control" value="<?php echo $detail->provinsi; ?>" required/>
            </div>
        </div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        <input type="submit" class="btn btn-primary" value="Simpan"/>
    </div>
</form>