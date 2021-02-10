<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Galeria
        <small>Nuevo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a class="pull-right" href="<?php echo base_url(); ?>cms_galerias">Galerias</a></li>
            <li class="active">Agregar</li>
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
                        <form action="<?php echo base_url();?>cms_galeria/almacenar" method="POST" enctype="multipart/form-data" id="form">
                            <div class="form-group nombre">
                                <label for="nombre">Título:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="Ingrese un título para la galeria.">
                                <span class="help-block" id="errorNombre"></span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción <sub>Opcional</sub>:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="6" placeholder="Ingresar una breve descripción de la galeria."></textarea>
                            </div>
                            <div class="form-group imagenFile <?php echo form_error('imagen') == true ? 'has-error':''?>" >
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar las imagenes o imagen de galeria <input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <div class="col-sm-12">
                                        <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                    </div>   
                                </div>
                                <span class="help-block" id="errorImagen"></span>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url(); ?>cms_galerias" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Atrás</span></a>
                                <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"></span> Guardar</button>
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