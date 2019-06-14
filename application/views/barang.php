    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">            
        <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Barang</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="../assets/img/add_ss.PNG" data-toggle="modal" data-target="#addBrg"></td>
                <td width="65%">&nbsp;</td>
<!--                <td><a style="margin-bottom:10px" href="fpdf/lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a></td>-->
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>ID Barang</th><th>Nama Barang</th><th>Kategori</th>
                                <th>Hrg Pokok(Rp)</th><th>Hrg umum(Rp)</th><th>Hrg Reseller(Rp)</th>
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
                                <td><?php echo $data['id_barang'];?></td>
                                <td contenteditable='true'><?php echo $data['nama_barang'];?></td>
                                <td><?php echo $data['nama_kategori'];?></td>
                                <td><?php echo number_format($data['hrg_pokok'],0,",",".");?></td>
                                <td><?php echo number_format($data['hrg_umum'],0,",",".");?></td>
                                <td><?php echo number_format($data['hrg_reseller'],0,",",".");?></td>
                                <td><?php echo $data['stock']." ".$data['nama_satuan'];?></td>
                                <td><?php echo $data['expired'];?></td>
                                <td>
                                    <form name="hpsbarang" method="post" action="../proses/proses.php" role="form">
                                        <table>
                                            <tr>
                                                <td><a href="edit_barang.php?id_barang=<?php echo $data['id_barang'];?>" class="infodt btn btn-sm btn-warning"><i class="fa fa-info"></i></a></td>
                                                <td>&nbsp;</td>
                                                <td> <button value="<?php echo $data['id_barang'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpsbarang" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addBrg">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="../proses/proses.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Barang</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nm_barang" placeholder="nama barang">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kategori</label>
              <select name="kategori" class="form-control">
                  <?php
                    $tes = mysqli_query($koneksi,"SELECT * from data_kategori");
                    while($tabel = mysqli_fetch_array($tes)){
                ?>
                <option value="<?php echo $tabel['id_kategori'];?>"><?php echo $tabel['nama_kategori'];?></option><?php } ?>
              </select>
            </div>
              <div class="row">
              <div class="col-sm-4"><label>Harga Pokok</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_pokok" placeholder="harga pokok">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Umum</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_umum" placeholder="harga umum">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Reseller</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_resel" placeholder="harga reseller">
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="number" min="0" class="form-control" name="stok">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Satuan</label>
                      <select name="satuan" class="form-control">
                          <?php
                            $tes = mysqli_query($koneksi,"SELECT * from data_satuan");
                            while($tabel = mysqli_fetch_array($tes)){
                        ?>
                        <option value="<?php echo $tabel['id_satuan'];?>"><?php echo $tabel['nama_satuan'];?></option><?php } ?>
                      </select>
                    </div>
                </div>
       <div class="col-sm-4">
                    <label>Expired</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="expired" class="form-control pull-right" id="datepicker">
<!--                        <input type="date" name="expired" class="form-control pull-right" id="datepicker">-->
                    </div>
                </div>
              </div>
            
      </div>
      <div class="modal-footer">
                    <table>
                          <tr>
                              <td width="77%">&nbsp;</td>
                              <td><button type="button" class="btn btn-block btn-danger" data-dismiss="modal">&nbsp;Batal&nbsp;</button></td>
                              <td>&nbsp;</td>
                              <td><button type="submit" name="addbrg" class="btn btn-block btn-primary">TAMBAH</button></td>
                          </tr>
                </table>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- DataTables -->
<!--
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
-->
