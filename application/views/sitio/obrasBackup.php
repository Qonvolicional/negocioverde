<!-- Shop Page Section start here -->               
<section class="shop-page pt-5">
    <div class="container p-xl-0">
        <div class="shop-product" data-wow-duration="1s" data-wow-delay=".1s" style="margin-bottom: 30px!important;"><h2 style="" class="text-center vibrant-color"><?php echo $menu->nombre; ?></h2>
            <p style="color:black; margin-bottom: 50px;"><?php echo $menu->descripcion; ?></p>
            <div class="row">
                <div class="col-12 sticky-widget">
                    
                        <?php 
                            if(!empty($datos_obras)):
                              $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
                              $i = 1; 
                        ?>
                        <div class="shop-product-wrap list">
                            <?php
                                  foreach ($datos_obras as $deq): 
                                    $imagen_portada = (!empty($deq->url_imagen) && file_exists($deq->url_imagen))?base_url().$deq->url_imagen:$imagen_defecto;
                            ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                
                                    <div class="product-list-item obras-item align-items-start" style="background:url(<?php echo base_url(); ?>assets/template/img/jch_3.png); background-size: 50px auto;background-repeat: no-repeat;background-position: right bottom;">
                                        <div class="product-thumb" style="border-radius: 8px;">
                                          <img class="lazy" data-src="<?php echo $imagen_portada;?>" style="max-height: 290px: " alt="shop">
                                          <div class="product-action-link">
                                            <a style="font-weight: bold; background: transparent; width: 120px; color:white;" href="<?php echo base_url()."obras/leer/".$deq->slug; ?>"> <i style="color:white;" class="far fa-eye"></i> Ver más</a>
                                          </div>
                                        </div>
                                        <div class="product-content">
                                            <a href="<?php echo base_url()."obras/leer/".$deq->slug; ?>">
                                            <h5 class="text-justify">
                                                    <?php echo $deq->nombre; ?>
                                                </h5>
                                            </a>
                                          <hr class="my-3">
                                          <?php if(strlen($deq->sinopsi) > 250): ?>
                                            <p style="color:black" class="text-justify"><?php echo substr($deq->sinopsi, 0, 250) ."... <div class='mx-auto mt-2'><a class='' href='".base_url()."obras/leer/".$deq->slug."' style='color:rgba(233,40,36,1);'>Ver Obra</a></div>"; ?>
                                             </p>
                                          <?php else: ?>
                                           <p style="color:black" class="text-justify"><?php echo $deq->sinopsi; ?>
                                             <div class="mx-auto mt-2">
                                               <a class="" href="<?php echo base_url()."obras/leer/".$deq->slug; ?>" style="color:rgba(233,40,36,1);">Ver Obra</a>
                                             </div> 
                                           </p>
                                          <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                                <div class="pagination-area d-flex flex-wrap justify-content-center">
                <?php echo $pagination; ?>
            </div></div>
                                <?php 
                                else:
                                    echo "<h4 class='text-center vibrant-color'>No hay obras asociadas a la categoria.</h4>";
                                    
                                endif;
                                ?>
                        
                </div>
            </div>
            <?php if(!empty($pagination)):?>
            
            <?php endif;?>
        </div>
    </div>
</section>
<!-- Shop Page Section ending here -->