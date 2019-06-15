<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
error_reporting(0);
$pdf->AddPage();
          
$pdf->SetFont('Arial','B',12);
if ($_GET['versi']=="semua"){
$pdf->Cell(115,7,"LAPORAN PENJUALAN RESELLER",0,1,'L');
    }else{
$pdf->Cell(115,7,"Laporan Penjualan Reseler Bulan "."$_GET[versi]",0,1,'L');
}
            
$pdf->Cell(115,5,"UD. SUMBER TELAGA",0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(115,5,"JL. ARGOPURO 218 RAMBIGUNDAM-RAMBIPUJI-JEMBER",0,1,'L'); ;     
$pdf->Cell(115,5,"Telp. 085336176533",0,1,'L');
$pdf->Cell(115,5,"Fax. -",0,1,'L');
$pdf->Cell(115,5,"",0,1,'L');
$pdf->Cell(20,5,"Tanggal",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".date('d F Y'),0,1,'L');

//SET LINE
$pdf->SetLineWidth(0);      
$pdf->Line(0,50,297,50);
$pdf->SetLineWidth(0);      
$pdf->Line(0,58,297,58);
$pdf->ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 8, 'No', 0, 0, 'L');
$pdf->Cell(25, 8,'No. Nota',0,0, 'L');
$pdf->Cell(34, 8,'Tanggal Penjualan',0,0, 'L');
$pdf->Cell(35, 8,'Pelanggan',0,0, 'L');
$pdf->Cell(10, 8,'Qty',0,0, 'L');
$pdf->Cell(23, 8,'Total Belanja',0,0, 'L');
$pdf->Cell(22, 8,'Kekurangan',0,0, 'L');
$pdf->Cell(18, 8,'Status',0,0, 'L');
$pdf->Cell(30, 8,'Laba',0,1, 'L');

$pdf->SetFont('Arial','',10);
$no=1;
if ($_GET['versi']=="semua"){
  $query = mysqli_query($koneksi,"SELECT penjualan.id_penjualan, nota_penjualan, tgl_jual ,kurang, reseller.id_reseller, reseller.nama_reseller, penjualan.total, status, SUM(laba) as laba, SUM(jumlah) as jumlah 
    				FROM penjualan
                      INNER JOIN tmp_penjualan ON penjualan.id_penjualan=tmp_penjualan.id_penjualan 
                      INNER JOIN detail_jual dj ON dj.id_penjualan=penjualan.id_penjualan
                     INNER JOIN reseller ON reseller.id_reseller=penjualan.id_reseller 
                     GROUP BY penjualan.id_penjualan
                      ORDER by nota_penjualan ASC");
}else{
    $query = mysqli_query($koneksi,"SELECT penjualan.id_penjualan, nota_penjualan, tgl_jual , kurang, reseller.id_reseller, reseller.nama_reseller, penjualan.total, status, SUM(laba) as laba, SUM(jumlah) as jumlah 
    				FROM penjualan
                      INNER JOIN tmp_penjualan ON penjualan.id_penjualan=tmp_penjualan.id_penjualan 
                      INNER JOIN detail_jual dj ON dj.id_penjualan=penjualan.id_penjualan
                     INNER JOIN reseller ON reseller.id_reseller=penjualan.id_reseller WHERE tgl_jual LIKE '%$_GET[versi]%'
                     GROUP BY penjualan.id_penjualan
                      ORDER by nota_penjualan ASC");
}
    
    while ($data = mysqli_fetch_assoc($query)){
    $pdf->Cell(10, 7, $no , 0, 0, 'C');
	$pdf->Cell(25, 7, $data['nota_penjualan'],0,0, 'L');
    $pdf->Cell(34, 7, $data['tgl_jual'],0,0, 'L');
    $pdf->Cell(35, 7, $data['nama_reseller'],0,0, 'L'); 
    $pdf->Cell(10, 7, $data['jumlah'],0,0, 'L');
    $pdf->Cell(23, 7, "".number_format($data['total'])."",0,0, 'L');
    $pdf->Cell(22, 7, "".number_format($data['kurang'])."",0,0, 'L');
    $pdf->Cell(18, 7,  $data['status'],0,0, 'L');
    $pdf->Cell(30, 7, "".number_format($data['laba'])."",0,1, 'L');
    
 $laba +=$data['laba'];
    $p +=$data['total'];
    $k +=$data['kurang'];
    $q +=$data['jumlah'];
   $no++; 
}

$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 5, "----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(52, 5, "Total Stock Yang Keluar", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "$q", 0, 1,'L');

    $pdf->Cell(52, 5, "Total Belanja Seluruhnya", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($p).",-", 0, 1,'L');

    $pdf->Cell(52, 5, "Total Kekurangan Seluruhnya", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($k).",-", 0, 1,'L');

    $pdf->Cell(52, 5, "Total Laba Seluruhnya", 0, 0,'L');  
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($laba).",-", 0, 1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 5, "----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
$pdf->Output();
?>