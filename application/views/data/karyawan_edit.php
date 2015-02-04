<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data Karyawan</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>data/karyawan/save_karyawan" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="margin-left: -60px;">    
                    <div class="control-group" id="">
                        <label class="control-label">NIK</label>
                        <div class="controls">
                            <input type="text" class="span4" name="nik" placeholder="Input NIK" class="form-control" value="<?php echo $row->nik;?>" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" class="span4" name="nama" placeholder="Input Nama" class="form-control" value="<?php echo $row->nama;?>" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Jenis Kelamin</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="jk" value="P" <?php if($row->jns_kel=='P'){ echo 'checked'; } ?>/>
                                Pria
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="jk" value="W" <?php if($row->jns_kel=='W'){ echo 'checked'; } ?>/>
                                Wanita
                            </label>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Telepon</label>
                        <div class="controls">
						
                            +62 ( <input type="text" class="span3" name="telepon_e" id="telepon_e" placeholder="Input Telepon" class="form-control" value="<?php echo substr($row->hp,3);?>" required/> ) 
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" class="span4" name="email" placeholder="Input Email" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Alamat</label>
                        <div class="controls">
                            <textarea class="span4" name="alamat" placeholder="Input Alamat" class="form-control" value="" required></textarea>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Foto</label>
                        <div class="controls">
                            <input type="file" class="span4" name="foto" class="form-control" required/>
                        </div>
                    </div>
					<script>
					$(document).ready(function(){
					$('#lembaga').change(function(){
					$.post('<?php echo base_url();?>data/karyawan/get_listjab/'+$(this).val(),{},function(get){
					$('#jabatan').html(get);
					});
					});
					});
					</script>
					</script>
					<div class="control-group" id="">
                        <label class="control-label">Lembaga</label>
                        <div class="controls">
                            <select class="span4" name="lembaga" id="lembaga" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($lembaga as $row){?>
								<option value="<?php echo $row->id_lembaga;?>"><?php echo $row->kode_lembaga;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Jabatan</label>
                        <div class="controls">
                            <select class="span4" name="jabatan" id="jabatan" class="form-control" value="" required>
                               
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <label class="radio inline">
								<input type="radio" name="status" value="1"/>
								Aktif
							</label>
							<label class="radio inline">
								<input type="radio" name="status" value="0"/>
								Tidak Aktif
							</label>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>