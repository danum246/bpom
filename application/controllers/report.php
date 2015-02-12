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
		$data['total'] = $this->db->query("select count(*) as total from tbl_resume_keluhan")->row()->total;
		$data['keracunan'] = $this->db->query("select count(*) as total from tbl_status_kejadian where status_klb = 1")->row()->total;
		$data['non'] = $this->db->query("SELECT COUNT(a.kd_keluhan) AS total FROM tbl_resume_keluhan a LEFT JOIN tbl_status_kejadian b 
										ON a.kd_keluhan = b.no_kejadian
										WHERE b.status_klb IS NULL OR b.status_klb = 2 OR b.status_klb = 0")->row()->total;
		$this->load->view('template',$data);
	}

	function filter_by_date()
	{
		$awal = $this->input->post('awal', TRUE);
		$akhir = $this->input->post('akhir', TRUE);
		$data['page'] = 'report';
		$data['total'] = $this->db->query("select count(*) as total from tbl_resume_keluhan where waktu_lapor >= '".$awal." 23:59:00' and waktu_lapor <= '".$akhir." 23:59:00'")->row()->total;
		$data['keracunan'] = $this->db->query("select count(*) as total from tbl_status_kejadian where status_klb = 1 and waktu >= '".$awal." 23:59:00' and waktu <= '".$akhir." 23:59:00'")->row()->total;
		$data['non'] = $this->db->query("SELECT COUNT(a.kd_keluhan) AS total FROM tbl_resume_keluhan a LEFT JOIN tbl_status_kejadian b 
										ON a.kd_keluhan = b.no_kejadian
										WHERE (b.status_klb IS NULL OR b.status_klb = 2 OR b.status_klb = 0) and waktu_lapor >= '".$awal." 23:59:00' and waktu_lapor <= '".$akhir." 23:59:00' ")->row()->total;
		$this->load->view('template',$data);
	}

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */