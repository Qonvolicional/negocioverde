
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
        <section class="shop-page padding-tb">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-12 col-12 sticky-widget">
                        <?php if(!empty($negociosEvaluados)): ?>
                                <div class="shop-product-wrap list row">
                                    <?php foreach ($negociosEvaluados as $ne): ?>
                                    <?php 
                                        $logo = ($ne->url==NULL)?"assets/template/img/logo1.png":$ne->url;
                                        $url = (trim($ne->razon_social_id)=="")?"#":"https://".$ne->razon_social_id.".ventanilladenegociosverdes.com/";
                                        
                                    ?>      
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="product-list-item row">
                                            <div class="product-tumb col-6">
                                                <img src="<?php echo base_url().$logo; ?>" alt="bien_servicio">
                                            </div>
                                            <div class="product-content col-6">
                                                <h6><a href="#"><?php echo $ne->razon_social; ?></a></h6>
                                                <small><?php $ne->representante_legal;?></small>
                                                <h6><?php $ne->bien_principal;?></h6>
                                                <p style="text-align: justify;">
                                                <?php echo substr($ne->descripcion_negocio, 0, 100)." ...<br>"; ?>
                                                </p>
                                                <a href="<?php echo $url; ?>" class="btn"><span>Leer Más</span><i class="icofont-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            
                            <div class="pagination-area d-flex flex-wrap justify-content-center">
                                <?php echo $pagination; ?>
                            </div>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>


    