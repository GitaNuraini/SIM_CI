<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
                        <font size="5px" color="dd4b39"><b>Transaksi Penjualan</b></font><br>
                        <!--cari barang-->
                            <label label class="col-sm-2 control-label"><a href="#" data-toggle="modal" data-target="#cari"> Nama Barang :</a></label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="cari barang" name="nama_barang" value="">
                            </div>
                          <!--cari reseller-->
                            <label label class="col-sm-2 control-label"><a href="#" data-toggle="modal" data-target="#cari"> Nama Reseller :</a></label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="cari Reseller" name="nama_reseller" value="">
                            </div>
                          <!--jumlah barang-->
                            <label label class="col-sm-2 control-label"><a href="#" data-toggle="modal" data-target="#cari"> Jumlah Barang :</a></label>
                            <div class="col-sm-6">
                            <input type="number" min="0" class="form-control" placeholder="0" name="jumlah" value="">
                            </div>
                        <br>
                        <div class="col-sm-2">
                        <input type="submit" value="tambah">
                        </div>
					</div>
				</div>
                
                
                <div class="card mb-3">
					<div class="card-body">
                        						<div class="table-responsive">
							<table class="table table-hover table-bordered mt-3">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
										<th>Harga (Rp)</th>
										<th>Sub Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									
									<tr>
                                        <td colspan="4" align="right"><b>Total Belanja(Rp)</b></td>
                                        <td></td>
                                        <td></td>
									</tr>
                                    
                                    <tr>
                                        <td colspan="4" align="right"><b>Uang Bayar(Rp)</b></td>
                                        <td><input class="form-control" requered type="text" name="bayar"></td>
                                        <td></td>
									</tr>
                                    
                                    <tr>
                                        <td colspan="4" align="right"><b>Jatuh Tempo</b></td>
                                        <td><input class="form-control" requered type="date" name="bayar"></td>
                                        <td><button type="submit" name="simpan" class="btn btn-block btn-danger">Simpan</button></td>
									</tr>
									

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
    
    <script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</body>

</html>