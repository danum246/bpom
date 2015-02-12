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

$rowdata = $this->db->query("SELECT b.nik,c.lembaga,d.kabupaten_kota,d.kecamatan,d.kelurahan,a.kelurahan_id AS kelid,TIME(a.waktu_lapor) AS wkt,DAYNAME(a.waktu_lapor) AS hari,DATE(a.waktu_lapor) AS tgl,b.nama,b.hp,b.alamat,a.* FROM tbl_resume_keluhan a 
JOIN tbl_karyawan b ON a.`nik_pelapor` = b.`nik` 
JOIN tbl_lembaga c ON c.`id_lembaga` = a.`lembaga_id` 
join view_daerah d on d.`id_kelurahan` = a.`kelurahan_id`
where a.kd_keluhan = '$kode'")->row(); 

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'SURAT PENCABUTAN KLB KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->MultiCell(190,8,'Sehubungan dengan Laporan Perkembangan Situasi KLB Keracunan Pangan (terlampir) kami terima dari :');
$pdf->Ln();

$pdf->Cell(30);
$pdf->Cell(30,8,'Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,$rowdata->kelurahan,0,0,'L');
$pdf->Cell(30,8,'Kecamatan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,$rowdata->kecamatan,0,1,'L');
$pdf->Cell(30);
$pdf->Cell(30,8,'Kabupaten',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,$rowdata->kabupaten_kota,0,0,'L');
$pdf->Cell(30,8,'Provinsi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,'',0,1,'L');

$pdf->MultiCell(190,8,'Pada tanggal '.indodate($rowdata->tgl).', tentang situasi KLB Keracunan Pangan sampai saat dilaporkan, yaitu sudah tidak ada lagi / semakin menurunnya : ');
$pdf->Ln(1);

$pdf->Cell(10);
$pdf->Cell(3,8,'a. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah korban yang masih sakit '.total($rowdata->kd_keluhan,'1').' orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'b. ',0,0,'L');
$pasien = $this->db->query("select pasien_rawat,pasien_sembuh from tbl_status_kejadian where no_kejadian = '".$rowdata->kd_keluhan."'")->row();
$pdf->Cell(50,8,'Jumlah korban yang masih dirawat '.$pasien->pasien_sembuh.' orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'c. ',0,0,'L');
$pdf->Cell(70,8,'Jumlah korban baru menurut umur dan jenis kelamin ...... orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'d. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah kematian '.total($rowdata->kd_keluhan,'1').' orang',0,1,'L');
$pdf->Cell(50,8,'dan semakin meningkatnya :',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'f. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah dinyatakan sembuh '.$pasien->pasien_sembuh.' orang',0,1,'L');
$pdf->Cell(50,8,'serta sudah berakhirnya : ',0,1,'L');

$pdf->Cell(10);
$pdf->Cell(3,8,'g. ',0,0,'L');
$pdf->Cell(50,8,'penyelidikan epidemiologi KLB Keracunan Pangan , dan ',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'h. ',0,0,'L');
$pdf->Cell(50,8,'kegiatan penanggulangan KLB Keracunan Pangan',0,1,'L');
$pdf->Ln();

$pdf->MultiCell(190,8,'Berdasarkan perkembangan situasi KLB Keracunan Pangan tersebut di atas, maka :');
$pdf->Ln();

$pdf->MultiCell(190,8,'PENETAPAN KEJADIAN LUAR BIASA KERACUNAN PANGAN DINYATAKAN TELAH DICABUT DAN BERAKHIR',0,'C');
$pdf->Ln();

$pdf->Cell(50,8,'Demikian atas perhatian dan kerjasamanya diucapkan terimakasih',0,1,'L');
$pdf->Ln();

$pdf->Cell(120,8,'Jakarta',0,0,'R');
$pdf->Cell(2,8,'/',0,0,'C');
$pdf->Cell(60,8,indodate(date('Y-m-d')),0,1,'L');
$pdf->Cell(100);
$pdf->Cell(60,8,'Kepala Dinas Kesehatan Kabupaten/Kota/KKP',0,1,'L');
$pdf->Ln();

$pdf->Cell(150,10,$rowdata->nama,0,1,'R');
$pdf->Ln(0.1);
$pdf->Cell(100);
$pdf->Cell(10,10,'NIP : ',0,0,'L');
$pdf->Cell(50,10,$rowdata->nik,0,1,'L');

$pdf->Output('FORM 6.pdf','D');

?>