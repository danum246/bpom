<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class karyawan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}
	//tete
	function index()
	{
		$data['page'] = 'data/karyawan_view';
		$this->load->view('template',$data);
	}

}

/* End of file karyawan.php */
/* Location: ./application/controllers/karyawan.php */