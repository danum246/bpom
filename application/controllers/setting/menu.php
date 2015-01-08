<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['page'] = 'setting/menu_view';
		$this->load->view('template',$data);
	}

}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */