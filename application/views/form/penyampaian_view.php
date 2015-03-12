<?php 
function total($kd_keluhan,$flag){
	if($flag=='All'){
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan'");
	}else{
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan' and status_pasien='$flag'");
	}
	$row = mysql_fetch_array($sql);
	return $row['total'];
}
?>
<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>Data Kejadian</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
	                        	<th>Kejadian</th>
	                        	<th>Kelurahan</th>
	                        	<th>Kecamatan</th>
	                        	<th>Jumlah Korban</th>
	                        	<th>Jumlah Meninggal</th>
	                        	<!--th width="80">Status</th-->
	                        	<th>Hasil Analisa</th>
	                        	<th>print</th>
	                        </tr>
	                    </thead>
	                    <tbody>
                           <?php $no = 1; foreach($keluhan as $row){?>
						   <tr>
	                        	<td><?php echo $no;?></td>
	                        	<td><?php echo $row->kd_keluhan;?></td>
	                        	<td><?php echo $row->kelurahan;?></td>
	                        	<td><?php echo $row->kecamatan;?></td>
	                        	<td><?php echo total($row->kd_keluhan,'All');?></td>
	                        	<td><?php echo total($row->kd_keluhan,'2');?></td>
	                        	<!--td></td-->
	                        	<td><a href="<?php echo base_url(); ?>form/penyampaian/detail/<?php echo $row->kd_keluhan;?>">Lihat</a></td>
	                        	<td><a class="btn btn-success btn-small" href="<?php echo base_url(); ?>form/resume/print_form4/<?php echo $row->kd_keluhan;?>">
												<i class="btn-icon-only icon-print"> </i></a></td>
	                        </tr>
							<?php $no++;  } ?>
	                    </tbody>
	               	</table>
				</div>
			</div>
		</div>
	</div>
</div>