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
					<table border=0>
						<tr>
							<td style="width:150px">Nama Kejadian</td>
							<td>:</td>
							<td style="width:300px"><?php echo $kejadian->nama_kejadian;?></td>
							<td style="width:150px">Puskesmas</td>
							<td>:</td>
							<td><?php echo $kejadian->kelurahan;?></td>
						</tr>
						<tr>
							<td>Jumlah Korban</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'all');?> Orang</td>
							<td>Kecamatan</td>
							<td>:</td>
							<td><?php echo $kejadian->kecamatan;?></td>
						</tr>	
						<tr>
							<td>Korban Sehat</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'0');?> Orang</td>
							<td style="width:200px">Kabupaten / Kota / Provinsi</td>
							<td>:</td>
							<td><?php echo $kejadian->kabupaten_kota;?></td>
						</tr>
						<tr>
							<td>Korban Sakit</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'1');?> Orang</td>
							<td>Korban Meninggal</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'2');?> Orang</td>
						</tr>
						<tr>
						<td>Korban Pria</td>
							<td>:</td>
							<td><?php echo tjns($kejadian->kd_keluhan,'Pria');?> Orang</td>
							<td>Korban Wania</td>
							<td>:</td>
							<td><?php echo tjns($kejadian->kd_keluhan,'Wanita');?> Orang</td>
							
						</tr>
						<tr>
							<td style="width:200px;height:25px" >Korban Berdasarkan Pekerjaan</td>
							<td>:</td>
							<td rowspan=2>
							<table>
							<?php foreach($pekerjaan as $rw){
							$job = $rw->pekerjaan;
							$count = $this->db->query("select count(*) as total from tbl_keluhan_pasien where pekerjaan_id='$rw->id_pekerjaan' and kd_keluhan = '$kejadian->kd_keluhan'")->row()->total;
							if($count>=0){
							?>
							<tr>
							<td><?php echo $job;?></td>
							<td>:</td>
							<td><?php echo $count;?> Orang</td>
							</tr>
							<?php } } ?>
							</table>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=6 style="height:5px">&nbsp;</td>
						</tr>
					</table>

					<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#analisaracun" data-toggle="tab">Analisa Racun & Gejala</a></li>
						  <li><a href="#inkubasi" data-toggle="tab">Masa Inkubasi</a></li>
						  <li><a href="#attack" data-toggle="tab">Attack Rate</a></li>
						  <li><a href="#desc" data-toggle="tab">Deskripsi</a></li>
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
										<tr>
				                        	<th>Gejala Umum</th>
				                        	<td colspan=3><?php echo show_gjl($gjl_umum);?></td>
				                        </tr>
										<tr>
				                        	<th>Pangan Umum</th>
				                        	<td colspan=3>
											<?php echo show_pgn($pangan);?>
											</td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>							
							<div class="tab-pane" id="inkubasi">
								<div class="widget">
		                            <div class="widget-header">
		                                <i class="icon-bar-chart"></i>
		                                <h3>
		                                    Bar Chart</h3>
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
			                                <th>Waktu</th>
			                                <th>Total</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td>1</td>
				                        	<td>Inkubasi Pendek</td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                        <tr>
				                        	<td>2</td>
				                        	<td>Inkubasi Tinggi</td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                        <tr>
				                        	<td>3</td>
				                        	<td>Inkubasi Rata - Rata</td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>
							<div class="tab-pane" id="attack">
								<table id="analisa1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Kategori TPM</th>
			                                <th>Total</th>
			                                <th>Sakit</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                    </tbody>
				               	</table>
				               	<hr>
				               	<table id="analisa2" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Kategori Jenis Kelamin</th>
			                                <th>Total</th>
			                                <th>Sakit</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                    </tbody>
				               	</table>
				               	<hr>
				               	<table id="analisa3" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
			                                <th>Kategori Umur</th>
			                                <th>Total</th>
			                                <th>Sakit</th>
			                                <th>Persentase</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
				                        	<td></td>
			                                <td></td>
				                        </tr>
				                    </tbody>
				               	</table>
							</div>
							<div class="tab-pane" id="desc">
								<p>asasasasasassssssssssssssssssssssssssssssssssssssss</p>
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
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
			{
			    fillColor: "rgba(220,220,220,0.5)",
			    strokeColor: "rgba(220,220,220,1)",
			    data: [65, 59, 90, 81, 56, 55, 40]
			},
			{
			    fillColor: "rgba(151,187,205,0.5)",
			    strokeColor: "rgba(151,187,205,1)",
			    data: [28, 48, 40, 19, 96, 27, 100]
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
