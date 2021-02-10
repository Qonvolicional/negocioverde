
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3><?php echo $convocatoria->titulo?></h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                 <li><a href="<?php echo base_url();?>">Inicio</a></li>
                                <li><a class="active" href="<?php echo base_url().'convocatorias';?>">Convocatorias</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

        <!-- blog section start here -->
        <section class="blog-page padding-tb">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-8 sticky-widget">
                        <div class="blog blog-single">
                            <div class="section-wrapper">
                                
                                <div class="post-item">
                                    <div class="post-inner">
                                        <!-- <div class="post-thumb">
                                            <a href="blog-single.html"><img src="<?php echo base_url(),$dn->portada; ?>" alt="blog"></a>
                                        </div> -->
                                        <div class="post-content">
                                            

                                            <div class="content-part">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                    
                                                        <p class="posted-on">
                                                            Fecha de Cierre:<a href="#"><?php echo $convocatoria->fechacierre; ?></a>
                                                        </p>
                                                    </div>
                                                    <h3><a href="blog-single.html"><?php echo $convocatoria->titulo; ?></a></h3>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    <?php echo $convocatoria->descripcion; ?><br>
                                                    <br>

                                                </div>
                                                <div style="padding: 5px;border: 1px solid #e495330d;width:auto;border-radius: 6px;background: orange;color: #fff;text-transform: uppercase;font-size: 13px;box-shadow: 3px 2px 3px #e1e1e1;margin: 3px;"> 
                            <img src="http://localhost/proyectoventanilla/assets/template/img/logo1.png" style="width: 20px; height: 20px; background: #FFF; border-radius: 50%;">
                            <span>
                            <a href="<?php echo base_url().$convocatoria->portada; ?>" target="_new" style="text-decoration: #FFF; color: #FFF;">Documento Base de la Convocatoria</a><sub> Descargable</sub>
                            </span>
                            </div>
                            <br><br>
                                            </div>

                                            <div class="tags-section">
                                              
                                                <ul class="social-link-list d-flex flex-wrap">
                                                    <li>
                                                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="google"><i class="fab fa-google"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
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
                           
                            <div class="widget-rec-post">
                                <h4>Convocatorias Anteriores</h4>     
                                <ul class="recent-post">
                                    <?php foreach ($datos_convocatorias as $dn): ?>

                                    <li>
                                        <div class="rec-content">
                                            <h6><a href="<?php echo base_url().'convocatorias/leer/'.$dn->slugconvo; ?>"><?php echo $dn->titulo; ?></a></h6>
                                            <span><?php echo $dn->fechacierre; ?></span>
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