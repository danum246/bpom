<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['page'] = 'report';
		$data['total'] = $this->db->query("select count(*) as total from tbl_keluhan_pasien")->row()->total;
		$data['keracunan'] = $this->db->query("select count(*) as total from tbl_keluhan_pasien where status_pasien = 1 or status_pasien = 2")->row()->total;
		$data['non'] = $this->db->query("select count(*) as total from tbl_keluhan_pasien where status_pasien = 0")->row()->total;
		$this->load->view('template',$data);
	}

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */