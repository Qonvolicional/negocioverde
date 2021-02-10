
<?php
    $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
    $imagen_portada = (!empty($galeria[0]->url_recurso) && file_exists($galeria[0]->url_recurso))?base_url().$galeria[0]->url_recurso:$imagen_defecto;
    
?>

<section class="blog-page my-5" id="obra-post" style="background: url(<?php echo base_url(); ?>assets/template/img/jch_3.png);
              background: url(https://www.jovenescreadoresdelchoco.org/assets/template/img/jch_3.png);
              background-size: 125px auto;
              /*opacity: 0.1;*/
              background-position: right bottom;
              background-repeat: no-repeat;
              background-clip: content-box;"
  > 
    <div class="page-header-item d-flex align-items-center justify-content-center mb-5">
        <div class="post-content">
            <div class="breadcamp">
                <ul class="d-flex flex-wrap justify-content-center align-items-center">
                    <li><a href="<?php echo base_url(); ?>">Inicio</a> </li>
                    <li><a href="<?php echo base_url()."obras/".$dato_obra->controlador;  ?>"><?php echo $dato_obra->tipo_obra;?></a> </li>
                    <li><a class="active vibrant-color"><?php echo $dato_obra->nombre; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container p-md-0">
        <div class="section-wrapper">
            <div class="col-lg-12 sticky-widget" style="border: 1px solid #272624;background: #0c0c0c;box-shadow: #191818 5px 4px 3px;border-radius: 0px;">
                <div class="blog blog-single" >
                    <div class="section-wrapper">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb d-flex" style="max-height:600px">
                                    <img class="mx-auto lazy responsive" style="width:800px" data-src="<?php echo $imagen_portada; ?>" alt="blog">
                                </div>
                                <div class="post-content">
                        
                                    <div class="content-part">
                                        <div class="entry-header">
                                            <div class="entry-meta">
                                                <p class="posted-on">
                                                    Fecha :<a href="#"><?php echo strftime("%a, %d de %B", strtotime($dato_obra->fecha_modificacion)) ?></a>
                                                </p>
                                            </div>
                                            <h3 class="text-center"><a href="#" style="color:#dd3747"><?php echo $dato_obra->nombre;?></a></h3>
                                        </div>
                                    </div>
                                   
                                    <div class="content-part tags-section">
                                        <div class="entry-header">
                                            <h4>Sinopsi</h4>
                                            <p><?php echo $dato_obra->sinopsi; ?></p>
                                        </div>
                                    </div>

                                    <div class="content-part tags-section">
                                        <div class="entry-header">
                                            <h4>Musicalización</h4>
                                            <p><?php echo $dato_obra->musicalizacion; ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="content-part tags-section">
                                        <div class="entry-header">
                                            <h4>Galeria</h4>
                                            <div class="wow fadeInUp" style="visibility: visible;animation-duration: 1s;animation-delay: 0.3s;animation-name: fadeInUp;">
                                                <div class="post-item"> 
                                                <?php if(!empty($galeria)):?>
                                                    <ul class="footer-gellary">
                                                    <?php foreach ($galeria as $dg): ?>
                                                    <li class="">
                                                        <a href="<?php echo base_url().$dg->url_recurso; ?>" data-rel="lightcase"><img src="<?php echo base_url().$dg->url_recurso; ?>" alt="<?php  echo $dato_obra->nombre; ?>"></a>
                                                    </li>
                                                        
                                                    <!-- <div class="post-thumb wow fadeInUp"  style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; width: ">
                                                        <div class="post-thumb-inner post-galeria" style="width: 400px ! important; height: 250px ! important; ">
                                                            <a class="gallery-icon" href="<?php echo base_url().$dg->url_recurso; ?>" data-rel="lightcase">
                                                                <i class="fas fa-link"></i>
                                                            </a>
                                                            <img class="lazy" data-src="<?php echo base_url().$dg->url_recurso; ?>" src="<?php echo base_url(); ?>assets/template/img/logo1.png" alt="portfolio">
                                                            <div class="post-description"> <p> <?php echo $dato_obra->nombre; ?></p></div>
                                                        </div>
                                                    </div> -->
                                                    <?php endforeach;?>
                                                    </ul>
                                                <?php else: ?>
                                                <h2>No hay imagenes disponibles.</h2>  
                                                <?php endif;?>
                                                </div>                                  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-part tags-section">
                                        <div class="entry-header">
                                            <h4>Videos/trailer</h4>
                                            <div class="wow fadeInUp" style="visibility: visible;animation-duration: 1s;animation-delay: 0.3s;animation-name: fadeInUp;">
                                                <div class="post-item"> 
                                                <?php if(!empty($videos)):?>
                                                    <ul class="footer-gellary-video">
                                                    <?php foreach ($videos as $dg): ?>
                                                    <li class="">
                                                        <video class="embed-responsive-item videos"  controls>
                                                              <source src="<?php echo base_url().$dg->url_recurso; ?>" type="video/mp4">
                                                        </video>
                                                    </li>
                                                    <?php endforeach;?>
                                                    </ul>
                                                <?php else: ?>
                                                <h2>No hay videos disponibles.</h2>  
                                                <?php endif;?>
                                                </div>                                  
                                            </div>
                                        </div>
                                    </div>
    

                                    <div class="tags-section">
                                        <h5>Comparte</h5>
                                        <ul class="social-link-list d-flex flex-wrap">
                                            <li>
                                                <a href="http://www.facebook.com/share.php?u=<?php echo base_url()."obras/leer/".$dato_obra->slug; ?>&title=<?php echo $dato_obra->nombre; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/share?url=<?php echo base_url()."obras/leer/".$dato_obra->slug; ?>&text=<?php echo $dato_obra->nombre; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href=" https://plus.google.com/share?url=<?php echo base_url()."obras/leer/".$dato_obra->slug; ?>" class="google"><i class="fab fa-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()."obras/leer/".$dato_obra->slug; ?>&title=<?php echo $dato_obra->nombre; ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-lg-12 sticky-widget">
                <div class="sidebar-widget">
                    <div class="widget-rec-post" style="border: 3px solid #fbf8f2;/* border-radius: 10px; */color: #181818 !important;box-shadow: #131212 3px 2px 2px;background-image: linear-gradient(to left bottom, #eb0925, #ededed, #e9ecef, #f8f9fa, #f8f9fa);">
                        <h4>Últimas obras registrados</h4>     
                        <ul class="recent-post row">
                            <?php 

                            foreach ($datos_obras_recientes as $dn): 
                                $imagen = (!empty($dn->url_imagen) && file_exists($dn->url_imagen))?base_url().$dn->url_imagen:$imagen_defecto;

                            ?>
                            <li class="col-lg-4 col-md-4 col-12">
                                <div class="card" style="margin: 5px; height: 250px">
                                  <a href="<?php echo base_url().'obras/leer/'.$dn->slug; ?>"><img src="<?php echo $imagen; ?>" class="card-img-top img-fluid" alt="Imagen" style="height: 150px;"></a>
                                  <div class="card-body rec-content" style="width: auto; padding: 0.5rem 1rem;" >
                                    <h6 class="card-title" style=" font-size: 0.8rem;"><a href="<?php echo base_url().'obras/leer/'.$dn->slug; ?>"><?php echo $dn->nombre; ?></a></h6>        
                                  </div>
                                </div>
                                <!--<div class="rec-content">
                                    <h6><a href="<?php echo base_url().'obras/leer/'.$dn->slug; ?>"><?php echo $dn->nombre; ?></a></h6>
                                    <span><?php echo $dn->fecha_modificacion; ?></span>
                                </div>
                                <div class="rec-thumb">
                                    <a href="<?php echo base_url().'obras/leer/'.$dn->slug; ?>"><img src="<?php echo $imagen; ?>" style="border:2px solid black;" alt="blog"></a>
                                </div>-->
                            </li>

                         <?php endforeach;?>  

                        </ul>
                    </div>
                  
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section ending here