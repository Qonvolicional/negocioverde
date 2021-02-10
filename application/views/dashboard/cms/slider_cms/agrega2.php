<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Slider <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_sliders"><i class="fa fa-dashboard"></i> Sliders</a></li>
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
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_publicacion/"; ?>">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    
                 </div>
            <?php endif;?>
            <form action="<?php echo base_url();?>cms_slider/almacenar" method="POST" enctype="multipart/form-data" id="form">
                <div class="card-body">
                    <div class="form-group nombre">
                        <label for="nombre">(*)Título</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" placeholder="Ingresar un título para el slider">
                        <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        <span class="help-block" id="errorNombre"></span>
                    </div>
                    <div class="form-group descripcion <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                        <label for="descripcion">(?)Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="6" placeholder="Ingresar una breve descripción del slider."><?php echo set_value('descripcion'); ?></textarea>
                        <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                        <span class="help-block" id="errorDescripcion"></span>
                    </div>
                    <div class="form-group <?php echo form_error('url') == true ? 'has-error':''?>">
                        <label for="url">(?)Enlace externo <sub>(Opcional)</sub>:</label>
                        <input type="url" name="url" id="url" class="form-control" placeholder="Por ejemplo, http://ejemplopagina.com">
                    </div>
                    <div class="form-group imagenFile <?php echo form_error('imagen') == true ? 'has-error':''?>" >
                        <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                            Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                        </span>
                        <?php echo form_error("imagen","<span class='help-block'>","</span>");?>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <div class="col-sm-12">
                                <h4>Actualmente no has seleccionado una imagen.</h4>
                            </div>  
                        </div>
                        <span class="help-block" id="errorImagen"></span>
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