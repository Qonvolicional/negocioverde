<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Eventos
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Eventos</li>
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


    <form role="form" method="post" action="<?php echo base_url(); ?>cms/eventos/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombreevento">Título del Evento</label> 
                    <input type="text" class="form-control" id="nombreevento" name="nombreevento" placeholder="Ingrese el Nombre del Menu">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Descripción del Evento</label> 
                    <textarea class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el contenido"></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group col-md-6">
                    <label for="fechaevento">Fecha del Evento</label> 
                    <input type="date" class="form-control" id="fechaevento" name="fechaevento" placeholder="Ingrese el Nombre del Menu">
                </div>

                <div class="form-group  col-md-6">
                    <label for="horaevento">Hora del Evento</label> 
                    <input type="text" class="form-control" id="horaevento" name="horaevento" placeholder="00:00 AM - 00:00 AM">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="url">Url del Evento</label> 
                    <input type="text" class="form-control" id="url" name="url" placeholder="http://direccionopcional.com">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="estado">Estado del Evento</label>
                    <select multiple class="form-control" name="estado" id="estado">
                        <?php  foreach ($categorias as $categoria): ?>
                              <!--  <option value='$categoria->id'>$categoria->nombre_categoria</option> -->
                        <?php endforeach; ?>
                         <option value='A'>Activo</option>
                         <option value='I'>Inactivo</option>
                    </select>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="imagen">Imagen del Evento</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar Evento</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>