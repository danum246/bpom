            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data Lembaga</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>data/lembaga/edit_lembaga" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="margin-left: -60px;">  
					<div class="control-group" id="">
                        <label class="control-label">Kode Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="kode_edit" id="kode_e" placeholder="Input Kode" class="form-control" value="<?php echo $query->kode_lembaga;?>" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="lembaga_edit" id="lembaga_e" placeholder="Input Lembaga" class="form-control" value="<?php echo $query->lembaga;?>" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Level</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="level_edit" value="1" id="pusat_e" <?php if($query->level==1){ echo 'checked'; }?> />
                                Pusat
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="level_edit" value="2" id="dinas_e" <?php if($query->level==2){ echo 'checked'; }?> />
                                Dinas Kesehatan Kabupaten
                            </label>
							<label class="radio inline">
                                <input type="radio" name="level_edit" value="3" id="puskesmas_e" <?php if($query->level==3){ echo 'checked'; }?> />
                                Puskesmas
                            </label>
                        </div>
                    </div>
					<div class="control-group" id="kelurahan_ed">
                        <label class="control-label">Kelurahan</label>
                        <div class="controls">
                            <select class="span4" name="kelurahan_edit" id="kelurahan_e" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kelurahan as $row){?>
								<option value="<?php echo $row->id_kelurahan;?>" <?php if($query->kelurahan_id== $row->id_kelurahan){ echo 'selected'; }?> ><?php echo $row->kelurahan;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="control-group" id="kabupaten_ed">
                        <label class="control-label">Kabupaten</label>
                        <div class="controls">
                            <select class="span4" name="kabupaten_edit" id="kabupaten_e" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kabupaten as $row){?>
								<option value="<?php echo $row->id_kabupaten;?>" <?php if($query->kabupaten_id== $row->id_kabupaten){ echo 'selected'; }?>><?php echo $row->kabupaten_kota;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    
                </div> 
                <div class="modal-footer">
				<input type="hidden" name="id_lembaga" id="idl" value="<?php echo $query->id_lembaga;?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Perubahan"/>
                </div>
            </form>