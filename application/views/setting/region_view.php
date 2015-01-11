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
						<div class="tab-pane active" id="provinsi">
							<div class="span11">
								<a data-toggle="modal" href="#myProv" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Provinsi</th>
			                                <th width="80"></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>DKI Jakarta</td>
				                        	<td class="td-actions">
												<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
												<a class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
				                      
				                    </tbody>
				               	</table>
							</div>
						</div>
						<div class="tab-pane" id="kota">
							<div class="span11">
								<a data-toggle="modal" href="#myKota" class="btn btn-primary"> Data Baru </a><br><hr>
								<table id="example3" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kabupaten / Kota</th>
				                        	<th>Provinsi</th>
			                                <th width="80"></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>Jakarta Timur</td>
				                        	<td>DKI Jakarta</td>
				                        	<td class="td-actions">
												<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
												<a class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>
						</div>
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
			                                <th width="80"></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>Matraman</td>
				                        	<td>Jakarta Timur</td>
				                        	<td>DKI Jakarta</td>
				                        	<td class="td-actions">
												<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
												<a class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>
						</div>
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
				                        <tr>
				                        	<td>1</td>
				                        	<td>Palmeriam</td>
				                        	<td>Matraman</td>
				                        	<td>Jakarta Timur</td>
				                        	<td>DKI Jakarta</td>
				                        	<td class="td-actions">
												<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
												<a class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>		                      
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

<div class="modal fade" id="myProv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="#" method="post">
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
            <form class ='form-horizontal' action="#" method="post">
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
            <form class ='form-horizontal' action="#" method="post">
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
                            <select class="span4" name="provinsi" class="form-control" required>
                                <option> -- Pilih -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kabupaten / Kota</label>
                        <div class="controls">
                            <select class="span4" name="kota" class="form-control" required>
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
            <form class ='form-horizontal' action="#" method="post">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Kelurahan</label>
                        <div class="controls">
                            <input type="text" class="span4" name="camat" placeholder="Input Kelurahan" class="form-control" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Provinsi</label>
                        <div class="controls">
                            <select class="span4" name="provinsi" class="form-control" required>
                                <option> -- Pilih -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kabupaten / Kota</label>
                        <div class="controls">
                            <select class="span4" name="kota" class="form-control" required>
                                <option> -- Pilih -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Kecamatan</label>
                       <div class="controls">
                            <select class="span4" name="camat" class="form-control" required>
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