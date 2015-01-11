<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form01 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sess_login') != TRUE) {
		 	redirect('auth','refresh');
		}
	}

	function index()
	{	
		//var_dump($this->session->all_userdata());exit;
		$data['keluhan']   = $this->db->get('tbl_keluhan_pasien')->result();
		$data['kelurahan'] = $this->db->get('tbl_kelurahan')->result();
		$data['kecamatan'] = $this->db->get('tbl_kecamatan')->result();
		$data['kabupaten'] = $this->db->get('tbl_kabupaten')->result();
		$data['provinsi']  = $this->db->get('tbl_provinsi')->result();
		$data['gejala']    = $this->db->get('tbl_gejala')->result();
		$this->db->select('count(*) as total');
		$this->db->from('tbl_keluhan_pasien');
		$data['count'] = (int)$this->db->get()->row()->total+1;
		$data['page'] = 'form/form01_view';
		$this->load->view('template',$data);
	}
	
	function save_n_gen(){
		$sesslog = $this->session->userdata('sess_login');
		if($this->input->post('lainnya')!=""){
		$countgl = (int)$this->db->query("select count(*) as total from tbl_gejala where kd_gejala like 'GL-%'")->row()->total+1;
		$data = array(
		'kd_gejala'		=> 'GL-'.$countgl,
		'gejala'		=> $this->input->post('lainnya')
		);
		$this->db->insert('tbl_gejala',$data);
		}
		$grow = (int)$this->input->post('grow');
		for($no=1;$no<=$grow;$no++){
		if($this->input->post('gejala'.$no)){
		$data_gjl[] = $this->input->post('gejala'.$no);
		}
		}
		if($this->input->post('lainnya')!=""){
		$data_gjl[] = 'GL-'.$countgl;
		}
		$kd_gjl = implode(', ',$data_gjl);
		$kode = $this->input->post('kode');
		$data = array(
		'kd_keluhan'		=> $this->input->post('kode'),
		'pelapor'			=> $this->input->post('pelapor'),
		'pasien_sakit'		=> $this->input->post('pas_skt'),
		'pasien_meninggal'	=> $this->input->post('pas_mgl'),
		'tgl_laporan'		=> date('Y-m-d h:i:s'),
		'waktu_awal'		=> $this->input->post('tgl_kejadian'),
		'waktu_terjadi'		=> date('Y-m-d h:i:s'),
		'kd_gejala'			=> $kd_gjl,
		'dugaan_pangan'		=> $this->input->post('dugaan_pangan'),
		'alamat'			=> $this->input->post('alamat'),
		'lokasi'			=> $this->input->post('lokasi'),
		'id_kelurahan'		=> $this->input->post('kelurahan'),
		'id_kecamatan'		=> $this->input->post('kecamatan'),
		'id_kabupaten'		=> $this->input->post('kabupaten'),
		'id_provinsi'		=> $this->input->post('provinsi'),
		'lembaga_id'		=> $sesslog['lembaga_id']
		);
		$this->db->insert('tbl_keluhan_pasien',$data);
		$val_gjl = sizeof($data_gjl);
		$racun = $this->db->query("select distinct(kd_racun) as kdr from tbl_racun_gejala")->result();
		foreach($racun as $rcn){
			$kd_racun = $rcn->kdr;
			$total = $this->db->query("select count(*) as total from tbl_racun_gejala where kd_racun = '$kd_racun'")->row()->total;
			$data_idn = array(
			'kd_keluhan'		=> $this->input->post('kode'),
			'kd_racun'			=> $kd_racun,
			'jml_row'			=> $total,
			'jml_identifikasi'	=> 0
			);
			$this->db->insert('tbl_analisa',$data_idn);
			for($n = 0; $n<=$val_gjl-1; $n++){
			$chk = $this->db->query("select count(*) as total from tbl_racun_gejala where kd_racun = '$kd_racun' and kd_gejala = '".$data_gjl[$n]."'")->row()->total;
			if($chk == 1){
			$this->db->query("update tbl_analisa set jml_identifikasi = jml_identifikasi+1 where kd_keluhan = '".$this->input->post('kode')."' and kd_racun = '$kd_racun'");
			}
			}
		}	
		redirect('form/form01/result/'.$kode);
	}
	
	function result($kode){
		$sql = "select a.*,b.racun from tbl_analisa a join tbl_racun b on a.kd_racun = b.kd_racun where a.kd_keluhan = '$kode'";
		$data['result'] = $this->db->query($sql)->result();
		$data['totrow'] = $this->db->query("select sum(jml_row) as jml_row from tbl_analisa where kd_keluhan = '$kode'")->row()->jml_row;
		$data['page'] = 'form/result_form01_view';
		$this->load->view('template',$data);
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */