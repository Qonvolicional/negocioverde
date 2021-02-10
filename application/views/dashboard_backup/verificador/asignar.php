<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Asignación para aplicación de criterios
        <small>Nuevo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a href="<?php echo base_url(); ?>/verificador">Verificador</a></li>
            <li class="active">Asignación</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>

                        <form role="form" action="<?php echo base_url();?>verificador/asignacion" method="POST">
                            <h4 class="box-header with-border">Asignación</h4>
                            <div class="box-body">
                                <?php if($this->session->flashdata("errorAsignacion")):?>
                                  <div class="alert"><?php echo $this->session->flashdata("errorAsignacion"); ?> </div>
                                <?php endif; ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col col-xs-6">
                                            <label for="persona_id">Verificador</label>
                                            <select class="form-control" id="persona_id" name="persona_id">
                                                <option value="">Selecciona una opción</option>
                                                <?php if(!empty($verificadores)):?>
                                                    <?php foreach($verificadores as $verificador):?>
                                                        <option value="<?php echo $verificador->persona_id;?>"><?php echo $verificador->nombre;?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="form-group col col-xs-6">
                                            <label for="empresa_id">Emprendimiento</label>
                                            <select class="form-control" id="empresa_id" name="empresa_id">
                                                <option value="">Selecciona una opción</option>
                                                <?php if(!empty($empresas)):?>
                                                    <?php foreach($empresas as $empresa):?>
                                                        <option value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre;?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                   <!--  <div class="row">
                                        <div class="form-group col col-xs-6">
                                            <label for="fecha_asignacion">Fecha de asignación</label>
                                            <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control" required>
                                            <span class="validity"></span>
                                        </div>
                                        <div class="form-group col col-xs-6">
                                            <label for="fecha_retiro">Fecha de retiro</label>
                                            <input type="date" name="fecha_retiro" id="fecha_retiro" class="form-control" required>
                                            <span class="validity"></span>
                                        </div>
                                    </div> -->
                                    <div class="btn-group pull-right">
                                        <a href="<?php echo base_url(); ?>/verificador" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Atrás</span></a>
                                        <button type="submit" class="btn btn-success btn-flat">Guardar <span class="fa fa-save"></span></button>
                                    </div>
                                </div>
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
<!-- /.content-wrapper