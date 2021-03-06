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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="name_barang" placeholder="nama barang" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>
                            
                            
				<div class="form-group">
				    <select class="form-control" name="kategori">
                    <option>---pilih kategori---</option>                    
                    <?php foreach($kategori as $row) :?>
                    <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
                    <?php endforeach; ?>
                        
                    </select>  
                        <div class="invalid-feedback">
				        <?php echo form_error('id_kategori') ?>
				        </div>
                </div>
                            
                            <div class="form-group">
								<select class="form-control" name="satuan">
                    <option>---pilih satuan---</option>                    
                    <?php foreach($satuan as $row) :?>
                    <option value="<?php echo $row->id_satuan ?>"><?php echo $row->nama_satuan ?></option>
                    <?php endforeach; ?>
                        
                    </select>  
                        <div class="invalid-feedback">
				        <?php echo form_error('id_kategori') ?>
				        </div>
							</div>
                            
                            <div class="form-group">
								<input class="form-control <?php echo form_error('hrg_pokok') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_pokok" placeholder="harga pokok" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_pokok') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<input class="form-control <?php echo form_error('hrg_umum') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_umum" placeholder="harga umum" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_umum') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<input class="form-control <?php echo form_error('hrg_reseller') ? 'is-invalid':'' ?>"
								 type="text" name="hrg_reseller" placeholder="harga reseller" />
								<div class="invalid-feedback">
									<?php echo form_error('hrg_reseller') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<input class="form-control <?php echo form_error('stock') ? 'is-invalid':'' ?>"
								 type="number" name="stock" min="0" placeholder="stock" />
								<div class="invalid-feedback">
									<?php echo form_error('stock') ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<input class="form-control <?php echo form_error('expired') ? 'is-invalid':'' ?>"
								 type="date" name="expired" min="0" placeholder="expired" />
								<div class="invalid-feedback">
									<?php echo form_error('expired') ?>
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