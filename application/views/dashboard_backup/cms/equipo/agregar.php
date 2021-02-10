<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Equipo de Trabajo
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li><a href="<?php echo base_url(); ?>cms/equipo"><i class="fa fa-dashboard"></i> Equipo de Trabajo</a></li>
        <li class="active">Nuevo Miembro</li>
      </ol>
    </section>

    <section class="content">
    <div class="box box-success col-sm-4">
    

    <form role="form" method="post" action="<?php echo base_url(); ?>cms/equipo/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Nombre del Funcionario</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Funcionario"  required="required">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Cargo o Rol</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="cargo o rol"  required="required">
                    <!-- <input type="text" class="editor form-control" id="descripcion" name="descripcion"  /> -->
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required="required" accept="image/*,.jpg,.png">
                </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar Miembro</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>