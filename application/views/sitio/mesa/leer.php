<!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3><?php echo $mesa->nombre; ?></h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a class="active" href="<?php echo base_url().'mesa'; ?>">Mesa Interinstitucional de Negocios Verdes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->
        
        <!-- blog section start here -->
        <section class="blog-page padding-tb" style=" background: url(<?php echo base_url(); ?>assets/template/images/26414152.png);
    background-size: cover ; background-repeat: no-repeat; background-position: bottom;">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-8 sticky-widget" >
                        <div class="blog blog-single">
                            <div class="section-wrapper">
                                <div class="post-item" style="background: transparent !important;">
                                    <div class="post-inner" style="background: transparent !important;" >
                                    <?php if(!is_null($contenido_princial->portada)): ?>
                                        <div class="post-thumb">

                                            <img class="lazy" data-src="<?php echo base_url().$contenido_princial->portada; ?>" alt="blog" style="max-height: 400px; width: 100%; border-radius: 4px;">
                                        </div>
                                    <?php endif; ?>
                                        <div style="-webkit-transform: translateY(-100px);-os-transform: translateY(-100px);-moz-transform: translateY(-100px);transform: translateY(-100px); padding: 25px; 


background: rgba(255,255,255,1);
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(10%, rgba(255,255,255,1)), color-stop(100%, rgba(255,255,255,0)));
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 100%);
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 100%);
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0 );

  border-radius: 4px; margin: 20px;">
                                            <div class="content-part">
                                               <div class="entry-header">
                                                    <h1><a style="color:#5d9913;" href="#"><?php echo $contenido_princial->nombre; ?></a></h1>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    <?php echo $contenido_princial->descripcion; ?>
                                                </div>
                                            </div>
                                            
                                            <?php if(!empty($contenido_princial->url)):?>
                                                <div class="content-part">
                                                   <p class="byline"><b>Enlace externo:</b> <a href="<?php echo $contenido_princial->url; ?>" target="_blank"> Ir a <?php echo $contenido_princial->url; ?></a></p>
                                                     
                                                </div>
                                            <?php endif;?>
                                            <div class="tags-section">
                                              
                                                <ul class="social-link-list d-flex flex-wrap">
                                                    <li>
                                                        <a href="http://www.facebook.com/share.php?u=<?php echo base_url().$mesa->slugArticulo.'/publicacion/'.$contenido_princial->slug; ?>&title=<?php echo $contenido_princial->nombre; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/share?url=<?php echo base_url().$mesa->slugArticulo.'/publicacion/'.$contenido_princial->slug; ?>&text=<?php echo $contenido_princial->nombre; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://plus.google.com/share?url=<?php echo base_url().$mesa->slugArticulo.'/publicacion/'.$contenido_princial->slug; ?>" class="google"><i class="fab fa-google"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url().$mesa->slugArticulo.'/publicacion/'.$contenido_princial->slug; ?>&title=<?php echo $contenido_princial->nombre; ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sticky-widget">
                        <div class="sidebar-widget">
                           
                            <div class="widget-rec-post" style="
    border: 3px solid #fbf8f2;border-radius: 10px;color: #fff !important;box-shadow: #131212 3px 2px 2px;background-image: linear-gradient(to right top, #036701, #4a8c13, #82b126, #bcd73b, #fafc53);">
                                <h4>Publicaciones Recientes de la Mesa</h4>
                                <?php if(count($publicaciones) == 0): ?> 
                                    <h6 style="color:white;">Sin publicaciones</h6>
                                <?php endif; ?>
                                <ul class="recent-post">
                                    <?php foreach ($publicaciones as $dn): ?>

                                    <li>
                                        <div class="rec-content">
                                            <h6><a href="<?php echo base_url().$mesa->slugArticulo.'/publicacion/'.$dn->slug; ?>"><?php echo $dn->nombre; ?></a></h6>
                                            <span><?php echo  strftime("%a, %d de %B", strtotime($dn->fecha_creacion)); ?></span>
                                        </div>
                                        <!--div class="rec-thumb">
                                            <a href="<?php echo base_url().'noticias/leer/'.$dn->slug; ?>"><img src="<?php echo base_url().$dn->portada; ?>" alt="blog"></a>
                                        </div-->
                                    </li>

                                 <?php endforeach;?>  

                                </ul>
                            </div>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog section ending here -->