<!-- blog section start here -->
<?php 
    $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
    $imagen_portada = (!empty($dato_producto->url_imagen) && file_exists($dato_producto->url_imagen))?base_url().$dato_producto->url_imagen:$imagen_defecto;
    
?>
<section class="blog-page my-5" id="servicio-post" style="background: url(<?php echo base_url(); ?>assets/template/img/jch_3.png);
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
                    <li><a href="<?php echo base_url()."productos/";  ?>">Productos</a> </li>
                    <li><a class="active vibrant-color"><?php echo $dato_producto->nombre; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container p-md-0">
        <div class="section-wrapper">
            <div class="col-lg-8 sticky-widget" style="border: 1px solid #272624;background: #0c0c0c;box-shadow: #191818 5px 4px 3px;border-radius: 0px;">
                <div class="blog blog-single" >
                    <div class="section-wrapper">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <img class="lazy" data-src="<?php echo $imagen_portada; ?>" alt="blog">
                                </div>
                                <div class="post-content">
                                    

                                    <div class="content-part">
                                        <div class="entry-header">
                                            <div class="entry-meta">
                                                <p class="posted-on">
                                                    Fecha :<a href="#"><?php echo strftime("%a, %d de %B", strtotime($dato_producto->fecha_creacion)) ?></a>
                                                </p>
                                            </div>
                                            <h3><a href="#" style="color:#dd3747"><?php echo $dato_producto->nombre;?></a></h3>
                                        </div>
                                        <div class="entry-content" style="text-align: justify !important;">
                                            <?php echo $dato_producto->descripcion; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="tags-section">
                                      
                                        <ul class="social-link-list d-flex flex-wrap">
                                            <li>
                                                <a href="http://www.facebook.com/share.php?u=<?php echo base_url()."productos/leer/".$dato_producto->slug; ?>&title=<?php echo $dato_producto->nombre; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/share?url=<?php echo base_url()."productos/leer/".$dato_producto->slug; ?>&text=<?php echo $dato_producto->nombre; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href=" https://plus.google.com/share?url=<?php echo base_url()."productos/leer/".$dato_producto->slug; ?>" class="google"><i class="fab fa-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()."productos/leer/".$dato_producto->slug; ?>&title=<?php echo $dato_producto->nombre; ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
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
                    <div class="widget-rec-post" style="border: 3px solid #fbf8f2;/* border-radius: 10px; */color: #181818 !important;box-shadow: #131212 3px 2px 2px;background-image: linear-gradient(to left bottom, #eb0925, #ededed, #e9ecef, #f8f9fa, #f8f9fa);">
                        <h4>Últimos productos registrados</h4>     
                        <ul class="recent-post">
                            <?php 

                            foreach ($datos_productos_recientes as $dn): 
                                $imagen = (!empty($dn->url_imagen) && file_exists($dn->url_imagen))?base_url().$dn->url_imagen:$imagen_defecto;

                            ?>
                            <li>
                                <div class="rec-content">
                                    <h6><a href="<?php echo base_url().'productos/leer/'.$dn->slug; ?>"><?php echo $dn->nombre; ?></a></h6>
                                    <span><?php echo $dn->fecha_creacion; ?></span>
                                </div>
                                <div class="rec-thumb">
                                    <a href="<?php echo base_url().'productos/leer/'.$dn->slug; ?>"><img src="<?php echo $imagen; ?>" style="border:2px solid black;" alt="blog"></a>
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