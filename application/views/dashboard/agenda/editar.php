
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Agenda <small class="text-sm"><?php echo $agenda->nombre; ?></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Agenda</a></li>
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
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $agenda->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url().$_SESSION['modulo_string']."/"; ?>">
            <form action="<?php echo base_url().$_SESSION['modulo_string']; ?>/actualizar" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $agenda->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                        <label for="nombre">(*)Título</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (form_error('nombre'))?set_value('nombre'):$agenda->nombre; ?>">
                        <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group col-md-6 <?php echo form_error('fecha') == true ? 'has-error':''?>">
                      <label for="fecha">(*)Fecha de agenda</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo (form_error('fecha'))?set_value('fecha'):$agenda->fecha; ?>" required>
                        <?php echo form_error("fecha","<span class='help-block'>","</span>");?>
                    </div>
                  </div>
                 
                  <div class="form-group <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                      <label for="descripcion">(*)Descripcion</label>
                      <textarea name="descripcion" id="descripcion" class="form-control descripcion"><?php echo set_value('descripcion'); ?><?php echo $agenda->descripcion; ?></textarea>
                      <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group <?php echo form_error('imagen') == true ? 'has-error':''?>">
                      <span class="btn btn-default btn-lg btn-file "><span class="far fa-image"> </span>
                          Seleccionar imagen de portada <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                      </span>
                      <div class="row" id="previsualizacion" style="margin:5px;">
                          <?php if(!empty($agenda->url_imagen)):?>
                              <div class="col-sm-4">
                                  <p>Nombre de archivo: <small><?php echo explode("assets/archivo/",base_url().$agenda->url_imagen)[1]; ?></small></p>
                                  <img src="<?php echo base_url().$agenda->url_imagen; ?>" alt="<?php echo $agenda->nombre; ?>" class="img-fluid img-thumbnail img-responsive">
                              </div>
                          <?php else: ?>
                              <div class="col-sm-4">
                                  <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                              </div>     
                          <?php endif;?>
                      </div>
                  </div>
                  <div class="form-group videoFile <?php echo form_error('video') == true ? 'has-error':''?>" >
                      <span class="btn btn-default btn-lg btn-file "><span class="far fa-file-video"> </span>
                          Seleccionar video/trailer <input type="file" name="video" id="video" class="form-control" accept="video/*">
                      </span>
                      <div class="row" id="previsualizacionVideo" style="margin:5px;">
                          <?php if(!empty($agenda->url_video)):?>
                            <div class="embed-responsive embed-responsive-16by9">
                              <video class="embed-responsive-item"  controls>
                                  <source src="<?php echo base_url().$agenda->url_video; ?>" type="video/mp4">
                              </video>
                            </div> 
                          <?php else: ?>
                              <div class="col-sm-12">
                                 <h4>Actualmente no has seleccionado ninguna video para subir.</h4>
                              </div>     
                          <?php endif;?>
                      </div>
                      <span class="help-block" id="errorVideo"></span>
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