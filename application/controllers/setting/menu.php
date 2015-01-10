<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['menu'] = $this->app_model->getdata('tbl_menu','menu','asc')->result();
		$data['page'] = 'setting/menu_view';
		$this->load->view('template',$data);
	}

	function delete($id)
	{
		$delete = $this->app_model->deletedata('tbl_menu','id_menu',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/menu';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

	function save()
	{
		$data['menu']= $this->input->post('menu', TRUE);
		$data['parent_menu']= $this->input->post('parent', TRUE);
		if ($data['parent_menu'] == 0) {
			$data['url'] = '-';
		} else {
			$data['url']= $this->input->post('url', TRUE);
		}
		$data['icon']= $this->input->post('icon', TRUE);
		$insert = $this->app_model->insertdata('tbl_menu',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/menu';</script>";
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

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */