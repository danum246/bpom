<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Role Access</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a><br><hr>
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
	                        	<th>Jabatan</th>
                                <th width="120"></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                        	<td>1</td>
	                        	<td>Superadmin</td>
	                        	<td class="td-actions">
									<a  data-toggle="modal" class="btn btn-small btn-success" href="#menu"><i class="btn-icon-only icon-ok"> </i></a>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="#" method="post">
                <div class="modal-body" style="margin-left: -60px;">    
                    <div class="control-group" id="">
                        <label class="control-label">Position</label>
                        <div class="controls">
                            <select class="span4" name="jabatan" class="form-control" value="" required>
                            	<option> -- Choose -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Menu</label>
                        <div class="controls">
                            <select class="span4" name="menu" class="form-control" value="" required>
                                <option> -- Choose -- </option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">MENU</h4>
            </div>
            <form class ='form-horizontal' action="#" method="post">
                <div class="modal-body">    
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Menu</th>
                                <th>Access</th>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->