<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form01 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['page'] = 'form/form01_view';
		$this->load->view('template',$data);
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */