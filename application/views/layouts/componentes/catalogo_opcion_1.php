<section style="position: relative; padding-top: 16px">
        <!-- sponsor section start here -->
    <div class="style-curve-top">
              <svg viewBox="0 0 100 190" preserveAspectRatio="none">
                <path d="M 0 190 C 30 190, 70 100, 100 190" stroke="white" fill="white" />
              </svg>
            </div>

            <div class="style-curve-top-short">
              <svg viewBox="0 0 100 190" preserveAspectRatio="none">
                <path d="M 0 0 C 30 100, 70 100, 100 0" stroke="white" fill="white" />
              </svg>
            </div>
    <div class="sponsor" style="background: rgb(233,40,36);
background: -webkit-gradient(linear, left top, right top, from(rgba(233,40,36,0.5)), color-stop(36%, rgba(255,255,255,1)), color-stop(57%, rgba(255,255,255,1)), color-stop(81%, rgba(6,6,6,0.5)));
background: -o-linear-gradient(left, rgba(233,40,36,0.5) 0%, rgba(255,255,255,1) 36%, rgba(255,255,255,1) 57%, rgba(6,6,6,0.5) 81%);
background: linear-gradient(90deg, rgba(233,40,36,0.5) 0%, rgba(255,255,255,1) 36%, rgba(255,255,255,1) 57%, rgba(6,6,6,0.5) 81%);">
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

         $i = 1;
         foreach ($datos_contenido as $deq): 
            if($i > 3) break;
          ?>

          <div class="col col-sm wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; margin-bottom: 25px;">
            <div class="text-center">
              <div class="post-catalogo-opcion">
                  <div style="width:200px; 
                  height: 200px; 
                  background: url(<?php echo base_url().$deq->portada;?>);
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
                  <h4 style="color:black;"><a href="javascript:;"><?php echo $deq->titulo; ?></a></h4>
                    <?php if(strlen($deq->descripcion) > 250): ?>
                       <p style="color:black"><?php echo substr($deq->descripcion, 0, 250) ."... <a href='#' style='color:rgba(233,40,36,1);'>Ver más</a>"; ?></p>
                     <?php else: ?>
                     <p style="color:black"><?php echo $deq->descripcion; ?></p>
                        <?php endif; ?>
                </div>
                
              </div>
            </div>
          </div>
          <?php 
            $i++;
          endforeach;?>  
        </div>
          </div>
        </div>
      </div>
    </div>


    <!-- sponsor section ending here -->
   </section>
 