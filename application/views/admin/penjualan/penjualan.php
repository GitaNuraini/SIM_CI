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
                            penjualan
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