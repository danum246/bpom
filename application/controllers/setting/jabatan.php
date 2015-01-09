<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jabatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('app_model');
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['lembaga'] = $this->app_model->get_lembaga();
		$data['jabatan'] = $this->app_model->get_jabatan();
		$data['page'] = 'setting/jabatan_view';
		$this->load->view('template',$data);
	}
	
	function save_jabatan(){
		$data = array(
		'jabatan'	=> $this->input->post('jabatan'),
		'lembaga_id'=> $this->input->post('lembaga')
		);
		$this->app_model->insertdata('tbl_jabatan',$data);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."/setting/jabatan';</script>";
	}
	
	function del_jabatan($id){
		$this->app_model->deletedata('tbl_jabatan','id_jabatan',$id);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."setting/jabatan'</script>";
	}

}

/* End of file jabatan.php */
/* Location: ./application/controllers/jabatan.php */