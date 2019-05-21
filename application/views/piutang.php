<?php
error_reporting(0);
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"> 
 <h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Daftar Piutang Reseller</font></h1>
                
                    <a style="margin-bottom:10px" href="fpdf/laporan_piutang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                <tr>
                    <th>No</th>
                    <th>No. Nota</th>
                    <th>Tanggal Nota</th>
                    <th>Nama Reseller</th>
                    <th>Total Belanja</th>
                    <th>Kekurangan</th>
                    <th>Status</th>
                    <th>Tempo</th>
                    <th>Aksi</th>
                </tr>
                     
                        </thead>
                        <tbody>
                        <?php
                $no=0;
               
                      $query = mysqli_query($koneksi,"SELECT penjualan.id_penjualan, nota_penjualan, tgl_jual , reseller.id_reseller, reseller.nama_reseller, penjualan.total, status, kurang, tempo
    				FROM penjualan
                      INNER JOIN tmp_penjualan ON penjualan.id_penjualan=tmp_penjualan.id_penjualan 
                      INNER JOIN detail_jual dj ON dj.id_penjualan=penjualan.id_penjualan
                     INNER JOIN reseller ON reseller.id_reseller=penjualan.id_reseller 
                     WHERE status='kredit'
                     GROUP BY penjualan.id_penjualan
                      ORDER by nota_penjualan ASC");
                      
                  while ($data = mysqli_fetch_assoc($query)){
                    
                $no++; 
                  ?>
<tr>
                    <td><?php echo  $no;?></td>
                    <td><?php echo $data['nota_penjualan'];?></td>
                    <td><?php echo $data['tgl_jual'];?></td>
                    <td><?php echo $data['nama_reseller'];?></td>
                    <td><?php echo number_format($data['total'],0,",",".");?></td>
                    <td><?php echo number_format($data['kurang'],0,",",".");?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['tempo'];?></td>
                      <td>
                        <a href="angsuran_piutang.php?id_penjualan=<?php echo $data['id_penjualan'];?>" class="infodt btn btn-sm btn-danger"><i class="fa fa-info"></i> angsur</a>
                    </td>
                    </tr>
                            <?php
                      $tb +=$data['total'];
                      $k+=$data['kurang'];
                            ?>
                <?php } ?>
                      </tbody>
                        <tfoot>
                             <tr>
                                 <th colspan="3"></th>
                                 <th>Total :</th>
                                <th><?php echo number_format($tb,0,",",".");?></th>
                                <th><?php echo number_format($k,0,",",".");?></th>
                                 <th>0</th>
                                <th>0</th>
                                 <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 