<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WEB CI _ SIM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link  href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Font Awesome -->
<link  href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <!-- Ionicons -->
<link  href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>" rel="stylesheet">
  <!-- Theme style -->
<link  href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>" rel="stylesheet">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link  href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css')?>" rel="stylesheet">
  <!-- Morris chart -->
<link  href="<?php echo base_url('assets/bower_components/morris.js/morris.css')?>" rel="stylesheet">
  <!-- jvectormap -->
<link  href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css')?>" rel="stylesheet">
  <!-- Date Picker -->
<link  href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>" rel="stylesheet">
  <!-- Daterange picker -->
<link  href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet">
  <!-- bootstrap wysihtml5 - text editor -->
<link  href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
<link  href="<?php echo base_url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')?>" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('index2.html')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SUMBER TELAGA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-th"></i><span><font size="4pt">HOME</font></span></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Master</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('asset/pages/layout/top-nav.html')?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
            <li><a href="<?php echo base_url ('assets/pages/layout/boxed.html')?>"><i class="fa fa-circle-o"></i> Data Kasir</a></li>
            <li><a href="<?php echo base_url ('assets/pages/layout/boxed.html')?>"><i class="fa fa-circle-o"></i> Data Kategori</a></li>
            <li><a href="<?php echo base_url ('assets/pages/layout/boxed.html')?>"><i class="fa fa-circle-o"></i> Data Satuan</a></li>
            <li><a href="<?php echo base_url ('assets/pages/layout/boxed.html')?>"><i class="fa fa-circle-o"></i> Data Supplier</a></li>
            <li><a href="<?php echo base_url ('assets/pages/layout/boxed.html')?>"><i class="fa fa-circle-o"></i> Data Reseller</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Transaksi</span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/sim/penjualan') ?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
              <li><a href="<?php echo base_url('idex.php/sim/piutang') ?>"><i class="fa fa-circle-o"></i> Piutang</a></li>
<!--
            <li><a href="./index.php?index=<?php echo md5("penjualan");?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
            <li><a href="./index.php?index=<?php echo md5("piutang");?>"><i class="fa fa-circle-o"></i> Piutang</a></li>
-->
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Laporan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Surat Jalan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Logout</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>