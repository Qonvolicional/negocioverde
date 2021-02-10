
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3><?php echo $menu->nombre; ?></h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="#">Inicio</a></li>
                                <li><a class="active"><?php echo $menu->nombre; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

<?php
    $styles = array(
                array("style" => 'style="background: url(<?php echo base_url(); ?>assets/template/images/26414152.png)"',
                    "text" => 'style="text-align: justify !important;"',
                     "class" => ""),
                array("style" => 'style="background-image: -webkit-gradient(linear, right bottom, left top, from(#007c33), color-stop(#007255), color-stop(#006568), color-stop(#005768), to(#2f4858));background-image: linear-gradient(to left top, #007c33, #007255, #006568, #005768, #2f4858);"',
                    "text" => 'style="color: white !important; text-align: justify !important;"',
                     "class" => "con-1"),
                array("style" => '',
                    "text" => 'style="color: #5d9913; text-align: justify !important;"',
                     "class" => "")
            );
    $class ="";
    $xx = 0;

    foreach ($contenido as $c ):
        $data = array_shift($styles);
        $style = $data['style'];
        $class = $data['class'];
        $text = $data['text'];
?>
    
    <section class="about style-2 padding-tb <?php echo $class; ?>" <?php echo $style; ?>>
      <div class="container">
        <div class="row">
            <div class="<?php 
                    if(is_null($c->portada))
                    { 
                            echo " col-sm-auto "; 
                    } else 
                    {       echo " col-sm-7 ";

                }    

                if($xx % 2 == 0)
                    echo " pull-left";
                else
                    echo " pull-right ";

                  ?>">
                <div class="about-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInLeft;">
                    <div class="section-header wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    
                            <h2 <?php echo $text; ?>><?php echo $c->nombre; ?></h2>
                       
                            <div class="<?php echo $class; ?>"><?php echo $c->descripcion; ?></div>
                    </div>
                </div>
            </div>
        <?php if(!is_null($c->portada)): ?>
            <div class="col-sm-4 <?php 

                if($xx % 2 == 0)
                    echo " pull-right ";
                else
                    echo " pull-left ";
            ?>">
                <div class="about-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInRight;">
                    <div class="video-post text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="video-thumb">
                            <img class="lazy" data-src="<?php echo base_url().$c->portada; ?>" alt="<?php $c->portada_nombre ?> " style="border-radius: 4px;">
                            <?php if(!empty($c->url_video)):?>
                            <a href="https://www.youtube.com/embed/qcXei1Ux_d0" class="video-icon" data-rel="lightcase">
                                <i class="far fa-play-circle"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        <?php endif; ?>
     </div>
   </div>
</section>

<?php

 endforeach; ?>