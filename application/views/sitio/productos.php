<section style="position: relative; padding-top: 30px; background:url(<?php echo base_url();?>assets/template/img/jch_3.png); background-position:right bottom; background-repeat:no-repeat; background-size: 150px auto;" id="lista-productos">

        <!-- sponsor section start here -->

    

    <div class="sponsor" >
      <div class="container">
        <div class="section-wrapper">
          <div class="sponsor-slider">
            <div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">
              <h2 style="color:black"><?php echo $menu->nombre; ?></h2>
                <?php if(strlen($menu->descripcion) > 130): ?>
                  <p style="color:black"><?php echo substr($menu->descripcion, 250); ?></p>
                <?php else: ?>
                  <p style="color:black"><?php echo $menu->descripcion; ?></p>
                <?php endif; ?>
            </div>
            <div class="section-wrapper row justify-content-center">
              <?php 
                if(!empty($datos_productos)):
                  $imagen_defecto = base_url().'/assets/archivo/Contenido_imagen_Baile__.jpg';
                  $i = 1;
                    foreach ($datos_productos as $deq): 
                        $imagen_portada = (!empty($deq->url_imagen) && file_exists($deq->url_imagen))?base_url().$deq->url_imagen:$imagen_defecto;
                ?>
                  <div class="col col-sm wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; margin-bottom: 25px;">
        
                    <div class="text-center">
        
                      <div class="post-catalogo-opcion">
        
                          <div style="width:200px; 
        
                          height: 200px; 
        
                          background: url(<?php echo $imagen_portada;?>);
        
                          background-size:cover; 
        
                          background-position:center; 
        
                          border-radius: 10%; 
        
                          border-top:3px solid rgba(17, 102, 129, 1);
        
                          border-right: 3px solid rgba(237, 184, 3, 1);
        
                          border-bottom: 3px solid rgba(244, 144, 77, 1);
        
                          border-left: 3px solid rgba(223, 40, 36, 1); 
        
                          margin: 0 auto; 
        
                          margin-bottom:10px;">
                          </div>
        
                          <div class="post-content" style="color:rgba(0,0,0,0.8); border-radius:10px; ">
        
                            <h4 style="color:black;"><a href="<?php echo "/productos/leer/".$deq->slug; ?>"><?php echo $deq->nombre; ?></a></h4>
        
                            <?php if(strlen($deq->descripcion) > 250): ?>
        
                               <p style="color:black"><?php echo substr($deq->descripcion, 0, 250) ."... <a href='/productos/leer/".$deq->slug."' style='color:rgba(233,40,36,1);'>Ver más</a>"; ?></p>
        
                            <?php else: ?>
        
                             <p style="color:black"><?php echo $deq->descripcion; ?> <a href="<?php echo "/productos/leer/".$deq->slug; ?>">Ver Servicio</a></p>
        
                            <?php endif; ?>
  
                          </div>
              </div>
        
                    </div>
        
                  </div>

                  <?php 
        
                    //$i++;
        
                  endforeach;
        
            endif;?>  

            </div>
            
            
          </div>
          
         

        </div>

      </div>

    </div>
    
    <!-- sponsor section ending here -->

</section>

 <div class="pagination-area d-flex flex-wrap justify-content-center">
                <?php echo $pagination; ?>
            </div>