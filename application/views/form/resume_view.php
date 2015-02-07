
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script>
$(function() {
  $( "#from" ).datepicker({
    changeMonth: true,
    numberOfMonths: 2,
    onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#to" ).datepicker({
    changeMonth: true,
    numberOfMonths: 2,
    onClose: function( selectedDate ) {
      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
    }
  });
});
</script>

<script>
function print(idk){
$('#printform').load('<?php echo base_url();?>form/report/puskesmas/'+idk);
}
</script>

<div class="row">
  	<div class="span12">      		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Resume</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#data" data-toggle="tab">Data</a></li>
					  <li><a href="#report" data-toggle="tab">Report</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="data">
							<div class="span11">
								<table id="example1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kode Keluhan</th>
				                        	<th>Nama Kejadian</th>
				                        	<th>Tanggal</th>
				                        	<th>Nama Pelapor</th>
			                                <th width="120">Aksi</th>
				                        </tr>
				                    </thead>
				                    <tbody>
										<?php $no = 1; foreach($keluhan as $row){?>
				                        <tr>
				                        	<td><?php echo $no;?></td>
				                        	<td><a href="<?php echo base_url();?>form/form01/result/<?php echo $row->kd_keluhan;?>"><?php echo $row->kd_keluhan;?></a></td>
				                        	<td><?php echo $row->nama_kejadian;?></td>
				                        	<td><?php echo $row->waktu_lapor;?></td>
				                        	<td><?php echo $row->pelapor;?></td>
				                        	<td class="td-actions">
												<a data-toggle="modal" href="#editModal" class="btn btn-success btn-small" onclick="print('<?php echo $row->kd_keluhan; ?>')"><i class="btn-icon-only icon-print"> </i></a>
												<a class="btn btn-primary btn-small" href="#"><i class="btn-icon-only icon-pencil"> </i></a>
												<a class="btn btn-danger btn-small" onclick="return confirm('Apakah Anda Yakin?')" href="<?php echo base_url();?>form/form01/del_keluhan/<?php echo $row->kd_keluhan;?>">
												<i class="btn-icon-only icon-remove"> </i></a>
											</td>
				                        </tr>
										<?php $no++; } ?>
				                    </tbody>
				               	</table>
							</div>
						</div>
						<div class="tab-pane" id="report">
							<form id="edit-profile" class="form-horizontal" method="post" action="#">
								<fieldset>
									<div class="control-group">											
										<label class="control-label" for="username">From</label>
										<div class="controls">
											<input type="text" class="span6" id="from" placeholder="dd/mm/yyyy" value="">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									<div class="control-group">											
										<label class="control-label" for="firstname">To</label>
										<div class="controls">
											<input type="text" class="span6" id="to" placeholder="dd/mm/yyyy" value="">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Save"/> 
										<input type="reset" class="btn btn-warning" value="Reset"/>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="printform">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->