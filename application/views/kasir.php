<!-- DataTables -->
<!--<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->
<!--

<section class="content-header">
    <h1><b>Master Barang</b></h1>
</section>
-->
    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
<!--                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrg">Tambah Barang</button>-->
                    
        <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Kasir</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="../assets/img/add_ss.PNG" data-toggle="modal" data-target="#add"></td>
                <td width="62%">&nbsp;</td>
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/laporan_kasir.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>ID Kasir</th><th>Nama Kasir</th><th>Alamat</th><th>Telp</th><th>Posisi</th><th>Username</th><th>Password</th><th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                $query=mysqli_query($koneksi,"SELECT * FROM kasir"); 
                                while ($data = mysqli_fetch_assoc($query)){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data['id_kasir'];?></td>
                                <td contenteditable='true'><?php echo $data['nama_kasir'];?></td>
                                <td><?php echo $data['alamat'];?></td>
                                <td><?php echo $data['telp'];?></td>
                                <td><?php echo $data['posisi'];?></td>
                                <td><?php echo $data['username'];?></td>
                                <td><input type="password" value="<?php echo $data['password'];?>" disabled></td>
                                </td>
                                <td>
                                    <form name="hpskasir" method="post" action="../proses/proses_kasir.php" role="form">
                                        <table>
                                            <tr>
                                                <td><a href="edit_kasir.php?id_kasir=<?php echo $data['id_kasir'];?>" class="infodt btn btn-sm btn-warning"><i class="fa fa-info"></i></a></td>
                                                <td>&nbsp;</td>
                                                <td> <button value="<?php echo $data['id_kasir'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpskasir" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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

<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="../proses/proses_kasir.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Kasir</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Kasir</label>
              <input type="text" class="form-control" name="nama_kasir" placeholder="nama kasir">
            </div>
          <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="alamat">
            </div>
          <div class="form-group">
              <label>Telp</label>
              <input type="number" class="form-control" name="telp" placeholder="telp">
            </div>
          <div class="form-group">
              <label>Posisi</label>
              <select name="posisi" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="kasir">Kasir</option>
              </select>
            </div>
          <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="username">
            </div>
          <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" name="password" placeholder="password">
            </div>
            
      </div>
      <div class="modal-footer">
                    <table>
                          <tr>
                              <td width="77%">&nbsp;</td>
                              <td><button type="button" class="btn btn-block btn-danger" data-dismiss="modal">&nbsp;Batal&nbsp;</button></td>
                              <td>&nbsp;</td>
                              <td><button type="submit" name="add" class="btn btn-block btn-primary">TAMBAH</button></td>
                          </tr>
                </table>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="../proses/proses_kasir.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Kasir</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Kasir</label>
              <input type="text" class="form-control" name="nama_kasir" id="nama_kasir">
              <input type="text" class="form-control" name="id_kasir" id="id_kasir">
            </div>
          <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Alamat</label>
                  <input type="text" class="form-control"  name="alamat" placeholder="Alamat"></div>
                  
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Telp</label>
                  <input class="form-control" requered type="text" name="telp" placeholder="Telp"></div>
            
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Username</label>
                  <input class="form-control" requered type="text" name="usename" placeholder="Username"></div>
                  
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Password</label>
                  <input class="form-control" requered type="text" name="password" placeholder="Password"></div>
                  
                 
                  
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
      </div>
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
