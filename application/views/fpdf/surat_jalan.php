<?php
$connect = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
//$pdf->SetFont('Arial','B',12);
//// mencetak string
//$pdf->Cell(40,7,'UD. SUMBER TELAGA',0,1,'L');
$pdf->SetFont('Arial','',12);
// mencetak string 
//kop surat
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,"SURAT JALAN",0,0,'L');

$pdf->Cell(20,5,"No. Surat",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L');
$pdf->Cell(20,5,"SJ".date("ymd"),0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,"UD. SUMBER TELAGA",0,0,'L');
$pdf->SetFont('Arial','',10);

$pdf->Cell(20,5,"Tanggal",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L');
$pdf->Cell(20,5,"".date('d F Y'),0,1,'L');
     
$pdf->Cell(115,5,"JL. ARGOPURO 218 RAMBIGUNDAM-RAMBIPUJI-JEMBER",0,0,'L');
$pdf->Cell(20,5,"Pelanggan",0,0,'L');
$pdf->Cell(5,5," : ",0,1,'L');

$pdf->Cell(115,5,"Telp. 085336176533",0,0,'L');
$pdf->Cell(20,15,"Alamat",0,0,'L');
$pdf->Cell(5,15," : ",0,1,'L');

$pdf->Cell(115,5,"Fax. -",0,0,'L');
$pdf->Cell(20,5,"Telepon",0,0,'L');
$pdf->Cell(5,5," : ",0,1,'L');


$pdf->Cell(115,5,"",0,0,'L');
$pdf->Cell(20,5,"Kode pos",0,0,'L');
$pdf->Cell(5,5," : ",0,1,'L');
//akhir kop
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15, 8,'NO', 1, 0, 'C');
$pdf->Cell(90, 8,'NAMA BARANG',1,0, 'C');
$pdf->Cell(20, 8,'JUMLAH',1,0, 'C');
$pdf->Cell(34, 8,'HARGA',1,0, 'C');
$pdf->Cell(34, 8,'SUB TOTAL',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->Cell(15, 8,'', 1, 0, 'C');
$pdf->Cell(90, 8,'',1,0, 'C');
$pdf->Cell(20, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,0, 'C');
$pdf->Cell(34, 8,'',1,1, 'C');
$pdf->SetFont('Arial','',12);
$no=1;

$pdf->Cell(297, 8,"",0,1, 'L');
$pdf->Cell(297, 8,"Catatan : ",0,1, 'L');

$pdf->Cell(297, 8,"",0,1, 'L');

$pdf->Cell(60, 50,"Mengetahui,",0,0, 'C');
$pdf->Cell(60, 50,"Dikirim Oleh,",0,0, 'C');
$pdf->Cell(60, 50,"Diterima Oleh,",0,1, 'C');

$pdf->Cell(61, 10,"(...................................)",0,0, 'C');
$pdf->Cell(61, 10,"(...................................)",0,0, 'C');
$pdf->Cell(61, 10,"(...................................)",0,1, 'C');

$pdf->Output();
?>