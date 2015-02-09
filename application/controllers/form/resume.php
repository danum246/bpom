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
		$data['kode'] = $id;
		$this->load->view('form/print/report_form1',$data);
	}	

	function print_form2($id)
	{
		$data['kode'] = $id;
		$this->load->view('form/print/report_form2',$data);
	}

	function print_form3($id)
	{
		$data['kode'] = $id;
		$this->load->view('form/print/report_form3',$data);
	}

	function print_form4($id)
	{
		$data['kode'] = $id;
		$this->load->view('form/print/report_form4',$data);
	}

	function print_form5($id)
	{
		$data['kode'] = $id;
		$this->load->view('form/print/report_form5',$data);	
	}

	function print_form6($id)
	{
		$data['kode'] = $id;
		$this->load->view('form/print/report_form6',$data);
	}

	function print_form7()
	{
		$this->load->view('form/print/report_form7');	
	}

	function print_form8()
	{
		$this->load->view('form/print/report_form8');	
	}

	function print_form9()
	{
		$this->load->view('form/print/report_form9');	
	}

	function print_form10()
	{
		$this->load->view('form/print/report_form10');	
	}

	function print_form11()
	{
		$this->load->view('form/print/report_form11');	
	}

	function print_form12()
	{
		$this->load->view('form/print/report_form12');	
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */