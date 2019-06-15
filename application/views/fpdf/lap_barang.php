<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
error_reporting(0);
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
$pdf->Cell(0,7,'LAPORAN DATA BARANG',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(9, 8, 'NO', 1, 0, 'C');
$pdf->Cell(23, 8,'ID BARANG',1,0, 'C');
$pdf->Cell(68, 8,'NAMA BARANG',1,0, 'C');
$pdf->Cell(28, 8,'KATEGORI',1,0, 'C');
$pdf->Cell(32, 8,'HRG POKOK',1,0, 'C');
$pdf->Cell(32, 8,'HRG UMUM',1,0, 'C');
$pdf->Cell(32, 8,'HRG RESELL',1,0, 'C');
$pdf->Cell(24, 8,'STOCK',1,0, 'C');
$pdf->Cell(25, 8,'EXP',1,1, 'C');

$pdf->SetFont('Arial','',10);
$no=1;

$barang = mysqli_query($koneksi, "select * from data_barang db, data_kategori dk, data_satuan ds WHERE db.id_kategori=dk.id_kategori AND db.id_satuan=ds.id_satuan");
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(9, 6, $no , 1, 0, 'C');
	$pdf->Cell(23, 6, $row['id_barang'],1,0, 'C');
	$pdf->Cell(68, 6, $row['nama_barang'],1,0, 'L');
    $pdf->Cell(28, 6, $row['nama_kategori'],1,0, 'C');
    $pdf->Cell(32, 6,  "Rp. ".number_format($row['hrg_pokok'])." ,-",1,0, 'C');
    $pdf->Cell(32, 6, "Rp. ".number_format($row['hrg_umum'])." ,-",1,0, 'C');
    $pdf->Cell(32, 6, "Rp. ".number_format($row['hrg_reseller'])." ,-",1,0, 'C');
    $pdf->Cell(24, 6, $row['stock']." ".$row['nama_satuan'],1,0, 'C');
    $pdf->Cell(25, 6, $row['expired'],1,1, 'C');
   $no++; 
    $tpb =$row['hrg_pokok']*$row['stock'];
    $hp +=$row['hrg_pokok'];
    $hu +=$row['hrg_umum'];
    $hr +=$row['hrg_reseller']; 
    $stock +=$row['stock'];
    $total +=$tpb;
  
}
$pdf->Cell(0, 6, "",0,1, 'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 5, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(0, 3, "Persediaan = Total Pembelian per Barang x Total stock per Barang", 0, 1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 3,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
$pdf->SetFont('Arial','B',10);
    $pdf->Cell(52, 5, "Total Pembelian", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($hp).",-", 0, 1,'L');

    $pdf->Cell(52, 5, "Total Stock", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "$stock", 0, 1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 3,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
$pdf->SetFont('Arial','B',10);
    $pdf->Cell(52, 5, "Total Persediaan", 0, 0,'L');  
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($total).",-", 0, 1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 3,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');

	
$pdf->Output();
?>