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
		$data['keluhan'] = $this->db->query("SELECT a.*,e.kelurahan,f.kabupaten_kota FROM tbl_resume_keluhan a 
		JOIN tbl_karyawan b ON a.`nik_pelapor` = b.`nik`
		JOIN tbl_jabatan c ON c.`id_jabatan` = b.`jabatan_id`
		JOIN tbl_lembaga d ON d.`id_lembaga` = c.`lembaga_id`
		LEFT JOIN tbl_kelurahan e ON e.`id_kelurahan` = d.`kelurahan_id`
		LEFT JOIN tbl_kabupaten f ON f.`id_kabupaten` = d.`kabupaten_id`")->result();
		$data['page'] = 'form/penyampaian_view';
		$this->load->view('template',$data);
	}

	function detail($kode)
	{
		$sql = $this->db->query("select a.kd_racun as kd_racun,b.racun as racun from tbl_analisa a join tbl_racun b on a.kd_racun = b.kd_racun where kd_keluhan = '$kode' and persentase >= 50 group by a.kd_racun,b.racun");
		$data['racun'] = $sql->result();
		$data['kejadian'] = $this->db->query("select a.*,b.* from tbl_resume_keluhan a join tbl_lembaga b on a.lembaga_id = b.id_lembaga where a.kd_keluhan='$kode'")->row();
		$data['gjl_umum'] = $this->db->query("select gejala_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->gejala_umum;
		//die($data['gejala_umum']);
		$data['totrow'] = $this->db->query("select count(*) as total from tbl_analisa where kd_keluhan = '$kode' and persentase >= 50")->row()->total;
		$data['kode'] = $kode;
		$data['pangan'] = $this->db->query("select pangan_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->pangan_umum;
		//$data['page'] = 'form/result_form01_view';
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