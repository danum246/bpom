<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['lembaga'] = $this->app_model->get_lembaga();
		$data['page'] = 'setting/role_view';
		$this->load->view('template',$data);
	}

	function list_menu($id)
	{
		$tmp = '';
		$list = $this->app_model->getlistmenu($id)->result();
		
		if (!empty($list)) {
            $tmp .= "<option value=''> -- Pilih -- </option>";
            foreach ($list as $row) {
            	if ($row->parent_menu != 0) {
            		$tmp .= "<option value='" . $row->id_menu . "'>" . $row->menu . "</option>";
            	} else {
            		$tmp .= "<option value='" . $row->id_menu . "'> -- <b>" . $row->menu . "* -- </b> </option>";
            	}       
            }
        } else {
            $tmp .= "<option value=''> -- Pilih -- </option>";
        }
        die($tmp);
	}

	function save()
	{
		$data['lembaga_id'] = $this->input->post('lembaga', TRUE);
		$data['menu_id'] = $this->input->post('menu', TRUE);
		$insert = $this->app_model->insertdata('tbl_role_access',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/role';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

}

/* End of file role.php */
/* Location: ./application/controllers/role.php */