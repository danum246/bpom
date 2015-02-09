<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penyampaian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{	
		$data['keluhan'] = $this->db->query("SELECT a.*,e.kelurahan,f.kabupaten_kota FROM tbl_resume_keluhan a 
		JOIN tbl_karyawan b ON a.`nik_pelapor` = b.`nik`
		JOIN tbl_jabatan c ON c.`id_jabatan` = b.`jabatan_id`
		JOIN tbl_lembaga d ON d.`id_lembaga` = c.`lembaga_id`
		LEFT JOIN tbl_kelurahan e ON e.`id_kelurahan` = d.`kelurahan_id`
		LEFT JOIN tbl_kabupaten f ON f.`id_kabupaten` = d.`kabupaten_id`")->result();
		$data['page'] = 'form/penyampaian_view';
		$this->load->view('template',$data);
	}

	function detail($kode)
	{
		$data['status'] = $this->app_model->getstatusklb($kode)->row();
		$sql = $this->db->query("select a.kd_racun as kd_racun,b.racun as racun from tbl_analisa a join tbl_racun b on a.kd_racun = b.kd_racun where kd_keluhan = '$kode' and persentase >= 50 group by a.kd_racun,b.racun");
		$data['racun'] = $sql->result();
		$data['kejadian'] = $this->db->query("select a.*,b.* from tbl_resume_keluhan a join tbl_lembaga b on a.lembaga_id = b.id_lembaga where a.kd_keluhan='$kode'")->row();
		$data['gjl_umum'] = $this->db->query("select gejala_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->gejala_umum;
		$data['totrow'] = $this->db->query("select count(*) as total from tbl_analisa where kd_keluhan = '$kode' and persentase >= 50")->row()->total;
		$data['kode'] = $kode;
		$data['pangan'] = $this->db->query("select pangan_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->pangan_umum;
		//$data['page'] = 'form/result_form01_view';
		$data['page'] = 'form/detail_penyampaian_view';
		$this->load->view('template',$data);
		
	}

	function status_klb()
	{
		//proses lalu print form 5
		$data['no_kejadian']= $this->input->post('no_kejadian', TRUE);
		$data['status_klb']= $this->input->post('status', TRUE);
		$data['catatan']= $this->input->post('catatan', TRUE);
		$data['waktu']= date('Y-m-d h:i:s');
		$insert = $this->app_model->insertdata('tbl_status_kejadian',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."form/penyampaian/print_form5/".$data['no_kejadian']."';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function print_form5($id)
	{
		$data['kode'] = $id;
		$this->load->library('Cfpdf');
		$this->load->view('form/print/report_form5',$data);
	}

	function henti_klb()
	{
		$data['status_klb'] = $this->input->post('status', TRUE);
		if ($data['status_klb'] == 2) {
			$data['file_upload'] = $this->upload_file('./upload/');
			$data['catatan']= $this->input->post('catatan', TRUE);
			$data['waktu']= date('Y-m-d h:i:s');
			$update = $this->app_model->updatedata('tbl_status_kejadian','no_kejadian',$this->input->post('no_kejadian', TRUE),$data);
			if ($update == TRUE) {
				echo "<script>alert('Berhasil');document.location.href='".base_url()."form/penyampaian/print_form6/".$this->input->post('no_kejadian', TRUE)."';</script>";
				//$this->load->library('Cfpdf');
				//$this->load->view('form/print/report_form6');
			} else {
				echo "<script>alert('Gagal Update Data');history.go(-1);</script>";
			}
		} else {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."form/penyampaian';</script>";
		}
	}

	function print_form6($id)
	{
		$this->load->library('Cfpdf');
		$this->load->view('form/print/report_form6');
	}

	//upload function
	public function upload_file($path){
		if ($_FILES['userfile']) {
			$this->load->helper('inflector');
			$nama = underscore($_FILES['userfile']['name']);
	        $config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX|xls|xlsx';
	        $config['max_size'] = '1000000';
	        $config['max_width'] = '302400';
	        $config['max_height'] = '306800';
	        $config['file_name'] = $nama;
	        $config['upload_path'] = $path;
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload("userfile")) {
	            $error = array('error' => $this->upload->display_errors());
	            die("gagal");
	        } else {
	            $aa = array('upload_data' => $this->upload->data());
	        }
	        $data['surat'] = $config['file_name'];
        }
        return($data['surat']);
	}

}

/* End of file penyampaian.php */
/* Location: ./application/controllers/form/penyampaian.php */