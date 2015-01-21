<script>
function edit(id){
$.getJSON('<?php echo base_url();?>data/lembaga/get_detail_lembaga/'+id,function(get){
$('#kode_e').val(get.kode_lembaga);
$('#lembaga_e').val(get.lembaga);
$('#kabupaten_e').val();
});
}
</script>
<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Lembaga</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a><br><hr>
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
                                <th>Kode</th>
                                <th>Lembaga</th>
                                <th>Level</th>
	                            <th width="120">Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php $no = 1; foreach($lembaga as $row){?>
	                        <tr>
	                        	<td><?php echo $no;?></td>
	                        	<td><?php echo $row->kode_lembaga;?></td>
	                        	<td><?php echo $row->lembaga;?></td>
	                        	<td><?php
								if($row->level=='1'){
								echo 'Pusat';
								}elseif($row->level=='2'){
								echo 'Dinas Kesehatan Kabupaten';
								}elseif($row->level=='3'){
								echo 'Puskesmas';
								}								
								?></td>
	                        	<td class="td-actions">
									<a onclick="edit(<?php echo $row->id_lembaga;?>)" class="btn btn-primary btn-small" href="#editModal" data-toggle="modal"><i class="btn-icon-only icon-pencil"> </i></a>
									<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="<?php echo base_url();?>data/lembaga/del_lembaga/<?php echo $row->id_lembaga;?>"><i class="btn-icon-only icon-remove"> </i></a>
								</td>
	                        </tr>
							<?php $no++; } ?>
	                    </tbody>
	               	</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Lembaga</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>data/lembaga/save_lembaga" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="margin-left: -60px;">  
					<div class="control-group" id="">
                        <label class="control-label">Kode Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="kode" placeholder="Input Kode" class="form-control" value="" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="lembaga" placeholder="Input Lembaga" class="form-control" value="" required/>
                        </div>
                    </div>
					<script>
					$(document).ready(function(){
					$('#kabupaten').hide();
					$('#kelurahan').hide();
					
					$('#pusat').click(function(){
					$('#kabupaten').hide();
					$('#kelurahan').hide();
					});
					
					$('#dinas').click(function(){
					$('#kabupaten').show();
					$('#kelurahan').hide();
					});
					
					$('#puskesmas').click(function(){
					$('#kabupaten').hide();
					$('#kelurahan').show();
					});
					});
					</script>
                    <div class="control-group" id="">
                        <label class="control-label">Level</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="level" value="1" id="pusat"/>
                                Pusat
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="level" value="2" id="dinas"/>
                                Dinas Kesehatan Kabupaten
                            </label>
							<label class="radio inline">
                                <input type="radio" name="level" value="3" id="puskesmas"/>
                                Puskesmas
                            </label>
                        </div>
                    </div>
					<div class="control-group" id="kabupaten">
                        <label class="control-label">Kabupaten</label>
                        <div class="controls">
                            <select class="span4" name="kabupaten" id="kabupaten" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kabupaten as $row){?>
								<option value="<?php echo $row->id_kabupaten;?>"><?php echo $row->kabupaten_kota;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="kelurahan">
                        <label class="control-label">Kelurahan</label>
                        <div class="controls">
                            <select class="span4" name="kelurahan" id="kelurahan" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kelurahan as $row){?>
								<option value="<?php echo $row->id_kelurahan;?>"><?php echo $row->kelurahan;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data Lembaga</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>data/lembaga/edit_lembaga" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="margin-left: -60px;">  
					<div class="control-group" id="">
                        <label class="control-label">Kode Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="kode_edit" id="kode_e" placeholder="Input Kode" class="form-control" value="" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Lembaga</label>
                        <div class="controls">
                            <input type="text" class="span4" name="lembaga_edit" id="lembaga_e" placeholder="Input Lembaga" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Level</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="level_edit" value="1" id="pusat_e"/>
                                Pusat
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="level_edit" value="2" id="dinas_e"/>
                                Dinas Kesehatan Kabupaten
                            </label>
							<label class="radio inline">
                                <input type="radio" name="level_edit" value="3" id="puskesmas_e"/>
                                Puskesmas
                            </label>
                        </div>
                    </div>
					<div class="control-group" id="kabupaten">
                        <label class="control-label">Kabupaten</label>
                        <div class="controls">
                            <select class="span4" name="kabupaten_edit" id="kabupaten_e" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kabupaten as $row){?>
								<option value="<?php echo $row->id_kabupaten;?>"><?php echo $row->kabupaten_kota;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="kelurahan">
                        <label class="control-label">Kelurahan</label>
                        <div class="controls">
                            <select class="span4" name="kelurahan_edit" id="kelurahan_e" class="form-control" value="" required>
                                <option> -- </option>
								<?php foreach($kelurahan as $row){?>
								<option value="<?php echo $row->id_kelurahan;?>"><?php echo $row->kelurahan;?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Perubahan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->