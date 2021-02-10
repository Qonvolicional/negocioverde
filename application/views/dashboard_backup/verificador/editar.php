<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Verificador
        <small><?php echo $verificador->nombre1." ".$verificador->apellido1;?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a href="<?php echo base_url(); ?>/verificador">Verificador</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <!-- Main content -->
    <?php  
        $imagen = ($verificador->imagen=="")? base_url()."assets/template/img/avatar2.png":base_url().$verificador->imagen;
    ?>
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("errorVerificador")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <div class="box-header" style="margin-bottom: 10px;">
                            <div class="" style="max-width: 175px; max-height: 175px; margin:0 auto; position: relative;">
                                <img src="<?php echo $imagen; ?>" class="img-circle img-responsive img-thumbnail imagen-perfil" alt="User Image" id="previsualizar"> 
                                    <span id="editarImagen" class="fa fa-pencil" style="position: absolute; left: 70%; top: 85%; color: black; height: 20px; width:20px; font-size: 1.1em; text-align: center; opacity: 0.6; color: white; background: blue; border-radius: 50%; border: 2px solid black;"></span>
                            </div>
                        </div>
                        <form role="form" action="<?php echo base_url();?>Verificador/actualizar" method="POST" enctype="multipart/form-data">
                            <h4 class="box-header with-border">DATOS PERSONALES</h4>
                            <div class="box-body">
                                <?php if($this->session->flashdata("errorPerfil")):?>
                                  <div class="alert"><?php echo $this->session->flashdata("errorPerfil"); ?> </div>
                                <?php endif; ?>
                                <div class="col-md-12">
                                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $verificador->usuario_id; ?>">
                                    <input type="hidden" name="persona_id" id="persona_id" value="<?php echo $verificador->persona_id; ?>">
                                    <div class="row">
                                        <div class="form-group col col-xs-4">
                                            <label for="identificacion">Identificación</label>
                                            <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identicación" value="<?php echo $verificador->identificacion; ?>">
                                        </div>
                                        <input type="hidden" name="rol_id" id="rol_id" value="2">  
                                        <div class="form-group col col-xs-4">
                                            <label for="nombre1">Primer Nombre</label>
                                            <input type="text" name="nombre1" id="nombre1" class="form-control" placeholder="Primer Nombre" value="<?php echo $verificador->nombre1; ?>">
                                        </div>
                                        <div class="form-group col col-xs-4">
                                            <label for="nombre2">Segundo Nombre</label>
                                            <input type="text" name="nombre2" id="nombre2" class="form-control" placeholder="Segudo Nombre" value="<?php echo $verificador->nombre2; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-xs-6">
                                            <label for="apellido1">Primer Apellido</label>
                                            <input type="text" name="apellido1" id="apellido1" class="form-control" placeholder="Primer Apellido" value="<?php echo $verificador->apellido1; ?>">
                                        </div>
                                        <div class="form-group col col-xs-6">
                                            <label for="apellido2">Segundo Apellido</label>
                                            <input type="text" name="apellido2" id="apellido2" class="form-control" placeholder="Segudo Apellido" value="<?php echo $verificador->apellido2; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col col-xs-4">
                                            <label for="correo">Correo Electrónico</label>
                                            <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="<?php echo $verificador->correo; ?>">
                                        </div>
                                        <div class="form-group col col-xs-4">
                                            <label for="celular">Celular</label>
                                            <input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" value="<?php echo $verificador->celular; ?>">
                                        </div>
                                        <div class="form-group col col-xs-4">
                                            <label for="fijo">Telefono fijo</label>
                                            <input type="text" name="fijo" id="fijo" class="form-control" placeholder="Telefono Fijo" value="<?php echo $verificador->fijo; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?php echo $verificador->direccion; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen de Perfil</label>
                                        <input type="file" name="imagen" id="imagen">
                                    </div>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h4>Vinculación</h4>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="entidad_id">Entidades:</label>
                                            <select name="entidad_id" id="entidad_id" class="form-control">
                                                <?php if(!empty($entidades)):?>
                                                    <?php foreach($entidades as $entidad):?>
                                                        <option value="<?php echo $entidad->id; ?>" <?php echo ($entidad->id==$verificador->entidad_id)?'selected':''; ?> ><?php echo $entidad->nombre; ?></option>
                                                    <?php endforeach;?>    
                                                <?php endif;?>    
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="area_id">Area:</label>
                                            <select name="area_id" id="area_id" class="form-control">
                                                <?php if(!empty($areas)):?>
                                                    <?php foreach($areas as $area):?>
                                                        <option value="<?php echo $area->id; ?>" <?php echo ($area->id==$verificador->area_id)?'selected':''; ?>><?php echo $area->nombre; ?></option>
                                                    <?php endforeach;?>    
                                                <?php endif;?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="cargo_id">Cargo:</label>
                                            <select name="cargo_id" id="cargo_id" class="form-control">
                                                <?php if(!empty($cargos)):?>
                                                    <?php foreach($cargos as $cargo):?>
                                                        <option value="<?php echo $cargo->id; ?>" <?php echo ($cargo->id==$verificador->cargo_id)?'selected':''; ?>><?php echo $cargo->nombre; ?></option>
                                                    <?php endforeach;?>    
                                                <?php endif;?>    
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Fecha de retiro</label>
                                            <input type="date" name="fecha_retiro" id="fecha_retiro" class="form-control" value="<?php echo $verificador->fecha_retiro; ?>">
                                        </div>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <a href="<?php echo base_url(); ?>/verificador" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Atrás</span></a>
                                        <button type="submit" name="btn-guardar" id="btn-guardar" class="btn btn-success">Guardar <span class="fa fa-save"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form role="form" action="<?php echo base_url();?>Verificador/reestablecer" method="POST">
                            <input type="hidden" name="usuario_id_r" id="usuario_id_r" value="<?php echo $verificador->id; ?>">
                            <input type="hidden" name="identificacion_v" id="identificacion_v" value="<?php echo $verificador->identificacion; ?>">
                            <h4 class="box-header with-border">CREDENCIALES</h4>
                            <div class="form-group image">
                                <button class="btn btn-warning btn-lg">REESTABLECER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->