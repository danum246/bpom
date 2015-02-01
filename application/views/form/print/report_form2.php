<?php

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,10,'LAPORAN KEWASPADAAN KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',11);

$pdf->Cell(30,8,'Yth.',0,1,'L');
$pdf->Cell(100,8,'Kepala Dinas Kesehatan Kabupaten / Kota / KKP ',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(10,8,'Di',0,0,'L');
$pdf->Cell(80,8,'................',0,1,'L');
$pdf->Ln();

$pdf->MultiCell(190,8,'Bersama ini kami sampaikan, bahwa pada hari .... tanggal .... jam .... (korban pertama sakit) terdapat kejadian keracunan pangan :');
$pdf->Ln(1);

$pdf->Cell(80,8,'Lokasi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Desa',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kelurahan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kecamatan / Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Kabupaten / Kota',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Provinsi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Pangan Diduga Penyebab',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');

$pdf->Cell(5,10,'a.',0,0,'L');
$pdf->Cell(90,10,'Jumlah korban sakit ........... orang',0,1,'L');
$pdf->Cell(5,10,'b.',0,0,'L');
$pdf->Cell(90,10,'Jumlah korban meninggal ........... orang',0,1,'L');

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

$pdf->Cell(90,8,'Demikian laporan ini dibuat',0,1,'L');

$pdf->Cell(130);
$pdf->Cell(20,10,'..................',0,0,'L');
$pdf->Cell(3,10,',',0,0,'C');
$pdf->Cell(40,10,'........./........./.................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(20,8,'Pelapor',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'Kepala Puskesmas / RS',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,'.....................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'NIP',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,'.....................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'No Telp',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,'.....................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'Alamat',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->MultiCell(40,8,'.....................');
$pdf->Ln();

$pdf->Cell(10,8,'Tembusan :',0,1,'L');
$pdf->Cell(5,8,'1',0,0,'L');
$pdf->Cell(3,8,'.',0,0,'C');
$pdf->Cell(90,8,'Direktur Jenderal Pengendalian Penyakit dan Penyehatan Lingkungan',0,1,'L');
$pdf->Cell(5,8,'1',0,0,'L');
$pdf->Cell(3,8,'.',0,0,'C');
$pdf->Cell(90,8,'Badan Pengawas Obat dan Makanan',0,1,'L');

$pdf->Output('FORM 2.pdf','D');

?>