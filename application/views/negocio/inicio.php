<!DOCTYPE html>
<html lang="en">
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
	
	  <!--

	<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400,500,700,900&display=swap" rel="stylesheet">

    
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap" rel="stylesheet">

    
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
  
  
  
    <style>
        @import url('https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap');

        *{
            font-family: 'Comfortaa', cursive;
        }
        
        body{
            
            /*background: rgb(0, 166, 90);*/
            background:url(https://png.pngtree.com/thumb_back/fw800/back_our/20190628/ourmid/pngtree-green-nature-background-texture-image_264197.jpg);
            height: auto;
            min-height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .float{
            position: fixed;
            width: 211px;
            height: 34px;
            bottom: 41px;
            right: 57px;
            background-color: #fba401;
            color: #FFF !important;
            border-radius: 17px;
            text-align: center;
            box-shadow: 2px 2px 3px #2d2b2b;
            font-size: 23px;
        }
        
        .my-float{
        	margin-top:22px;
        }
        
        
        
        
        
        
/* The browser window */
.container_box {
  border: 3px solid #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}


/* Container for columns and the top "toolbar" */
.row_box {
  padding: 10px;
  background: #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

/* Create three unequal columns that floats next to each other */
.column_box {
  float: left;
}

.left_box {
  width: 25%;
}

.right_box {
  width: 10%;
}

.middle_box {
  width: 100%;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-direction: row;
  -webkit-box-align: center;
          align-items: center;
  flex-wrap: wrap;
  -webkit-box-pack: center;
          justify-content: center;

}

.middle_box > span {
  font-size: 1.2rem;
  margin: 4px;
}

/* Clear floats after the columns */
.row_box:after {
  content: "";
  display: table;
  clear: both;
}

/* Three dots */
.dot_box {
  margin-top: 4px;
  height: 12px;
  width: 12px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

/* Style the input field */
input[type=text] {
  width: 100%;
  border-radius: 3px;
  border: none;
  background-color: white;
  margin-top: -8px;
  height: 25px;
  color: #666;
  padding: 5px;
}

/* Three bars (hamburger menu) */
.bar_box {
  width: 17px;
  height: 3px;
  background-color: #aaa;
  margin: 3px 0;
  display: block;
}

/* Page content */
.content_box {
  padding: 10px;
}





.ribbon-wrapper {
	position: relative;z-index:998;
}
  .ribbon-front {
	background-color: #307729;	
	/*height: 50px; */
	width: 100%;
	position: relative;
	left:-10px;
	z-index: 2; font:15px/26px bold Verdana, Geneva, sans-serif; 
	color:#f8f8f8; 
	text-align:center;
	/*text-shadow: 0px 1px 2px #cc6666;*/
}

  .ribbon-front,
  .ribbon-back-left,
  .ribbon-back-right
{
	-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-khtml-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-o-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
}

  .ribbon-edge-topleft,
  .ribbon-edge-topright,
  .ribbon-edge-bottomleft,
  .ribbon-edge-bottomright {
	position: absolute;
	z-index: 1;
	border-style:solid;
	height:0px;
	width:0px;
}

  .ribbon-edge-topleft,
  .ribbon-edge-topright {
}

  .ribbon-edge-bottomleft,
  .ribbon-edge-bottomright {
	top: 50px;
}

  .ribbon-edge-topleft,
  .ribbon-edge-bottomleft {
	left: -10px;
	border-color: transparent #0f460a transparent transparent;
}

  .ribbon-edge-topleft {
	top: -5px;
	border-width: 5px 10px 0 0;
}
  .ribbon-edge-bottomleft {
	border-width: 0 10px 0px 0;
}

  .ribbon-edge-topright,
  .ribbon-edge-bottomright {
	left: 220px;
	border-color: transparent transparent transparent #9B1724;
}

  .ribbon-edge-topright {
	top: 0px;
	border-width: 0px 0 0 10px;
}
  .ribbon-edge-bottomright {
	border-width: 0 0 5px 10px;
}


@-webkit-keyframes flow {
	0% { left:-20px;opacity: 0;}
	50% {left:100px;opacity: 0.3;}
    100%{ left:180px;opacity: 0;}
}
@keyframes flow {
	0% { left:-20px;opacity: 0;}
	50% {left:100px;opacity: 0.3;}
    100%{ left:180px;opacity: 0;}
}

.glow{ background: rgb(255,255,255); width:40px; height:100%; z-index:999; position:absolute;-webkit-animation: flow 1.5s linear infinite;-moz-animation: flow 1.5s linear infinite;-webkit-transform: skew(20deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);background: -moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 1%, rgba(255,255,255,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(1%,rgba(255,255,255,0)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* IE10+ */
background: linear-gradient(to right, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-9 */ border-left:1px solid #fff;}





#lista2 {
    counter-reset: li; 
    list-style: none; 
    *list-style: decimal; 
    font: 15px 'trebuchet MS', 'lucida sans';
    padding: 0;
    margin-bottom: 4em;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
}

#lista2 ol {
    margin: 0 0 0 2em; 
}

#lista2 li{
    position: relative;
    display: block;
    padding: .4em .4em .4em 2em;
    *padding: .4em;
    margin: .5em 0;
    background: #2b83a5;
    color: #fff;
    text-decoration: none;
    border-radius: .3em;
    transition: all .3s ease-out;   
}

#lista2 li:hover{
    background: orange;
    color:#fff;
}

#lista2 li:hover:before{
    transform: rotate(360deg);  
}

#lista2 li:before{
    content: counter(li);
    counter-increment: li;
    position: absolute; 
    left: -1.3em;
    top: 50%;
    margin-top: -1.3em;
    background: #87ceeb;
    height: 2em;
    width: 2em;
    line-height: 2em;
    border: .3em solid #fff;
    text-align: center;
    font-weight: bold;
    border-radius: 2em;
    transition: all .3s ease-out;
}


  </style>
</head>
<body>
	<div style="max-width: 700px; margin: 0 auto;">
		 <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
		 <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $empresa->id; ?>">
	<section class="content">
		<div class="row">
			 <div class="col-xs-12">
			 	 <div class="box box-warning">
			 	 	<div class="box-header">
			 	 	
			 	 		 <ul class="nav nav-tabs">
						    <li class="active">
                  
                  <a href="<?php echo base_url(); ?>"> <span class="glyphicon glyphicon-home"  style="color: #307729 !important;"></span> Ir Inicio</a>
                </li>
						  </ul>
				
                 	</div>
                 	<div class="box-body">	
                 	
                 	<div style="border: 1px solid white;padding: 10px;margin: 7px;background: url(https://jooinn.com/images/eco-background-1.jpg);background-size: cover;">

						<div class="row">
							<div class="col-md text-center">
								<div id="imagen-negocio">	
										<img class="img-responsive center-block" alt="Imagen Corportaiva" src="<?php echo base_url().$empresa_imagen; ?>" style="width: 160px;height: 160px;border: 2px solid #f39c0f;border-radius: 50%;padding: 10px;box-shadow: #80808038 3px 2px 2px;background: white;">
								</div>
								<h2 ><strong><span style="border: 1px solid orange;padding: 4px;border: 2px solid orange;border-radius: 10px;background: orange;color: #fff;margin: 0 auto;margin-top: 0px;"><?php echo $empresa->razon_social;  ?><sub style="border: 1px solid white;margin: 10px;border-radius: 10px;font-size: 14px;padding: 4px;background: white;color: green;"> <?php echo $empresa->municipio; ?></sub></span></strong> </h2>
							</div>	
						</div>
						
						
						
						
						
						<!-- Descripcion del negocio -->
						<div class="row">
						       
								<div class="col-md text-center">
								     <div style="height:20px;"></div>
									<p style="font-size: 18px;text-align: justify;line-height: 2.5rem;color: #403d3dfa;margin-top: 10px;border: 1px solid #98a961;margin-bottom: -4px;width: 98.3%;padding: 15px;"><?php echo $empresa->descripcion_negocio; ?></p>
									
									<!--<h2><blockquote ><?php echo $empresa->caracteristica_ambiental; ?></blockquote></h2>
									<h2 style="border-top: 1px solid green;border-bottom: 1px solid green;margin-top: 20px;padding: 10px;font-size: 22px;background: #00800038;"><small><?php echo $empresa->direccion_predio; ?> <span class="glyphicon glyphicon-map-marker"></span><a target="_blank" href="https://www.google.com/maps/place/<?php echo $mapa; ?>"> Como llegar</a></small></h2>
									<h4><small><?php echo $empresa->municipio; ?></small></h4> -->
								</div>
								
								
								
						</div>
						
						
                        <div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
                        	<div class="ribbon-front">
                        		<?php echo $empresa->caracteristica_ambiental; ?>
                        	</div>
                        	<div class="ribbon-edge-topleft"></div>
                        	<div class="ribbon-edge-topright"></div>
                        	<div class="ribbon-edge-bottomleft"></div>
                        	<div class="ribbon-edge-bottomright"></div>
                        </div>

						</div>
						
						<!-- Información general del negocio -->
						<div class="row ">
								<div class="col-md text-center">
								<h3 class="" style="border: 1px solid orange;padding: 5px;border-radius: 5px;background: orange;color: #fff;text-transform: capitalize;font-size: 15px;box-shadow: lightgray 3px 2px 2px;">
								 <span class=" text-success glyphicon glyphicon glyphicon-user" aria-hidden="true" style="color: #fff !important;"> </span> Representante  Legal:	<?php echo $empresa->empresario;?></small>
								</h3>
								</div>
								<div class="col-md text-center">
								<h3 style="border: 1px solid orange;padding: 5px;border-radius: 5px;background: orange;color: #fff;text-transform: capitalize;font-size: 15px;box-shadow: lightgray 3px 2px 2px; height:67px;">
									<span class="text-success glyphicon glyphicon glyphicon-envelope" aria-hidden="true" style="color: #fff !important;"></span> Correo Electronico: <a href="mailto:<?php echo $empresa->correo;?>?Subject=[Negocios Verdes]" style="color:#fff; text-decoration:#fff;"><?php echo $empresa->correo;?></a>
								</h3>
								</div>
								<div class="col-md text-center">
									<h2 style="border: 1px solid orange;padding: 5px;border-radius: 5px;background: orange;color: #fff;text-transform: capitalize;box-shadow: lightgray 3px 2px 2px; height:67px;"><span class="text-success glyphicon glyphicon-earphone" aria-hidden="true" style="color: #fff !important;"></span>Teléfonos: <?php echo $empresa->celular;?></h2>
								</div>
						</div>
						
						
                        <br/>
						<!-- Productos del negocio -->
						<div class="row">
							<div class="col-md">
								<h2><blockquote>Productos y Servicios</blockquote></h2>
							</div>
						</div>
						<div class="row m-3">
							<div class="col-md">
								<ol id="lista2">
								    <?php foreach ($empresa_producto as $key => $value): ?>
                                        <li><?php echo $value->bien_servicio; ?></li>
                                    <?php endforeach; ?>
                                </ol>
							</div>
						</div>
						
						<div class="container_box">
                      </div>
                            <div class="row_box">
                               <div class="column_box middle_box">
                                 <input type="text" name="" readonly>
                               </div>
                            </div> 
                          <div class="row_box">
                            <div class="column_box middle_box">
                              <h3><blockquote>Resultado de la Verificación <button class="btn btn-lg" style=" background: <?php echo $color; ?>"><?php echo $resultado." (".number_format($puntaje,2)."%)"; ?></button></blockquote></h3>
                            </div>
                            
                               <div class="column_box middle_box">
                                  <span>  <span class="dot_box" style="background:rgba(237, 125, 49, 1);"></span>  Inicial (0% - 9%) </span>
                                   <span> <span class="dot_box" style="background:rgba(244, 176, 132, 1);"></span>  Básico (10% - 30% )</span>
                               </div>
                            
                            
                               <div class="column_box middle_box">
                                 <span> <span class="dot_box" style="background:rgba(169, 208, 142, 1);"></span>  Intermedio (31%  - 50%)</span>
                                 <span>  <span class="dot_box" style="background:rgba(201, 201, 201, 1);"></span> Satisfactorio (51% - 80%)</span>
                               </div>
                            
                            
                               <div class="column_box middle_box">
                               <span>  <span class="dot_box" style="background:rgba(165, 165, 165, 1);"></span> Avanzado (81% - 100%) + Puntaje adicional (0% - 50%)</span>
                                    <span>  <span class="dot_box" style="background:rgba(71, 247, 29, 1)"></span> Ideal (81% - 100%) + Puntaje adicional (51% - 100%)</span>
                                  </div>
                            
                            <!--div class="column_box right_box">
                              <div style="float:right">
                                 <span class="bar_box"></span>
                                <span class="bar_box"></span>
                                <span class="bar_box"></span>
                              </div>
                            </div-->
                          </div>
                        
                          <div class="content_box">
                            
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
			 </div>
		</div>
	</section>
	</div>
    	
    <a href="https://www.google.com/maps/place/<?php echo $mapa; ?>" target="_new" class="float">
    <img src="http://www.myiconfinder.com/uploads/iconsets/256-256-8055c322ae4049897caa15e5331940f2.png" style="width: 26px;"> Cómo llegar
    </a>


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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/template/js/negocio.js"></script>
<?php if(!empty($jquery)): ?>
  <script src="<?php echo base_url(); ?>assets/template/js/<?php echo $jquery; ?>"></script>
<?php endif; ?>  
</html>