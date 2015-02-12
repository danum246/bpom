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
		$this->db->select('a.*,b.nama as pelapor');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan a');
		$this->db->join('tbl_karyawan b','a.nik_pelapor = b.nik');
		$data['keluhan']   = $this->db->get()->result();
		$data['organ'] = $this->db->get('tbl_organ')->result();
		$data['pangan'] = $this->db->get('tbl_pangan')->result();
		$data['pekerjaan'] = $this->db->get('tbl_pekerjaan')->result();
		$data['gejala']    = $this->db->get('tbl_gejala')->result();
		$this->db->select('count(*) as total');
		$this->db->where('flag',1);
		$this->db->from('tbl_resume_keluhan');
		$data['count'] = (int)$this->db->get()->row()->total+1;
		// Cek Status Kejadian
		$sess = $this->session->userdata('sess_login');
		$check_kejadian = $this->db->query("select count(*) as total from tbl_resume_keluhan where flag = 0 and lembaga_id = '".$sess['lembaga_id']."'")->row()->total;
		if($check_kejadian == 0){
		$data['page'] = 'form/add_kejadian_form01_view';
		$data['kelurahan'] = $this->db->query("select * from tbl_kelurahan")->result();
		$this->load->view('template',$data);
		}else{
		$this->db->select('kd_keluhan');
		$this->db->where('flag',0);
		$data['kode'] = $this->db->get('tbl_resume_keluhan')->row()->kd_keluhan;
		$data['isset_pangan'] = $this->db->query("select  count(*) as total from tbl_pangan_tmp where kd_keluhan = '".$data['kode'] ."'")->row()->total;
		if($data['isset_pangan']>0){
			$data['tmp_pangan'] = $this->db->query("SELECT a.kd_pangan,b.pangan FROM tbl_pangan_tmp a
			JOIN tbl_pangan b ON a.`kd_pangan` = b.`kd_pangan`")->result(); 
		}
		$data['page'] = 'form/form01_view';
		$this->load->view('template',$data);
		}
	}
	
	function uploads($data,$name){
		$file = $data;
		$folder = "./assets/upload/data/";
		$folder = $folder . basename($name);
		move_uploaded_file($data['tmp_name'], $folder);	
	}
	
	function upload(){
		$kode = $this->input->post('kode');
		$userfile = date('Ymdhis').'_'.$_FILES['userfile']['name'];
		$this->uploads($_FILES['userfile'],$userfile);
		$this->db->query("update tbl_resume_keluhan set file = '$userfile'");
		redirect('form/form01/result/'.$kode);
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
		$data['pekerjaan'] = $this->db->query("select distinct a.pekerjaan,a.id_pekerjaan from tbl_pekerjaan a join tbl_keluhan_pasien b on a.id_pekerjaan = b.pekerjaan_id where b.kd_keluhan = '".$kode."'")->result();
		$data['kejadian'] = $this->db->query("select a.*,b.*,c.* from tbl_resume_keluhan a
		join tbl_lembaga b on a.lembaga_id = b.id_lembaga
		join view_daerah c on c.id_kelurahan = a.kelurahan_id
		where a.kd_keluhan='$kode' ")->row();
		$data['gjl_umum'] = $this->db->query("select gejala_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->gejala_umum;
		//die($data['gejala_umum']);
		$data['totrow'] = $this->db->query("select count(*) as total from tbl_analisa where kd_keluhan = '$kode' and persentase >= 50")->row()->total;
		$data['kode'] = $kode;
		$data['pangan'] = $this->db->query("select pangan_umum from tbl_resume_keluhan where kd_keluhan = '$kode'")->row()->pangan_umum;
		$data['page'] = 'form/result_form01_view';
		$this->load->view('template',$data);
	}
	
	function del_keluhan($kode){
	//die($kode);
		$this->app_model->deletedata('tbl_keluhan_pasien','kd_keluhan',$kode);
		$this->app_model->deletedata('tbl_analisa','kd_keluhan',$kode);
		$this->app_model->deletedata('tbl_resume_keluhan','kd_keluhan',$kode);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."form/resume';</script>";
	}
	
	function generate_result(){
		$this->db->select('kd_keluhan,total_pasien');
		$this->db->where('flag',0);
		$tbl = $this->db->get('tbl_resume_keluhan')->row();
		$kode = $tbl->kd_keluhan;
		$totpas = $this->db->query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan = '$kode'")->row()->total;
		$racun = $this->db->query("SELECT a.* , b.organ_id,b.inkubasi_pendek,b.inkubasi_tinggi FROM tbl_racun_gejala a JOIN tbl_racun b ON a.kd_racun = b.kd_racun")->result();
		foreach($racun as $row){ 
		//$count = $this->db->query("select count(*) as total from tbl_keluhan_pasien where (kd_keluhan = '$kode') and (kd_gejala like '%".$row->kd_gejala."%') and (organ_id = '".$row->organ_id."') and ( TIMESTAMPDIFF(MINUTE,(waktu_awal), (waktu_terjadi))>= '".$row->inkubasi_pendek."' and  TIMESTAMPDIFF(MINUTE,(waktu_awal), (waktu_terjadi))<= '".$row->inkubasi_tinggi."')")->row()->total;
		$count = $this->db->query("select count(*) as total from tbl_keluhan_pasien where (kd_keluhan = '$kode') and ((kd_gejala like '$row->kd_gejala,%')or(kd_gejala like '%,$row->kd_gejala,%')or(kd_gejala like '%,$row->kd_gejala')) and ( TIMESTAMPDIFF(MINUTE,(waktu_awal), (waktu_terjadi))>= '".$row->inkubasi_pendek."' and  TIMESTAMPDIFF(MINUTE,(waktu_awal), (waktu_terjadi))<= '".$row->inkubasi_tinggi."')")->row()->total;
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
		$kd_pangan = $this->db->query("select kd_pangan from tbl_pangan")->result();
		foreach($kd_pangan as $pg){
		$kd = $pg->kd_pangan;
		$countp = $this->db->query("select count(*) as total from tbl_keluhan_pasien where ((kd_pangan like '$kd,%') or (kd_pangan like '%,$kd,%') or (kd_pangan like '%,$kd')) and kd_keluhan = '$kode'")->row()->total;
		$persen = $countp/$totpas*100;
		if($persen >= 50){
		$pgn[] = $kd;
		}
		}
		$kdpng = implode(',',$pgn);
		$this->db->query("update tbl_resume_keluhan set flag = 1,gejala_umum = '$gu',pangan_umum = '$kdpng' where kd_keluhan = '$kode'");
		//$this->db->query("update tbl_resume_keluhan set flag = 1,gejala_umum = '$gu' where kd_keluhan = '$kode'");
		$this->db->query("update tbl_keluhan_pasien set flag = 1 where kd_keluhan = '$kode'");
		redirect('form/form01/result/'.$kode);
	}
	
	function save_kejadian(){
		$sess = $this->session->userdata('sess_login');
		$id_lembaga = $sess['lembaga_id'];
		$location = $this->db->query("select kelurahan_id from tbl_lembaga where id_lembaga = '$id_lembaga' ")->row()->kelurahan_id;
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
		'kelurahan_id' => $location,
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
		$prow = $this->input->post('prow');
		//pangan 
		$pangan =  $this->input->post('pangan');
		$lpgn = sizeof($pangan);

			for($n = 0;$n <= $lpgn-1;$n++){
				$pgn = $pangan[$n];
				$sql = $this->db->query("select kd_pangan from tbl_pangan where pangan = '$pgn'");
				$cek = $sql->num_rows();
				if($cek>0){
					$kd_pangan[$n] = $sql->row()->kd_pangan;
				}else{
					$countpg = $this->db->query("select count(*) as total from tbl_pangan where kd_pangan like 'PGN%'")->row()->total+1;
					$pangan[] = 'PGN-'.$countpg;
					$dt = array(
					'kd_pangan'		=> 'PGN-'.$countpg,
					'pangan'		=> $pgn,
					'keterangan'	=> $pgn
					);
					$this->db->insert('tbl_pangan',$dt);
					$kd_pangan[$n] = 'PGN-'.$countpg;
				}
				$datas = array(
				'kd_keluhan'		=> $this->input->post('kode'),
				'kd_pangan'		=> $kd_pangan[$n],
				'flag'					=> 0
				);
				$this->db->insert('tbl_pangan_tmp',$datas);
			}
		
		if($this->input->post('pangan_cb')){
			$pcb = $this->input->post('pangan_cb');
			$lpcb = sizeof($this->input->post('pangan_cb'));
			for($m=0;$m<=$lpcb-1;$m++){
				$kd_pangan[$n+$m] = $pcb[$m];
			}			
		}
		
		$dtpangan = implode(',',$kd_pangan);
		$data = array(
		'pasien'		=> $this->input->post('pasien'),
		'jns_kel'	=> $this->input->post('jk'),
		'waktu_awal'	=> $this->input->post('awal_kejadian')." ".$this->input->post('h_awal').":".$this->input->post('m_awal'),
		'waktu_terjadi'	=> $this->input->post('mulai_kejadian')." ".$this->input->post('h_kej').":".$this->input->post('m_kej'),
		'kd_gejala'		=> $kd_gjl,
		//'organ_id'		=> $this->input->post('organ'),
		'lokasi'		=> $this->input->post('lokasi'),
		'kd_keluhan'	=> $this->input->post('kode'),
		'lembaga_id'	=> $sess['lembaga_id'],
		'pekerjaan_id'	=> $this->input->post('pekerjaan'),
		'kd_pangan'		=> $dtpangan,
		'status_pasien'	=> $this->input->post('status'),
		'flag'			=> 0
		);
		$this->db->insert('tbl_keluhan_pasien',$data);
		echo "<script>alert('Sukses');
		document.location.href='".base_url()."form/form01';</script>";
	}

}

/* End of file form01.php */
/* Location: ./application/controllers/form01.php */