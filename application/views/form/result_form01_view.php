<?php
function persentase($racun,$totrow,$kode){
	$sql = mysql_query("select count(*) as total from tbl_analisa where kd_racun = '$racun' and kd_keluhan = '$kode' and persentase >=50");
	$row = mysql_fetch_array($sql);
	$jml_row = $row['total'];
	return number_format($jml_row/$totrow*100,2);
}

function total($kd_keluhan,$flag){
	if($flag=='all'){
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan'");
	}else{
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan' and status_pasien='$flag'");
	}
	$row = mysql_fetch_array($sql);
	return $row['total'];
}

function total_stpm($kd_keluhan,$where){
	
		$sql = mysql_query("SELECT COUNT(*) AS total FROM tbl_sumbertpm b JOIN tbl_keluhan_pasien a ON a.`flag_form` = b.`flag_form` WHERE a.`kd_keluhan` = '$kd_keluhan' $where");
	
	$row = mysql_fetch_array($sql);
	return $row['total'];
}

function persen_gejala($totpas,$gjl,$kode){
	$query = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan = '$kode' and (kd_gejala like '$gjl,%' or kd_gejala like '%,$gjl,%' or kd_gejala like '%,$gjl')");
	$row = mysql_fetch_array($query);
	return $row['total']/$totpas*100;
}

function persen_pangan($total,$kd,$kode){
	$query = mysql_query("select count(*) as total from tbl_keluhan_pasien  a join tbl_sumbertpm b on a.flag_form = b.flag_form where ((b.kd_pangan like '$kd,%') or (b.kd_pangan like '%,$kd,%') or (b.kd_pangan like '%,$kd')) and a.kd_keluhan = '$kode'");
	$row = mysql_fetch_array($query);
	$tot_pgn = $row['total'];
	return $tot_pgn/$total*100;
}

function tjns($kd_keluhan,$flag){
	if($flag=='all'){
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan'");
	}else{
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan' and jns_kel='$flag'");
	}
	$row = mysql_fetch_array($sql);
	return $row['total'];
}

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

function show_pgn($kode){
$pgn = explode(',',$kode);
$plength = sizeof($pgn)-1;
for($n = 0; $n <= $plength; $n++){
$sql = mysql_query("select pangan from tbl_pangan where kd_pangan = '".$pgn[$n]."'");
$row = mysql_fetch_array($sql);
$pangan[] = $row['pangan'];
}
return implode(', ',$pangan);
}

function getdata($select,$as,$kode,$where){
	$query = mysql_query("select $select as $as from tbl_keluhan_pasien where kd_keluhan = '$kode' $where");
	$row = mysql_fetch_array($query);
	return $row[$as];
}
?>

<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>HASIL ANALISA</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<h4 style="background:whitesmoke;padding:10px;border:1px solid lightgray" align="center"><?php echo $kejadian->descs;?></h4>
					<br>
					<table  class="table table-bordered table-striped">
						<tr>
							<th style="width:150px">Nama Kejadian</th>
							<td>:</td>
							<td style="width:300px"><?php echo $kejadian->nama_kejadian;?></td>
							<th>Korban Sehat</th>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'0');?> Orang</td>
						</tr>
						<tr>
							<th style="width:150px">Puskesmas</th>
							<td>:</td>
							<td><?php echo $kejadian->kelurahan;?></td>
							<th>Korban Sakit</th>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'1');?> Orang</td>
							
						</tr>	
						<tr><th>Kecamatan</th>
							<td>:</td>
							<td><?php echo $kejadian->kecamatan;?></td>
							<th>Korban Pria</th>
							<td>:</td>
							<td><?php echo tjns($kejadian->kd_keluhan,'Pria');?> Orang</td>
							
							
						</tr>
						<tr><th style="width:200px">Kabupaten / Kota / Provinsi</th>
							<td>:</td>
							<td><?php echo $kejadian->kabupaten_kota;?></td>
							
							<th>Korban Meninggal</th>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'2');?> Orang</td>
						</tr>
						<tr><th>Jumlah Korban</th>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'all');?> Orang</td>
						
							<th>Korban Wanita</th>
							<td>:</td>
							<td><?php echo tjns($kejadian->kd_keluhan,'Wanita');?> Orang</td>
							
						</tr>
						<tr>
							<th style="width:200px;height:25px" >Korban Berdasarkan Pekerjaan</th>
							<th>:</th>
							<th colspan=4>
							&nbsp;
							</th>
						</tr>
						<?php foreach($pekerjaan as $rw){
							$job = $rw->pekerjaan;
							$count = $this->db->query("select count(*) as total from tbl_keluhan_pasien where pekerjaan_id='$rw->id_pekerjaan' and kd_keluhan = '$kejadian->kd_keluhan'")->row()->total;
							if($count>=0){
							?>
							<tr>
							<td><?php echo $job;?></td>
							<td>:</td>
							<td colspan=4><?php echo $count;?> Orang</td>
							</tr>
							<?php } } ?>
						<tr>
							<td colspan=6 style="height:5px">&nbsp;</td>
						</tr>
					</table>

					<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#analisaracun" data-toggle="tab">Analisa Racun & Gejala</a></li>
						  <li><a href="#inkubasi" data-toggle="tab">Masa Inkubasi</a></li>
						  <li><a href="#attack" data-toggle="tab">Attack Rate</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="analisaracun">
								<table id="example1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Kode Racun</th>
			                                <th>Nama Racun</th>
			                                <th>Persentase Kemungkinan Racun</th>
				                        </tr>
				                    </thead>
				                    <tbody>
										<?php $no = 1; foreach($racun as $row){?>
				                        <tr>
				                        	<td><?php echo $no;?></td>
				                        	<td><?php echo $row->kd_racun;?></td>
				                        	<td><?php echo $row->racun;?></td>
			                                <td><?php echo persentase($row->kd_racun,$totrow,$kode);?>&nbsp; %</td>
				                        </tr>
										<?php $no++; } ?>
										<!--tr>
				                        	<th>Gejala Umum</th>
				                        	<td colspan=3><?php echo $gjl_umum;?></td>
				                        </tr>
										<!--tr>
				                        	<th>Pangan Umum</th>
				                        	<td colspan=3>
											<?php echo show_pgn($pangan);?>
											</td>
				                        </tr-->
				                    </tbody>
				               	</table>
								<hr>
								<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Gejala</th>
									<th>Persentase</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$gjlm = explode(',',$gjl_umum);
								$lgjl = sizeof($gjlm);
								$nmbr = 0;
								$no = 1;
								for($nmbr;$nmbr<=$lgjl-1;$nmbr++){?>
									
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo show_gjl($gjlm[$nmbr]) ;?></td>
										<td><?php echo persen_gejala($totpas,$gjlm[$nmbr],$kode);?> %</td>
									</tr>
									
								<?php $no++; }
								?>
								</tbody>
								</table>
								<hr>
								<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Pangan</th>
									<th>Persentase</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$pgn = explode(',',$pangan);
								$lpgn = sizeof($pgn);
								$nmbr = 0;
								$no = 1;
								for($nmbr;$nmbr<=$lpgn-1;$nmbr++){?>
									
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo show_pgn($pgn[$nmbr]) ;?></td>
										<td><?php echo persen_pangan($totstpm,$pgn[$nmbr],$kode) ?> %</td>
									</tr>
									
								<?php $no++; }
								?>
								</tbody>
								</table>
							</div>							
							<div class="tab-pane" id="inkubasi">
								<div class="widget">
		                            <div class="widget-header">
		                                <i class="icon-bar-chart"></i>
		                                <h3>
		                                    Grafik Masa Inkubasi</h3>
		                            </div>
		                            <!-- /widget-header -->
		                            <div class="widget-content">
		                                <canvas id="bar-chart" class="chart-holder" width="538" height="250">
		                                </canvas>
		                                <!-- /bar-chart -->
		                            </div>
		                            <!-- /widget-content -->
		                        </div>
								<table id="analisa4" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Inkubasi</th>
			                                <th>Waktu ( Menit )</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>Inkubasi Pendek</td>
				                        	<td><?php echo (int)$inkubasi->MIN;?></td>
				                        </tr>
				                        <tr>
				                        	<td>2</td>
				                        	<td>Inkubasi Tinggi</td>
				                        	<td><?php echo (int)$inkubasi->MAX;?></td>
				                        </tr>
				                        <tr>
				                        	<td>3</td>
				                        	<td>Inkubasi Rata - Rata</td>
				                        	<td><?php echo (int)$inkubasi->AVG;?></td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>
							<div class="tab-pane" id="attack">
								<table id="analisa1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Sumber TPM</th>
			                                <th>Total</th>
			                                <th>Kasus</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
									<?php $n = 1; foreach($sumbertpm as $row){?>
				                        <tr>
				                        	<td><?php echo $n;?></td>
				                        	<td><?php echo $row->sumber_tpm;?></td>
											<td><?php echo total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."'");?></td>
				                        	<td><?php echo total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."' and (a.status_pasien=1 or a.status_pasien=2)");?></td>
			                                <td>
											<?php 
											if(total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."'")!=0 and total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."' and (a.status_pasien=1 or a.status_pasien=2)")!=0){
											echo total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."'")/total_stpm($kode,"and b.sumber_tpm = '".$row->sumber_tpm."' and (a.status_pasien=1 or a.status_pasien=2)")*100;
											}else{
												echo '-';
											} ?> %</td>
				                        </tr>
									<?php $n++; } ?>
				                    </tbody>
				               	</table>
				               	
				               	<hr>
				               	<table id="analisa3" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Jenis Kelamin</th>
			                                <th>Total</th>
			                                <th>Kasus</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>Pria</td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Pria'")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Pria'");
											}else{
												echo '-';
											}?></td>
				                        	<td><?php
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Pria' and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Pria' and (flag = 1 or flag = 2)");
											}else{
												echo '-';
											}?></td>
			                                <td><?php 
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Pria'")!=0 and getdata('count(*)','total',$kode,"and jns_kel = 'Pria' and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Pria'")/getdata('count(*)','total',$kode,"and jns_kel = 'Pria'")*100;
											}else{
												echo '-';
											}?> %</td>
				                        </tr>
										<tr>
				                        	<td>2</td>
				                        	<td>Wanita</td>
				                        	<td><?php
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'");
											}else{
												echo '-';
											}?></td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Wanita' and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Wanita' and (flag = 1 or flag = 2)");
											}else{
												echo '-';
											}?></td>
			                                <td><?php 
											if(getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")!=0 and getdata('count(*)','total',$kode,"and jns_kel = 'Wanita' and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")/getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")*100;
											}else{
												echo '-';
											}?> %</td>
				                        </tr>
										<!--tr>
				                        	<td colspan=2>Total</td>
				                        	<td><?php echo getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")+getdata('count(*)','total',$kode,"and jns_kel = 'Pria'");?></td>
				                        	<td><?php echo getdata('count(*)','total',$kode,"and jns_kel = 'Wanita' and (flag = 1 or flag = 2)")+getdata('count(*)','total',$kode,"and jns_kel = 'Pria' and (flag = 1 or flag = 2)");?></td>
			                                <td><?php echo (getdata('count(*)','total',$kode,"and jns_kel = 'Wanita'")+getdata('count(*)','total',$kode,"and jns_kel = 'Pria'"))/((getdata('count(*)','total',$kode,"and jns_kel = 'Wanita' and (flag = 1 or flag = 2)"))+(getdata('count(*)','total',$kode,"and jns_kel = 'Pria' and (flag = 1 or flag = 2)")))*100;?> %</td>
				                        </tr-->
				                    </tbody>
				               	</table>
								<hr>
				               	<table id="analisa2" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Umur ( Tahun )</th>
			                                <th>Total</th>
			                                <th>Kasus</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>&lt; 11</td>
				                        	<td>
											<?php 
											if(getdata('count(*)','total',$kode,"and usia < 11")!=0){
											echo getdata('count(*)','total',$kode,"and usia < 11");
											}else{
												echo '-';
											}?></td>
				                        	<td>
											<?php 
											if(getdata('count(*)','total',$kode,"and usia < 11 and (flag = 1 or flag = 2)")!=0){
												echo getdata('count(*)','total',$kode,"and usia < 11 and (flag = 1 or flag = 2)");
											}else{
												echo '-';
											}?></td>
			                                <td><?php 
											if(getdata('count(*)','total',$kode,"and usia < 11")!=0 and getdata('count(*)','total',$kode,"and usia < 11 and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and usia < 11")/getdata('count(*)','total',$kode,"and usia < 11 and (flag = 1 or flag = 2)")*100;
											}else{
												echo '-';
											}?> %</td>
				                        </tr>
										<tr>
				                        	<td>2</td>
				                        	<td>11 - 15</td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) ")!=0){
											echo getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) ");
											}else{
												echo '-';
											}?></td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) and (flag = 1 or flag=2)")!=0){
												echo getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) and (flag = 1 or flag=2)");
											}else{
												echo '-';
											}?></td>
			                                <td><?php 
											if(getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) ")!=0 and getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) and (flag = 1 or flag=2)")!=0){
											echo getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) ")/getdata('count(*)','total',$kode,"and (usia >= 11 and usia <= 15) and (flag = 1 or flag=2)")*100;
											}else{
												echo '-';
											}?> %</td>
				                        </tr>
										<tr>
				                        	<td>3</td>
				                        	<td>16+</td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and usia >= 16 ")!=0){
											echo getdata('count(*)','total',$kode,"and usia >= 16");
											}else{
												echo '-';
											}?></td>
				                        	<td><?php 
											if(getdata('count(*)','total',$kode,"and usia >=16 and (flag = 1 or flag = 2)")!=0){
												echo getdata('count(*)','total',$kode,"and usia >=16 and (flag = 1 or flag = 2)");
											}else{
												echo '-';
											}?></td>
			                                <td><?php 
											if(getdata('count(*)','total',$kode,"and usia >= 16")!=0 and getdata('count(*)','total',$kode,"and usia >=16 and (flag = 1 or flag = 2)")!=0){
											echo getdata('count(*)','total',$kode,"and usia >=16")/getdata('count(*)','total',$kode,"and usia >=16 and (flag = 1 or flag = 2)")*100;
											}else{
												echo '-';
											}?> %</td>
				                        </tr>
										
				                    </tbody>
				               	</table>
							</div>
							
						</div>
					</div>

					<br><hr>

	               	<table>
	               		<tr style="background:whitesmoke">
							<td>Hasil Lab</td>
							<td>:</td>
							<td><a href="<?php echo base_url();?>assets/upload/data/<?php echo $kejadian->file;?>"><?php echo $kejadian->file;?></a></td>
							<td colspan=3>&nbsp;</td>
						</tr>
	               	</table>
	               	<a data-toggle="modal" href="#myModal" class="pull-right btn btn-primary"> Upload Hasil Lab </a><br>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chart.min.js" type="text/javascript"></script>
<script>
    var barChartData = {
        labels: ["Inkubasi Pendek", "Inkubasi Tinggi", "Inkubasi Rata-rata"],
        datasets: [
			/*{
			    fillColor: "rgba(220,220,220,0.5)",
			    strokeColor: "rgba(220,220,220,1)",
			    data: [65,63]
			},*/
			{
			    fillColor: "rgba(151,187,205,0.5)",
			    strokeColor: "rgba(151,187,205,1)",
			    data: [<?php echo (int)$inkubasi->MIN;?>, <?php echo (int)$inkubasi->MAX;?>, <?php echo (int)$inkubasi->AVG;?>]
			}
		]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);

</script>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM DATA</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>form/form01/upload" method="post" enctype='multipart/form-data'>
                <div class="modal-body" style="margin-left: -60px;">    
                    <div class="control-group" id="">
                        <label class="control-label">Hasil Lab</label>
                        <div class="controls">
                            <input type="file" class="span4" name="userfile" placeholder="Input Jabatan" class="form-control" required/>
                            <input type="hidden" class="span4" name="kode" value="<?php echo $this->uri->segment(4);?>" required/>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Upload"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
