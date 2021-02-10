
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Convocatorias</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url();?>">Inicio</a></li>
                                <li><a class="active">Convocatorias</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

        <!-- blog section start here -->
        <?php if(!empty($datos_convocatorias)): ?>
        <section class="blog-page padding-tb" style=" background: url(<?php echo base_url(); ?>assets/template/images/2641415.jpg);
    background-size: cover; background-repeat: no-repeat; background-position: bottom;">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-8 sticky-widget">
                        <div class="blog">
                            <div class="section-wrapper">

                            

              <?php 
              
              
              foreach ($datos_convocatorias as $dn): ?>
              
              
              
              
              <div class="col-lg-12 sticky-widget" style="border: 1px solid #f5b33a;background: #ffc966;box-shadow: gray 5px 4px 3px;border-radius: 15px;">
                        <div class="blog">
                            <div class="section-wrapper">
                                <div class="post-item">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            <a href="https://www.ventanilladenegociosverdes.com/noticias/leer/dasdasdasdas">
                                                <img src="https://www.ventanilladenegociosverdes.com/uploads/contenido/cont_78240.jpg" alt="blog">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                           
                                            <div class="content-part">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <h6 style="color:#fff;"><a href="<?php echo base_url().'noticias/'.$dn->slugconvo; ?>"><?php echo $dn->titulo; ?></a></h6>
                                                        <span style="color:#fff;"><?php echo $dn->fechacierre; ?></span>
                                                    </div>
                                                     <h3><a href="<?php echo base_url()."convocatorias/leer/".$dn->slugconvo;?>"><?php echo $dn->titulo; ?></a></h3>
                                                </div>
                                                <div class="entry-content" style="text-align: justify !important;">
                                                    
                                                   <?php echo substr($dn->descripcion, 0, 580)." ...<br>"; ?>
                                                    <a href="<?php echo base_url()."convocatorias/leer/".$dn->slugconvo;?>" class="btn"><span>Leer Más</span><i class="icofont-double-right"></i></a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                   

                            </div>
                            <div class="pagination-area d-flex flex-wrap justify-content-center"></div>
                        </div>
                    </div>
                    

                             

                                 <?php endforeach;?>  

                            </div>
                            <div class="pagination-area d-flex flex-wrap justify-content-center">
                                <?php //echo $pagination; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sticky-widget">
                        <div class="sidebar-widget">
                           
                            
                            <div class="widget-rec-post" style="
    border: 3px solid #fbf8f2;border-radius: 10px;color: #fff !important;box-shadow: #131212 3px 2px 2px;background-image: linear-gradient(to right top, #036701, #4a8c13, #82b126, #bcd73b, #fafc53);">
                                <h4 style="color:#fff;">Convocatorias Publicadas</h4>     
                                <ul class="recent-post" style="color:#fff;">
                                    <?php foreach ($datos_convocatorias as $dn): ?>

                                    <li style="color:#fff;">
                                        <div class="rec-content">
                                            <h6 style="color:#fff;"><a href="<?php echo base_url().'convocatorias/leer/'.$dn->slugconvo; ?>"><?php echo $dn->titulo; ?></a></h6>
                                            <span style="color:#fff;"><?php echo $dn->fechacierre; ?></span>
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
    <section class="fore-zero">
        <div class="section-wrapper">
            <div class="zero-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" >
                <h2 style="border: 1px solid #5dddea;background: #5dddea;color: #136188;width: 900px;border-radius: 10px;padding: 6px;margin: 0 auto;margin-top: 50px;"> <img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/48/information-icon.png"/> No hay Convocatorias Disponibles.</h2>
            </div>
        </div>
    </section>
    <?php endif; ?>