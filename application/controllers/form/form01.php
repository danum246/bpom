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
	{	$this->db->select('a.*,b.nama as pelapor');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan a');
		$this->db->join('tbl_karyawan b','a.nik_pelapor = b.nik');
		$data['keluhan']   = $this->db->get()->result();
		$data['organ'] = $this->db->get('tbl_organ')->result();
		/*$data['kelurahan'] = $this->db->get('tbl_kelurahan')->result();
		$data['kecamatan'] = $this->db->get('tbl_kecamatan')->result();
		$data['kabupaten'] = $this->db->get('tbl_kabupaten')->result();
		$data['provinsi']  = $this->db->get('tbl_provinsi')->result();*/
		$data['gejala']    = $this->db->get('tbl_gejala')->result();
		$this->db->select('count(*) as total');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan');
		$data['count'] = (int)$this->db->get()->row()->total+1;
		// Cek Status Kejadian
		$check_kejadian = $this->db->query("select count(*) as total from tbl_resume_keluhan where flag = 0")->row()->total;
		if($check_kejadian == 0){
		$data['page'] = 'form/add_kejadian_form01_view';
		$this->load->view('template',$data);
		}else{
		$this->db->select('kd_keluhan');
		$this->db->where('flag',0);
		$data['kode'] = $this->db->get('tbl_resume_keluhan')->row()->kd_keluhan;
		$data['page'] = 'form/form01_view';
		$this->load->view('template',$data);
		}
	}
	
	/*function save_n_gen(){
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
	}*/
	
	function result($kode){
		$sql = $this->db->query("select a.kd_racun as kd_racun,b.racun as racun from tbl_analisa a join tbl_racun b on a.kd_racun = b.kd_racun where kd_keluhan = '$kode' and persentase >= 50 group by a.kd_racun,b.racun");
		$data['racun'] = $sql->result();
		$data['gjl_umum'] = $this->db->query("select gejala_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->gejala_umum;
		//die($data['gejala_umum']);
		$data['totrow'] = $this->db->query("select count(*) as total from tbl_analisa where kd_keluhan = '$kode' and persentase >= 50")->row()->total;
		$data['kode'] = $kode;
		$data['page'] = 'form/result_form01_view';
		$this->load->view('template',$data);
	}
	
	function del_keluhan($kode){
		$this->app_model->deletedata('tbl_keluhan_pasien','id_keluhan',$kode);
		$this->app_model->deletedata('tbl_analisa','kd_keluhan',$kode);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."form/form01';</script>";
	}
	
	function generate_result(){
		$this->db->select('kd_keluhan,total_pasien');
		$this->db->where('flag',0);
		$tbl = $this->db->get('tbl_resume_keluhan')->row();
		$kode = $tbl->kd_keluhan;
		$totpas = $this->db->query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan = '$kode'")->row()->total;
		$racun = $this->db->query("SELECT a . * , b.organ_id FROM tbl_racun_gejala a JOIN tbl_racun b ON a.kd_racun = b.kd_racun")->result();
		foreach($racun as $row){ 
		$count = $this->db->query("select count(*) as total from tbl_keluhan_pasien where kd_gejala like '%".$row->kd_gejala."%' and organ_id = '".$row->organ_id."'")->row()->total;
		if($count!=0){
		$data = array(
		'kd_keluhan'	=> $kode,
		'kd_racun'		=> $row->kd_racun,
		'kd_gejala'		=> $row->kd_gejala,
		'organ_id'		=> $row->organ_id,
		'total_pasien'	=> $totpas,
		'jml_identifikasi' => $count,
		'persentase'	=> number_format($count/$totpas*100,2)
		);
		$this->db->insert('tbl_analisa',$data);
		}
		}
		$gejala_umum = $this->db->query("select distinct(kd_gejala)as kd_gejala from tbl_analisa where kd_keluhan = '$kode' and persentase >= 50")->result();
		foreach($gejala_umum as $row){
		$gejala[] = $row->kd_gejala;
		}
		$gu = implode(',',$gejala);
		$this->db->query("update tbl_resume_keluhan set flag = 1,gejala_umum = '$gu' where kd_keluhan = '$kode'");
		$this->db->query("update tbl_keluhan_pasien set flag = 1 where kd_keluhan = '$kode'");
		redirect('form/form01/result/'.$kode);
	}
	
	function save_kejadian(){
		$sess = $this->session->userdata('sess_login');
		//var_dump($sess);exit;
		$data = array(
		'kd_keluhan'		=> $this->input->post('kode'),
		'nama_kejadian'		=> $this->input->post('kejadian'),
		'nik_pelapor'		=> $sess['nik'],
		'waktu_lapor'		=> date('Y-m-d h:i:s'),
		//'gejala_umum'		=> $this->input->post('gejala_umum'),
		'total_pasien'		=> 0,
		'total_normal'		=> 0,
		'total_sakit'		=> 0,
		'total_meninggal'	=> 0,
		'lembaga_id'		=> $sess['lembaga_id'],
		'flag'				=> 0
		);
		$this->db->insert('tbl_resume_keluhan',$data);
		redirect('form/form01');
	}
	
	function save_keluhan(){
		$sess = $this->session->userdata('sess_login');
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
		$kd_gjl = implode(',',$data_gjl);
		$data = array(
		'pasien'		=> $this->input->post('pasien'),
		'waktu_awal'	=> $this->input->post('awal_kejadian')." ".$this->input->post('h_awal').":".$this->input->post('m_awal'),
		'waktu_terjadi'	=> $this->input->post('mulai_kejadian')." ".$this->input->post('h_kej').":".$this->input->post('m_kej'),
		'kd_gejala'		=> $kd_gjl,
		'organ_id'		=> $this->input->post('organ'),
		'lokasi'		=> $this->input->post('lokasi'),
		'kd_keluhan'	=> $this->input->post('kode'),
		'lembaga_id'	=> $sess['lembaga_id'],
		'flag'			=> 0
		);
		$this->db->insert('tbl_keluhan_pasien',$data);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."form/form01';</script>";
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */