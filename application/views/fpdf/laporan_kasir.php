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
// mencetak string
$pdf->Cell(40,7,'UD. SUMBER TELAGA',0,1,'L');
$pdf->SetFont('Arial','',12);
// mencetak string 
$pdf->Cell(190,7,'JL. ARGOPURO 218 RAMBIGUNDAM-RAMBIPUJI-JEMBER',0,1,'L');
$pdf->Cell(190,7,'Telp. 085336176533',0,1,'L');
$pdf->Cell(190,7,'Fax. -',0,1,'L');
$pdf->Cell(190,7,"Tanggal : ".date("Y-m-d"),0,1,'L');
$pdf->Line(0,46,297,46);
$pdf->SetLineWidth(1);      
$pdf->Line(0,47,297,47);   
$pdf->SetLineWidth(0);
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,'LAPORAN DATA KASIR',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8, 8, 'NO', 1, 0, 'C');
$pdf->Cell(20, 8,'ID KASIR',1,0, 'C');
$pdf->Cell(42, 8,'NAMA KASIR',1,0, 'C');
$pdf->Cell(35, 8,'ALAMAT',1,0, 'C');
$pdf->Cell(30, 8,'TELP',1,0, 'C');
$pdf->Cell(25, 8,'POSISI',1,0, 'C');
$pdf->Cell(30, 8,'USERNAME',1,1, 'C');
//$pdf->Cell(30, 8,'PASSWORD',1,1, 'C');

$pdf->SetFont('Arial','',10);
$no=1;

$kasir = mysqli_query($koneksi, "select * from kasir");
while ($row = mysqli_fetch_array($kasir)){
    $pdf->Cell(8, 8, $no , 1, 0, 'C');
	$pdf->Cell(20, 8, $row['id_kasir'],1, 0, 'C');
	$pdf->Cell(42, 8, $row['nama_kasir'], 1, 0,'L');
    $pdf->Cell(35, 8, $row['alamat'],1, 0, 'L');
    $pdf->Cell(30, 8, $row['telp'],1, 0, 'L');  
    $pdf->Cell(25, 8, $row['posisi'],1, 0, 'C');
    $pdf->Cell(30, 8, $row['username'],1, 1, 'L');
//    $pdf->Cell(30, 8, $row['password'],1, 1, 'C');
   $no++; 
}

$pdf->Output();
?>