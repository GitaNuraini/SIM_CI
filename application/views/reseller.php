    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    
        <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Reseller</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="../assets/img/add_ss.PNG" data-toggle="modal" data-target="#add"></td>
                <td width="55%">&nbsp;</td>
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/laporan_reseller.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>ID Reseller</th><th>Nama Reseller</th><th>Alamat</th><th>Kota</th><th>Provinsi</th><th>Kode Pos</th><th>Telp</th><th>Aksi</th>
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
                                <td><?php echo $data['id_reseller'];?></td>
                                <td contenteditable='true'><?php echo $data['nama_reseller'];?></td>
                                <td><?php echo $data['alamat'];?></td>
                                <td><?php echo $data['kota'];?></td>
                                <td><?php echo $data['provinsi'];?></td>
                                <td><?php echo $data['kode_pos'];?></td>
                                <td><?php echo $data['telp'];?></td>
                                </td>
                                <td>
                                    <form name="hpsreseller" method="post" action="../proses/proses_reseller.php" role="form">
                                        <table>
                                            <tr>
                                                <td><a href="edit_reseller.php?id_reseller=<?php echo $data['id_reseller'];?>" class="infodt btn btn-sm btn-warning"><i class="fa fa-info"></i></a></td>
                                                <td>&nbsp;</td>
                                                <td> <button value="<?php echo $data['id_reseller'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpsreseller" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
        <form role="form" method="post" action="../proses/proses_reseller.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Reseller</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Reselller</label>
              <input type="text" class="form-control" name="nama_reseller" placeholder="nama reseller">
            </div>
          <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="alamat">
            </div>
          <div class="form-group">
              <label>Kota</label>
              <input type="text" class="form-control" name="kota" placeholder="kota">
            </div>
          <div class="form-group">
              <label>Provinsi</label>
              <input type="text" class="form-control" name="provinsi" placeholder="provinsi">
            </div>
          <div class="form-group">
              <label>Kode Pos</label>
              <input type="number" class="form-control" name="kode_pos" placeholder="kode pos">
            </div>
            <div class="form-group">
              <label>Telp</label>
              <input type="number" class="form-control" name="telp" placeholder="telp">
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
        <form role="form" method="post" action="../proses/proses_reseller.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Reseller</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Reseller</label>
              <input type="text" class="form-control" name="nama_reseller" id="nama_reseller">
              <input type="text" class="form-control" name="id_reseller" id="id_reseller">
            </div>
          <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Alamat</label>
                  <input type="text" class="form-control"  name="alamat" placeholder="Alamat"></div>
                  
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Kota</label>
                  <input class="form-control" requered type="text" name="kota" placeholder="Kota"></div>
                  
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Provinsi</label>
                  <input class="form-control" requered type="text" name="provinsi" placeholder="Provinsi"></div>
                  
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Kode Pos</label>
                  <input class="form-control" requered type="text" name="kode_pos" placeholder="Kode Pos"></div>
                 <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Telp</label>
                  <input class="form-control" requered type="text" name="telp" placeholder="Telp"></div>
                  
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
