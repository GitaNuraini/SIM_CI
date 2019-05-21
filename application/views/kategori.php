<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"> 
 <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Kategori</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="../assets/img/add_ss.PNG" data-toggle="modal" data-target="#add"></td>
                <td width="65%">&nbsp;</td>
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/lap_kategori.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
                        </thead>
                        <tbody>
                      <?php
                $no=0;
               
                      $query = mysqli_query($koneksi,"SELECT * FROM `data_kategori` ORDER BY nama_kategori ASC");
                      
                  while ($data = mysqli_fetch_assoc($query)){
                    
                $no++; 
                  ?>
           <tr>
                    <td><?php echo  $no;?></php></td>
                  <td><?php echo $data['id_kategori'];?></td>
                        <td><?php echo $data['nama_kategori'];?></td>
                  
                      <td>
                          <form name="hpskategori" method="post" action="../proses/proses_kategori.php" role="form">
                           <table>
                                            <tr>
         <td><a href="edit_kategori.php?id_kategori=<?php echo $data['id_kategori'];?>" class="infodt btn btn-sm btn-warning"><i class="fa fa-info"></i></a></td>
        <td>&nbsp;</td>
            <td> <button value="<?php echo $data['id_kategori'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpskategori" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
                    <a href="kategori.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Kategori</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="../proses/proses_kategori.php" class="form-horizontal" name="input_kategori">
                
              <div class="form-group">
                  <label for="id" class="col-sm-3 control-label">ID Kategori</label>
                  <div class="col-sm-9">
                       <?php
                
                $qr = "SELECT max(id_kategori) as maxId FROM data_kategori";
                $hasil = mysqli_query($koneksi,$qr);
                $d  = mysqli_fetch_array($hasil);
                $id_kategori = $d['maxId'];
                $noUrut = (int) substr($id_kategori, 2, 3);
                $noUrut++;
                $char = "KT";
                $newID = $char . sprintf("%03s", $noUrut);
                      
                ?>
                  <input  class="form-control" requered type="text" name="id_kategori" value="<?php echo $newID;?>" placeholder="ID Kategori"></div>
            </div>
            <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Nama Kategori</label>
                  <div class="col-sm-9">
                  <input class="form-control" requered placeholder="Nama Kategori" type="text" name="nama_kategori"></div>
                  
            </div>
                  </div>
                  <div class="modal-footer">
                      <table>
                          <tr>
                              <td width="75%">&nbsp;</td>
                              <td width="7%"> &nbsp;</td>
                              <td><a href="kategori.php"><button type="button" class="btn btn-block btn-danger" data-dismiss="modal">BATAL</button></a></td>
                              <td>&nbsp;</td>
                              <td><button type="submit" name="add" class="btn btn-block btn-primary">TAMBAH</button></td>
                          </tr>
                      </table>
                  </div>
                     </form>
                </div>
              </div>
              </div>
      </div>