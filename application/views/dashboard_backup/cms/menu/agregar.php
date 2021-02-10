<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Menu
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms/menu"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li class="active">Agregar</li>
      </ol>
    </section>
    <?php 
        $activacion = ($admin==9)?"":"disabled";
   
   ?>
    <section class="content">
    <div class="box box-success col-sm-4">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?php echo base_url(); ?>cms/menu/almacenar">
        <div class="box-body">
           <div class="row">
                <div class="form-group <?php echo form_error('tipo_menu') == true ? 'has-error':''?>">
                    <label for="tipo_menu">Posición:</label>
                    <select class="form-control" id="tipo_menu" name="tipo_menu">
                        <option value="">Selecciona una opción</option>
                        <?php if(!empty($tipomenu)):?>
                          <?php foreach($tipomenu as $tm):?>
                            <option value="<?php echo $tm->id;?>" <?php echo (set_value('tipo_menu')==$tm->id)?'selected':''; ?> ><?php echo $tm->nombre;?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                    <?php echo form_error("tipo_menu","<span class='help-block'>","</span>");?>
                </div>
           </div>
      
          <div class="row">
                <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                    <label for="nombre">Título:</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del menu" value="<?php echo set_value('nombre'); ?>">
                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                </div>
          </div>

          <div class="row desplegableMenu ubicar">
                <div class="form-group">
                    <label for="ubicacion">Ubicar: 
                      <label class="radio-inline">
                        <input type="radio" name="ubicacion" value="1" checked>Después de
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="ubicacion" value="2">Antes de
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="ubicacion" value="3">Último
                      </label> 
                    </label>
                </div>
          </div>
          <div class="row desplegableMenu principal">
            <label for="orden_principal">Menú principal: </label>
            <select class="form-control" id="orden_menu_principal" name="orden_menu_principal" >
                <?php foreach($menuPrincipal as $mp):?>
                  <option value="<?php echo $mp->id;?>"><?php echo $mp->nombre;?></option>
                <?php endforeach;?>
            </select>
          </div>
          <div class="row desplegableMenu secundario">
            <label for="orden_principal">Menú secundario: </label>
            <select class="form-control" id="orden_menu_secundaria" name="orden_menu_secundaria" >
                <?php foreach($menuSecundario as $ms):?>
                  <option value="<?php echo $ms->id;?>"><?php echo $ms->nombre;?></option>
                <?php endforeach;?>
            </select>
          </div>
          <div class="row">
            <div class="form-group <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                <label for="cms_tipo_publicacion_id">Tipo de publicación a cargar:</label>
                <select class="form-control" id="cms_tipo_publicacion_id" name="cms_tipo_publicacion_id" <?php echo $activacion; ?> >
                  <option value="">Selecciona una opción</option>
                  <?php if(!empty($tiposPublicacion)):?>
                    <?php foreach($tiposPublicacion as $tp):?>
                      <option value="<?php echo $tp->id;?>" <?php echo (set_value('cms_tipo_publicacion_id')==$tp->id)?'selected':''; ?> ><?php echo $tp->nombre;?></option>
                    <?php endforeach;?>
                  <?php endif;?>
                </select>
                <?php echo form_error("cms_tipo_publicacion_id","<span class='help-block'>","</span>");?>
            </div>
          </div>

          <div class="row desplegable contenido" id="contenidoDiv">
              <div class="form-group">
                <label for="cms_publicacion_id">Seleccionar contenidos a asignar:</label>
                <?php if(!empty($contenidos)):?>
                  <select multiple="" class="form-control" style="height: 100px;" id="cms_publicacion_id" name="cms_publicacion_id[]" >
                      <?php foreach($contenidos as $c):?>
                        <option value="<?php echo $c->id;?>"><?php echo $c->nombre;?></option>
                      <?php endforeach;?>
                  </select>
                <?php else:?>
                  <span>No hay contenidos para seleccionar</span>
                <?php endif;?>
              </div>
              <label for="">Orden del contenido seleccionado</label>
              <table class="table table-striped table-bordered despleglable contenido" id="menu_contenido">
                <thead>
                  <tr>
                    <th>Contenido</th>
                    <th>Acciones <span class="btn btn-social-icon btn-dropbox"><i class="fa fa-sort-desc"></i></span><span> Bajar </span>
                          <span class=" btn btn-social-icon btn-google"><i class="fa fa-sort-asc"></i></span> <span> Subir </span>
                             <span class="btn btn-info"><i class="fa fa-close"></i></span><span> Deseleccionar</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
          </div>
          
          <div class="row desplegable contenido">
            <div class="form-group">
              <label for="slugArticulo2">Enlace hacia controlador:</label>
              <input type="text" name="slugArticulo2" id="slugArticulo2" class="form-control" placeholder="Por ejemplo: eventos" <?php echo $activacion; ?>>
            </div>
          </div>
          <div class="row desplegable enlace">
            <div class="form-group">
              <label for="slugArticulo">Enlace externo:</label>
              <input type="url" name="slugArticulo" id="slugArticulo" class="form-control" placeholder="http://www.enlaceexterno-prueba.com">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer btn-group pull-right">
          <a href="<?php echo base_url(); ?>cms/menu" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
          <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Guardar</span></button>
        </div>
    </form>
    </div>   
    <!-- /.box-body -->
    </section>	
</div>