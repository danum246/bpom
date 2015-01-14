<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class racun_pangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['page'] = 'master/racun_pangan_view';
		$this->load->view('template',$data);
	}

	function save()
	{
		$data[''] = $this->input->post('', TRUE);
		$insert = $this->app_model->insertdata('',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/racun_pangan';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function delete($id)
	{
		$delete = $this->app_model->deletedata('','',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."master/racun_pangan';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

}

/* End of file racun_pangan.php */
/* Location: ./application/controllers/racun_pangan.php */