
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Publicación <small class="text-sm">Editar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>cms_publicaciones"><i class="fa fa-dashboard"></i> Publicación</a></li>
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
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $publicacion->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_publicacion/"; ?>">
            <form action="<?php echo base_url();?>cms_publicacion/actualizar" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $publicacion->id; ?>" name="id">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                            <label for="cms_tipo_publicacion_id">(*)Tipo de publicación</label>
                            <select class="form-control" name="cms_tipo_publicacion_id" id="cms_tipo_publicacion_id" required>
                                <?php if(!empty($tipo_publicacion)):?>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach($tipo_publicacion as $tipo ): ?>
                                        <option value="<?php echo $tipo->id; ?>" data-tipo="<?php echo $tipo->slug; ?>" <?php echo ($tipo->id==$publicacion->cms_tipo_publicacion_id)?"selected":""; ?> > <?php echo $tipo->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                            <?php echo form_error("cms_tipo_publicacion_id","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                            <label for="nombre">(*)Título</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (form_error('nombre'))?set_value('nombre'):$publicacion->nombre; ?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo (form_error('descripcion'))?set_value('descripcion'):$publicacion->descripcion; ?></textarea>
                                <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="row" id="fechas">
                                <div class="form-group col-sm-6 desplegable convocatorias eventos">
                                    <label for="fecha_apertura">Fecha de apertura:</label>
                                    <input type="date" name="fecha_apertura" id="fecha_apertura" class="form-control" value="<?php echo ($publicacion->fecha_apertura)?$publicacion->fecha_apertura:""; ?>">
                                </div>
                                <div class="form-group col-sm-6 desplegable convocatorias">
                                    <label for="fecha_cierre">Fecha de cierra:</label>
                                    <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" value="<?php echo ($publicacion->fecha_cierre)?$publicacion->fecha_cierre:""; ?>">
                                </div>
                                <div class="form-group col-md-6 desplegable eventos">
                                    <label for="hora_apertura">Hora de apertura:</label>
                                    <input type="time" name="hora_apertura" id="hora_apertura" class="form-control" value="<?php echo ($publicacion->hora_apertura)?$publicacion->hora_apertura:""; ?>">
                                </div>
                            </div>
                            <div class="form-group desplegable convocatorias eventos <?php echo form_error('documento') == true ? 'has-error':''?>" id="referenciaDocumento">
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
                            <div class="form-group desplegable convocatorias eventos noticias  <?php echo form_error('url') == true ? 'has-error':''?>">
                                <label for="url">Enlace externo de <sub>(Opcional)</sub>:</label>
                                <input type="url" name="url" id="url" class="form-control" value="<?php echo ($publicacion->url)?$publicacion->url:""; ?>">
                            </div>
                            <!--<div class="form-group<?php echo form_error('imagen') == true ? 'has-error':''?>">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar imagen de portada <sub>Opcional</sub><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <?php if(!empty($publicacion->url_imagen)):?>
                                        <div class="col-sm-4">
                                            <p>Nombre de archivo: <small><?php echo explode("assets/archivo/",base_url().$publicacion->url_imagen)[1]; ?></small></p>
                                            <img src="<?php echo base_url().$publicacion->url_imagen; ?>" alt="<?php echo $publicacion->imagen; ?>" class="img-fluid img-thumbnail img-responsive">
                                        </div>
                                    <?php else: ?>
                                        <div class="col-sm-4">
                                            <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                                        </div>     
                                    <?php endif;?>
                                </div>
                            </div>-->
                            <div class="form-group momentos desplegable <?php echo form_error('fecha') == true ? 'has-error':''?>">
                                <label for="fecha">Fecha del momento</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $publicacion->fecha; ?>">
                                <?php echo form_error("fecha","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="">Enlace de youtube</label>
                                <div class="form-group" id="enlaces-youtube">
                                    <?php 
                                        $cantidad = count($videos);
                                        $i = 0;
                                    ?>
                                    <?php if(!empty($videos)):?>
                                        <?php foreach($videos as $v):?>
                                            <?php 
                                                $id=$i+1;
                                                $principal=($id==1)?'btn-principal':'';
                                            ?>
                                            <div class="item-youtube row">
                                                <div class="input-group mb-3 col-sm-9">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text fab fa-youtube" id="basic-addon<?php echo $id;?>"></span>
                                                  </div>
                                                  <input type="url" class="form-control" placeholder="Enlace de youtube" aria-label="Username" aria-describedby="basic-addon<?php echo $id;?>" name="video[]" id="video<?php echo $id;?>" value="<?php echo $v->url_recurso;?>">
                                                </div>
                                                <div class="col">
                                                    <?php if(!$principal): ?>
                                                        <a class="btn btn-url btn-danger btn-eliminar-url" ><i class="fas fa-minus"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if($principal || $id==$cantidad):?>
                                                    <a class="btn btn-url <?php echo $principal;?> btn-primary btn-agregar-url" ><i class="fas fa-plus"></i>
                                                    </a>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="item-youtube row">
                                            <div class="input-group mb-3 col-sm-9">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text fab fa-youtube" id="basic-addon1"></span>
                                              </div>
                                              <input type="url" class="form-control" placeholder="Enlace de youtube" aria-label="Username" aria-describedby="basic-addon1" name="video[]" id="video1">
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-url btn-principal btn-primary btn-agregar-url" ><i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                                
                            <div class="form-group imagenFile">
                                <span class="btn btn-default btn-lg btn-file "><span class="fa fa-file-image-o"> </span>
                                    Seleccionar imagen(es) de publicación <input type="file" name="imagen[]" id="imagen" class="form-control" accept="image/*" multiple>
                                </span>
                                <div class="row" id="previsualizacion" style="margin:5px;">
                                    <?php 
                                        $subCadena = (strlen(trim($publicacion->nombre)) > 12)?substr(trim($publicacion->nombre), 0, 9)."...":trim($publicacion->nombre);
                                    ?>
                                    <?php if(!empty($imagenes)):?>
                                        <?php foreach($imagenes as $img):?>
                                            <div class="col-sm-4">
                                            <p>Nombre de archivo: <?php echo $subCadena; ?> - 
                                            <img src="<?php echo base_url().$img->url_recurso; ?>" alt="<?php echo $subCadena; ?>" class="img-fluid img-thumbnail img-responsive" style="height: 300px; ">
                                        </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-sm-12">
                                            <h4>Actualmente no has seleccionado ninguna imagen para subir.</h4>
                                        </div>     
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="menu_id">Menus a los cuales va a pertenecer <sub>(Opcional)</sub></label>
                                <select name="menu_id[]" id="menu_id" class="form-control select2" multiple>
                                    <?php if(!empty($menus)): ?>
                                        <?php foreach($menus as $menu): ?>
                                            <option value="<?php echo $menu->id;?>" <?php echo (!empty($menuPublicacion) && in_array($menu->id, array_column($menuPublicacion, 'cms_menu_id')))?'selected':''; ?> ><?php echo $menu->nombre;?></option>
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