<section class="about style-2" style="position: relative;" >   
    <div class="container">
        <div class="row">
            <?php if(isset($contenido)): ?>
            <?php $i = 1; ?>
            <?php foreach ($contenido as $value): ?>

                <div class="col-sm-4">
                    <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <div class="d-flex justify-content-center column-opcion-header"><p class="text-center vibrant-color"><?php echo $i ?></p></div>
                        <div class="text-center"> </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <h3 class="app-vibrant-text text-center"><?php echo $value->nombre; ?></a></h3>
                                <div style="text-align: justify !important;"><?php echo $value->descripcion; ?>.</div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>

    
</section>