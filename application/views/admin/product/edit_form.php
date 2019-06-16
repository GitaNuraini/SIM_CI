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

						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $product->id_barang?>" />

							<div class="form-group">
								<label for="nama_barang">Nama Barang</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Product name" value="<?php echo $product->nama_barang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="stock">Stock</label>
								<input class="form-control <?php echo form_error('stock') ? 'is-invalid':'' ?>"
								 type="number" name="stock" min="0" placeholder="stock" value="<?php echo $product->stock ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('stock') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="kategori">Kategori</label>
								<input class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>"
								 type="text" name="kategori" placeholder="satuan" value="<?php echo $product->id_kategori ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="satuan">Satuan</label>
								<input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
								 type="text" name="satuan" placeholder="satuan" value="<?php echo $product->id_satuan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('satuan') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="hrg_pokok">Harga Pokok(Rp)</label>
								<input class="form-control <?php echo form_error('hrg_pokok') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_pokok" placeholder="hrg_pokok" value="<?php echo $product->hrg_pokok ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_pokok') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="hrg_umum">Harga Umum(Rp)</label>
								<input class="form-control <?php echo form_error('hrg_umum') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_umum" placeholder="hrg_umum" value="<?php echo $product->hrg_umum ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_umum') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="hrg_reseller">Harga Reseller(Rp)</label>
								<input class="form-control <?php echo form_error('hrg_reseller') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_reseller" placeholder="hrg_reseller" value="<?php echo $product->hrg_reseller ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_reseller') ?>
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