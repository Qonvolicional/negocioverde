<!-- about section start here -->
<section class="about pt-5">
  <div class="container p-xl-0">
    <div class="section-header section-productos wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" style="margin-bottom: 30px!important;">
      <h2 class="vibrant-color" ><?php echo $menu->nombre; ?></h2>
      <h5 style="color: black; margin-bottom: 50px;" class="mt-4"><?php echo $menu->descripcion; ?></h5>

        <div class="section-wrapper row justify-content-center">
          <?php 
            if(!empty($datos_productos)):
              $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
              $i = 1;
                foreach ($datos_productos as $deq): 
                    $imagen_portada = (!empty($deq->url_imagen) && file_exists($deq->url_imagen))?base_url().$deq->url_imagen:$imagen_defecto;
                    $delay=".$i";
          ?>
              <div class="col-xl-6 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<?php echo $delay; ?>s">


                <div class="post-item-inner text-center producto-item derecha" style="background:url(<?php echo base_url(); ?>/assets/template/img/jch_3.png); background-size: 75px auto;background-repeat: no-repeat;background-position: right bottom;">
                  <div class="post-thumb">
                    <img src="<?php echo $imagen_portada; ?>" alt="about">
                  </div>
                  <div class="post-content">
                    <div class="title">
                      <h5 style="color:rgba(233,40,36,1);"><a href="<?php echo base_url()."productos/leer/".$deq->slug; ?>"><?php echo $deq->nombre; ?></a></h5>
                    </div>
                     <?php if(strlen($deq->descripcion) > 250): ?>
                         <p style="color:black" class="text-justify"><?php echo substr($deq->descripcion, 0, 250) ."... <div class='mx-auto mt-2'><a class='' href='".base_url()."productos/leer/".$deq->slug."' style='color:rgba(233,40,36,1);'>Ver más</a></div>"; ?></p>

                      <?php else: ?>

                       <p style="color:black" class="text-justify"><?php echo $deq->descripcion; ?>
                         <div class="mx-auto mt-2">
                           <a class="" href="<?php echo base_url()."productos/leer/".$deq->slug; ?>" style="color:rgba(233,40,36,1);">Ver más</a>
                         </div> 
                       </p>

                      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php 
                
                      $i++;
          
                    endforeach;
          
              endif;?>
        </div>
        <div class="pagination-area d-flex flex-wrap justify-content-center">
            <?php echo $pagination; ?>
        </div>
      </div>
  </div>
</section>
<!-- about section ending here -->