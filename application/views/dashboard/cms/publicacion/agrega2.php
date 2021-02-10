<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Publicación <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_publicaciones"><i class="fa fa-dashboard"></i> Publicación</a></li>
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
            <form action="<?php echo base_url();?>cms_publicacion/almacenar" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                            <label for="cms_tipo_publicacion_id">(*)Tipo de publicación</label>
                            <select class="form-control" name="cms_tipo_publicacion_id" id="cms_tipo_publicacion_id">
                                <?php if(!empty($tipo_publicacion)):?>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach($tipo_publicacion as $tipo ): ?>
                                        <option value="<?php echo $tipo->id; ?>" data-tipo="<?php echo $tipo->slug; ?>" <?php echo (set_value('cms_tipo_publicacion_id')==$tipo->id)?'selected':''; ?> > <?php echo $tipo->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                            <?php echo form_error("cms_tipo_publicacion_id","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                            <label for="nombre">(*)Título</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"><?php echo set_value('descripcion'); ?></textarea>
                        <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 desplegable convocatorias eventos">
                            <label for="fecha_apertura">Fecha de apertura</label>
                            <input type="date" name="fecha_apertura" id="fecha_apertura" class="form-control">
                        </div>
                        <div class="form-group col-md-6 desplegable convocatorias">
                            <label for="fecha_cierre">Fecha de cierra</label>
                            <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control">
                        </div>
                        <div class="form-group col-md-6 desplegable eventos">
                            <label for="hora_apertura">Hora de apertura</label>
                            <input type="time" name="hora_apertura" id="hora_apertura" class="form-control">
                        </div>
                    </div>
                    <div class="form-group desplegable convocatorias eventos <?php echo form_error('documento') == true ? 'has-error':''?>">
                        <span class="btn btn-default btn-lg btn-file convocatoria evento"><span class="fa fa-file-pdf-o"> </span> <span class="fa fa-file-word-o"> </span>
                            Seleccionar un documento de referencia <sub>Opcional</sub><input type="file" name="documento" id="documento" class="form-control" accept=".pdf, .doc, .docx">
                        </span>
                        <div class="col-sm-12" id="previsualizacionDocumento">
                         <p>Actualmente no has seleccionado ninguna documento.</p>
                        </div>
                    </div>
                    <div class="form-group desplegable convocatorias eventos noticia <?php echo form_error('url') == true ? 'has-error':''?>">
                        <label for="url">Enlace externo <sub>(Opcional)</sub>:</label>
                        <input type="url" name="url" id="url" class="form-control">
                    </div>
                    <!--<div class="form-group<?php echo form_error('imagen') == true ? 'has-error':''?>">
                        <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                            Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                        </span>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <div class="col-sm-4">
                                <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                            </div>  
                        </div>
                    </div>-->
                    <div class="form-group momentos desplegable <?php echo form_error('fecha') == true ? 'has-error':''?>">
                        <label for="fecha">Fecha del momento</label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                        <?php echo form_error("fecha","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group">
                        <label for="">Enlace de youtube</label>
                        <div class="form-group" id="enlaces-youtube">
                            <div class="item-youtube row">
                                <div class="input-group mb-3 col-sm-9">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text fab fa-youtube" id="basic-addon1"></span>
                                  </div>
                                  <input type="url" class="form-control" placeholder="Enlace de youtube" aria-label="Username" aria-describedby="basic-addon1" name="video[]" id="video">
                                </div>
                                <div class="col"><a class="btn btn-url btn-principal btn-primary btn-agregar-url" style="border:none;background-color:  rgba(233,40,36,1);" ><i class="fas fa-plus" style="color: white;"></i></a></div>
                            </div>
                        </div>
                    </div>                  
                    <div class="form-group<?php echo form_error('imagen') == true ? 'has-error':''?>">
                        <span class="btn btn-default btn-lg btn-file "><span class="far fa-image"> </span>
                            Seleccionar imagen(es) de publicación<input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                        </span>
                        <div class="row" id="previsualizacion" style="margin:5px;">
                            <div class="col-sm-4">
                                <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="menu_id">Menus a los cuales va a pertenecer <sub>(Opcional)</sub></label>
                        <select name="menu_id[]" id="menu_id" class="form-control select2" multiple>
                            <?php if(!empty($menus)): ?>
                                <?php foreach($menus as $menu): ?>
                                    <option value="<?php echo $menu->id;?>"><?php echo $menu->nombre;?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="ml-auto btn-group">
                      <a href="<?php echo base_url(); ?>cms_publicaciones" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
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