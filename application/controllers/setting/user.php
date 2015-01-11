<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['user'] = $this->app_model->getdata('view_user','id_user','asc')->result();
		$data['kary'] = $this->app_model->getdata('tbl_karyawan','nik','asc')->result();
		$data['page'] = 'setting/user_view';
		$this->load->view('template',$data);
	}

	function delete($id)
	{
		$delete = $this->app_model->deletedata('tbl_user_login','id_user',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/user';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

	function save()
	{
		$data['username']= $this->input->post('username', TRUE);
		$data['nik']= $this->input->post('karyawan', TRUE);
		$data['status']= $this->input->post('status', TRUE);
		$data['password_plain']= $this->input->post('password', TRUE);
		$data['password']= sha1(md5($data['password_plain']).key);
		$insert = $this->app_model->insertdata('tbl_user_login',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/user';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function edit()
	{

	}

	function update()
	{

	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */