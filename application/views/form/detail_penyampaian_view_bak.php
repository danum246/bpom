<div class="row">
	<div class="span12">      		  		
  		<div class="widget ">
  			<div class="widget-header">
  				<i class="icon-user"></i>
  				<h3>HASIL ANALISA</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<div class="span11">
					<table>
						<tr>
							<td style="width:150px">Nama Kejadian</td>
							<td>:</td>
							<td style="width:300px"></td>
							<td style="width:150px">Puskesmas</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td>Jumlah Korban</td>
							<td>:</td>
							<td></td>
							<td>Kecamatan</td>
							<td>:</td>
							<td></td>
						</tr>	
						<tr>
							<td>Jumlah Meninggal</td>
							<td>:</td>
							<td></td>
							<td>Kabupaten / Provinsi</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td>Hasil Lab</td>
							<td>:</td>
							<td><a href="#"></a></td>
						</tr>
					</table>
					<a data-toggle="modal" href="#myModal" class="pull-right btn btn-inverse"> Nyatakan KLB </a> <a data-toggle="modal" href="#myModalstop" class="pull-right btn btn-danger"> Hentikan Status KLB </a><br><hr>
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
	                        <tr>
	                        	<td></td>
	                        	<td></td>
	                        	<td></td>
	                        	<td></td>
	                        </tr>
							<tr>
	                        	<th>Gejala Umum</th>
	                        	<td colspan=3></td>
	                        </tr>
							<tr>
	                        	<th>Pangan Umum</th>
	                        	<td colspan=3>
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
                            <textarea name="" class="span3" required></textarea>
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
            <form class ='form-horizontal' action="<?php echo base_url(); ?>form/penyampaian/henti_klb" method="post">
                <div class="modal-body">    
                    <div class="control-group" id="">
                        <label class="control-label">Hentikan Status KLB :</label>
                        <div class="controls">
                            <label class="radio inline">
								<input type="radio" name="status" value="">
								Ya (KLB)
							</label>
							<label class="radio inline">
								<input type="radio" name="status" value="">
								Tidak (Bukan KLB)
							</label>
                        </div>
                    </div> 
                     <div class="control-group" id="">
                        <label class="control-label">Hasil Lab</label>
                        <div class="controls">
                            <input type="file" class="span4" name="userfile" placeholder="Input Jabatan" class="form-control" required/>
                            <input type="hidden" class="span4" name="kode" value="<?php echo $this->uri->segment(4);?>" required/>
                        </div>
                    </div>
                    <div class="control-group" id="">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea name="" class="span3" required></textarea>
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