<body>
    
    <!-- mobile-nav section start here -->
    <div class="mobile-menu">
      <nav class="mobile-header primary-menu d-lg-none">
        <div class="header-logo">
          <a href="<?php echo base_url(); ?>" class="logo">
            <img src="<?php echo base_url(); ?>assets/template/img/logo1.png" alt="logo" style="width: 40px; height: 40px;">
          </a>
        </div>
        <div class="header-bar" id="open-button">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
      <nav class="menu">
        <div class="mobile-menu-area d-lg-none">
          <div class="mobile-menu-area-inner" id="scrollbar">
            <ul class="m-menu">
              <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
              <?php foreach($datos_menu as $dm): ?>
                  <li><a href="<?php echo base_url(); ?><?php echo $dm->slugArticulo; ?>"><?php echo $dm->nombre; ?></a></li>
              <?php endforeach; ?>
                 <li>
                          <a href="https://tiendadenegociosverdes.negocio.site/" target="_new" hreclass="btn btn-success btn-sm"  style="font-size:14px;">Sala de Exibici&oacute;n</a>
                        </li>
                            <li><a href="<?php echo base_url(); ?>auth" style="font-size:14px;"><span style="border: 1px solid orange;padding: 5px;border-radius: 6px;background: orange;color: white;"><?php echo $estado_usuario ?></span></a></li>
            </ul>
            <ul class="social-link-list d-flex flex-wrap">
              <li><a href="#" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- mobile-nav section ending here -->

    <!-- header section start here -->
    <header class="header-section style-2 d-none d-lg-block"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <?php foreach($datos_contacto as $dc):
            if ($dc->id == "1"):
        ?>
        <div class="header-top">
        	<div class="container">
        		<div class="htop-area row">
        			<div class="htop-left">
        				<ul class="htop-information">
        					<li><i class="far fa-envelope"></i> <?php echo $dc->correo;  ?></li>
        					<li><i class="fas fa-phone-volume"></i> (+57) <?php echo $dc->telefono;  ?></li>
        					<li><i class="far fa-clock"></i> <?php echo $dc->horario_atencion;  ?></li>
        				</ul>
        			</div>
        			<div class="htop-right">
        				<ul>
        					<li><a href="javascript:;"><i class="fab fa-facebook"></i></a></li>
        					<li><a href="<?php echo $dc->instagram;  ?>" target="_new"><i class="fab fa-instagram"></i></a></li>
        					<li><a href="<?php echo $dc->youtube;  ?>" target="_new"><i class="fab fa-youtube"></i></a></li>
        					<li><a href="https://api.whatsapp.com/send?phone=57<?php echo $dc->whatsapp;  ?>" target="_new"><i class="fab fa-whatsapp"></i></i></a></li>
        					
        					
        					
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>
        <?php 
        endif;
        endforeach; ?>
            
       <!-- 
        <div class="header-top">
        	<div class="container">
        		<div class="htop-area row">
        			<div class="htop-left">
        				<ul class="htop-information">
        					<li><i class="far fa-envelope"></i> ventanilla@gmail.com</li>
        					<li><i class="fas fa-phone-volume"></i> (+57) 313-590-7339</li>
        					<li><i class="far fa-clock"></i> Lun - Vie 08:00 - 18:00 , Sab 08:00 - 13:00</li>
        				</ul>
        			</div>
        			<div class="htop-right">
        				<ul>
        					<li><a href="javascript:;"><i class="fab fa-facebook"></i></a></li>
        					<li><a href="https://www.instagram.com/expoambientechoco/" target="_new"><i class="fab fa-instagram"></i></a></li>
        					<li><a href="https://www.youtube.com/channel/UCwyv3hEvDIzLJq1-5YXfNvg/discussion" target="_new"><i class="fab fa-youtube"></i></a></li>
        					<li><a href="https://api.whatsapp.com/send?phone=573135907339" target="_new"><i class="fab fa-whatsapp"></i></i></a></li>
        					
        					
        					
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>-->
   
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <nav class="primary-menu">
              <div class="menu-area">
                <div class="row justify-content-between align-items-center">
                <div class="main-menu-area d-flex align-items-left">      
                  <a href="<?php echo base_url(); ?>" class="logo">
                    <img src="<?php echo base_url(); ?>assets/template/img/logo1.png"  style="width: 72px; height: 72px;" alt="logo">
                  </a>
                  <a href="<?php echo base_url(); ?>" class="logo">
                    <img src="<?php echo base_url(); ?>assets/template/img/codechoco.jpg"  style="width: 100px; height: 80px;" alt="logo">
                  </a>
                </div>
                  <div class="main-menu-area d-flex align-items-center">
                    <ul class="main-menu d-flex align-items-center">
                      <li><a href="<?php echo base_url(); ?>" style="font-size:14px;">Inicio</a></li>

                    <?php foreach($datos_menu as $dm): ?>


                        <li><a href="<?php echo base_url(); ?><?php echo $dm->slugArticulo; ?>" style="font-size:14px;"><?php echo $dm->nombre; ?></a></li>
                    
                    <?php endforeach; ?>
                    
                    <li>
                          <a href="https://tiendadenegociosverdes.negocio.site/" target="_new" hreclass="btn btn-success btn-sm"  style="font-size:14px;">Sala de Exibici&oacute;n</a>
                        </li>
                         <!--<li><a href="<?php //echo base_url(); ?>auth" style="font-size:14px;">Iniciar Sesión</a></li> -->
                         <li><a href="<?php echo base_url(); ?>auth" style="font-size:14px;"><span style="border: 1px solid orange;padding: 5px;border-radius: 6px;background: orange;color: white;"><?php echo @$estado_usuario ?></span></a></li>

                    </ul>
                    <div class="d-none d-lg-block">
                    
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>