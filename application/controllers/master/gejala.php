<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gejala extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{	
		$data['gejala'] = $this->db->get('tbl_gejala')->result();
		$data['page'] = 'master/gejala_view';
		$this->load->view('template',$data);
	}
	
	function save_gejala(){
		$data = array(
		'kd_gejala'	=> $this->input->post('kode'),
		'gejala'	=> $this->input->post('gejala')
		);
		$this->db->insert('tbl_gejala',$data);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."master/gejala';</script>";
	}
	
	function del_gejala($id){
		$this->app_model->deletedata('tbl_gejala','id_gejala',$id);
		echo "<script>alert('Berhasil');
		document.location.href='".base_url()."master/gejala';</script>";
	}
}