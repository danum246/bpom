<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class resume extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('Cfpdf');
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$this->db->select('a.*,b.nama as pelapor');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan a');
		$this->db->join('tbl_karyawan b','a.nik_pelapor = b.nik');
		$data['keluhan'] = $this->db->get()->result();
		$data['page'] = 'form/resume_view';
		$this->load->view('template',$data);
	}

	function print_form1($id)
	{
		$this->load->view('form/print/report_form1');
	}	

	function print_form2()
	{
		$this->load->view('form/print/report_form2');
	}

	function print_form3()
	{
		$this->load->view('form/print/report_form3');
	}

	function print_form4()
	{
		$this->load->view('form/print/report_form4');
	}

	function print_form5()
	{
		$this->load->view('form/print/report_form5');	
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */