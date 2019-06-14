<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">            
        <table>
            <tr>
                <td><h1 class="box-title"><font size="6px" face="impact" color="#3c8dbc">Data Barang</font></h1></td>
                <td width="2%">&nbsp;</td>
                <td><img src="<?php echo base_url('assets/images/add_ss.PNG');?>" alt=""></td>
                <td width="65%">&nbsp;</td>
            </tr>
        </table>
                    <a style="margin-bottom:10px" href="fpdf/lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                       <thead>
									<tr>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
										<th>Satuan</th>
										<th>Hrg Pokok(Rp)</th>
										<th>Hrg Umum(Rp)</th>
										<th>Hrg Reseller(Rp)</th>
										<th>Stock</th>
										<th>Expired</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($barang as $data): ?>
									<tr>
										<td width="150"><?php echo $data->Nama_barang ?></td>
										<td><?php echo $data->Id_kategori ?></td>
										<td><?php echo $data->Id_satuan ?></td>
										<td><?php echo $data->Hrg_pokok ?></td>
										<td><?php echo $data->Hrg_umum ?></td>
										<td><?php echo $data->Hrg_reseller ?></td>
										<td><?php echo $data->Stock ?></td>
                                        <td><?php echo $data->Expired ?></td>
                                        <td width="250">
											<a href="<?php echo site_url('form/edit_barang'.$data_barang->id_barang) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('delete'.$data_barang->id_barang) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>