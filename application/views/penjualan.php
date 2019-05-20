<?php
//include ('../assets/konek.php');
error_reporting(0);
?>
<script src="../assets/jquery-3.1.1.min.js" type="text/javascript"></script>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
<!--                        <div class="box">-->
                        <div class="box-header">
                          <table>
                              <tr>
                                  <td><font size="5px" color="dd4b39">&nbsp; <b><u>PENJUALAN RESELER</u></b></font></td>
                                  <td width="10%">&nbsp;</td>
                                  <td>
                                      <a href="./index.php?index=<?php echo md5("penjualan");?>"><font size="3px"><b><u>PENJUALAN RESELLER</u></b></font></a>
                                  </td>
                                  <td>&nbsp;<b>||</b>&nbsp;</td>
                                  <td><a href="./index.php?index=<?php echo md5("umum");?>"><font size="3px"><b><u>PENJUALAN UMUM</u></b></font></a></td>
                                  <td>&nbsp;<b>||</b>&nbsp;</td>
                                  <td><a href="./index.php?index=<?php echo md5("retur_penjualan");?>"><font size="3px"><b><u>RETUR PENJUALAN</u></b></font></a></td>

                              </tr>
                          </table>
                          <hr width="100%">
                        </div>
                    <form action="../proses/proses_penjualan.php" method="post" class="form-horizontal" name="input_penjualan" id="tr_jual"> 
            <div class="form-group">
                <!--reseller-->
<!--
                <label label class="col-sm-2 control-label"><a href="cari_reseller.php"> Cari Reseller</a></label>
                <div class="col-sm-2">
                    <?php
                      $id=$_GET['id_reseller'];
                      if($id == ''){
                       ?>
                    <input type="text" class="form-control" placeholder="nama reseller" name="nama_reseller" value="">
                    <?php
                      } else {
                      $rs = mysqli_query($koneksi,"SELECT * FROM reseller WHERE id_reseller='$id' LIMIT 1");
                      while ($data1 = mysqli_fetch_assoc($rs)){
                      ?>
                    <input type="hidden" name="id_reseller" value="<?php echo $id;?>">
                    <input class="form-control" placeholder="Reseller" value="<?php echo $data1['nama_reseller'];?>" type="text" name="nama_reseller">
                      <?php }} ?>
                </div>
-->
                <!--barang-->
                <label label class="col-sm-2 control-label"><a href="#" data-toggle="modal" data-target="#cari"> Cari Barang</a></label>
                <div class="col-sm-2">
                    <?php
                      $id_barang=$_GET['id_barang'];
                      if($id_barang == ''){
                       ?>
                    <input type="text" class="form-control" placeholder="nama barang" name="nama_barang" value="">
                    <?php
                      } else {
                      $hay = mysqli_query($koneksi,"SELECT * FROM data_barang WHERE id_barang='$id_barang' LIMIT 1");
                      while ($data = mysqli_fetch_assoc($hay)){
                      ?>
                    <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
                    <input class="form-control" placeholder="cari barang" value="<?php echo $data['nama_barang'];?>" type="text" name="nama_barang">
                      <?php }} ?>
                </div>
                <!--reseller-->
                 <label label class="col-sm-1 control-label">Reseller</label>
                <div class="col-sm-2"> 
                <select name="id_reseller" class="form-control">
                  <?php
                    $rs = mysqli_query($koneksi,"SELECT * from reseller");
                    while($tb = mysqli_fetch_array($rs)){
                ?>
                <option value="<?php echo $tb['id_reseller'];?>"><?php echo $tb['nama_reseller'];?></option><?php } ?>
                </select>
                </div>
                    <!--jumlah-->
                    <label class="col-sm-1 control-label">Jumlah:</label>
                    <div class="col-sm-2">
                    <input class="form-control" placeholder="0" min="0" type="number" name="jumlah">
                    </div>
                <input type="submit" name="tambah_daftar" value="Tambah">
            </div>
            
              </form>
                    
                </div>
            </div>
        </section>
        </div>
    </div>
    
    <!--daftar barang-->
    <div class="col-xs-12"><div class="box">
        <section class="content">
            <div class="row">
                <div class="col-xs-12"> 
                    <!--panel form-->
                    <div class="panel panel-primary" id="tambah">
                        <div class="panel-heading">
                            DAFTAR BARANG
                        </div>
                        
                        <div class="panel-body">
                            <table class="table table-hover table-bordered mt-3">
                                <thead>
                                    <tr id="rowtop">
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga (Rp)</th>
                                        <th>Subtotal (Rp)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                $q = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE status='belum'");
                                if(mysqli_num_rows($q)==0){
                                echo "";
                            } else { 
                $no=0;
                                    $query = mysqli_query($koneksi,"SELECT * FROM penjualan p, detail_jual dj, data_barang db, reseller r WHERE dj.id_barang=db.id_barang AND p.id_penjualan=dj.id_penjualan AND  p.id_reseller=r.id_reseller AND p.status='belum'");
                                    
                  while ($data = mysqli_fetch_assoc($query)){
               
                $no++;
                       
                                ?>
                                 <tbody>
                                    <tr>
                                        <td><?php echo  $no;?></td>
                                        <td><?php echo $data['nama_barang'];?></td>
                                        <td align="right"><?php echo $data['jumlah'];?></td>
                                        <td align="right"><?php echo number_format($data['hrg_reseller'],0,",",".");?></td>
                                        <td align="right"><?php echo number_format($data['total'],0,",",".");?></td>
                                        <td>
                                            <form name="hps" method="post" action="../proses/proses_penjualan.php" role="form">
                                            <input type="hidden" value="<?php echo $data['id_barang'];?>" name="id_barang">
                                            <input type="hidden" value="<?php echo $data['id_penjualan'];?>" name="id_penjualan">
                                            <button onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hps" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $total +=$data['total'];
                                    ?>
                                    <?php } ?>
                                      <?php
                    $p=  mysqli_query ($koneksi, "SELECT * FROM penjualan ORDER by id_penjualan DESC LIMIT 1")or die (mysqli_error($koneksi));
                    $data=mysqli_fetch_array($p);
                                }
                    ?>
                                
                    <tr>
                        <td colspan="4" align="right"><b>Total Belanja (Rp):</b></td>
                        <td align="right"><?php echo number_format($total,0,",",".");?></td>
                        <td>&nbsp;</td>
                    </tr> 
                                     <div id="bayar">
                                         <form method="post" action="../proses/proses_bayar.php" class="form-horizontal" name="input_bayar">
                                            <tr>
                                                <td colspan="4" align="right"><b>Uang Bayar (Rp):</b></td>
                                                <td><input class="form-control" requered type="text" name="bayar"></td>
<!--                                            <input requered type="hidden" name="metode" value="lunas">           -->
                                        <input class="form-control" requered placeholder="0" id="total" type="hidden" name="total" value="<?php echo $total;?>">       
                                    <input class="form-control" requered  id="penjualan" type="hidden" name="id_penjualan" value="<?php echo $data['id_penjualan'];?>"> 
                                                <td>&nbsp;</td>
                                            </tr>
<!--                                     </div>-->
                                </tbody>
                            </table>
                    <div class="panel-footer">
                    <table>
                        <tr>
                            <td width="90%" bgcolor="white">
                                    <div class="form-group">
                                    <label label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-4"> 
                                    </div>
                                    <label label class="col-sm-2 control-label">Jatuh Tempo :</label>
                                    <div class="col-sm-4"> 
                                     <input class="form-control" type="date" name="tempo">
                                    </div>
                                    </div>
                                <input type="hidden" name="status">
                            </td>
                            <td bgcolor="white">
                                <button type="submit" name="simpan" class="btn btn-block btn-danger">Simpan Transaksi</button>
                            </td>
                          </tr>
                        </table>
                    </div>
                        </form>
                            </div>
                            </div>
                        </div>
                   
                        <!--last panel form-->
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
</section>

<!--cari barang-->
      <div class="modal" id="cari">
               <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <a href="../home/index.php?index=<?php echo md5('penjualan')?>"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
                    <h4 class="modal-title" id="myModalLabel">DAFTAR BARANG</h4>
                  </div>
                  <div class="modal-body">
            
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>Nama Barang</th>
                                <th>Hrg Reseller(Rp)</th>
                                <th>Stock</th><th>Expired</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                            
                                $query=mysqli_query($koneksi,"SELECT * FROM data_barang db, data_kategori dk, data_satuan ds WHERE db.id_kategori=dk.id_kategori AND db.id_satuan=ds.id_satuan ORDER BY nama_barang ASC"); 
                                while ($data = mysqli_fetch_assoc($query)){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td contenteditable='true'><?php echo $data['nama_barang'];?></td>
                                <td><?php echo number_format($data['hrg_reseller'],0,",",".");?></td>
                                <td><?php echo $data['stock']." ".$data['nama_satuan'];?></td>
                                <td><?php echo $data['expired'];?></td>
                                <td>
                                    <a href="./index.php?id_barang=<?php echo $data['id_barang'];?>&&index=<?php echo md5("penjualan");?>">pilih</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                        </div>
                </div>
            </div>
        </div>
      </div>

<!--cari reseller-->
<!--
      <div class="modal" id="rs">
               <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <a href="../home/index.php?index=<?php echo md5('penjualan')?>"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
                    <h4 class="modal-title" id="myModalLabel">DAFTAR RESELLER</h4>
                  </div>
                  <div class="modal-body">
            
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>Nama Reseller</th><th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php
                                $no = 0;
                                $query=mysqli_query($koneksi,"SELECT * FROM reseller"); 
                                while ($data = mysqli_fetch_assoc($query)){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td contenteditable='true'><?php echo $data['nama_reseller'];?></td>
                                <td>
                                   <a href="./index.php?id_reseller=<?php echo $data['id_reseller'];?>&&index=<?php echo md5("penjualan");?>">pilih</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                        </div>
                </div>
            </div>
        </div>
      </div>

-->

<script type="text/javascript">
              $(document).ready(function(){
                  $(".tes").click(function(event){
                      $("#penjualan").val($(this).attr("id_penjualan"));
                      $("#total").val($(this).attr("total"));
                  })
              })
</script>