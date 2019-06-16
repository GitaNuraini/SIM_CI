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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/reseller_controller/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/reseller_controller/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $reseller->id_reseller?>" />

							<div class="form-group">
								<label for="name">Nama Reseller*</label>
								<input class="form-control <?php echo form_error('nama_reseller') ? 'is-invalid':'' ?>"
								 type="text" name="nama_reseller" placeholder="Product Nama Reseller" value="<?php echo $reseller->nama_reseller ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_reseller') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat" value="<?php echo $reseller->alamat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="price">Kota</label>
								<input class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>"
								 type="text" name="kota" min="0" placeholder="Kota" value="<?php echo $reseller->kota ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kota') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Provinsi</label>
								<input class="form-control <?php echo form_error('provinsi') ? 'is-invalid':'' ?>"
								 type="text" name="provinsi" min="0" placeholder="Provinsi" value="<?php echo $reseller->provinsi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('provinsi') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="price">Kode Pos</label>
								<input class="form-control <?php echo form_error('kode_pos') ? 'is-invalid':'' ?>"
								 type="text" name="kode_pos" min="0" placeholder="Kode Pos" value="<?php echo $reseller->kode_pos ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_pos') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="price">Telp</label>
								<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>"
								 type="number" name="telp" min="0" placeholder="Telp" value="<?php echo $reseller->telp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('telp') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>