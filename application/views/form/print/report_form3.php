<?php

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

$pdf->MultiCell(190,8,'Sehubungan dengan adanya laporan dari Kepala Puskesmas / RS ....... tentang kejadian keracunan pangan, bersama ini kami laporkan, bahwa pada hari ..... tanggal ..... jam ..... (korban pertama sakit) terdapat kejadian keracunan pangan :');
$pdf->Ln(1);

$pdf->Cell(80,8,'Wilayah kerja (KKP)',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
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
$pdf->Cell(80,8,'Provinsi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');
$pdf->Cell(80,8,'Pangan Diduga Penyebab',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(90,8,'................',0,1,'L');

$pdf->Cell(30,8,'Korban',0,1,'L');
$pdf->Cell(3,8,'a.',0,0,'C');
$pdf->Cell(80,8,'Jumlah Korban Sakit ... orang',0,1,'L');
$pdf->Ln(0.1);
$pdf->Cell(3,8,'b.',0,0,'C');
$pdf->Cell(80,8,'Jumlah Korban Meninggal ... orang',0,1,'L');
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

$pdf->Cell(60,8,'Demikian catatan ini dibuat.',0,1,'L');
$pdf->Ln(1);

$pdf->Cell(130);
$pdf->Cell(20,8,'..................................,',0,1,'L');
$pdf->Cell(130);
$pdf->Cell(20,8,'..................',0,0,'L');
$pdf->Cell(3,8,',',0,0,'C');
$pdf->Cell(40,8,'........./........./.................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(20,8,'Pelapor',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'Kepala KKP',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,'.....................',0,1,'L');

$pdf->Cell(90);
$pdf->Cell(50,8,'NIP',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(40,8,'.....................',0,1,'L');
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