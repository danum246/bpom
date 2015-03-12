<style>
#del:hover{
	cursor:pointer;
}
</style>
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
										function exits(){
										//	$('#exit').trigger('click');
										}
										</script>
<script>
$(function() {
$( "#date_1" ).datepicker({ dateFormat:'yy-mm-dd' });
$( "#date_2" ).datepicker({ dateFormat:'yy-mm-dd' });
$( "#tglpada" ).datepicker({ dateFormat:'yy-mm-dd' });
});
function addtpm(){
	$('#viewtpm').load('<?php echo base_url();?>form/form01/addtpm');
}
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
								<div class="modal fade" id="Modaltpm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:1200px;margin-left:-600px">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										                <h4 class="modal-title">Tambah Sumber TPM Dan Pangan</h4>
														</div>
<script>
		$(document).ready(function(){
			$('#rows1').hide();
			$('#rows2').hide();
			$('#rows3').hide();
			$('#rows4').hide();
		$('#pgn0').keypress(function(e){
		if(e.keyCode==13){ 
		e.preventDefault();
			var pangan = $('#pgn0').val();
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan0[]' style='border-radius:0px;;margin-top:2px;width:144px;margin-right:3px;float:left;font-size:8pt;background:#1398DA;color:white;border:none;padding-left:5px'>"; 
			$("#itemlist0").append(items);
			$("#pgn0").focus();
			$("#pgn0").val('');
		}
		});
		
		$('#pgn1').keypress(function(x){
		if(x.keyCode==13){ 
		x.preventDefault();
			var pangan = $('#pgn1').val();
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan1[]' style='border-radius:0px;;margin-top:2px;width:144px;margin-right:3px;float:left;font-size:8pt;background:#1398DA;color:white;border:none;padding-left:5px'>"; 
			$("#itemlist1").append(items);
			$("#pgn1").focus();
			$("#pgn1").val('');
		}
		});
		$('#pgn2').keypress(function(o){
		if(o.keyCode==13){ 
			o.preventDefault();
			var pangan = $('#pgn2').val();
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan2[]' style='border-radius:0px;;margin-top:2px;width:144px;margin-right:3px;float:left;font-size:8pt;background:#1398DA;color:white;border:none;padding-left:5px'>"; 
			$("#itemlist2").append(items);
			$("#pgn2").focus();
			$("#pgn2").val('');
		}
		});
		$('#pgn3').keypress(function(q){
		if(q.keyCode==13){ 
		q.preventDefault();
			var pangan = $('#pgn0').val();
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan3[]' style='border-radius:0px;;margin-top:2px;width:144px;margin-right:3px;float:left;font-size:8pt;background:#1398DA;color:white;border:none;padding-left:5px'>"; 
			$("#itemlist3").append(items);
			$("#pgn3").focus();
			$("#pgn3").val('');
		}
		});
		$('#pgn4').keypress(function(z){
		if(z.keyCode==13){ 
		z.preventDefault();
			var pangan = $('#pgn4').val();
			var items = "<input type='text' class='span2' id='' placeholder='Pangan' value='"+pangan+"' name='pangan4[]' style='border-radius:0px;;margin-top:2px;width:144px;margin-right:3px;float:left;font-size:8pt;background:#1398DA;color:white;border:none;padding-left:5px'>"; 
			$("#itemlist4").append(items);
			$("#pgn4").focus();
			$("#pgn4").val('');
		}
		});
		
		var a = 1;
		$('#tbh').click(function(){
			$('#rows'+a).show();
			a++;
		});
		
		
		});
		function deletes(id){
			$('#rows'+id).hide();
			$('#kat'+id).val(0);
		}
	</script>
	<input type="button" class="btn btn-primary" value="Tambah" id="tbh" style="margin-left:10px;margin-top:10px" />
<table style="margin:10px;font-size:8pt;" id="stpm">	<?php for($a=0;$a<=4;$a++){?>
										<tr style='border-top:1px solid lightgray;background:#f5f5f5;border-bottom:1px solid lightgray' id="rows<?php echo $a;?>"><td style='padding-left:5px;width:90px'><b>Kategori TPM</b></td><td style=''><select class='span3' id='kat<?php echo $a;?>' name='kategori_tpm[]' style='margin-top:2px;font-size:8pt;padding:-left:5px'><option value="0"> -- Pilih Kategori TPM -- </option><option value='Jasa Boga'> Jasa Boga </option><option value='Rumah Makan / Restoran'> Rumah Makan / Restoran </option><option value='Pangan Jajanan'> Pangan Jajanan </option><option value='Kantin Sekolah'> Kantin Sekolah </option><option value='Kantin Institusi'> Kantin Institusi </option><option value='Depot Air Minum'> Depot Air Minum </option><option value='PIRT'> PIRT( Pangan Industri Rumah Tangga ) </option><option value='Rumah Tangga'> Rumah Tangga </option><option value='Event Masyarakat'> Event Masyarakat </option></select></td><td style='padding-left:5px;width:90px'><b>Sumber TPM</b></td><td style=''><input type='text' id='' name='lokasi[]' placeholder='Sumber TPM' value=''  style='margin-top:2px;font-size:8pt;padding-left:5px'></td><td style='padding-left:5px;width:90px'><b>Pangan</b></td><td style=''><?php if($isset_pangan>0){?><input type='hidden' name='type_pangan' value='cb'>	<table><tr><?php $no=1; foreach($tmp_pangan as $prow){?><td style=''><input type='checkbox' name='pangan_cb<?php echo $a;?>[]' value='<?php echo $prow->kd_pangan;?>' style='margin-top:-2px'>&nbsp;<span style=''><?php echo $prow->pangan;?></span>&nbsp;</td><?php if($no%4==0){?></tr><tr><?php } ?><?php $no++; } ?><input type='hidden' name='prow' value='<?php echo $no-1;?>'></tr><tr><td colspan=4><input type='text' class='span2' id='pgn<?php echo $a;?>' placeholder='Masukkan Pangan Dan Tekan Enter' value='' name='' style='width:455px;border-radius:0px;margin-top:2px;font-size:8pt;padding-left:5px;margin-right:5px'></td></tr><tr><td colspan=4 id='itemlist<?php echo $a;?>'></td></tr></table><?php }else{?><input type='hidden' name='type_pangan' value='tx'><table><tr><td colspan='3'><table border=0 cellspacing=0><tr><td><input type='text' class='span2' id='pgn<?php echo $a;?>'  placeholder='Masukkan Pangan Dan Tekan Enter' value='' name=''  style='width:455px;border-radius:0px;margin-top:2px;font-size:8pt;padding-left:5px;margin-right:5px'></td></tr><tr><td id='itemlist<?php echo $a;?>' style='width:525px;pading-bottom:3px'> </td></tr></table></td></tr></table>	<?php } ?></td><?php if($a==0){?><td>&nbsp;</td><?php }else{?><td><img id='del' src="<?php echo base_url();?>assets/delete.png" style="margin-right:5px" onclick="deletes(<?php echo $a;?>)"></td><?php } ?></tr>
										<?php } ?>
										</table>
									<input type="hidden" name="mrow" id="mrow" value="0">
										
										<div class="modal-footer">
										
										                    <button type="button" class="btn btn-default" id="exit" data-dismiss="modal">Ok</button>
										     
										                    
										                </div>
												
										        </div><!-- /.modal-content -->
										    </div><!-- /.modal-dialog -->
										</div>
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
												<input type="text" class="span3" id="" name="usia" placeholder="Usia Pasien" value="" style="width:200px" required/>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
										<label class="control-label">Pendidikan</label>
										<div class="controls">
											<select name="pendidikan" required>
												<option> -- Pilih Pendidikan -- </option>
												<option value="SD"> SD / Sederajat</option>
												<option value="SMP"> SMP / Sederajat </option>
												<option value="SMA"> SMA / Sederajat</option>
												<option value="Diploma"> Diploma</option>
												<option value="Sarjana"> Sarjana</option>
												<option value="Lain-lain"> Lain-lain</option>
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
													<input type="hidden" name="flag_form" id="flag_form" value="<?php echo date('Ymdhis');?>">
	                                        	</table>
	                                        </div>		<!-- /controls -->		
										</div> <!-- /control-group -->
										<div class="control-group">
										<label class="control-label">&nbsp;</label>
										<div class="controls">
										<a data-toggle="modal" href="#Modaltpm" class="btn btn-success" style="margin-left:-60px"> Tambah Pangan & Sumber TPM </a>
										</div>
										</div>
										</div>
										</div>
										
										
									</div>
									
									
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Simpan"/> 
										<a data-toggle="modal" href="#myModal" class="btn btn-success"> Selesai / Tampilkan Hasil </a>
 

									</div> <!-- /form-actions -->
								</fieldset>
								
							</form>
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
										                <h4 class="modal-title">Deskripsi</h4>
										            </div>
										            <form class ='form-horizontal' action="<?php echo base_url();?>form/form01/generate_result" method="post">
										                <div class="modal-body">  
															<div class="control-group" id="">
										                        <table>
																<tr>
																<td style="width:250px">Kejadian KLB Keracunan Pangan Pada </td>
																<td><input type="text" name="pada"></td>
																</tr>
																<tr>
																<td>Tanggal</td>
																<td><input type="text" name="tglpada" id="tglpada"></td>
																</tr>
																<tr>
																<td>Di</td> 
																<td><input type="text" name="dipada"></td>
																</tr>
																</table>
										                    </div>	
										                </div>
										                <div class="modal-footer">
										                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
										                    <!--input type="submit" class="btn btn-primary" value="Simpan"/-->
										                   <input type="submit" class="btn btn-warning" value="Tampilkan Hasil"/>
										                </div>
										            </form>
										        </div><!-- /.modal-content -->
										    </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<!-- /.modal -->