<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">KELURAHAN / DESA</h4>
</div>
<form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/update_kel/<?php echo $detail->id_kelurahan; ?>" method="post">
    <div class="modal-body" style="margin-left: -60px;">    
        <div class="control-group" id="">
            <label class="control-label">Kelurahan / Desa</label>
            <div class="controls">
                <input type="text" class="span4" name="lurah" class="form-control" value="<?php echo $detail->kelurahan; ?>" required/>
            </div>
        </div>
        <div class="control-group" id="">
            <label class="control-label">Provinsi</label>
            <div class="controls">
                <select name="provinsi" id="prov2" class="span4" class="form-control" required>
                    <?php $prov = $this->app_model->getdetail('tbl_provinsi','id_provinsi',$detail->provinsi_id,'id_provinsi','asc')->row(); ?>
                    <option value="<?php echo $prov->id_provinsi; ?>" selected><?php echo $prov->provinsi; ?></option>
                    <option> -- Pilih -- </option>
                    <?php foreach ($provinsi as $row) {
                        echo "<option value='".$row->id_provinsi."'> ".$row->provinsi." </option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="control-group" id="">
            <label class="control-label">Kabupaten</label>
            <div class="controls">
                <select name="kota" class="span4" id="kab2" class="form-control" required>
                    <?php $kab = $this->app_model->getdetail('tbl_kabupaten','id_kabupaten',$detail->kabupaten_id,'id_kabupaten','asc')->row(); ?>
                    <option value="<?php echo $kab->id_kabupaten; ?>" selected><?php echo $kab->kabupaten_kota; ?></option>
                    <option> -- Pilih -- </option>
                    <?php foreach ($kabupaten as $row) {
                        echo "<option value='".$row->id_kabupaten."'> ".$row->kabupaten_kota." </option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="control-group" id="">
            <label class="control-label">Kecamatan</label>
            <div class="controls">
                <select name="camat" class="span4" id="kab2" class="form-control" required>
                    <?php $kec = $this->app_model->getdetail('tbl_kecamatan','id_kecamatan',$detail->kecamatan_id,'id_kecamatan','asc')->row(); ?>
                    <option value="<?php echo $kec->id_kecamatan; ?>" selected><?php echo $kec->kecamatan; ?></option>
                    <option> -- Pilih -- </option>
                    <?php foreach ($kecamatan as $row) {
                        echo "<option value='".$row->id_kecamatan."'> ".$row->kecamatan." </option>";
                    } ?>
                </select>
            </div>
        </div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        <input type="submit" class="btn btn-primary" value="Simpan"/>
    </div>
</form>