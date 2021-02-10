<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Fondos de Inversión
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Fondos de Inversión</li>
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


    <form role="form" method="post" action="<?php echo base_url(); ?>cms/fondos/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Título del Fondo de Inversión</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" required="required" placeholder="Nombre del Fondo">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Descripcion del Fondo de Inversión</label> 
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required="required"placeholder="Detalle del Fondo">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Link del Fondo de Inversión</label> 
                    <input type="text" class="form-control" id="url" name="url"  required="required" placeholder="ejm: https://fondodeinvesion.com.co">
                </div>
           </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar Fondo de Inversión</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>