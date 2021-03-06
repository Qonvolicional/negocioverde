<div class="content-wrapper">
	<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Menu <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Menu</a></li>
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
            <form role="form" method="post" action="<?php echo base_url().$_SESSION['modulo_string']; ?>/almacenar">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-4 <?php echo form_error('tipo_menu') == true ? 'has-error':''?>">
                    <label for="menu_padre">(*)Pertenecerá a un menu?</label>
                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="menu_padre" name="menu_padre" required>
                        <option value="">Selecciona una opción</option>
                        <option value="0">(No aplica)</option>
                        <?php if(!empty($menupadre)):?>
                          <?php foreach($menupadre as $mp):?>
                            <option value="<?php echo $mp->id;?>" <?php echo (set_value('menu_padre')==$mp->id)?'selected':''; ?> ><?php echo $mp->nombre;?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                    <?php echo form_error("menu_padre","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group col-4 <?php echo form_error('tipo_menu') == true ? 'has-error':''?>">
                    <label for="tipo_menu">(*)Tipo de menu</label>
                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="tipo_menu" name="tipo_menu" required>
                        <option value="">Selecciona una opción</option>
                        <?php if(!empty($tipomenu)):?>
                          <?php foreach($tipomenu as $tm):?>
                            <option value="<?php echo $tm->id;?>" <?php echo (set_value('tipo_menu')==$tm->id)?'selected':''; ?> ><?php echo $tm->nombre;?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                    <?php echo form_error("tipo_menu","<span class='help-block'>","</span>");?>
                  </div>
                  
                  <div class="form-group col-4 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                    <label for="nombre">(*)Título</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del menu" value="<?php echo set_value('nombre'); ?>" required>
                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                  </div>
                </div>
                
                <div class="row desplegableMenu ubicar">
                      <div class="form-group col-4">
                          <label for="ubicacion">(*)Ubicar </label>
                          <div class="">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="ubicacion" id="inlineRadio1" value="1" checked>
                              <label class="form-check-label" for="inlineRadio1">Después de</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="ubicacion" id="inlineRadio2" value="2">
                              <label class="form-check-label" for="inlineRadio2">Antes de</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="ubicacion" id="inlineRadio3" value="3">
                              <label class="form-check-label" for="inlineRadio3">Último</label>
                            </div>
                          </div>
                      </div>

                      <div class="form-group col-8 desplegableMenu principal">
                        <label for="posicion">Posición (*)</label>
                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="posicion" name="posicion" required>
                            <?php foreach($menuPrincipal as $mp):?>
                              <option value="<?php echo $mp->id;?>"><?php echo $mp->nombre;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>

                      <!-- <div class="desplegableMenu col-8 secundario form-group">
                        <label for="orden_principal">Menú secundario </label>
                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="orden_menu_secundaria" name="orden_menu_secundaria" >
                            <?php foreach($menuSecundario as $ms):?>
                              <option value="<?php echo $ms->id;?>"><?php echo $ms->nombre;?></option>
                            <?php endforeach;?>
                        </select>
                      </div> -->
                </div>
                
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-group <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                    <label for="cms_tipo_publicacion_id">(*)Tipo de publicación a cargar</label>
                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="cms_tipo_publicacion_id" name="cms_tipo_publicacion_id" required>
                      <option value="">Selecciona una opción</option>
                      <?php if(!empty($tiposPublicacion)):?>
                        <?php foreach($tiposPublicacion as $tp):?>
                          <option value="<?php echo $tp->id;?>" <?php echo (set_value('cms_tipo_publicacion_id')==$tp->id)?'selected':''; ?> ><?php echo $tp->nombre;?></option>
                        <?php endforeach;?>
                      <?php endif;?>
                    </select>
                    <?php echo form_error("cms_tipo_publicacion_id","<span class='help-block'>","</span>");?>
                </div>
                

                <div class="row desplegable contenido" id="contenidoDiv">
                  <div class="form-group col-5">
                    <label for="cms_publicacion_id">Seleccionar contenidos a asignar</label>
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
                  <div class="form-group col-7">
                    <label for="">Orden del contenido</label>
                    <table class="table table-striped table-bordered despleglable contenido" id="menu_contenido">
                      <thead>
                        <tr class="text-sm">
                          <th>Contenido</th>
                          <th>Acciones (<small><span class="btn btn-primary btn-sm"><i class="fas fa-sort-numeric-down"></i></span><span> Bajar </span>
                                <span class=" btn btn-danger btn-sm"><i class="fas fa-sort-numeric-up"></i></span> <span> Subir </span>
                                   <span class="btn btn-info btn-sm"><i class="fas fa-minus-circle"></i></span><span> Deseleccionar</span></small>)
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              
                <div class="desplegable contenido">
                  <div class="form-group">
                    <label for="slugArticulo2">Enlace hacia controlador</label>
                    <input type="text" name="slugArticulo2" id="slugArticulo2" class="form-control" placeholder="Por ejemplo: eventos">
                  </div>
                </div>
                <div class="desplegable enlace">
                  <div class="form-group">
                    <label for="slugArticulo">Enlace externo</label>
                    <input type="url" name="slugArticulo" id="slugArticulo" class="form-control" placeholder="http://www.enlaceexterno-prueba.com">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="card-footer d-flex mb-2 mr-2">
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