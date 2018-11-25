<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AsistenSTIKI</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url() ?>" class="logo">
      <span class="logo-mini"><b>A</b>ST</span>
      <span class="logo-lg"><b>Asisten</b>STIKI</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-logout">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php echo $this->uri->segment(1) == 'dashboard' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i><span>Dashboard</span></span></a>
        </li>
        <li <?php echo $this->uri->segment(1) == 'isi_nilai' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url() ?>isi_nilai"><i class="fa fa-th"></i><span>Isi Nilai</span></span></a>
        </li>
        <li <?php echo $this->uri->segment(1) == 'perhitungan' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url() ?>isi_nilai"><i class="fa fa-calculator"></i><span>Perhitungan</span></span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i><span>Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $this->uri->segment(1) == 'jadwal_kuliah' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>jadwal_kuliah"><i class="fa fa-calendar"></i> Jadwal Kuliah</a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'jadwal_asisten' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>jadwal_asisten"><i class="fa fa-navicon"></i> Jadwal Asisten</a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'matakuliah' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>matakuliah"><i class="fa fa-graduation-cap"></i> Matakuliah</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i><span>Sumber Daya</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $this->uri->segment(1) == 'asisten' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>asisten"><i class="fa fa-user"></i> Asisten</a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'dosen' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>dosen"><i class="fa fa-users"></i> Dosen</a>
            </li>
            <li <?php echo $this->uri->segment(1) == 'ruang' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url() ?>ruang"><i class="fa fa-building"></i> Ruang</a>
            </li>
          </ul>
        </li>
      </ul>
  </aside>
  <div class="content-wrapper">
      <section class="content-header">
        <h1><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1)));
        echo isset($subtitle) ? '<small>' . $subtitle . '</small>' : ''; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) ?></li>
        </ol>
    </section>
    <section class="content">