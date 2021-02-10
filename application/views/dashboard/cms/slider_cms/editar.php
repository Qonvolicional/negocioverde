<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Slider <small class="text-sm">Editar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_sliders"><i class="fa fa-dashboard"></i> Sliders </a></li>
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
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $slider->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_slider/"; ?>">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                 </div>
            <?php endif;?>
            <form action="<?php echo base_url();?>cms_slider/actualizar" method="POST" enctype="multipart/form-data" id="form">
                <input type="hidden" value="<?php echo $slider->id; ?>" name="id">
                <div class="card-body">
                    <div class="form-group nombre">
                        <label for="nombre">(*)Título</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ($slider->nombre)?$slider->nombre:''; ?>">
                    </div>
                    <div class="form-group descripcion">
                        <label for="descripcion">(?)Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingresar una breve descripción del slider."> <?php echo ($slider->descripcion)?$slider->descripcion:""; ?>
                         </textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">(?)Enlace externo de <sub>(Opcional)</sub>:</label>
                        <input type="url" name="url" id="url" class="form-control" value="<?php echo ($slider->url)?$slider->url:""; ?>" placeholder="Por ejemplo, http://ejemplopagina.com">
                    </div>
                    <div class="form-group imagenFile">
                        <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                            Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                        </span>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <?php if(!empty($slider->url_imagen)):?>
                                <div class="col-md-4">
                                    <p>Nombre de archivo: <small><?php echo $slider->nombre; ?></small></p>
                                    <img src="<?php echo base_url().$slider->url_imagen; ?>" alt="<?php echo $slider->nombre; ?>" class="img-fluid img-thumbnail img-responsive">
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                </div>     
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="ml-auto btn-group">
                      <a href="<?php echo base_url(); ?>cms_sliders" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
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