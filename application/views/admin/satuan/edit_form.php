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

						<a href="<?php echo site_url('admin/satuan_controller/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('admin/satuan_controller/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id_satuan" value="<?php echo $satuan->id_satuan?>" />

							<div class="form-group">
								<label for="name">Nama Satuan</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Product name" value="<?php echo $satuan->nama_satuan ?>" />
						<form action="<?php base_url('admin/satuan_cotroller/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $satuan->id_satuan?>" />

							<div class="form-group">
								<label for="name">Nama Satuan*</label>
								<input class="form-control <?php echo form_error('nama_satuan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_satuan" placeholder="Nama satuan" value="<?php echo $satuan->nama_satuan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_satuan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Keterangan</label>
								<input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 type="text" name="keterangan" placeholder="keterangan" value="<?php echo $satuan->keterangan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
								 type="number" name="keterangan" min="0" placeholder="keterangan" value="<?php echo $satuan->keterangan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
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