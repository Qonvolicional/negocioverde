<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Formato de Inscripción
        <small> - <?php echo (isset($informacionGeneral))?$informacionGeneral->razon_social:'Agregar'; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>negocioVerde">Negocios Verdes </a></li>
        <li class="active">Formato de Inscripción</li>
      </ol>
    </section>
    <?php 
      $progreso = (!empty($progreso))?$progreso->progreso:0;
      //var_dump($informacionGeneral);
    ?>
    <!-- Main content -->
    <section class="content">
    	<div class="row align-items-end">
    		<div class="form-group col col-md-8" id="ac_url">
                     <label for="url_web">Dirección Web (opcional) </label>
                     <input type="url" class="form-control" name="url_web" id="url_web" placeholder="Dirección Web" value="<?php echo $informacionGeneral->url_web;?>" minlength="10" maxlength="250" unique="empresa" relatedBy="empresa_id">
                      <span class="help-block"></span>
             </div>
             <div class="col-sm-4" >
             	<a href="#" style="margin-top: 25px;" class="btn btn-success btn-flat" id="url_web_guardar"> <span class="fa fa-save"></span> Guardar</a>
             </div>
    	</div>
      <div class="row">

        <div class="col-md-12">
          <!-- /.box -->
          <!-- <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $informacionGeneral->empresa_id; ?>"> -->
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" id="progresoInscripcion" role="progressbar" style="width: <?php echo $progreso; ?>%" aria-valuenow="<?php echo $progreso; ?>" aria-valuemin="0" aria-valuemax="100"> <?php $progreso." %"; ?>
                </div>
              </div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <!-- nav-tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">I. Información General</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab">II. Descripción</a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab">III. Categoría</a></li>
                  <li class=""><a href="#tab_4" data-toggle="tab">IV. Información Empresa</a></li>
                  <li class=""><a href="#tab_5" data-toggle="tab">V. Información del verificador y empresario</a></li>
                  <li class=""><a href="#tab_6" data-toggle="tab">VI. Observaciones generales</a></li>
                </ul>
                <!-- /.nav-tabs -->
                <!-- tab-content --> 
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                    <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $informacionGeneral->empresa_id; ?>">
                    <form role="form" method="post" id="almacenarInformacionGeneral" class="form-agregar" enctype="multipart/form-data">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title text-success">I. INFORMACIÓN GENERAL</h3>
                      </div>
                      <!-- <input type="hidden" name="informacion_as" id="informacion_as" value="si">
                      <input type="hidden" name="verificacion1" id="verificacion1" value="si">
                      <input type="hidden" name="verificacion2" id="verificacion2" value="si">
                      <input type="hidden" name="plan_mejora" id="plan_mejora" value="si">
                      <input type="hidden" name="fecha_registro" id="fecha_registro"> -->
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="tipo_persona_id">(*)Tipo de Persona</label>
                              <select id="tipo_persona_id" name="tipo_persona_id" class="form-control" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($tipo_persona)):?>
                                  <?php foreach($tipo_persona as $tp): ?>
                                    <option value="<?php echo $tp->id; ?>" <?php echo ($tp->id == $informacionGeneral->tipo_persona_id)?'selected':'';?> ><?php echo $tp->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="tipo_identificacion_id">(*)Tipo de Identificación</label>
                              <select id="tipo_identificacion_id" name="tipo_identificacion_id" class="form-control" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($tipo_identificacion)):?>
                                  <?php foreach($tipo_identificacion as $ti): ?>
                                    <option value="<?php echo $ti->id; ?>" <?php echo ($ti->id == $informacionGeneral->tipo_identificacion_id)?'selected':'';?> ><?php echo $ti->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="identificacion">(*)Número de Identificación</label>
                              <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación" value="<?php echo $informacionGeneral->identificacion;?>" required minlength="7" maxlength="15" unique="empresa" relatedBy="empresa_id">
                              <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-12">
                            <label for="razon_social">(*)Razón Social</label>
                            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Razón Social" value="<?php echo $informacionGeneral->razon_social;?>" required minlength="5" maxlength="50" unique="empresa" relatedBy="empresa_id">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <h5><b>Representante Legal</b></h5>  
                        <div class="row">
                          <input type="hidden" name="representante_legal_id" id="representante_legal_id" value="<?php echo $informacionGeneral->representante_legal_id; ?>">  
                          <div class="form-group col col-md-4">
                            <label for="identificacion2">(*)Documento</label>
                            <input <?php ($informacionGeneral->persona_id==NULL)?'':'disabled'; ?> type="text" class="form-control persona" id="persona_identificacion" name="persona_identificacion" placeholder="Documento" value="<?php echo $informacionGeneral->documento;?>" required minlength="7" maxlength="15">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre1">(*)Primer Nombre</label>
                            <input type="text" class="form-control persona" id="nombre1" name="nombre1" placeholder="Primer Nombre" value="<?php echo $informacionGeneral->nombre1;?>" required minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control persona" id="nombre2" name="nombre2" placeholder="Segundo Nombre" value="<?php echo $informacionGeneral->nombre2;?>" minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="apellido1">(*)Primer Apellido</label>
                            <input type="text" class="form-control persona" id="apellido1" name="apellido1" placeholder="Primer Apellido" value="<?php echo $informacionGeneral->apellido1;?>" required minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control persona" id="apellido2" name="apellido2" placeholder="Segundo Apellido" value="<?php echo $informacionGeneral->apellido2;?>" minlength="3" maxlength="30">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="correo">(*)Correo</label>
                            <input type="email" class="form-control persona" id="correo" name="correo" placeholder="Correo Electrónico" value="<?php echo $informacionGeneral->correo;?>" required maxlength="100"> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="fijo">Telefono Fijo</label>
                            <input type="text" class="form-control persona" id="fijo" name="fijo" placeholder="Telefono Fijo" value="<?php echo $informacionGeneral->fijo;?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="celular">(*)Celular</label>
                            <input type="text" class="form-control persona" id="celular" name="celular" placeholder="Celular" value="<?php echo $informacionGeneral->celular;?>" required minlength="7" maxlength="15">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control persona" id="direccion" name="direccion" placeholder="Dirección de Correspondencia" value="<?php echo $informacionGeneral->direccion;?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-6">
                            <label for="region">(*)Región</label>
                            <select id="region" name="region" class="form-control no" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($region)):?>
                                  <?php foreach($region as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo ($r->id == $informacionGeneral->region_id)?'selected':'';?>><?php echo $r->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-6">
                            <label for="autoridad_ambiental_id">(*)Autoridad Ambiental</label>
                            <select id="autoridad_ambiental_id" name="autoridad_ambiental_id" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($autoridad_ambiental)):?>
                                  <?php foreach($autoridad_ambiental as $aa): ?>
                                    <option value="<?php echo $aa->id; ?>" <?php echo ($aa->id == $informacionGeneral->autoridad_ambiental_id)?'selected':'';?>><?php echo $aa->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                           <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="departamento">(*)Departamento</label>
                            <select id="departamento" name="departamento" class="form-control no" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($departamento)):?>
                                  <?php foreach($departamento as $d): ?>
                                    <option value="<?php echo $d->id; ?>" <?php echo ($d->id == $informacionGeneral->departamento_id)?'selected':'';?>><?php echo $d->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3 <?php echo !empty(form_error('municipio_id')) ? 'has-error': ''; ?>">
                            <label for="municipio_id">(*)Municipio</label>
                            <select id="municipio_id" name="municipio_id" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($municipio)):?>
                                  <?php foreach($municipio as $m): ?>
                                    <option value="<?php echo $m->id; ?>" <?php echo ($m->id == $informacionGeneral->municipio_id)?'selected':'';?>><?php echo $m->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="vereda">Vereda</label>
                            <input type="text" class="form-control" id="vereda" name="vereda" placeholder="Vereda" value="<?php echo $informacionGeneral->vereda;?>">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="direccion_predio">Dirección del predio</label>
                            <input type="text" class="form-control" id="direccion_predio" name="direccion_predio" placeholder="Dirección de Predio" value="<?php echo $informacionGeneral->direccion_predio;?>">
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-md-3 dl-horizontal">
                            <label>Localización específica
                            </label>
                          </div>         
                          <div class="form-group col col-md-3">
                            <label for="coordenada_n">a) Coordenada Norte</label>
                            <input type="text" class="form-control" id="coordenada_n" name="coordenada_n" placeholder="Coordenada Norte" value="<?php echo $informacionGeneral->coordenada_n;?>">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="coordenada_w">b) Coordenada Oeste</label>
                            <input type="text" class="form-control" id="coordenada_w" name="coordenada_w" placeholder="Coordenada Oeste" value="<?php echo $informacionGeneral->coordenada_w;?>">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="altitud">c) Altitud (m.s.n.m)</label>
                            <input type="text" class="form-control" id="altitud" name="altitud" placeholder="Altitud (M.S.N.M.)" value="<?php echo $informacionGeneral->altitud;?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group  col col-md-4">
                            <label for="area_predio">Area Total Predio</label>
                            <input type="number" class="form-control" id="area_predio" name="area_predio" placeholder="Área Tota del Predio" value="<?php echo $informacionGeneral->area_predio;?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="predio_unidad_medida">Unidad de medida</label>
                            <select id="predio_unidad_medida" name="predio_unidad_medida" class="form-control">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($unidad_medida)):?>
                                  <?php foreach($unidad_medida as $um): ?>
                                    <option value="<?php echo $um->id; ?>" <?php echo ($um->id==$informacionGeneral->predio_unidad_medida)? 'selected':'';?> ><?php echo $um->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="pot_estado">(*)El Predio cumple con el POT Municipio</label>
                            <select id="pot_estado" name="pot_estado" class="form-control">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id==$informacionGeneral->pot_estado)? 'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Para la Asociación se recomienda hacer un protocolo de medición.</b></small>
                        </blockquote>
                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="asociacion_estado">Asociación</label>
                            <select id="asociacion_estado" name="asociacion_estado" class="form-control asociacion">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ( (!empty($informacionAsociacion))&&($um->id==$informacionAsociacion->asociacion_estado) )? 'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group  col col-md-3">
                            <label for="numero_asociados">Número de Asociados</label>
                            <input type="number" class="form-control asociacion" id="numero_asociados" name="numero_asociados" placeholder="Número de Asociados" value="<?php echo(!empty($informacionAsociacion))? $informacionAsociacion->numero_asociados:'';?>">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="famiempresa_estado">(*)Famiempresa</label>
                            <select id="famiempresa_estado" name="famiempresa_estado" class="form-control asociacion" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ( (!empty($informacionAsociacion))&&($af->id==$informacionAsociacion->famiempresa_estado) )? 'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="tamanio_empresa_id">(*)Tamaño de Empresa</label>
                            <select id="tamanio_empresa_id" name="tamanio_empresa_id" class="form-control asociacion" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($tamanio_empresa)):?>
                                  <?php foreach($tamanio_empresa as $te): ?>
                                    <option value="<?php echo $te->id; ?>" <?php echo ( (!empty($informacionAsociacion))&&($te->id==$informacionAsociacion->tamanio_empresa_id) )? 'selected':'';?> ><?php echo $te->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <?php 
                          if($informacionGeneral->url){
                            $estiloImg = "margin: 5px";
                            $url = base_url().$informacionGeneral->url;
                            $nombreArchivo = $informacionGeneral->nombreArchivo;
                          }else{
                            $estiloImg = "display: none; margin: 5px";
                            $url = "";
                            $nombreArchivo = "";
                          }
                        ?>
                        <div class="form-group alert alert-success" role="alert">
                          <label for="archivo_id">Imagen de empresa</label>
                          <input type="file" class="form-control-file" name="archivo_id" id="archivo_id">
                          <div class="row" id="visualizacion" style="<?php echo $estiloImg; ?>">
                            <div class="col-sm-6">
                              <img src="<?php echo $url; ?>" id="previsualizar" class="img-fluid img-thumbnail img-responsive" style="max-height:250px;">
                            </div>
                            <div class="col-sm-4" id="list">
                              <b>Nombre de archivo: </b><?php echo $nombreArchivo; ?>
                            </div>
                          </div>
                          <small><b>NOTA:</b> <p>Esta imagen será utilizada en caso de que el emprendimiento cumpla con mas del 50% luego de haber aplicado todos los criterios de evaluación para ser visualizada en la pagina principal</p> </small>
                        </div>
                      </div>
                      <div class="box-footer">
                          <a data-toggle="tab" id="btn-informacion" data-form="almacenarInformacionGeneral" class="btn btn-primary pull-right">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <form role="form" id="descripcionNegocio">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">II. DESCRIPCIÓN DE NEGOCIO VERDE</h3>
                      </div>
                      <!-- <input type="hidden" name="fecha_registro" id="fecha_registro"> -->
                      <div class="box-body">
                        <div class="form-group">
                            <label for="descripcion_negocio bg-info">(*)Descripción del Negocio(Bien o Servicio)</label>
                            <textarea class="form-control" id="descripcion_negocio" name="descripcion_negocio" rows="5" required minlength="5"><?php echo (!empty($informacionDescripcion))? $informacionDescripcion->descripcion_negocio:''; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="caracteristica_ambiental" class="bg-secondary">(*)Características ambientales de su negocio verde(incluir el impacto ambiental positivo generado)</label>
                            <textarea class="form-control" id="caracteristica_ambiental" name="caracteristica_ambiental" rows="5" required minlength="5"><?php echo (!empty($informacionDescripcion))? $informacionDescripcion->caracteristica_ambiental:''; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="box-footer">
                        <a id="btn-descripcion" data-form="descripcionNegocio" class="btn btn-primary pull-right">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <form role="form" id="categoriaNegocio">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">III. CATEGORÍA DE NEGOCIO VERDE</h3>
                      </div>
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="categoria_id">(*)Categoría</label>
                              <select id="categoria_id" name="categoria_id" class="form-control no" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($categoria)):?>
                                  <?php foreach($categoria as $c): ?>
                                    <option value="<?php echo $c->id; ?>" <?php echo (!empty($informacionSubsector) && ($informacionSubsector->categoria == $c->id))? 'selected':''; ?>><?php echo $c->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="sector_id">(*)Sector</label>
                              <select id="sector_id" name="sector_id" class="form-control no" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($sector)):?>
                                  <?php foreach($sector as $s): ?>
                                    <option value="<?php echo $s->id; ?>" <?php echo (!empty($informacionSubsector) && ($informacionSubsector->sector == $s->id))? 'selected':''; ?>><?php echo $s->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="subsector_id">(*)Subsector</label>
                              <select id="subsector_id" name="subsector_id" class="form-control" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php var_dump($subsector); ?>
                                <?php if(!empty($subsector)):?>
                                  <?php foreach($subsector as $sc): ?>
                                    <option value="<?php echo $sc->id; ?>" <?php echo (!empty($informacionSubsector) && ($informacionSubsector->subsector == $sc->id))? 'selected':''; ?>><?php echo $sc->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <a id="btn-categoria" data-form="categoriaNegocio" class="btn btn-primary pull-right">Guardar y Continuar</a>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">                
                    <form role="form" id="informacionEmpresa">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">IV. INFORMACIÓN DE EMPRESA</h3>
                      </div>
                      <div class="box-body">
                        <!-- Comienzo de row-->
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Características de los socios y empleados</b></small>
                        </blockquote>
                        <div class="row border-red">
                          <?php 
                            if(!empty($empresaSexoM)){
                              $socio_masculino = $empresaSexoM[array_search(1, array_column($empresaSexoM, 'socio_empleado_id'))]['cantidad'];
                              $vinculado_masculino = $empresaSexoM[array_search(2, array_column($empresaSexoM, 'socio_empleado_id'))]['cantidad'];
                              $empleado_masculino = $empresaSexoM[array_search(3, array_column($empresaSexoM, 'socio_empleado_id'))]['cantidad'];
                            }else{
                               $socio_masculino = 0;
                              $vinculado_masculino = 0;
                              $empleado_masculino = 0;
                            }

                            if(!empty($empresaSexoF)){
                              $socio_femenino = $empresaSexoF[array_search(1, array_column($empresaSexoF, 'socio_empleado_id'))]['cantidad'];
                              $vinculado_femenino = $empresaSexoF[array_search(2, array_column($empresaSexoF, 'socio_empleado_id'))]['cantidad'];
                              $empleado_femenino = $empresaSexoF[array_search(3, array_column($empresaSexoF, 'socio_empleado_id'))]['cantidad'];
                              $socio_total = $socio_masculino + $socio_femenino;
                              $vinculado_total = $vinculado_masculino + $vinculado_femenino;
                              $empleado_total = $empleado_masculino + $empleado_femenino;
                            }else{
                              $socio_femenino = 0;
                              $vinculado_femenino = 0;
                              $empleado_femenino = 0;
                              $socio_total = $socio_masculino + $socio_femenino;
                              $vinculado_total = $vinculado_masculino + $vinculado_femenino;
                              $empleado_total = $empleado_masculino + $empleado_femenino;
                            }
                          ?>
                          <div class="col col-md-5">
                              <label for="" class="border">1. Número de socios</label>
                              <div class="row">
                                
                                <div class="form-group col col-md-4">
                                  <label for="socio_masculino">Másculino</label>
                                  <input type="number" name="socio_masculino" class="form-control empleado_sexo" id="socio_masculino" value="<?php echo $socio_masculino; ?>" min="0" data-cod="1" data-sex="1">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="socio_femenino">Femenino</label>
                                  <input type="number" name="socio_femenino" class="form-control empleado_sexo" id="socio_femenino" value="<?php echo $socio_femenino; ?>" min="0" data-cod="1" data-sex="2">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="socio_total">Total</label>
                                  <input type="number" name="socio_total" class="form-control no" value="<?php echo $socio_total;?>" id="socio_total" disabled value="0">
                                </div>
                              </div>
                          </div>

                          <div class="col col-md-7">
                              <label for="" class="border">2. ¿Cuantos socios están vinculados laboralmente con la empresa?</label>
                              <div class="row">
                                <div class="form-group col col-md-4">
                                  <label for="vinculado_masculino">Másculino</label>
                                  <input type="number" name="vinculado_masculino" class="form-control empleado_sexo" id="vinculado_masculino" min="0" value="<?php echo $vinculado_masculino; ?>"data-cod="2" data-sex="1">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="vinculado_femenino">Femenino</label>
                                  <input type="number" name="vinculado_femenino" class="form-control empleado_sexo" id="vinculado_femenino" value="<?php echo $vinculado_femenino;?>" min="0" data-cod="2" data-sex="2">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="vinculado_total">Total</label>
                                  <input type="number" name="vinculado_total" class="form-control no" id="vinculado_total" value="<?php echo $vinculado_total; ?>"disabled value="0">
                                </div>
                              </div>
                          </div>

                          <div class="col col-md-5">
                              <label for="" class="border">3. Número de empleados (<small>Incluye los socio vinclados laboralmente</small>)</label>
                              <div class="row">
                                <div class="form-group col col-md-4">
                                  <label for="empleado_masculino">Másculino</label>
                                  <input type="number" name="empleado_masculino" class="form-control empleado_sexo" id="empleado_masculino" value="<?php echo $empleado_masculino;?>" min="0" data-cod="3" data-sex="1">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="empleado_femenino">Femenino</label>
                                  <input type="number" name="empleado_femenino" class="form-control empleado_sexo" id="empleado_femenino" value="<?php echo $empleado_femenino;?>" min="0" data-cod="3" data-sex="2">
                                </div>
                                <div class="form-group col col-md-4">
                                  <label for="empleado_total">Total</label>
                                  <input type="number" name="empleado_total" class="form-control no" id="empleado_total" value="<?php echo $empleado_total;?>" disabled value="0">
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Para el número de empleados diligencia los siguientes espacios:</b></small>
                        </blockquote>
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col col-md-6">
                              <label for="" class="border">4. Tipo de vinculacion laboral(Indicar Nº de empleos)</label>
                              <div class="row">
                                <?php if(!empty($tipo_vinculacion)):?>
                                  <?php foreach($tipo_vinculacion as $tv):?>
                                    <?php 
                                      $cantidad = (empty($empresaVinculacion))? 0: $empresaVinculacion[array_search($tv->id, array_column($empresaVinculacion, 'vinculacion_id'))]['cantidad'];
                                    ?>
                                    <div class="form-group col col-md-4">
                                    <label for="<?php echo $tv->descripcion?>"><?php echo $tv->etiqueta; ?></label>
                                    <input type="number" name="<?php echo $tv->descripcion; ?>" class="form-control vinculacion" id="<?php echo $tv->descripcion; ?>" value="<?php echo $cantidad; ?>" data-cod="<?php echo $tv->id;?>" min="0">
                                  </div>
                                <?php endforeach;?>
                                <?php endif;?>
                              </div>
                          </div>
                          <div class="col col-md-6">
                              <label for="" class="border">6. Edad <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <?php if(!empty($rango_edad)):?>
                                  <?php foreach($rango_edad as $re):?>
                                    <?php 
                                      $cantidad = (empty($empresaEdad))? 0: $empresaEdad[array_search($re->id, array_column($empresaEdad, 'rango_edad_id'))]['cantidad'];
                                    ?>
                                    <div class="form-group col col-md-4">
                                      <label for="<?php echo "edad_rango".$re->id; ?>"> <?php echo $re->nombre." años"; ?> </label>
                                      <input type="number" name="<?php echo "edad_rango".$re->id; ?>" class="form-control rango_edad" id="<?php echo "edad_rango".$re->id; ?>" min="0" value="<?php echo $cantidad; ?>" data-cod="<?php echo $re->id; ?>">
                                    </div>
                                <?php endforeach;?>
                                <?php endif;?>
                              </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col col-md-12">
                              <label for="" class="border">5. Nivel Educativo <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <?php if(!empty($nivel_educativo)):?>
                                  <?php foreach($nivel_educativo as $ne):?>
                                    <?php 
                                      $cantidad = (empty($empresaEducativo))? 0: $empresaEducativo[array_search($ne->id, array_column($empresaEducativo, 'nivel_id'))]['cantidad'];
                                    ?>
                                    <div class="form-group col col-md-2">
                                      <label for="<?php echo "educacion".$ne->id; ?>"> <?php echo $ne->nombre; ?> </label>
                                      <input type="number" name="<?php echo "educacion".$ne->id; ?>" class="form-control educacion" id="<?php echo "educacion".$ne->id; ?>" min="0" value="<?php echo $cantidad; ?>" data-cod="<?php echo $ne->id; ?>">
                                    </div>
                                <?php endforeach;?>
                                <?php endif;?>
                                <div class="form-group col col-md-2">
                                  <label for="nivel_educativo_total">Total</label>
                                  <input type="number" name="nivel_educativo_total" class="form-control no" id="nivel_educativo_total" min="0" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col-md-3">
                            <label for="" class="">7. Condiciones especiales de los empleados</label>
                          </div>  
                          <div class="col-md-9">
                            <?php if(!empty($desc_demografia)):?>
                              <?php foreach($desc_demografia as $dd):?>
                                <?php 
                                      $key = (empty($empresaDemografia))? false: array_search($dd->id, array_column($empresaDemografia, 'demografia_id'));
                                      if(!$key){
                                        $disabled = "disabled";
                                        $cantidad = "1";
                                        $estado = "";
                                      }else{
                                        $estado = $empresaDemografia[$key]["estado"];
                                        $disabled = ($estado!=1)? "disabled":""; 
                                        $cantidad = $empresaDemografia[$key]["cantidad"];
                                      }
                                    ?>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label for="<?php echo "situacion".$dd->id;?>"><?php echo $dd->nombre; ?></label>
                                    <select name="<?php echo "situacion".$dd->id;?>" id="<?php echo "situacion".$dd->id;?>" class="form-control situacion" data-asociado="<?php echo "cantidad".$dd->id; ?>" data-cod="<?php echo $dd->id; ?>">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>" <?php echo ($af->id==$estado)?'selected':''; ?>><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                  </div>
                                  <div class="form-group col col-md-6">
                                  <label for="<?php echo "cantidad".$dd->id; ?>">Número de empleados</label>
                                  <input <?php echo $disabled; ?> type="number" name="<?php echo "cantidad".$dd->id; ?>" id="<?php echo "cantidad".$dd->id; ?>" min="0" class="form-control situacion" value="<?php echo $cantidad; ?>">
                                </div>
                              </div>
                              <?php endforeach;?>
                            <?php endif; ?> 
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <blockquote class="bg-warning">
                          
                          <small class="text-success">

                            <b>Características del negocio (Marcar las opciones de la pregunta 1, que cumplas).</b>
                          </small>
                        </blockquote>
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col-md-6">
                            <label for="" class="">1. Actividades realizadas por la empresa</label>
                            <div class="form-check">
                              
                              <?php if(!empty($actividad)):?>
                                <?php foreach($actividad as $act):?>
                                  <?php 
                                   $key = (in_array($act->id, array_column($empresaActividad, 'actividad_id')))?array_search($act->id, array_column($empresaActividad, 'actividad_id')):-1;
                                   $confirmacion = ($key!=-1)? $empresaActividad[$key]["confirmacion"]:0;
                                   $checked=($confirmacion)?"checked":"";
                                  ?>
                                   <label class="checkbox-inline"><input  type="checkbox" name="actividad_empresa" id="actividad_empresa" class="form-check-input actividad" value="<?php echo $act->id; ?>" <?php echo $checked; ?> > <?php echo $act->nombre; ?> </label>
                                <?php endforeach;?>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="col col-md-6">
                            <div class="form-group">
                              <label for="etapa_empresarial">2. Etapa empresarial</label>
                              <select class="form-control" name="etapa_empresarial" id="etapa_empresarial">
                                <option selected value="">Selecciona una opción</option>
                                    <?php if(!empty($etapa_empresa)):?>
                                      <?php foreach($etapa_empresa as $ee): ?>
                                        <option value="<?php echo $ee->id; ?>" <?php echo (isset($informacionGeneral) && ($informacionGeneral->etapa_empresa_id==$ee->id)) ? 'selected':'';?>><?php echo $ee->nombre; ?></option>
                                      <?php endforeach;?>  
                                    <?php endif; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <!-- Comienzo de row-->
                        <div class="row">
                          <div class="col-md-3">
                             <label for="" class="">3. Bienes y/o servicios del negocio</label>
                          </div>
                          <div class="col col-md-9">
                            <?php 
                                $estadoLider = (isset($empresaServicioLider))?1:0;
                                $nombre_Lider = (isset($empresaServicioLider))?$empresaServicioLider->nombre:"";
                                 $id_Lider = (isset($empresaServicioLider))?$empresaServicioLider->id:"";
                            ?>
                            <?php for($i = 0; $i<5; $i++): ?>
                              <?php 
                                $estado = (array_key_exists($i, $empresaServicio))?1:0;
                                $id = ($estado==1)? $empresaServicio[$i]["id"]:"";
                                $nombre = ($estado==1)? $empresaServicio[$i]["nombre"]:"";
                                echo $estado;
                                echo $id;
                              ?>
                              <div class="form-group row">
                              <label for="bien<?php echo $i; ?>" class="col-md-3 control-label">Bien y/o servicio <?php echo $i; ?></label>
                              <div class="col-md-9">
                                <input type="text" name="bien<?php echo $i; ?>" id="bien<?php echo $i; ?>" class="form-control bien" placeholder="Bien y/0 servicio <?php echo $i; ?>" value="<?php echo $nombre; ?>" data-estado="<?php echo $estado; ?>" data-cod="<?php echo $id; ?>">
                              </div>
                            </div>
                            <?php endfor;?>
                            <div class="form-group row">
                              <label for="bien_lider" class="col-md-3 control-label">4. Bien y/o servicio líder <small>(No debe estar dentro de los anteriores bienes)</small></label>
                              <div class="col-md-9">
                                <input type="text" name="bien_lider" id="bien_lider" class="form-control bien" placeholder="Bien y/0 servicio líder (No debe estar dentro de los anteriores bienes)" value="<?php echo $nombre_Lider; ?>" data-estado="<?php echo $estadoLider; ?>" data-cod="<?php echo $id_Lider; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col col-md-12">
                              <label for="" class="border">5. Sobre la organización</label>
                              <div class="row">
                                <?php 
                                  $disabled = (!empty($empresaOrganizacion) && $empresaOrganizacion->constitucion_legal_estado==1)?"":"disabled";
                                ?>
                                <div class="form-group col col-md-6">
                                  <label for="constitucion_legal_estado">¿Su organización está constituida legalmente (camara de comercio, DIAN)?</label>
                                  <select name="constitucion_legal_estado" id="constitucion_legal_estado" class="form-control organizacion">
                                    <option selected value="">Selecciona una opción</option>
                                    <?php if(!empty($afirmacion)):?>
                                      <?php foreach($afirmacion as $af): ?>
                                        <option value="<?php echo $af->id; ?>" <?php echo (!empty($empresaOrganizacion) && $af->id==$empresaOrganizacion->constitucion_legal_estado)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                      <?php endforeach;?>  
                                    <?php endif; ?>
                                  </select>
                                </div>
                                <div class="form-group col col-md-6">
                                  <label for="anio_funcionamiento_registro">Años de funcionamiento de la empresa (en meses)</label>
                                  <input <?php echo $disabled; ?> type="number" min="0" name="anio_funcionamiento_registro" id="anio_funcionamiento_registro" class="form-control organizacion" placeholder="Años de funcionamiento de la empresa" value="<?php echo (!empty($empresaOrganizacion))?$empresaOrganizacion->anio_funcionamiento_registro:'1';?>">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col col-md-6">
                                  <label for="operando_actualmente_estado">¿Su organización se encuentra operando en la actualidad?</label>
                                  <select name="operando_actualmente_estado" id="operando_actualmente_estado" class="form-control organizacion">
                                    <option selected value="">Selecciona una opción</option>
                                    <?php if(!empty($afirmacion)):?>
                                      <?php foreach($afirmacion as $af): ?>
                                        <option value="<?php echo $af->id; ?>" <?php echo (!empty($empresaOrganizacion) && $af->id==$empresaOrganizacion->opera_actualmente_estado)?'selected':'';?>><?php echo $af->nombre; ?></option>
                                      <?php endforeach;?>  
                                    <?php endif; ?>
                                  </select>
                                </div>
                                <div class="form-group col col-md-6">
                                  <label for="anio_funcionamiento_empresa">¿Cuantos años de funcionamiento despues de registro ante camara y comercio?</label>
                                  <input <?php echo $disabled; ?> type="number" min="0" name="anio_funcionamiento_empresa" id="anio_funcionamiento_empresa" class="form-control organizacion" placeholder="¿Cuantos años de funcionamiento despues de registro ante camara y comercio?" value="<?php echo (!empty($empresaOrganizacion))?$empresaOrganizacion->anio_funcionamiento_empresa:'1';?>">
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- Fin de row-->
                      </div>
                      <div class="box-footer">
                        <a id="btn-informacionEmpresa" data-form="informacionEmpresa" class="btn btn-primary pull-right">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                    <form role="form" id="informacionVerificacion">
                      <div class="box-header bg-success">
                        <h3 class="box-title center text-success">V. INFORMACIÓN DEL VERIFICADOR Y EMPRESARIO</h3>
                      </div>      
                      <div class="box-body"><?php if(!empty($verificador)): ?>
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información de Verificador</b></small>
                        </blockquote>
                        <div class="row">
                          <div class="form-group col col-md-3">
                              <label for="nombre">Nombre</label>
                              <input disabled type="text" name="nombre" id="nombre" class="form-control no" placeholder="Nombre de verificador" value="<?php echo $verificador->nombre_completo; ?>">
                          </div>
                          <div class="form-group col col-md-3">
                              <label for="entidad">Entidad</label>
                              <input disabled type="text" name="entidad" id="entidad" class="form-control no" placeholder="Entidad de verificador" value="<?php echo $verificador->entidad; ?>">
                          </div>
                          <div class="form-group col col-md-3">
                              <label for="area">Área</label>
                              <input disabled type="text" name="area" id="area" class="form-control no" placeholder="Área de verificador" value="<?php echo $verificador->area; ?>">
                          </div>
                          <div class="form-group col col-md-3">
                              <label for="cargoo">Cargo</label>
                              <input disabled type="text" name="cargoo" id="cargoo" class="form-control no" placeholder="Cargo de verificador" value="<?php echo $verificador->cargo; ?>">
                          </div> 
                        </div><?php endif; ?>
                     
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información de Empresario (Quien diligencia formulario)</b></small>
                        </blockquote>
                        <div class="row">
                          <input type="hidden" name="empresario_id" id="empresario_id" value="<?php echo (!empty($informacionEmpresario))? $informacionEmpresario->id:''; ?>">
                          <div class="form-group col col-md-4">
                              <label for="nombre">(*)Nombre</label>
                              <input type="text" name="nombre" id="nombre" class="form-control empresario" placeholder="Nombre de Empresario" value="<?php echo (!empty($informacionEmpresario))? $informacionEmpresario->nombre:''; ?>" required minlength="3">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="identificacion">(*)Identificación</label>
                              <input type="text" name="identificacion" id="identificacion" class="form-control empresario" placeholder="Identificación de Empresario" value="<?php echo (!empty($informacionEmpresario))? $informacionEmpresario->identificacion:''; ?>" required minlength="7" maxlength="12" unique="empresario" relatedBy="empresario_id">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                              <label for="cargo">(*)Cargo</label>
                              <input type="text" name="cargo" id="cargo" class="form-control empresario" placeholder="Cargo de Empresario" value="<?php echo (!empty($informacionEmpresario))? $informacionEmpresario->cargo:''; ?>" required minlength="3" maxlength="30">
                              <span class="help-block"></span>
                          </div>
                        </div>
                        
                      </div>
                      <div class="box-header">
                        <a data-form="informacionVerificacion" id="btn-verificadorEmpresario" class="btn btn-primary pull-right">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_6">
                    <form role="form" id="observacionGeneral">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">VI. OBSERVACIONES GENERALES</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                            <label for="observacion_general">(*)Observaciones Generales</label>
                            <textarea class="form-control" id="observacion_general" name="observacion_general" rows="10" required minlength="3"><?php echo $informacionGeneral->observacion_general;?></textarea>
                            <span class="help-block"></span>
                        </div>
                        
                      </div>
                      <div class="box-footer">
                        <a href="#"  id="btn-observacion" class="btn btn-primary pull-right" data-form="observacionGeneral"> Guardar y Finalizar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.Custom Tabs -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->