<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title><?php echo $empresa->razon_social. " (Negocio Verde)"; ?> </title>
	<meta name="application-name" content="Plataforma web para emprendimientos (Negocios Verdes)" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
	<!--meta name="description" content="Negocio Verde Chocó - <?php echo $empresa->descripcion_negocio ?>"-->
	<meta name="keywords" content="<?php echo $empresa->razon_social; ?>, Negocio Verde, Cultura, Quidbó, Chocó, emprendimineto ">
	<meta name="robots" content="index,follow">
	<meta name="subject" content="Perfiles de empresas que incentivan los Negocios Verdes en las comunicadades">
	<meta name="author" content="Ventanilla de Negocios Verdes Chocó, ventanilla@gmail.com">
	<meta name="classification" content="business">
	<meta name="lenguage" content="ES" >
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	

	<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400,500,700,900&display=swap" rel="stylesheet">

    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/template/img/favicon2.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/animate.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/lightcase.css">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/slick-theme.css">
    <!--link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/style.css"-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/negocio.style.css">
      <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/AdminLTE.min.css">
  <!-- Theme style Propios-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/estilos.css">
</head>
<body style="background: rgb(0,166, 90);">
	<div style="max-width: 700px; margin: 0 auto;">
		 <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
		 <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $empresa->id; ?>">
	<section class="content">
		<div class="row">
			 <div class="col-xs-12">
			 	 <div class="box box-warning">
			 	 	<div class="box-header">
			 	 		<nav aria-label="breadcrumb">
			 	 		 <ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="flaticon-plane"></i>Ir Inicio</a></li>
						    <li class="breadcrumb-item active" aria-current="page"> Detalle de Negocios Verdes (<?php echo $empresa->razon_social ?>)</li>
						  </ol>
						 </nav>
                 	</div>
                 	<div class="box-body">	
						<div class="row">
							<div class="col-md text-center">
								<div id="imagen-negocio">	
										<img class="img-responsive center-block" alt="Imagen Corportaiva" src="<?php echo base_url().$empresa_imagen; ?>">
								</div>
								<h2 ><strong><span><?php echo $empresa->razon_social;  ?></span></strong> <span class="text-success glyphicon glyphicon-ok-sign"></span> </h2>
							</div>	
						</div>
						<!-- Descripcion del negocio -->
						<div class="row">
								<div class="col-md text-center">
									<p style="font-size: 24px;line-height: 2.5rem;"><?php echo $empresa->descripcion_negocio; ?></p>
									
									<h2><blockquote ><?php echo $empresa->caracteristica_ambiental; ?></blockquote></h2>
									<h2><small><?php echo $empresa->direccion_predio; ?> <span class="glyphicon glyphicon-map-marker"></span><a target="_blank" href="https://www.google.com/maps/place/<?php echo $mapa; ?>"> Como llegar</a></small></h2>
									<h4><small><?php echo $empresa->municipio; ?></small></h4>
								</div>
						</div>
						<!-- Información general del negocio -->
						<div class="row ">
								<div class="col-md text-center">
								<h3 class="">
								 <span class=" text-success glyphicon glyphicon glyphicon-user" aria-hidden="true"> </span> Representante  Legal:	<?php echo $empresa->empresario;?></small>
								</h3>
								</div>
								<div class="col-md text-center">
								<h3>
									<span class="text-success glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span> Correo Electronico: <a href="mailto:<?php echo $empresa->correo;?>?Subject=[Negocios Verdes]"><?php echo $empresa->correo;?></a>
								</h3>
								</div>
								<div class="col-md text-center">
									<h2><span class="text-success glyphicon glyphicon-earphone" aria-hidden="true"></span>Teléfonos: <?php echo $empresa->celular;?></h2>
								</div>
						</div>

						<!-- Productos del negocio -->
						<div class="row">
							<div class="col-md">
								<h2><blockquote>Productos y Servicios</blockquote></h2>
							</div>
						</div>
						<div class="row m-3">

							<div class="col-md">
								<?php foreach ($empresa_producto as $key => $value): ?>
									<h1> <span class="label label-primary"><?php echo $value->bien_servicio; ?></span></h1>
								<?php endforeach; ?>
							</div>
						</div>
						<!-- Resultados de Verificación -->
						<div class="row">
							<div class="col-md">
								<h6><blockquote>Resultado de la Verificación <button class="btn btn-lg" style=" background: <?php echo $color; ?>"><?php echo $resultado; ?></button></blockquote></h6>
							</div>
						</div>
						<div class="row">
								<div class="col-md">

								</div>
						</div>
						<div class="row">
							<div class="col-md">

								<div class="chart">
				                    <!-- Chart Canvas -->
				                    <canvas id="verificacionChart" style="height: 300px;"></canvas>
				                  </div>
							</div>	
						</div>
                 	</div>
			 	 </div>
			 </div>
		</div>
	</section>
	</div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/template/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/Chart.js/Chart.js"></script>

</html>