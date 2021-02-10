<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Plan de Mejora - <small><?php echo $empresa->razon_social; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>/negocioVerde">Negocios Verdes </a></li>
        <li >Plan de Mejora</li>
        <li class="active">Agregar</li>
      </ol>
    </section>
  
     <!-- Main content -->
    <section class="content">
        <div class="row">
          <input type="hidden" name="" id="url" value="<?php echo base_url(); ?>">
          <input type="hidden" name="empresa-id" id="empresa-id" value="<?php echo $empresa->id; ?>" />
            <div class="col-xs-12">
              <div class="box box-success">

                  <div class="box-header">
                      <blockquote class="bg-warning">
                        <small class="text-success">RECUERDE: La información que va a diligenciar a continuación, debe estar en letra minúscula y con buena ortografía.                           
                        </small>
                      </blockquote>

                  </div>

                  <div class="box-body">
                          <div class="nav-tabs-custom">
                             <ul class="nav nav-pills  nav-justified">
                                <li class="active"><a href="#tab_nivel_0" data-toggle="tab">Nivel 0 - Verificación Uno(1)</a></li>
                                <li ><a href="#tab_nivel_1" data-toggle="tab">Nivel 1 - Verificación Dos(2)</a></li>
                              </ul>
                         </div>
                    <!-- tab-content --> 
                     <div class="tab-content">
                       <!-- Start Tab 1 - Criterios de Cumplimiento -->
                          <div class="tab-pane active" id="tab_nivel_0">

                             <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  <?php if(count($cumplimiento_legal) > 0): ?>
                                    <li ><a href="#tab_0_1" data-toggle="tab">Cumplimiento Legal</a></li>
                                  <? endif; ?>
                                   <?php if(count($condiciones_laborales) > 0): ?>
                                    <li ><a href="#tab_0_2" data-toggle="tab">Condiciones Laborales</a></li>
                                  <? endif; ?>
                                  <?php if(count($impacto_ambiental) > 0): ?>
                                    <li ><a href="#tab_0_3" data-toggle="tab">Impacto Ambiental</a></li>
                                  <? endif; ?>
                                  <?php if(count($impacto_social) > 0): ?>
                                    <li ><a href="#tab_0_4" data-toggle="tab">Impacto Social</a></li>
                                  <? endif; ?>
                                   <?php if(count($sustancia_material) > 0): ?>
                                    <li ><a href="#tab_0_5" data-toggle="tab">Sustancias o Materiales Peligrosos</a></li>
                                  <? endif; ?>
                                  </ul>

                              <div class="tab-content">
                                  <?php if(!empty($sustancia_material)): ?>
                                    <div class="tab-pane" id="tab_0_5">
                                      
                                        <?php foreach ($sustancia_material as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                          <input type="hidden" name="sm" class="sm" value="<?php echo $cl->id; ?>">
                                            <div class="col-md-3">
                                                <label for="cumple_invima">- Indicador</label>
                                                  <p class="form-control-static">
                                                    <?php echo $cl->nombre; ?>
                                                  </p>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="" class="">Acciones correctivas por indicador</label>
                                                  <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                                </div>
                                              </div>  
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="" class="">Actores</label>
                                                  <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actor; ?> </textarea>
                                                </div>
                                              </div>  
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="" class="">Resultados Esperados</label>
                                                  <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                                </div>
                                              </div>  
                                          </div>
                                           <div class="row">
                                             <div class="col-md-3">
                                              <label>Cronograma (Seleccionar)</label>
                                             </div>
                                             </div>
                                          <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none; " checked="<?php echo @$estado_mes[$cl->mes_1]; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_2]; ?>">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_3]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_4]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_5]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_6]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_7]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_8]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_9]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_10]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>" >Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_11]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_12]; ?>">
                                            </div>
                                          </div>
                                        
                                      </div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="" class="">Observaciones generales</label>
                                                  <textarea name="observaciones-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                                </div>
                                              </div>  
                                          </div>
                                          <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                      <!--Cierre-->
                                      <div class="row">
                                          <div class="col-md">
                                            <button id="enviar-tab0-5" class="btn btn-primary pull-right">Guardar</button>
                                          </div>
                                          <div class="col-md" id="progress0-5" style="display: none;">
                                            <div class="progress">
                                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                Guardando Información
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                 </div>
                                <?php endif; ?>

                             <?php if(!empty($cumplimiento_legal)): ?>
                                <div class="tab-pane" id="tab_0_1">
                                  
                                    <?php foreach ($cumplimiento_legal as $cl): ?> 
                                      <!--Inicio-->
                                    <div class="row">

                                      <input type="hidden" name="cl" class="cl" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actor; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none; " checked="<?php echo @$estado_mes[$cl->mes_1]; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_2]; ?>">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_3]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_4]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_5]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_6]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_7]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_8]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_9]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_10]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>" >Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_11]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_12]; ?>">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="observaciones-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                
                                  <!--Cierre-->
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab0-1" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress0-1" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                             </div>
                            <?php endif; ?>

                              <?php if(!empty($condiciones_laborales)): ?>
                                <div class="tab-pane" id="tab_0_2">
                                  
                                    <?php foreach ($condiciones_laborales as $cl): ?> 
                                      <!--Inicio-->
                                    <div class="row">

                                      <input type="hidden" name="cll" class="cll" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actor; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                       <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none; " checked="<?php echo @$estado_mes[$cl->mes_1]; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_2]; ?>">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_3]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_4]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_5]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_6]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_7]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_8]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_9]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_10]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>" >Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_11]; ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;" checked="<?php echo @$estado_mes[$cl->mes_12]; ?>">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="observaciones-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->observacion; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                
                                  <!--Cierre-->
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab0-2" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress0-2" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                             </div>
                            <?php endif; ?>

                             <?php if(!empty($impacto_ambiental)): ?>
                                <div class="tab-pane" id="tab_0_3">
                                  
                                    <?php foreach ($impacto_ambiental as $cl): ?> 
                                      <!--Inicio-->
                                    <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                
                                  <!--Cierre-->
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab0-3" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress0-3" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                             </div>
                            <?php endif; ?>

                             <?php if(!empty($impacto_social)): ?>
                                <div class="tab-pane" id="tab_0_4">
                                  
                                    <?php foreach ($impacto_social as $cl): ?> 
                                      <!--Inicio-->
                                   <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <div class="divider"></div>
                                  <!--Cierre-->
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab0-4" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress0-4" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                             </div>
                            <?php endif; ?>

                              </div>  
                          </div>

                               

                            
                          </div>

                          <div class="tab-pane" id="tab_nivel_1">
                              <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                    <?php if(count($viabilidad_economica) > 0): ?>
                                      <li ><a href="#tab_1_1" data-toggle="tab">Viabilidad Economica</a></li>
                                    <? endif; ?>
                                     <?php if(count($impacto_ambienta_positivo) > 0): ?>
                                      <li ><a href="#tab_1_2" data-toggle="tab">Impacto Ambiental Positivo</a></li>
                                    <? endif; ?>
                                    <?php if(count($enfoque_ciclo_vida) > 0): ?>
                                      <li ><a href="#tab_1_3" data-toggle="tab">Enfoque Ciclo de Vida</a></li>
                                    <? endif; ?>
                                    <?php if(count($vida_util) > 0): ?>
                                      <li ><a href="#tab_1_4" data-toggle="tab">Vida Útil</a></li>
                                    <? endif; ?>
                                     <?php if(count($sustitucion_sustancias) > 0): ?>
                                      <li ><a href="#tab_1_5" data-toggle="tab">Sustitición de Sustancias</a></li>
                                    <? endif; ?>
                                      <?php if(count($reciclabilidad) > 0): ?>
                                      <li ><a href="#tab_1_6" data-toggle="tab">Reciclabilidad</a></li>
                                    <? endif; ?>
                                     <?php if(count($uso_eficiente_sostenible) > 0): ?>
                                      <li ><a href="#tab_1_7" data-toggle="tab">Uso Eficiente y Sostenible</a></li>
                                    <? endif; ?>
                                     <?php if(count($responsabilidad_interior) > 0): ?>
                                      <li ><a href="#tab_1_8" data-toggle="tab">Responsabilidad Social - Interior</a></li>
                                    <? endif; ?>
                                     <?php if(count($responsabilidad_cadena) > 0): ?>
                                      <li ><a href="#tab_1_9" data-toggle="tab">Responsabilidad Social - Cadena Valor</a></li>
                                    <? endif; ?>
                                     <?php if(count($responsabilidad_exterior) > 0): ?>
                                      <li ><a href="#tab_1_10" data-toggle="tab">Responsabilidad Social - Exterior</a></li>
                                    <? endif; ?>
                                     <?php if(count($comunicacion_atributos) > 0): ?>
                                      <li ><a href="#tab_1_11" data-toggle="tab">Comunicación de Atributos</a></li>
                                    <? endif; ?>
                                    </ul>
                                    <div class="tab-content">

                                      <?php if(!empty($viabilidad_economica)): ?>
                                        <div class="tab-pane" id="tab_1_1">
                                      
                                        <?php foreach ($viabilidad_economica as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
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
                                       <?php endif; ?>

                                      <?php if(!empty($impacto_ambienta_positivo)): ?>
                                        <div class="tab-pane" id="tab_1_2">
                                      
                                        <?php foreach ($impacto_ambienta_positivo as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($enfoque_ciclo_vida)): ?>
                                        <div class="tab-pane" id="tab_1_3">
                                      
                                        <?php foreach ($enfoque_ciclo_vida as $cl): ?> 
                                          <!--Inicio-->
                                       <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($vida_util)): ?>
                                        <div class="tab-pane" id="tab_1_4">
                                      
                                        <?php foreach ($vida_util as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($sustitucion_sustancias)): ?>
                                        <div class="tab-pane" id="tab_1_5">
                                      
                                        <?php foreach ($sustitucion_sustancias as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($reciclabilidad)): ?>
                                        <div class="tab-pane" id="tab_1_6">
                                      
                                        <?php foreach ($reciclabilidad as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($uso_eficiente_sostenible)): ?>
                                        <div class="tab-pane" id="tab_1_7">
                                      
                                        <?php foreach ($uso_eficiente_sostenible as $cl): ?> 
                                          <!--Inicio-->
                                       <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($responsabilidad_interior)): ?>
                                        <div class="tab-pane" id="tab_1_8">
                                      
                                        <?php foreach ($responsabilidad_interior as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($responsabilidad_cadena)): ?>
                                        <div class="tab-pane" id="tab_1_9">
                                      
                                        <?php foreach ($responsabilidad_cadena as $cl): ?> 
                                          <!--Inicio-->
                                       <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($responsabilidad_exterior)): ?>
                                        <div class="tab-pane" id="tab_1_10">
                                      
                                        <?php foreach ($responsabilidad_exterior as $cl): ?> 
                                          <!--Inicio-->
                                        <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>

                                      <?php if(!empty($comunicacion_atributos)): ?>
                                        <div class="tab-pane" id="tab_1_10">
                                      
                                        <?php foreach ($comunicacion_atributos as $cl): ?> 
                                          <!--Inicio-->
                                       <div class="row">

                                      <input type="hidden" name="ia" class="ia" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-3">
                                            <label for="cumple_invima">- Indicador</label>
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Acciones correctivas por indicador</label>
                                              <textarea name="acciones-<?php echo $cl->id; ?>" id="acciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->acciones; ?> </textarea>
                                            </div>
                                          </div>  
                                         <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Actores</label>
                                              <textarea name="actores-[<?php echo $cl->id; ?>]" id="actores-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->actores; ?> </textarea>
                                            </div>
                                          </div>  
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="" class="">Resultados Esperados</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="resultados-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$cl->resultado; ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Cronograma (Seleccionar)</label>
                                         </div>
                                         </div>
                                      <div class="row">
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-1-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_1] ? 'btn-primary': 'btn-default' ?>"> Ene(1)</label>
                                            <input role="group" type="checkbox" id="mes-1-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          <div class="form-group">
                                            <label for="mes-2-<?php echo $cl->id; ?>"class="btn <?php echo $estado_mes[$cl->mes_2] ? 'btn-primary': 'btn-default' ?>">Feb(2)</label>
                                            <input role="group" type="checkbox" id="mes-2-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                          </div>
                                        </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-3-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_3] ? 'btn-primary': 'btn-default' ?>">Mar(3)</label>
                                              <input role="group" type="checkbox" id="mes-3-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-4-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_4] ? 'btn-primary': 'btn-default' ?>">Abr(4)</label>
                                              <input role="group" type="checkbox" id="mes-4-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-5-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_5] ? 'btn-primary': 'btn-default' ?>">May(5)</label>
                                              <input role="group" type="checkbox" id="mes-5-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-6-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_6] ? 'btn-primary': 'btn-default' ?>">Jun(6)</label>
                                              <input role="group" type="checkbox" id="mes-6-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-7-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_7] ? 'btn-primary': 'btn-default' ?>">Jul(7)</label>
                                              <input role="group" type="checkbox" id="mes-7-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-8-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_8] ? 'btn-primary': 'btn-default' ?>">Ago(8)</label>
                                              <input role="group" type="checkbox" id="mes-8-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-9-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_9] ? 'btn-primary': 'btn-default' ?>">Sep(9)</label>
                                              <input role="group" type="checkbox" id="mes-9-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-10-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_10] ? 'btn-primary': 'btn-default' ?>">Oct(10)</label>
                                              <input role="group" type="checkbox" id="mes-10-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-11-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_11] ? 'btn-primary': 'btn-default' ?>">Nov(11)</label>
                                              <input role="group" type="checkbox" id="mes-11-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <div class="form-group">
                                              <label for="mes-12-<?php echo $cl->id; ?>" class="btn <?php echo $estado_mes[$cl->mes_12] ? 'btn-primary': 'btn-default' ?>" style=" white-space: normal;">Dic(12)</label>
                                              <input role="group" type="checkbox" id="mes-12-<?php echo $cl->id; ?>" class="mes" style="display: none;">
                                            </div>
                                          </div>
                                        
                                      </div>
                                      <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones generales</label>
                                              <textarea name="resultados-[<?php echo $cl->id; ?>]" id="observaciones-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                        <?php endforeach; ?>
                                    
                                          <!--Cierre-->
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
                                       <?php endif; ?>



  
                                    </div>
                              </div>
                          </div>   
                       </div>
                   </div>
              </div>
            </div>
        </div>
    </section>
</div>


