
        <!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Negocios Evaluados</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a class="active">Negocios Evaluados</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->
        
        
        
        
        
        <!-- blog section start here -->
        <?php if(!empty($datos_negociose)): ?>  
        
<!-- Team -->
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1"></h5>
        <div class="row">
           
            <?php foreach ($datos_negociose as $dne): ?>
            <?php 
                $logo = ($dne->url==NULL)?"assets/template/img/logo1.png":$dne->url;
                $razon_social_id = preg_replace('/\&(.)[^;]*;/', '\\1', htmlentities($dne->razon_social_id));
                $url = ( trim($dne->razon_social_id)=="")?"#":"https://".$razon_social_id.".ventanilladenegociosverdes.com/";
                $descripcion = ( strlen($dne->descripcion_negocio) > 100)? substr($dne->descripcion_negocio, 0, 100)." ...<br>":$dne->descripcion_negocio;
            ?>
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card" style="height: 435px;">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url().$logo; ?>" alt="card image"></p>
                                    <h4 class="card-title"><?php echo $dne->razon_social; ?></h4>
                                    <p class="card-text" style="text-align:justify;"><?php echo $descripcion; ?></p>

                                    <a style="border: 0px;border-radius: 10px; text-transform: none;display: block;" href="<?php echo $url; ?>" target="_new" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Ir al Perfil</a>
                                    <br>
                                      <?php if(!empty($dne->url_web)): ?>
                                        <a style="border: 1px solid gray; text-transform: none;  color: black; background: transparent;border-radius: 5px;display: block;" href="<?php echo $dne->url_web; ?>" target="_new" class="btn btn-default btn-sm"><i class="fa fa-feed"></i> Ir a la Página</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Sunlimetech</h4>
                                    <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
           
            <?php endforeach;?>  
            
            <div class="pagination-area d-flex flex-wrap justify-content-center col-12">
                
                <?php 
                
                echo $pagination; 
    
                ?>
            </div>

        </div>
    </div>
</section>
       
    <?php else: ?>
    <section class="fore-zero">
        <div class="section-wrapper">
            <div class="zero-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" >
                <h2>No hay registros correspondientes</h2>
            </div>
        </div>
    </section>
    <?php endif; ?>