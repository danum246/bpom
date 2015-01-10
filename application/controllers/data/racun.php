<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class racun extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{	
		$data['page'] = 'data/racun_view';
		$this->load->view('template',$data);
	}
}