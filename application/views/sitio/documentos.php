<section class="page-header padding-tb page-header-bg-1">
    <div class="container">
        <div class="page-header-item d-flex align-items-center justify-content-center">
            <div class="post-content">
                <h3>Documentos de Acceso Público</h3>
                <div class="breadcamp">
                    <ul class="d-flex flex-wrap justify-content-center align-items-center">
                        <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                        <li><a class="active">Documentos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


     <?php if(count($documentos) > 0):  ?>
        <?php foreach ($documentos as $dn): ?>
                                 <?php endforeach;?>  


         <!-- blog section start here -->
        <section class="blog-page padding-tb">
            <div class="container p-md-0">
                <div class="section-wrapper">
                    <div class="col-lg-12 sticky-widget">
                        <div class="blog blog-single">
                            <div class="section-wrapper">
                            <?php foreach ($datos_documentos as $dd): ?>
                            <!--<div style="padding: 5px;border: 1px solid #e495330d;width: 23%;border-radius: 6px;background: orange;color: #fff;text-transform: uppercase;font-size: 13px;box-shadow: 3px 2px 3px #e1e1e1;margin: 3px;"> 
                            <img src="<?php echo base_url();?>assets/template/img/logo1.png" style="width: 20px; height: 20px; background: #FFF; border-radius: 50%;"  title="<?php echo $dd->descripcion; ?>">
                            <span>
                            <a href="<?php echo base_url().$dd->Url; ?>" target="_new" style="text-decoration: #FFF; color: #FFF;" alt="<?php echo $dd->descripcion; ?>" title="<?php echo $dd->descripcion; ?>">
                            </span>
                            </div> -->
                            
                            
                            <div class="col-md-3" style="border: 1px solid orange;border-radius: 10px;background: orange;box-shadow: gray 3px 2px 2px;text-align: justify;color: white; margin:5px;">
                            <h5 style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;margin: -1px;color: #FFF;background: #64a33f;font-size: 14px;padding: 2px;"><?php echo $dd->nombre; ?></h5>
                            <p><?php echo $dd->descripcion; ?></p>
                            
                                <div style="border: 1px solid #f8ef89;border-top-left-radius: 10px;border-top-right-radius: 10px;margin-bottom: -1px;padding: 5px;font-size: 12px;background: #f8ef89;color: #64a33f;">
                                    <a href="<?php echo base_url().$dd->Url; ?>" target="_new" >
                                        <img src="<?php echo base_url();?>assets/template/img/logo1.png" style="width: 20px; height: 20px; background: #FFF; border-radius: 50%;"  title="<?php echo $dd->descripcion; ?>"> 
                                        <?php echo $dd->nombre; ?>
                                    </a> <sub> Descargable</sub>
                                </div>
                            </div>

                            <?php endforeach;?>  
                              
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
    <?php else: ?>
         <div class="container">
        <section class="fore-zero">
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="zero-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" >
                            <h2 style="word-wrap: break-word; overflow-wrap: break-word; color:  #5d9913;border-radius: 10px;padding: 6px;margin: 0 auto; box-sizing: border-box; margin: 20px;"> <i class="fa fa-info" style="color:  #5d9913;border: 4px solid #5d9913; padding: 20px;border-radius: 100%;" /></i> No hay registros correspondientes a documentos.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>
       
        <!-- Blog section ending here -->
