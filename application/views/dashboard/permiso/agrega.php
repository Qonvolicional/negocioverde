<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permiso <small class="text-sm">Gestión</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control estadístico</a></li>
              <li class="breadcrumb-item active">Permiso</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content-header -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Gestión de permisos </h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
            <form role="form" class="col-md-offset-1 col-md-8">
              <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Tipo de rol:</label>
                    <div class="col-sm-10">
                        <select name="rol_id" id="rol_id" class="form-control permisos">
                            <option value="" selected>Seleccione una opción</option>
                            <?php if(!empty($roles)):?>
                                <?php foreach($roles as $rol):?>
                                    <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre;?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row modulos" id="modulos" style="display: none;">
                    <label class="col-sm-2 col-form-label">Modulos:</label>
                    <div class="col-10">
                    <?php if(!empty($modulos)): ?>
                      <?php foreach ($modulos as $m): ?> 
                        <!--Inicio-->
                        <div class="form-check">  
                          <label class="checkbox-inline d-flex">
                            <input class="form-check-input modulo" type="checkbox" name="modulo_id<?php echo $m['id'];?>" id="modulo_id<?php echo $m['id'];?>" value="<?php echo $m['id']; ?>" ><?php echo $m['nombre']; ?>
                            
                            <?php if(!empty($m['hijos'])): ?>
                                    <a class="btn btn-danger btn-sm ml-auto btn-collapse" data-toggle="collapse" href="#hijos<?php echo $m['id']; ?>">
                                        <i class='fas fa-minus'></i>
                                    </a>
                                </label>
                                <div class="ml-3 item-hijos" id="hijos<?php echo $m['id']; ?>">
                                    <?php foreach($m['hijos'] as $h):?>
                                        <div class="form-check">
                                            <label class="checkbox-inline">
                                                <input class="form-check-input modulo" type="checkbox" name="modulo_id<?php echo $h['id'];?>" id="modulo_id<?php echo $h['id']?>" value="<?php echo $h['id']; ?>"> <?php echo $h['nombre']; ?>
                                            </label>
                                        </div> 
                                    <?php endforeach; ?>
                                </div>
                            <?php else:?>
                                 </label>
                            <?php endif;?>
                        </div>                     
                        <!--Cierre-->
                      <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer d-flex mb-2 mr-2">
                <div class="ml-auto btn-group">
                  <a href="<?php echo base_url(); ?>" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
                  <button type="submit" class="btn bg-gradient-danger btn-flat active" id="btn-guardarModuloRol"><span class="fa fa-save"> Guardar</span></button>
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