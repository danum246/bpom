<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class region extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{
		$data['provinsi'] = $this->app_model->getdata('tbl_provinsi','provinsi','asc')->result();
		$data['kabupaten'] = $this->app_model->getdata('tbl_kabupaten','kabupaten_kota','asc')->result();
		$data['kecamatan'] = $this->app_model->getdata('tbl_kecamatan','kecamatan','asc')->result();
		$data['kelurahan'] = $this->app_model->getdata('tbl_kelurahan','kelurahan','asc')->result();
		$data['page'] = 'setting/region_view';
		$this->load->view('template',$data);
	}

	//provinsi

	function save_prov()
	{
		$data['provinsi']= $this->input->post('provinsi', TRUE);
		$insert = $this->app_model->insertdata('tbl_provinsi',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function edit_prov($id)
	{
		$data['detail'] = $this->app_model->getdetail('tbl_provinsi','id_provinsi',$id,'id_provinsi','asc')->row();
		$this->load->view('setting/region_provinsi_edit', $data);
	}

	function update_prov($id)
	{
		$data['provinsi']= $this->input->post('provinsi', TRUE);
		$update = $this->app_model->updatedata('tbl_provinsi','id_provinsi',$id,$data);
		if ($update == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}
	}

	function delete_prov($id)
	{
		$delete = $this->app_model->deletedata('tbl_provinsi','id_provinsi',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

	//kabupaten / kota

	function save_kab()
	{
		$data['kabupaten_kota']= $this->input->post('kota', TRUE);
		$data['provinsi_id']= $this->input->post('provinsi', TRUE);
		$insert = $this->app_model->insertdata('tbl_kabupaten',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function delete_kab($id)
	{
		$delete = $this->app_model->deletedata('tbl_kabupaten','id_kabupaten',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}	

	//kecamatan

	function save_kec()
	{
		$data['kecamatan']= $this->input->post('camat', TRUE);
		$data['kabupaten_id']= $this->input->post('kota', TRUE);
		$insert = $this->app_model->insertdata('tbl_kecamatan',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function delete_kec($id)
	{
		$delete = $this->app_model->deletedata('tbl_kecamatan','id_kecamatan',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}		

	//kelurahan

	function save_kel()
	{
		$data['kelurahan']= $this->input->post('lurah', TRUE);
		$data['kecamatan_id']= $this->input->post('camat', TRUE);
		$insert = $this->app_model->insertdata('tbl_kelurahan',$data);
		if ($insert == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Simpan Data');history.go(-1);</script>";
		}
	}

	function delete_kel($id)
	{
		$delete = $this->app_model->deletedata('tbl_kelurahan','id_kelurahan',$id);
		if ($delete == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."setting/region';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}	
}

/* End of file region.php */
/* Location: ./application/controllers/region.php */