
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Negocios Verdes</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="index.html">Inicio</a></li>
                                <li><a class="active">Negocios Verdes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

<!-- <?php print_r($datos_servicios); ?> -->
<?php

$xx = 0;
 foreach ($datos_negociosverdes as $dn): 
$xx++;
if ($xx % 2 == 0) {
    $style='style="background-image: linear-gradient(to left top, #007c33, #007255, #006568, #005768, #2f4858);"';
    $text ='style="color: white !important; text-align: justify !important;"';
    $class ="text-f";
}else{
    $style="";
    $text="";
    $class="";
}

?>


<section class="about style-2 padding-tb <?php echo $class; ?>" <?php echo $style; ?>>
      <div class="container">
    <div class="row">
        <div class="<?php if($xx!=3){ echo "col-lg-7"; }else{echo "col-lg-12";}?>">
            <div class="about-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInLeft;">
                <div class="section-header wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                
                        <h2 <?php echo $text; ?>><?php echo $dn->titulo; ?></h2>
                   
                  		<div style="text-align: justify !important;"><?php echo $dn->cuerpo; ?></div>
                </div>
            </div>
        </div>
        <?php if ($xx!=3): ?>
        <div class="col-lg-4">
            <div class="about-right wow fadeInRight" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInRight;">
                <div class="video-post text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="video-thumb">
                        <img class="lazy" data-src="<?php echo $dn->portada; ?>" alt="video-post" style="border-radius: 4px;">
                        <?php if($dn->video <> "" or !empty($dn->video)):   ?>
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


<?php endforeach;?>  