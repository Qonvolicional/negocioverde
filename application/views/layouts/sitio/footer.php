
<!-- footer section start here -->
<footer style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(1, 111, 5, 0.73)),
url(<?php echo base_url(); ?>assets/template/img/p0.jpg);">
        

<div class="btn-whatsapp">
<a href="https://api.whatsapp.com/send?phone=573135907339" target="_blank">
<img class="lazy" data-src="<?php echo base_url(); ?>/assets/template/img/btn_whatsapp.png" alt="">
</a>
</div>



<?php foreach($datos_streaming as $ds){
     $streaming = $ds->estado;
     
        if($ds->estado == "A"){
        ?>
        <div class="btn-streaming">
        
        <a href="javascript:;" style="border: 2px solid red;padding: 6px;border-radius: 50%;background: red;box-shadow: gray 3px 2px 2px;" data-toggle="modal" data-target="#myModal">
            
        <img src="<?php echo base_url(); ?>/assets/template/img/btn_whatsapp.png" alt="">
        </a>
        </div>
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               
                <?php echo $ds->embebed; ?>
              </div>
              <div class="modal-body">
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
              </div>
            </div>
        
          </div>
        </div>
        
        <?php
    }
} 


?>



      <div class="footer-top">
        <div class="container"> 

          <div class="section-wrapper row">
           


            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="post-item">
                <div class="post-title">
                  <h3 style="color:#ffffff;">Información Contacto</h3>
                </div>
                <ul class="footer-post">
                  <li>
                    
                    <div class="post-content" style="text-align: justify !important; font-size: 14px; line-height: 25px !important; color:#ffffff;">
                  <?php foreach ($datos_principal2 as $dp): ?> <?php endforeach;?>    

                      <?php echo $dp->cuerpo; ?> 
                      <p>
                          <a href="" style="color:#fff; margin:5px;"><i class="fab fa-facebook fa-3x"></i></a>
                          <a href="https://www.instagram.com/expoambientechoco/" target="_new" style="color:#fff; margin:5px;"><i class="fab fa-instagram fa-3x"></i></a>
                          <a href="https://www.youtube.com/channel/UCwyv3hEvDIzLJq1-5YXfNvg/videos" target="_new" style="color:#fff; margin:5px;"><i class="fab fa-youtube fa-3x"></i></a>
                          <a href="" style="color:#fff; margin:5px;"><i class="fab fa-phone-square-alt fa-3x"></i></a>
                      </p>
                    </div>
                  </li>
                  <li>
                
          
                  </li>
                 
                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="post-item">
                <div class="post-title">
                  <h3 style="color:#ffffff;">Mapa del Sitio</h3>
                </div>
                <ul class="footer-post">
                  <li>
                    
                    <div class="post-content" style="color:#ffffff !important;">
                      <?php foreach($datos_menu2 as $dm2): ?>

                       <span style="font-size: 13px; color:#ffffff !important;"> <img src="<?php echo base_url(); ?>assets/template/img/tea-plant-leaf-icon.png"><a href="<?php echo base_url(); ?><?php echo $dm2->slugArticulo; ?>" style="color:#ffffff !important;"><?php echo $dm2->nombre; ?></a></span><br>
                    
                    <?php endforeach; ?>
                    </div>
                  </li>
                  <li>
                
          
                  </li>
                 
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="post-item">
                <div class="post-title">
                  <h3 style="color:#ffffff !important;">Galeria</h3>
                </div>
                <ul class="footer-gellary">
                  

                <?php 
                $x = 0;
                foreach ($datos_galeria as $dg):
                  $x++;
                  if ($x <= 6):
                ?>
                <li>
                  <a href="<?php echo base_url().$dg->url; ?>" data-rel="lightcase">
                    <img src="<?php echo base_url().$dg->url; ?>" alt="gellary">
                  </a>
                </li>
                <?php
                  endif;
                 ?>
                
                <?php 
              endforeach;?>  


                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-grama" style="display:none;"></div>
      <div class="footer-bottom wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="background:#d68500 !important;">
        <div class="container">
          <div class="section-wrapper">
            <p class="text-center" style="color:#ffffff !important;">&copy; 2019 - <?php echo date('Y'); ?> <a href="" style="color:#ffffff !important;">Qonvolucional S.A.S</a>. Todos los Derechos Reservados <a href="" style="color:#fff !important;">Ventanilla de Negocios Verdes</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer section start here -->

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="flaticon-chevron-up"></i></a>
    <!-- scrollToTop ending here -->

    
    <script src="<?php echo base_url(); ?>assets/template/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/select2.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/fontawesome.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/jquery.counterup.min.js"></script>
    <script src='<?php echo base_url(); ?>assets/template/js/jquery.easing.js'></script>
    <script src='<?php echo base_url(); ?>assets/template/js/slick.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/template/js/lightcase.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/circular-countdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/theia-sticky-sidebar.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/swiper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/functions.js"></script>
   
    <!-- <script src="<?php //echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

  <script type="text/javascript" src="<?php //echo base_url(); ?>assets/jvectormap/map/jquery-jvectormap-cho-mill-en.js"></script>
  
  <script src="<?php //echo base_url(); ?>assets/template/js/sitio.js"></script>
  
  -->

  <script src="<?php echo base_url(); ?>assets/Chart.js/Chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
  
<?php if(!empty($jquery)): ?>
  <?php 
    //var_dump($jquery);
    if(is_array($jquery)){
      foreach ($jquery as $valor) {
        echo "<script src='".base_url().$valor."'></script>";
      }
    }else{
      echo "<script src='".base_url()."assets/template/js/".$jquery."'></script>";
    }
  ?>
<?php endif; ?>
    <script type="text/javascript">
    $(document).ready(function(){   

 });
</script>

  </body>

</html>