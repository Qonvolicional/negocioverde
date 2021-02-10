
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Información Sobre la Ventanilla</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="index.html">Inicio</a></li>
                                <li><a class="active">Información Sobre la Ventanilla</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

<?php

$xx = 0;
 foreach ($datos_acercade as $dn): 
$xx++;

$style="style=''";
$img ="style=''";

                                if( $xx % 1 == 0){
                                    $style ='style=" background: url('.base_url().'assets/template/images/bg1.png);
                    background-size: cover; background-repeat: no-repeat; background-position: bottom;"';
                        
                            $img="style='border-radius:50%;background:white;'";
                    
                    
                                }
                                
                                
                               if( $xx % 2 == 0){
                                    $style ='';
                                    $img ="";

                                   
                               }
                    
                    
                    
                               
                                
                                if( $xx % 3 == 0){
                                    $style ='style=" background-image: linear-gradient(to right bottom, #ffc89e, #ffd18c, #f7dc7c, #e4ea72, #c5f973);
                    background-size: cover; background-repeat: no-repeat; background-position: bottom;"';
                                }

   if($xx != 4):
?>

  <!-- service single section start here -->
        <section class="service-single padding-tb" <?php echo $style; ?>>
            <div class="container">
            
                <?php 
            
                if ($xx % 2 == 0) {
                ?>
                <div class="service-post video-service row">
                    <div class="col-lg-3">
                        <div class="post-thumb">
                            <img src="<?php echo base_url(),$dn->portada; ?>" alt="service" class="img img-responsive" <?php echo $img; ?>>
                            <!-- <a href="https://www.youtube.com/embed/cZh0nsrkHh8" class="video-icon" data-rel="lightcase">
                                <i class="fab fa-youtube"></i>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="post-content" style="text-align: justify !important;">
                            <h3><?php echo $dn->titulo; ?></h3>
                                <?php echo $dn->descripcion; ?>
                        </div>
                    </div>
                </div>
                <?php

                }
                else{

                ?>
                
                    <div class="service-post row">
                        <div class="col-lg-3">
                            <div class="post-thumb">
                                <img src="<?php echo base_url(),$dn->portada; ?>" alt="service" <?php echo $img; ?>  class="img img-responsive" >
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="post-content" style="text-align: justify !important;">
                                 <h3><?php echo $dn->titulo; ?></h3>
                                    <?php echo $dn->descripcion; ?>
                            </div>
                        </div>
                    </div>
         
                    <?php
                    
                }
     
                 ?>

                
                
            </div>
        </section>
        <!-- service single section start here --><?php endif;
        endforeach;?>  