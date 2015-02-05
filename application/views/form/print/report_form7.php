<?php

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'FORMULIR PENGAMBILAN SPESIMEN',0,1,'C');
$pdf->Ln();

$pdf->Cell(50,8,'Tanggal Pengambilan',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(50,8,'.................',0,1,'L');
$pdf->Cell(50,8,'Waktu',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(50,8,'.................',0,1,'L');
$pdf->Cell(50,8,'Petugas Yang Mengambil',0,0,'L');
$pdf->Cell(3,8,':',0,0,'C');
$pdf->Cell(50,8,'.................',0,1,'L');
$pdf->Ln();

$pdf->Cell(50,8,'Uraian contoh yang diambil',0,0,'L');
$pdf->Ln();

$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(50,8,'Nama Spesimen',1,0,'C');
$pdf->Cell(30,8,'Banyaknya',1,0,'C');
$pdf->Cell(50,8,'Untuk Diperiksa',1,0,'C');
$pdf->Cell(50,8,'Catatan',1,0,'C');
$pdf->Ln();

$pdf->Cell(10,8,'(1)',1,0,'C');
$pdf->Cell(50,8,'(2)',1,0,'C');
$pdf->Cell(30,8,'(3)',1,0,'C');
$pdf->Cell(50,8,'(4)',1,0,'C');
$pdf->Cell(50,8,'(5)',1,0,'C');
$pdf->Ln();

for ($i=1; $i <= 15 ; $i++) { 
	if ($i == 15) {
		$pdf->Cell(10,8,'','LB',0,'C');
		$pdf->Cell(50,8,'','LB',0,'C');
		$pdf->Cell(30,8,'','LB',0,'C');
		$pdf->Cell(50,8,'','LB',0,'C');
		$pdf->Cell(50,8,'','LBR',1,'C');
		$pdf->Ln();
	} else {
		$pdf->Cell(10,8,'','L',0,'C');
		$pdf->Cell(50,8,'','L',0,'C');
		$pdf->Cell(30,8,'','L',0,'C');
		$pdf->Cell(50,8,'','L',0,'C');
		$pdf->Cell(50,8,'','LR',0,'C');
		$pdf->Ln();
	}
}

$pdf->Cell(120);
$pdf->Cell(50,8,'......................................., 20...',0,1,'C');
$pdf->Cell(120);
$pdf->Cell(50,8,'Nama Petugas',0,1,'C');
$pdf->Ln();
$pdf->Cell(120);
$pdf->Cell(50,8,'.........................',0,1,'C');

$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'PETUNJUK PENGISIAN FORMULIR PENGAMBILAN SPESIMEN',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,10,'',1,0,'C');
$pdf->Cell(60,10,'TENTANG',1,0,'C');
$pdf->Cell(60,10,'TULISAN',1,0,'C');
$pdf->Cell(60,10,'CONTOH',1,0,'C');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Tanggal Pengambilan','LRT',0,'C');
$pdf->Cell(60,10,'Tanggal , bulan dan tahun','LRT',0,'L');
$pdf->Cell(60,10,'30 April 2014','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Petugas Yang Mengambil','LRT',0,'C');
$x = $pdf->GetX();
$y = $pdf->GetY();
$width = 60;
$pdf->MultiCell($width,5,'Nama petugas yang mengambil spesimen','LRT','L');
$pdf->SetXY($width + $x,$y);
$pdf->Cell(60,10,'Danu Mahendra','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Kolom (1)','LRT',0,'C');
$pdf->Cell(60,10,'Nomor urut spesimen','LRT',0,'L');
$pdf->Cell(60,10,'1,2,3,dst','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Kolom (2)','LRT',0,'C');
$pdf->Cell(60,10,'Nama spesimen yang diambil','LRT',0,'L');
$pdf->Cell(60,10,'Daging, Usap Alat Piring','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Kolom (3)','LRT',0,'C');
$pdf->Cell(60,10,'Jumlah spesimen yang diambil','LRT',0,'L');
$pdf->Cell(60,10,'250 gr, 1 buah , dst','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'','LRT',0,'C');
$pdf->Cell(60,10,'Kolom (4)','LRT',0,'C');
$pdf->Cell(60,10,'Jenis pemeriksaan yang dikerjakan','LRT',0,'L');
$pdf->Cell(60,10,'E. coli , Salmonella','LRT',0,'L');
$pdf->Ln();

$pdf->Cell(10,10,'',1,0,'C');
$pdf->Cell(60,10,'Kolom (5)',1,0,'C');
$pdf->Cell(60,10,'Catatan bila diperlukan',1,0,'L');
$x2 = $pdf->GetX();
$y2 = $pdf->GetY();
$width2 = 60;
$pdf->MultiCell($width2,5,'*diambil dari kulkas , *diambil dari sisa makanan',1,'L');
$pdf->SetXY($width2 + $x2,$y2);
$pdf->Ln();

$pdf->Output('FORM 7.pdf','D');

?>