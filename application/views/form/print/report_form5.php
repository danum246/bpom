<?php

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'SURAT PENETAPAN KLB KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->MultiCell(190,8,'Sehubungan dengan adanya laporan dari Kepala Puskesmas / RS ..... tentang kejadian keracunan pangan (terlampir) yang terjadi pada hari ..... tanggal ...... jam ...... (korban pertama sakit) di :');
$pdf->Ln(1);

$pdf->Cell(80,8,'Lokasi / Tempat Kejadian',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Desa / Kelurahan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kecamatan / Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kabupaten / Kota',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');

$pdf->Cell(30,8,'Korban',0,1,'L');
$pdf->Cell(3,8,'a.',0,0,'C');
$pdf->Cell(80,8,'Jumlah Korban Sakit ... orang',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(3,8,'b.',0,0,'C');
$pdf->Cell(80,8,'Jumlah Korban Meninggal ... orang',0,1,'L');

$pdf->Cell(80,8,'Dengan Gejala',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(30,10,'Pusing',0,0,'L');
$pdf->Cell(5,10,'(12)',0,0,'C');
$pdf->Cell(3,10,' ',0,0,'C');
$pdf->Cell(30,10,'Mual',0,0,'L');
$pdf->Cell(5,10,'(12)',0,1,'C');
$pdf->Ln(0.1);
$pdf->Cell(83);
$pdf->Cell(30,10,'Kejang',0,0,'L');
$pdf->Cell(5,10,'(12)',0,0,'C');
$pdf->Cell(3,10,' ',0,0,'C');
$pdf->Cell(30,10,'Pingsan',0,0,'L');
$pdf->Cell(5,10,'(12)',0,1,'C');

$pdf->Cell(80,8,'Dugaan penyebab keracunan pangan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');

$pdf->Cell(20,8,'berasal dari',0,1,'L');
$pdf->Cell(80,8,'Lokasi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Desa / Kelurahan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kecamatan / Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kabupaten / Kota',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Ln();

$pdf->MultiCell(190,8,'Berdasarkan data-data tersebut dan hasil analisa epidemiologi, dengan ini ditetapkan bahwa keadaan ini adalah :');
$pdf->Ln(1);

$pdf->Cell(190,8,'KEJADIAN LUAR BIASA KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->Cell(190,8,'Demikian, untuk menjadi perhatian dan segera dilakukan penanggulangan.',0,1,'L');
$pdf->Ln();

$pdf->Cell(120,8,'Jakarta',0,0,'R');
$pdf->Cell(2,8,'/',0,0,'C');
$pdf->Cell(60,8,'....../....../.........',0,1,'L');
$pdf->Cell(100);
$pdf->Cell(60,8,'Kepala Dinas Kesehatan Kabupaten/Kota/KKP',0,1,'L');
$pdf->Ln();

$pdf->Cell(150,10,'................................',0,1,'R');
$pdf->Ln(0.1);
$pdf->Cell(100);
$pdf->Cell(10,10,'NIP : ',0,0,'L');
$pdf->Cell(50,10,'...............',0,1,'L');

$pdf->Output('FORM 5.pdf','D');

?>