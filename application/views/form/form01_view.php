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
										<div class="span5">
										<div class="control-group">											
											<label class="control-label">Pasien</label>
											<div class="controls">
												<input type="text" class="span4" id="" name="pasien" placeholder="Pasien" value="">
												<input type="hidden" class="span4" id="" name="kode" value="<?php echo $kode;?>">
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
											<label class="control-label">Pekerjaan</label>
											<div class="controls">
												<select name="pekerjaan" style="width:310px">
												<option></option>
												</select>
											</div> <!-- /controls -->				
										</div>
									<div class="control-group">											
										<label class="control-label">Waktu Makan</label>
										<div class="controls">
											<input type="text" class="span4" id="date_1" name="awal_kejadian" placeholder="Waktu Makan" value="" style="float:left;width:200px">
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
										<label class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" class="span4" id="" name="lokasi" placeholder="Lokasi" value="">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									<!--div class="control-group">											
										<label class="control-label">Kelurahan</label>
										<div class="controls">
											<select name="kelurahan">
											<option></option>
											<?php foreach($kelurahan as $kel){?>
											<option value="<?php echo $kel->id_kelurahan;?>"><?php echo $kel->kelurahan;?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls >				
									</div> <!-- /control-group 
									<div class="control-group">											
										<label class="control-label">Kecamatan</label>
										<div class="controls">
											<select name="kecamatan">
											<option></option>
											<?php foreach($kecamatan as $kec){?>
											<option value="<?php echo $kec->id_kecamatan;?>"><?php echo $kec->kecamatan;?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls >				
									</div> <!-- /control-group >
									<div class="control-group">											
										<label class="control-label">Kabupaten / Kota</label>
										<div class="controls">
											<select name="kabupaten">
											<option></option>
											<?php foreach($kabupaten as $kab){?>
											<option value="<?php echo $kab->id_kabupaten;?>"><?php echo $kab->kabupaten_kota;?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls >				
									</div> <!-- /control-group >
									<div class="control-group">											
										<label class="control-label">Provinsi</label>
										<div class="controls">
											<select name="provinsi">
											<option></option>
											<?php foreach($provinsi as $pro){?>
											<option value="<?php echo $pro->id_provinsi;?>"><?php echo $pro->provinsi;?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls >				
									</div> <!-- /control-group -->
									<div class="control-group">											
										<label class="control-label">Organ Terlibat</label>
										<div class="controls">
											<select name="organ">
											<option></option>
											<?php foreach($organ as $org){?>
											<option value="<?php echo $org->id_organ;?>"><?php echo $org->organ_terlibat;?></option>
											<?php } ?>
											</select>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
										</div>
										<div class="span5">
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
										</div>
									</div>
								
									
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Simpan"/> 
										<a href="<?php echo base_url();?>form/form01/generate_result"><input type="button" class="btn btn-warning" value="Selesai / Tampilkan Hasil"/></a>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>