<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','A4');
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
$pdf->Cell(190,7,"Tanggal : ".date('d F Y'),0,1,'L');
$pdf->Line(0,46,297,46);
$pdf->SetLineWidth(1);      
$pdf->Line(0,47,297,47);   
$pdf->SetLineWidth(0);
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,'LAPORAN DATA SUPPLIER',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,8,'NO',1,0, 'C');
$pdf->Cell(22,8,'ID Supplier',1,0, 'C');
$pdf->Cell(60,8,'Nama Supplier',1,0, 'C');
$pdf->Cell(45,8,'Alamat',1,0, 'C');
$pdf->Cell(40,8,'Kota',1,0, 'C');
$pdf->Cell(45,8,'Provinsi',1,0, 'C');
$pdf->Cell(30,8,'Kode Pos',1,0, 'C');
$pdf->Cell(30,8,'Telp',1,1, 'C');
 
$pdf->SetFont('Arial','',10);
$no=1;
 
$supplier = mysqli_query($koneksi, "select * from supplier");
while ($row = mysqli_fetch_array($supplier)){
    $pdf->Cell(8,8,$no++ ,1,0, 'C');
    $pdf->Cell(22,8,$row['id_supplier'],1,0, 'C');
    $pdf->Cell(60,8,$row['nama_supplier'],1,0, 'C');
    $pdf->Cell(45,8,$row['alamat'],1,0, 'C');
    $pdf->Cell(40,8,$row['kota'],1,0, 'C');
    $pdf->Cell(45,8,$row['provinsi'],1,0, 'C');
    $pdf->Cell(30,8,$row['kode_pos'],1,0, 'C');
    $pdf->Cell(30,8,$row['telp'],1,1, 'C');
}
 
$pdf->Output();
?>