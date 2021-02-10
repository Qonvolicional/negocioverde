
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Obra <small class="text-sm"><?php echo $obra->nombre; ?></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Obra</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
      
  </section>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $obra->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url().$_SESSION['modulo_string']."/"; ?>">
            <form action="<?php echo base_url().$_SESSION['modulo_string']; ?>/actualizar" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $obra->id; ?>" name="id">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo form_error('tipo_obra_id') == true ? 'has-error':''?>">
                            <label for="tipo_obra_id">(*)Tipo de obra</label>
                            <select class="form-control" name="tipo_obra_id" id="tipo_obra_id" required>
                                <?php if(!empty($tipo_obra)):?>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach($tipo_obra as $tipo ): ?>
                                        <option value="<?php echo $tipo->id; ?>" <?php echo ($tipo->id==$obra->tipo_obra_id)?"selected":""; ?> > <?php echo $tipo->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                            <?php echo form_error("tipo_obra_id","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                            <label for="nombre">(*)Título</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (form_error('nombre'))?set_value('nombre'):$obra->nombre; ?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('sinopsi') == true ? 'has-error':''?>">
                        <label for="sinopsi">Sinopsi</label>
                        <textarea name="sinopsi" id="sinopsi" class="form-control descripcion"><?php echo set_value('sinopsi'); ?><?php echo $obra->sinopsi; ?></textarea>
                        <?php echo form_error("sinopsi","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group videoFile <?php echo form_error('video') == true ? 'has-error':''?>" >
                        <span class="btn btn-default btn-lg btn-file "><span class="far fa-file-video"> </span>
                            Seleccionar videos/trailer de obra <input type="file" name="video[]" id="video" class="form-control" accept="video/*" multiple>
                        </span>
                        <div class="row" id="previsualizacionVideo" style="margin:5px;">
                            <?php if(!empty($videos)):?>
                                <?php foreach($videos as $video):?>
                                    <div class="col-sm-4 mr-2 embed-responsive embed-responsive-16by9">
                                      <video class="embed-responsive-item videos"  controls>
                                          <source src="<?php echo base_url().$video->url_recurso; ?>" type="video/mp4">
                                      </video>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-sm-12">
                                   <h4>Actualmente no has seleccionado ninguna video para subir.</h4>
                                </div>     
                            <?php endif;?>
                        </div>
                        <span class="help-block" id="errorVideo"></span>
                    </div>
                    <div class="form-group imagenFile">
                        <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                            Seleccionar las imagenes o imagen de galeria <input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                        </span>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <?php 
                                $subCadena = (strlen(trim($obra->nombre)) > 12)?substr(trim($obra->nombre), 0, 9)."...":trim($obra->nombre);
                            ?>
                            <?php if(!empty($imagenes)):?>
                                <?php foreach($imagenes as $img):?>
                                    <div class="col-sm-2">
                                    <p>Nombre de archivo: <?php echo $subCadena; ?> - 
                                    <img src="<?php echo base_url().$img->url_recurso; ?>" alt="<?php echo $subCadena; ?>" class="img-fluid img-thumbnail img-responsive" style="max-height: 100px; max-width: 100px;">
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-sm-12">
                                    <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                </div>     
                            <?php endif;?>
                        </div>
                    </div>               
                    <div class="form-group <?php echo form_error('musicalizacion') == true ? 'has-error':''?>">
                        <label for="musicalizacion">Musicalización</label>
                        <textarea name="musicalizacion" id="musicalizacion" class="form-control descripcion"><?php echo $obra->musicalizacion; ?></textarea>
                        <?php echo form_error("musicalizacion","<span class='help-block'>","</span>");?>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="ml-auto btn-group">
                        <a href="<?php echo base_url().$_SESSION['modulo_string']; ?>" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
                        <button type="submit" class="btn bg-gradient-danger btn-flat active"><span class="fa fa-save"> Guardar</span></button>
                    </div>
                </div>              
            </form>
          </div>
        </div>
      </div>
    </div> 
  </section>
</div>
<!-- /.content-wrapper -->