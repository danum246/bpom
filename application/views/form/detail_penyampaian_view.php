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
  				<h3>HASIL ANALISA RACUN</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<table>
						<tr>
							<td style="width:150px">Nama Kejadian</td>
							<td>:</td>
							<td style="width:300px"><?php echo $kejadian->nama_kejadian;?></td>
							<td style="width:150px">Puskesmas</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td>Jumlah Korban</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'all');?></td>
							<td>Kecamatan</td>
							<td>:</td>
							<td></td>
						</tr>	
						<tr>
							<td>Jumlah Meninggal</td>
							<td>:</td>
							<td><?php echo total($kejadian->kd_keluhan,'2');?></td>
							<td>Kabupaten / Provinsi</td>
							<td>:</td>
							<td></td>
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
