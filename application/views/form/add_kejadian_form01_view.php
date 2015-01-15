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
									<!--div class="control-group  pull-right" style="margin-right:100px;">											
										<label class="control-label">No : </label>
										<div class="controls">
											<input type="text" style="text-align:center;" name="kode" class="span3 disable" id="" placeholder="Pelapor" value="PPL-<?php echo date('Y');?>-MTR-<?php echo date('m');?>-<?php echo $count;?>" readonly>
										</div> <!-- /controls -->				
									<!--/div--> <!-- /control-group -->
									<!-- /control-group -->
									<!--div class="control-group">											
										<label class="control-label">No Tlp</label>
										<div class="controls">
											<input type="text" class="span4" id="" placeholder="Tlp" value="">
										</div> <!-- /controls -->				
									<!--/div> <!-- /control-group -->
									<!--div class="control-group">											
										<label class="control-label">Alamat</label>
										<div class="controls">
											<textarea class="span4" id="" name="alamat" placeholder="Alamat" value=""></textarea>
										</div> <!-- /controls >				
									</div> <!-- /control-group -->
									<!-- /control-group -->
									<div class="span12">
										<br>
										<br>
										<input type="hidden" style="text-align:center;" name="kode" class="span3 disable" id="" placeholder="Pelapor" value="PPL-<?php echo date('Y');?>-MTR-<?php echo date('m');?>-<?php echo $count;?>" readonly>
										<div class="span5">
										<div class="control-group">											
											<label class="control-label">Nama Kejadian</label>
											<div class="controls">
												<input type="text" class="span4" id="" name="kejadian" placeholder="Nama Kejadian" value="">
											</div> <!-- /controls -->				
										</div>
									<!--div class="control-group">											
										<label class="control-label">Gejala Umum</label>
										<div class="controls">
											<textarea class="span4" id="" name="gejala_umum" placeholder="Gejala Umum" value=""></textarea>
										</div> <!-- /controls -->				
									<!--/div>
									<div class="control-group">											
										<label class="control-label">Pasien Normal</label>
										<div class="controls">
											<input type="text" class="span4"  name="ps_normal" placeholder="Pasien Normal" value=""> Orang
										</div> <!-- /controls -->				
									<!--/div>
									<div class="control-group">											
										<label class="control-label">Pasien Sakit</label>
										<div class="controls">
											<input type="text" class="span4"  name="ps_sakit" placeholder="Pasien Sakit" value=""> Orang
										</div> <!-- /controls -->				
									<!--/div>
									<div class="control-group">											
										<label class="control-label">Pasien Meninggal</label>
										<div class="controls">
											<input type="text" class="span4"  name="ps_meninggal" placeholder="Pasien Meninggal" value=""> Orang
										</div> <!-- /controls -->				
									<!--/div-->
									
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