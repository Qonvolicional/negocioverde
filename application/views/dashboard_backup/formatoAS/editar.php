
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Formato de Información AS
        <small class="text-success"><?php echo " - $empresa->razon_social"; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a class="pull-right" href="<?php echo base_url(); ?>negocioVerde">Negocios Verdes</a></li>
        <li class="active">Formato de Información AS</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box box-success">
            <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo (!empty($empresa))? $empresa->id:''; ?>">
            <!-- .box-header -->
            <!-- <div class="box-header">

              <div class="form-group row">
                <label for="lista-emprendimiento" class="col-sm-2 text-right">Emprendimiento:</label>
                <div class="col-sm-8">
                  <input disabled type="text" name="razon_social" id="razon_social" class="form-control" value="<?php echo (!empty($empresa))? $empresa->razon_social:''; ?>">
                  
                  
                </div>

              </div>

            </div> -->
            <!-- /.box-header -->
            <!-- Apertura ./box-body -->
            <div class="box-body">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <!-- nav-tabs -->
                <ul class="nav nav-tabs">
                  <!--li><a href="#tab_0" data-toggle="tab"> Información Complementaria (Principal)</a></li-->
                  <li ><a href="#tab_1" data-toggle="tab">1.1 Tenencia de la tierra</a></li>

                  <li><a href="#tab_2" data-toggle="tab">1.2 Leg. Ambiental Colombia</a></li>
                  <li><a href="#tab_3" data-toggle="tab">2. Certificaciones</a></li>
                  <li  class="active"><a href="#tab_4" data-toggle="tab">3. Sostenibilidad Ambiental</a></li>
                  <li><a href="#tab_0" data-toggle="tab">4. Sostenibilidad Social</a></li>
                  <li><a href="#tab_6" data-toggle="tab">5. Sostenibilidad Economica</a></li>
                  <li ><a href="#tab_7" data-toggle="tab">5. Turismo y Cadena Valor</a></li>
                  
                </ul>
                <!-- /.nav-tabs -->
                <!-- tab-content --> 
                <div class="tab-content">

                  <!-- Tab pagne Condicones Sector Turismo -->
                  <div class="tab-pane" id="tab_7">
                          <form role="form" id="condiciones-sector-turismo">
                            <div class="box-header with-border bg-success">
                              <h3 class="box-title center text-success">4. Condiciones Sector Turimso</h3>
                            </div>
                            <div class="box-body">
                                 <blockquote class="bg-warning">
                                  <small class="text-success"><b>El negocio es de Turismo de Naturaleza</b></small>
                                 </blockquote>
                           
                                  <div class="row border-red">
                                    <div class="col col-md-3">
                                       <div class="form-group">
                                        <label for="vinculado_masculino">Agencia de viajes y turismo, agencia mayoristas y operadores de turismo</label>
                                      </div>
                                    </div>
                                  <div class="form-group col col-md-3">
                                    <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                      <option value="">Selecciona una opción</option>
                                       <?php if(!empty($aplica)):?>
                                          <?php foreach($aplica as $a):?>
                                            <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                          <?php endforeach;?>
                                       <?php endif;?> 
                                     </select>
                                  </div>

                                  <div class="col col-md-3">
                                     <div class="form-group">
                                      <label for="vinculado_masculino">Establecimiento de alojamiento y hospedaje</label>
                                    </div>
                                  </div>
                                  <div class="form-group col col-md-3">
                                    <select class="form-control" data-main="sector-registro" data-cod="sector-registro-establecimiento" name="sector-registro-establecimiento" id="sector-registro-establecimiento">
                                      <option value="">Selecciona una opción</option>
                                       <?php if(!empty($aplica)):?>
                                          <?php foreach($aplica as $a):?>
                                            <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                          <?php endforeach;?>
                                       <?php endif;?> 
                                     </select>
                                  </div>

                                </div>

                              <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">Operadores profesionales de congresos, ferias y convenciones</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">Oficinas de representaciones turísticas</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-establecimiento" name="sector-registro-establecimiento" id="sector-registro-establecimiento">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                              </div>

                              <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">Guías de turismo</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">Establecimiento que presenten servicios de turismo de interés social</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-establecimiento" name="sector-registro-establecimiento" id="sector-registro-establecimiento">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                              </div>

                              <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">Si preseta servicio ecoturismo, etnoturimso, agroturismo y acuatirimos</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                

                              </div>

                            <div class="box-header with-border bg-success">
                              <h3 class="box-title center text-success">4. Cadena valor</h3>
                            </div>
                            <div class="box-body">
                              <blockquote class="bg-warning">
                                  <small class="text-success"><b> En caso de no producir la materia prima directamente (cultivo, extracción de productos de ecosistemas naturales, aprovechamiento de especies nativas, plantación, entre otros) o si venden un producto a nombre de una organización (Asociación, Cooperativa, entre otros), responda las siguientes preguntas:</b></small>
                                 </blockquote>

                                <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">1. ¿Cuenta con un sistema de identificación y selección de sus proveedores?</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">¿Tiene en cuenta criterios de responsabilidad social y ambiental para la selección de sus proveedores?</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>
                            </div>

                              <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">1¿El negocio verifica el origen de la materia prima ? </label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">¿Cuenta con un listado actualizado con la documentación legal y otros requerimientos que debe cumplir sus proveedores de acuerdo a la naturaleza de su producto o servicio?</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>
                            </div>

                             <div class="row border-red">
                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">¿Se promueve el encadenamiento en los procesos de la empresa?</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>

                                <div class="col col-md-3">
                                   <div class="form-group">
                                    <label for="vinculado_masculino">¿En caso de aplicar, se evita la compra de insumos provenientes de organismos genéticamente modificados o transgénicos?</label>
                                  </div>
                                </div>
                                <div class="form-group col col-md-3">
                                  <select class="form-control" data-main="sector-registro" data-cod="sector-registro-agencia" name="ector-registro-agencia" id="sector-registro-agencia">
                                    <option value="">Selecciona una opción</option>
                                     <?php if(!empty($aplica)):?>
                                        <?php foreach($aplica as $a):?>
                                          <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
                                        <?php endforeach;?>
                                     <?php endif;?> 
                                   </select>
                                </div>
                            </div>

                            <div class="row">
                              <div class="form-group col col-md-12">
                                  <label for="vinculado_masculino">Dado el caso, describa otras actividades adicionales a las descritas anteriormente que estén enfocadas en asegurar la cadena de valor en el negocio:</label>
                                  <input type="text" name="" class="form-control">
                                </div>
                            </div>
                        </div>

  
                      </div>
                             <div class="box-footer">
                                <a id="btn-condiciones-sector-turimso" data-form="condiciones-sector-turismo" class="btn btn-primary pull-right">Guardar y Finalizar</a>
                              </div>
                          </form>
                      </div>
                  <!-- tab pane end condiciones Sector turismo -->


                 <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_0">                
                    <form role="form" id="informacionEmpresa">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">IV. INFORMACIÓN DE SOSTENIBILIDAD SOCIAL</h3>
                      </div>
                      <div class="box-body">
                          <!-- Comienzo de row-->
                          <blockquote class="bg-warning">
                            <small class="text-success"><b>Características de los socios y empleados</b></small>
                          </blockquote>
                          <div class="row border-red">
                            <div class="col col-md-5">
                                <label for="" class="border">1. Número de socios</label>
                                <div class="row">
                                  <div class="form-group col col-md-4">
                                    <label for="socio_masculino">Másculino</label>
                                    <input type="number" name="socio_masculino" class="form-control empleado_sexo" id="socio_masculino" value="0" data-cod="1" data-sex="1">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="socio_femenino">Femenino</label>
                                    <input type="number" name="socio_femenino" class="form-control empleado_sexo" id="socio_femenino" value="0" data-cod="1" data-sex="2">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="socio_total">Total</label>
                                    <input type="number" name="socio_total" class="form-control no" id="socio_total" disabled value="0">
                                  </div>
                                </div>
                            </div>

                            <div class="col col-md-7">
                                <label for="" class="border">2. ¿Cuantos socios están vinculados laboralmente con la empresa?</label>
                                <div class="row">
                                  <div class="form-group col col-md-4">
                                    <label for="vinculado_masculino">Másculino</label>
                                    <input type="number" name="vinculado_masculino" class="form-control empleado_sexo" id="vinculado_masculino" value="0" data-cod="2" data-sex="1">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="vinculado_femenino">Femenino</label>
                                    <input type="number" name="vinculado_femenino" class="form-control empleado_sexo" id="vinculado_femenino" value="0" data-cod="2" data-sex="2">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="vinculado_total">Total</label>
                                    <input type="number" name="vinculado_total" class="form-control no" id="vinculado_total" disabled value="0">
                                  </div>
                                </div>
                            </div>

                            <div class="col col-md-5">
                                <label for="" class="border">3. Número de empleados (<small>Incluye los socio vinclados laboralmente</small>)</label>
                                <div class="row">
                                  <div class="form-group col col-md-4">
                                    <label for="empleado_masculino">Másculino</label>
                                    <input type="number" name="empleado_masculino" class="form-control empleado_sexo" id="empleado_masculino" value="0" data-cod="3" data-sex="1">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="empleado_femenino">Femenino</label>
                                    <input type="number" name="empleado_femenino" class="form-control empleado_sexo" id="empleado_femenino" value="0" data-cod="3" data-sex="2">
                                  </div>
                                  <div class="form-group col col-md-4">
                                    <label for="empleado_total">Total</label>
                                    <input type="number" name="empleado_total" class="form-control no" id="empleado_total" disabled value="0">
                                  </div>
                                </div>
                            </div>
                          </div>
                        <!-- Fin de row-->
                        <div class="row">
                          <blockquote class="bg-warning">
                            <small class="text-success"><b>Para el número de empleados por genero diligencia los siguientes espacios:</b></small>
                          </blockquote>

                        </div>
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col col-md-6">
                              <label for="" class="border">4. Tipo de Contratación laboral para el género Femenino (Indicar Nº de empleos)</label>
                              <div class="row">
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_4">No remunderados / Familiares </label>
                                  <input type="number" name="vinculacion_fem_4" class="form-control vinculacion-fem" id="vinculacion_fem_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_1">Permanente(Término Indefinido)</label>
                                  <input type="number" name="vinculacion_fem_1" class="form-control vinculacion-fem" id="vinculacion_fem_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_2">Contratado Directamente</label>
                                  <input type="number" name="vinculacion_fem_2" class="form-control vinculacion-fem" id="vinculacion_fem_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_5">Suminstrado por agencias</label>
                                  <input type="number" name="vinculacion_fem_5" class="form-control vinculacion-fem" id="vinculacion_fem_5" value="0" data-cod="5">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_6">Aprendiz o estudiante</label>
                                  <input type="number" name="vinculacion_fem_6" class="form-control vinculacion_fem_6" id="vinculacion_fem_6" value="0" data-cod="6">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_fem_3">Temporal (jornales)</label>
                                  <input type="number" name="vinculacion_fem_3" class="form-control vinculacion-fem" id="vinculacion_fem_3" value="0" data-cod="3">
                                </div>
                              </div>
                          </div>
                           <div class="col col-md-6">
                              <label for="" class="border">4. Tipo de Contratación laboral para el género Masculino (Indicar Nº de empleos)</label>
                              <div class="row">
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_4">No remunderados / Familiares </label>
                                  <input type="number" name="vinculacion_mas_4" class="form-control vinculacion-mas" id="vinculacion_mas_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_1">Permanente(Término Indefinido)</label>
                                  <input type="number" name="vinculacion_mas_1" class="form-control vinculacion-mas" id="vinculacion_mas_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_2">Contratado Directamente</label>
                                  <input type="number" name="vinculacion_mas_2" class="form-control vinculacion-mas" id="vinculacion_mas_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_5">Suminstrado por agencias</label>
                                  <input type="number" name="vinculacion_mas_5" class="form-control vinculacion-mas" id="vinculacion_mas_5" value="0" data-cod="5">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_6">Aprendiz o estudiante</label>
                                  <input type="number" name="vinculacion_mas_6" class="form-control vinculacion_mas_6" id="vinculacion_mas_6" value="0" data-cod="6">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="vinculacion_mas_3">Temporal (jornales)</label>
                                  <input type="number" name="vinculacion_mas_3" class="form-control vinculacion-mas" id="vinculacion_mas_3" value="0" data-cod="3">
                                </div>
                              </div>
                          </div>
                        </div>


                        <!-- Fin de row-->
                        <!-- empleados -->
                        <div class="row">
                         
                            <blockquote class="bg-warning">
                              <small class="text-success"><b>Para el número de empleados diligencia los siguientes espacios:</b></small>
                            </blockquote>
                        
                        </div>

                        <div class="row border-red">
                          <div class="col col-md-6">
                              <label for="" class="border">6. Edad <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_empleados_1">Entre 18-30 años</label>
                                  <input type="number" name="edad_rango_empleados_1" class="form-control rango_edad" id="edad_rango_empleados_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_empleados_2">Entre 30-50 años</label>
                                  <input type="number" name="edad_rango_empleados_2" class="form-control rango_edad" id="edad_rango_empleados_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_empleados_3">Mayores de 50 años</label>
                                  <input type="number" name="edad_rango_empleados_3" class="form-control rango_edad" id="edad_rango_empleados_3"  value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_empleados_total">Total</label>
                                  <input type="number" name="edad_rango_empleados_total" class="form-control" id="edad_rango_empleados_total"  value="0">
                                </div>
                              </div>
                          </div>
                        </div>
  
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                          <div class="col col-md-12">
                              <label for="" class="border">5. Nivel Educativo <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                  <label for="educacion_empleados_1">Primaria</label>
                                  <input type="number" name="educacion_empleados_1" class="form-control educacion-empleados" id="educacion_empleados_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion_empleados_2">Secundaria</label>
                                  <input type="number" name="educacion_empleados_2" class="form-control educacion-empleados" id="educacion_empleados_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion_empleados_3">Técnico</label>
                                  <input type="number" name="educacion_empleados_3" class="form-control educacion" id="educacion_empleados_3" value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion_empleados_4">Profesional</label>
                                  <input type="number" name="educacion_empleados_4" class="form-control educacion-empleados" id="educacion_empleados_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion_empleados_5">Otro (Ninguna)</label>
                                  <input type="number" name="educacion_empleados_5" class="form-control educacion" id="educacion_empleados_5" value="0" data-cod="5">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="nivel_educativo_empleados_total">Total</label>
                                  <input type="number" name="nivel_educativo_empleados_total" class="form-control no" id="nivel_educativo_empleados_total" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>

                        <!-- Fin de row-->

                        <!-- Comienzo fila de Tipo de población -->

                         <div class="row border-red">
                           <div class="col col-md-12">
                              <label for="" class="border">6. Tipo de población <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_empleados_1">Indigenas</label>
                                  <input type="number" name="tipo_poblacion_empleados_1" class="form-control poblacion-empleados" id="tipo_poblacion_empleados_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_empleados_2">Comunidades negras</label>
                                  <input type="number" name="tipo_poblacion_empleados_2" class="form-control poblacion-empleados" id="tipo_poblacion_empleados_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_empleados_3">Campesionos</label>
                                  <input type="number" name="tipo_poblacion_empleados_3" class="form-control poblacion-empleados" id="tipo_poblacion_empleados_3" value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_empleados_4">Rom</label>
                                  <input type="number" name="tipo_poblacion_empleados_4" class="form-control poblacion-empleados" id="tipo_poblacion_empleados_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="tipo_poblacion_empleados_total">Total</label>
                                  <input type="number" name="tipo_poblacion_empleados_total" class="form-control no" id="tipo_poblacion_empleados_total" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>
  
                        <div class="row border-red">
                            <div class="col col-md-12">
                              <label for="" class="border">5 .Condiciones especiales de los empleados</label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                  <label for="condion_especial_empleados_1">Adultos Mayores</label>
                                  <input type="number" name="condicion_especioa_empleados_1" class="form-control condicion-especial-empleados" id="condicion_especioa_empleados_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condicion_especioa_empleados_2">Madres de Cabeza de Familia</label>
                                  <input type="number" name="condicion_especioa_empleados_2" class="form-control condicion-especial-empleados" id="condicion_especioa_empleados_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condicion_especioa_empleados_3">Reincorporados</label>
                                  <input type="number" name="condicion_especioa_empleados_3" class="form-control condicion-especial-empleados" id="condicion_especioa_empleados_3" value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="educacion4">Víctima</label>
                                  <input type="number" name="condicion_especioa_empleados_4" class="form-control condicion-especial-empleados" id="condicion_especioa_empleados_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion4">Discapacitados</label>
                                  <input type="number" name="condicion_especioa_empleados_6" class="form-control condicion-especial-empleados" id="condicion_especioa_empleados_6" value="0" data-cod="6">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condicion_especioa_empleados_5">Otro (Ninguna)</label>
                                  <input type="number" name="condicion_especioa_empleados_5" class="form-control condicion-especial-empleados" id="educacion5" value="0" data-cod="5">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="condicion_especioa_empleados_total">Total</label>
                                  <input type="number" name="condicion_especioa_empleados_total" class="form-control no" id="condicion_especioa_empleados_total" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>


                        <!-- Servicios Ofrecidos a la comunidad por parte de los socios -->

                        <div class="row border-red">
                            <div class="col col-md-12">
                              <label for="" class="border">5 .Servicios ofrecidos a la comunidad social por empleados</label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_224">Comunidad Local</label>
                                    <select name="servicios_ofrecidos_empleados_224" id="servicios_ofrecidos_empleados_244" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_57">Capacitación</label>
                                    <select name="servicios_ofrecidos_empleados_57" id="servicios_ofrecidos_empleados_57" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_58">Asistencia Ténica</label>
                                    <select name="servicios_ofrecidos_empleados_58" id="servicios_ofrecidos_empleados_58" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_59">Recreación</label>
                                    <select name="servicios_ofrecidos_empleados_59" id="servicios_ofrecidos_empleados_59" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_225">Proyectos Productivos</label>
                                    <select name="servicios_ofrecidos_empleados_225" id="servicios_ofrecidos_empleados_225" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_empleados_60">Salud</label>
                                    <select name="servicios_ofrecidos_empleados_60" id="servicios_ofrecidos_empleados_60" class="form-control servicios-ofrecidos-empleados" data-asociado="servicios-ofrecidos-empleados">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>


                              </div>
                          </div>
                        </div>
                        <!-- fin informacióm empleados -->


                        <div class="row">
                          <blockquote class="bg-warning">
                              <small class="text-success"><b>Para el número de socios diligencia los siguientes espacios:</b></small>
                            </blockquote>
                        </div>

                        <div class="row border-red">
                          
                          <div class="col col-md-6">
                              <label for="" class="border">6. Edad <small>(Indicar número de empleados)</small></label>
                              <div class="row">
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_socios_1">Entre 18-30 años</label>
                                  <input type="number" name="edad_rango_socios_1" class="form-control rango_edad-socios" id="edad_rango_socios_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_socios_2">Entre 30-50 años</label>
                                  <input type="number" name="edad_rango_socios_2" class="form-control rango_edad-socios" id="edad_rango_socios_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_socios_3">Mayores de 50 años</label>
                                  <input type="number" name="edad_rango_socios_3" class="form-control rango_edad-socios" id="edad_rango_socios_3"  value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-3">
                                  <label for="edad_rango_socios_total">Total</label>
                                  <input type="number" name="edad_rango_socios_total" class="form-control" id="edad_rango_socios_total"  value="0">
                                </div>
                              </div>
                          </div>
                        </div>

                        <div class="row border-red">
                            
                             <div class="col col-md-12">
                                <label for="" class="border">5. Nivel Educativo <small>(Indicar número de socios)</small></label>
                                <div class="row">
                                  <div class="form-group col col-md-2">
                                    <label for="educacion_socios_1">Primaria</label>
                                    <input type="number" name="educacion_socios_1" class="form-control educacion-socios" id="educacion_socios_1" value="0" data-cod="1">
                                  </div>
                                  <div class="form-group col col-md-2">
                                    <label for="educacion_socios_2">Secundaria</label>
                                    <input type="number" name="educacion_socios_2" class="form-control educacion-socios" id="educacion_socios_2" value="0" data-cod="2">
                                  </div>
                                  <div class="form-group col col-md-2">
                                    <label for="educacion_socios_3">Técnico</label>
                                    <input type="number" name="educacion_socios_3" class="form-control educacion-socios" id="educacion3" value="0" data-cod="3">
                                  </div>
                                  <div class="form-group col col-md-2">
                                    <label for="educacion_socios_4">Profesional</label>
                                    <input type="number" name="educacion_socios_4" class="form-control educacion-socios" id="educacion_socios_4" value="0" data-cod="4">
                                  </div>
                                  <div class="form-group col col-md-2">
                                    <label for="educacion_socios_5">Otro (Ninguna)</label>
                                    <input type="number" name="educacion_socios_5" class="form-control educacion-socios" id="educacion_socios_5" value="0" data-cod="5">
                                  </div>
                                  <div class="form-group col col-md-1">
                                    <label for="nivel_educativo_socios_total">Total</label>
                                    <input type="number" name="nivel_educativo_socios_total" class="form-control no" id="nivel_educativo_socios_total" value="0" disabled>
                                  </div>
                                </div>
                          </div>
                        </div>

                        <!-- Fin de row-->

                        <!-- Comienzo fila de Tipo de población -->

                         <div class="row border-red">
                          <div class="col col-md-12">
                              <label for="" class="border">6. Tipo de población <small>(Indicar número de socios)</small></label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_socios_1">Indigenas</label>
                                  <input type="number" name="tipo_poblacion_socios_1" class="form-control publacion-socios" id="tipo_poblacion_socios_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_2">Comunidades negras</label>
                                  <input type="number" name="tipo_poblacion_socios_2" class="form-control publacion-socios" id="tipo_poblacion_socios_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_3">Campesionos</label>
                                  <input type="number" name="tipo_poblacion_socios_3" class="form-control publacion-socios" id="tipo_poblacion_socios_3" value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="tipo_poblacion_socios_4">Rom</label>
                                  <input type="number" name="tipo_poblacion_socios_4" class="form-control publacion-socios" id="tipo_poblacion_socios_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="tipo_poblacion_socios_total">Total</label>
                                  <input type="number" name="tipo_poblacion_socios_total" class="form-control no" id="tipo_poblacion_socios_total" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>

                        <!-- fin de fila -->
                        <!-- Comienzo de row-->
                        <div class="row border-red">
                            <div class="col col-md-12">
                              <label for="" class="border">5 .Condiciones especiales de los socios</label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                  <label for="condion_especial_1">Adultos Mayores</label>
                                  <input type="number" name="condion_especial_socios_1" class="form-control condicion-especial-socios" id="condion_especial_socios_1" value="0" data-cod="1">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condion_especial_2">Madres de Cabeza de Familia</label>
                                  <input type="number" name="condion_especial_socios_2" class="form-control condicion-especial-socios" id="condion_especial_socios_2" value="0" data-cod="2">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condion_especial_3">Reincorporados</label>
                                  <input type="number" name="condion_especial_socios_3" class="form-control condicion-especial-socios" id="condion_especial_socios_3" value="0" data-cod="3">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="educacion4">Víctima</label>
                                  <input type="number" name="condion_especial_socios_4" class="form-control condicion-especial-socios" id="condion_especial__socios_4" value="0" data-cod="4">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="educacion4">Discapacitados</label>
                                  <input type="number" name="condion_especial_socios_6" class="form-control condicion-especial-socios" id="condion_especial__socios_6" value="0" data-cod="6">
                                </div>
                                <div class="form-group col col-md-2">
                                  <label for="condion_especial_5">Otro (Ninguna)</label>
                                  <input type="number" name="condion_especial_socios_5" class="form-control condicion-especial-socios" id="condion_especial_socios_5" value="0" data-cod="5">
                                </div>
                                <div class="form-group col col-md-1">
                                  <label for="condion_especial_socios_total">Total</label>
                                  <input type="number" name="condion_especial_total" class="form-control no" id="condion_especial_total" value="0" disabled>
                                </div>
                              </div>
                          </div>
                        </div>

                        <div class="row border-red">
                             <div class="col col-md-12">
                              <label for="" class="border">5 .Servicios ofrecidos a la comunidad social por socios</label>
                              <div class="row">
                                <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_224">Comunidad Local</label>
                                    <select name="servicios_ofrecidos_socios_224" id="servicios_ofrecidos_socios_224" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_57">Capacitación</label>
                                    <select name="servicios_ofrecidos_socios_57" id="servicios_ofrecidos_socios_57" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_58">Asistencia Ténica</label>
                                    <select name="servicios_ofrecidos_socios_58" id="servicios_ofrecidos_socios_58" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_59">Recreación</label>
                                    <select name="servicios_ofrecidos_socios_59" id="servicios_ofrecidos_socios_59" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_255">Proyectos Productivos</label>
                                    <select name="servicios_ofrecidos_socios_255" id="servicios_ofrecidos_socios_255" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>

                                 <div class="form-group col col-md-2">
                                    <label for="servicios_ofrecidos_socios_60">Salud</label>
                                    <select name="servicios_ofrecidos_socios_60" id="servicios_ofrecidos_socios_60" class="form-control servicios-ofrecidos-socios" data-asociado="servicios-ofrecidos-socios">
                                      <option selected value="">Selecciona una opción</option>
                                      <?php if(!empty($afirmacion)):?>
                                        <?php foreach($afirmacion as $af): ?>
                                          <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                        <?php endforeach;?>  
                                      <?php endif; ?>
                                    </select>
                                </div>


                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <?php 
                            $style = ($cantidadApoyo > 0 )?"":"display: none;";
                            $value = ($cantidadApoyo > 0 )?1:2;
                          ?>
                          <div class="form-group col-sm-10">
                              <label for="sa_apoyado">¿El negocio o el empresario ha recibido algún apoyo por parte de una institución pública o privada?</label>
                              <select id="sa_apoyado" name="sa_apoyado" class="form-control estado" data-visibility="apoyos_entidad">
                                <option selected value="">Selecciona una opción</option>
                                <option value="1" <?php echo ($value==1)?'selected':''; ?> >SI</option>
                                <option value="2" <?php echo ($value==2)?'selected':''; ?>>NO</option>
                              </select>
                          </div>
                        </div>
                          
                           <div id="apoyos_entidad" style="<?php echo $style;?>">
                              <blockquote class="bg-warning">
                                <small class="text-success"><b>Apoyo por parte de entidades públicas y/o privadas</b></small>
                                <small class="text-success">Enliste el tipo de apoyo recibido</small>
                              </blockquote> 

                            
                                 <div class="row form-group">

                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="" class="">Entidad</label>
                                          <input name="apoyo_entidad" id="apoyo_entidad" class="form-control" placeholder="Entidad quien apoyo" value="">
                                        </div>
                                      </div>

                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="">Tipo de entidad</label>
                                          <select name="apoyo_tipo_entidad" id="apoyo_tipo_entidad" class="form-control">
                                            <option value="" selected>Seleccionar opción</option>
                                            <?php if(!empty($orientacion)):?>
                                              <?php foreach($orientacion as $or):?>
                                                <option value="<?php echo $or->id;?>"><?php echo $or->nombre;?></option>
                                              <?php endforeach;?>
                                           <?php endif;?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-md-3">

                                        <div class="form-group">  
                                         <label>Tipo de apoyo</label>
                                          <select name="apoyo_tipo_entidad" id="apoyo_tipo_entidad" class="form-control">
                                            <option value="" selected>Seleccionar opción</option>
                                            <?php if(!empty($tipo_apoyo)):?>
                                              <?php foreach($tipo_apoyo as $or):?>
                                                <option value="<?php echo $or->id;?>"><?php echo $or->nombre;?></option>
                                              <?php endforeach;?>
                                           <?php endif;?>
                                          </select>
                                        </div>  
                                      </div>

                                       <div class="col-md-2">
                                        <div class="form-group">
                                          <label for="">Año</label>
                                          <input type="text" name="apoyo_anio" id="apoyo_anio" class="form-control" value="" />
                                        </div>
                                      </div>

                                       <div class="col-md-5">
                                          <div class="form-group">
                                            <label for="" class="">Apoyo Recibido <small>(Separar por comas=</small></label>
                                            <input name="apoyo_entidad_recibido" id="apoyo_entidad_recibido" class="form-control" placeholder="Apoyo reciibido" value="" />
                                          </div>
                                      </div>

                                     

                                       <div class="col-sm-12">
                                         <a href="#" class="btn btn-primary pull-right apoyo-entidad-boton add" id=""><span class="fa fa-plus"></span> Nuevo</a>
                                      </div>

                                 </div>
                              
                          </div>
                   </div>

                        <div class="box-footer">
                          <a id="btn-informacionEmpresa" data-form="informacionEmpresa" class="btn btn-primary pull-right">Guardar y Continuar</a>
                        </div>
                      
                    </form>
                  </div>

                  <div class="tab-pane" id="tab_1">
                    <form role="form" id="almacenarTenenciaTierra">
                      <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title text-success">1.1 TENENCIA DE LA TIERRA</h3>
                      </div>
                      <blockquote class="bg-warning">
                        <small class="text-success">Indique y describa el (los) tipo (s) de tenencia de tierra en su área de influencia y/o forma (s) de acceso a los recursos (<b>Marcar opción</b>)
                        </small>
                        <small class="text-success">El área de influencia corresponde al predio del cual es propietario o donde tiene derecho legal, o algún tipo de acuerdo para su uso. Descripción (tiempo, desde y hasta cuándo, pago por uso, condiciones, obligaciones, derechos, permisos, etc.)</small>
                      </blockquote>
                      <div class="box-body tenencia_tierra">

                        <?php if(!empty($tenencia_tierra)): ?>
                          <?php foreach ($tenencia_tierra as $tt): ?>
                            <?php
                              //var_dump($empresaTenencia);
                              $key = (!empty($empresaTenencia))? array_search($tt->id, array_column($empresaTenencia, 'opciones_id')):false;
                              $checked = ( (!empty($empresaTenencia)) && ($empresaTenencia[$key]["confirmacion"]==1))?"checked":"";
                              $descripcion = ((!empty($empresaTenencia)) && $empresaTenencia[$key]["descripcion"]!= null)? $empresaTenencia[$key]["descripcion"]:"";
                              $disabled = ($checked=="checked")? "":"disabled"; 
                            ?> 
                            <!--Inicio-->
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-check">  
                                  <label class="checkbox-inline" for="">
                                    <input class="form-check-input" type="checkbox" name="tenencia_tierra" id="tenencia_tierra" value="<?php echo $tt->id; ?>" <?php echo $checked;?> ><?php echo $tt->nombre; ?>
                                  </label>
                                </div>
                              </div>
              
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label for="" class="">Descripción</label>
                                  <textarea <?php echo $disabled; ?> name="descripcion_tt" id="descripcion_tt<?php echo $tt->id; ?>" class="form-control no" rows="2"><?php echo $descripcion; ?></textarea>
                                </div>
                              </div>  
                            </div>
                            <!--Cierre-->
                          <?php endforeach; ?>
                        <?php endif; ?>
                        <!--Inicio OTRO-->
                        <div class="form-group row">
                          <div class="col-sm-5">
                            <div class="form-group">
                              <?php
                                $nombre = (!empty($otroTenencia))? $otroTenencia->nombre:"";
                                $descripcion = (!empty($otroTenencia))? $otroTenencia->descripcion:"";
                              ?> 
                              <label for="otro" class="">Otro. ¿Cuál?</label>
                              <input type="text" name="otro" id="otro" class="form-control otro_tenencia_tierra" placeholder="¿Cuál otro?" value="<?php echo $nombre; ?>">
                            </div>
                          </div>
                          <div class="col-sm-7">
                            <div class="form-group">
                              <label for="d_otro" class="">Descripción</label>
                              <input type="text" name="d_otro" id="d_otro" class="form-control otro_tenencia_tierra" placeholder="Descripción" value="<?php echo $descripcion; ?>">
                            </div>
                          </div>
                          <!-- <div class="col-sm-1 btn-centrar">
                            <a href="" class="btn btn-success btn-sm btn-circle pull-left" id="agregar_otro" name="agregar_otro"><span class="fa fa-plus"></span></a>
                          </div>   -->  
                        </div>
                        <!--Cierre-->
                      </div>
                      <div class="box-footer">
                          <a data-toggle="tab" id="btn-informacion" class="btn btn-primary pull-right" data-form="almacenarTenenciaTierra">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <form role="form" class="" id="almacenarLegislacionAmbiental">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">1.2 LEGISLACIÓN AMBIENTAL COLOMBIANA</h3>
                      </div>
                      <blockquote class="bg-warning">
                        <small class="text-success">¿Cumple su iniciativa con todos los requisitos exigidos por la legislación colombiana para su producto?</small>
                        <small class="text-success">Descripción (especies, productos, cantidades, área, etc). En caso de haber sido negado, especificar mótivo.</small>
                      </blockquote>
                      <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">Registro</small>
                      </blockquote>
                      <div class="box-body content">
                        <?php if(!empty($registro)): ?>
                          <?php foreach($registro as $r): ?>
                            <?php
                              $key = (!empty($empresaRegistro))? array_search($r->id, array_column($empresaRegistro, 'opciones_id')):false;
                              $aplica_noaplica = ((!empty($empresaRegistro)) && $empresaRegistro[$key]["aplica_noaplica_id"]!= null)? $empresaRegistro[$key]["aplica_noaplica_id"]:"";
                              $cumple_nocumple = ((!empty($empresaRegistro)) && $empresaRegistro[$key]["cumple_nocumple_id"]!= null)? $empresaRegistro[$key]["cumple_nocumple_id"]:"";
                              $vigencia = ((!empty($empresaRegistro)) && $empresaRegistro[$key]["vigencia"]!= null)? $empresaRegistro[$key]["vigencia"]:"";
                              $observacion = ((!empty($empresaRegistro)) && $empresaRegistro[$key]["observacion"]!= null)? $empresaRegistro[$key]["observacion"]:"";
                              $disabled = ($aplica_noaplica==1)? "":"disabled";
                            ?> 
                            <label style="text-transform: uppercase;"><?php echo $r->nombre; ?></label>
                            <div class="row">
                             <div class="form-group col-md-3">
                               <label>Aplica Registro</label>
                               <select class="form-control aplica registro" data-main="registro" data-cod="<?php echo $r->id; ?>" name="aplica_registro<?php echo $r->id; ?>" id="aplica_registro<?php echo $r->id; ?>">
                                 <option value="">Selecciona una opción</option>
                                 <?php if(!empty($aplica)):?>
                                    <?php foreach($aplica as $a):?>
                                      <option value="<?php echo $a->id;?>" <?php echo ($a->id==$aplica_noaplica)?"selected":""; ?> ><?php echo $a->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?> 
                               </select>
                             </div>
                             <div class="form-group col-md-3">
                               <label for="cumple_registro">Cumple Registro</label>
                               <select <?php echo $disabled; ?> class="form-control" name="cumple_registro" id="cumple_registro<?php echo $r->id; ?>">
                                 <option selected value="">Selecciona una opción</option>
                                 <?php if(!empty($cumple)):?>
                                    <?php foreach($cumple as $c):?>
                                      <option value="<?php echo $c->id;?>" <?php echo ($c->id==$cumple_nocumple)?"selected":""; ?>><?php echo $c->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?>
                               </select> 
                             </div>
                             <div class="form-group col-md-3">
                               <label for="vigencia_registro">Vigencia</label>
                               <input <?php echo $disabled; ?> type="date" name="vigencia_registro" id="vigencia_registro<?php echo $r->id; ?>" class="form-control" value="<?php echo $vigencia; ?>">
                             </div>
                             <div class="form-group col-md-3">
                               <label for="observacion_registro">Observación</label>
                               <input <?php echo $disabled; ?> type="text" name="observacion_registro" id="observacion_registro<?php echo $r->id; ?>" class="form-control" value="<?php echo $observacion; ?>">
                             </div>
                           </div>
                          <?php endforeach; ?>  
                        <?php endif;?>
                      </div>
                      <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">Permiso</small>
                      </blockquote>
                      <div class="box-body content">
                        <?php if(!empty($permiso)): ?>
                          <?php foreach($permiso as $p): ?>
                            <?php
                              $key = (!empty($empresaPermiso))? array_search($p->id, array_column($empresaPermiso, 'opciones_id')):false;
                              $aplica_noaplica = ((!empty($empresaPermiso)) && $empresaPermiso[$key]["aplica_noaplica_id"]!= null)? $empresaPermiso[$key]["aplica_noaplica_id"]:"";
                              $cumple_nocumple = ((!empty($empresaPermiso)) && $empresaPermiso[$key]["cumple_nocumple_id"]!= null)? $empresaPermiso[$key]["cumple_nocumple_id"]:"";
                              $vigencia = ((!empty($empresaPermiso)) && $empresaPermiso[$key]["vigencia"]!= null)? $empresaPermiso[$key]["vigencia"]:"";
                              $observacion = ((!empty($empresaPermiso)) && $empresaPermiso[$key]["observacion"]!= null)? $empresaPermiso[$key]["observacion"]:"";
                              $disabled = ($aplica_noaplica==1)? "":"disabled";
                            ?> 
                            <label style="text-transform: uppercase;"><?php echo $p->nombre; ?></label>
                            <div class="row">
                             <div class="form-group col-md-3">
                               <label>Aplica Permiso</label>
                               <select class="form-control aplica permiso" data-main="permiso" data-cod="<?php echo $p->id; ?>" name="aplica_permiso<?php echo $p->id; ?>" id="aplica_permiso<?php echo $p->id; ?>">
                                 <option value="">Selecciona una opción</option>
                                 <?php if(!empty($aplica)):?>
                                    <?php foreach($aplica as $a):?>
                                      <option value="<?php echo $a->id;?>" <?php echo ($a->id==$aplica_noaplica)?"selected":""; ?> ><?php echo $a->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?> 
                               </select>
                             </div>
                             <div class="form-group col-md-3">
                               <label for="cumple_permiso">Cumple Permiso</label>
                               <select <?php echo $disabled; ?> class="form-control" name="cumple_permiso" id="cumple_permiso<?php echo $p->id; ?>">
                                 <option selected value="">Selecciona una opción</option>
                                 <?php if(!empty($cumple)):?>
                                    <?php foreach($cumple as $c):?>
                                      <option value="<?php echo $c->id;?>" <?php echo ($c->id==$cumple_nocumple)?"selected":""; ?>><?php echo $c->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?>
                               </select> 
                             </div>
                             <div class="form-group col-md-3">
                               <label for="vigencia_permiso">Vigencia</label>
                               <input <?php echo $disabled; ?> type="date" name="vigencia_permiso" id="vigencia_permiso<?php echo $p->id; ?>" class="form-control" value="<?php echo $vigencia; ?>">
                             </div>
                             <div class="form-group col-md-3">
                               <label for="observacion_permiso">Observación</label>
                               <input <?php echo $disabled; ?> type="text" name="observacion_permiso" id="observacion_permiso<?php echo $p->id; ?>" class="form-control" value="<?php echo $observacion; ?>">
                             </div>
                           </div>
                          <?php endforeach; ?>  
                        <?php endif;?>
                      </div>
                      <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">Licencia</small>
                      </blockquote>
                      <div class="box-body">
                        <?php if(!empty($licencia)): ?>
                          <?php foreach($licencia as $l): ?>
                            <?php
                              $key = (!empty($empresaLicencia))? array_search($l->id, array_column($empresaLicencia, 'opciones_id')):false;
                              $aplica_noaplica = ((!empty($empresaLicencia)) && $empresaLicencia[$key]["aplica_noaplica_id"]!= null)? $empresaLicencia[$key]["aplica_noaplica_id"]:"";
                              $cumple_nocumple = ((!empty($empresaLicencia)) && $empresaLicencia[$key]["cumple_nocumple_id"]!= null)? $empresaLicencia[$key]["cumple_nocumple_id"]:"";
                              $vigencia = ((!empty($empresaLicencia)) && $empresaLicencia[$key]["vigencia"]!= null)? $empresaLicencia[$key]["vigencia"]:"";
                              $observacion = ((!empty($empresaLicencia)) && $empresaLicencia[$key]["observacion"]!= null)? $empresaLicencia[$key]["observacion"]:"";
                              $disabled = ($aplica_noaplica==1)? "":"disabled";
                            ?> 
                            <label style="text-transform: uppercase;"><?php echo $l->nombre; ?></label>
                            <div class="row">
                             <div class="form-group col-md-3">
                               <label>Aplica Licencia</label>
                               <select class="form-control aplica licencia" data-main="licencia" data-cod="<?php echo $l->id; ?>" name="aplica_licencia<?php echo $l->id; ?>" id="aplica_licencia<?php echo $l->id; ?>">
                                 <option value="">Selecciona una opción</option>
                                 <?php if(!empty($aplica)):?>
                                    <?php foreach($aplica as $a):?>
                                      <option value="<?php echo $a->id;?>" <?php echo ($a->id==$aplica_noaplica)?"selected":""; ?> ><?php echo $a->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?> 
                               </select>
                             </div>
                             <div class="form-group col-md-3">
                               <label for="cumple_licencia">Cumple Licencia</label>
                               <select <?php echo $disabled; ?> class="form-control" name="cumple_licencia" id="cumple_licencia<?php echo $l->id; ?>">
                                 <option selected value="">Selecciona una opción</option>
                                 <?php if(!empty($cumple)):?>
                                    <?php foreach($cumple as $c):?>
                                      <option value="<?php echo $c->id;?>" <?php echo ($c->id==$cumple_nocumple)?"selected":""; ?>><?php echo $c->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?>
                               </select> 
                             </div>
                             <div class="form-group col-md-3">
                               <label for="vigencia_licencia">Vigencia</label>
                               <input <?php echo $disabled; ?> type="date" name="vigencia_licencia" id="vigencia_licencia<?php echo $l->id; ?>" class="form-control" value="<?php echo $vigencia; ?>">
                             </div>
                             <div class="form-group col-md-3">
                               <label for="observacion_licencia">Observación</label>
                               <input <?php echo $disabled; ?> type="text" name="observacion_licencia" id="observacion_licencia<?php echo $l->id; ?>" class="form-control" value="<?php echo $observacion; ?>">
                             </div>
                           </div>
                          <?php endforeach; ?>  
                        <?php endif;?>  
                      </div>
                      <blockquote style="margin: 0px!important; border-color: green; padding-left: 5px!important;" class="bg-warning">
                        <small class="text-success">OTROS</small>
                      </blockquote>
                      <div class="box-body">
                       <div class="row">
                         <?php
                          $cumple_nocumple = (!empty($otroLegislacion))?$otroLegislacion->cumple_nocumple_id:"";
                          $observacion = (!empty($otroLegislacion))?$otroLegislacion->observacion:"";
                          $nombre = (!empty($otroLegislacion))?$otroLegislacion->nombre:"";
                         ?>
                         <div class="form-group col-md-3">
                           <label for="otro_legislacion_ambiental">Otro. ¿Cúal?</label>
                           <input type="text" name="otro_legislacion_ambiental" id="otro_legislacion_ambiental" class="form-control" value="<?php echo $nombre; ?>">
                         </div>
                         <div class="form-group col-md-3">
                           <label for="cumple_otro_leg_ambiental">Cumple</label>
                           <select class="form-control" name="cumple_otro_leg_ambiental" id="cumple_otro_leg_ambiental">
                             <option value="">Seleccione opción</option>
                             <?php if(!empty($cumple)):?>
                                <?php foreach($cumple as $c):?>
                                  <option value="<?php echo $c->id;?>" <?php echo ($cumple_nocumple==$c->id)?"selected":"";?> ><?php echo $c->nombre;?></option>
                                <?php endforeach;?>
                             <?php endif;?>
                           </select> 
                         </div>
                         <div class="form-group col-md-6">
                           <label for="observacion_otro_leg_ambiental">Observación</label>
                           <input type="text" name="observacion_otro_leg_ambiental" id="observacion_otro_leg_ambiental" class="form-control" value="<?php echo $observacion; ?>">
                         </div>
                         <!-- <div class="form-group col-md-1">
                           <a href="" class="btn btn-success btn-circle btn-lg pull-right"><span class="fa fa-plus"></span></a>
                         </div> -->
                       </div>
                      </div>
                      <div class="box-footer">
                        <a id="btn-legislacion" data-form="almacenarLegislacionAmbiental" class="btn btn-primary pull-right">Guardar y Continuar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <form role="form" id="almacenarCertificacion">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">2. INFORMACIÓN SOBRE CERTIFICACIONES</h3>
                      </div>
                      <div class="box-body">
                        <?php 
                          $style = ($cantidadOtroCert > 0 || $cantidadCertificacion > 0)?"":"display: none;";
                          $value = ($cantidadOtroCert > 0 || $cantidadCertificacion > 0)?1:2;

                        ?>
                        <div class="row">
                          <div class="form-group col-sm-10">
                              <label for="comunidades_locales">¿La iniciativa ha accedido a Certificaciones?</label>
                              <select id="comunidades_locales" name="comunidades_locales" class="form-control estado" data-visibility="certificacion">
                                <option value="1"  <?php echo ($value==1)?'selected':''; ?> >SI</option>
                                <option value="2" <?php echo ($value==2)?'selected':''; ?> >NO</option>
                              </select>
                          </div>
                        </div>
                        
                        <div id="certificacion" style="<?php echo $style; ?>">
                          <blockquote class="bg-warning">
                            <small class="text-success"><b>Certificación</b></small>
                            <small class="text-success">(Seleccione las opciones con la cual cumpla)</small>
                          </blockquote>
                          <?php if(!empty($certificacion)): ?>
                          <?php foreach ($certificacion as $ce): ?>
                            <?php 
                               $key = (!empty($empresaCertificacion))? array_search($ce->id, array_column($empresaCertificacion, 'opciones_id')):false;
                              $etapa_id = ((!empty($empresaCertificacion)) && $empresaCertificacion[$key]["etapa_id"]!= null)? $empresaCertificacion[$key]["etapa_id"]:"";
                              $vigencia = ((!empty($empresaCertificacion)) && $empresaCertificacion[$key]["vigencia"]!= null)? $empresaCertificacion[$key]["vigencia"]:"";
                              $observacion = ((!empty($empresaCertificacion)) && $empresaCertificacion[$key]["observacion"]!= null)? $empresaCertificacion[$key]["observacion"]:"";
                              $confirmacion = ((!empty($empresaCertificacion)) && $empresaCertificacion[$key]["confirmacion"]!= null)? $empresaCertificacion[$key]["confirmacion"]:""; 
                              $disabled = ($confirmacion==1)? "":"disabled";
                              $checked = ($confirmacion==1)? "checked":"";
                            ?> 
                            <!--Inicio-->
                            <div class="form-group row">
                              <div class="col-md-3">
                                <div class="form-check">  
                                  <label class="checkbox-inline" for=""><input class="form-check-input certificacion" type="checkbox" data-main="certificacion" name="certificacion[]" id="certificacion<?php echo $ce->id; ?>" value="<?php echo $ce->id; ?>" <?php echo $checked; ?>><?php echo $ce->nombre; ?></label>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Etapa</label>
                                  <select <?php echo $disabled; ?> class="form-control" name="etapa_certificacion[<?php echo $ce->id; ?>]" id="etapa_certificacion<?php echo $ce->id; ?>">
                                    <option selected value="">Selecciona una opción</option>
                                    <?php if(!empty($etapa)):?>
                                      <?php foreach($etapa as $e):?>
                                        <option value="<?php echo $e->id;?>" <?php echo ($e->id==$etapa_id)?'selected':'';?>><?php echo $e->nombre;?></option>
                                      <?php endforeach;?>
                                   <?php endif;?>
                                  </select>
                                </div>
                              </div>  
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="" class="">Vigencia</label>
                                  <input type="date" <?php echo $disabled; ?> name="vigencia_certificacion[<?php echo $ce->id; ?>]" id="vigencia_certificacion<?php echo $ce->id; ?>" class="form-control" rows="2" value="<?php echo $vigencia; ?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="" class="">Observación</label>
                                  <textarea <?php echo $disabled; ?> name="observacion_certificacion[<?php echo $ce->id; ?>]" id="observacion_certificacion<?php echo $ce->id; ?>" class="form-control"><?php echo $observacion; ?></textarea>
                                </div>
                              </div>    
                            </div>
                            <!--Cierre-->
                          <?php endforeach; ?>
                        <?php endif; ?>
                        <!--Inicio OTRO-->
                        <?php 
                          $nombre = (!empty($otroCertificacion))? $otroCertificacion->nombre:"";
                          $etapa_id_otro = (!empty($otroCertificacion))? $otroCertificacion->etapa_id:"";
                          $vigencia_otro = (!empty($otroCertificacion))? $otroCertificacion->vigencia:"";
                          $observacion_otro = (!empty($otroCertificacion))? $otroCertificacion->observacion:"";
                          $disabled = ($nombre!="")?'':'disabled';
                        ?>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="otro" class="">Otro. ¿Cuál?</label>
                              <input type="text" name="otro_certificacion" id="otro_certificacion" class="form-control" placeholder="¿Cuál otro?" value="<?php echo $nombre; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Etapa</label>
                              <select <?php echo $disabled; ?> class="form-control" name="otro_etapa_certificacion" id="otro_etapa_certificacion">
                                <option selected>Selecciona una opción</option>
                                 <?php if(!empty($etapa)):?>
                                      <?php foreach($etapa as $e):?>
                                        <option value="<?php echo $e->id;?>" <?php echo ($e->id==$etapa_id_otro)?'selected':'';?> ><?php echo $e->nombre;?></option>
                                      <?php endforeach;?>
                                   <?php endif;?>
                              </select>
                            </div>
                          </div>  
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="" class="">Vigencia</label>
                              <input type="date" <?php echo $disabled; ?> name="otro_vigencia_certificacion" id="otro_vigencia_certificacion" class="form-control" value="<?php echo $vigencia_otro; ?>">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="" class="">Observación</label>
                              <textarea <?php echo $disabled; ?> name="otro_observacion_certificacion" id="otro_observacion_certificacion" class="form-control" rows="1"><?php echo $observacion_otro; ?></textarea>
                            </div>
                          </div>
                          <!-- <div class="col-md-1 btn-centrar">
                            <button class="btn btn-success btn-sm btn-circle pull-left" id="btn-agregarElemento" name=""><span class="fa fa-plus"></span></button>
                          </div>     -->
                        </div>
                        <!--Cierre-->
                        </div>      
                      </div>
                      <div class="box-footer">
                        <a id="btn-certificacion" data-form="almacenarCertificacion" class="btn btn-primary pull-right">Guardar y Continuar</a>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane Informacion de Sostenibilidad ambiental-->
                  <div class="tab-pane active" id="tab_4">
                    <form role="form" id="almacenarSostenibilidadAmbiental">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">INFORMACIÓN DE SOSTENIBILIDAD AMBIENTAL</h3>
                      </div>

                      <div class="box-body">
                        <div id="fuente-energia">
                          <blockquote class="bg-warning" style="margin-bottom: 15px;">
                            <b class="text-success" style="font-size: 14px;">1. Fuentes de Energia Renovable.</b>
                            <a class="pull-right despliegue" data-despliegue="fuente_energia"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                          </blockquote>
                          <div class="row">
                            <div class="col-sm-3">
                            

                              <div class="form-group">
                                <label>¿ Qué tipo de funte de energía utilzian principal en el negocio?</label>
                                  <select class="form-control" name="tipo_fuente_energia">
                                    <option selected>Selecionar una opción</option>
                                        <?php foreach($fuente_energia as $f):?>
                                          <option value="<?php echo $f->id;?>"?> 
                                            <?php echo $f->descripcion;?>
                                          </option>
                                            <?php endforeach;?>
                                  </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Consumo Promedio año anterior</label>
                                <div class="row">
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="input_fuente_consumo_anio" />
                                </div>
                                <div class="col-sm-6">
                                  <select class="form-control" name="opcion_fuente_consumo_anio">
                                     <option selected>Selecionar</option>
                                          <?php foreach($fuente_energia_consumo as $f):?>
                                            <option value="<?php echo $f->id;?>"?> 
                                              <?php echo $f->descripcion;?>
                                            </option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-3">
                             <div class="form-group">
                                <label>Consumo Promedio mensual</label>
                                <div class="row">
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="input_fuente_consumo_mensual" />
                                </div>
                                <div class="col-sm-6">
                                  <select class="form-control" name="opcion_fuente_consumo_mensual">
                                     <option selected>Selecionar</option>
                                          <?php foreach($fuente_energia_consumo as $f):?>
                                           
                                            <option value="<?php echo $f->id;?>"?> 
                                              <?php echo $f->descripcion;?>
                                            </option>
                                              <?php endforeach;?>
                                    </select>
                                  </div>
                                  </div>
                              </div>
                            </div>
                            <!-- Necesita una formula matemática para llenar este campo [Javascript] -->

                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Emisiones CO2 Eq <small>Realice el cálculo a través de la hoja de emisión CO2 Eq</small></label>
                                <input type="text" class="form-control" name="input_fuente_emisiones" />
                              </div>
                            </div>
                          </div>

                        </div>

                        


                          <div class="row">

                            <div class="col-sm-7">   

                               <div>
                                 <div id="consumo-agua">
                                  <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                    <b class="text-success" style="font-size: 14px;">2. Consumo prmedio de agua mensual.</b>
                                    <a class="pull-right despliegue" data-despliegue="consumo_agua"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                  </blockquote>
                               </div>
      
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Consumo Promedio año anterior</label>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" name="input_agua_consumo_anio" />
                                      </div>
                                      <div class="col-sm-6">
                                        <select class="form-control" name="opcion_agua_consumo_anio">
                                              <option selected>Sele. Unidad</option>
                                                <?php foreach($fuente_energia_consumo as $f):?>
                                                  
                                                  <option value="<?php echo $f->id;?>"?> 
                                                    <?php echo $f->descripcion;?>
                                                  </option>
                                                    <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Consumo Promedio actual</label>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" name="input_agua_consumo_actual" />
                                      </div>
                                      <div class="col-sm-6">
                                        <select class="form-control" name="opcion_agua_consumo_actual">
                                            <option selected>Selec.. Unidad</option>
                                                <?php foreach($fuente_energia_consumo as $f):?>    
                                                  <option value="<?php echo $f->id;?>"?> 
                                                    <?php echo $f->descripcion;?>
                                                  </option>
                                                    <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                              </div>

                            </div>

                             <div class="col-sm-5">   

                               <div>
                                 <div id="consumo-agua">
                                  <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                    <b class="text-success" style="font-size: 14px;">Consumo mensual de residuos</b>
                                    <a class="pull-right despliegue" data-despliegue="consumo_agua"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                  </blockquote>
                               </div>

                               <div class="row">     
          
                                  <div class="col-sm-12">
                                     <div class="form-group">
                                        <label>Residuo</label>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <input type="text" class="form-control" name="input_residuo_consumo" />
                                          </div>
                                          <div class="col-sm-6">
                                            <select class="form-control" name="opcion_residuo_consumo">
                                                <option selected>Selecionar unidad</option>
                                                    <?php foreach($fuente_energia_consumo as $f):?>
                                                      <option value="<?php echo $f->id;?>"?> 
                                                        <?php echo $f->descripcion;?>
                                                      </option>
                                                        <?php endforeach;?>
                                              </select>
                                            </div>
                                          </div>
                                      </div>

                                </div>
                                <div class="col col-sm-12">
                                      <div class="form-group">
                                        <label for="">Descripción</label>
                                        <div class="row">
                                          <div class="col col-sm-12">
                                            <input type="text" name="input_descripcion_residuo_consumo" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>



                        </div>


                         <div class="row">

                            <div class="col-sm-7" >
                                  <div >
                                    <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                      <b class="text-success" style="font-size: 14px;">Residuos reciclados.</b>
                                      <a class="pull-right despliegue" data-despliegue="residuo-reciclado"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                    </blockquote>
                                 </div>
                               <div>
                                <label>¿ Cuántos Kilogramos de residuo recicla mensualemten en promedio ? - Total =<span id="residuo-reciclado-total">0</span></label>
                               </div>
                          <div id="residuo-reciclado">

                            <div class="row residuo-reclado-item" id="r-1">
        
                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>¿ Qué tipoo de residuo recicla ?</label>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <select class="form-control opcion_residuo_recicla_tipo" name="opcion_residuo_recicla_tipo">
                                          <option selected>Selecionar tipo</option>
                                                <?php foreach($tipo_residuo as $f):?>
                                                  
                                                  <option value="<?php echo $f->id;?>"?> 
                                                    <?php echo $f->descripcion;?>
                                                  </option>
                                                    <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>¿ Lo incluye en su proceso productivo ?</label>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <select class="form-control option_residuo_recicla_productivo" name="option_residuo_recicla_productivo">
                                            <option selected>Selecionar una opción</option>
                                                <?php foreach($afirmacion as $f):?>
                                                  <option value="<?php echo $f->id;?>"?> 
                                                    <?php echo $f->nombre;?>
                                                  </option>
                                                    <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>¿ Cuántos Kg en promedio incorpora ?</label>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control input_residuo_recicla_promedio" name="input_residuo_recicla_promedio">
                                        </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  
                                    <div class="col-sm-12">
                                     <div class="form-group">
                                        <label>¿ En que parte del proceso productivo lo reincorpora ?</label>
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <input type="text" class="form-control input_residuo_recicla_parte_reincorpora" name="input_residuo_recicla_parte_reincorpora">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>

                                  
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <a href="#" class="btn btn-primary pull-right residuo-reciclado-boton add" id=""><span class="fa fa-plus"></span> Nuevo</a>
                                  </div>
                                  </div>
                          </div>

                              <div class="col-sm-5">
                                <div id="eliminacion-basura">
                                    <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                      <b class="text-success" style="font-size: 14px;">3.3 Elminación de Basura.</b>
                                      <a class="pull-right despliegue" data-despliegue="residuo-reciclado"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                    </blockquote>
                                 </div>
                                 <div class="form-group">
                                    <label>¿ Cómo se elimina principalmente la basura ?</label>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <select class="form-control" name="opcion_eliminacion_basura">
                                              <option selected>Selecionar opción</option>
                                                <?php foreach($eliminacion_basura as $f):?>
                                                  
                                                  <option value="<?php echo $f->id;?>"?> 
                                                    <?php echo $f->descripcion;?>
                                                  </option>
                                                    <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                            </div>

                          
                          <div class="row">

                            <div class="col-sm-7">   
                                                          
                                  <div id="residuo-peligroso">
                                      <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                        <b class="text-success" style="font-size: 14px;">3.2 Residuo peligrosos.</b>
                                        <a class="pull-right despliegue" data-despliegue="residuo-peligroso"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                      </blockquote>
                                   </div>
                              <div id="residuo-peligroso-items">
                                <div class="row" id="peligroso-item-1"> 
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label>¿ Genera residuos peligrosos ?</label>
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <select class="form-control opcion_residuo_peligroso_genera_residuo" name="opcion_residuo_peligroso_genera_residuo">
                                                  <option selected>Selecionar opción</option>
                                                      <?php foreach($tipo_residuo_peligroso as $f):?>
                                                        <option value="<?php echo $f->id;?>"?> 
                                                          <?php echo $f->descripcion;?>
                                                        </option>
                                                          <?php endforeach;?>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                      </div>

                                    <div class="col-sm-4">
                                     <div class="form-group">
                                        <label>¿ Cantidad de residuos que genera ?</label>
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <input type="text" class="form-control input_residuo_peligroso_cantidad_residuo" name="input_residuo_peligroso_cantidad_residuo">
                                           </div>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label>¿Que disposición hace de estos residuos?</label>
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <select class="form-control opcion_residuo_peligroso_dispocision_residuo" name="opcion_residuo_peligroso_dispocision_residuo">
                                                 <option selected>Selecionar opción</option>
                                                      <?php foreach($tipo_disposicion_residuo as $f):?>
                                                        <option value="<?php echo $f->id;?>"?> 
                                                          <?php echo $f->descripcion;?>
                                                        </option>
                                                          <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                            </div>
      
                               <div class="row">
                                    <div class="col-sm-12">
                                    <a href="#" class="btn btn-primary pull-right residuo-peligroso-boton add" id=""><span class="fa fa-plus"></span> Nuevo</a>
                                  </div>
                                </div>
                             
                          </div>
    
                              <div class="col-sm-5">
                                <div id="area-conservacion-principal">
                                    <blockquote class="bg-warning" style="margin-bottom: 15px;">
                                      <b class="text-success" style="font-size: 14px;">3.3 Área de conservación o de los ecosistemas presentes en el negocios o su área de influencia.</b>
                                      <a class="pull-right despliegue" data-despliegue="residuo-reciclado"><span class="fa fa-minus-square text-success" style="font-size: 14px;"></span></a>
                                    </blockquote>
                                 </div>

                                 
                                   <div class="row">
                                     <div class="col-sm-12">
                                         <label> Área </label>
                                     </div>
                                   </div>
                                   <div id="area-conservacion">
                                    <form action="" name="form-area-conservacion">

                                    <div class="row area-conservacion-item" id="area-1" data-item="1">

                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <select class="form-control opcion_area_conservacion" name="opcion_area_conservacion[]" id="opcion_area_conservacion_1">
                                            <option selected>Selecionar una opción</option>
                                                  <?php foreach($area_ecosistema as $f):?>
                                                    <option value="<?php echo $f->id;?>"?> 
                                                      <?php echo $f->nombre;?>
                                                    </option>
                                                      <?php endforeach;?>
                                            </select>
                                          </div>
                                      </div>

                                      <div class="col-sm-3">
                                        <input type="text" class="form-control input_area_conservacion" name="input_area_conservacion" id="input_area_conservacion">
                                      </div>

                                      <div class="col-sm-3">
                                        <select class="form-control opcion_area_conservacion_tipo" name="opcion_area_conservacion_tipo[]" id="opcion_area_conservacion_tipo_1">
                                          <option selected>Selecionar opción</option>
                                                  <?php foreach($area_conservacion as $f):?>
                                                    <option value="<?php echo $f->id;?>"> 
                                                      <?php echo $f->nombre;?>
                                                    </option>
                                                      <?php endforeach;?>
                                        </select>
                                      </div>

                                        

                                      </div>
                                      </form>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                          <a href="#" class="btn btn-primary pull-right area-conservacion-boton add" id=""><span class="fa fa-plus"></span> Nuevo</a>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                             <div class="box-footer">
                              <a id="btn-sostenibilidadAmbiental" data-form="almacenarSostenibilidadAmbiental" class="btn btn-primary pull-right">Guardar y Continuar</a>
                            </div>
                     </div>
                    </form>
                  </div>
               
                
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_6">

                    <form role="form" id="almacenarSostenibilidadEconomica">
                      <div class="box-header with-border bg-success">
                        <h3 class="box-title center text-success">5. INFORMACIÓN DE SOSTENIBILIDAD ECONOMICA</h3>
                      </div>

                      <div class="box-body">
                        <div class="row">
                           <blockquote class="bg-warning">
                            <small class="text-success">Información Financiera</small>
                          </blockquote> 
                          <div class="form-group  col-md-3">
                            <label>Ventas año <small>(Año xxx, ej: 2018)</small></label>
                            <input type="number" class="form-control" name="finaciera_ventas_anio_encuesta" />
                          </div>
                          <div class="form-group  col-md-3">
                            <label>Ventas año anterior</label>
                            <input type="number" class="form-control" name="finaciera_ventas_anterior" value="0" />
                          </div>
                          <div class="form-group  col-md-3">
                            <label>Indice de crecimiento</label>
                            <input type="number" class="form-control" name="financiera_indice_crecimiento" value="0" />
                          </div>
                          <div class="form-group col-md-3">
                            <label>Estado de las ventas ultimos años </label>
                            <select name="financiera_estado_crecimiento" class="form-control" id="financiero_estado_crecimiento">
                              <option>Seleccionar</option>
                              <?php foreach($estado_crecimiento as $e): ?>
                                <option value="<?php echo $e->id; ?>"><?php echo $e->nombre; ?> </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                           <div class="form-group col col-md-3">
                            <label>Activos (Corrientes)</label>
                            <input type="number" class="form-control" name="financiera_activos_corriente" />
                          </div>
                          <div class="form-group col col-md-3">
                            <label>Activos (No Corrientes)</label>
                            <input type="number" class="form-control" name="financiera_activos_no_corriente" />
                          </div>

                           <div class="form-group col col-md-3">
                            <label>Pasivos (Corrientes)</label>
                            <input type="number" class="form-control" name="financiera_pasivos_corriente" value="0" />
                          </div>
                          <div class="form-group col col-md-3">
                            <label>Pasivos (No Corrientes)</label>
                            <input type="number" class="form-control" name="financiera_pasivos_no_corriente" value="0" />
                          </div>

                          <div class="form-group col col-md-3">
                            <label>Margen Bruto de Utilidad</label>
                            <input type="text" class="form-control" name="financiera_margen_bruto" value="0%" />
                          </div>

                           <div class="form-group col col-md-3">
                            <label>Razon Corriente</label>
                            <input type="text" class="form-control" name="financiera_razon_corriente" value="0%" />
                          </div>

                          <div class="form-group col col-md-3">
                            <label>Rentabilidad operacional </label>
                            <input type="text" class="form-control" name="financiera_razon_corriente" value="0%" />
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Ha accedido a crédito</label>
                              <select name="financiera_credito" id="financiera_credito" class="form-control">
                                <option selected>Seleccionar</option>
                                 <?php if(!empty($afirmacion)):?>
                                    <?php foreach($afirmacion as $a):?>
                                      <option value="<?php echo $a->id; ?>"><?php echo $a->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- Comienzo de row-->
                      <?php if(!empty($bien_servicio)):?>
                        <?php foreach($bien_servicio as $bs): ?>
                          <?php 
                            $lider = ($bs['lider_estado']==1)?'Líder':'';
                            $key = (!empty($empresaEconomia))? array_search($bs['id'], array_column($empresaEconomia, 'bien_servicio_id')):false;
                            $vendida_anual = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["vendida_anual"]!= null)? $empresaEconomia[$key]["vendida_anual"]:0;
                            $unidad_medida_id = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["unidad_medida_id"]!= null)? $empresaEconomia[$key]["unidad_medida_id"]:"";
                            $costo_produccion = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["costo_produccion"]!= null)? $empresaEconomia[$key]["costo_produccion"]:0;
                            $precio_v_unitario = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["precio_v_unitario"]!= null)? $empresaEconomia[$key]["precio_v_unitario"]:0;
                            $ganancia_unidad = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["ganancia_unidad"]!= null)? $empresaEconomia[$key]["ganancia_unidad"]:0;
                            $ventas_anual = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["ventas_anual"]!= null)? $empresaEconomia[$key]["ventas_anual"]:0;
                            $si_no_id = ((!empty($empresaEconomia)) && $empresaEconomia[$key]["si_no_id"]!= null)? $empresaEconomia[$key]["si_no_id"]:"";
                          ?> 
                         <blockquote class="bg-warning">
                            <small class="text-success">Bien o Servicio <?php echo $lider; ?></small>
                          </blockquote> 
                        <div class="row border-left-gray">                  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Bien o Servicio</label>
                              <input disabled type="text" name="bien<?php echo $bs['id']; ?>" id="bien<?php echo $bs['id']; ?>" class="form-control bienes" placeholder="Servicio o Bien" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $bs['nombre']?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Unidad de medida</label>
                              <select name="unidad_medida<?php echo $bs['id']; ?>" id="unidad_medida<?php echo $bs['id']; ?>" class="form-control">
                                 <?php if(!empty($unidad)):?>
                                    <?php foreach($unidad as $u):?>
                                      <option value="<?php echo $u->id;?>" <?php echo ($u->id==$unidad_medida_id)?'selected':'';?>><?php echo $u->nombre;?></option>
                                    <?php endforeach;?>
                                 <?php endif;?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Cantidades vendidas</label>
                              <input type="number" min="0" name="unidad_vendida<?php echo $bs['id']; ?>" id="unidad_vendida<?php echo $bs['id']; ?>" class="form-control bien_servicio" placeholder="Unidades vendidas" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $vendida_anual; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Precio Unitario de Venta</label>
                              <input type="number" min="0" name="precio_unitario_venta<?php echo $bs['id']; ?>" id="precio_unitario_venta<?php echo $bs['id']; ?>" class="form-control bien_servicio" placeholder="Precio Unitario de Venta" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $precio_v_unitario; ?>">
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label>Ventas Anuales</label>
                              <input disabled type="text" name="venta_anual<?php echo $bs['id']; ?>" id="venta_anual<?php echo $bs['id']; ?>" class="form-control bien_servicio_ventas" placeholder="Ventas anuales" value="<?php echo $ventas_anual; ?>">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Costo unitario mano de obra</label>
                              <input type="number" min="0" name="costo_produccion<?php echo $bs['id']; ?>" id="costo_produccion<?php echo $bs['id']; ?>" class="form-control bien_servicio" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $costo_produccion; ?>">
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Costos unitario insumo y otros</label>
                              <input type="number" min="0" name="costo_produccion_unitario_insumo<?php echo $bs['id']; ?>" id="costo_produccion<?php echo $bs['id']; ?>" class="form-control bien_servicio" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $costo_produccion; ?>">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Costos Totales Por unidad de venta</label>
                              <input disabled type="number" name="costo_total_unidad<?php echo $bs['id']; ?>" id="costo_total_unidad<?php echo $bs['id']; ?>" class="form-control" placeholder="Servicio o Bien" value="<?php echo $ganancia_unidad; ?>">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Costos Totales de producción</label>
                              <input disabled type="number" name="costo_total_preoduccion<?php echo $bs['id']; ?>" id="costo_total_preoduccion<?php echo $bs['id']; ?>" class="form-control" placeholder="Servicio o Bien" value="<?php echo $ganancia_unidad; ?>">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Utilidad (Bruta)</label>
                              <input disabled type="number" name="utilidad_bruta<?php echo $bs['id']; ?>" id="utilidad_bruta<?php echo $bs['id']; ?>" class="form-control" placeholder="Servicio o Bien" value="<?php echo $ganancia_unidad; ?>">
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Ganancia por Unidad</label>
                              <input disabled type="number" name="ganancia_unidad<?php echo $bs['id']; ?>" id="ganancia_unidad<?php echo $bs['id']; ?>" class="form-control" placeholder="Servicio o Bien" value="<?php echo $ganancia_unidad; ?>">
                            </div>
                          </div>
                         
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Los ingresos son superiores a los costos</label>
                              <select name="ingresos_vs_costos<?php echo $bs['id']; ?>" id="ingresos_vs_costos<?php echo $bs['id']; ?>" class="form-control">
                                <option>Selecciona una opción</option>
                                <option value="1" <?php echo ($si_no_id==1)?'selected':'';?> >SI</option>
                                <option value="2" <?php echo ($si_no_id==2)?'selected':'';?> >NO</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <?php endforeach; ?>

                      <?php endif; ?>
                         <blockquote class="bg-warning">
                              <small class="text-success">Totales</small>
                            </blockquote>
                            <div class="row">
                            <div class="col col-md-12">
                                <div class="row">
                                  <div class="form-group col col-md-3">
                                    <label for="venta_anuales">Venta Anuales</label>
                                    <input type="number" name="venta_anuales" class="form-control" id="venta_anuales" value="0">
                                  </div>
                                  <div class="form-group col col-md-3">
                                    <label for="costo_unitario_obra">Costos Unitarios mano de obra</label>
                                    <input type="number" name="costo_unitario_obra" class="form-control" id="costo_unitario_obra" value="0">
                                  </div>
                                  <div class="form-group col col-md-3">
                                    <label for="costo_unitario_insumo">Costo Unitarios insumos y otros</label>
                                    <input type="number" name="costo_unitario_insumo" class="form-control" id="costo_unitario_insumo" value="0">
                                  </div>
                                  <div class="form-group col col-md-3">
                                    <label for="costo_unidad_venta">Costos Totales por unidad de ventas</label>
                                    <input type="number" name="costo_unidad_venta" class="form-control" id="costo_unidad_venta" value="0">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col col-md-3">
                                    <label for="costos_total_produccion">Costos totales de producción</label>
                                    <input type="number" name="costos_total_produccion" class="form-control" id="costos_total_produccion" value="0">
                                  </div>
                                  <div class="form-group col col-md-3">
                                    <label for="utilidad_bruta">Utilidad (Bruta)</label>
                                    <input type="number" name="utilidad_bruta" class="form-control" id="utilidad_bruta" value="0">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin de row-->
                        <blockquote class="bg-warning">
                            <small class="text-success">Comercialización </small>
                          </blockquote> 
                        
                            <label>Calidad y Presentación de los bienes y servicios</label>
                            <?php if(!empty($bien_servicio)):?>
                           <?php foreach($bien_servicio as $bs): ?>
                            <div class="row border-left-gray"> 
                          <div class="form-group col col-md-12">
                                <div class="row ">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Bien o Servicio</label>
                                      <input disabled type="text" name="comercialización_bien<?php echo $bs['id']; ?>" id="comercializacion_bien<?php echo $bs['id']; ?>" class="form-control comericializacion-bienes" placeholder="Servicio o Bien" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $bs['nombre']?>" />
                                    </div>
                                  </div>

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Presentación</label>
                                      <input  type="text" name="comercializacion_presentacion<?php echo $bs['id']; ?>" id="comercializacion_bien<?php echo $bs['id']; ?>" class="form-control comercializcion_presentacion" placeholder="Servicio o Bien" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $bs['nombre']?>" />
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Empaque</label>
                                      <input  type="text" name="comercializacion_empaque<?php echo $bs['id']; ?>" id="comercializacion_empaque<?php echo $bs['id']; ?>" class="form-control comercializacion_empaque" placeholder="Servicio o Bien" data-cod="<?php echo $bs['id']; ?>" value="<?php echo $bs['nombre']; ?>" />
                                    </div>
                                  </div>

                                   <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Ficha Técnica</label>
                                      <select class="form-control"  name="comercializacion_ficha<?php echo $bs['id']; ?>" id="comercializacion_ficha<?php echo $bs['id']; ?>">
                                        <option selected> Selecionar </option>
                                        <?php foreach($aplica as $a): ?>
                                            <option value="<?php echo $a->id; ?>">
                                              <?php echo $a->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>

                              </div>

                              <div class="row">
                                <div class="col col-md-12">
                                  <label>Canales de comercializacion</label>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Canal de Comercialización</label>
                                      <select class="form-control"  name="comercializacion_ficha<?php echo $bs['id']; ?>" id="comercializacion_canal<?php echo $bs['id']; ?>">
                                        <option selected> Selecionar </option>
                                        <?php foreach($canal_comercializacion as $c): ?>
                                            <option value="<?php echo $c->id; ?>">
                                              <?php echo $c->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>

                                 <div class="col-md-9">
                                    <div class="form-group">
                                      <label>Observación (Para otro defina cual)</label>
                                      <input type="text" name="comercializacion_otro<?php echo $bs['id']; ?>" class="form-control">
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                <div class="col col-md-12">
                                  <label>Mecanismos de venta y pago</label>
                                </div>
                                </div>

                                 <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Principal Cliente</label>
                                     <input type="text" name="comercializacion_preincipal_cliente<?php echo $bs['id']; ?>" class="form-control">
                                    </div>
                                  </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Ubicación (País, Depatamento o región)</label>
                                      <input type="text" name="comercializacion_ubicacion<?php echo $bs['id']; ?>" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Mecanismo de Venta</label>
                                      <select class="form-control"  name="comercializacion_mecanismo<?php echo $bs['id']; ?>" id="comercializacion_mecanismo<?php echo $bs['id']; ?>">
                                        <option selected> Selecionar </option>
                                        <?php foreach($mecanismo_venta as $c): ?>
                                            <option value="<?php echo $c->id; ?>">
                                              <?php echo $c->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Forma de Pago</label>
                                      <select class="form-control"  name="comercializacion_forma_pago<?php echo $bs['id']; ?>" id="comercializacion_forma_pago<?php echo $bs['id']; ?>">
                                        <option selected> Selecionar </option>
                                        <?php foreach($forma_pago as $c): ?>
                                            <option value="<?php echo $c->id; ?>">
                                              <?php echo $c->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                        </div>
                            <?php 
                                endforeach; 
                                endif;
                            ?>
                    <div class="box-footer">
                        <a id="btn-sostenibilidadEconomica" data-form="almacenarSostenibilidadEconomica" class="btn btn-primary pull-right">Guardar y Finalizar</a>
                      </div>
                    </form>
                      </div>    
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
  <!-- /.content-wrapper