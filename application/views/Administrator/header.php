<!DOCTYPE html>
<?php
if($this->session->userdata('user_role') != 'Admin')
{
  echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
  redirect(base_url('CLogin'));
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mustika Farma | <?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css')?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('CDashboard/index')?>" class="nav-link">Home</a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Profil</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('CEditProfil/editUser/'.$this->session->userdata('user_userID'))?>" class="dropdown-item">
            <i class="fas fa-users-cog mr-2"></i> Edit Profil

          </a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('CLogin/logout')?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Log Out

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">User Profil</a>
        </div>
      </li>



    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('CDashboard/index')?>" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8')?>">
      <span class="brand-text font-weight-primary">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/logo1.png" class="img-circle elevation-2" alt="User Image')?>">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mustika Farma</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="<?php echo site_url('CDashboard')?>" class="nav-link <?php echo $this->uri->segment(1)=='CDashboard'? 'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('CObat')?>" class="nav-link <?php echo $this->uri->segment(1)=='CObat'? 'active':''?>">
              <i class="nav-icon fas fa-capsules"></i>
              <p>Obat-Obatan</p>
            </a>
          </li>

		 <li class="nav-item">
            <a href="<?php echo site_url('CJenis')?>" class="nav-link <?php echo $this->uri->segment(1)=='CJenis'? 'active':''?>">
              <i class="nav-icon fas fa-capsules"></i>
              <p>Jenis Obat</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo site_url('CLokasi')?>" class="nav-link <?php echo $this->uri->segment(1)=='CLokasi'? 'active':''?>">
              <i class="nav-icon fas fa-table"></i>
              <p>Lokasi Penyimpanan</p>
            </a>
          </li>

            <li class="nav-item">
            <a href="<?php echo site_url('CRole')?>" class="nav-link <?php echo $this->uri->segment(1)=='CRole'? 'active':''?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Role</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo site_url('CInfo')?>" class="nav-link <?php echo $this->uri->segment(1)=='CInfo'? 'active':''?>">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Info</p>
          </a>
        </li>
            <li class="nav-item">
            <a href="<?php echo site_url('CManagement')?>" class="nav-link <?php echo $this->uri->segment(1)=='CManagement'? 'active':''?>">
              <i class="nav-icon fas fa-money-check"></i>
              <p>Management Keuangan</p>
            </a>
          </li>

          <li class="nav-header">User</li>
          <li class="nav-item">
                <a href="<?php echo site_url('CUser')?>" class="nav-link <?php echo $this->uri->segment(1)=='CUser'? 'active':''?>">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>Karyawan</p>
                </a>
              </li>
    		   <li class="nav-item">
                <a href="<?php echo site_url('CSupplier')?>" class="nav-link <?php echo $this->uri->segment(1)=='CSupplier'? 'active':''?>">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>Supplier</p>
                </a>
              </li>
               <li class="nav-item">
                 <a href="<?php echo site_url('CMember')?>" class="nav-link <?php echo $this->uri->segment(1)=='CMember'? 'active':''?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User Member</p>
                </a>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
