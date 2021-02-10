
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Módulo
        <small>Edicción</small>
        </h1>
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
                        <form action="<?php echo base_url();?>modulo/actualizar" method="POST">
                            <input type="hidden" value="<?php echo $modulo->id;?>" name="modulo_id">
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error': '';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $modulo->nombre?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $modulo->descripcion?>">
                            </div>
                            <div class="form-group <?php echo form_error('controlador') == true ? 'has-error': '';?>">
                                <label for="controlador">Controlador:</label>
                                <input type="text" class="form-control" id="controlador" name="controlador" value="<?php echo $modulo->controlador?>">
                                <?php echo form_error("controlador","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icono:</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $modulo->icon?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
