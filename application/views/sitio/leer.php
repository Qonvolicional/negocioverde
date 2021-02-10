 <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3><?php echo $noticia->nombre; ?></h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a class="active" href="<?php echo base_url().'noticias'; ?>">Noticias</a></li>
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
                                            <img class="lazy" data-src="<?php echo base_url().$noticia->portada; ?>" alt="blog">
                                        </div>
                                        <div class="post-content">
                                            

                                            <div class="content-part">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <p class="byline">
                                                            Autor :<a href="#"><?php echo $noticia->creador;  ?></a>
                                                        </p>
                                                        <p class="posted-on">
                                                            Fecha :<a href="#"><?php echo strftime("%a, %d de %B", strtotime($noticia->fecha_creacion)) ?></a>
                                                        </p>
                                                    </div>
                                                    <h3><a href="#"><?php echo $noticia->nombre;?></a></h3>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    <?php echo $noticia->descripcion; ?>
                                                </div>
                                            </div>
                                            
                                            <?php if(!empty($noticia->url)):?>
                                                <div class="content-part">
                                                   <p class="byline"><b>Enlace externo:</b> <a href="<?php echo $noticia->url; ?>" target="_blank"> Ir a <?php echo $noticia->url; ?></a></p>
                                                     
                                                </div>
                                            <?php endif;?>
                                            
                                            <div class="tags-section">
                                              
                                                <ul class="social-link-list d-flex flex-wrap">
                                                    <li>
                                                        <a href="http://www.facebook.com/share.php?u=<?php echo base_url()."noticias/leer/".$noticia->slug; ?>&title=<?php echo $noticia->nombre; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/share?url=<?php echo base_url()."noticias/leer/".$noticia->slug; ?>&text=<?php echo $noticia->nombre; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=" https://plus.google.com/share?url=<?php echo base_url()."noticias/leer/".$noticia->slug; ?>" class="google"><i class="fab fa-google"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()."noticias/leer/".$noticia->slug; ?>&title=<?php echo $noticia->nombre; ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
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
                                <h4>Noticias más recientes</h4>     
                                <ul class="recent-post">
                                    <?php foreach ($noticias as $dn): ?>

                                    <li>
                                        <div class="rec-content">
                                            <h6><a href="<?php echo base_url().'noticias/leer/'.$dn->slug; ?>"><?php echo $dn->nombre; ?></a></h6>
                                            <span><?php echo  strftime("%a, %d de %B", strtotime($dn->fecha_creacion)); ?></span>
                                        </div>
                                        <div class="rec-thumb">
                                            <a href="<?php echo base_url().'noticias/leer/'.$dn->slug; ?>"><img src="<?php echo base_url().$dn->portada; ?>" alt="blog"></a>
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