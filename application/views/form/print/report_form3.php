<?php

function hari($day){
	$days = array(
	'Sunday' => 'Minggu',
	'Monday' => 'Senin',
	'Tuesday' => 'Selasa',
	'Wednesday' => 'Rabu',
	'Thursday' => 'Kamis',
	'Friday' => 'Jumat',
	'Saturday' => 'Sabtu'
	);
	return $days[$day];
}

function total($kd_keluhan,$flag){
	if($flag=='all'){
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan'");
	}else{
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan' and status_pasien='$flag'");
	}
	$row = mysql_fetch_array($sql);
	return $row['total'];
}

function  indodate($tgl){
$tanggal  =  substr($tgl,8,2);
$bulan	=  getBulan(substr($tgl,5,2));
$tahun	=  substr($tgl,0,4);
return  $tanggal.' '.$bulan.' '.$tahun;
}

function  getBulan($bln){
switch  ($bln){
case  1:
return  "Januari";
break;
case  2:
return  "Februari";
break;
case  3:
return  "Maret";
break;
case  4:
return  "Maret";
break;
case  5:
return  "Mei";
break;
case  6:
return  "Juni";
break;
case  7:
return  "Juli";
break;
case  8:
return  "Agustus";
break;
case  9:
return  "September";
break;
case  10:
return  "Oktober";
break;
case  11:
return  "November";
break;
case  12:
return  "Desember";
break;
}
}

function show_pgn($kodes){
$pgn = explode(',',$kodes);
$plength = sizeof($pgn)-1;
for($n = 0; $n <= $plength; $n++){
$sql = mysql_query("select pangan from tbl_pangan where kd_pangan = '".$pgn[$n]."'");
$row = mysql_fetch_array($sql);
$pangan[] = $row['pangan'];
}
return implode(', ',$pangan);
}

$rowdata = $this->db->query("SELECT b.nik,c.lembaga,e.kabupaten_kota,d.kelurahan,a.kelurahan_id AS kelid,TIME(a.waktu_lapor) AS wkt,DAYNAME(a.waktu_lapor) AS hari,DATE(a.waktu_lapor) AS tgl,b.nama,b.hp,b.alamat,a.* FROM tbl_resume_keluhan a 
JOIN tbl_karyawan b ON a.`nik_pelapor` = b.`nik` 
JOIN tbl_lembaga c ON c.`id_lembaga` = a.`lembaga_id` 
join view_daerah c on c.'id_kelurahan' = a.'kelurahan_id'
where a.kd_keluhan = '$kode'")->row();

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'LAPORAN KEWASPADAAN KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',11);

$pdf->Cell(30,8,'Yth.',0,1,'L');
$pdf->Cell(100,8,'Direktur Jenderal PP dan PL Kementerian Kesehatan RI',0,1,'L');
$pdf->Cell(100,8,'Jl. Percetakan Negara 29',0,1,'L');
$pdf->Cell(100,8,'Jakarta Pusat',0,1,'L');
$pdf->Ln();

$pdf->MultiCell(190,8,'Sehubungan dengan adanya laporan dari Kepala Puskesmas / RS '.$rowdata->lembaga.' tentang kejadian keracunan pangan, bersama ini kami laporkan, bahwa pada hari '.hari($rowdata->hari).', tanggal '.indodate($rowdata->tgl).' jam '.$rowdata->wkt.', terdapat kejadian keracunan pangan :');
$pdf->Ln(1);

$pdf->Cell(80,8,'Wilayah kerja (KKP)',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,$rowdata->kabupaten_kota,0,1,'L');
$pdf->Cell(80,8,'Lokasi / Tempat Kejadian',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,$rowdata->kelurahan,0,1,'L');
$pdf->Cell(80,8,'Desa / Kelurahan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,$rowdata->kelurahan,0,1,'L');
$pdf->Cell(80,8,'Kecamatan / Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,$rowdata->kecamatan,0,1,'L');
$pdf->Cell(80,8,'Kabupaten / Kota',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,$rowdata->kabupaten_kota,0,1,'L');
$pdf->Cell(80,8,'Provinsi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'',0,1,'L');
$pdf->Cell(80,8,'Pangan Diduga Penyebab',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,show_pgn($rowdata->pangan_umum),0,1,'L');

$pdf->Cell(30,8,'Korban',0,1,'L');
$pdf->Cell(3,8,'a.',0,0,'C');
$pdf->Cell(80,8,'Jumlah korban sakit '.total($rowdata->kd_keluhan,'1').' orang',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(3,8,'b.',0,0,'C');
$pdf->Cell(80,8,'Jumlah Korban Meninggal '.total($rowdata->kd_keluhan,'2').' orang',0,1,'L');
$pdf->Ln(4);

$pdf->Cell(100,10,'Gejala - gejala yang ditemui adalah antara lain :',0,1,'L');
$pdf->Ln(0.1);

$gejala = $this->db->query("select gejala_umum from tbl_resume_keluhan where kd_keluhan = '".$rowdata->kd_keluhan."'")->row()->gejala_umum;
$kd_gjl = explode(',',$gejala);
$lgejala = sizeof($kd_gjl)-1;
for($n = 0; $n<= $lgejala; $n++){
		$pdf->Cell(60,10,$this->db->query("select gejala from tbl_gejala where kd_gejala = '".$kd_gjl[$n]."'")->row()->gejala,0,0,'L');
		$pdf->Cell(5,10,'('.$this->db->query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan = '$rowdata->kd_keluhan' and kd_gejala like '%$kd_gjl[$n]%' ")->row()->total.')',0,0,'C');
		if(($n+1)%2==0){
			$pdf->Ln(10);
		}else{
			$pdf->Cell(3,10,' ',0,0,'C');
		}
}
$pdf->Ln(10);

$pdf->Cell(60,8,'Demikian catatan ini dibuat.',0,1,'L');
$pdf->Ln(1);

$pdf->Cell(130);
$pdf->Cell(20,8,hari($rowdata->hari),0,1,'L');
$pdf->Cell(130);
$pdf->Cell(20,8,$rowdata->kabupaten_kota,0,0,'L');
$pdf->Cell(3,8,',',0,0,'C');
$pdf->Cell(40,8,indodate($rowdata->tgl),0,1,'L');

$pdf->Cell(90);
$pdf->Cell(20,8,'Pelapor',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'Kepala KKP',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,$rowdata->kabupaten_kota,0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'NIP',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,$rowdata->nik,0,1,'L');
$pdf->Ln(1);

$pdf->Cell(10,5,'Tembusan :',0,1,'L');
$pdf->Cell(5,5,'1',0,0,'L');
$pdf->Cell(3,5,'.',0,0,'C');
$pdf->Cell(90,5,'Badan Pengawas Obat dan Makanan',0,1,'L');
$pdf->Cell(5,5,'2',0,0,'L');
$pdf->Cell(3,5,'.',0,0,'C');
$pdf->Cell(90,5,'Kepala Dinas Kesehatan Provinsi',0,1,'L');
$pdf->Cell(5,5,'3',0,0,'L');
$pdf->Cell(3,5,'.',0,0,'C');
$pdf->Cell(90,5,'Kepala Dinas Kesehatan Kabupaten / Kota',0,1,'L');

$pdf->Output('FORM 3.pdf','D');

?>