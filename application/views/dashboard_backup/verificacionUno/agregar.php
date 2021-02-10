<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Hoja de Verificación Uno (1) - <small><?php echo $empresa->razon_social ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>/negocioVerde">Negocios Verdes </a></li>
        <li >Hoja de Verificación(1)</li>
        <li class="active">Agregar</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                  <div class="box-header">
                      <blockquote class="bg-warning">
                        <small class="text-success">Son los aspectos ambientales y legales mínimos que todo bien o servicio  debe cumplir para poder ser considerado un Negocio Verde
                        </small>
                      </blockquote>
                  </div>

                  <div class="box-body">
                    <input type="hidden" name="" id="url" value="<?php echo base_url(); ?>">
                       <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Cumplimiento Legal</a></li>
                              <li ><a href="#tab_2" data-toggle="tab">Condiciones Laborales</a></li>
                              <li ><a href="#tab_3" data-toggle="tab">Impacto Ambiental</a></li>
                              <li ><a href="#tab_4" data-toggle="tab">Impacto Social</a></li>
                              <li ><a href="#tab_5" data-toggle="tab">Sustancias o Materiales Peligrosos</a></li>
                            </ul>
                          
                          <!-- tab-content --> 
                          <div class="tab-content">
                            <input type="hidden" name="empresa-id" id="empresa-id" value="<?php echo $empresa->id; ?>" />
                             <!-- Start Tab 1 - Cumplimiento Legal -->
                             <div class="tab-pane active" id="tab_1">
                                  <?php if(!empty($cumplimiento_legal)): ?>
                                    <?php foreach ($cumplimiento_legal as $cl): ?> 
                                      <!--Inicio-->
                                    <div class="row">
                                      <input type="hidden" name="cumplimiento-legal" class="cumplimiento-legal" value="<?php echo $cl->id; ?>">
                                        <div class="col-md-5">
                                              <p class="form-control-static">
                                                <?php echo $cl->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="form-group col-md-2">
                                               <label for="cumple_invima">Si/ No/ No Aplica</label>
                                               <select class="form-control" name="opcion-select-<?php echo $cl->id; ?>" id="opcion-select-<?php echo $cl->id; ?>" required>
                                                  <option value="<?php echo @$verificacion_uno[$cl->id]->estado;?>" selected hidden disabled><?php echo @$verificacion_uno[$cl->id]->nombre;?></option>
                                                 <option value="1">SI</option>
                                                 <option value="2">No</option>
                                                 <option value="3">No Aplica</option>
                                               </select>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones</label>
                                              <textarea name="opcion-obs-[<?php echo $cl->id; ?>]" id="opcion-obs-<?php echo $cl->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cl->id]->observacion ?> </textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                  <!--Cierre-->
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab1" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress1" style="display: none;">
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
                                 <?php if(!empty($condiciones_laborales)): ?>
                                    <?php foreach ($condiciones_laborales as $cll): ?> 

                                      <!--Inicio-->
                                    <div class="row">
                                       <input type="hidden" name="condiciones-laborales-<?php echo $cll->id; ?>" class="condiciones-laborales" value="<?php echo $cll->id; ?>">
                                        <div class="col-md-5">
                                              <p class="form-control-static">
                                                <?php echo $cll->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="form-group col-md-2">
                                               <label for="cumple_invima">Si/ No/ No Aplica</label>
                                               <select class="form-control" name="opcion-select-<?php echo $cll->id; ?>" id="opcion-select-<?php echo $cll->id; ?>" required>
                                                  <option value="<?php echo @$verificacion_uno[$cll->id]->estado;?>" selected hidden disabled><?php echo @$verificacion_uno[$cll->id]->nombre;?></option>
                                                 <option value="1">SI</option>
                                                 <option value="2" >No</option>
                                                 <option value="3">No Aplica</option>
                                               </select>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones</label>
                                              <textarea name="opcion-obs-<?php echo $cll->id; ?>" id="opcion-obs-<?php echo $cll->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$cll->id]->observacion;?></textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                   <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab2" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress2" style="display: none;">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            Guardando Información
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                             </div>
                             <!-- End Tab -->

                             <!-- Start Tab 3 - Impacto Ambiental -->
                             <div class="tab-pane" id="tab_3">
                                 <?php if(!empty($impacto_ambiental)): ?>
                                    <?php foreach ($impacto_ambiental as $ia): ?> 
                                      <!--Inicio-->
                                    <div class="row">
                                      <input type="hidden" id="im-amb-<?php echo $ia->id; ?>" class="impacto-ambiental" value="<?php echo $ia->id; ?>">
                                        <div class="col-md-5">
                                              <p class="form-control-static">
                                                <?php echo $ia->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="form-group col-md-2">
                                               <label for="cumple_invima">Si/ No/ No Aplica</label>
                                               <select class="form-control" name="opcion-select-<?php echo $ia->id; ?>" id="opcion-select-<?php echo $ia->id; ?>" required>
                                                <option value="<?php echo @$verificacion_uno[$ia->id]->estado;?>" selected hidden disabled><?php echo @$verificacion_uno[$ia->id]->nombre;?></option>
                                                 <option value="1">SI</option>
                                                 <option value="2">No</option>
                                                 <option value="3">No Aplica</option>
                                               </select>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones</label>
                                              <textarea name="opcion-obs-<?php echo $ia->id; ?>" id="opcion-obs-<?php echo $ia->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$ia->id]->observacion;?></textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab3" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress3" style="display: none;">
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
                              <?php if(!empty($impacto_social)): ?>
                                    <?php foreach ($impacto_social as $is): ?> 
                                      <!--Inicio-->
                                    <div class="row">
                                        <input type="hidden" id="im-amb-<?php echo $ia->id; ?>" class="impacto-social" value="<?php echo $is->id; ?>">
                                        <div class="col-md-5">
                                              <p class="form-control-static">
                                                <?php echo $is->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="form-group col-md-2">
                                               <label for="cumple_invima">Si/ No/ No Aplica</label>
                                               <select class="form-control" name="opcion-select-<?php echo $is->id; ?>" id="opcion-select-<?php echo $is->id; ?>" required>
                                                  <option value="<?php echo @$verificacion_uno[$is->id]->estado;?>" selected hidden disabled><?php echo @$verificacion_uno[$is->id]->nombre;?></option>
                                                 <option value="1">SI</option>
                                                 <option value="2">No</option>
                                                 <option value="3">No Aplica</option>
                                               </select>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones</label>
                                              <textarea name="opcion-obs-<?php echo $is->id; ?>" id="opcion-obs-<?php echo $is->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$is->id]->observacion;?></textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                   <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab4" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress4" style="display: none;">
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

                              <?php if(!empty($sustancia_material)): ?>
                                    <?php foreach ($sustancia_material as $sm): ?>

                                      <!--Inicio-->
                                    <div class="row">
                                       <input type="hidden" id="sm-ma-<?php echo $sm->id; ?>" class="sustancia-material" value="<?php echo $sm->id; ?>">
                                        <div class="col-md-5">
                                              <p class="form-control-static">
                                                <?php echo $sm->nombre; ?>
                                              </p>
                                          
                                          </div>
                                          <div class="form-group col-md-2">
                                               <label for="cumple_invima">Si/ No/ No Aplica</label>
                                               <select class="form-control" name="opcion-select-<?php echo $sm->id; ?>" id="opcion-select-<?php echo $sm->id; ?>" required>
                                                <option value="<?php echo @$verificacion_uno[$sm->id]->estado;?>" selected hidden disabled><?php echo @$verificacion_uno[$sm->id]->nombre;?></option>
                                                 <option value="1">SI</option>
                                                 <option value="2">No</option>
                                                 <option value="3">No Aplica</option>
                                               </select>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="" class="">Observaciones</label>
                                              <textarea name="opcion-obs-<?php echo $sm->id; ?>" id="opcion-obs-<?php echo $sm->id; ?>" class="form-control" rows="2"><?php echo @$verificacion_uno[$sm->id]->observacion;?></textarea>
                                            </div>
                                          </div>  
                                      </div>
                                      <!--Cierre-->
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                  <div class="row">
                                      <div class="col-md">
                                        <button id="enviar-tab5" class="btn btn-primary pull-right">Guardar</button>
                                      </div>
                                      <div class="col-md" id="progress5" style="display: none;">
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
              </div>
            </div>
        </div>
    </section>
</div>
