<section class="perfil" style="padding: 16px 0; ">
	<div class="container">
		<div class="row">
			<div class="col-sm foto-redes">
				<?php 

	              $imagen = ($perfil->sexo_id>1)?base_url()."assets/template/img/jch_6.png":base_url()."assets/template/img/avatar.png";

	             $imagen_perfil = (!file_exists($perfil->foto))? $imagen:base_url().$perfil->foto;
          		?>

				<div class="lazy" id="foto-perfil" style="width:200px; height: 200px; 
		                  background:url(<?php echo $imagen_perfil; ?>); 
		                  background-size:cover; 
		                  background-position:center; 
		                  border-radius:50%; 
		                  border-top: 4px solid rgba(17, 102, 129, 1);
		                  border-right: 7px solid rgba(237, 184, 3, 1);
		                  border-bottom: 4px solid rgba(244, 144, 77, 1);
		                  border-left: 7px solid rgba(223, 40, 36, 1); 
		                  margin: 0 auto; 
		                  margin-top:-100px;
		                  ">
				</div>
				<h5 class="text-center">Referente</h5>
				<h6 class="text-center"><span class="badge badge-dark"><?php echo (empty($perfil->rol)) ? 'Sin información': $perfil->rol; ?></span></h6>
				<div>
					<ul class="social-link-list d-flex flex-wrap justify-content-center">
		              <li><a href="<?php echo (empty($perfil->facebook)) ? '#' : $perfil->facebook; ?>" class="facebook" target="_new"><i class="fa fa-facebook-f" style="margin-top: 10px;"></i></a></li>
		              <li><a href="<?php echo (empty($perfil->linkedin)) ? '#': $perfil->linkedin; ?>" class="twitter-sm" target="_new"><i class="fa fa-twitter" style="margin-top: 10px;"></i></a></li>
		              <li><a href="<?php echo (empty($perfil->instagram)) ? '#' : $perfil->instagram; ?>" class="instagram" target="_new"><i class="fa fa-instagram" style="margin-top: 10px;"></i></a></li>
		              <li><a href="<?php echo (empty($perfil->youtube)) ? '#' : $perfil->youtube; ?>" class="youtube" target="_new"><i class="fa fa-youtube-play" style="margin-top: 10px;"></i></a></li>
		            </ul>
				</div>
			</div>


			<div class="col-sm-6">
				<h3><?php echo $perfil->nombre; ?></h3>
				<p><i style="font-style:italic;" class="fa fa-volume-control-phone"> <?php echo $perfil->celular; ?></i> <i class="fa fa-envelope" style="font-style:italic;"> <?php echo $perfil->correo;?></i> </p>
				<p class="perfil-descripcion"><?php echo (empty($perfil->descripcion)) ?  "Sin información" : $perfil->descripcion; ?></p>

				<h4>Capacidades</h4>
				<p style="margin-left: 12px;">
					<?php if(!empty($perfil_habilidades)): ?>
						<?php foreach ($perfil_habilidades as  $value): ?>
							<span class="badge badge-dark" style="padding: 5px; font-size: 18px;"><?php echo $value->nombre; ?></span>
						<?php endforeach; ?>
					<?php else: ?>
						<span>Sin Información</span>
					<?php endif; ?>
				</p>
			</div>

			<div class="col-sm">
				<?php if(!empty($perfil->apadrinamiento)): ?>
					<a href="<?php echo base_url().'apadrinamiento/referente/'.$perfil->id; ?>" class="btn btn-danger  btn-lg btn-block"><i class="fa fa-heart" style="color:white;"></i> Apadrinar</a>
				<?php endif; ?>	
				<a href="<?php echo base_url().'inspira/referentes/'; ?>" class="btn btn-light  btn-lg btn-block">Ver más</a>
			</div>
		</div>
		
	</div>
	<div class="bg-app-row lazy" style="background: url(<?php echo base_url().$randon_image->url; ?>);
	background-size: cover; height: 300px; width: 100%;position: relative; margin-top: 50px; filter:blur(1px);-webkit-box-shadow: inset 9px 50px 100px 10px rgba(0,0,0,0.75);
-moz-box-shadow: inset 9px 50px 100px 10px rgba(0,0,0,0.75);
box-shadow: inset 9px 50px 100px 10px rgba(0,0,0,0.75);">
	<div class="translucent-black"></div>
	  <div class="style-curve-top">
              <svg viewBox="0 0 100 190" preserveAspectRatio="none">
                <path d="M 0 190 C 30 190, 70 70, 100 190" stroke="white" fill="white" />
              </svg>
            </div>
		
		 <div class="style-curve-top tranformation-0">
              <svg viewBox="0 0 100 190" preserveAspectRatio="none">
                <path d="M 0 190 C 30 190, 70 50, 100 190" stroke="white" fill="white" />
              </svg>
            </div>
	</div>
	<div class="container p-8">
		<div class="row"  >
			<div class="col-8 mx-auto" >
				<h3 class="text-center app-vibrant-text"> ¿ Quieres enviar una  solictud de apadrinamiento para nuestros referentes pero no sabes como funciona ? </h3>
				<div class="row">
					<div class="col-12 text-center">
					<h5><a href="<?php echo base_url()?>apadrinamiento/como-funciona"> Mira como funciona el apadrinamiento de un referente </a> </h5> </div>
				</div>
			</div>
		</div>
	</div>
</section>