<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Administración - Jóvenes Creadores del Chocó</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/template/img/jch_6.png" type="image/x-icon">
  <!--<link rel="icon" href="<?php echo base_url(); ?>assets/template/img/favicon-256x256.png" type="image/x-icon">-->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>dashboard" class="nav-link"><i class="fas fa-tachometer-alt d-sm-none"></i> Control estadístico</a>
      </li>
      
     
    </ul>
    
    <ul class="ml-auto navbar-nav">
      <li class="nav-item ">
        <a href="<?php echo base_url(); ?>" class="nav-link text-ligh"><i class="rounded-circle fas fa-home"></i></a>
      </li>
      <!-- User Account: style can be found in dropdown.less -->
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo $_SESSION['imagenUrl']; ?>" class="rounded-circle h-100" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata("nombre");?></span>
        </a>
        <ul class="dropdown-menu shadow-lg p-3 mb-5 rounded" aria-labelledby="dropdownMenuButton">
          <!-- User image -->
          <li class="dropdown-item dropdown-header">
            <img src="<?php echo $_SESSION['imagenUrl']; ?>" class="rounded-circle border border-danger" alt="User Image" style="width: 100px;">
            <p>
              <?php 
                echo $_SESSION['nombre']." - ".$_SESSION['rol_nombre']."<br>";
                if(!$_SESSION['admin']){
                  echo "<small>Miembro desde ".$_SESSION['fecha_registro']."</small> <small>Activo hasta antes ".$_SESSION['fecha_retiro'].".</small>";
                }
                
              ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <div class="dropdown-divider"></div>
          <div class="dropdown-footer d-flex text-sm">
            <a href="<?php echo base_url(); ?>perfil" class="mr-auto btn btn-primary"><i class="fas fa-users-cog"></i> Perfil</a>
            <a href="<?php echo base_url(); ?>auth/logout" class="ml-auto btn btn-danger" title="Cerrar sesión"><i class="fas fa-sign-out-alt"></i> Salir</a>
          </div>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
    </ul>
    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

  </nav>
  <!-- /.navbar -->

  