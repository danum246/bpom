<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Racun - Pangan</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a><br><hr>
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
                                <th>Pangan</th>
                                <th>Racun</th>
	                            <th width="80">Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                        	<td>1</td>
	                        	<td>Nasi</td>
	                        	<td>Saus Tar tar</td>
	                        	<td class="td-actions">
									<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
									<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
								</td>
	                        </tr>
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
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class ='form-horizontal' action="#" method="post" enctype="multipart/form-data">
                <div class="modal-body">  
					<div class="control-group" id="">
                        <label class="control-label">Racun</label>
                        <div class="controls">
                            <select name="racun" class="span3" required>
                            	<option value=""> -- Pilih -- </option>
                            </select>
                        </div>
                    </div>			
					<table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Pangan</th>
                                <th style="width:30px">Ya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nasi</td>
                                <td class="td-actions">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
