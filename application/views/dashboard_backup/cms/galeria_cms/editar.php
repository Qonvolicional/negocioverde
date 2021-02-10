<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Galeria
        <small><?php echo $galeria->nombre; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a class="pull-right" href="<?php echo base_url(); ?>cms_galerias">Galerias</a></li>
            <li class="active">Editar</li>
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
                        <form action="<?php echo base_url();?>cms_galeria/actualizar" method="POST" enctype="multipart/form-data" id="form">
                            <input type="hidden" value="<?php echo $galeria->id; ?>" name="id">
                            <div class="form-group nombre">
                                <label for="nombre">Título:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ($galeria->nombre)?$galeria->nombre:''; ?>" placeholder="Ingrese un título para la galeria.">
                                <span class="help-block" id="errorNombre"></span>
                            </div>
                            <div class="form-group descripcion">
                                <label for="descripcion">Descripción <sub>Opcional</sub>:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingresar una breve descripción del galeria."> <?php echo ($galeria->descripcion)?$galeria->descripcion:""; ?>
                                 </textarea>
                            </div>
                            <div class="form-group imagenFile">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar las imagenes o imagen de galeria <input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <?php 
                                        $subCadena = (strlen(trim($galeria->nombre)) > 12)?substr(trim($galeria->nombre), 0, 9)."...":trim($galeria->nombre);
                                    ?>
                                    <?php if(!empty($imagenes)):?>
                                        <?php foreach($imagenes as $img):?>
                                            <div class="col-sm-2">
                                            <img src="<?php echo base_url().$img->url; ?>" alt="<?php echo $subCadena; ?>" class="img-fluid img-thumbnail img-responsive" style="max-height: 100px; max-width: 100px;">
                                        </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-sm-12">
                                            <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                        </div>     
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url(); ?>cms_galerias" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
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