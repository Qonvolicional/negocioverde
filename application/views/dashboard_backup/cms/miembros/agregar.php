<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Miembros
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Miembros</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
    </div>
    

    <div class="box box-success col-sm-4">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>


    <form role="form" method="post" action="<?php echo base_url(); ?>cms/miembros/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Título del Imagen</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingreseun Nombre del Miembro">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Título del Imagen</label> 
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingreseun el Cargo o ROl">
                </div>
           </div>

           <!--  <div class="row">
                <div class="form-group">
                    <label for="descripcion">Descripción de la Imagen</label> 
                    <input type="text" class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el Cargo o Rol">
                   
                </div>
           </div> -->

           <div class="row">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
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