    
                        <?php if(!empty($practica_conservacion)): ?>
                          <?php foreach($practica_conservacion as $pc): ?>
                             <?php 
                              $key = (!empty($empresaConservacion))? array_search($pc->id, array_column($empresaConservacion, 'opciones_id')):false;
                              $area = ((!empty($empresaConservacion)) && $empresaConservacion[$key]["area"]!= null)? $empresaConservacion[$key]["area"]:"";
                              $descripcion = ((!empty($empresaConservacion)) && $empresaConservacion[$key]["descripcion"]!= null)? $empresaConservacion[$key]["descripcion"]:"";
                              $confirmacion = ((!empty($empresaConservacion)) && $empresaConservacion[$key]["confirmacion"]!= null)? $empresaConservacion[$key]["confirmacion"]:""; 
                              $disabled = ($confirmacion==1)? "":"disabled";
                              $checked = ($confirmacion==1)? "checked":"";
                            ?> 
                            <!--Inicio-->
                            <div class="form-group row">
                              <div class="col-sm-3">
                                <div class="form-check">
                                  <label class="checkbox-inline">
                                     <input class="form-check-input conservacion" type="checkbox" name="practica_conservacion[]" id="practica_conservacion<?php echo $pc->id; ?>" value="<?php echo $pc->id; ?>" <?php echo $checked; ?> ><?php echo $pc->nombre; ?>
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <label for="">Área</label>
                                <input <?php echo $disabled; ?> type="text" name="area_practica_conservacion[<?php echo $pc->id; ?>]" id="area_practica_conservacion<?php echo $pc->id; ?>" class="form-control" placeholder="Área" value="<?php echo $area; ?>">
                              </div> 
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="" class="">Descripción</label>
                                  <textarea <?php echo $disabled; ?> rows="1" name="descripcion_practica_conservacion[<?php echo $pc->id; ?>]" id="descripcion_practica_conservacion<?php echo $pc->id; ?>" class="form-control" placeholder="Descripción"><?php echo $descripcion; ?></textarea>
                                </div>
                              </div>  
                            </div>
                            <!--Cierre-->
                          <?php endforeach; ?>
                        <?php endif; ?>
                        <!--Inicio OTRO-->
                        <?php 
                          $nombre_otro = (!empty($otroConservacion))? $otroConservacion->nombre:"";
                          $area_otro = (!empty($otroConservacion))? $otroConservacion->area:"";
                          $descripcion_otro = (!empty($otroConservacion))? $otroConservacion->descripcion:"";
                          $disabled_otro = ($nombre_otro!="")?'':'disabled';
                        ?>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="otro" class="">Otro. ¿Cuál?</label>
                              <input type="text" name="otro_conservacion" id="otro_conservacion" class="form-control" placeholder="¿Cuál otro?" value="<?php echo $nombre_otro; ?>">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="a_otro" class="">Área</label>
                              <input <?php echo $disabled_otro; ?> type="text" name="a_otro_conservacion" id="a_otro_conservacion" class="form-control" placeholder="Área" value="<?php echo $area_otro; ?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="d_otro" class="">Descripción</label>
                              <input <?php echo $disabled_otro; ?> type="text" name="d_otro_conservacion" id="d_otro_conservacion" class="form-control" placeholder="Descripción" value="<?php echo $descripcion_otro; ?>">
                            </div>
                          </div>
                          <!-- <div class="col-sm-1 btn-centrar">
                            <button class="btn btn-success btn-sm btn-circle pull-left" id="" name=""><span class="fa fa-plus"></span></button>
                          </div>   -->  
                        </div>
                        <!--Cierre-->
                         <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">2. Área de los ecosistemas</small>
                        <small class="text-success">Si la respuesta es si, señala la (s) opción (es) e indique el área del ecosistema sobre los cuales su actividad tiene influencia directa.</small>
                      </blockquote>


                      <div class="box-body">
                        <?php if(!empty($area_ecosistema)): ?>
                          <?php foreach($area_ecosistema as $ac): ?>
                            <?php 
                               $key = (!empty($empresaEcosistema))? array_search($ac->id, array_column($empresaEcosistema, 'opciones_id')):false;
                              $area = ((!empty($empresaEcosistema)) && $empresaEcosistema[$key]["area"]!= null)? $empresaEcosistema[$key]["area"]:"";
                              $confirmacion = ((!empty($empresaEcosistema)) && $empresaEcosistema[$key]["confirmacion"]!= null)? $empresaEcosistema[$key]["confirmacion"]:""; 
                              $disabled = ($confirmacion==1)? "":"disabled";
                              $checked = ($confirmacion==1)? "checked":"";
                            ?>
                            <!--Inicio-->
                            <div class="form-group row">
                              <div class="col-sm-3">
                                <div class="form-check">
                                  <label class="checkbox-inline">
                                     <input class="form-check-input ecosistema" type="checkbox" name="area_ecosistema[]" id="area_ecosistema<?php echo $ac->id; ?>" value="<?php echo $ac->id; ?>" <?php echo $checked; ?> ><?php echo $ac->nombre; ?>
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="">Área</label>
                                <input <?php echo $disabled; ?> type="text" name="area_area_ecosistema[<?php echo $ac->id; ?>]" id="area_area_ecosistema<?php echo $ac->id; ?>" class="form-control" placeholder="Área" value="<?php echo $area; ?>">
                              </div>  
                            </div>
                            <!--Cierre-->
                          <?php endforeach; ?>
                        <?php endif; ?>
                        
                        <!--Inicio OTRO-->
                        <?php 
                          $nombre_otro = (!empty($otroEcosistema))? $otroEcosistema->nombre:"";
                          $area_otro = (!empty($otroEcosistema))? $otroEcosistema->area:"";
                          $disabled_otro = ($nombre_otro!="")?'':'disabled';
                        ?>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="otro" class="">Otro. ¿Cuál?</label>
                              <input <?php echo $disabled_otro; ?> type="text" name="otro" id="otro_ecosistema" class="form-control" placeholder="¿Cuál otro?" value="<?php echo $nombre_otro; ?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="d_otro" class="">Área</label>
                              <input <?php echo $disabled_otro; ?> type="text" name="area_otro_ecosistema" id="area_otro_ecosistema" class="form-control" placeholder="Área" value="<?php echo $area_otro; ?>">
                            </div>
                          </div>
                          <!-- <div class="col-sm-1 btn-centrar">
                            <button class="btn btn-success btn-sm btn-circle pull-left" id="" name=""><span class="fa fa-plus"></span></button>
                          </div>   -->  
                        </div>
                        <!--Cierre-->
                      </div>


                       <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">3. Plan de manejo o Plan de uso</small>
                        <small class="text-success">¿Cuentas con un plan de manejo o plan de uso y aprovechamiento de la especie o tiene un documento en el cual se especifique cada uno de los objetivos, actividades, impactos y sistema de seguimiento de su sistema de producción?</small>
                      </blockquote>
                      <div class="box-body">

                        <?php if(!empty($plan_manejo)): ?>
                          <?php foreach($plan_manejo as $pm): ?>
                            <?php
                             $key = (!empty($empresaPlan))? array_search($pm->id, array_column($empresaPlan, 'opciones_id')):false;
                              $aplica_noaplica_id = ((!empty($empresaPlan)) && $empresaPlan[$key]["aplica_noaplica_id"]!= null)? $empresaPlan[$key]["aplica_noaplica_id"]:"";
                              $cumple_nocumple_id = ((!empty($empresaPlan)) && $empresaPlan[$key]["cumple_nocumple_id"]!= null)? $empresaPlan[$key]["cumple_nocumple_id"]:"";
                              $vigencia = ((!empty($empresaPlan)) && $empresaPlan[$key]["vigencia"]!= null)? $empresaPlan[$key]["vigencia"]:"";
                              $observacion = ((!empty($empresaPlan)) && $empresaPlan[$key]["observacion"]!= null)? $empresaPlan[$key]["observacion"]:"";
                              $confirmacion = ((!empty($empresaPlan)) && $empresaPlan[$key]["confirmacion"]!= null)? $empresaPlan[$key]["confirmacion"]:""; 
                              $disabled = ($confirmacion==1)? "":"disabled";
                              $checked = ($confirmacion==1)? "checked":"";

                            ?>
                            <!--Inicio-->
                            <div class="form-group row">
                              <div class="col-sm-3">
                                <div class="form-check">
                                  <label class="checkbox-inline">
                                     <input class="form-check-input plan_manejo" type="checkbox" name="plan_manejo[]" id="plan_manejo<?php echo $pm->id; ?>" value="<?php echo $pm->id; ?>" <?php echo $checked; ?>><?php echo $pm->nombre; ?>
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">
                                  <label for="plan_manejo_aplica[<?php echo $pm->id; ?>]">Aplica</label>
                                  <select <?php echo $disabled; ?> class="form-control" name="plan_manejo_aplica[<?php echo $pm->id; ?>]" id="plan_manejo_aplica<?php echo $pm->id; ?>">
                                     <?php if(!empty($aplica)):?>
                                      <?php foreach($aplica as $a):?>
                                        <option value="<?php echo $a->id;?>" <?php echo ($a->id==$aplica_noaplica_id)?'selected':''; ?> ><?php echo $a->nombre;?></option>
                                      <?php endforeach;?>
                                   <?php endif;?>
                                  </select>
                                </div>  
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">
                                  <label for="">Cumple</label>
                                  <select <?php echo $disabled; ?> class="form-control" name="plan_manejo_cumple[<?php echo $pm->id; ?>]" id="plan_manejo_cumple<?php echo $pm->id; ?>">
                                     <?php if(!empty($cumple)):?>
                                      <?php foreach($cumple as $c):?>
                                        <option value="<?php echo $c->id;?>" <?php echo ($c->id==$cumple_nocumple_id)?'selected':''; ?> ><?php echo $c->nombre;?></option>
                                      <?php endforeach;?>
                                   <?php endif;?>
                                  </select>
                                </div>  
                              </div>
                              <div class="col-sm-2">
                                <label for="">Vigencia</label>
                                <input <?php echo $disabled; ?> type="date" name="plan_manejo_vigencia[<?php echo $pm->id; ?>]" id="plan_manejo_vigencia<?php echo $pm->id; ?>" class="form-control" placeholder="Vigencia" value="<?php echo $vigencia; ?>">
                              </div> 
                              <div class="col-sm-3">
                                <div class="form-group">
                                  <label for="obs_pm" class="">Observación</label>
                                  <textarea <?php echo $disabled; ?> rows="2" name="plan_manejo_observacion[<?php echo $pm->id; ?>]" id="plan_manejo_observacion<?php echo $pm->id; ?>" class="form-control" placeholder="Observación"><?php echo $observacion; ?></textarea>
                                </div>
                              </div>  
                            </div>
                            <!--Cierre-->
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>