<div class="row">
  	<div class="span12">      		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Region</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#provinsi" data-toggle="tab">Provinsi</a></li>
					  <li><a href="#kota" data-toggle="tab">Kabupaten / Kota</a></li>
					  <li><a href="#camat" data-toggle="tab">Kecamatan</a></li>
					  <li><a href="#lurah" data-toggle="tab">Kelurahan</a></li>
					</ul>
					<div class="tab-content">
                        <script>
                            function editprovinsi(id){
                                $('#editprov').load('<?php echo base_url();?>setting/region/edit_prov/'+id);
                            }
                        </script>
						<div class="tab-pane active" id="provinsi">
							<div class="span11">
								<a data-toggle="modal" href="#myProv" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Provinsi</th>
			                                <th width="80">Aksi</th>
				                        </tr>
				                    </thead>
				                    <tbody>
                                        <?php $no = 1; foreach ($provinsi as $row) { ?>  
				                        <tr>
				                        	<td><?php echo $no; ?></td>
				                        	<td><?php echo $row->provinsi; ?></td>
				                        	<td class="td-actions">
												<a data-toggle="modal" class="btn btn-small btn-success" href="#edit" onclick="editprovinsi(<?php echo $row->id_provinsi;?>)"><i class="btn-icon-only icon-pencil"> </i></a>
												<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="<?php echo base_url();?>setting/region/delete_prov/<?php echo $row->id_provinsi; ?>"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
				                        <? $no++; } ?>
				                    </tbody>
				               	</table>
							</div>
						</div>
                        <script>
                            function editkabupaten(id){
                                $('#editprov').load('<?php echo base_url();?>setting/region/edit_kab/'+id);
                            }
                        </script>
						<div class="tab-pane" id="kota">
							<div class="span11">
								<a data-toggle="modal" href="#myKota" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example3" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kabupaten / Kota</th>
				                        	<th>Provinsi</th>
			                                <th width="80">Aksi</th>
				                        </tr>
				                    </thead>
				                    <tbody>
                                        <?php $no = 1; foreach ($kabupaten as $row) { ?>
				                        <tr>
				                        	<td><?php echo $no; ?></td>
				                        	<td><?php echo $row->kabupaten_kota; ?></td>
                                            <?php $prov = $this->app_model->getdetail('tbl_provinsi','id_provinsi',$row->provinsi_id,'id_provinsi','asc')->row(); ?>
				                        	<td><?php echo $prov->provinsi; ?></td>
				                        	<td class="td-actions">
												<a data-toggle="modal" class="btn btn-small btn-success" href="#edit" onclick="editkabupaten(<?php echo $row->id_kabupaten;?>)"><i class="btn-icon-only icon-pencil"> </i></a>
												<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="<?php echo base_url();?>setting/region/delete_kab/<?php echo $row->id_kabupaten; ?>"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
                                        <? $no++; } ?>
				                    </tbody>
				               	</table>
							</div>
						</div>
                        <script>
                            function editkecamatan(id){
                                $('#editprov').load('<?php echo base_url();?>setting/region/edit_kec/'+id);
                            }
                        </script>
						<div class="tab-pane" id="camat">
							<div class="span11">
								<a data-toggle="modal" href="#myCamat" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example4" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kecamatan</th>
				                        	<th>Kabupaten/Kota</th>
				                        	<th>Provinsi</th>
			                                <th width="80">Aksi</th>
				                        </tr>
				                    </thead>
				                    <tbody>
                                        <?php $no = 1; foreach ($kecamatan as $row) { ?>
				                        <tr>
				                        	<td><?php echo $no; ?></td>
				                        	<td><?php echo $row->kecamatan; ?></td>
				                        	<?php $kab = $this->app_model->getdetail('tbl_kabupaten','id_kabupaten',$row->kabupaten_id,'id_kabupaten','asc')->row(); ?>
                                            <td><?php echo $kab->kabupaten_kota; ?></td>
				                        	<?php $prov = $this->app_model->getdetail('tbl_provinsi','id_provinsi',$kab->provinsi_id,'id_provinsi','asc')->row(); ?>
                                            <td><?php echo $prov->provinsi; ?></td>
				                        	<td class="td-actions">
												<a data-toggle="modal" class="btn btn-small btn-success" href="#edit" onclick="editkecamatan(<?php echo $row->id_kecamatan;?>)"><i class="btn-icon-only icon-pencil"> </i></a>
												<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="<?php echo base_url();?>setting/region/delete_kec/<?php echo $row->id_kecamatan; ?>"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
                                        <? $no++; } ?>
				                    </tbody>
				               	</table>
							</div>
						</div>
                        <script>
                            function editkelurahan(id){
                                $('#editprov').load('<?php echo base_url();?>setting/region/edit_kel/'+id);
                            }
                        </script>
						<div class="tab-pane" id="lurah">
							<div class="span11">
								<a data-toggle="modal" href="#myLurah" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example5" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kelurahan</th>
				                        	<th>Kecamatan</th>
				                        	<th>Kabupaten/Kota</th>
				                        	<th>Provinsi</th>
			                                <th width="80"></th>
				                        </tr>
				                    </thead>
				                    <tbody>
                                        <?php $no = 1; foreach ($kelurahan as $row) { ?>
				                        <tr>
				                        	<td><?php echo $no; ?></td>
				                        	<td><?php echo $row->kelurahan; ?></td>
				                        	<?php $kec = $this->app_model->getdetail('tbl_kecamatan','id_kecamatan',$row->kecamatan_id,'id_kecamatan','asc')->row(); ?>
                                            <td><?php echo $kec->kecamatan; ?></td>
				                        	<?php $kab = $this->app_model->getdetail('tbl_kabupaten','id_kabupaten',$kec->kabupaten_id,'id_kabupaten','asc')->row(); ?>
                                            <td><?php echo $kab->kabupaten_kota; ?></td>
                                            <?php $prov = $this->app_model->getdetail('tbl_provinsi','id_provinsi',$kab->provinsi_id,'id_provinsi','asc')->row(); ?>
                                            <td><?php echo $prov->provinsi; ?></td>
				                        	<td class="td-actions">
												<a data-toggle="modal" class="btn btn-small btn-success" href="#edit" onclick="editkelurahan(<?php echo $row->id_kelurahan;?>)"><i class="btn-icon-only icon-pencil"> </i></a>
												<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="<?php echo base_url();?>setting/region/delete_kel/<?php echo $row->id_kelurahan; ?>"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>		
                                        <? $no++; } ?>                      
				                    </tbody>
				               	</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    $("#prov").change(function() {
        $.post("<?php echo base_url(); ?>setting/getchangedata/getkabupaten/" + $('#prov').val(), {}, function(obj) {
            $('#kab').html(obj);
        });
    });
   $("#prov1").change(function() {
        $.post("<?php echo base_url(); ?>setting/getchangedata/getkabupaten/" + $('#prov1').val(), {}, function(obj) {
            $('#kab1').html(obj);
        });
    });
   $("#prov2").change(function() {
        $.post("<?php echo base_url(); ?>setting/getchangedata/getkabupaten/" + $('#prov1').val(), {}, function(obj) {
            $('#kab2').html(obj);
        });
    });
    $("#kab1").change(function() {
        $.post("<?php echo base_url(); ?>setting/getchangedata/getkecamatan/" + $('#kab1').val(), {}, function(obj) {
            $('#kec').html(obj);
        });
    });
});
</script>

<div class="modal fade" id="myProv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/save_prov" method="post">
                <div class="modal-body" style="margin-left: -60px;">    
                    <div class="control-group" id="">
                        <label class="control-label">Provinsi</label>
                        <div class="controls">
                            <input type="text" class="span4" name="provinsi" placeholder="Input Provinsi" class="form-control" required/>
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

<div class="modal fade" id="myKota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/save_kab" method="post">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Kabupaten / Kota</label>
                        <div class="controls">
                            <input type="text" class="span4" name="kota" placeholder="Input Kota" class="form-control" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Provinsi</label>
                        <div class="controls">
                            <select class="span4" name="provinsi" class="form-control" required>
                                <option> -- Pilih -- </option>
                                <?php foreach ($provinsi as $row) {
                                    echo "<option value='".$row->id_provinsi."'> ".$row->provinsi." </option>";
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myCamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/save_kec" method="post">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Kecamatan</label>
                        <div class="controls">
                            <input type="text" class="span4" name="camat" placeholder="Input Kecamatan" class="form-control" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Provinsi</label>
                        <div class="controls">
                            <select class="span4" name="provinsi" id="prov" class="form-control" required>
                                <option> -- Pilih -- </option>
                                <?php foreach ($provinsi as $row) {
                                    echo "<option value='".$row->id_provinsi."'> ".$row->provinsi." </option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kabupaten / Kota</label>
                        <div class="controls">
                            <select class="span4" name="kota" id="kab" class="form-control" required>
                                <option> -- Pilih -- </option>
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

<div class="modal fade" id="myLurah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>setting/region/save_kel" method="post">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Kelurahan</label>
                        <div class="controls">
                            <input type="text" class="span4" name="lurah" placeholder="Input Kelurahan" class="form-control" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Provinsi</label>
                        <div class="controls">
                            <select class="span4" name="provinsi" id="prov1" class="form-control" required>
                                <option> -- Pilih -- </option>
                                <?php foreach ($provinsi as $row) {
                                    echo "<option value='".$row->id_provinsi."'> ".$row->provinsi." </option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kabupaten / Kota</label>
                        <div class="controls">
                            <select class="span4" name="kota" id="kab1" class="form-control" required>
                                <option> -- Pilih -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kecamatan</label>
                       <div class="controls">
                            <select class="span4" name="camat" id="kec" class="form-control" required>
                                <option> -- Pilih -- </option>
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="editprov">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->