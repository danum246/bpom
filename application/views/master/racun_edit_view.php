	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data Racun</h4>
            </div>
            <form class ='form-horizontal' action="<?php echo base_url();?>master/racun/update_racun" method="post" enctype="multipart/form-data">
                <div class="modal-body">  
					<div class="control-group" id="">
                        <label class="control-label">Kode Racun</label>
                        <div class="controls">
                            <input type="text" class="span3" name="kode" placeholder="Input Kode Racun" class="form-control" value="<?php echo $row->kd_racun;?>" required/>
                        </div>
                    </div>	
					<div class="control-group" id="">
                        <label class="control-label">Racun</label>
                        <div class="controls">
                            <input type="text" class="span3" name="racun" placeholder="Input Racun" class="form-control" value="<?php echo $row->racun;?>" required/>
                        </div>
                    </div>				
                    <div class="control-group" id="">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <input type="text" class="span3" name="ket" placeholder="Input Keterangan" class="form-control" value="<?php echo $row->keterangan;?>" required/>
                        </div>
                    </div>
					<div class="control-group" id="">
                        <label class="control-label">Organ Terlibat</label>
                        <div class="controls">
                            <select name="organ">
							<option></option>
							<?php foreach($organ as $rows){?>
							<option value="<?php echo $rows->id_organ;?>" <?php if($row->organ_id==$rows->id_organ){ echo 'selected'; }?>><?php echo $rows->organ_terlibat;?></option>
							<?php } ?>
							</select>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Rata<sup>2</sup></label>
                        <div class="controls">
                            <input type="text" class="span3" name="in_rat" placeholder="Input Inkubasi Rata-rata" class="form-control" value="<?php echo $row->inkubasi_rata;?>" required/> menit
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Pendek</label>
                        <div class="controls">
                            <input type="text" class="span3" name="in_min" placeholder="Input Inkubasi Pendek" class="form-control" value="<?php echo $row->inkubasi_pendek;?>" required/> menit
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Inkubasi Tinggi</label>
                        <div class="controls">
                            <input type="text" class="span3" name="in_max" placeholder="Input Inkubasi Tinggi" class="form-control" value="<?php echo $row->inkubasi_tinggi;?>" required/> menit
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
								<th>No</th>
                                <th>Gejala</th>
                                <th style="width:30px">Ya</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $nm = 1; foreach($gejala as $rows){?>
                            <tr>
                                <td><?php echo $nm;?></td>
                                <td><?php echo $rows->gejala;?></td>
                                <td class="td-actions">
									<?php $sql = mysql_query("select count(*) as total from tbl_racun_gejala where kd_racun = '$kd_racun' and kd_gejala = '$rows->kd_gejala' ");
									$row = mysql_fetch_array($sql);
									$total = $row['total'];
									if($total>0){?>
									<input type="checkbox" name="gejala<?php echo $nm;?>" value="<?php echo $rows->kd_gejala;?>" checked>
									<?php }else{ ?>
									<input type="checkbox" name="gejala<?php echo $nm;?>" value="<?php echo $rows->kd_gejala;?>">
									<?php } ?>
                                </td>
                            </tr>
                        <?php $nm++; } ?>
                        </tbody>
                    </table>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
				<input type="hidden" name="grow" value="<?php echo $nm-1;?>">
            </form>