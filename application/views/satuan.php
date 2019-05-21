<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"> 
 <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Satuan</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="../assets/img/add_ss.PNG" data-toggle="modal" data-target="#add"></td>
                <td width="65%">&nbsp;</td>
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/lap_satuan.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                    <th>No</th>
                    <th>ID Satuan</th>
                    <th>Nama Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                $no=0;
               
                      $query = mysqli_query($koneksi,"SELECT * FROM `data_satuan` ORDER BY nama_satuan ASC");
                      
                  while ($data = mysqli_fetch_assoc($query)){
                    
                $no++; 
                  ?>
            <tr>
                <td><?php echo  $no;?></php></td>
                <td><?php echo $data['id_satuan'];?></td>
                <td><?php echo $data['nama_satuan'];?></td>
                <td><?php echo $data['keterangan'];?></td>
                <td>
                    <form name="hpssatuan" method="post" action="../proses/proses_satuan.php" role="form">
                        <table>
                            <tr>
                                <td><a href="edit_satuan.php?id_satuan=<?php echo $data['id_satuan'];?>" class="infodt btn btn-sm btn-warning"><i class="fa fa-info"></i></a></td>
                                <td>&nbsp;</td>
                                <td> <button value="<?php echo $data['id_satuan'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpssatuan" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
      <!--pop up / modal for add-->
      <div class="modal" id="add">
               <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <a href="satuan.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Satuan</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="../proses/proses_satuan.php" class="form-horizontal" name="input_satuan">
                
              <div class="form-group">
                  <label for="id" class="col-sm-3 control-label">ID Satuan</label>
                  <div class="col-sm-9">
                       <?php
                
                $qr = "SELECT max(id_satuan) as maxId FROM data_satuan";
                $hasil = mysqli_query($koneksi,$qr);
                $d  = mysqli_fetch_array($hasil);
                $id_satuan = $d['maxId'];
                $noUrut = (int) substr($id_satuan, 2, 3);
                $noUrut++;
                $char = "ST";
                $newID = $char . sprintf("%03s", $noUrut);
                      
                ?>
                  <input  class="form-control" requered type="text" name="id_satuan" value="<?php echo $newID;?>" placeholder="ID Satuan"></div>
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Nama Satuan</label>
                  <div class="col-sm-9">
                  <input class="form-control" requered placeholder="Nama Satuan" type="text" name="nama_satuan"></div>
                  
            </div>
                        <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-9">
                  <input class="form-control" requered placeholder="Keterangan" type="text" name="keterangan"></div>
                  
            </div>
                  </div>
                  <div class="modal-footer">
                      <table>
                          <tr>
                              <td width="75%">&nbsp;</td>
                              <td width="7%"> &nbsp;</td>
                              <td><a href="satuan.php"><button type="button" class="btn btn-block btn-danger" data-dismiss="modal">BATAL</button></a></td>
                              <td>&nbsp;</td>
                              <td><button type="submit" name="tambah_satuan" class="btn btn-block btn-primary">TAMBAH</button></td>
                          </tr>
                      </table>
                  </div>
                     </form>
                </div>
              </div>
      </div>