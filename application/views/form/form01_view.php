<?php
function show_gjl($kode){
$gjl = explode(',',$kode);
$gjl_length = sizeof($gjl);
for($no = 0; $no<=$gjl_length-1; $no++){
$sql = mysql_query("select gejala from tbl_gejala where kd_gejala = '".$gjl[$no]."'");
$row = mysql_fetch_array($sql);
$gejala[] = $row['gejala'];
}
return implode(', ',$gejala);
}
date_default_timezone_set('asia/jakarta');
$hour = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24');
$min = array('00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25',
			 '26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50',
			 '51','52','53','54','55','56','57','58','59');
$lhour = sizeof($hour)-1;
$lmin = sizeof($min)-1;

?>
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script>
$(function() {
$( "#date_1" ).datepicker({ dateFormat:'yy-mm-dd' });
$( "#date_2" ).datepicker({ dateFormat:'yy-mm-dd' });
});
</script>
	<script>
		$(document).ready(function(){
		
		$('#pgn').keypress(function(e){  
		var a = 1;
		
		if(e.keyCode==13){ 
			e.preventDefault();
			var pangan = $('#pgn').val(); 
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan[]' style='border-radius:0px;background:whitesmoke;margin-top:2px;width:145px;margin-right:3px;float:left'>"; 
			$("#itemlist").append(items);
			$("#pgn").focus();
			$("#pgn").val('');
		}
		
	});
		});
	</script>
<div class="row">
  	<div class="span12">      		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>FORM 01</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#formcontrols" data-toggle="tab">Form</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="formcontrols">
							<b><center>LAPORAN KEJADIAN KLB / KERACUNAN PANGAN</center></b><br>
							<form id="edit-profile" class="form-horizontal" method="post" action="<?php echo base_url();?>form/form01/save_keluhan">
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
										<div class="control-group">											
											<label class="control-label">Terdapat Kejadian :</label>				
										</div> <!-- /control-group -->
										<div class="span4">
										<div class="control-group">											
											<label class="control-label">Pasien</label>
											<div class="controls">
												<input type="text" class="span3" id="" name="pasien" placeholder=" Nama Pasien" value="">
												<input type="hidden" class="span3" id="" name="kode" value="<?php echo $kode;?>">
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Jenis Kelamin</label>
											<div class="controls">
												<input type="radio" name="jk" value="Pria" style="margin-top:-3px">Pria &nbsp;&nbsp;&nbsp;
												<input type="radio" name="jk" value="Wanita" style="margin-top:-3px">Wanita
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Usia</label>
											<div class="controls">
												<input type="number" class="span3" id="" name="" placeholder="Usia Pasien" value="" style="width:200px" required/>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
										<label class="control-label">Pendidikan</label>
										<div class="controls">
											<select name="" required>
												<option> -- Pilih Pendidikan -- </option>
											</select>
										</div> <!-- /controls -->
										</div>
										<div class="control-group">											
											<label class="control-label">Pekerjaan</label>
											<div class="controls">
												<select name="pekerjaan" required>
												<option> -- Pilih Pekerjaan -- </option>
												<?php foreach($pekerjaan as $row){?>
												<option value="<?php echo $row->id_pekerjaan;?>"><?php echo $row->pekerjaan;?></option>
												<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div>
									<div class="control-group">											
										<label class="control-label">Waktu Makan</label>
										<div class="controls">

											<input type="text" class="span3" id="date_1" name="awal_kejadian" placeholder="Waktu Makan" value="" style="float:left;width:200px">

										<select name="h_awal" style="float:left;width:50px">
											<?php for($no = 0;$no <= $lhour;$no++){?>
											<option value="<?php echo $hour[$no];?>" <?php if(date('h')==$hour[$no]){ echo 'selected'; }?>><?php echo $hour[$no];?></option>
											<?php } ?>
											</select>
											<select name="m_awal" style="float:left;width:50px">
											<?php for($no = 0;$no <= $lmin;$no++){?>
											<option value="<?php echo $min[$no];?>" <?php if(date('i')==$min[$no]){ echo 'selected'; }?>><?php echo $min[$no];?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls -->				
									</div>
									<div class="control-group">											
										<label class="control-label">Waktu Gejala</label>
										<div class="controls">

											<input type="text" class="span4" id="date_2" name="mulai_kejadian" placeholder="Waktu Gejala" value="" style="float:left;width:200px">

											<select name="h_kej" style="float:left;width:50px">
											<?php for($no = 0;$no <= $lhour;$no++){?>
											<option value="<?php echo $hour[$no];?>" <?php if(date('h')==$hour[$no]){ echo 'selected'; }?>><?php echo $hour[$no];?></option>
											<?php } ?>
											</select>
											<select name="m_kej" style="float:left;width:50px">
											<?php for($no = 0;$no <= $lmin;$no++){?>
											<option value="<?php echo $min[$no];?>" <?php if(date('i')==$min[$no]){ echo 'selected'; }?>><?php echo $min[$no];?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls -->				
									</div>
										
									<div class="control-group">											
											<label class="control-label">Status Pasien</label>
											<div class="controls">
												<input type="radio" name="status" value="0" style="margin-top:-3px">Sehat &nbsp;&nbsp;&nbsp;
												<input type="radio" name="status" value="1" style="margin-top:-3px">Sakit &nbsp;&nbsp;&nbsp;
												<input type="radio" name="status" value="2" style="margin-top:-3px">Meninggal
											</div> <!-- /controls -->				
										</div>
										</div>
										<div class="span7">
											<div class="control-group">											
											<label class="control-label">Gejala</label>
	                                        <div class="controls">
	                                        	<table>
													<tr>
													<?php $no = 1; foreach($gejala as $gej){?>
	                                        			<td><input type="checkbox" name="gejala<?php echo $no;?>" value="<?php echo $gej->kd_gejala;?>" style="margin-top:-2px">&nbsp;<span style=""><?php echo $gej->gejala;?></span>&nbsp;</td>
	                                        		<?php
													if($no%4==0){?>
													</tr>
													<tr>
													<?php } $no++; }  ?>
													</tr>
	                                        		<tr>
	                                        			<!--td><input type="checkbox" name="lain" id="lain"> Lainnya</td-->
	                                        			<td colspan="3"><input type="text" class="span2" id="" placeholder="Lainnya" value="" name="lainnya"></td>
	                                        		</tr>
													<input type="hidden" name="grow" value="<?php echo $no-1;?>">
	                                        	</table>
	                                        </div>		<!-- /controls -->		
										</div> <!-- /control-group -->
										<div class="control-group">											
										<label class="control-label">Kategori TPM</label>
										<div class="controls">
											<select class="span3" id="" name="">
												<option> -- Pilih Kategori TPM -- </option>
											</select>
										</div> <!-- /controls -->
										</div>
										<div class="control-group">											
										<label class="control-label">Sumber TPM</label>
										<div class="controls">
											<table>
													<tr>
	                                        			<td><input type="checkbox" name="" value="" style="margin-top:-2px">&nbsp;<span style="">Data 1</span>&nbsp;</td>
	                                        			<td><input type="checkbox" name="" value="" style="margin-top:-2px">&nbsp;<span style="">Data 2</span>&nbsp;</td>
													</tr>
	                                        		<tr>
	                                        			<td colspan="3"><input type="text" id="" name="lokasi" placeholder="Sumber TPM" value=""></td>
	                                        		</tr>
													<input type="hidden" name="grow" value="<?php echo $no-1;?>">
	                                        	</table>
										</div> <!-- /controls -->				
									</div>
										</div>
										<div class="span7">
											<div class="control-group">											
											<label class="control-label">Pangan</label>
											<?php if($isset_pangan>0){?>
											<input type="hidden" name="type_pangan" value="cb">
											<div class="controls">
											<table>
											<tr>
												<?php $no=1; foreach($tmp_pangan as $prow){?>
												<td style=""><input type="checkbox" name="pangan_cb[]" value="<?php echo $prow->kd_pangan;?>" style="margin-top:-2px">&nbsp;<span style=""><?php echo $prow->pangan;?></span>&nbsp;</td>
												<?php if($no%4==0){?>
												</tr>
												<tr>
												<?php } ?>
												<?php $no++; } ?>
											</tr>
											<tr>
												<td colspan=4><input type="text" class="span2" id="pgn" placeholder="Masukkan Pangan Dan Tekan Enter" value="" name="" style="width:462px;border-radius:0px"></td>
											</tr>
											<tr>
												<td colspan=4 id="itemlist"></td>
											</tr>
											</table>
											</div>
											<?php }else{?>
											<input type="hidden" name="type_pangan" value="tx">
	                                        <div class="controls">
	                                        	<table>
	
	                                        		<tr>
	                                        			<td colspan="3">
														<table border=0 cellspacing=0>
														
														<tr>
															<td><input type="text" class="span2" id="pgn" placeholder="Masukkan Pangan Dan Tekan Enter" value="" name="" style="width:462px;border-radius:0px"></td>
														</tr>
														<tr>
															<td id="itemlist" style="width:525px;pading-bottom:3px"></td>
														</tr>
														</table>
														</td>
	                                        		</tr>
													<input type="hidden" name="prow" value="<?php echo $no-1;?>">
	                                        	</table>
	                                        </div>		<!-- /controls -->		
											<?php } ?>
										</div> <!-- /control-group -->
										
										</div>
										</div>
										
										
									</div>
								
									
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Simpan"/> 
										<a data-toggle="modal" href="#myModal" class="btn btn-success"> Selesai / Tampilkan Hasil </a>


										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										                <h4 class="modal-title">Deskripsi</h4>
										            </div>
										            <form class ='form-horizontal' action="#" method="post">
										                <div class="modal-body">  
															<div class="control-group" id="">
										                        <label class="control-label">Deskripsi</label>
										                        <div class="controls">
										                            <textarea class="span3" name="" class="form-control" required></textarea>
										                        </div>
										                    </div>	
										                </div>
										                <div class="modal-footer">
										                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
										                    <!--input type="submit" class="btn btn-primary" value="Simpan"/-->
										                    <a href="<?php echo base_url();?>form/form01/generate_result"><input type="button" class="btn btn-warning" value="Tampilkan Hasil"/></a>
										                </div>
										            </form>
										        </div><!-- /.modal-content -->
										    </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->

									</div> <!-- /form-actions -->
								</fieldset>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>