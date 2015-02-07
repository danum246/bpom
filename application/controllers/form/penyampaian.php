<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penyampaian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{	
		$data['page'] = 'form/penyampaian_view';
		$this->load->view('template',$data);
	}

	function detail()
	{
		$data['page'] = 'form/detail_penyampaian_view';
		$this->load->view('template',$data);
	}

	function status_klb()
	{
		//proses lalu print form 4
		$this->load->library('Cfpdf');
		$this->load->view('form/print/report_form5');
	}

	function henti_klb()
	{
		//proses lalu print form 4
		$this->load->library('Cfpdf');
		$this->load->view('form/print/report_form6');	
	}

}

/* End of file penyampaian.php */
/* Location: ./application/controllers/form/penyampaian.php */