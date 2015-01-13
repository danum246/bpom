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
		$data['racun'] = $this->db->get('tbl_racun')->result();
		$data['gejala'] = $this->db->get('tbl_gejala')->result();
		$data['page'] = 'master/racun_view';
		$this->load->view('template',$data);
	}
	
	function save_racun(){
		$data_racun = array(
		'kd_racun'		=> $this->input->post('kode'),
		'racun'			=> $this->input->post('racun'),
		'keterangan'	=> $this->input->post('ket'),
		'inkubasi_rata'	=> $this->input->post('in_rat'),
		'inkubasi_pendek'=> $this->input->post('in_min'),
		'inkubasi_tinggi'=> $this->input->post('in_max')
		);
		$this->db->insert('tbl_racun',$data_racun);
		$no = 1;
		$g_row = $this->input->post('grow');
		for($no;$no<=(int)$g_row;$no++){
			if($this->input->post('gejala'.$no)){
			$data = array(
			'kd_racun'		=> $this->input->post('kode'),
			'kd_gejala'		=> $this->input->post('gejala'.$no),		
			);
			$this->db->insert('tbl_racun_gejala',$data);
			}
		}
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."master/racun';</script>";
	}
	
	function del_racun($id){
		$this->db->where('kd_racun',$id);
		$this->db->delete('tbl_racun');
		$this->db->where('kd_racun',$id);
		$this->db->delete('tbl_racun_gejala');
		echo "<script>alert('Berhasil');
		document.location.href='".base_url()."master/racun';</script>";
	}
}