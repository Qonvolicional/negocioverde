<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Slider
        <small><?php echo $slider->nombre; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a class="pull-right" href="<?php echo base_url(); ?>cms_sliders">Sliders</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>cms_slider/actualizar" method="POST" enctype="multipart/form-data" id="form">
                            <input type="hidden" value="<?php echo $slider->id; ?>" name="id">
                            <div class="form-group nombre">
                                <label for="nombre">Título:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ($slider->nombre)?$slider->nombre:''; ?>">
                            </div>
                            <div class="form-group descripcion">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingresar una breve descripción del slider."> <?php echo ($slider->descripcion)?$slider->descripcion:""; ?>
                                 </textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Enlace externo de <sub>(Opcional)</sub>:</label>
                                <input type="url" name="url" id="url" class="form-control" value="<?php echo ($slider->url)?$slider->url:""; ?>" placeholder="Por ejemplo, http://ejemplopagina.com">
                            </div>
                            <div class="form-group imagenFile">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <?php if(!empty($slider->url_imagen)):?>
                                        <div class="col-sm-4">
                                            <img src="<?php echo base_url().$slider->url_imagen; ?>" alt="<?php echo $slider->nombre; ?>" class="img-fluid img-thumbnail img-responsive">
                                        </div>
                                    <?php else: ?>
                                        <div class="col-sm-12">
                                            <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                        </div>     
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url(); ?>cms_sliders" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
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