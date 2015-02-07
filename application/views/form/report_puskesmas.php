<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Form Laporan KLB</h4>
</div>
<form class ='form-horizontal' action="#" method="post"
    <div class="modal-body">  
		<div class="control-group" id="">
            <label class="control-label">Formulir 1</label>
            <div class="controls">
                <i class="btn-icon-only icon-paper-clip"> </i><a target="blank" href="<?php echo base_url(); ?>form/resume/print_form1/<?php echo $kode_kejadian ?>" >Download form 1</a> 
            </div>
        </div>	
		<div class="control-group" id="">
            <label class="control-label">Formulir 2</label>
            <div class="controls">
                <i class="btn-icon-only icon-paper-clip"> </i><a target="blank" href="<?php echo base_url(); ?>form/resume/print_form2/<?php echo $kode_kejadian ?>" >Download form 2</a>
            </div>
        </div>				
        <div class="control-group" id="">
            <label class="control-label">Formulir 3</label>
            <div class="controls">
                <i class="btn-icon-only icon-paper-clip"> </i><a target="blank" href="<?php echo base_url(); ?>form/resume/print_form3/<?php echo $kode_kejadian ?>" >Download form 3</a>
            </div>
        </div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
    </div>
</form>