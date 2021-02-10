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
                        <div class="shop-product-wrap row">
                            <?php
                                $indice = 0;    
                                  foreach ($datos_obras as $deq): 
                                    $fila = intdiv($indice,  3);
                                    $elemento = $indice % 3;
                                    if( ($fila % 2 == 0 && $elemento == 0) OR ($fila % 2 == 1 && $elemento == 2)){
                                        $clase = "col-lg-6 col-md-6 col-12";
                                    }else{
                                        $clase = "col-lg-3 col-md-3 col-12";
                                    }
                                   
                                    $imagen_portada = (!empty($deq->url_imagen) && file_exists($deq->url_imagen))?base_url().$deq->url_imagen:$imagen_defecto;
                            ?>
                                <div class="<?php echo $clase; ?>" style="margin:0px; padding: 0px;">
                                    <div class="product-list-item obras-item align-items-start" style=" padding: 5px; margin-bottom: 5px;">
                                        <div class="product-thumb" style="border-radius: 8px;width: 100%;">
                                          <img class="lazy" data-src="<?php echo $imagen_portada;?>" style="height: 290px; " alt="shop">
                                          <div class="product-action-link" style="height: auto!important;">
                                            <a style="height: auto; width: auto; font-weight: bold; background: transparent; color:white;" href="<?php echo base_url()."obras/leer/".$deq->slug; ?>"> <?php echo $deq->nombre;?></a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $indice++;
                                    endforeach; 
                                ?>
                                
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