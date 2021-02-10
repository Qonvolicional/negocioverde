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
    /*color: #fff;*/
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
.btn{
  border-radius: 0px;
}
.btn-file {
    position: relative;
    overflow: hidden;
}

.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

ul.nav.nav-tabs li.nav-item a.btn{ 
    text-transform:uppercase;
    height:100%;
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
                        <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                        <li><a class="active">Registro</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="service-single padding-tb">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      
        <!-- Custom Tabs -->
        <div class="pos-rel">
          <!-- nav-tabs -->
          <ul class="nav nav-tabs nav-pills justify-content-center nav-justified">
            <li class="nav-item active">
              <a href="#tab_1" data-toggle="tab" class="nav-link active btn btn-primary">Formato de Inscripción General</a>
            </li>
            <li class="nav-item disabled d-none">
              <a href="#tab_2" class="nav-link btn btn-primary" data-toggle="tab">Descripción del negocio</a>
            </li>
            <li class="nav-item disabled d-none"><a href="#tab_4" class="nav-link btn btn-primary" data-toggle="tab ">Impactos Ambientales</a></li>
            <li class="nav-item disabled d-none"><a href="#tab_3" class="nav-link btn btn-primary" data-toggle="tab">Características del negocio</a></li>
            <li class="nav-item disabled d-none"><a href="#tab_5" class="nav-link btn btn-primary" data-toggle="tab">Información del empresario</a></li>
          </ul>
          <!-- /.nav-tabs -->
          <div class="connected-line"></div>
          <!-- tab-content --> 
          <div class="tab-content container">
            <div class="tab-pane active" id="tab_1">
              <input type="hidden" name="base_url" id="base_url" value="<?php echo current_url(); ?>">
              <?php if($this->session->flashdata("mensaje")):?>
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4 class="alert-heading">Felicidades!</h4>
                <p>Te has registrado en nuestro programa de negocios verdes.
                          Próximamente te asignaremos un verificador que se encargará de explicarte claramente lo que son los negocios verdes y te realizará la respectiva aplicación y verificación de criterios para determinar el nivel de avance de tu iniciativa o emprendimiento verde.</p>
                <hr>
                <p class="mb-0">Somos Ventanilla de Emprendimientos Verdes del Chocó.</p>
             </div>
              <?php endif; ?>
              <form role="form" method="post" id="almacenarInformacionGeneral" class="form-agregar" enctype="multipart/form-data" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                  
                <div style="padding:9px; background-color: #e18e16!important;">
                  <h3 class="box-title" style="color: white;">I. INFORMACIÓN GENERAL</h3>
                </div>
                <br/>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="anio_verificado">El negocio ha sido anteriormente verificado?: </label>
                    <select name="anio_verificado" id="anio_verificado" class="form-control sino no" data-sino="anios" required>
                      <option value="">Selecciona una opción</option>
                      <option value="1">Si</option>
                      <option value="2">No</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 anios" id="anios">
                    <label for="anio_verificado_empresa">Especifique los años: </label>
                    <select name="anio_verificado_empresa" id="anio_verificado_empresa" class="form-control multiple anios_verificado_empresa" multiple="multiple" >
                      <?php for($i = 2000; $i < 2020; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                            <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-3">
                    <label for="autoridad_ambiental_id">(*)Autoridad Ambiental</label>
                    <select id="autoridad_ambiental_id" name="autoridad_ambiental_id" class="form-control" required>
                      <option selected value="">Selecciona una opción</option>
                    </select>
                    <span class="help-block"></span>
                  </div>
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
                </div>

                <div style="padding:9px; background-color: #e18e16!important;">
                  <h3 class="box-title" style="color: white;">II. DATOS DEL NEGOCIO</h3>
                </div>
                <br/>

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
                      <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación" required minlength="7" maxlength="15" unique="empresa">
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

                <div class="row">
                  <div class="form-group col col-md-6">
                    <label for="direccion_correspondencia">Dirección de correspondencia:</label>
                    <input type="text" name="direccion_correspondencia" id="direccion_correspondencia" class="form-control empresa" placeholder="Dirección de correspondencia">
                  </div>
                  <div class="form-group col col-md-6">
                    <label for="correo_empresarial">E-mail Empresarial:</label>
                    <input type="text" name="correo_empresarial" id="correo_empresarial" class="form-control empresa" placeholder="Correo electrónica de la empresa" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col col-md-6">
                    <label for="celular_empresarial">Celular:</label>
                    <input type="text" name="celular_empresarial" id="celular_empresarial" class="form-control empresa" placeholder="Número de celular de la empresa">
                  </div>
                  <div class="form-group col col-md-6">
                    <label for="telefono_fijo">Telefono Fijo:</label>
                    <input type="text" name="telefono_fijo" id="telefono_fijo" class="form-control empresa" placeholder="Telefono fijo de la empresa">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col col-md-6">
                    <label for="pagina_negocio">Página Web o Redes Sociales:</label>
                    <input type="text" name="pagina_negocio" id="pagina_negocio" class="form-control empresa" placeholder="Página web o dirección de la red social preferida">
                  </div>
                  <div class="form-group col col-md-6">
                    <label for="url_micrositio">Micrositio (Google):</label>
                    <input type="text" name="url_micrositio" id="url_micrositio" class="form-control empresa" placeholder="Dirección web del micrositio de Google">
                  </div>
                </div>

                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-user" aria-hidden="true"></i> Representante Legal</b></small>
                </div>
                <br/>

                <div class="row">
                  <div class="form-group col col-md-4">
                    <label for="identificacion2">(*)Documento</label>
                    <input type="number" class="form-control persona" id="persona_identificacion" min="0" name="persona_identificacion" placeholder="Documento" required minlength="7" maxlength="15" unique="persona">
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

                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fas fa-thumbtack" aria-hidden="true"></i> Localización Específica</b></small>
                </div>
                <br/>

                <div class="row">
                  <div class="form-group col col-md-12">
                    <label for="vereda">Vereda</label>
                    <input type="text" class="form-control" id="vereda" name="vereda" placeholder="Vereda">
                  </div>
                </div>

                <div class="row">     
                  <div class="form-group col col-md-4">
                    <label for="coordenada_n">a) Coordenada Norte</label>
                    <input type="number" class="form-control" id="coordenada_n" name="coordenada_n" placeholder="Coordenada Norte">
                  </div>
                  <div class="form-group col col-md-4">
                    <label for="coordenada_w">b) Coordenada Oeste</label>
                    <input type="number" class="form-control" id="coordenada_w" name="coordenada_w" placeholder="Coordenada Oeste">
                  </div>
                  <div class="form-group col col-md-4">
                    <label for="altitud">c) Altitud (m.s.n.m)</label>
                    <input type="number" class="form-control" id="altitud" name="altitud" placeholder="Altitud (M.S.N.M.)">
                  </div>
                </div>

                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> I. Información Adicional</b></small>
                </div>
                <br/>

                <div class="row">
                  <div class="form-group col col-md-4">
                    <label for="tipo_personeria">Tipo de Personería:</label>
                    <select id="tipo_personeria" name="tipo_personeria" class="form-control noaplica" data-otra="personeria_juridica">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($tipo_personeria)):?>
                          <?php foreach($tipo_personeria as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group col col-md-8 personeria_juridica">
                    <label for="personeria_juridica">Especifique cuál:</label>
                    <input type="text" name="personeria_juridica" id="personeria_juridica" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group  col col-md-4">
                    <label for="numero_socio">Número de Socios:</label>
                    <input type="number" min="0" class="form-control asociacion" id="numero_socio" name="numero_socio" placeholder="Número de Asociados">
                  </div>
                  <div class="form-group col col-md-4">
                    <label for="declarante_renta">(*)Declarante de Renta?:</label>
                    <select id="declarante_renta" name="declarante_renta" class="form-control sino" data-sino="declaracion_renta">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($afirmacion)):?>
                          <?php foreach($afirmacion as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-4 declaracion_renta">
                    <label for="ultimo_anio_declaracion">Último año de declaración:</label>
                    <input type="number" name="ultimo_anio_declaracion" id="ultimo_anio_declaracion" min="0" class="form-control">
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
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
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
                          <?php foreach($tamanio_empresa as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-6">
                    <label for="fecha_constitucion">Fecha de Constitución ante Cámara de comercio:</label>
                    <input type="date" id="fecha_constitucion" name="fecha_constitucion" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col col-md-3">
                    <label for="ultimo_anio_renovacion">Último año de renovación:</label>
                    <input type="number" min="0" name="ultimo_anio_renovacion" id="ultimo_anio_renovacion" class="form-control">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-9">
                    <label for="resolucion_facturacion_aplica">(*)La unidad productiva cuenta con resolución de facturación o no aplica por ser regimen simplificado:</label>
                    <select id="resolucion_facturacion_aplica" name="resolucion_facturacion_aplica" class="form-control sino" data-sino="resolucion_facturacion">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($afirmacion)):?>
                          <?php foreach($afirmacion as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="row resolucion_facturacion">
                  <div class="form-group  col col-md-4">
                    <label for="resolucion_facturacion">Número de resolución de la DIAN:</label>
                    <input type="number" class="form-control" id="resolucion_facturacion" name="resolucion_facturacion" placeholder="Número de resolución de la DIAN">
                  </div>
                  <div class="form-group col col-md-4">
                    <label for="rango_numeracion">(*)Rango de Numeración:</label>
                    <input type="text" id="rango_numeracion" name="rango_numeracion" class="form-control">
                  </div>
                  <div class="form-group col col-md-4">
                    <label for="vigencia_numeracion">Vigencia de la resolución de facturación:</label>
                    <input type="date" name="vigencia_numeracion" id="vigencia_numeracion" class="form-control">
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
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                </div>

                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> II. Información Adicional</b></small>
                </div>
                <br/>

                <div class="row">
                  <div class="form-group col col-md-3">
                    <label for="consejo_comunitario_sino">Consejo Comunitario:</label>
                    <select id="consejo_comunitario_sino" name="consejo_comunitario_sino" class="form-control sino" data-sino="consejo_comunitario">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($afirmacion)):?>
                          <?php foreach($afirmacion as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group col col-md-3 consejo_comunitario">
                    <label for="consejo_comunitario">Nombre de Consejo Comunitario:</label>
                    <input type="text" name="consejo_comunitario" id="consejo_comunitario" class="form-control">
                  </div>
                  <div class="form-group col col-md-3">
                    <label for="junta_accion_comunal_sino">Junta de Acción Comunal:</label>
                    <select id="junta_accion_comunal_sino" name="junta_accion_comunal_sino" class="form-control sino" data-sino="junta_accion">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($afirmacion)):?>
                          <?php foreach($afirmacion as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group col col-md-3 junta_accion">
                    <label for="junta_accion_comunal">Nombre de Junta Acción:</label>
                    <input type="text" name="junta_accion_comunal" id="junta_accion_comunal" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col col-md-4">
                    <label for="grupo_etnico_id">Grupo Étnico:</label>
                    <select id="grupo_etnico_id" name="grupo_etnico_id" class="form-control no_aplica" data-noaplica="grupo_etnico">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($grupo_etnico)):?>
                          <?php foreach($grupo_etnico as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group col col-md-8 grupo_etnico">
                    <label for="nombre_etnico">Nombre de Grupo Étnico:</label>
                    <input type="text" class="form-control" id="nombre_etnico" name="nombre_etnico" placeholder="Nombre de grupo étnico">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col col-md-2">
                    <label for="cabildo_sino">Cabildo:</label>
                    <select id="cabildo_sino" name="cabildo_sino" class="form-control">
                      <option selected value="">Selecciona una opción</option>
                        <?php if(!empty($afirmacion)):?>
                          <?php foreach($afirmacion as $af): ?>
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
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
                            <option value="<?php echo $af->id; ?>"><?php echo $af->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-6 territorio_colectivo">
                    <label for="territorio_colectivo">Nombre del territorio:</label>
                    <input type="text" id="territorio_colectivo" name="territorio_colectivo" class="form-control">
                  </div>
                </div>

                <div class="box-footer">
                  <div class="form-group alert alert-info" role="alert">
                    <span class="btn btn-light btn-file convocatoria evento"><span class="far fa-file-pdf"> </span> Carta de consentimiento <input type="file" name="documento_consentimiento_id" id="documento_consentimiento_id" class="form-control" accept="image/*,.pdf">
                    </span>
                    <div class="col-sm-12" id="previsualizacionDocumento">
                     <p>Actualmente no has seleccionado ninguna documento.</p>
                    </div>
                    <button type="button" id="verDocumento" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" >
                      <span class="fa fa-file-pdf-o"> Ver documento</span>
                    </button>
                    <small><p><strong>NOTA:</strong> cuenta con carta de consentimiento. (Documento que deberá ser firmado antes del proceso de verificación).</p> </small>
                  </div>
                  <hr>
                  <div class="form-group alert alert-success" role="alert">
                    <label for="archivo_id">Imagen de empresa</label>
                    <input type="file" class="form-control-file" name="archivo_id" id="archivo_id" accept="image/*">
                    <div class="row" id="visualizacion" style="display: none; margin: 5px;">
                      <div class="col-sm-6">
                        <img src="" id="previsualizar" class="img-fluid img-thumbnail img-responsive" style="max-height:250px;">
                      </div>
                      <div class="col-sm-4" id="list"></div>
                    </div>
                    <small><p><b>NOTA:</b> Esta imagen será utilizada en caso de que el emprendimiento cumpla con mas del 50% luego de haber aplicado todos los criterios de evaluación para ser visualizada en la pagina principal</p> </small>
                  </div>
                </div>
                  
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="max-width: 70%; margin: auto; max-height: 90%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Visualización de documento</b></h5>
                        <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
                          <span aria-hidden="true" >&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="modal_vista">
                        <embed id="vistaDocumento" src="" type="application/pdf" width="100%" height="600px" />
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-footer d-flex">
                    <a id="btn-informacion" data-form="almacenarInformacionGeneral" class="btn btn-primary ml-auto" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                </div>

              </form>
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2" >
              <form role="form" id="descripcionNegocio" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                  <div style="padding:9px; background-color: #e18e16!important;">
                    <h3 class="box-title" style="color: white;">III. DESCRIPCIÓN DE NEGOCIO VERDE</h3>
                  </div>
                  <input type="hidden" name="fecha_registro" id="fecha_registro">
                  <div class="form-group">
                    <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                      <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Descripción del Negocio (Bien o Servicio). Incluir el <u>impacto ambiental positivo</u> (requisito mínimo y esencial para ser Negocio Verde, ver detalle en información complementaria).</b></small>
                    </div>
                    <textarea class="form-control" id="descripcion_negocio" name="descripcion_negocio" rows="5" required minlength="5"></textarea>
                    <span class="help-block"></span>
                  </div>
                
                  <div class="box-footer d-flex">
                    <a id="btn-descripcion" data-form="descripcionNegocio" class="btn btn-primary ml-auto" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                  </div>
              </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
              <form role="form" id="categoriaNegocio" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                <div style="padding:9px; background-color: #e18e16!important;">
                  <h3 class="box-title" style="color: white;">V. CARACTERÍSTICAS DE NEGOCIO VERDE</h3>
                </div>
                <br/>
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
                      <select id="subsector_id" name="subsector_id" class="form-control empresa" required>
                        <option selected value="">Selecciona una opción</option>
                      </select>
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> 1. Bienes y servicios. Escoja alguna de las opciones o si son ambas. Describa el bien o servicio líder, y los otros servicios o bienes.</b></small>
                </div>
                <br>
        
                <div class="row">
                  <div class="form-group col col-md-4">
                    <label for="tipo_bien_lider">(*)Tipo de Servicio:</label>
                    <select name="tipo_bien_lider" id="tipo_bien_lider" class="form-control servicio_lider" required data-servicio="">
                      <option value="">Selecciona una opción.</option>
                      <?php if(!empty($opciones_bienes_servicios)):?>
                          <?php foreach($opciones_bienes_servicios as $ti): ?>
                            <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group col col-md-8">
                    <label for="bien_lider">(*)Bien o servicio líder que caracteriza al Negocio Verde:</label>
                    <input type="text" name="bien_lider" id="bien_lider" class="form-control" placeholder="Bien o servicio líder" required="">
                  </div>
                </div>
                <?php for($i = 1; $i <=5; $i++ ):?>
                  <div class="row">
                    <div class="form-group col col-md-4">
                      <label for="tipo_bien_<?php echo $i; ?>">Tipo de Servicio:</label>
                      <select name="tipo_bien_<?php echo $i; ?>" id="tipo_bien_<?php echo $i; ?>" class="form-control tipo_servicio" data-servicio="">
                        <option value="">Selecciona una opción.</option>
                        <?php if(!empty($opciones_bienes_servicios)):?>
                          <?php foreach($opciones_bienes_servicios as $ti): ?>
                            <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                          <?php endforeach;?>  
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="form-group col col-md-8">
                      <label for="bien_<?php echo $i; ?>">Bien o servicio <?php echo $i; ?>:</label>
                      <input type="text" name="bien_<?php echo $i; ?>" id="bien_<?php echo $i; ?>" class="form-control bien no" placeholder="Bien o servicio líder">
                    </div>
                  </div>
                <?php endfor; ?>
                
                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> 2. Actividades realizadas por la empresa.</b></small>
                </div>
                <br>
                <?php if(!empty($actividades)):?>
                  <?php foreach($actividades as $act):?>
                    <div class="row" style="margin-top: 3px;">
                      <div class="form-group col-xs-12 col-md-3" >
                        <label for=""> <?php echo $act->id." - ".$act->nombre; ?>: </label>
                      </div>
                      <div class="form-group col-xs-12 col-md-4">
                        <select name="actividad_empresa_<?php echo $act->id; ?>" id="actividad_empresa_<?php echo $act->id; ?>" class="form-control tipo_actividad sinoaplica" data-sinoaplica="actividad<?php echo $act->id; ?>" data-actividad="<?php echo $act->id; ?>">
                        <option value="">Selecciona una opción.</option>
                        <?php if(!empty($si_no_aplica)):?>
                          <?php foreach($si_no_aplica as $ti): ?>
                            <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
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
                              <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
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
                              <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                            <?php endforeach;?>  
                          <?php endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Dirección: </label>
                        <input name="direccion_actividad_<?php echo $act->id; ?>" id="direccion_actividad_<?php echo $act->id; ?>" class="form-control no">
                      </div>
                    </div>

                    <div class="row actividad<?php echo $act->id; ?>">
                      <div class="form-group col-md-3">
                        <label for="">Tipo de tenencia: </label>
                        <select name="tt_actividad_<?php echo $act->id; ?>" id="tt_actividad_<?php echo $act->id; ?>" class="form-control no">
                          <option value="">Selecciona una opción</option>
                          <?php if(!empty($tenencia_tierra)):?>
                            <?php foreach($tenencia_tierra as $ti): ?>
                              <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                            <?php endforeach;?>  
                          <?php endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Área del predio (m2): </label>
                        <input type="number" min="0" name="area_actividad_<?php echo $act->id; ?>" id="area_actividad_<?php echo $act->id; ?>" class="form-control no" placeholder="Área del predio de la actividad">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Cumple POT Municipal: </label>
                        <select name="pot_actividad_<?php echo $act->id; ?>" id="pot_actividad_<?php echo $act->id; ?>" class="form-control no">
                          <option value="">Selecciona una opción</option>
                          <?php if(!empty($afirmacion)):?>
                            <?php foreach($afirmacion as $ti): ?>
                              <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
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
                              <option value="<?php echo $ti->id; ?>"><?php echo $ti->nombre; ?></option>
                            <?php endforeach;?>  
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row actividad<?php echo $act->id; ?>">
                      <div class="form-group col-md-12">
                        <label for="">Observaciones: </label>
                        <textarea name="observacion_actividad_<?php echo $act->id; ?>" id="observacion_actividad_<?php echo $act->id; ?>" rows="4" class="form-control no" placeholder="Escribe tus observaciones de la actividad"></textarea>
                      </div>
                    </div>
              
                  <?php endforeach; ?>
                <?php endif;?>
                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> 3. Observaciones generales.</b></small>
                </div>
                <br>
                <div class="row">
                  <div class="form-group col col-md-12">
                    <label for="">Observaciones:</label>
                    <textarea class="form-control empresa" id="observacion_general" name="observacion_general" rows="10" required minlength="3"></textarea>
                  </div>
                </div>
                
                <div class="box-footer d-flex">
                  <a id="btn-categoria" data-form="categoriaNegocio" class="btn btn-primary ml-auto" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                  </div>
              </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">                
              <form role="form" id="informacionEmpresa" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                <div style="padding:9px; background-color: #e18e16!important;">
                  <h3 class="box-title" style="color: white;">IV. Impactos Ambientales Positivos y Buenas Prácticas que aportan a la Sostenibilidad Ambiental</h3>
                </div>
                
                <div class="bg-warning d-flex" style="padding: 10px; margin-bottom:15px;font-size: 19px;color: #fff;">
                    <b class="" style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> 1. Impactos ambientales positivos identificados en el Plan Nacional de Negocios Verdes.</b>
                    <a class="ml-auto despliegue" data-despliegue="impacto_ambiental"><span class="fa fa-minus-square text-success" style="font-size: 19px;"></span></a>
                </div>
                <div id="impacto_ambiental" >
                  <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                      <small class="text-success"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Marque con  una x el impacto ambiental positivo de acuerdo con la siguiente escala:</b>
                    <ol style="color: black; text-align: justify-all; padding-left: 20px; ">
                      <li><b>1. Bajo impacto:</b> Cuando tiene un efecto positivo mínimo sobre los recursos y el medio ambiente, beneficiando exclusivamente a la empresa.</li>
                      <li><b>2. Impacto moderado:</b> Cuando tiene un efecto positivo sobre el medio ambiente y además, es potencialmente perdurable en el tiempo y no beneficia exclusivamente a la empresa.</li>
                      <li><b>3. Alto impacto:</b> Cuando tiene un gran efecto positivo sobre el medio ambiente y además, se ha mejorado y mantenido en el tiempo y beneficia a la comunidad en donde se encuentra la empresa.</li>
                    </ol></b></small>
                  </div>
                  <br>
                <?php if(!empty($impacto_ambiental)):?>
                  <?php foreach($impacto_ambiental as $ia):?>
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
                                <option value="<?php echo $sna->id; ?>"> <?php echo $sna->nombre; ?> </option>
                              <?php endforeach;?>
                            <?php endif; ?>
                          </select>
                          <input type="hidden" class="no" value="<?php echo $ia->id;?>">
                        </div>
                      </div>
                      <div class="col col-md-4 impacto_p_<?php echo $ia->id; ?>">
                        <div class="form-group">
                          <label for="descripcion_<?php echo $ia->id;?>">Descripción: </label>
                          <textarea name="descripcion_impacto_<?php echo $ia->id; ?>" id="descripcion_<?php echo $ia->id;?>" rows="3" class="form-control"></textarea> 
                        </div>
                      </div>
                      <div class="col col-md-2 impacto_p_<?php echo $ia->id; ?>">
                        <div class="form-group">
                          <label for="">Marque el nivel de impacto</label>
                          <div class="form-check form-inline">
                            <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="1" class="form-check-input" title="Bajo impacto"> 1 </label> 
                            <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="2" class="form-check-input" title="Impacto moderado"> 2 </label> 
                            <label for=""><input type="radio" name="impacto_<?php echo $ia->id; ?>" id="impacto_<?php echo $ia->id; ?>" value="3" class="form-check-input" title="Alto impacto"> 3 </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <?php endforeach;?>
                <?php endif;?>
                </div>
                <div class="bg-warning d-flex" style="padding: 10px; margin-bottom:15px;font-size: 19px;color: #fff;">
                    <b class="" style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> 2.  Buenas Prácticas que se aplican en el negocio o en el área de influencia de la iniciativa.</b>
                    <a class="ml-auto despliegue" data-despliegue="practica_conservacion"><span class="fa fa-minus-square text-success" style="font-size: 19px;"></span></a>
                </div>
                <div id="practica_conservacion">
                <?php if(!empty($practica_conservacion)):?>
                  <?php $i = 0; ?>
                  <?php foreach($practica_conservacion as $pc):?>
                    <?php 
                      $i++;
                      $orden="2.".$i."."; 
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
                                <option value="<?php echo $sna->id; ?>"> <?php echo $sna->nombre; ?> </option>
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
                
                <div class="box-footer d-flex">
                  <a id="btn-informacionEmpresa" data-form="informacionEmpresa" class="btn btn-primary ml-auto" style="border: 0px;color: white;border-radius: 4px;">Guardar y Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_5">
              <form role="form" id="informacionVerificacion" style="border: 1px solid #e18e16;margin: 16px;padding: 11px;box-shadow: gray 3px 2px 3px;background: #ffa5000f;border-radius: 7px;">
                <div style="padding:9px; background-color: #e18e16!important;">
                  <h3 class="box-title center" style="color: white;">INFORMACIÓN DEL VERIFICADOR Y EMPRESARIO</h3>
                </div>    
                
                <?php if(!empty($verificador)): ?>
                <div class="bg-warning" style="padding: 10px;font-size: 19px;color: #fff;">
                  <small class="text-success center"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Información de Verificador.</b></small>
                </div>
                <div class="row">
                  <div class="form-group col col-md-4">
                      <label for="nombre">Nombre</label>
                      <input disabled type="text" name="nombre" id="nombre" class="form-control no" placeholder="Nombre de verificador" value="<?php echo $verificador->nombre_completo; ?>">
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="celular">Celular</label>
                      <input disabled type="text" name="celular" id="celular" class="form-control no" placeholder="Número de contacto" value="<?php echo $verificador->celular; ?>">
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="correo">Correo electrónico</label>
                      <input disabled type="text" name="correo" id="correo" class="form-control no" placeholder="Correo del funcionario" value="<?php echo $verificador->correo; ?>">
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
                      <input disabled type="text" name="cargoo" id="cargoo" class="form-control no" placeholder="Cargo de verificador" value="<?php echo $verificador->cargo; ?>">
                  </div> 
                </div>
              <?php endif; ?>
                <div class="bg-warning" style="padding: 10px; margin-bottom: 15px; font-size: 19px;color: #fff;">
                  <small class="text-success center"><b style="color: black;font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Información de Empresario (Quien diligencia formulario).</b></small>
                </div>
                <div class="form-check-inline form-check">
                  <label for="">¿Quien diligencia es el representante legal?: -- </label> <label for=""> Si  <input type="radio" name="respuesta" id="respuesta" value="1" class="form-check-input" title="Representante legal"></label> 
                  <label for=""> Otro funcionario  <input type="radio" name="respuesta" id="respuesta" value="2" class="form-check-input" title="Otro funcionario"> </label>
                  <input type="hidden" name="representante_legal_id" id="representante_legal_id">
                </div>
                <div class="row">
                  <div class="form-group col col-md-4">

                      <label for="nombre">(*)Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control empresario" placeholder="Nombre de Empresario"  required minlength="3">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="identificacion">(*)Identificación</label>
                      <input type="text" name="identificacion" id="identificacion" class="form-control empresario" placeholder="Identificación de Empresario" required minlength="7" maxlength="12" unique="empresario">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="cargo">(*)Cargo</label>
                      <input type="text" name="cargo" id="cargo" class="form-control empresario" placeholder="Cargo de Empresario" required minlength="3" maxlength="50">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col col-md-4">
                      <label for="Celular">Celular</label>
                      <input type="text" name="celular" id="celular" class="form-control empresario" placeholder="Número de Contacto del Empresario" minlength="3">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="correo">(*)Correo Electrónico</label>
                      <input type="text" name="correo" id="correo" class="form-control empresario" placeholder="Correo Electrónico de Funcionario" required minlength="7" maxlength="100" unique="empresario">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group col col-md-4">
                      <label for="empresa">(*)Empresa</label>
                      <input type="text" name="empresa_empresario" id="empresa_empresario" class="form-control no" placeholder="Empresa de Empresario/funcionario" minlength="3" maxlength="100" disabled>
                      <span class="help-block"></span>
                  </div>
                </div>
                
                <div class="box-footer d-flex" >
                  <a data-form="informacionVerificacion" id="btn-verificadorEmpresario" class="btn btn-primary ml-auto" style="border: 0px;color: white;border-radius: 4px;">Guardar y Finalizar <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
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
                      <textarea class="form-control" id="observacion_general" name="observacion_general" rows="10" required minlength="3"></textarea>
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
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content -->