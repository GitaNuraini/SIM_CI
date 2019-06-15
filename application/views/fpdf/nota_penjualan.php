<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim");
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
error_reporting(0);
$pdf->AddPage();
$ip=$_GET['id_penjualan'];

if(isset($_GET['id_penjualan'])){
        $que = mysqli_query($koneksi,"SELECT nota_penjualan, tgl_jual FROM tmp_penjualan INNER JOIN penjualan ON tmp_penjualan.id_penjualan=penjualan.id_penjualan WHERE tmp_penjualan.id_penjualan='$ip' order by nota_penjualan DESC LIMIT 1");
} else{
    $que = mysqli_query($koneksi,"SELECT nota_penjualan, tgl_jual FROM tmp_penjualan INNER JOIN penjualan ON tmp_penjualan.id_penjualan=penjualan.id_penjualan order by nota_penjualan DESC LIMIT 1");
}
        $id=mysqli_query($koneksi,"Select id_penjualan from penjualan order by id_penjualan DESC LIMIT 1");
        $dat = mysqli_fetch_assoc($id);
        $lastIDp=$dat['id_penjualan'];
        while ($data1 = mysqli_fetch_assoc($que)){            
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,"FAKTUR PENJUALAN",0,0,'L');
$pdf->SetFont('Arial','B',10);
            
            
$pdf->Cell(20,5,"No. Nota",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$data1['nota_penjualan'],0,1,'L');
$pdf->Cell(115,5,"UD. SUMBER TELAGA",0,0,'L');
$pdf->SetFont('Arial','',10);
            
$pdf->Cell(20,5,"Tanggal",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$data1['tgl_jual'],0,1,'L');
            
$pdf->Cell(115,5,"JL. ARGOPURO 218 RAMBIGUNDAM-RAMBIPUJI-JEMBER",0,0,'L'); ;

}
if(isset($_GET['id_penjualan'])){
    $qqq=mysqli_query ($koneksi, "SELECT nama_reseller, alamat, kota, provinsi, kode_pos, telp FROM reseller WHERE id_reseller =(SELECT id_reseller FROM penjualan p WHERE p.id_penjualan = '$ip')");
}else{
        $qqq=mysqli_query ($koneksi, "SELECT nama_reseller, alamat, kota, provinsi, kode_pos, telp FROM reseller WHERE id_reseller =(SELECT id_reseller FROM penjualan p WHERE p.id_penjualan = '$lastIDp')");
}
    while ($dtt = mysqli_fetch_assoc($qqq)){
        
$pdf->Cell(20,5,"Pelanggan",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$dtt['nama_reseller'],0,1,'L');
        
$pdf->Cell(115,5,"Telp. 085336176533",0,0,'L');
        
$pdf->Cell(20,5,"Alamat",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$dtt['alamat'].", ".$dtt['kota'],0,1,'L');
$pdf->Cell(140,5,"Fax. -",0,0,'L');  
$pdf->Cell(65,5,"".$dtt['provinsi'],0,1,'L');
        
$pdf->Cell(115,5,"",0,0,'L');
        
$pdf->Cell(20,5,"Telpon",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$dtt['telp'],0,1,'L');
        
$pdf->Cell(115,5,"",0,0,'L');
        
$pdf->Cell(20,5,"Kode Pos",0,0,'L');
$pdf->Cell(5,5," : ",0,0,'L'); 
$pdf->Cell(40,5,"".$dtt['kode_pos'],0,1,'L');
    }
//SET LINE
$pdf->SetLineWidth(0);      
$pdf->Line(0,50,297,50);
$pdf->SetLineWidth(0);      
$pdf->Line(0,58,297,58);
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 8, 'No', 0, 0, 'L');
$pdf->Cell(65, 8,'Nama Barang',0,0, 'L');
$pdf->Cell(30, 8,'Jumlah',0,0, 'L');
$pdf->Cell(42, 8,'Harga (Rp)',0,0, 'L');
$pdf->Cell(42, 8,'Sub Total (Rp)',0,1, 'L');

$pdf->SetFont('Arial','',10);
$no=1;
if(isset($_GET['id_penjualan'])){
  $query = mysqli_query($koneksi,"SELECT * FROM penjualan p, detail_jual dj, data_barang db WHERE dj.id_barang=db.id_barang AND p.id_penjualan=dj.id_penjualan AND p.status!='belum' AND p.id_penjualan='$ip'");
} else{
      $query = mysqli_query($koneksi,"SELECT * FROM penjualan p, detail_jual dj, data_barang db WHERE dj.id_barang=db.id_barang AND p.id_penjualan=dj.id_penjualan AND p.status!='belum' AND p.id_penjualan='$lastIDp'");
}
    
    while ($data = mysqli_fetch_assoc($query)){
    $pdf->Cell(10, 8, $no , 0, 0, 'C');
	$pdf->Cell(65, 8, $data['nama_barang'],0,0, 'L');
    $pdf->Cell(30, 8, $data['jumlah'],0,0, 'L');
    $pdf->Cell(42, 8,  "".number_format($data['hrg_reseller'])."",0,0, 'L');
    $pdf->Cell(42, 8, "".number_format($data['total'])."",0,1, 'L');
        
    $t_barang +=$data['jumlah'];
   $no++; 
}
if(isset($_GET['id_penjualan'])){
$q = mysqli_query($koneksi,"SELECT total, bayar, kembali, status,tempo, kurang FROM penjualan INNER JOIN tmp_penjualan ON penjualan.id_penjualan=tmp_penjualan.id_penjualan  WHERE penjualan.id_penjualan='$ip' ORDER by penjualan.id_penjualan");
} else{
    $q = mysqli_query($koneksi,"SELECT total, bayar, kembali, status,tempo, kurang FROM penjualan INNER JOIN tmp_penjualan ON penjualan.id_penjualan=tmp_penjualan.id_penjualan ORDER by penjualan.id_penjualan DESC LIMIT 1");
}
$data2= mysqli_fetch_assoc($q);
$pdf->SetFont('Arial','',10);
    $pdf->Cell(0, 8, "----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1,'c');
	$pdf->Cell(75, 8, "Total Barang : ", 0, 0,'R');
    $pdf->Cell(30, 8, "".$t_barang, 0, 0,'L');
	$pdf->Cell(42, 8, "Total Belanja : Rp.", 0, 0,'R');
    $pdf->Cell(42, 8,  "".number_format($data2['total'])."",0,1, 'L');
	$pdf->Cell(20, 8, "Cara Bayar ", 0, 0,'L');
    $pdf->Cell(5, 8, " : ", 0, 0,'L');
    $pdf->Cell(50, 8,$data2['status'], 0, 0,'L');
    $pdf->Cell(72, 8, "Uang Bayar : Rp.", 0, 0,'R');
    $pdf->Cell(42, 8, "".number_format($data2['bayar'])."",0,1, 'L');
	$pdf->Cell(75, 8, "Jatuh Tempo : " .$data2['tempo'], 0, 0,'L');
    $pdf->Cell(72, 8, "Uang Kembali : Rp.", 0, 0,'R');
    $pdf->Cell(42, 8,  "".number_format($data2['kembali'])."",0,1, 'L');
    $pdf->Cell(147, 8, "Kekurangan : Rp.", 0, 0,'R');
    $pdf->Cell(42, 8,"".number_format($data2['kurang'])."",0,1, 'L');

$pdf->Cell(60, 20,"Mengetahui,",0,0, 'C');
$pdf->Cell(60, 20,"Dikirim Oleh,",0,0, 'C');
$pdf->Cell(60, 20,"Diterima Oleh,",0,1, 'C');

$pdf->Cell(61, 20,"(...................................)",0,0, 'C');
$pdf->Cell(61, 20,"(...................................)",0,0, 'C');
$pdf->Cell(61, 20,"(...................................)",0,1, 'C');

$pdf->Output();
?>