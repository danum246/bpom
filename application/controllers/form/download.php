<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class download extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$this->load->helper('download'); //jika sudah diaktifkan di autoload, maka tidak perlu di tulis kembali
 
		 $name = 'Format_KLB_Keracunan.xls';
		 $data = file_get_contents("Format_KLB_Keracunan.xls"); // letak file pada aplikasi kita
		 
		 force_download($name,$data);
	}

}

/* End of file download.php */
/* Location: ./application/controllers/download.php */