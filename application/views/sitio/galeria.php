<section class="page-header padding-tb page-header-bg-1">
    <div class="container">
        <div class="page-header-item d-flex align-items-center justify-content-center">
            <div class="post-content">
                <h3>Galeria de Imagenes</h3>
                <div class="breadcamp">
                    <ul class="d-flex flex-wrap justify-content-center align-items-center">
                        <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                        <li><a class="active">Galeria</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="portfolio style-2 padding-tb">
            <div class="container">
                <div class="section-wrapper">
                    <div class="portfolio-wrapper" style="position: relative; min-height: 983.578px;">
              <?php foreach ($datos_galeria as $dg): ?>
				<div class="post-thumb wow fadeInUp"  style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; width: ">
					<div class="post-thumb-inner post-galeria" style="width: 400px ! important; height: 250px ! important; ">
						<a class="gallery-icon" href="<?php echo base_url().$dg->url; ?>" data-rel="lightcase">
							<i class="fas fa-link"></i>
						</a>
						<img class="lazy" data-src="<?php echo base_url().$dg->url; ?>" src="<?php echo base_url(); ?>assets/template/img/logo1.png" alt="portfolio">
                        <div class="post-description"> <p> <?php echo $dg->nombre; ?></p></div>
					</div>
				</div>
              <?php endforeach;?>  
						

                        
                       
                    </div>
                </div>
            </div>
        </div>