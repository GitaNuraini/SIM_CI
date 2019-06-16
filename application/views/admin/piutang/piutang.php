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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
				    <div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No Nota</th>
                                        <th>Tgl Nota</th>
                                        <th>Reseller</th>
                                        <th>Total Belanja</th>
										<th>Kekurangan</th>
										<th>Status</th>
										<th>Tempo</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($join3 as $row): ?>
									<tr>
										<td width="150">
											<?php echo $row->nota_penjualan ?>
										</td>
										<td>
											<?php echo $row->tgl_jual ?>
										</td>
                                        <td>
											<?php echo $row->nama_reseller ?>
										</td>
                                        <td>
											<?php echo $row->id_satuan ?>
										</td>
                                        <td>
											<?php echo $row->hrg_pokok ?>
										</td>
										<td>
											<?php echo $row->hrg_umum ?>
										</td>
										<td class="small">
											<?php echo $row->hrg_reseller ?></td>
										<td width="250">
											<a href="<?php echo site_url('admin/products/edit/'.$row->id_barang) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$row->id_barang) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

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