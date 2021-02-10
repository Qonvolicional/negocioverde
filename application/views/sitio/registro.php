<style type="text/css">
.pos-rel{
    position:relative;
}
.pos-rel .nav-item{
    margin:0 1em;
}
.connected-line{
    border-bottom: 1px solid #5d9913;
    position: relative;
    top: -29px;
    z-index: -1;
    border: 2px solid #5d9913;
}

.seminor-login-modal-body .close{
    position: relative;
    top: -45px;
    left: 10px;
    color: #1cd8ad;
}
.seminor-login-modal-body .close{
    opacity:0.75;
}

.seminor-login-modal-body .close:focus, .seminor-login-modal-body .close:hover {
    color: #39e8b0;
 opacity: 1;
 text-decoration: none;
 outline:0;
}

.seminor-login-modal .modal-dialog .modal-content{
    border-radius:0px;
}

/* form animation */
.seminor-login-form .form-group {
  position: relative;
  margin-bottom: 1.5em !important;
}
.seminor-login-form .form-control{
 border: 0px solid #ced4da !important;
 border-bottom:1px solid #adadad !important;
 border-radius:0 !important;
}
.seminor-login-form .form-control:focus, .seminor-login-form .form-control:active{
 outline:none !important;
 outline-width: 0;
 border-color: #adadad !important;
 box-shadow: 0 0 0 0.2rem transparent;
}
*:focus {
 outline: none;
}
.seminor-login-form{
 padding: 2em 0 0;
}

.form-control-placeholder {
position: absolute;
top: 0;
padding: 7px 0 0 13px;
transition: all 200ms;
opacity: 0.5;
border-top: 0px;
border-left: 0;
border-right: 0;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
font-size: 75%;
-webkit-transform: translate3d(0, -100%, 0);
       transform: translate3d(0, -100%, 0);
opacity: 1;
}

.container-checkbox input {
 position: absolute;
 opacity: 0;
 cursor: pointer;
}
.checkmark-box {
 position: absolute;
 top: -5px;
 left: 0;
 height: 25px;
 width: 25px;
 background-color: #adadad;
}
.container-checkbox {
 display: block;
 position: relative;
 padding-left: 40px;
 margin-bottom: 20px;
 cursor: pointer;
 font-size: 14px;
 font-weight: bold;
 -webkit-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
 line-height: 1.1;
}
.container-checkbox input:checked ~ .checkmark-box:after {
 color: #fff;
}
.container-checkbox input:checked ~ .checkmark-box:after {
 display: block;
}
.container-checkbox .checkmark-box:after {
 left: 10px;
 top: 4px;
 width: 7px;
 height: 15px;
 border: solid white;
 border-width: 0 3px 3px 0;
 -webkit-transform: rotate(45deg);
 -ms-transform: rotate(45deg);
 transform: rotate(45deg);
}
.checkmark:after, .checkmark-box:after {
 content: "";
 position: absolute;
 display: none;
}
.container-checkbox input:checked ~ .checkmark-box {
 background-color: #f58220;
 border: 0px solid transparent;
}
.btn-check-log .btn-check-login {
 font-size: 16px;
 padding: 10px 0;
}
button.btn-check-login:hover {
    color: #fff;
    background-color: #f58220;
    border: 2px solid #f58220;
}
.btn-check-login {
 color: #f58220;
 background-color: transparent;
 border: 2px solid #f58220;
 transition: all ease-in-out .3s;
}
.btn-check-login {
 display: inline-block;
 padding: 12px 0;
 margin-bottom: 0;
 line-height: 1.42857143;
 text-align: center;
 white-space: nowrap;
 vertical-align: middle;
 -ms-touch-action: manipulation;
 touch-action: manipulation;
 cursor: pointer;
 -webkit-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
 background-image: none;
 border-radius: 0;
 width: 100%;
}
.forgot-pass-fau a {
    text-decoration: none !important;
    font-size: 14px;
}
.text-primary-fau {
    color: #1959a2;
}

.select-form-control-placeholder{
  font-size: 100%;
    padding: 7px 0 0 13px;
    margin: 0;
}

.border {
    padding: 5px !important;
    background: #c2ddb7 !important;
    color: #004400 !important;
    border-top: 1px solid green !important;
    border-bottom: 1px solid green !important;
    margin-bottom: 10px;
}

.numero{
    border: 1px solid white;
    width: 22px;
    height: 22px;
    font-size: 18px;
    border-radius: 50%;
    float: left;
    margin-top: unset;
    background: white;
    color: #81c034;
    font-weight: bold;
    display:none;
}
</style>

<!-- page header section ending here -->
<section class="page-header padding-tb page-header-bg-1">
    <div class="container">
        <div class="page-header-item d-flex align-items-center justify-content-center">
            <div class="post-content">
                <h3>Registro</h3>
                <div class="breadcamp">
                    <ul class="d-flex flex-wrap justify-content-center align-items-center">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a class="active">Registro</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page header section ending here -->

<!-- <?php print_r($datos_servicios); ?> -->

<!-- service single section start here -->
<section class="service-single padding-tb">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="pos-rel">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills justify-content-center nav-justified" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active btn btn-primary" data-toggle="pill" href="#tab_1" style="border: 0px;"> <span class="numero">1</span>  Información General</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link btn btn-primary" data-toggle="pill" href="#tab_2" style="border: 0px;"><span class="numero">2</span> Descripción Negocio </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link btn btn-primary" data-toggle="pill" href="#tab_3" style="border: 0px;"><span class="numero">3</span> Categoria del Negocio</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link btn btn-primary" data-toggle="pill" href="#tab_4" style="border: 0px;"><span class="numero">4</span> Información Empresa</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link btn btn-primary" data-toggle="pill" href="#tab_5" style="border: 0px;"><span class="numero">5</span> Observaciones Generales</a>
                        </li>
                    </ul>
                    <div class="connected-line"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- primer tab -->
                        <div id="tab_1" class="container tab-pane active">
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                            <form role="form" method="post" id="almacenarInformacionGeneral" class="form-agregar" enctype="multipart/form-data" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                      <div class="box-header with-border" style="padding: 9px; margin: 10px; background-color: #e18e16!important;">
                        <h3 class="box-title" style="color: white;">I. INFORMACIÓN GENERAL</h3>
                      </div>
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col col-md-4">
                              <label for="tipo_persona_id">(*)Tipo de Persona</label>
                              <select id="tipo_persona_id" name="tipo_persona_id" class="form-control" required>
                                <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($tipo_persona)):?>
                                  <?php foreach($tipo_persona as $tp): ?>
                                    <option value="<?php echo $tp->id; ?>"><?php echo $tp->nombre; ?></option>
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
                                    <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                              </select>
                             <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                              <label for="identificacion">(*)Número de Identificación</label>
                              <input type="number" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación" required minlength="7" maxlength="15" unique="empresa">
                              <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-12">
                            <label for="razon_social">(*)Razón Social</label>
                            <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Razón Social" required minlength="5" maxlength="50" unique="empresa">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <!-- <input type="hidden" name="rol_id" id="rol_id" class="persona" value="4">
                        <input type="hidden" name="area_id" id="area_id" class="persona" value="1"> -->
                        <h5><b>Representante Legal</b></h5>  
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="identificacion2">(*)Documento</label>
                            <input type="number" class="form-control persona" id="persona_identificacion" name="persona_identificacion" placeholder="Documento" required minlength="7" maxlength="15" unique="persona">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre1">(*)Primer Nombre</label>
                            <input type="text" class="form-control persona" id="nombre1" name="nombre1" placeholder="Primer Nombre" required minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control persona" id="nombre2" name="nombre2" placeholder="Segundo Nombre" minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="apellido1">(*)Primer Apellido</label>
                            <input type="text" class="form-control persona" id="apellido1" name="apellido1" placeholder="Primer Apellido" required minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control persona" id="apellido2" name="apellido2" placeholder="Segundo Apellido" minlength="3" maxlength="30">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="correo">(*)Correo</label>
                            <input type="email" class="form-control persona" id="correo" name="correo" placeholder="Correo Electrónico" required maxlength="100">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col col-md-4">
                            <label for="fijo">Telefono Fijo</label>
                            <input type="tel" class="form-control persona" id="fijo" name="fijo" placeholder="Telefono Fijo" pattern="[0-9]{3}-[0-9]{4}">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="celular">(*)Celular</label>
                            <input type="tel" class="form-control persona" id="celular" name="celular" placeholder="Celular" required minlength="7" maxlength="15">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control persona" id="direccion" name="direccion" placeholder="Dirección de Correspondencia">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-6">
                            <label for="region">(*)Región</label>
                            <select id="region" name="region" class="form-control no" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($region)):?>
                                  <?php foreach($region as $r): ?>
                                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-6">
                            <label for="autoridad_ambiental_id">(*)Autoridad Ambiental</label>
                            <select id="autoridad_ambiental_id" name="autoridad_ambiental_id" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="departamento">(*)Departamento</label>
                            <select id="departamento" name="departamento" class="form-control no" required>
                              <option selected value="">Selecciona una opción</option>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="municipio_id">(*)Municipio</label>
                            <select id="municipio_id" name="municipio_id" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                            </select>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="vereda">Vereda</label>
                            <input type="text" class="form-control" id="vereda" name="vereda" placeholder="Vereda">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="direccion_predio">Dirección del predio</label>
                            <input type="text" class="form-control" id="direccion_predio" name="direccion_predio" placeholder="Dirección de Predio">
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-md-3 dl-horizontal">
                            <label>Localización específica
                            </label>
                          </div>         
                          <div class="form-group col col-md-3">
                            <label for="coordenada_n">a) Coordenada Norte</label>
                            <input type="text" class="form-control" id="coordenada_n" name="coordenada_n" placeholder="Coordenada Norte">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="coordenada_w">b) Coordenada Oeste</label>
                            <input type="text" class="form-control" id="coordenada_w" name="coordenada_w" placeholder="Coordenada Oeste">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="altitud">c) Altitud (m.s.n.m)</label>
                            <input type="text" class="form-control" id="altitud" name="altitud" placeholder="Altitud (M.S.N.M.)">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group  col col-md-4">
                            <label for="area_predio">Area Total Predio</label>
                            <input type="number" class="form-control" id="area_predio" name="area_predio" placeholder="Área Tota del Predio">
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="predio_unidad_medida">Unidad de medida</label>
                            <select id="predio_unidad_medida" name="predio_unidad_medida" class="form-control">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($unidad_medida)):?>
                                  <?php foreach($unidad_medida as $um): ?>
                                    <option value="<?php echo $um->id; ?>"><?php echo $um->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group col col-md-4">
                            <label for="pot_estado">El Predio cumple con el POT Municipio</label>
                            <select id="pot_estado" name="pot_estado" class="form-control" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                          <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Para la Asociación se recomienda hacer un protocolo de medición.</b></small>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="form-group col col-md-3">
                            <label for="asociacion_estado">Asociación</label>
                            <select id="asociacion_estado" name="asociacion_estado" class="form-control asociacion">
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group  col col-md-3">
                            <label for="numero_asociados">Número de Asociados</label>
                            <input type="number" class="form-control asociacion" id="numero_asociados" name="numero_asociados" placeholder="Número de Asociados">
                          </div>
                          <div class="form-group col col-md-3">
                            <label for="famiempresa_estado">(*)Famiempresa</label>
                            <select id="famiempresa_estado" name="famiempresa_estado" class="form-control asociacion" required>
                              <option selected value="">Selecciona una opción</option>
                                <?php if(!empty($afirmacion)):?>
                                  <?php foreach($afirmacion as $af): ?>
                                    <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
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
                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?></option>
                                  <?php endforeach;?>  
                                <?php endif; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer" style="border: 1px solid green;background: #d4edda;margin: 10px;border-radius: 2px;" >
                        <div class="form-group alert alert-success" role="alert">
                          <label for="archivo_id">Imagen de empresa</label>
                          <input type="file" class="form-control-file" name="archivo_id" id="archivo_id">
                          <div class="row" id="visualizacion" style="display: none; margin: 5px;">
                            <div class="col-sm-6">
                              <img src="" id="previsualizar" class="img-fluid img-thumbnail img-responsive" style="max-height:250px;">
                            </div>
                            <div class="col-sm-4" id="list"></div>
                          </div>
                          <small><b>NOTA:</b> <p>Esta imagen será utilizada en caso de que el emprendimiento cumpla con mas del 50% luego de haber aplicado todos los criterios de evaluación para ser visualizada en la pagina principal</p> </small>
                        </div>
                      </div>
                      <div class="box-footer pull-right">
                          <a id="btn-informacion" data-form="almacenarInformacionGeneral" class="btn btn-primary pull-right" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                      </div>
                    </form>

                        </div> 
                        <!--primer tab fin -->

                        <!-- /.tab-pane -->
                        <div class="tab-pane container" id="tab_2">
                            <form role="form" id="descripcionNegocio" style="border: 1px solid #275200;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                              <div class="box-header with-border" style="padding: 9px;margin: 10px;background-color: #275200!important;">
                                <h3 class="box-title center" style="color:white;">II. DESCRIPCIÓN DE NEGOCIO VERDE</h3>
                              </div>
                              <input type="hidden" name="fecha_registro" id="fecha_registro">
                              <div class="box-body">
                                <div class="form-group">
                                    <label for="descripcion_negocio bg-info">(*) Descripción del Negocio(Bien o Servicio)</label>
                                    <textarea class="form-control" id="descripcion_negocio" name="descripcion_negocio" rows="5" required minlength="5"></textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="caracteristica_ambiental" style="padding: 10px;background: #e18e16;color: #FFF;">(*) Características ambientales de su negocio verde(incluir el impacto ambiental positivo generado)</label>
                                    <textarea class="form-control" id="caracteristica_ambiental" name="caracteristica_ambiental" rows="5" required minlength="5"></textarea>
                                    <span class="help-block"></span>
                                </div>
                              </div>
                              <div class="box-footer">
                                <a id="btn-descripcion" data-form="descripcionNegocio" class="btn btn-primary pull-right" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                              </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane container" id="tab_3">
                            <form role="form" id="categoriaNegocio" style="border: 1px solid #275200;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                              <div class="box-header with-border" style="padding: 9px;margin: 10px;background-color: #275200!important;">
                                <h3 class="box-title center" style="color:white;">III. CATEGORÍA DE NEGOCIO VERDE</h3>
                              </div>
                              <div class="box-body">
                                <input type="hidden" name="empresa_id" id="empresa_id">
                                <div class="row">
                                  <div class="form-group col col-md-4">
                                      <label for="categoria_id">(*)Categoría</label>
                                      <select id="categoria_id" name="categoria_id" class="form-control no" required>
                                        <option selected value="">Selecciona una opción</option>
                                        <?php if(!empty($categoria)):?>
                                          <?php foreach($categoria as $c): ?>
                                            <option value="<?php echo $c->id; ?>"><?php echo $c->nombre; ?></option>
                                          <?php endforeach;?>  
                                        <?php endif; ?>
                                      </select>
                                      <span class="help-block"></span>
                                  </div>
                                  <div class="form-group col col-md-4">
                                      <label for="sector_id">(*)Sector</label>
                                      <select id="sector_id" name="sector_id" class="form-control no" required>
                                        <option selected value="">Selecciona una opción</option>
                                      </select>
                                      <span class="help-block"></span>
                                  </div>
                                  <div class="form-group col col-md-4">
                                      <label for="subsector_id">(*)Subsector</label>
                                      <select id="subsector_id" name="subsector_id" class="form-control" required>
                                        <option selected value="">Selecciona una opción</option>
                                      </select>
                                      <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <a id="btn-categoria" data-form="categoriaNegocio" class="btn btn-primary pull-right" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane container" id="tab_4">                
                            <form role="form" id="informacionEmpresa" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                              <div class="box-header with-border" style="padding: 9px; margin: 10px; background-color: #e18e16!important;">
                                <h3 class="box-title center" style="color:#FFF;">IV. INFORMACIÓN DE EMPRESA</h3>
                              </div>
                              <div class="box-body">
                                <!-- Comienzo de row-->
                                <div style="padding: 10px;background: #ffc107;color: #FFF; margin:10px;">
                                  <small style="color:white;"><b>Características de los socios y empleados</b></small>
                                </div>
                                <div class="row border-red">
                                  <input type="hidden" name="empresa_id" id="empresa_id">
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
                                <div style="padding: 10px;background: #ffc107;color: #FFF; margin:10px;">
                                  <small style="color:white;"><b>Para el número de empleados diligencia los siguientes espacios:</b></small>
                                </div>
                                <!-- Comienzo de row-->
                                <div class="row border-red">
                                  <div class="col col-md-6">
                                      <label for="" class="border">4. Tipo de vinculacion laboral(Indicar Nº de empleos)</label>
                                      <div class="row">
                                        <div class="form-group col col-md-4">
                                          <label for="vinculacion_indefinido">Indefinido</label>
                                          <input type="number" name="vinculacion_indefinido" class="form-control vinculacion" id="vinculacion_indefinido" value="0" data-cod="1">
                                        </div>
                                        <div class="form-group col col-md-4">
                                          <label for="vinculacion_definido">Definido</label>
                                          <input type="number" name="vinculacion_definido" class="form-control vinculacion" id="vinculacion_definido" value="0" data-cod="2">
                                        </div>
                                        <div class="form-group col col-md-4">
                                          <label for="vinculacion_dias">Por días(Jornales) <small>promedio de días</small></label>
                                          <input type="number" name="vinculacion_dias" class="form-control vinculacion" id="vinculacion_dias" value="0" data-cod="3">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col col-md-6">
                                      <label for="" class="border">6. Edad <small>(Indicar número de empleados)</small></label>
                                      <div class="row">
                                        <div class="form-group col col-md-4">
                                          <label for="edad_rango1">Entre 18-30 años</label>
                                          <input type="number" name="edad_rango1" class="form-control rango_edad" id="edad_rango1" value="0" data-cod="1">
                                        </div>
                                        <div class="form-group col col-md-4">
                                          <label for="edad_rango2">Entre 30-50 años</label>
                                          <input type="number" name="edad_rango2" class="form-control rango_edad" id="edad_rango2" value="0" data-cod="2">
                                        </div>
                                        <div class="form-group col col-md-4">
                                          <label for="edad_rango3">Mayores de 50 años</label>
                                          <input type="number" name="edad_rango3" class="form-control rango_edad" id="edad_rango3"  value="0" data-cod="3">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <!-- Fin de row-->
                                <!-- Comienzo de row-->
                                <div class="row border-red">
                                  <div class="col col-md-12">
                                      <label for="" class="border">5. Nivel Educativo <small>(Indicar número de empleados)</small></label>
                                      <div class="row">
                                        <div class="form-group col col-md-2">
                                          <label for="educacion1">Primaria</label>
                                          <input type="number" name="educacion1" class="form-control educacion" id="educacion1" value="0" data-cod="1">
                                        </div>
                                        <div class="form-group col col-md-2">
                                          <label for="educacion2">Bachillerato</label>
                                          <input type="number" name="educacion2" class="form-control educacion" id="educacion2" value="0" data-cod="2">
                                        </div>
                                        <div class="form-group col col-md-2">
                                          <label for="educacion3">Técnico</label>
                                          <input type="number" name="educacion3" class="form-control educacion" id="educacion3" value="0" data-cod="3">
                                        </div>
                                        <div class="form-group col col-md-2">
                                          <label for="educacion4">Universitario</label>
                                          <input type="number" name="educacion4" class="form-control educacion" id="educacion4" value="0" data-cod="4">
                                        </div>
                                        <div class="form-group col col-md-2">
                                          <label for="educacion5">Otro</label>
                                          <input type="number" name="educacion5" class="form-control educacion" id="educacion5" value="0" data-cod="5">
                                        </div>
                                        <div class="form-group col col-md-2">
                                          <label for="nivel_educativo_total">Total</label>
                                          <input type="number" name="nivel_educativo_total" class="form-control no" id="nivel_educativo_total" value="0" disabled>
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
                                      <div class="row">
                                        <div class="form-group col-md-6">
                                          <label for="comunidad_indigena">Personas de comunidades indigenas</label>
                                          <select name="comunidad_indigena" id="comunidad_indigena" class="form-control situacion" data-asociado="cantidad_indigena">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_indigena">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_indigena" id="cantidad_indigena" class="form-control situacion" value="1" data-cod="1">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="situacion_discapacidad">Personas en situación de discapacidad</label>
                                          <select name="situacion_discapacidad" id="situacion_discapacidad" class="form-control situacion" data-asociado="cantidad_discapacidad">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_discapacidad">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_discapacidad" id="cantidad_discapacidad" class="form-control situacion" value="1" data-cod="2">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="adulto_mayor">Adulto mayor</label>
                                          <select name="adulto_mayor" id="adulto_mayor" class="form-control situacion no" data-asociado="cantidad_adulto">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_adulto">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_adulto" id="cantidad_adulto" class="form-control situacion" value="1" data-cod="3">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="madres_cabeza">Madres cabeza de hogar</label>
                                          <select name="madres_cabeza" id="madres_cabeza" class="form-control situacion no" data-asociado="cantidad_madre">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_madre">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_madre" id="cantidad_madre" class="form-control situacion" value="1" data-cod="4">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="reinsertado">Reinsertado</label>
                                          <select name="reinsertado" id="reinsertado" class="form-control situacion no" data-asociado="cantidad_reinsertado">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_reinsertado">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_reinsertado" id="cantidad_reinsertado" class="form-control situacion" value="1" data-cod="5">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="desplazado">Desplazados</label>
                                          <select name="desplazado" id="desplazado" class="form-control situacion no" data-asociado="cantidad_desplazado">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_desplazado">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_desplazado" id="cantidad_desplazado" class="form-control situacion" value="1" data-cod="6">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="persona_otro">Otros</label>
                                          <select name="persona_otro" id="persona_otro" class="form-control situacion no" data-asociado="cantidad_otro">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="cantidad_otro">Número de empleados</label>
                                          <input disabled type="number" name="cantidad_otro" id="cantidad_otro" class="form-control situacion" value="1" data-cod="7">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <!-- Fin de row-->
                                
                                
                                
                                
                               
                                
                                
                                <div style="padding: 10px;background: #ffc107;color: #FFF; margin:10px;">
                                  
                                  <small>
                            
                                    <b style="color:white;">Características del negocio (Marcar las opciones de la pregunta 1, que cumplas).</b>
                                  </small>
                                </div>
                                <!-- Comienzo de row-->
                                <div class="row border-red">
                                  <div class="col-md-6">
                                    <label for="" class="">1. Actividades realizadas por la empresa</label>
                                    <div class="form-check">
                                      <label class="checkbox-inline"><input type="checkbox" name="actividad_empresa" id="actividad_empresa" class="form-check-input actividad" value="1">Producción materia prima</label>
                                      <label class="checkbox-inline"><input type="checkbox" name="actividad_empresa" id="actividad_empresa" class="form-check-input actividad" value="2">Transformación</label>
                                      <label class="checkbox-inline"><input type="checkbox" name="actividad_empresa" id="actividad_empresa" class="form-check-input actividad" value="3">Comercialización</label>
                                    </div>
                                  </div>
                                  <div class="col col-md-6">
                                    <div class="form-group">
                                      <label for="etapa_empresarial">2. Etapa empresarial</label>
                                      <select class="form-control" name="etapa_empresarial" id="etapa_empresarial">
                                        <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($etapa_empresa)):?>
                                              <?php foreach($etapa_empresa as $ee): ?>
                                                <option value="<?php echo $ee->id; ?>"><?php echo $ee->nombre; ?></option>
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
                                    <div class="form-group row">
                                      <label for="bien1" class="col-md-3 control-label">Bien y/o servicio 1</label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien1" id="bien1" class="form-control bien" placeholder="Bien y/0 servicio 1">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="bien2" class="col-md-3 control-label">Bien y/o servicio 2</label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien2" id="bien2" class="form-control bien" placeholder="Bien y/0 servicio 2">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="bien3" class="col-md-3 control-label">Bien y/o servicio 3</label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien3" id="bien3" class="form-control bien" placeholder="Bien y/0 servicio 3">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="bien4" class="col-md-3 control-label">Bien y/o servicio 4</label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien4" id="bien4" class="form-control bien" placeholder="Bien y/0 servicio 4">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="bien5" class="col-md-3 control-label">Bien y/o servicio 5</label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien5" id="bien5" class="form-control bien" placeholder="Bien y/0 servicio 5">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="bien_lider" class="col-md-3 control-label">4. Bien y/o servicio líder <small>(No debe estar dentro de los anteriores bienes)</small></label>
                                      <div class="col-md-9">
                                        <input type="text" name="bien_lider" id="bien_lider" class="form-control bien" placeholder="Bien y/0 servicio líder (No debe estar dentro de los anteriores bienes)">
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
                                        <div class="form-group col col-md-6">
                                          <label for="constitucion_legal_estado">¿Su organización está constituida legalmente (camara de comercio, DIAN)?</label>
                                          <select name="constitucion_legal_estado" id="constitucion_legal_estado" class="form-control organizacion">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="anio_funcionamiento_registro">Años de funcionamiento de la empresa (en meses)</label>
                                          <input disabled type="text" name="anio_funcionamiento_registro" id="anio_funcionamiento_registro" class="form-control organizacion" placeholder="Años de funcionamiento de la empresa" value="1">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col col-md-6">
                                          <label for="operando_actualmente_estado">¿Su organización se encuentra operando en la actualidad?</label>
                                          <select name="operando_actualmente_estado" id="operando_actualmente_estado" class="form-control organizacion">
                                            <option selected value="">Selecciona una opción</option>
                                            <?php if(!empty($afirmacion)):?>
                                              <?php foreach($afirmacion as $af): ?>
                                                <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                                              <?php endforeach;?>  
                                            <?php endif; ?>
                                          </select>
                                        </div>
                                        <div class="form-group col col-md-6">
                                          <label for="anio_funcionamiento_empresa">¿Cuantos años de funcionamiento despues de registro ante camara y comercio?</label>
                                          <input disabled type="text" name="anio_funcionamiento_empresa" id="anio_funcionamiento_empresa" class="form-control organizacion" placeholder="¿Cuantos años de funcionamiento despues de registro ante camara y comercio?" value="1">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <!-- Fin de row-->
                              </div>
                              <div class="box-footer">
                                <a id="btn-informacionEmpresa" data-form="informacionEmpresa" class="btn btn-primary pull-right" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                              </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <!-- /.tab-pane -->
                        <div class="tab-pane container" id="tab_5">
                            <form role="form" id="observacionGeneral" style="border: 1px solid #275200;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                              <div class="box-header with-border" style="padding: 9px;margin: 10px;background-color: #275200!important;">
                                <h3 class="box-title center" style="color:white;">VI. OBSERVACIONES GENERALES</h3>
                              </div>
                              <div class="box-body">
                                <div class="form-group">
                                    <label for="observacion_general">(*)Observaciones Generales</label>
                                    <textarea class="form-control" id="observacion_general" name="observacion_general" rows="10" required minlength="3"></textarea>
                                    <span class="help-block"></span>
                                </div>
                                
                              </div>
                              <div class="box-footer">
                                <a href="javascript:;"  id="btn-observacion" class="btn btn-primary pull-right" data-form="observacionGeneral" style="border: 0px;color: white;border-radius: 4px;"> Guardar y Finalizar</a>
                              </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <!-- <div id="confirm-details" class="container tab-pane fade">
                            <br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


       