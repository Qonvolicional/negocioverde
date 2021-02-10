<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Galeria <small class="text-sm"><?php echo $galeria->nombre; ?></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_galerias"><i class="fa fa-dashboard"></i> Galerias</a></li>
            <li class="breadcrumb-item active"><?php echo $galeria->nombre; ?></li>
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
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $galeria->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_galeria/"; ?>">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                 </div>
            <?php endif;?>
            <form action="<?php echo base_url();?>cms_galeria/actualizar" method="POST" enctype="multipart/form-data" id="form">
                <input type="hidden" value="<?php echo $galeria->id; ?>" name="id">
                <div class="card-body">
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
                                            <p>Nombre de archivo: <?php echo $subCadena; ?> - Fecha de creación: <?php echo $galeria->fecha_creacion; ?></p>
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