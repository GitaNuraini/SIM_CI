<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
error_reporting(0);
$pdf->AddPage();
          
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,"DAFTAR HUTANG",0,1,'L');
$pdf->SetFont('Arial','B',10);
            
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
$pdf->Cell(30, 8,'Tanggal Nota',0,0, 'L');
$pdf->Cell(35, 8,'Nama Supplier',0,0, 'L');
$pdf->Cell(25, 8,'Total Belanja',0,0, 'L');
$pdf->Cell(25, 8,'Kekurangan',0,0, 'L');
$pdf->Cell(20, 8,'Status',0,0, 'L');
$pdf->Cell(30, 8,'Tempo',0,1, 'L');

$pdf->SetFont('Arial','',10);
$no=1;
  $query = mysqli_query($koneksi,"SELECT pembelian.id_pembelian, nota_beli, tgl_nota, supplier.id_supplier, supplier.nama_supplier, pembelian.all_total, status, kurang, tempo
    				FROM pembelian
                      INNER JOIN tmp_pembelian ON pembelian.id_pembelian=tmp_pembelian.id_pembelian
                      INNER JOIN detail_pembelian dj ON dj.id_pembelian=pembelian.id_pembelian
                     INNER JOIN supplier ON supplier.id_supplier=pembelian.id_supplier
                     WHERE status='kredit'
                     GROUP BY pembelian.id_pembelian
                      ORDER by tgl_nota ASC");
    
    while ($data = mysqli_fetch_assoc($query)){
    $pdf->Cell(10, 7, $no , 0, 0, 'C');
	$pdf->Cell(25, 7, $data['nota_beli'],0,0, 'L');
    $pdf->Cell(30, 7, $data['tgl_nota'],0,0, 'L');
    $pdf->Cell(35, 7, $data['nama_supplier'],0,0, 'L');
    $pdf->Cell(25, 7, "".number_format($data['all_total'])."",0,0, 'L');
    $pdf->Cell(25, 7, "".number_format($data['kurang'])."",0,0, 'L');
    $pdf->Cell(20, 7,  $data['status'],0,0, 'L');
    $pdf->Cell(30, 7, $data['tempo'],0,1, 'L');
        
    $kurang +=$data['kurang'];
    $tb +=$data['all_total'];
   $no++; 
}

$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 5, "----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(52, 5, "Total Belanja Seluruhnya", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($tb).",-", 0, 1,'L');

    $pdf->Cell(52, 5, "Total Kekurangan Seluruhnya", 0, 0,'L');
    $pdf->Cell(3, 5, ":", 0, 0,'R');
    $pdf->Cell(100, 5, "Rp. ".number_format($kurang).",-", 0, 1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 5, "----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
	
$pdf->Output();
?>