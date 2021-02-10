<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Obra <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Obra</a></li>
            <li class="breadcrumb-item active">Agregar</li>
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
              <h3 class="card-title"><i class="fas fa-plus"></i> Nuevo</h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url().$_SESSION['modulo_string']."/"; ?>">
            <form action="<?php echo base_url().$_SESSION['modulo_string']; ?>/almacenar" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo form_error('tipo_obra_id') == true ? 'has-error':''?>">
                            <label for="tipo_obra_id">(*)Tipo de obra</label>
                            <select class="form-control" name="tipo_obra_id" id="tipo_obra_id">
                                <?php if(!empty($tipoObra)):?>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach($tipoObra as $tipo): ?>
                                        <option value="<?php echo $tipo->id; ?>" <?php echo (set_value('tipo_obra_id')==$tipo->id)?'selected':''; ?> > <?php echo $tipo->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                            <?php echo form_error("tipo_obra_id","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                            <label for="nombre">(*)Título</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('sinopsi') == true ? 'has-error':''?>">
                        <label for="sinopsi">Sinopsi</label>
                        <textarea name="sinopsi" id="sinopsi" class="form-control descripcion"><?php echo set_value('sinopsi'); ?></textarea>
                        <?php echo form_error("sinopsi","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group videoFile <?php echo form_error('video') == true ? 'has-error':''?>" >
                        <span class="btn btn-default btn-lg btn-file "><span class="far fa-file-video"> </span>
                            Seleccionar videos/trailer de obra <input type="file" name="video[]" id="video" class="form-control" accept="video/*" multiple>
                        </span>
                        <div class="row" id="previsualizacionVideo" style="margin:5px;">
                            <div class="col-sm-12">
                                <h4>Actualmente no has seleccionado ninguna video para subir.</h4>
                            </div>   
                        </div>
                        <span class="help-block" id="errorVideo"></span>
                    </div>               
                    <div class="form-group imagenFile <?php echo form_error('imagen') == true ? 'has-error':''?>" >
                        <span class="btn btn-default btn-lg btn-file "><span class="far fa-images"> </span>
                            Seleccionar imagenes de galeria de obra <input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                        </span>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <div class="col-sm-12">
                                <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                            </div>   
                        </div>
                        <span class="help-block" id="errorImagen"></span>
                    </div>
                    <div class="form-group <?php echo form_error('musicalizacion') == true ? 'has-error':''?>">
                        <label for="musicalizacion">Musicalización</label>
                        <textarea name="musicalizacion" id="musicalizacion" class="form-control descripcion"><?php echo set_value('musicalizacion'); ?></textarea>
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