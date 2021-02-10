<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Usuario
        <small>Perfil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>
    <?php  
    	$imagen = ($usuario->imagen=="")? base_url()."assets/template/img/avatar2.png":base_url().$usuario->imagen;
    ?>
    <section class="content">
    	<div class="row">
    		<div class="col col-md-12">
    			<div class="box box-warning">
    				<form role="form" action="<?php echo base_url();?>usuario/actualizarPerfil" method="POST" enctype="multipart/form-data" autocomplete="off">
    					<input type="hidden" name="archivo_id" id="archivo_id" value="<?php echo $usuario->archivo_id; ?>">
						<div class="box-header" style="margin-bottom: 10px;">
							<div class="" style="max-width: 175px; max-height: 175px; margin:0 auto; position: relative;">
								<input type="file" class="img-circle" name="imagen" id="imagen" style="position: absolute; top:0; right: 0; left: 0; bottom: 0; width: 100%; height: 100%; opacity: 0;">
								<img src="<?php echo $imagen; ?>" class="img-circle img-responsive img-thumbnail imagen-perfil" alt="User Image" id="previsualizar"> 
								<span id="editarImagen" class="fa fa-pencil" style="position: absolute; left: 70%; top: 85%; color: black; height: 20px; width:20px; font-size: 1.1em; text-align: center; opacity: 0.6; color: white; background: blue; border-radius: 50%; border: 2px solid black;"></span>
								<!-- <span id="infoImagen"><b>Nombre de imagen: </b>---</span> -->
							</div>
						</div>
    					<h4 class="box-header with-border">DATOS PERSONALES</h2>
    					<div class="box-body">
    						<?php if($this->session->flashdata("errorPerfil")):?>
				              <div class="alert"><?php echo $this->session->flashdata("errorPerfil"); ?> </div>
				            <?php endif; ?>
    						<div class="col-md-12">
    							<input type="hidden" name="persona_id" id="persona_id" value="<?php echo $usuario->persona_id; ?>" >
	    						<div class="row">
									<div class="form-group col col-md-4">
										<label for="identificacion">Identificación</label>
										<input disabled type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identicación" value="<?php echo $usuario->identificacion; ?>">
									</div>
									<input type="hidden" name="rol_id" id="rol_id" value="<?php $usuario->rol_id; ?>">	
									<div class="form-group col col-md-4">
										<label for="nombre1">Primer Nombre</label>
										<input type="text" name="nombre1" id="nombre1" class="form-control" placeholder="Primer Nombre" value="<?php echo $usuario->nombre1; ?>">
									</div>
									<div class="form-group col col-md-4">
										<label for="nombre2">Segundo Nombre</label>
										<input type="text" name="nombre2" id="nombre2" class="form-control" placeholder="Segudo Nombre" value="<?php echo $usuario->nombre2; ?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col col-md-6">
										<label for="apellido1">Primer Apellido</label>
										<input type="text" name="apellido1" id="apellido1" class="form-control" placeholder="Primer Apellido" value="<?php echo $usuario->apellido1; ?>">
									</div>
									<div class="form-group col col-md-6">
										<label for="apellido2">Segundo Apellido</label>
										<input type="text" name="apellido2" id="apellido2" class="form-control" placeholder="Segudo Apellido" value="<?php echo $usuario->apellido2; ?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col col-md-4">
										<label for="correo">Correo Electrónico</label>
										<input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="<?php echo $usuario->correo; ?>">
									</div>
									<div class="form-group col col-md-4">
										<label for="celular">Celular</label>
										<input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" value="<?php echo $usuario->celular; ?>">
									</div>
									<div class="form-group col col-md-4">
										<label for="fijo">Telefono fijo</label>
										<input type="text" name="fijo" id="fijo" class="form-control" placeholder="Telefono Fijo" value="<?php echo $usuario->fijo; ?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label for="direccion">Dirección</label>
										<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?php echo $usuario->direccion; ?>">
									</div>
								</div>
								
								<!-- <div class="form-group">
									<label>Imagen de Perfil</label>
									<input type="file" name="imagen" id="imagen">
								</div> -->
								<div class="btn-group pull-right">
									<a href="<?php echo base_url(); ?>dashboard" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Atrás</span></a>
    								<button type="submit" name="btn-modificar" id="btn-modificar" class="btn btn-success">Modificar <span class="fa fa-save"></span></button>
								</div>
							</div>
    					</div>
    				</form>
    				<form role="form" action="<?php echo base_url();?>usuario/actualizarCredencial" method="POST" autocomplete="off">
    					<h4 class="box-header with-border">CONTRASEÑA</h4>
    					<?php if($this->session->flashdata("errorCredencial")):?>
				              <div class="alert"><?php echo $this->session->flashdata("errorCredencial"); ?> </div>
				            <?php endif; ?>
    					<div class="box-body">
    						<div class="col-md-12">
	    						<div class="row">
									<div class="form-group col col-md-4">
										<label for="clave_actual">Contraseña actual</label>
										<input type="password" name="clave_actual" id="clave_actual" class="form-control" placeholder="Contraseña actual">
									</div>
									<div class="form-group col col-md-4">
										<label for="nueva_clave">Nueva Contraseña</label>
										<input type="password" name="nueva_clave" id="nueva_clave" class="form-control" placeholder="Nueva contraseña">
									</div>
									<div class="form-group col col-md-4">
										<label for="confirma_clave">Confirmar contraseña</label>
										<input type="password" name="confirma_clave" id="confirma_clave" class="form-control" placeholder="Confirmación de contraseña">
									</div>
								</div>
								<div class="btn-group pull-right">
									<a href="<?php echo base_url(); ?>dashboard" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Atrás</span></a>
    								<button type="submit" name="btn-modificar" id="btn-modificar" class="btn btn-success">Modificar <span class="fa fa-save"></span></button>
								</div>
							</div>
    					</div>
    				</form>
    			</div>
    		</div>			
		</div>
    </section>	
</div>