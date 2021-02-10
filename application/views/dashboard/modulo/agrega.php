<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Módulo <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>modulo"><i class="fa fa-dashboard"></i> Módulo</a></li>
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
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."modulo/"; ?>">
            <form role="form" method="post" action="<?php echo base_url();?>modulo/almacenar">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-4 <?php echo form_error('tipo_menu') == true ? 'has-error':''?>">
                    <label for="modulo_padre">(*) Pertenecerá a un módulo?</label>
                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="modulo_padre" name="modulo_padre" required>
                        <option value="">Selecciona una opción</option>
                        <option value="0">(No aplica)</option>
                        <?php if(!empty($modulospadre)):?>
                          <?php foreach($modulospadre as $mp):?>
                            <option value="<?php echo $mp->id;?>" <?php echo (set_value('modulo_padre')==$mp->id)?'selected':''; ?> ><?php echo $mp->nombre;?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                    <?php echo form_error("modulo_padre","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group col-8 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                    <label for="nombre">(*) Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Título del módulo">
                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                  </div>
                </div>
                
                <div class="row desplegableModulo ubicar">
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
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"rows="2" placeholder="Breve descripción del objetivo del módulo"></textarea>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="controlador">Controlador:</label>
                        <input type="text" class="form-control" id="controlador" name="controlador" placeholder="Ruta o url del módulo.">
                        <?php echo form_error("controlador","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group col-md-6 <?php echo form_error('icon') == true ? 'has-error':''?>">
                        <label for="icon">Icono:</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Clase de fontawesome">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Información adicional</label>
                    <div >
                        <div class="custom-control custom-switch custom-control-inline">
                          <input type="checkbox" class="custom-control-input" id="modulo_defecto" name="modulo_defecto">
                          <label class="custom-control-label" for="modulo_defecto">Módulo por defecto</label>
                        </div>
                        <div class="custom-control custom-switch custom-control-inline">
                          <input type="checkbox" class="custom-control-input" id="exclusivo_administracion" name="exclusivo_administracion">
                          <label class="custom-control-label" for="exclusivo_administracion">Exclusividad del Super Administrador</label>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer d-flex mb-2 mr-2">
                <div class="ml-auto btn-group">
                  <a href="<?php echo base_url(); ?>modulo" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
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