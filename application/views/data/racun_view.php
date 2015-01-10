<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Racun</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a><br><hr>
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
                                <th>Racun</th>
                                <th>Keterangan</th>
                                <th>Gejala</th>
	                            <th width="120">Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                        	<td>1</td>
	                        	<td>Racun</td>
	                        	<td>Ini Racun bla bla bla</td>
	                        	<td>Diare,Pusing,dst</td>
	                        	<td class="td-actions">
									<a class="btn btn-small btn-success" href="#"><i class="btn-icon-only icon-ok"> </i></a>
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
                <h4 class="modal-title">Tambah Data Racun</h4>
            </div>
            <form class ='form-horizontal' action="#" method="post" enctype="multipart/form-data">
                <div class="modal-body">  
					<div class="control-group" id="">
                        <label class="control-label">Racun</label>
                        <div class="controls">
                            <input type="text" class="span4" name="" placeholder="Input Racun" class="form-control" value="" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <input type="text" class="span4" name="" placeholder="Input Keterangan" class="form-control" value="" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Rata<sup>2</sup></label>
                        <div class="controls">
                            <input type="text" class="span3" name="" placeholder="Input Inkubasi Rata-rata" class="form-control" value="" required/> menit
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Pendek</label>
                        <div class="controls">
                            <input type="text" class="span3" name="" placeholder="Input Inkubasi Pendek" class="form-control" value="" required/> menit
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Tinggi</label>
                        <div class="controls">
                            <input type="text" class="span3" name="" placeholder="Input Inkubasi Tinggi" class="form-control" value="" required/> menit
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Ya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Dashboard</td>
                                <td class="td-actions">
                                    <input type="checkbox" name="" value="">
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
