<body>
    
    <!-- mobile-nav section start here -->
    <div class="mobile-menu">

      <nav class="mobile-header primary-menu d-lg-none">
        <div class="header-logo">
          <a href="<?php echo base_url(); ?>" class="logo">
            <img class="lazy" data-src="<?php echo base_url(); ?>assets/template/img/jch_2.png"  style="width: 40px; height: 60px;" alt="logo jch">   <span style="color:white; font-weight: bold;"> JCH</span>
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
              <li><a href="<?php echo base_url(); ?>">Inicio </a></li>
              <?php foreach($datos_menu as $dm): ?>
                                <?php  
                                $menuid = $dm->id;
                                if($dm->menupadre == "0"): ?>
                                <li><a href="<?php echo base_url(); ?><?php echo $dm->slugArticulo; ?>" style="font-size:16px;"><?php echo $dm->nombre; ?></a>
                                 
                                      <ul>
                                       <?php foreach ($datos_menu as $sub): 
                                         if($menuid == $sub->menupadre):
                                           $urlSlug = $sub->slugArticulo;
                                           if(empty($sub->slugArticulo)):
                                              $urlSlug = "corporacion/".$sub->id."-".$sub->nombre;
                                            endif;
                                         ?>
                                            <li><a href="<?php echo base_url().$urlSlug; ?>" style="font-size:16px;"><?php echo $sub->nombre; ?></a></li>
                                         
                                      <?php endif; ?>
                                      <?php endforeach; ?>
                                  </ul>
                              <?php endif; ?>
                                  
                            
                            <?php endforeach; ?>
                            
             
              <li>
                <a href="<?php echo base_url(); ?>auth" hreclass="btn btn-success btn-sm"><?php echo $estado_usuario; ?></a>
              </li>
            </ul>
            <ul class="social-link-list d-flex flex-wrap">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" class="youtube"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- mobile-nav section ending here -->

    <!-- header section start here -->
    
  
    <?php if(!empty($sliders) || !empty($publicaciones_recientes)): ?>
        <section class="slider-section banner style-1">
            
           
                <?php 
                    $rs = 0;
                    $bs = 0;
                    $fs = 0;
                ?>
                <?php if(!empty($sliders)): ?>
                    <?php foreach($sliders as $ds):?>
                        <?php 
                            $rs++;
                            echo "<input id='s".$rs."' type='radio' name='slide1' checked>";
                        ?>
                    <?php endforeach;?>
                <?php endif; ?>
                
                <?php if(!empty($publicaciones_recientes)):; ?>
                    <?php foreach($publicaciones_recientes as $pr): ?>
                        <?php 
                            $rs++;
                            echo "<input id='s".$rs."' type='radio' name='slide1' checked>";
                        ?>
                    <?php endforeach;?>
                <?php endif; ?>
                
                
                <?php if(!empty($sliders) || !empty($publicaciones_recientes)):?>
                    <div class="sh__content">
                    <?php foreach($sliders as $ds): echo "slider id: ".$ds->nombre;?>
                        <!-- Slider Item -->
                    
                        <div class="sh__item" style="text-align: center;">
                              <div class="back-portada" style="background:url(<?php echo base_url() . $ds->url_imagen ?>) !important; background-size: contain !important;"></div>

                              <div style="position: absolute; width:100%; height: 100%; left: 0; top: 0;">
                             <img class="lazy" src="<?php echo base_url() . $ds->url_imagen ?>" alt="<?php echo $ds->nombre; ?>" style="height: 100%; width: auto;">
                              </div>
                        </div>
                        <!-- Fin Slider Item--> 
                    <?php endforeach;?>
                    
                    <?php foreach($publicaciones_recientes as $pr): echo "publicaciones id: ".$pr->nombre;?>
                        <!-- Slider Item -->
                        
                                                  
                          <div class="sh__item" style="text-align:center;">
                               <div class="back-portada" class="lazy" data-bg="" style="background:url(<?php echo base_url() . $pr->portada; ?>); background-size: contain !important; background-clip: content-box !important;"></div>

                               <div style="position: absolute; width:100%; height: 100%; left: 0; top: 0;">
                                 <img class="lazy" data-src="<?php echo base_url() . $pr->portada; ?>" alt="<?php echo $pr->nombre; ?>" class="img-responsive img-fluid" style="height: 100%; width: auto;"> </div>
                                 <!-- Item Info -->

                                 
                                 
                          </div>
                          
                        <!-- Fin Slider Item--> 
                    <?php  endforeach;?>
                    </div><!-- .sh__content -->
                <?php endif; ?>  
                
                
                
                <?php if(!empty($sliders) || !empty($publicaciones_recientes)):?>    
                    <!--botones -->
                    <div class="sh__btns">
                    <?php foreach($sliders as $ds): ?> 
                        <?php 
                            $bs++;
                            echo "<label for='s".$bs."'></label>";
                        ?>
                    <?php endforeach; ?>
                    
                    <?php foreach($publicaciones_recientes as $ds): ?> 
                        <?php 
                            $bs++;
                            echo "<label for='s".$bs."'></label>";
                        ?>
                    <?php endforeach; ?>
                    </div><!-- .sh__btns -->
                <?php endif; ?> 
 
            <div class="contraste"></div>
            
            <header class="header-section style-2 d-none d-lg-block">

              <div class="header-top">
                  <div class="container">
                    <div class="htop-area row">
                      <div class="htop-left">
                        <ul class="htop-information">
                          <li><i class="far fa-envelope"></i> <?php echo $contacto->correo; ?> </li>
                          <li><i class="fas fa-phone-volume"></i> <?php echo $contacto->telefono; ?></li>
                          <li><i class="far fa-clock"></i> <?php echo $contacto->horario_atencion; ?> </li>
                        </ul>
                      </div>
                      <div class="htop-right">
                        <ul>
                          <li><a href="<?php echo $contacto->facebook; ?>" target="_new"><i class="fab fa-facebook"></i></a></li>
                          <li><a href="<?php echo $contacto->instagram; ?>" target="_new"><i class="fab fa-instagram"></i></a></li>
                          <li><a href="<?php echo $contacto->youtube; ?>" target="_new"><i class="fab fa-youtube"></i></a></li>
                          <li><a href="<?php echo $contacto->twitter; ?>" target="_new"><i class="fab fa-twitter"></i></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="header-bottom">
                <div class="container">
                  <div class="row">
                    <nav class="primary-menu">
                       

                      <div class="menu-area">
                        <div class="row justify-content-between">
                            <div class="main-menu-area d-flex align-items-left">    
                              <a href="<?php echo base_url(); ?>" class="logo">
                                <img src="<?php echo base_url(); ?>assets/template/img/jch_6.png"  style="width: 125px; " alt="logo jch">
                              </a>
                            </div>

                          <div class="main-menu-area d-flex ">
                            <ul class="main-menu d-flex">
                              <li><a href="<?php echo base_url(); ?>" style="font-size:14px;"><i class="fas fa-home" style="color:white;"></i> Inicio</a>

                            <?php foreach($datos_menu as $dm): ?>
                                <?php  
                                $menuid = $dm->id;
                                if($dm->menupadre == "0"): ?>
                                <li><a href="<?php echo base_url(); ?><?php echo $dm->slugArticulo; ?>" style="font-size:16px;"><?php echo $dm->nombre; ?></a>
                                 
                                      <ul>
                                       <?php foreach ($datos_menu as $sub): 
                                         if($menuid == $sub->menupadre):
                                           $urlSlug = $sub->slugArticulo;
                                           if(empty($sub->slugArticulo)):
                                              $urlSlug = "corporacion/".$sub->id."-".$sub->nombre;
                                            endif;
                                         ?>
                                            <li><a href="<?php echo base_url().$urlSlug; ?>" style="font-size:16px;"><?php echo $sub->nombre; ?></a></li>
                                         
                                      <?php endif;  ?>
                                      <?php endforeach; ?>
                                  </ul>
                              <?php endif; ?>
                                  
                            
                            <?php endforeach; ?>
                            </li>
                            
                                 <li><a href="<?php echo base_url(); ?>auth" style="font-size:14px;"><span style="border: 1px solid black;padding: 5px;border-radius: 6px;background: black;color: white;"><?php echo $estado_usuario ?></span></a></li>

                            </ul>
                          </div>
                        </div>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </header>
        <div class="style-curve" >
              <svg viewBox="0 0 100 190" preserveAspectRatio="none">
                <path d="M 0 190 C 50 100, 50 100, 100 190" stroke="white" fill="white" />
              </svg>
            </div>
        </section>
    <?php endif; ?>
