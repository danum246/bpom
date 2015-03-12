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
					<?php if (($status->status_klb) == '') { ?>
						<a data-toggle="modal" href="#myModal" class="pull-right btn btn-inverse"> Nyatakan KLB </a><br><hr>
					<?php } elseif (($status->status_klb) == 1) { ?>
						<a data-toggle="modal" href="#myModalstop" class="pull-right btn btn-danger"> Hentikan Status KLB </a><br><hr>
					<?php } else { ?>
						<a href="#" class="pull-right btn btn-success"> Status KLB Sudah Dicabut </a><br><hr>
					<?php } ?>
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
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM PERNYATAAN STATUS KLB</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>form/penyampaian/status_klb" method="post">
            	<input type="hidden" name="no_kejadian" value="<?php echo $status->kd_keluhan; ?>">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Pernyataan KLB :</label>
                        <div class="controls">
                            <label class="radio inline">
								<input type="radio" name="status" value="1">
								Ya (KLB)
							</label>
							<label class="radio inline">
								<input type="radio" name="status" value="0">
								Tidak (Bukan KLB)
							</label>
                        </div>
                    </div> 
                    <div class="control-group" id="">
                        <label class="control-label">Catatan</label>
                        <div class="controls">
                            <textarea name="catatan" class="span3" required></textarea>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalstop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">FORM PEMBERHENTIAN STATUS KLB</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url(); ?>form/penyampaian/henti_klb" method="post" enctype="multipart/form-data">
                <input type="hidden" name="no_kejadian" value="<?php echo $status->kd_keluhan; ?>">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Hentikan Status KLB :</label>
                        <div class="controls">
                            <label class="radio inline">
								<input type="radio" name="status" value="2">
								Ya (KLB)
							</label>
							<label class="radio inline">
								<input type="radio" name="status" value="1">
								Tidak (Tetap KLB)
							</label>
                        </div>
                    </div> 
                    <div class="control-group" id="">
                        <label class="control-label">Jumlah Pasien Dirawat</label>
                        <div class="controls">
                            <input type="text" class="span4" name="pasien_rawat" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Jumlah Pasien Sembuh</label>
                        <div class="controls">
                            <input type="text" class="span4" name="pasien_sembuh" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Hasil Lab</label>
                        <div class="controls">
                            <input type="file" class="span4" name="userfile" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea name="catatan" class="span3" required></textarea>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
