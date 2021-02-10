<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Publicación
        <small><?php echo $publicacion->nombre; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li><a class="pull-right" href="<?php echo base_url(); ?>cms_publicaciones">Publicaciones</a></li>
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
                        <form action="<?php echo base_url();?>cms_publicacion/actualizar" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="url" id="url" value="<?php echo base_url(); ?>">
                            <input type="hidden" value="<?php echo $publicacion->id; ?>" name="id">
                            <div class="form-group <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                                <label for="cms_tipo_publicacion_id">Tipo de publicación:</label>
                                <select class="form-control" name="cms_tipo_publicacion_id" id="cms_tipo_publicacion_id" required>
                                    <?php if(!empty($tipo_publicacion)):?>
                                        <option value="">Selecciona una opción</option>
                                        <?php foreach($tipo_publicacion as $tipo ): ?>
                                            <option value="<?php echo $tipo->id; ?>" <?php echo ($tipo->id==$publicacion->cms_tipo_publicacion_id)?"selected":""; ?> > <?php echo $tipo->nombre; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </select>
                                <?php echo form_error("cms_tipo_publicacion_id","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="nombre">Título:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (form_error('nombre'))?set_value('nombre'):$publicacion->nombre; ?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo (form_error('descripcion'))?set_value('descripcion'):$publicacion->descripcion; ?></textarea>
                                <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="row desplegable desplegable convocatoria evento" id="fechas">
                                <div class="form-group col-sm-6 convocatoria evento">
                                    <label for="fecha_apertura">Fecha de apertura:</label>
                                    <input type="date" name="fecha_apertura" id="fecha_apertura" class="form-control" value="<?php echo ($publicacion->fecha_apertura)?$publicacion->fecha_apertura:""; ?>">
                                </div>
                                <div class="form-group col-sm-6 convocatoria">
                                    <label for="fecha_cierre">Fecha de cierra:</label>
                                    <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" value="<?php echo ($publicacion->fecha_cierre)?$publicacion->fecha_cierre:""; ?>">
                                </div>
                                <div class="form-group col-md-6 evento">
                                    <label for="hora_apertura">Hora de apertura:</label>
                                    <input type="time" name="hora_apertura" id="hora_apertura" class="form-control" value="<?php echo ($publicacion->hora_apertura)?$publicacion->hora_apertura:""; ?>">
                                </div>
                            </div>
                            <div class="form-group desplegable convocatoria evento<?php echo form_error('documento') == true ? 'has-error':''?>" id="referenciaDocumento">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-pdf-o"> </span> <span class="fa fa-file-word-o"> </span>
                                    Seleccionar un documento de referencia <sub>Opcional</sub><input type="file" name="documento" id="documento" class="form-control" accept=".pdf, .doc, .docx">
                                </span>
                                <?php if(!empty($publicacion->documento)):?>
                                    <div class="col-sm-12" id="previsualizacionDocumento">
                                        <p><b>Documento subido:</b> <?php echo explode("assets/archivo/", $publicacion->url_documento)[1]; ?></p> 
                                    </div>
                                <?php else: ?>
                                    <div class="col-sm-12" id="previsualizacionDocumento">
                                     <p>Actualmente no has seleccionado ninguna documento.</p>
                                    </div>
                                <?php endif;?>
                            </div>
                            <div class="form-group desplegable convocatoria evento noticia  <?php echo form_error('url') == true ? 'has-error':''?>">
                                <label for="url">Enlace externo de <sub>(Opcional)</sub>:</label>
                                <input type="url" name="url" id="url" class="form-control" value="<?php echo ($publicacion->url)?$publicacion->url:""; ?>">
                            </div>
                            <div class="form-group<?php echo form_error('imagen') == true ? 'has-error':''?>">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <?php if(!empty($publicacion->url_imagen)):?>
                                        <div class="col-sm-4">
                                            <p>Nombre de archivo: <small><?php echo explode("/",base_url().$publicacion->url_imagen)[2]; ?></small></p>
                                            <img src="<?php echo base_url().$publicacion->url_imagen; ?>" alt="<?php echo $publicacion->imagen; ?>" class="img-fluid img-thumbnail img-responsive">
                                        </div>
                                    <?php else: ?>
                                        <div class="col-sm-4">
                                            <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                                        </div>     
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url(); ?>cms_publicaciones" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
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