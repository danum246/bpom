<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$this->db->select('a.*,b.nama as pelapor,c.*');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan a');
		$this->db->join('tbl_karyawan b','a.nik_pelapor = b.nik');
		$this->db->join('view_daerah c', 'a.kelurahan_id = c.id_kelurahan');
		$data['keluhan'] = $this->db->get()->result();
		$data['page'] = 'home';
		$this->load->view('template',$data);
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */