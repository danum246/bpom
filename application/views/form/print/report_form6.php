<?php

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'SURAT PENCABUTAN KLB KERACUNAN PANGAN',0,1,'C');
$pdf->Ln();

$pdf->MultiCell(190,8,'Sehubungan dengan Laporan Perkembangan Situasi KBL Keracunan Pangan (terlampir) kami terima dari :');
$pdf->Ln();

$pdf->Cell(30);
$pdf->Cell(30,8,'Puskesmas',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,'................',0,0,'L');
$pdf->Cell(30,8,'Kecamatan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,'................',0,1,'L');
$pdf->Cell(30);
$pdf->Cell(30,8,'Kabupaten',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,'................',0,0,'L');
$pdf->Cell(30,8,'Provinsi',0,0,'L');
$pdf->Cell(3,8,':',0,0,'L');
$pdf->Cell(40,8,'................',0,1,'L');

$pdf->MultiCell(190,8,'Pada tanggal ...... bulan ...... tahun ...... , tentang situasi KLB Keracunan Pangan sampai saat dilaporkan, yaitu sudah tidak ada lagi / semakin menurunnya : ');
$pdf->Ln(1);

$pdf->Cell(10);
$pdf->Cell(3,8,'a. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah korban yang masih sakit ...... orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'b. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah korban yang masih dirawat ...... orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'c. ',0,0,'L');
$pdf->Cell(70,8,'Jumlah korban baru menurut umur dan jenis kelamin ...... orang',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'d. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah kematian ...... orang',0,1,'L');
$pdf->Cell(50,8,'dan semakin meningkatnya :',0,1,'L');
$pdf->Cell(10);
$pdf->Cell(3,8,'f. ',0,0,'L');
$pdf->Cell(50,8,'Jumlah dinyatakan sembuh ...... orang',0,1,'L');
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
$pdf->Cell(60,8,'....../....../.........',0,1,'L');
$pdf->Cell(100);
$pdf->Cell(60,8,'Kepala Dinas Kesehatan Kabupaten/Kota/KKP',0,1,'L');
$pdf->Ln();

$pdf->Cell(150,10,'................................',0,1,'R');
$pdf->Ln(0.1);
$pdf->Cell(100);
$pdf->Cell(10,10,'NIP : ',0,0,'L');
$pdf->Cell(50,10,'...............',0,1,'L');

$pdf->Output('FORM 6.pdf','D');

?>