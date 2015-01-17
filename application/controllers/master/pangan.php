<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['pangan'] = $this->app_model->getdata('tbl_pangan','kd_pangan','asc');
		$data['page'] = 'master/pangan_view';
		$this->load->view('template',$data);
	}

	function save()
	{
		$data['kd_pangan'] = $this->input->post('kode', TRUE);
		$data['pangan'] = $this->input->post('pangan', TRUE);
		$data['keterangan'] = $this->input->post('ket', TRUE);
		$insert = $this->app_model->insertdata('tbl_pangan',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/pangan';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function delete($id)
	{
		$delete = $this->app_model->deletedata('tbl_pangan','id_pangan',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/pangan';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

	function edit($id)
	{
		$data['detail'] = $this->app_model->getdetail('tbl_pangan','id_pangan',$id,'id_pangan','asc')->row();
		$data['page'] = 'master/pangan_edit';
		$this->load->view('template',$data);
	}

	function update($id)
	{
		$old = $this->app_model->getdetail('tbl_pangan','id_pangan',$id,'id_pangan','asc')->row();
		$data['kd_pangan'] = $this->input->post('kode', TRUE);
		$data['pangan'] = $this->input->post('pangan', TRUE);
		$data['keterangan'] = $this->input->post('ket', TRUE);
		//$new['kd_pangan']= $data['kd_pangan'];
		$update1 = $this->app_model->updatedata('tbl_pangan','id_pangan',$id,$data);
		//$update2 = $this->app_model->updatedata('tbl_racun_gejala','kd_gejala',$old->kd_gejala,$new);
		//if (($update1 == TRUE) and ($update2 == TRUE)){
		if ($update1 == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/pangan';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

}

/* End of file pangan.php */
/* Location: ./application/controllers/pangan.php */