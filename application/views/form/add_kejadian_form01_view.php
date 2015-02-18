<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css">
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({ dateFormat:'yy-mm-dd' });
});
</script>
<div class="row">
  	<div class="span12">      		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>FORM KEJADIAN</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="tabbable">
					<div class="tab-content">
						<div class="tab-pane active" id="formcontrols">
							<b><center>FORM KEJADIAN</center></b><br>
							<form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url();?>form/form01/save_kejadian">
								<fieldset>
									
									<div class="span12">
										<br>
										<br>
										<input type="hidden" style="text-align:center;" name="kode" class="span3 disable" id="" placeholder="Pelapor" value="PPL-<?php echo date('Y');?>-MTR-<?php echo date('m');?>-<?php echo $count;?>" readonly>
										<div class="span5">
										<div class="control-group">											
											<label class="control-label">Nama Kejadian</label>
											<div class="controls">
												<input type="text" class="span4" id="" name="kejadian" placeholder="Nama Kejadian" value="" required>
											</div> <!-- /controls -->				
										</div>
					
									
										</div>
										
									</div>
								
									
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