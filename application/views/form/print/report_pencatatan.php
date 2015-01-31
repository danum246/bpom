<?php

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(190,10,'FORMULIR PENCATATAN',0,1,'C');
$pdf->Ln(0.3);
$pdf->Cell(190,10,'LAPORAN KEWASPADAAN KERACUNAN PANGAN',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);

$pdf->Cell(70,10,'Nama Pelapor',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Nomor Telp',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Alamat',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(5);

$pdf->MultiCell(190,10,'Melaporkan pada hari ... tanggal ... jam ... korban pertama sakit , terdapat kejadian keracunan pangan :');
$pdf->Ln(1);

$pdf->Cell(70,10,'Lokasi / Tempat Kejadian',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Desa / Kelurahan',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Kecamatan',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Kabupaten / Kota',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Provinsi',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(70,10,'Pangan Diduga Penyebab',0,0,'L');
$pdf->Cell(5,10,':',0,0,'C');
$pdf->Cell(100,10,'......',0,1,'L');
$pdf->Ln(4);

$pdf->Cell(3,10,'a.',0,0,'C');
$pdf->Cell(80,10,'Jumlah Korban Sakit ... orang',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(3,10,'b.',0,0,'C');
$pdf->Cell(80,10,'Jumlah Korban Meninggal ... orang',0,1,'L');
$pdf->Ln(4);

$pdf->Cell(100,10,'Gejala - gejala yang ditemui adalah antara lain :',0,1,'L');
$pdf->Ln(0.1);

$pdf->Cell(60,10,'Pusing',0,0,'L');
$pdf->Cell(5,10,'(12)',0,0,'C');
$pdf->Cell(3,10,' ',0,0,'C');
$pdf->Cell(60,10,'Mual',0,0,'L');
$pdf->Cell(5,10,'(12)',0,1,'C');
$pdf->Ln(0.1);
$pdf->Cell(60,10,'Kejang',0,0,'L');
$pdf->Cell(5,10,'(12)',0,0,'C');
$pdf->Cell(3,10,' ',0,0,'C');
$pdf->Cell(60,10,'Pingsan',0,0,'L');
$pdf->Cell(5,10,'(12)',0,1,'C');
$pdf->Ln(1);

$pdf->Cell(60,10,'Demikian catatan ini dibuat.',0,1,'L');
$pdf->Ln(2);

$pdf->Cell(145,10,'Jakarta',0,0,'R');
$pdf->Cell(2,10,'/',0,0,'C');
$pdf->Cell(60,10,'....../....../.........',0,1,'L');
$pdf->Ln(7);

$pdf->Cell(170,10,'Nama Petugas',0,1,'R');
$pdf->Ln(0.1);
$pdf->Cell(170,10,'Nama Puskesmas',0,1,'R');

$pdf->Output();

?>