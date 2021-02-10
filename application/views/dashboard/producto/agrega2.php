<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Producto <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Producto</a></li>
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
            <form action="<?php echo base_url().$_SESSION['modulo_string']; ?>/almacenar" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group<?php echo form_error('nombre') == true ? 'has-error':''?>">
                      <label for="nombre">(*)Título</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
                      <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group <?php echo form_error('descripcion') == true ? 'has-error':''?>">
                      <label for="descripcion">(*)Descripcion</label>
                      <textarea name="descripcion" id="descripcion" class="descripcion form-control"></textarea>
                  </div>
                  <div class="form-group<?php echo form_error('imagen') == true ? 'has-error':''?>">
                      <span class="btn btn-default btn-lg btn-file "><span class="far fa-image"> </span>
                          Seleccionar imagen de portada <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                      </span>
                      <div class="row" id="previsualizacion" style="margin:5px;">
                          <div class="col-sm-4">
                              <p>Actualmente no has seleccionado ninguna imagen para subir.</p>
                          </div>  
                      </div>
                  </div>           
                    
                </div>
                <div class="card-footer d-flex">
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
<!-- /.content-wrapper -->