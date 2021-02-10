<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Galeria <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_galerias"><i class="fa fa-dashboard"></i> Galerias</a></li>
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
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_galeria/"; ?>">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    
                 </div>
            <?php endif;?>
            <form action="<?php echo base_url();?>cms_galeria/almacenar" method="POST" enctype="multipart/form-data" id="form">
                <div class="card-body">
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
                </div>
                <div class="card-footer d-flex">
                    <div class="ml-auto btn-group">
                      <a href="<?php echo base_url(); ?>cms_galerias" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
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