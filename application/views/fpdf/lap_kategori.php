<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);
// mencetak string 
$pdf->Cell(40,7,'UD. SUMBER TELAGA',0,1,'L');
$pdf->SetFont('Arial','',12);
// mencetak string 
$pdf->Cell(190,7,'JL. ARGOPURO 218 RAMBIGUNDAM-RAMBIPUJI-JEMBER',0,1,'L');
$pdf->Cell(190,7,'Telp. 085336176533',0,1,'L');
$pdf->Cell(190,7,'Fax. -',0,1,'L');
$pdf->Cell(190,7,"Tanggal : ".date('d F Y'),0,1,'L');
$pdf->Line(0,46,297,46);
$pdf->SetLineWidth(1);      
$pdf->Line(0,47,297,47);   
$pdf->SetLineWidth(0);
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,'LAPORAN DATA KATEGORI',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20, 6, 'NO', 1, 0, 'C');
$pdf->Cell(40, 6,'ID KATEGORI',1,0, 'C');
$pdf->Cell(60, 6,'NAMA KATEGORI',1,1, 'C');


$pdf->SetFont('Arial','',10);
$no=1;

$kategori = mysqli_query($koneksi, "select * from data_kategori");
while ($row = mysqli_fetch_array($kategori)){
    $pdf->Cell(20, 6, $no , 1, 0, 'C');
	$pdf->Cell(40, 6, $row['id_kategori'],1, 0, 'C');
	$pdf->Cell(60, 6, $row['nama_kategori'], 1, 1,'C');
    
   $no++; 
}

$pdf->Output();
?>