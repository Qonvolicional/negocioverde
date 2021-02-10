 <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3><?php echo $evento->nombre; ?></h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a class="active" href="<?php echo base_url().'eventos'; ?>">Eventos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->
        
        <!-- blog section start here -->
        <section class="blog-page padding-tb" style=" background: url(<?php echo base_url(); ?>assets/template/images/26414152.png);
    background-size: cover; background-repeat: no-repeat; background-position: bottom;">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-8 sticky-widget" style="border: 1px solid #f5b33a;background: #ffc966;box-shadow: gray 5px 4px 3px;border-radius: 15px;">
                        <div class="blog blog-single">
                            <div class="section-wrapper">
                                <div class="post-item">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            <img class="lazy" data-src="<?php echo base_url().$evento->portada; ?>" alt="blog">
                                        </div>
                                        <div class="post-content">
                                            

                                            <div class="content-part">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <p class="byline">
                                                            Autor :<a href="#"><?php echo $evento->creador; ?></a>
                                                        </p>
                                                        <p class="posted-on">
                                                            Fecha :<a href="#"><?php echo strftime("%d de %B", strtotime($evento->fecha_creacion)); ?></a>
                                                        </p>
                                                    </div>
                                                    <h3><a href="#"><?php echo $evento->nombre; ?></a></h3>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    <?php echo $evento->descripcion; ?>
                                                </div>
                                            </div>
                                            
                                            <?php if(!empty($evento->fecha_apertura)):?>
                                                <div class="content-part">
                                                   <p class="byline">
                                                    <b>Fecha de apertura:</b> 
                                                    <a href="#">
                                                        <?php echo strftime("%d de %B %Y", strtotime($evento->fecha_apertura)); ?>
                                                            
                                                        </a> - <b>Fecha de cierre:</b> <a href="#"><?php echo  strftime("%d de %B %Y", strtotime($evento->fecha_cierre)); ?></a></p>
                                                     
                                                </div>
                                            <?php endif;?>
                                            
                                            <?php if(!empty($evento->url_documento)):?>
                                                <div class="content-part">
                                                   <p class="byline"><b>Documento de referencia:</b> <a href="<?php echo $evento->url_documento; ?>" target="_blank" download="Documento de referencia__<?php echo $evento->nombre; ?>"> Descargar documento <?php echo $evento->url; ?></a></p>
                                                     
                                                </div>
                                            <?php endif;?> 
                                            
                                            <?php if(!empty($evento->url)):?>
                                                <div class="content-part">
                                                   <p class="byline"><b>Enlace externo:</b> <a href="<?php echo $evento->url; ?>" target="_blank"> Ir a <?php echo $evento->url; ?></a></p>
                                                     
                                                </div>
                                            <?php endif;?>
                                            
                                            <div class="tags-section">
                                              
                                                <ul class="social-link-list d-flex flex-wrap">
                                                    <li>
                                                        <a href="http://www.facebook.com/share.php?u=<?php echo base_url()."eventos/leer/".$evento->slug; ?>&title=<?php echo $evento->nombre; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/share?url=<?php echo base_url()."eventos/leer/".$evento->slug; ?>&text=<?php echo $evento->nombre; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=" https://plus.google.com/share?url=<?php echo base_url()."eventos/leer/".$evento->slug; ?>" class="google"><i class="fab fa-google"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()."eventos/leer/".$evento->slug; ?>&title=<?php echo $evento->nombre; ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
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
                                <h4>Eventos más recientes</h4>     
                                <ul class="recent-post">
                                    <?php foreach ($eventos as $e): ?>

                                    <li>
                                        <div class="rec-content">
                                            <h6><a href="<?php echo base_url().'eventos/leer/'.$e->slug; ?>"><?php echo $e->nombre; ?></a></h6>
                                            <span><?php echo strftime("%d de %B %Y", strtotime($e->fecha_creacion)); ?></span>
                                        </div>
                                        <div class="rec-thumb">
                                            <a href="<?php echo base_url().'eventos/leer/'.$e->slug; ?>"><img data-src="<?php echo base_url().$e->portada; ?>" alt="blog" class="lazy"></a>
                                        </div>
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