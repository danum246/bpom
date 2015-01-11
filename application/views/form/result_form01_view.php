<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>HASIL ANALISA RACUN</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<!--a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a><br><hr-->
					<table id="example1" class="table table-bordered table-striped">
	                	<thead>
	                        <tr> 
	                        	<th>No</th>
                                <th>Racun</th>
                                <th>Total Gejala</th>
                                <th>Gejala Teridentifikasi</th>
                                <th>Nilai Persentase</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php $no = 1; foreach($result as $row){?>
	                        <tr>
	                        	<td><?php echo $no;?></td>
	                        	<td><?php echo $row->racun;?></td>
	                        	<td><?php echo $row->jml_row;?></td>
	                        	<td><?php echo $row->jml_identifikasi;?></td>
                                <td><?php echo $row->jml_identifikasi/$totrow*100;?>&nbsp; %</td>
	                        </tr>
							<?php $no++; } ?>
	                    </tbody>
	               	</table>
				</div>
			</div>
		</div>
	</div>
</div>
