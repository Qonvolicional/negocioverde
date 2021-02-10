<div class="content-wrapper">
	<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Referentes <small class="text-sm">Editar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>referente"><i class="fa fa-dashboard"></i> Referente</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </section>
  <?php 
  	$imagen = ($persona->sexo_id>1)?base_url()."assets/template/img/avatar2.png":base_url()."assets/template/img/avatar.png";

  	$imagen_perfil = ($usuario->imagen=="" || !file_exists($usuario->imagen))? $imagen:base_url().$usuario->imagen;
  ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $persona->nombres; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."referente/"; ?>">
            <div class="card-header bg-light">
				<div class="d-flex">
					<img src="<?php echo $imagen_perfil; ?>" class="mx-auto rounded-circle img-responsive img-thumbnail" style="width: 150px; height: 150px;" alt="User Image" id="previsualizar"> 
						<span id="editarImagen" class="fas fa-user-circle border border-dark bg-light text-danger" style="position: absolute; left: 54%; top: 70%; color: black; height: 20px; width:20px; font-size: 1.2em; text-align: center; opacity: 1; border-radius: 50%;"></span>
				</div>
			</div>
            <form role="form" action="<?php echo base_url();?>referente/actualizarPerfilUsuario" method="post" enctype="multipart/form-data">
              	<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario->id; ?>">
	    		<input type="hidden" name="persona_id" id="persona_id" value="<?php echo $persona->id; ?>">
              	<h4 class="card-header display-5">Datos Personales</h4>
              	<div id="datos_personales" class="card-body container">
	                <div class="row">
	                  <div class="form-group col-md-6 <?php echo form_error('tipo_documento') == true ? 'has-error':''?>">
	                    <label for="tipo_documento">(*)Tipo de identificacion</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="tipo_documento" name="tipo_documento" required>
	                        <option value="">Selecciona una opción</option>
	                        <?php if(!empty($tipoidentificacion)):?>
	                          <?php foreach($tipoidentificacion as $ti):?>
	                            <option value="<?php echo $ti->id;?>" <?php echo (set_value('tipo_documento')==$ti->id || $ti->id == $persona->tipo_documento_id)?'selected':''; ?> ><?php echo $ti->nombre." - ".$ti->descripcion;?></option>
	                          <?php endforeach;?>
	                      <?php endif;?>
	                    </select>
	                    <?php echo form_error("tipo_documento","<span class='help-block'>","</span>");?>
	                  </div>
	                  
	                  <div class="form-group col-md-6 <?php echo form_error('identificacion') == true ? 'has-error':''?>">
	                    <label for="identificacion">(*)Identificación</label> 
	                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ingrese el número de identificación" value="<?php echo $persona->identificacion; ?>" required readonly>
	                    <?php echo form_error("identificacion","<span class='help-block'>","</span>");?>
	                  </div>
	                </div>
	                
	                <div class="row">
						<div class="form-group col col-md-6">
							<label for="nombres">(*)Nombres</label>
							<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres de la persona" value="<?php echo $persona->nombres; ?>" required>
						</div>
						<div class="form-group col col-md-6">
							<label for="apellidos">(*)Apellidos</label>
							<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $persona->apellidos; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col col-md-4 <?php echo form_error('sexo_id') == true ? 'has-error':''?>">
	                    <label for="sexo_id">(*)Género</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="sexo_id" name="sexo_id" required>
	                        <option value="">Selecciona una opción</option>
	                        <?php if(!empty($sexo)):?>
	                          <?php foreach($sexo as $s):?>
	                            <option value="<?php echo $s->id;?>" <?php echo (set_value('sexo_id')==$s->id || $persona->sexo_id == $s->id)?'selected':''; ?> ><?php echo $s->nombre;?></option>
	                          <?php endforeach;?>
	                      <?php endif;?>
	                    </select>
	                    <?php echo form_error("sexo_id","<span class='help-block'>","</span>");?>
	                  	</div>
						<div class="form-group col col-md-4">
							<label for="fecha_nacimiento">(?)Fecha de nacimiento</label>
							<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="fecha_nacimiento de la persona" value="<?php echo $persona->fecha_nacimiento; ?>">
						</div>
						<div class="form-group col col-md-4 <?php echo form_error('municipio_nacimiento_id') == true ? 'has-error':''?>">
	                    <label for="municipio_nacimiento_id">(*)Municipio de nacimiento</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="municipio_nacimiento_id" name="municipio_nacimiento_id" required>
	                        <option value="">Selecciona una opción</option>
	                        <?php if(!empty($municipios)):?>
	                          <?php foreach($municipios as $m):?>
	                            <option value="<?php echo $m->id;?>" <?php echo (set_value('municipio_nacimiento_id')==$m->id || $persona->municipio_nacimiento_id == $m->id)?'selected':''; ?> ><?php echo $m->nombre;?></option>
	                          <?php endforeach;?>
	                      <?php endif;?>
	                    </select>
	                    <?php echo form_error("municipio_nacimiento_id","<span class='help-block'>","</span>");?>
	                  	</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-4">
							<label for="correo">Correo Electrónico</label>
							<input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="<?php echo $persona->correo; ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="celular">Celular</label>
							<input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" value="<?php echo $persona->celular; ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="fijo">Telefono fijo</label>
							<input type="text" name="fijo" id="fijo" class="form-control" placeholder="Telefono Fijo" value="<?php echo $persona->fijo; ?>">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6 <?php echo form_error('municipio_residencia_id') == true ? 'has-error':''?>">
	                    <label for="municipio_residencia_id">(*)Municipio de residencia</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="municipio_residencia_id" name="municipio_residencia_id" required>
	                        <option value="">Selecciona una opción</option>
	                        <?php if(!empty($municipios)):?>
	                          <?php foreach($municipios as $m):?>
	                            <option value="<?php echo $m->id;?>" <?php echo (set_value('municipio_residencia_id')==$m->id || $persona->municipio_residencia_id==$m->id)?'selected':''; ?> ><?php echo $m->nombre;?></option>
	                          <?php endforeach;?>
	                      <?php endif;?>
	                    </select>
	                    <?php echo form_error("municipio_residencia_id","<span class='help-block'>","</span>");?>
	                  	</div>
						<div class="form-group col-md-6">
							<label for="direccion">Dirección</label>
							<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?php echo $persona->direccion; ?>">
						</div>
					</div>
				</div>

				<h4 class="card-header display-5">Datos de perfil</h4>
				<input type="hidden" name="archivo_id" value="<?php echo $usuario->archivo_id; ?>">
				<div class="card-body container">
					<div class="form-group">
						<label for="">Imagen de perfil</label>
						<div class="custom-file">	
							<input type="file" name="imagen" id="imagen" class="custom-file-input" accept="image/*">
							<label class="custom-file-label">Seleccionar imagen de perfil...</label>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="tipo_perfil_id">(*)Tipo de referente</label>
							<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="tipo_perfil_id" name="tipo_perfil_id" required>
		                        <option value="">Selecciona una opción</option>
		                        <?php if(!empty($tipoperfil)):?>
		                          <?php foreach($tipoperfil as $tp):?>
		                            <option value="<?php echo $tp->id;?>" data-acceso="<?php echo $tp->usuario_acceso; ?>" <?php echo (set_value('tipo_perfil_id')==$tp->id || $usuario->tipo_perfil_id==$tp->id)?'selected':''; ?> ><?php echo $tp->nombre;?></option>
		                          <?php endforeach;?>
		                      <?php endif;?>
		                    </select>
						</div>
						<?php if(false): ?>
						<div class="form-group col-md-6">
							<label for="rol_id">(*)Rol</label>
							<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="rol_id" name="rol_id" required>
		                        <option value="">Selecciona una opción</option>
		                        <?php if(!empty($roles)):?>
		                          <?php foreach($roles as $r):?>
		                            <option value="<?php echo $r->id;?>" <?php echo (set_value('rol_id')==$r->id || $usuario->rol_id==$r->id)?'selected':''; ?> ><?php echo $r->nombre;?></option>
		                          <?php endforeach;?>
		                      <?php endif;?>
		                    </select>
						</div>
						<?php endif; ?>
					</div>
					
					<div class="form-group">
						<label for="descripcion">(?)Descripción</label>
						<textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Agregar información del referente"><?php echo $usuario->descripcion; ?></textarea>
					</div>

					<div class="form-group">
						<label for="habilidades_id">(*)Habilidades</label>
						<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="habilidades_id" name="habilidades_id[]" required multiple="multiple">
	                        <option value="">Selecciona una opción</option>
	                        <?php if(!empty($habilidades)):?>
	                          <?php foreach($habilidades as $h):?>
	                            <option value="<?php echo $h->id;?>" <?php echo (!empty($usuario_habilidad) && in_array($h->id, array_column($usuario_habilidad, 'habilidad_id')))?'selected':''; ?> ><?php echo $h->nombre;?></option>
	                          <?php endforeach;?>
	                      <?php endif;?>
	                    </select>
					</div>
					
					<div class="form-group" id="redes_sociales">
						<label>Redes sociales</label>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="">Facebook</label>
								<input type="url" class="form-control" name="facebook" id="facebook" placeholder="Enlace de Facebook" value="<?php echo (!empty($redes))?$redes->facebook:""; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="">Instagram</label>
								<input type="url" class="form-control" name="instagram" id="instagram" placeholder="Enlace de Instagram" value="<?php echo (!empty($redes))?$redes->instagram:""; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="">LinkedIn</label>
								<input type="url" class="form-control" name="linkedin" id="LinkedIn" placeholder="Enlace de LinkedIn" value="<?php echo (!empty($redes))?$redes->linkedin:""; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="">Youtube</label>
								<input type="url" class="form-control" name="youtube" id="youtube" placeholder="Enlace de Youtube" value="<?php echo (!empty($redes))?$redes->youtube:""; ?>">
							</div>
						</div>
					</div>

				</div>

              
              <!-- /.card-body -->
              <!-- .card-footer -->
              <div class="card-footer d-flex">
                <div class="ml-auto btn-group">
                  <a href="<?php echo base_url(); ?>referente" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
                  <button type="submit" class="btn bg-gradient-danger btn-flat active" name="btn-guardar" id="btn-guardar"><span class="fa fa-save"> Guardar</span></button>
                </div>
              </div>
			  <!-- /.card-footer -->
            </form>
            <h4 class="card-header bg-light">Reestablecer Credenciales</h4>
			<form method="POST" action="<?php echo base_url();?>referente/reestablecerCredencial" class="card-footer d-flex">
				<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario->id;?>">
				<div class="mx-auto" >
					<button type="submit" style="margin-bottom: 5px;" class="btn btn-lg btn-danger">REESTRABLECER</button>
				</div>
			</form>
			

          </div>
        </div>
      </div>
    </div> 
  </section>
</div>
