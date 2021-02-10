<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Hoja de Verificación Dos (2) - <small><?php echo $empresa->razon_social ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>/negocioVerde">Negocios Verdes </a></li>
        <li >Hoja de Verificación(2)</li>
        <li class="active">Agregar</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
        <div class="row">
           <input type="hidden" name="" id="url" value="<?php echo base_url(); ?>">
            <div class="col-xs-12">
              <div class="box box-success">

                  <div class="box-header">
                      <blockquote class="bg-warning">
                        <small class="text-success">Son los aspectos ambientales y legales mínimos que todo bien o servicio  debe cumplir para poder ser considerado un Negocio Verde
                        </small>
                         <small class="text-success">El tamaño máximo para subir el archivo es de <b>1MB</b> 
                        </small>
                      </blockquote>

                  </div>

                  <div class="box-body">
                     <div class="nav-tabs-custom">
                           <ul class="nav nav-pills  nav-justified">
                              <li class="active"><a href="#tab_1_1" data-toggle="tab">Criterios de Cumplimiento</a></li>
                              <li ><a href="#tab_2_1" data-toggle="tab">Criterios Adicionales</a></li>
                              <li ><a href="#tab_3_1" data-toggle="tab">Resultados de Evaluacion</a></li>
                            </ul>
                     </div>
                    <!-- tab-content --> 
                     <div class="tab-content">
                        <input type="hidden" name="empresa-id" id="empresa-id" value="<?php echo $empresa->id; ?>" />
                       <!-- Start Tab 1 - Criterios de Cumplimiento -->
                          <div class="tab-pane active" id="tab_1_1">
                               
                         <!-- Custom Tabs -->
                           <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Viabilidad Económica</a></li>
                                <li ><a href="#tab_2" data-toggle="tab">Impacto Ambienta Positivo</a></li>
                                <li ><a href="#tab_3" data-toggle="tab">Enfoque Ciclo de Vida</a></li>
                                <li ><a href="#tab_4" data-toggle="tab">Vida Útil</a></li>
                                <li ><a href="#tab_5" data-toggle="tab">Sustitución de Sustancias</a></li>
                                 <li ><a href="#tab_6" data-toggle="tab">Reciclabilidad</a></li>
                                <li ><a href="#tab_7" data-toggle="tab">Uso Eficiente y Sostenible</a></li>
                                 <li ><a href="#tab_8" data-toggle="tab">Responsabilidad Social - Interior</a></li>
                                <li ><a href="#tab_9" data-toggle="tab">Responsabilidad Social - Cadena de Valor</a></li>
                                <li ><a href="#tab_10" data-toggle="tab">Responsabilidad Social - Exteriror</a></li>
                                 <li ><a href="#tab_11" data-toggle="tab">Comunicación de Atributos</a></li>
                              </ul>
                            
                            <!-- tab-content --> 
                            <div class="tab-content">
                               <!-- Start Tab 1 - Cumplimiento Legal -->
                               <div class="tab-pane active" id="tab_1">
                                      <?php $calificacion_viabilidad = 0; $contador =0; ?>
                                       <?php if(!empty($viabilidad_economica)): ?>
                                          <?php foreach ($viabilidad_economica as $ve): ?> 
                                            <?php 
                                                if(array_key_exists($ve->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ve->id]->calificacion_id != "4"){
                                                       $contador++;
                                                       $calificacion_viabilidad += floatval($verificacion_dos[$ve->id]->calificacion);
                                                    }
                                                }
                                                


                                            
                                            ?>
                                            <!--Inicio-->
                                          <div class="row">
                                               <input type="hidden" id="ve-<?php echo $ve->id; ?>" class="ve" value="<?php echo $ve->id; ?>">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="verificación" value="<?php echo $ve->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ve->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ve->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$ve->id]->calificacion_id; ?>" selected="true" hidden><?php echo @$verificacion_dos[$ve->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="descripcion_ia[<?php echo $ve->id; ?>]" id="observacion_<?php echo $ve->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ve->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">

                                                    <label for="evidencia_<?php echo $ve->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ve->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ve->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                    <!--Cierre-->
                                    <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-1" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-1" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab1 -->

                               <!-- Start Tab 2 - Condiciones Legales -->
                               <div class="tab-pane" id="tab_2">
                                 <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Impacto ambiental positivo y contribuición a la conservación y preserveración de los recursos ecosistemicos</h3>
                                  </div>
                                    <?php $calificacion_impacto=0; $contador_impacto =0; ?>
                                     <?php if(!empty($impapcto_ambiental)): ?>
                                          <?php foreach ($impapcto_ambiental as $ia): ?>
                                           <?php if(array_key_exists($ia->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ia->id]->calificacion_id != "4"){
                                                       $contador_impacto++;
                                                       $calificacion_impacto += floatval($verificacion_dos[$ia->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="ia" value="<?php echo $ia->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ia->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ia->id; ?>">
                                                      <option value="<?php echo @$verificacion_dos[$ia->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ia->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2">0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="descripcion_ia[<?php echo $ve->id; ?>]" id="observacion_<?php echo $ia->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ia->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ve->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ia->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ia->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                   <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-2" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-2" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                               <!-- Start Tab 3 -  -->
                               <div class="tab-pane" id="tab_3">
                                  <div class="box-header with-border bg-success">
                                    <h3 class="box-title text-success">Enfoque ciclo de vida del bien o servicio</h3>
                                    </div>
                                    <?php $calificacion_enfoque = 0; $contador_enfoque =0; ?>
                                    <?php if(!empty($enfoque_ciclo)): ?>
                                          <?php foreach ($enfoque_ciclo as $ec): ?> 

                                          	<?php if(array_key_exists($ec->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ec->id]->calificacion_id != "4"){
                                                       $contador_enfoque++;
                                                       $calificacion_enfoque += floatval($verificacion_dos[$ec->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="ec" value="<?php echo $ec->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ec->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ec->id; ?>">
                                                        <option value="<?php echo @$verificacion_dos[$ec->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ec->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $ec->id; ?>]" id="observacion_<?php echo $ec->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ec->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ec->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ec->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ec->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-3" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-3" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                               <!-- Start Tab 4 - Impacto Social -->
                               <div class="tab-pane" id="tab_4">
									<?php $calificacion_vida = 0; $contador_vida = 0; ?>
                                       <?php if(!empty($vida_util)): ?>
                                          <?php foreach ($vida_util as $vu): ?> 
                                          	<?php if(array_key_exists($vu->id, $verificacion_dos)){
                                                    if($verificacion_dos[$vu->id]->calificacion_id != "4"){
                                                       $contador_vida++;
                                                       $calificacion_vida += floatval($verificacion_dos[$vu->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="vu" value="<?php echo $vu->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $vu->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $vu->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$vu->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$vu->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $vu->id; ?>]" id="observacion_<?php echo $vu->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$vu->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $vu->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$vu->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $vu->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-4" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-4" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                               <!-- Start Tab 5 - Sustancias o Materiales Peligrosos -->
                               <div class="tab-pane" id="tab_5">
                                   <div class="box-header with-border bg-success">
                                      <h3 class="box-title text-success">Sustitución de sustancia o materiales peligrosos</h3>
                                  </div>
                                  <?php $calificacion_sustancia = 0; $contador_sustancia =0; ?>
                                        <?php if(!empty($sustancia_material)): ?>
                                          <?php foreach ($sustancia_material as $sm): ?> 

                                          	<?php if(array_key_exists($sm->id, $verificacion_dos)){
                                                    if($verificacion_dos[$sm->id]->calificacion_id != "4"){
                                                       $contador_sustancia++;
                                                       $calificacion_sustancia += floatval($verificacion_dos[$sm->id]->calificacion);
                                                    }
                                                }?>

                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="sm" value="<?php echo $sm->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $sm->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $sm->id; ?>">
                                                        <option value="<?php echo @$verificacion_dos[$sm->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$sm->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $sm->id; ?>]" id="observacion_<?php echo $sm->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$sm->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $sm->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$sm->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $sm->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-5" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-5" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->


                               <!-- Start Tab 6 - Reciclabilidad y/o uso de Materiales reciclados -->
                               <div class="tab-pane" id="tab_6">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Reciclabilidad y/o uso de Materiales reciclados</h3>
                                  </div>
                                  <?php $calificacion_reciclabilidad =0; $contador_reciclabilidad =0; ?>
                                       <?php if(!empty($reciclabilidad)): ?>
                                          <?php foreach ($reciclabilidad as $re): ?> 

                                          	<?php if(array_key_exists($re->id, $verificacion_dos)){
                                                    if($verificacion_dos[$re->id]->calificacion_id != "4"){
                                                       $contador_reciclabilidad++;
                                                       $calificacion_reciclabilidad += floatval($verificacion_dos[$re->id]->calificacion);
                                                    }
                                                }?>

                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="re" value="<?php echo $re->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $re->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $re->id; ?>">
                                                      <option value="<?php echo @$verificacion_dos[$re->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$re->id]->calificacion;?></option>
                                                       <option value="1" >0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $re->id; ?>]" id="observacion_<?php echo $re->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$re->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $re->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$re->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $re->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-6" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-6" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->


                              <!-- Start Tab 7 - Uso eficiente y sostenible de recursos para la producción de bienes o servicios -->
                               <div class="tab-pane" id="tab_7">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Uso Eficiento y sostenible de recursos para la producción de bienes o servicios</h3>
                                  </div>
                                  <?php $calificacion_uso = 0; $contador_uso =0; ?>
                                    <?php if(!empty($uso_eficiente)): ?>
                                          <?php foreach ($uso_eficiente as $ue): ?> 

                                          	<?php if(array_key_exists($ue->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ue->id]->calificacion_id != "4"){
                                                       $contador_uso++;
                                                       $calificacion_uso += floatval($verificacion_dos[$ue->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="ue" value="<?php echo $ue->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ue->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ue->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$ue->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ue->id]->calificacion;?></option>
                                                       <option value="1" >0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $ue->id; ?>]" id="observacion_<?php echo $ue->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ue->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ue->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ue->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ue->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-7" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-7" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                                <!-- Start Tab 8 - Responsabilidad social al interior de la empresa -->
                               <div class="tab-pane" id="tab_8">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Responsabilidad social al interiror de la empresa </h3>
                                  </div>
                                  <?php $calificacion_interior = 0; $contador_interior =0; ?>
                                    <?php if(!empty($responsabilidad_interior)): ?>
                                          <?php foreach ($responsabilidad_interior as $ri): ?> 

                                          	<?php if(array_key_exists($ri->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ri->id]->calificacion_id != "4"){
                                                       $contador_interior++;
                                                       $calificacion_interior += floatval($verificacion_dos[$ri->id]->calificacion);
                                                    }
                                                }?>

                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="ri" value="<?php echo $ri->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ri->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ri->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$ri->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ri->id]->calificacion;?></option>
                                                       <option value="1" >0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $ri->id; ?>]" id="observacion_<?php echo $ri->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ri->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ri->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ri->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ri->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-8" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-8" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                               <!-- Start Tab 9 - Resposabilidad social en la cadena de valor de la empresa -->
                               <div class="tab-pane" id="tab_9">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Resposabilidad social en la cadena de valor de la empresa </h3>
                                  </div>
                                  <?php $calificacion_cadena = 0; $contador_cadena =0; ?>
                                       <?php if(!empty($responsabilidad_cadena)): ?>
                                          <?php foreach ($responsabilidad_cadena as $rc): ?> 
                                          	<?php if(array_key_exists($rc->id, $verificacion_dos)){
                                                    if($verificacion_dos[$rc->id]->calificacion_id != "4"){
                                                       $contador_cadena++;
                                                       $calificacion_cadena += floatval($verificacion_dos[$rc->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="rc" value="<?php echo $rc->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $rc->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $rc->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$rc->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$rc->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $rc->id; ?>]" id="observacion_<?php echo $rc->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$rc->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $rc->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$rc->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $rc->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-9" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-9" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->

                               <!-- Start Tab 10 - Responsabilidad social al exterior de la empresa -->
                               <div class="tab-pane" id="tab_10">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success">Responsabilidad social al exterior de la empresa </h3>
                                  </div>
                                  <?php $calificacion_exterior =0; $contador_exterior =0; ?>
                                        <?php if(!empty($responsabilidad_exterior)): ?>
                                          <?php foreach ($responsabilidad_exterior as $rex): ?> 
                                          	<?php if(array_key_exists($rex->id, $verificacion_dos)){
                                                    if($verificacion_dos[$rex->id]->calificacion_id != "4"){
                                                       $contador_exterior++;
                                                       $calificacion_exterior += floatval($verificacion_dos[$rex->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="rex" value="<?php echo $rex->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $rex->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $rex->id; ?>">
                                                      <option value="<?php echo @$verificacion_dos[$rex->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$rex->id]->calificacion;?></option>
                                                       <option value="1" >0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $rex->id; ?>]" id="observacion_<?php echo $rex->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$rex->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $rex->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$rex->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $rex->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-10" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-10" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->


                               <!-- Start Tab 11 - Comunicación de atributos del bien -->
                               <div class="tab-pane" id="tab_11">
                                <div class="box-header with-border bg-success">
                                  <h3 class="box-title text-success"> Comunicación de atributos del bien</h3>
                                  </div>
                                  <?php $calificacion_comunicacion =0; $contador_comunicacion =0; ?>
                                   <?php if(!empty($comunicacion_atributo)): ?>
                                          <?php foreach ($comunicacion_atributo as $ca): ?> 
                                          	<?php if(array_key_exists($ca->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ca->id]->calificacion_id != "4"){
                                                       $contador_comunicacion++;
                                                       $calificacion_comunicacion += floatval($verificacion_dos[$ca->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="ca" value="<?php echo $ca->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ca->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                     <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                     <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ca->id; ?>">
                                                       <option value="<?php echo @$verificacion_dos[$ca->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ca->id]->calificacion;?></option>
                                                       <option value="1">0</option>
                                                       <option value="2" >0.5</option>
                                                       <option value="3">1</option>
                                                       <option value="4">N/A</option>
                                                     </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="observacion[<?php echo $ca->id; ?>]" id="observacion_<?php echo $ca->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ca->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ca->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ca->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ca->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1-11" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1-11" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                               </div>
                               <!-- End Tab -->
                            </div>
                           </div>
                         </div>

                       <!-- Start Tab 2 - Criterios Adicionales -->
                        <div class="tab-pane" id="tab_2_1">
                          <div class="nav-tabs-custom">
                             <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_2_2" data-toggle="tab">Esquema, programa o reconocimientos</a></li>
                                <li><a href="#tab_2_3" data-toggle="tab">Responsabilidad Social</a></li>
                              </ul>
                          </div>
                          
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_2_2">
                                      <?php $calificacion_esquema =0; $contador_esquema =0; ?>
                                       <?php if(!empty($esquema_programa)): ?>
                                          <?php foreach ($esquema_programa as $ve): ?> 

                                          	<?php if(array_key_exists($ve->id, $verificacion_dos)){
                                                    if($verificacion_dos[$ve->id]->calificacion_id != "4"){
                                                       $contador_esquema++;
                                                       $calificacion_esquema += floatval($verificacion_dos[$ve->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                              <div class="col-md-5">
                                                    <input type="hidden" class="vex" value="<?php echo $ve->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $ve->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                       <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                       <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $ve->id; ?>">
                                                        <option value="<?php echo @$verificacion_dos[$ve->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$ve->id]->calificacion;?></option>
                                                         <option value="1" >0</option>
                                                         <option value="2" >0.5</option>
                                                         <option value="3">1</option>
                                                         <option value="4">N/A</option>
                                                       </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-5">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="descripcion_ia[<?php echo $ve->id; ?>]" id="observacion_<?php echo $ve->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$ve->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $ve->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$ve->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $ve->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" />
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <button id="enviar-tab2-2" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress2-2" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            
                              <div class="tab-pane" id="tab_2_3">
                              	<?php $calificacion_responsabilidad = 0; $contador_responsabilidad =0; ?>
                                       <?php if(!empty($responsabilidad_social)): ?>
                                          <?php foreach ($responsabilidad_social as $resp): ?> 
                                          	<?php if(array_key_exists($resp->id, $verificacion_dos)){

                                                    if($verificacion_dos[$resp->id]->calificacion_id != "4"){
                                                       $contador_responsabilidad++;
                                                       $calificacion_responsabilidad += floatval($verificacion_dos[$resp->id]->calificacion);
                                                    }
                                                }?>
                                            <!--Inicio-->
                                          <div class="row">
                                                <div class="col-md-5">
                                                    <input type="hidden" class="resp" value="<?php echo $resp->id; ?>">
                                                    <p class="form-control-static">
                                                      <?php echo $resp->nombre; ?>
                                                    </p>
                                                
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                       <label for="cumple_invima">Calificador (0, 0.5, 1, N/A)</label>
                                                       <select class="form-control " name="cumple_invima" id="calificacion_<?php echo $resp->id; ?>">
                                                         <option value="<?php echo @$verificacion_dos[$resp->id]->calificacion_id; ?>" selected hidden><?php echo @$verificacion_dos[$resp->id]->calificacion;?></option>
                                                         <option value="1" >0</option>
                                                         <option value="2" >0.5</option>
                                                         <option value="3">1</option>
                                                         <option value="4">N/A</option>
                                                       </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="" class="">Observaciones</label>
                                                    <textarea name="descripcion_ia[<?php echo $resp->id; ?>]" id="observacion_<?php echo $resp->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_dos[$resp->id]->observacion;?></textarea>
                                                  </div>
                                                </div>  
                                                 
                                            </div>
                                             <div class="row">
                                              <div class="col-md-4">
                                                  <div class="input-group">
                                                    <label for="evidencia_<?php echo $resp->id; ?>" class="btn btn-success" role="alert">
                                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span><span > Click para seleccionar las <strong>Evidencias (fotos, documentos, datos, etc): <?php echo @$verificacion_dos[$resp->id]->nombre_archivo;?></strong></span>
                                                    </label>
                                                     <input type="file" id="evidencia_<?php echo $resp->id; ?>" class="subir-evidencia" value="Archivo" style="display: none;" >
                                                    
                                                  </div>
                                                </div>
                                             </div>
                                            <!--Cierre-->
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <button id="enviar-tab2-3" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress2-3" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>


                         </div>
                         <!-- end tab -->
					<?php 
						$calificacion_impacto = @($calificacion_impacto / $contador_impacto) * 100;
						$calificacion_viabilidad = @($calificacion_viabilidad / $contador) * 100;
						$calificacion_enfoque = @($calificacion_enfoque / $contador_enfoque) * 100;
						$calificacion_vida = @($calificacion_vida / $contador_vida) * 100;
						$calificacion_cadena  = @($calificacion_cadena / $contador_cadena)  * 100;
						$calificacion_comunicacion = @($calificacion_comunicacion / $contador_comunicacion) * 100;
						$calificacion_esquema = @($calificacion_esquema  / $contador_esquema) * 100;
						$calificacion_exterior = @($calificacion_exterior / $contador_exterior) * 100;
						$calificacion_interior = @($calificacion_interior / $contador_interior) * 100;
						$calificacion_sustancia = @($calificacion_sustancia / $contador_sustancia) * 100;
						$calificacion_reciclabilidad = @($calificacion_reciclabilidad / $contador_reciclabilidad) * 100;
						$calificacion_uso = @($calificacion_uso / $contador_uso) * 100;
						$calificacion_responsabilidad = @($calificacion_responsabilidad / $contador_responsabilidad) * 100;

           

           $suma_nivel_0 = $contador_impacto + $contador+$contador_enfoque+$contador_vida+$contador_cadena+$contador_comunicacion+$contador_exterior+$contador_interior+$contador_sustancia + $contador_reciclabilidad+$contador_uso;

						$calificacion_creterio_cumplimineto = @(($calificacion_impacto+$calificacion_viabilidad+$calificacion_enfoque+$calificacion_vida+$calificacion_cadena+$calificacion_comunicacion+$calificacion_exterior+$calificacion_interior+$calificacion_sustancia+$calificacion_reciclabilidad+$calificacion_uso)) / 11;
						

            $suma_nivel_1 = $contador_esquema + $contador_responsabilidad;

            $calificacion_criterio_adicional = @($calificacion_esquema+$calificacion_responsabilidad) / 2;

						$resultado_puntaje = ($calificacion_creterio_cumplimineto + $calificacion_criterio_adicional) / 2;
					?>
                         <!-- Start Tab 3 - Resultados -->
                         <div class="tab-pane" id="tab_3_1">
                            <div class="tab-pane active" id="tab_3_2">
                              <div class="panel panel-success">
                                  <div class="panel-heading">
                                      <h2 class="panel-title">Evaluacion y Puntajes totales</h2>
                                  </div>
                                  <div class="panel-body">
                                      <table class="table">
                                        <tbody>
                                          <tr>
                                            <td>Criterios de Cumplimiento de Negocios Verdes</td>
                                            <td><span  class="label label-success"><?php 
                                            	echo number_format($calificacion_creterio_cumplimineto, 2);
                                            ?>%</span></td>
                                          </tr>
                                          <tr>
                                            <td>Criterios Adicionales (ideales) Negocios Verdes</td>
                                            <td><span  class="label label-success"><?php 
                                            	echo number_format($calificacion_criterio_adicional, 2);
                                            ?>%</span></td>
                                          </tr>
                                          <tr>
                                            <td><h2>Resultado</h2></td>
                                            <td><h2><span  class="label label-default"><?php 
                                            		echo verificar_negocio($calificacion_creterio_cumplimineto, $calificacion_criterio_adicional); ?>
                                            </span></h2></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                  </div>
                            </div>

                              <div class="panel panel-success">
                                 <div class="panel-heading">
                                  <h3 class="panel-title">Detalles del resultados Nivel 1. Criterios de Cumplimiento de Negocios verdes</h3>
                                  </div>
                                  <div class="panel-body">
                                  <table class="table">
                                      <thead>
                                      <tr>
                                        <th>Criterio</th>
                                        <th>Promedio</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Viabilidad económica del Negocio</td>
                                          <td><span  class="label label-success"><?php echo  number_format($calificacion_viabilidad, 2); ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Impacto Ambiental Positivo y contribución a la conservación y preservación de los recursos ecosistemicos</td>
                                          <td><span  class="label label-success"><?php 
                                          echo number_format($calificacion_impacto, 2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Enfoque ciclo de vida del bien o servicio</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_enfoque,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Vida útil</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_vida,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Sustitución de sustancias o materiales peligrosos</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_sustancia,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Reciclabilidad y/o uso de materiales reciclados</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_reciclabilidad,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Uso eficiente y sostenible de recursos para la producción de bienes o servicios</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_uso,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Responsabilidad social al interior de la empresa</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_interior,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Responsabilidad social en la cadena de valor de la empresa</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_cadena,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Responsabilidad social al exterior de la empresa</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_exterior,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Comunicación de atributos del bien y servicio</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_comunicacion,2);
                                          ?>%</span></td>
                                        </tr>
                                      </tbody>
                                     <!-- <tfoot>
                                         <tr class="success">
                                          <th>Puntaje Final</th>
                                          <th><h4><span  class="label label-success">0%</span></h4></th>
                                        </tr>
                                      </tfoot>-->
                                  </table>
                                  </div>
                              </div>

                                 <div class="panel panel-success">
                                  <div class="panel-heading">
                                  <h3 class="panel-title">Detaller del resultados Nivel 2. Criterios Adicionales de Negocios verdes</h3>
                                  </div>
                                  <div class="panel-body">
                                   <table class="table">
                                      <thead>
                                      <tr>
                                        <th>Criterio</th>
                                        <th>Promedio</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Esquemas, programas o reconocimientos implementados o recibidos</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_esquema,2);
                                          ?>%</span></td>
                                        </tr>
                                        <tr>
                                          <td>Responsabilidad social al interior de la empresa adicional</td>
                                          <td><span  class="label label-success"><?php 
                                          	 echo number_format($calificacion_responsabilidad,2);
                                          ?>%</span></td>
                                        </tr>
                                      </tbody>
                                     <!-- <tfoot>
                                        <tr class="success">
                                          <th>Puntaje Final</th>
                                          <th><h4><span  class="label label-success">0%</span></h4></th>
                                        </tr>
                                      </tfoot>-->
                                  </table>
                                  </div>
                            </div>
                         </div>
                         <!-- end tab -->
                    </div>
                   </div>
              </div>
            </div>
        </div>
    </section>
</div>


