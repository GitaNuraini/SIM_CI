<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/overview') ?>">
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
            <span>Transaksi</span>
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
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller') ?>">Laporan Barang</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/kasir') ?>">Laporan Kasir</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/kategori') ?>">Laporan Kategori</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/satuan') ?>">Laporan Satuan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/supplier') ?>">Laporan Supplier</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/reseller') ?>">Laporan Reseller</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/penjualan') ?>">Laporan Penjualan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan_controller/piutang') ?>">Laporan piutang</a>
        </div>
    </li>
    
</ul>