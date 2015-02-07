<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function puskesmas($id)
	{
		$data['kode_kejadian'] = $id;
		$this->load->view('form/report_puskesmas',$data);
	}

}

/* End of file report.php */
/* Location: ./application/controllers/form/report.php */