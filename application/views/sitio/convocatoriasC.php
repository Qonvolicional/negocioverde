
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Convocatorias</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a class="active">Convocatorias</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

        <!-- blog section start here -->
        <?php if(!empty($convocatorias)): ?>
        <section class="blog-page padding-tb" style=" background: url(<?php echo base_url(); ?>assets/template/images/2641415.jpg);
    background-size: cover; background-repeat: no-repeat; background-position: bottom;">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-8 sticky-widget" style="border: 1px solid #f5b33a;background: #ffc966;box-shadow: gray 5px 4px 3px;border-radius: 15px;">
                        <div class="blog">
                            <div class="section-wrapper">

              <?php foreach ($convocatorias as $c): ?>

             

                                <div class="post-item">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            <a href="<?php echo base_url()."convocatorias/leer/".$c->slug;?>">
                                                <img class="lazy" dat-src="<?php echo base_url(),$c->portada; ?>" alt="blog">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                           
                                            <div class="content-part">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <p class="byline">
                                                            Autor :<a href="javascript:;"><?php echo $c->creador; ?></a>
                                                        </p>
                                                        <p class="posted-on">
                                                            Fecha :<a href="javascript:;"><?php echo $c->fecha_creacion; ?></a>
                                                        </p>
                                                    </div>
                                                    <h3><a href="<?php echo base_url()."convocatorias/leer/".$c->slug;?>"><?php echo $c->nombre; ?></a></h3>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    
                                                    <?php echo substr($c->descripcion, 0, 580)." ...<br>"; ?>
                                                    <a href="<?php echo base_url()."convocatorias/leer/".$c->slug;?>" class="btn"><span>Leer Más</span><i class="icofont-double-right"></i></a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                 <?php endforeach;?>  

                            </div>
                            <div class="pagination-area d-flex flex-wrap justify-content-center">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 sticky-widget">
                        <div class="sidebar-widget">
                           
                            
                            <div class="widget-rec-post" style="
    border: 3px solid #fbf8f2;border-radius: 10px;color: #fff !important;box-shadow: #131212 3px 2px 2px;background-image: linear-gradient(to right top, #036701, #4a8c13, #82b126, #bcd73b, #fafc53);">
                                <h4>Noticias más recientes</h4>     
                                <ul class="recent-post">
                                    <?php foreach ($datos_convocatorias as $dc): ?>

                                    <li>
                                        <div class="rec-content">
                                            <h6><a href="<?php echo base_url().'convocatorias/leer/'.$dc->slug; ?>"><?php echo $dc->nombre; ?></a></h6>
                                            <span><?php echo $dn->fecha_creacion; ?></span>
                                        </div>
                                        <div class="rec-thumb">
                                            <a href="<?php echo base_url().'convocatorias/leer/'.$dc->slug; ?>"><img class="lazy" data-src="<?php echo base_url(),$dc->portada; ?>" alt="blog"></a>
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
    <?php else: ?>
        <div class="container">
        <section class="fore-zero">
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="zero-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" >
                            <h2 style="word-wrap: break-word; overflow-wrap: break-word; color:  #5d9913;border-radius: 10px;padding: 6px;margin: 0 auto; box-sizing: border-box; margin: 20px;"> <i class="fa fa-info" style="color:  #5d9913;border: 4px solid #5d9913; padding: 20px;border-radius: 100%;" /></i> No hay registros correspondientes a convocatorias activas.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>