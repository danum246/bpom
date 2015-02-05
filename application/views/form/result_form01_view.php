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
						<tr>
							<td>Hasil Lab</td>
							<td>:</td>
							<td><a href="<?php echo base_url();?>assets/upload/data/<?php echo $kejadian->file;?>"><?php echo $kejadian->file;?></a></td>
						</tr>
					</table>
					<a data-toggle="modal" href="#myModal" class="pull-right btn btn-primary"> Upload Hasil Lab </a><br><hr>
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
