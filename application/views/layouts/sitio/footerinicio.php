
<!-- footer section start here -->
<footer > 
      <div class="footer-bottom mt-6 wow fadeInUp" style="position: relative; margin-top: 30px;" data-wow-duration="1s" data-wow-delay=".1s" >
        <div style="width: 100%; padding: 3px;position: absolute; top:0; left:0; height: 40px; background-color: rgba(233,40,36,0.8);">
        </div>
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-lg-4 col-sm-12">
               <p style="color:white;">Más acerca de Nosotros</p>
                <ul class="row">
                    
                
                <?php 
               if(!empty($menu_secundario)):
                foreach($menu_secundario as $value): 
                  $menuid = $value['id'];
                  $nombre = $value['nombre'];
                  $validSubmenu = !empty($value['submenus']);
                  $href = ($validSubmenu)?base_url()."corporacion/".$menuid."-".$nombre:'#';
                ?>
                  <li class="col-sm-12 col-lg-6" style="padding-top: 5px; color:white;">
                    <a href="<?php echo $href; ?>" style="font-size:16px;padding-top: 10px; color:white;">
                      <?php echo $nombre; ?>  
                    </a>
                    <?php 
                      if($validSubmenu):
                        echo "<ul>";
                        foreach ($value['submenus'] as $sub):
                          $urlSlug=(empty($sub['slugArticulo']))?"corporacion/".$sub['id']."-".$sub['nombre']:$sub['slugArticulo'];    
                    ?>
                          <li><a href="<?php echo base_url().$urlSlug; ?>" style="font-size:16px; margin-left: 16px; color:rgba(255, 255, 255, 0.5);"><?php echo $sub['nombre']; ?></a></li>
                    <?php 
                            endforeach;
                            echo "</ul>";
                          endif;
                        echo "</li>";
                      endforeach;
                    endif;
                    ?>
              </ul>
            </div>
           <div class="col-sm-3">
                   <div class="htop-right" style="position: relative; top:-5px;">
                        <ul class="d-flex p-7 flex-row justify-content-center">
                          <li><a style="color:white; font-size: 30px; margin: 0px 10px;" href="<?php echo $contacto->facebook; ?>" target="_new"><i class="fa fa-facebook"></i></a></li>
                          <li><a style="color:white;font-size: 30px;margin: 0px 10px;" href="<?php echo $contacto->instagram; ?>" target="_new"><i class="fab fa-instagram"></i></a></li>
                          <li><a style="color:white;font-size: 30px;margin: 0px 10px;" href="<?php echo $contacto->youtube; ?>" target="_new"><i class="fab fa-youtube"></i></a></li>
                          <li><a  style="color:white;font-size: 30px;margin: 0px 10px;" href="<?php echo $contacto->twitter; ?>" target="_new"><i class="fab fa-twitter"> </i></a></li>
                        </ul>
                      </div>
           </div>

          </div>


           <div class="section-wrapper" style="padding-top: 2px; border-top: 1px solid #4a4646;">
             <p class="text-center" style="color:#ffffff !important; "> Número de Visitas: <span id="counter" style=""><?php $data = array_map('counter_element',str_split(strval($counter))); 
                  foreach ($data as $key => $value) {
                    echo $value;
                  }
             ?></span></p>
           </div>
          <div class="section-wrapper">

            <p class="text-center" style="color:#ffffff !important;">&copy; <?php echo date('Y'); ?> Todos los Derechos Reservados <a href="" style="color:#fff !important;">Corporación Jovenes Creadores del Chocó</a> <a href="" style="color:#ffffff !important;"> Deserrollador por: Qonvolucional S.A.S</a>. </p>
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
    <!--<script src="<?php echo base_url(); ?>assets/template/js/swiper.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/template/js/functions.js"></script>
    
   
  
  <script src="https://cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
  
<?php if(!empty($jquery)): ?>
  <?php 
    if(is_array($jquery)){
      foreach ($jquery as $valor) {
        echo "<script src='".base_url().$valor."'></script>";
      }
    }else{
      echo "<script src='".base_url()."assets/template/js/".$jquery."'></script>";
    }
  ?>
<?php endif; ?>
  
  </body>
</html>