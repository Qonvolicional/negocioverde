<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php //if(isset($informacionRepresentante))var_dump($informacionRepresentante); ?>
        Formato de Inscripción General
        <small> - <?php echo (isset($informacionGeneral))?$informacionGeneral->razon_social:'Agregar'; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>negocioVerde">Negocios Verdes</a></li>
        <li class="active">Agregar</li>
      </ol>
    </section>
    <?php 
      $progreso = (!empty($progreso))?number_format($progreso->progreso,2):0;
      //var_dump($informacionGeneral);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->

          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" id="progresoInscripcion" role="progressbar" style="width: <?php echo $progreso; ?>%" aria-valuenow="<?php echo $progreso; ?>" aria-valuemin="0" aria-valuemax="100"> <?php echo $progreso." %"; ?>
                </div>
              </div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <!-- nav-tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">I y II. Información General</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab">III. Descripción</a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab">IV. Impactos Ambientales y Buenas Prácticas</a></li>
                  <li class=""><a href="#tab_4" data-toggle="tab">V. Características</a></li>
                  <li class=""><a href="#tab_5" data-toggle="tab">Información del verificador y empresario</a></li>
                </ul>
                <!-- /.nav-tabs -->
                <!-- tab-content --> 
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."negocioVerde"; ?>">
                    <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $informacionGeneral->empresa_id; ?>">
                    <form role="form" method="post" id="almacenarInformacionGeneral" class="form-agregar" enctype="multipart/form-data">
                      <!--<blockquote class="bg-warning"><h5 class="text-success">INFORMACIÓN GENERAL</h5></blockquote>-->
                      <div class="box-body">
                        <div class="box-header with-border bg-success">
                          <h3 class="box-title text-success">I. INFORMACIÓN GENERAL</h3>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <?php 
                              $anio_verificado = (!empty($anioVerificados))?1:2;
                            ?>
                            <label for="anio_verificado">El negocio ha sido anteriormente verificado?: </label>
                            <select name="anio_verificado" id="anio_verificado" class="form-control sino no" data-sino="anios" required>
                              <option value="">Selecciona una opción</option>
                              <option value="1" <?php echo ($anio_verificado==1)?'selected':''; ?> >Si</option>
                              <option value="2" <?php echo ($anio_verificado==2)?'selected':''; ?>>No</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 anios" id="anios">
                            <label for="anio_verificado_empresa">Especifique los años: </label>
                            <select name="anio_verificado_empresa" id="anio_verificado_empresa" class="form-control multiple anios_verificado_empresa" multiple="multiple" >
                              <?php for($i = 2000; $i < 2020; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo (in_array($i, array_column($anioVerificados, 'anio')))?'selected':''; ?> ><?php echo $i; ?></option>
                              <?php endfor;?>
                            </select>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col col-md-3">
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
                          <div class="form-group col col-md-3">
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
                          <div class="form-group col col-md-3">
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
                        </div>
                        <div class="box-header with-border bg-success">
                          <h3 class="box-title text-success">II. DATOS DEL NEGOCIO</h3>
                        </div>
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
                              <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación" required minlength="7" maxlength="15" unique="empresa"  value="<?php echo $informacionGeneral->identificacion;?>" relatedBy="empresa_id" <?php echo (trim($informacionGeneral->identificacion)!="")?'readonly':''; ?> >
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
                        <div class="row">
                          <div class="form-group col col-md-6">
                            <label for="direccion_correspondencia">Dirección de correspondencia:</label>
                            <input type="text" name="direccion_correspondencia" id="direccion_correspondencia" class="form-control empresa" placeholder="Dirección de correspondencia" value="<?php echo $informacionGeneral->direccion_correspondencia; ?>">
                          </div>
                          <div class="form-group col col-md-6">
                            <label for="correo_empresarial">E-mail Empresarial:</label>
                            <input type="text" name="correo_empresarial" id="correo_empresarial" class="form-control empresa" placeholder="Correo electrónica de la empresa" value="<?php echo $informacionGeneral->correo_empresarial; ?>"required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-6">
                            <label for="celular_empresarial">Celular:</label>
                            <input type="text" name="celular_empresarial" id="celular_empresarial" class="form-control empresa" placeholder="Número de celular de la empresa" value="<?php echo $informacionGeneral->celular_empresarial; ?>">
                          </div>
                          <div class="form-group col col-md-6">
                            <label for="telefono_fijo">Telefono Fijo:</label>
                            <input type="text" name="telefono_fijo" id="telefono_fijo" class="form-control empresa" placeholder="Telefono fijo de la empresa" value="<?php echo $informacionGeneral->telefono_fijo; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-6">
                            <label for="pagina_negocio">Página Web o Redes Sociales:</label>
                            <input type="text" name="pagina_negocio" id="pagina_negocio" class="form-control empresa" placeholder="Página web o dirección de la red social preferida" value="<?php echo $informacionGeneral->pagina_negocio; ?>">
                          </div>
                          <div class="form-group col col-md-6">
                            <label for="url_micrositio">Micrositio (Google):</label>
                            <input type="text" name="url_micrositio" id="url_micrositio" class="form-control empresa" placeholder="Dirección web del micrositio de Google" value="<?php echo $informacionGeneral->url_micrositio; ?>">
                          </div>
                        </div>

                        <blockquote class="bg-warning"><b><small class="text-success">Representante Legal</small></b></blockquote>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="identificacion2">(*)Documento</label>
                            <input <?php echo (!empty($informacionRepresentante) && ($informacionRepresentante->identificacion!=""))?'readonly':''; ?> type="number" class="form-control persona" id="persona_identificacion" min="0" name="persona_identificacion" placeholder="Documento" required minlength="7" maxlength="15" unique="persona" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->identificacion:'';?>" relatedBy="representante_legal_id">
                            <input type="hidden" name="representante_legal_id" id="representante_legal_id" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->id:'';?>" > 
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre1">(*)Primer Nombre</label>
                            <input type="text" class="form-control persona" id="nombre1" name="nombre1" placeholder="Primer Nombre" required minlength="3" maxlength="30" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->nombre1:'';?>">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control persona" id="nombre2" name="nombre2" placeholder="Segundo Nombre" minlength="3" maxlength="30" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->nombre2:'';?>">
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="apellido1">(*)Primer Apellido</label>
                            <input type="text" class="form-control persona" id="apellido1" name="apellido1" placeholder="Primer Apellido" required minlength="3" maxlength="30" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->apellido1:'';?>">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control persona" id="apellido2" name="apellido2" placeholder="Segundo Apellido" minlength="3" maxlength="30" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->apellido2:'';?>">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="correo">(*)Correo</label>
                            <input type="email" class="form-control persona" id="correo" name="correo" placeholder="Correo Electrónico" required maxlength="100" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->correo:'';?>">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="fijo">Telefono Fijo</label>
                            <input type="tel" class="form-control persona" id="fijo" name="fijo" placeholder="Telefono Fijo" pattern="[0-9]{3}-[0-9]{4}" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->fijo:'';?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="celular">(*)Celular</label>
                            <input type="tel" class="form-control persona" id="celular" name="celular" placeholder="Celular" required minlength="7" maxlength="15" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->celular:'';?>">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control persona" id="direccion" name="direccion" placeholder="Dirección de Correspondencia" value="<?php echo (!empty($informacionRepresentante))?$informacionRepresentante->direccion:'';?>">
                          </div>
                        </div>

                        <blockquote class="bg-warning"><b><small class="text-success">Localización Específica</small></b></blockquote>
                        <div class="row">
                          <div class="form-group col col-md-12">
                            <label for="vereda">Vereda</label>
                            <input type="text" class="form-control" id="vereda" name="vereda" placeholder="Vereda" value="<?php echo $informacionGeneral->vereda;?>">
                          </div>
                        </div>

                        <div class="row">     
                          <div class="form-group col col-md-4">
                            <label for="coordenada_n">a) Coordenada Norte</label>
                            <input type="number" class="form-control" id="coordenada_n" name="coordenada_n" placeholder="Coordenada Norte" value="<?php echo $informacionGeneral->coordenada_n;?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="coordenada_w">b) Coordenada Oeste</label>
                            <input type="number" class="form-control" id="coordenada_w" name="coordenada_w" placeholder="Coordenada Oeste" value="<?php echo $informacionGeneral->coordenada_w;?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="altitud">c) Altitud (m.s.n.m)</label>
                            <input type="number" class="form-control" id="altitud" name="altitud" placeholder="Altitud (M.S.N.M.)" value="<?php echo $informacionGeneral->altitud;?>">
                          </div>
                        </div>
                      
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información Adicional I</b></small>
                        </blockquote>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="tipo_personeria">Tipo de Personería:</label>
                            <select id="tipo_personeria" name="tipo_personeria" class="form-control noaplica" data-otra="personeria_juridica">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($tipo_personeria)):?>
                                  <?php foreach($tipo_personeria as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->tipo_personeria)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-8 personeria_juridica">
                            <label for="personeria_juridica">Especifique cuál:</label>
                            <input type="text" name="personeria_juridica" id="personeria_juridica" class="form-control" value="<?php echo $informacionGeneral->personeria_juridica; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group  col col-md-4">
                            <label for="numero_socio">Número de Socios:</label>
                            <input type="number" min="0" class="form-control asociacion" id="numero_socio" name="numero_socio" placeholder="Número de Asociados" value="<?php echo(!empty($informacionAsociacion))? $informacionAsociacion->numero_socio:'';?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="declarante_renta">(*)Declarante de Renta?:</label>
                            <select id="declarante_renta" name="declarante_renta" class="form-control sino" data-sino="declaracion_renta">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->declarante_renta)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4 declaracion_renta">
                            <label for="ultimo_anio_declaracion">Último año de declaración:</label>
                            <input type="number" name="ultimo_anio_declaracion" id="ultimo_anio_declaracion" min="0" class="form-control" value="<?php echo $informacionGeneral->ultimo_anio_declaracion;?>">
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="etapa_empresa_id">(*)Etapa Empresarial:</label>
                            <select id="etapa_empresa_id" name="etapa_empresa_id" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($etapa_empresa)):?>
                                  <?php foreach($etapa_empresa as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->etapa_empresa_id)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="tamanio_empresa_id">(*)Tamaño de la Empresa:</label>
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
                          <div class="form-group col col-md-6">
                            <label for="fecha_constitucion">Fecha de Constitución ante Cámara de comercio:</label>
                            <input type="date" id="fecha_constitucion" name="fecha_constitucion" class="form-control" value="<?php echo $informacionGeneral->fecha_constitucion; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="ultimo_anio_renovacion">Último año de renovación:</label>
                            <input type="number" min="0" name="ultimo_anio_renovacion" id="ultimo_anio_renovacion" class="form-control" value="<?php echo $informacionGeneral->ultimo_anio_renovacion; ?>">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-9">
                            <label for="resolucion_facturacion_aplica">(*)La unidad productiva cuenta con resolución de facturación o no aplica por ser regimen simplificado:</label>
                            <select id="resolucion_facturacion_aplica" name="resolucion_facturacion_aplica" class="form-control sino" data-sino="resolucion_facturacion">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->resolucion_facturacion_aplica)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row resolucion_facturacion">
                          <div class="form-group  col col-md-4">
                            <label for="resolucion_facturacion">Número de resolución de la DIAN:</label>
                            <input type="number" class="form-control" id="resolucion_facturacion" name="resolucion_facturacion" placeholder="Número de resolución de la DIAN" value="<?php echo $informacionGeneral->resolucion_facturacion; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="rango_numeracion">(*)Rango de Numeración:</label>
                            <input type="text" id="rango_numeracion" name="rango_numeracion" class="form-control" value="<?php echo $informacionGeneral->rango_numeracion; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="vigencia_numeracion">Vigencia de la resolución de facturación:</label>
                            <input type="date" name="vigencia_numeracion" id="vigencia_numeracion" class="form-control" value="<?php echo $informacionGeneral->vigencia_numeracion; ?>">
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group  col col-md-12">
                            <label for="resolucion_facturacion">La unidad productiva lleva libros corporativos actualizados:</label>
                            <select id="libros_corporativos_sino" name="libros_corporativos_sino" class="form-control">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->libros_corporativos_sino)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información Adicional II.</b></small>
                        </blockquote>
                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="consejo_comunitario_sino">Consejo Comunitario:</label>
                            <select id="consejo_comunitario_sino" name="consejo_comunitario_sino" class="form-control sino" data-sino="consejo_comunitario">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->consejo_comunitario_sino)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-3 consejo_comunitario">
                            <label for="consejo_comunitario">Nombre de Consejo Comunitario:</label>
                            <input type="text" name="consejo_comunitario" id="consejo_comunitario" class="form-control" value="<?php echo $informacionGeneral->consejo_comunitario; ?>">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="junta_accion_comunal_sino">Junta de Acción Comunal:</label>
                            <select id="junta_accion_comunal_sino" name="junta_accion_comunal_sino" class="form-control sino" data-sino="junta_accion">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->junta_accion_comunal_sino)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-3 junta_accion">
                            <label for="junta_accion_comunal">Nombre de Junta Acción:</label>
                            <input type="text" name="junta_accion_comunal" id="junta_accion_comunal" class="form-control" value="<?php echo $informacionGeneral->junta_accion_comunal; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="grupo_etnico_id">Grupo Étnico:</label>
                            <select id="grupo_etnico_id" name="grupo_etnico_id" class="form-control no_aplica" data-noaplica="grupo_etnico">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($grupo_etnico)):?>
                                  <?php foreach($grupo_etnico as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->grupo_etnico_id)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-8 grupo_etnico">
                            <label for="nombre_etnico">Nombre de Grupo Étnico:</label>
                            <input type="text" class="form-control" id="nombre_etnico" name="nombre_etnico" placeholder="Nombre de grupo étnico" value="<?php echo $informacionGeneral->nombre_etnico; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-2">
                            <label for="cabildo_sino">Cabildo:</label>
                            <select id="cabildo_sino" name="cabildo_sino" class="form-control">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->cabildo_sino)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="territorio_colectivo_id">Territorios colectivos de pueblos indígenas:</label>
                            <select id="territorio_colectivo_id" name="territorio_colectivo_id" class="form-control no_aplica" data-noaplica="territorio_colectivo">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($territorio_colectivo)):?>
                                  <?php foreach($territorio_colectivo as $af): ?>
                                    <option value="<?php echo $af->id; ?>" <?php echo ($af->id == $informacionGeneral->territorio_colectivo_id)?'selected':'';?> ><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-6 territorio_colectivo">
                            <label for="territorio_colectivo">Nombre del territorio:</label>
                            <input type="text" id="territorio_colectivo" name="territorio_colectivo" class="form-control" value="<?php echo $informacionGeneral->territorio_colectivo; ?>">
                          </div>
                        </div>

                      </div>

                      <div class="box-footer">
                        <?php 
                          
                          $estiloBtn = (!empty($informacionCheck))?"btn btn-success pull-right":"btn btn-primary pull-right";
                          $textoBtn = (!empty($informacionCheck))?"Actualizar y Continuar":"Guardar y Continuar";
                         

                          if(!empty($informacionImagen)){
                            $estiloImg = "margin: 5px";
                            $url = base_url().$informacionImagen->url;
                            $nombreArchivo = $informacionImagen->nombre;
                          }else{
                            $estiloImg = "display: none; margin: 5px";
                            $url = "";
                            $nombreArchivo = "";
                          }

                          if(!empty($informacionDocumento)){
                            $estiloDoc = "margin: 5px; display:;";
                            $urlDoc = base_url().$informacionDocumento->url;
                            $nombreDoc = "<b>Nombre de archivo: </b>".$informacionDocumento->nombre;
                          }else{
                            $urlDoc = "";
                            $nombreDoc = "Actualmente no has seleccionado ninguna documento.";
                            $estiloDoc = "display: none; margin: 5px";
                          }
                        ?>
                        <div class="form-group alert bg-secondary" role="alert">
                          <span class="btn btn-default btn-lg btn-file convocatoria evento"><span class="fa fa-file-pdf-o"> </span> Carta de consentimiento <input type="file" name="documento_consentimiento_id" id="documento_consentimiento_id" class="form-control" accept="image/*,.pdf">
                          </span>
                          <div class="col-sm-12" id="previsualizacionDocumento">
                           <p><?php echo $nombreDoc; ?></p>
                          </div>
                          <button type="button" id="verDocumento" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalLong" style="<?php echo $estiloDoc; ?>">
                            <span class="fa fa-file-pdf-o"> Ver documento</span>
                          </button>
                          <small><p><strong>NOTA:</strong> cuenta con carta de consentimiento. (Documento que deberá ser firmado antes del proceso de verificación).</p> </small>
                        </div>
                        <hr>
                        <div class="form-group alert alert-success" role="alert">
                          <label for="archivo_id">Imagen de empresa</label>
                          <input type="file" class="form-control-file" name="archivo_id" id="archivo_id" accept="image/*">
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
                          
                      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width: 100%;max-height: 90%;">
                          <div class="modal-content" style="max-width: 70%; margin: auto;">
                            <div class="modal-header">
                              <div class="pull-left" style="padding: 10px;">
                                <h3 class="modal-title" id="exampleModalLongTitle"><b>Visualización de documento</b></h3>
                              </div>
                              <div class="pull-right" style="padding: 10px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
                                <span aria-hidden="true" class="btn btn-danger">&times;</span>
                              </button>
                              </div>
                              
                            </div>
                            <div class="modal-body" id="modal_vista">
                              <embed id="vistaDocumento" src="<?php echo $urlDoc; ?>" type="application/pdf" width="100%" height="600px" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="box-footer">
                          <a id="btn-informacion" data-form="almacenarInformacionGeneral" class="<?php echo $estiloBtn;?>"><?php echo $textoBtn;?> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2" >
                    <form role="form" id="descripcionNegocio">
                      <div class="box-body">
                        <div class="box-header with-border bg-success">
                          <h3 class="box-title center text-success">III. DESCRIPCIÓN DE NEGOCIO VERDE</h3>
                        </div>
                        <input type="hidden" name="fecha_registro" id="fecha_registro">
                        <div class="form-group">
                            <label><blockquote class="bg-warning"><small class="text-success">Descripción del Negocio (Bien o Servicio). Incluir el <u>impacto ambiental positivo</u> (requisito mínimo y esencial para ser Negocio Verde, ver detalle en información complementaria). </small></blockquote></label>
                            <textarea class="form-control" id="descripcion_negocio" name="descripcion_negocio" rows="5" required minlength="5"><?php echo (!empty($informacionDescripcion))? $informacionDescripcion->descripcion_negocio:''; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                      </div>
                      <?php 
                          $estiloBtn = (!empty($informacionCheck) && $informacionCheck[0]["descripcion_check"]==1)?"btn btn-success pull-right":"btn btn-primary pull-right";
                          $textoBtn = (!empty($informacionCheck)&& $informacionCheck[0]["descripcion_check"])?"Actualizar y Continuar":"Guardar y Continuar";
                      ?>
                      <div class="box-footer">
                        <a id="btn-descripcion" data-form="descripcionNegocio" class="<?php echo $estiloBtn;?>"><?php echo $textoBtn;?> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">                
                    <form role="form" id="informacionEmpresa">
                      <div class="box-body">
                        <div class="box-header with-border bg-success">
                          <h3 class="box-title center text-success">IV. Impactos Ambientales Positivos y Buenas Prácticas que aportan a la Sostenibilidad Ambiental</h3>
                        </div>
                        <blockquote class="bg-warning" style="margin-bottom: 15px;">
                          <b class="text-success" style="font-size: 14px;">1. Impactos ambientales positivos identificados en el Plan Nacional de Negocios Verdes.</b>
                          <a class="pull-right despliegue" data-despliegue="impacto_ambiental"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                        </blockquote>
                        <div id="impacto_ambiental" >
                        <blockquote class="bg-info">
                          <b style="font-size: 14px;">Marque con  una x el impacto ambiental positivo de acuerdo con la siguiente escala:</b>
                          <ol>
                            <li>Bajo impacto: <small>Cuando tiene un efecto positivo mínimo sobre los recursos y el medio ambiente, beneficiando exclusivamente a la empresa.</small> </li>
                            <li>Impacto moderado: <small> Cuando tiene un efecto positivo sobre el medio ambiente y además, es potencialmente perdurable en el tiempo y no beneficia exclusivamente a la empresa.</small></li>
                            <li>Alto impacto: <small>Cuando tiene un gran efecto positivo sobre el medio ambiente y además, se ha mejorado y mantenido en el tiempo y beneficia a la comunidad en donde se encuentra la empresa.</small></li>
                          </ol>
                        </blockquote>
                        <?php if(!empty($impacto_ambiental)):?>
                          <?php foreach($impacto_ambiental as $ia):?>
                            <?php 
                              if(in_array($ia->id, array_column($empresaImpacto, 'impacto_id'))){
                                $id = array_search($ia->id, array_column($empresaImpacto, 'impacto_id'));
                                $impacto_id = $empresaImpacto[$id]['impacto_id'];
                                $descripcion = $empresaImpacto[$id]['descripcion'];
                                $aplica_no_aplica = $empresaImpacto[$id]['aplica_no_aplica'];
                                $escala = $empresaImpacto[$id]['escala']; 
                              }else{
                                $impacto_id = "";
                                $descripcion = "";
                                $aplica_no_aplica = "";
                                $escala = ""; 
                              }
                               
                            ?>
                            <div class="row">
                              <div class="col col-md-3">
                                <div class="form-group"><label><?php echo $ia->No.". ".$ia->nombre; ?><label></div>
                              </div>
                              <div class="col col-md-3">
                                <div class="form-group">
                                  <label for="si_no_aplica<?php echo $ia->id; ?>">Aplica:</label>
                                  <select name="si_no_aplica_<?php echo $ia->id; ?>" id="si_no_aplica_<?php echo $ia->id;?>" class="form-control sinoaplica impacto_ambiental" data-sinoaplica="impacto_p_<?php echo $ia->id; ?>">
                                    <option value="">Selecciona una opción</option>
                                    <?php if(!empty($si_no_aplica)):?>
                                      <?php foreach($si_no_aplica as $sna):?>
                                        <option value="<?php echo $sna->id; ?>" <?php echo ($aplica_no_aplica==$sna->id)?'selected':''; ?>> <?php echo $sna->nombre; ?> </option>
                                      <?php endforeach;?>
                                    <?php endif; ?>
                                  </select>
                                  <input type="hidden" class="no" value="<?php echo $ia->id;?>">
                                </div>
                              </div>
                              <div class="col col-md-4 impacto_p_<?php echo $ia->id; ?>">
                                <div class="form-group">
                                  <label for="descripcion_<?php echo $ia->id;?>">Descripción: </label>
                                  <textarea name="descripcion_impacto_<?php echo $ia->id; ?>" id="descripcion_<?php echo $ia->id;?>" rows="3" class="form-control"> <?php echo ($impacto_id==$ia->id)?$descripcion:''; ?> </textarea> 
                                </div>
                              </div>
                              <div class="col col-md-2 impacto_p_<?php echo $ia->id; ?>">
                                <div class="form-group">
                                  <label for="">Marque el nivel de impacto</label>
                                  <div class="form-check form-inline">
                                    <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="1" class="form-check-input" title="Bajo impacto" <?php echo ($escala==1)?'checked':''; ?> > 1 </label> 
                                    <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="2" class="form-check-input" title="Impacto moderado" <?php echo ($escala==2)?'checked':''; ?>> 2 </label> 
                                    <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="3" class="form-check-input" title="Alto impacto" <?php echo ($escala==3)?'checked':''; ?>> 3 </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          <?php endforeach;?>
                        <?php endif;?>
                        </div>
                        <blockquote class="bg-warning">
                          <b class="text-success" style="font-size: 14px;">2.  Buenas Prácticas que se aplican en el negocio o en el área de influencia de la iniciativa.</b>
                          <a class="pull-right despliegue" data-despliegue="practica_conservacion"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                        </blockquote>
                        <div id="practica_conservacion">
                        <?php if(!empty($practica_conservacion)):?>
                          <?php $i = 0; ?>
                          <?php foreach($practica_conservacion as $pc):?>
                            <?php 
                              $i++;
                              $orden="2.".$i.".";
                              if(in_array($pc->id, array_column($empresaConservacion, 'opciones_id'))){
                                $id = array_search($pc->id, array_column($empresaImpacto, 'opciones_id'));
                                $confirmacion = $empresaConservacion[$id]['confirmacion'];
                              }else{
                                $confirmacion = "";
                              } 
                            ?>
                            <div class="row">
                              <div class="col col-md-4">
                                <div class="form-group">
                                  <label><?php echo $orden.$pc->nombre; ?><label>
                                </div>
                              </div>
                              <div class="col col-md-8">
                                <div class="form-group">
                                  <label for="si_no_aplica_buena_practica<?php echo $pc->id; ?>">Aplica:</label>
                                  <select name="si_no_aplica_buena_practica<?php echo $pc->id; ?>" id="si_no_aplica_buena_practica<?php echo $pc->id;?>" class="form-control practica_conservacion">
                                    <option value="">Selecciona una opción</option>
                                    <?php if(!empty($si_no_aplica)):?>
                                      <?php foreach($si_no_aplica as $sna):?>
                                        <option value="<?php echo $sna->id; ?>" <?php echo ($confirmacion==$sna->id)?'selected':''; ?> > <?php echo $sna->nombre; ?> </option>
                                      <?php endforeach;?>
                                    <?php endif; ?>
                                  </select>
                                  <input type="hidden" class="no" value="<?php echo $pc->id; ?>">
                                </div>
                              </div>
                            </div>    
                          <?php endforeach;?>
                        <?php endif;?>  
                        </div>      
                      </div>
                      <?php 
                          
                          $estiloBtn = (!empty($informacionCheck) && $informacionCheck[0]["empresa_check"])?"btn btn-success pull-right":"btn btn-primary pull-right";
                          $textoBtn = (!empty($informacionCheck)&& $informacionCheck[0]["empresa_check"])?"Actualizar y Continuar":"Guardar y Continuar";
                      ?>
                      <div class="box-footer">
                        <a id="btn-informacionEmpresa" data-form="informacionEmpresa" class="<?php echo $estiloBtn;?>"><?php echo $textoBtn;?> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    <form role="form" id="categoriaNegocio">
                      <div class="box-body">
                        <div class="box-header with-border bg-success">
                          <h3 class="box-title center text-success">V. CARACTERÍSTICAS DE NEGOCIO VERDE</h3>
                        </div>
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
                              <select id="subsector_id" name="subsector_id" class="form-control empresa" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($subsector)):?>
                                  <?php foreach($subsector as $sc): ?>
                                    <option value="<?php echo $sc->id; ?>" <?php echo (!empty($informacionSubsector) && ($informacionSubsector->subsector == $sc->id))? 'selected':''; ?>> <?php echo $sc->nombre; ?> </option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              <span class="help-block"></span>
                          </div>
                        </div>
                        <label for=""></label><blockquote class="bg-warning"><b><small class="text-success">1. Bienes y servicios. Escoja alguna de las opciones o si son ambas. Describa el bien o servicio líder, y los otros servicios o bienes.</small></b></blockquote>
                        <?php 
                         if(!empty($bienLider)){
                            $servicio_lider_id = $bienLider->id;
                            $tipo_bien_lider = $bienLider->opciones_bienes_servicios_id;
                            $nombreLider = $bienLider->nombre;
                          }else{
                            $servicio_lider_id = "";
                            $tipo_bien_lider = "";
                            $nombreLider = "";
                          }
                       
                        ?>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="tipo_bien_lider">Tipo de Servicio:</label>
                            <select name="tipo_bien_lider" id="tipo_bien_lider" class="form-control servicio_lider" required data-servicio="<?php echo $servicio_lider_id; ?>">
                              <option value="">Selecciona una opción.</option>
                              <?php if(!empty($opciones_bienes_servicios)):?>
                                  <?php foreach($opciones_bienes_servicios as $ti): ?>
                                    <option value="<?php echo $ti->id; ?>" <?php echo ($tipo_bien_lider==$ti->id)?'selected':''; ?> ><?php echo $ti->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>

                          <div class="form-group col col-md-8">
                            <label for="bien_lider">Bien o servicio líder que caracteriza al Negocio Verde:</label>
                            <input type="text" name="bien_lider" id="bien_lider" class="form-control" placeholder="Bien o servicio líder" required="" value="<?php echo $nombreLider;?>">
                          </div>
                        </div>
                        <?php for($i = 0; $i <5; $i++ ):?>
                          <?php 
                            $estado = (array_key_exists($i, $empresaBienes))?1:0;
                            $tipo_bien = ($estado==1)? $empresaBienes[$i]["opciones_bienes_servicios_id"]:"";
                            $bien_id = ($estado==1)? $empresaBienes[$i]["id"]:"";
                            $bien = ($estado==1)? $empresaBienes[$i]["nombre"]:"";
                          ?>
                          <div class="row">
                            <div class="form-group col col-md-4">
                              <label for="tipo_bien_<?php echo $i; ?>">Tipo de Servicio:</label>
                              <select name="tipo_bien_<?php echo $i; ?>" id="tipo_bien_<?php echo $i; ?>" class="form-control tipo_servicio" data-servicio="<?php echo $bien_id; ?>">
                                <option value="">Selecciona una opción.</option>
                                <?php if(!empty($opciones_bienes_servicios)):?>
                                  <?php foreach($opciones_bienes_servicios as $ti): ?>
                                    <option value="<?php echo $ti->id; ?>" <?php echo ($tipo_bien==$ti->id)?'selected':''; ?> ><?php echo $ti->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                            </div>
                            <div class="form-group col col-md-8">
                              <label for="bien_<?php echo $i; ?>">Bien o servicio <?php echo $i; ?>:</label>
                              <input type="text" name="bien_<?php echo $i; ?>" id="bien_<?php echo $i; ?>" class="form-control bien no" placeholder="Nombre del bien o servicio." value="<?php echo $bien; ?>" >
                            </div>
                          </div>
                        <?php endfor; ?>

                        <blockquote class="bg-warning"><b><small class="text-success">2. Actividades realizadas por la empresa.</small></b></blockquote>
                        
                        <?php if(!empty($actividades)):?>
                          <?php foreach($actividades as $act):?>
                            <?php 
                              if(in_array($act->id, array_column($empresaActividades, 'actividad_id'))){
                                $id = array_search($act->id, array_column($empresaActividades, 'actividad_id'));
                                $confirmacion = $empresaActividades[$id]['confirmacion'];
                                $direccion = $empresaActividades[$id]['direccion'];
                                $municipio_id = $empresaActividades[$id]['municipio_id'];
                                $departamento_id = $empresaActividades[$id]['departamento_id'];
                                $tipo_tenencia_id = $empresaActividades[$id]['tipo_tenencia_id'];
                                $area_predio = $empresaActividades[$id]['area_predio'];
                                $cumple_pot_sino = $empresaActividades[$id]['cumple_pot_sino'];
                                $normatividad_ambiental_sino = $empresaActividades[$id]['normatividad_ambiental_sino'];
                                $observacion = $empresaActividades[$id]['observacion'];
                              }else{
                                $confirmacion = "";
                                $direccion = "";
                                $municipio_id = "";
                                $departamento_id = "";
                                $tipo_tenencia_id = "";
                                $area_predio = "";
                                $cumple_pot_sino = "";
                                $normatividad_ambiental_sino = "";
                                $observacion = "";
                              }
                            ?>
                            <div class="row" style="margin-top: 3px;">
                              <div class="form-group col-xs-12 col-md-3" >
                                <label for=""> <?php echo $act->id." - ".$act->nombre; ?>: </label>
                              </div>
                              <div class="form-group col-xs-12 col-md-4">
                                <select name="actividad_empresa_<?php echo $act->id; ?>" id="actividad_empresa_<?php echo $act->id; ?>" class="form-control tipo_actividad sinoaplica" data-sinoaplica="actividad<?php echo $act->id; ?>" data-actividad="<?php echo $act->id; ?>">
                                <option value="">Selecciona una opción.</option>
                                <?php if(!empty($si_no_aplica)):?>
                                  <?php foreach($si_no_aplica as $ti): ?>
                                    <option value="<?php echo $ti->id; ?>" <?php echo ($confirmacion==$ti->id)?'selected':''; ?> ><?php echo $ti->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                              </div>
                            </div>
                            
                            <div class="row actividad<?php echo $act->id; ?>">
                              <div class="form-group col-md-4">
                                <label for="">Departamento: </label>
                                <select name="departamento_actividad_<?php echo $act->id; ?>" id="departamento_actividad_<?php echo $act->id; ?>" class="form-control no">
                                  <option value="">Selecciona una opción.</option>
                                  <?php if(!empty($departamentos)):?>
                                    <?php foreach($departamentos as $ti): ?>
                                      <option value="<?php echo $ti->id; ?>" <?php echo ($departamento_id==$ti->id)?'selected':''; ?>><?php echo $ti->nombre; ?></option>
                                    <?php endforeach;?>  
                                  <?php endif; ?>
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="">Municipio: </label>
                                <select name="municipio_actividad_<?php echo $act->id; ?>" id="municipio_actividad_<?php echo $act->id; ?>" class="form-control no">
                                  <option value="">Selecciona una opción</option>
                                  <?php if(!empty($municipios)):?>
                                    <?php foreach($municipios as $ti): ?>
                                      <option value="<?php echo $ti->id; ?>" <?php echo ($municipio_id==$ti->id)?'selected':''; ?>><?php echo $ti->nombre; ?></option>
                                    <?php endforeach;?>  
                                  <?php endif; ?>
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="">Dirección: </label>
                                <input name="direccion_actividad_<?php echo $act->id; ?>" id="direccion_actividad_<?php echo $act->id; ?>" class="form-control" value="<?php echo $direccion; ?>">
                              </div>
                            </div>

                            <div class="row actividad<?php echo $act->id; ?>">
                              <div class="form-group col-md-3">
                                <label for="">Tipo de tenencia: </label>
                                <select name="tt_actividad_<?php echo $act->id; ?>" id="tt_actividad_<?php echo $act->id; ?>" class="form-control no">
                                  <option value="">Selecciona una opción</option>
                                  <?php if(!empty($tenencia_tierra)):?>
                                    <?php foreach($tenencia_tierra as $ti): ?>
                                      <option value="<?php echo $ti->id; ?>" <?php echo ($tipo_tenencia_id==$ti->id)?'selected':''; ?>><?php echo $ti->nombre; ?></option>
                                    <?php endforeach;?>  
                                  <?php endif; ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3">
                                <label for="">Área del predio (m2): </label>
                                <input type="number" min="0" name="area_actividad_<?php echo $act->id; ?>" id="area_actividad_<?php echo $act->id; ?>" class="form-control no" placeholder="Área del predio de la actividad" value="<?php echo $area_predio; ?>">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="">Cumple POT Municipal: </label>
                                <select name="pot_actividad_<?php echo $act->id; ?>" id="pot_actividad_<?php echo $act->id; ?>" class="form-control no">
                                  <option value="">Selecciona una opción</option>
                                  <?php if(!empty($afirmacion)):?>
                                    <?php foreach($afirmacion as $ti): ?>
                                      <option value="<?php echo $ti->id; ?>" <?php echo ($cumple_pot_sino==$ti->id)?'selected':''; ?>><?php echo $ti->nombre; ?></option>
                                    <?php endforeach;?>  
                                  <?php endif; ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3">
                                <label for="">Cumple Normatividad Ambiental: </label>
                                <select name="normatividad_actividad_<?php echo $act->id; ?>" id="normatividad_actividad_<?php echo $act->id; ?>" class="form-control no">
                                  <option value="">Selecciona una opción</option>
                                  <?php if(!empty($si_no_aplica)):?>
                                    <?php foreach($si_no_aplica as $ti): ?>
                                      <option value="<?php echo $ti->id; ?>" <?php echo ($normatividad_ambiental_sino==$ti->id)?'selected':''; ?>><?php echo $ti->nombre; ?></option>
                                    <?php endforeach;?>  
                                  <?php endif; ?>
                                </select>
                              </div>
                            </div>
                            <div class="row actividad<?php echo $act->id; ?>">
                              <div class="form-group col-md-12">
                                <label for="">Observaciones: </label>
                                <textarea name="observacion_actividad_<?php echo $act->id; ?>" id="observacion_actividad_<?php echo $act->id; ?>" rows="4" class="form-control no" placeholder="Escribe tus observaciones de la actividad"> <?php echo $observacion; ?> </textarea>
                              </div>
                            </div>
                      
                          <?php endforeach; ?>
                        <?php endif;?>

                        <blockquote class="bg-warning"><b><small class="text-success">3. Observaciones generales.</small></b></blockquote>
                        <div class="row">
                          <div class="form-group col col-md-12">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control empresa" id="observacion_general" name="observacion_general" rows="10" required minlength="3"><?php echo $informacionGeneral->observacion_general;?></textarea>
                          </div>
                        </div>
                      </div>
                       <?php 
                          
                          $estiloBtn = (!empty($informacionCheck) && $informacionCheck[0]["categoria_check"] && $informacionCheck[0]["observacion_check"])?"btn btn-success pull-right":"btn btn-primary pull-right";
                          $textoBtn = (!empty($informacionCheck) && $informacionCheck[0]["categoria_check"] && $informacionCheck[0]["observacion_check"])?"Actualizar y Continuar":"Guardar y Continuar";
                      ?>
                      <div class="box-footer">
                        <a id="btn-categoria" data-form="categoriaNegocio" class="<?php echo $estiloBtn;?>"><?php echo $textoBtn;?> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="tab_5">
                    <form role="form" id="informacionVerificacion">
                          
                      <div class="box-body">
                        <div class="box-header bg-success">
                          <h3 class="box-title center text-success">INFORMACIÓN DEL VERIFICADOR Y EMPRESARIO</h3>
                        </div>  
                        <?php if(!empty($verificador)): ?>
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información de Verificador</b></small>
                        </blockquote>
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="nombre">Nombre</label>
                              <input disabled type="text" name="no" id="no" class="form-control no" placeholder="Nombre de verificador" value="<?php echo $verificador->nombre_completo; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="celular">Celular</label>
                              <input disabled type="text" name="cel" id="cel" class="form-control no" placeholder="Número de contacto" value="<?php echo $verificador->celular; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="correo">Correo electrónico</label>
                              <input disabled type="text" name="cor" id="cor" class="form-control no" placeholder="Correo del funcionario" value="<?php echo $verificador->correo; ?>">
                          </div> 
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="entidad">Entidad</label>
                              <input disabled type="text" name="entidad" id="entidad" class="form-control no" placeholder="Entidad de verificador" value="<?php echo $verificador->entidad; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="area">Área</label>
                              <input disabled type="text" name="area" id="area" class="form-control no" placeholder="Área de verificador" value="<?php echo $verificador->area; ?>">
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="cargoo">Cargo</label>
                              <input disabled type="text" name="car" id="car" class="form-control no" placeholder="Cargo de verificador" value="<?php echo $verificador->cargo; ?>">
                          </div> 
                        </div>
                      <?php endif; ?>
                     
                        <blockquote class="bg-warning">
                          <small class="text-success"><b>Información de Empresario (Quien diligencia formulario)</b></small>
                        </blockquote>
                        <div class="form-inline form-check">
                          <label for="">¿Quien diligencia es el representante legal?: -- </label> <label for=""> Si  <input type="radio" name="respuesta" id="respuesta" value="1" class="form-check-input" title="Representante legal"></label> 
                          <label for=""> Otro funcionario  <input type="radio" name="respuesta" id="respuesta" value="2" class="form-check-input" title="Otro funcionario"> </label>
                          <input type="hidden" name="representante_legal_id" id="representante_legal_id">
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <input type="hidden" name="empresario_id" id="empresario_id" value="<?php echo (!empty($informacionEmpresario))? $informacionEmpresario->id:''; ?>">
                              <label for="nombre">(*)Nombre</label>
                              <input type="text" name="nombre" id="nombre" class="form-control empresario" placeholder="Nombre de Empresario"  required minlength="3" value="<?php echo (!empty($informacionEmpresario))?$informacionEmpresario->nombre:'';?>">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="identificacion">(*)Identificación</label>
                              <input type="number" name="empresario_identificacion" id="empresario_identificacion" <?php echo (!empty($informacionEmpresario))?"relatedby='empresario_id'":""; ?> class="form-control empresario" placeholder="Identificación de Empresario" required minlength="7" maxlength="12" unique="empresario" value="<?php echo (!empty($informacionEmpresario))?$informacionEmpresario->identificacion:'';?>">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="cargo">(*)Cargo</label>
                              <input type="text" name="cargo" id="cargo" class="form-control empresario" placeholder="Cargo de Empresario" required minlength="3" maxlength="50" value="<?php echo (!empty($informacionEmpresario))?$informacionEmpresario->cargo:'';?>">
                              <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="Celular">Celular</label>
                              <input type="number" name="celular" id="celular" class="form-control empresario" placeholder="Número de Contacto del Empresario" minlength="3" value="<?php echo (!empty($informacionEmpresario))?$informacionEmpresario->celular:'';?>">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="empresario_correo">(*)Correo Electrónico</label>
                              <input type="text" name="empresario_correo" id="empresario_correo" class="form-control empresario" placeholder="Correo Electrónico de Funcionario" required minlength="7" maxlength="100" value="<?php echo (!empty($informacionEmpresario))?$informacionEmpresario->correo:'';?>">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="empresa">(*)Empresa</label>
                              <input type="text" name="empresa_empresario" id="empresa_empresario" class="form-control no" placeholder="Empresa de Empresario/funcionario" minlength="3" maxlength="100" disabled value="<?php echo $informacionGeneral->razon_social; ?>">
                              <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                       <?php 
                          
                          $estiloBtn = (!empty($informacionCheck) && $informacionCheck[0]["empresario_check"])?"btn btn-success pull-right":"btn btn-primary pull-right";
                          $textoBtn = (!empty($informacionCheck)&& $informacionCheck[0]["empresario_check"])?"Actualizar y Finalizar":"Guardar y Finalizar";
                      ?>
                      <div class="box-header">
                        <a data-form="informacionVerificacion" id="btn-verificadorEmpresario" class="<?php echo $estiloBtn;?>"><?php echo $textoBtn;?> <i class="fa fa-floppy-o" aria-hidden="true"></i> </a>
                      </div>
                    </form>
                  </div>
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
  <!-- /.content-wrapper