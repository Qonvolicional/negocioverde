<section class="team-member">
   <div style="position: absolute;
              background: url(<?php echo base_url()."assets/template/img/jch_3.png" ?>);
              background-size: 100% 100%;
              opacity: 0.1;
              top:0;
              width: 100%;
              height: 100%;
              background-repeat: no-repeat;
              background-clip: content-box;
  ">
  </div>
      <div class="container">
        <div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">
          <h2><?php echo $menu->nombre; ?></h2>
          <p><?php echo $menu->descripcion; ?></p>
        </div>
        <div class="section-wrapper row justify-content-center">
         
         <?php foreach ($datos_equipo as $deq): ?>
          <?php 
              $imagen = ($deq->sexo_id>1)?base_url()."assets/template/img/jch_6.png":base_url()."assets/template/img/avatar.png";

              $imagen_perfil = (!file_exists($deq->foto))? $imagen:base_url().$deq->foto;
           ?>

          <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; margin-bottom: 25px;">
            <div class="text-center">
              <div class="post-thumb">
                  <div class="lazy" style="width:200px; height: 200px; 
                  background:url(<?php echo  $imagen_perfil; ?>); 
                  background-size:cover; 
                  background-position:center; 
                  border-radius:50%; 
                  border-top:3px solid rgba(17, 102, 129, 1);
                  border-right: 3px solid rgba(237, 184, 3, 1);
                  border-bottom: 3px solid rgba(244, 144, 77, 1);
                  border-left: 3px solid rgba(223, 40, 36, 1); 
                  margin: 0 auto; 
                  margin-bottom:10px;">
                  </div>
                      <div class="post-content" style="color:rgba(0,0,0,0.8); border-radius:10px;min-height: 90px;">
                  <h4><a href="<?php echo base_url().'persona/perfil/'.$deq->id; ?>" style="cursor: pointer;"><?php echo $deq->nombre; ?></a></h4>
                  <span style="color:rgba(0,0,0,0.7);"><?php echo $deq->rol; ?></span>
                  <a href="<?php echo base_url().'referente/perfil/'.$deq->id; ?>" class="btn btn-dark  btn-lg btn-block"><i class="fa fa-heart" style="color:white;"></i> Ver perfil</a>
                </div>
                
              </div>
            </div>
          </div>
          <?php endforeach;?>  
            <div style="height:26px;"></div>
        </div>
         <div class="pagination-area d-flex flex-wrap justify-content-center col-12">
                
                <?php 
                
                echo $pagination; 
    
                ?>
            </div>
      </div>

     

     
    </section>  
   