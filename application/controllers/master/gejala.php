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

	function edit($id)
	{
		$data['detail'] = $this->app_model->getdetail('tbl_gejala','id_gejala',$id,'id_gejala','asc')->row();
		$data['page'] = 'master/gejala_edit';
		$this->load->view('template',$data);
	}

	function update($id)
	{
		$old = $this->app_model->getdetail('tbl_gejala','id_gejala',$id,'id_gejala','asc')->row();
		$data['kd_gejala']= $this->input->post('kode', TRUE);
		$data['gejala']= $this->input->post('gejala', TRUE);
		$new['kd_gejala']= $data['kd_gejala'];
		$update1 = $this->app_model->updatedata('tbl_gejala','id_gejala',$id,$data);
		$update2 = $this->app_model->updatedata('tbl_racun_gejala','kd_gejala',$old->kd_gejala,$new);
		if (($update1 == TRUE) and ($update2 == TRUE)){
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/gejala';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}
}