
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tipo de perfil <small class="text-sm">Editar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>perfiles"><i class="fa fa-dashboard"></i> Tipo de perfiles</a></li>
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
              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición - <small class="badge badge-primary"><?php echo $perfil->nombre; ?></small></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."modulo/"; ?>">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    
                 </div>
            <?php endif;?>
            <form action="<?php echo base_url();?>perfiles/actualizar" method="POST">
                <input type="hidden" value="<?php echo $perfil->id;?>" name="rol_id">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo form_error('nombre') == true ? 'has-error':''?>">
                            <label for="nombre">(*)Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $perfil->nombre; ?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="form-group">
                            <label for="">Información adicional</label>
                            <div >
                              <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="usuario_acceso" name="usuario_acceso" <?php echo ($perfil->usuario_acceso)?'checked':''; ?>>
                                <label class="custom-control-label" for="usuario_acceso" >Permitir acceso a sesión</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer d-flex mb-2 mr-2">
                <div class="ml-auto btn-group">
                  <a href="<?php echo base_url(); ?>perfiles" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
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
