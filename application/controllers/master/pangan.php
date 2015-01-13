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

}

/* End of file pangan.php */
/* Location: ./application/controllers/pangan.php */