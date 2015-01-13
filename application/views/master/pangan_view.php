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
	                        	<th width="80">No</th>
                                <th>Pangan</th>
                                <th>Keterangan</th>
	                            <th width="80">Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $no = 1; foreach ($pangan->result() as $row) { ?>
	                        <tr>
	                        	<td><?php echo number_format($no);?></td>
	                        	<td><?php echo $row->pangan;?></td>
	                        	<td><?php echo $row->keterangan;?></td>
	                        	<td class="td-actions">
									<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
									<a onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-small" href="#"><i class="btn-icon-only icon-remove"> </i></a>
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
                <h4 class="modal-title">Tambah Data Pangan</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>master/pangan/save" method="post" enctype="multipart/form-data">
                <div class="modal-body">  
					<div class="control-group" id="">
                        <label class="control-label">Kode Pangan</label>
                        <div class="controls">
                            <input type="text" class="span3" name="kode" placeholder="Input Kode Pangan" class="form-control" value="" required/>
                        </div>
                    </div>	
					<div class="control-group" id="">
                        <label class="control-label">Pangan</label>
                        <div class="controls">
                            <input type="text" class="span3" name="pangan" placeholder="Input Pangan" class="form-control" value="" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea class="span3" name="ket" placeholder="Input Keterangan" class="form-control" required></textarea>
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