<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>
    
<!--data master-->
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-th"></i>
            <span>Data Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">Data Barang</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Data Kasir</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kategori_controller') ?>">Data Kategori</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/satuan_controller') ?>">Data Satuan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/supplier_controller') ?>">Data Supplier</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/reseller_controller') ?>">Data Reseller</a>
        </div>
    </li>
 <!--transaksi-->
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-th"></i>
            <span>Penjualan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/penjualan_controller') ?>">Penjualan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/piutang_controller') ?>">Piutang</a>
        </div>
    </li>
<!--laporan--->
         <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-th"></i>
            <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">Laporan Barang</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Kasir</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Kategori</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Satuan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Supplier</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Reseller</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan Penjualan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kasir_controller') ?>">Laporan piutang</a>
        </div>
    </li>
    
</ul>