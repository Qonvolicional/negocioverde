<!-- about section start here -->
<section class="about pt-5">
  <div class="container p-xl-0">
    <div class="section-header section-productos wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" style="margin-bottom: 30px!important;">
      <h2 class="vibrant-color" ><?php echo $menu->nombre; ?></h2>
      <?php if(strlen($menu->descripcion) > 130): ?>
        <p style="color:black; margin-bottom: 50px;"><?php echo substr($menu->descripcion, 250); ?></p>
      <?php else: ?>
        <p style="color:black; margin-bottom: 50px;"><?php echo $menu->descripcion; ?></p>
      <?php endif; ?>

        <div class="section-wrapper row justify-content-center">
          <?php 
            if(!empty($datos_testimonios)):
              $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
              $i = 1;
                foreach ($datos_testimonios as $deq): 
                    $imagen_portada = (!empty($deq->url_imagen) && file_exists($deq->url_imagen))?base_url().$deq->url_imagen:$imagen_defecto;
                    $delay=".$i";
          ?>
              <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<?php echo $delay; ?>s">


                <div class="lazy post-item-inner text-center testimonio-item" style="background:url(<?php echo base_url(); ?>/assets/template/img/jch_3.png); background-size: 75px auto;background-repeat: no-repeat;background-position: right bottom; border-radius: 10px 10px 40px 10px; min-height: 420px;">
                  <div class="post-thumb">
                    <img class="img-fluid rounded-circle" style="height: 150px; width: 150px; border-top: 3px solid rgba(17, 102, 129, 1);
    border-right: 3px solid rgba(237, 184, 3, 1);
    border-bottom: 3px solid rgba(244, 144, 77, 1);
    border-left: 3px solid rgba(223, 40, 36, 1); "src="<?php echo $imagen_portada; ?>" alt="about">
                  </div>
                  <div class="post-content">
                    <div class="title">
                      <h5 style="color:black"><a href="<?php echo base_url()."testimonios/leer/".$deq->slug; ?>"><?php echo $deq->nombre_completo." (".$deq->nombre.") "; ?></a></h5>
                    </div>
                    <!--h6 class="text-center mt-2 mb-5" style="color:#901f61;">Puedes descubrir este testimonio al dar clic al siguiente botón.</h6-->
                    <a href="<?php echo base_url()."testimonios/leer/".$deq->slug; ?>" style="color:rgba(233,40,36,1); padding: 10px; border:1px solid rgba(233,40,36,1);"><i class="far fa-hand-point-right"></i> Acompañanos</a>
                  </div>
                </div>
              </div>
              <?php 
                
                      $i++;
          
                    endforeach;
          
              endif;?>
        </div>
        
        <div class="pagination-area d-flex flex-wrap justify-content-center">
            
            <?php 
                if(isset($pagination)){
                    echo $pagination;  
                }else{
                    echo "<h5 class='vibrant-color'>No hay testimonios registrados.</h5>";
                }
               
            ?>
        </div>
      </div>
  </div>
</section>
<!-- about section ending here -->