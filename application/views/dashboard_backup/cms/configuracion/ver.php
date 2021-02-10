


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Eventos
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Eventos</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
   
    <div class="box box-success col-sm-4">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>
   
    <?php 
      switch ($acc) 
      {
          case 'eliminar':
              $url = base_url().'cms/eventos/eliminar/'.$id;
              $btn = "Eliminar Registro";
              $class ="danger";
          break;
          case 'editar':
              $url = base_url().'cms/eventos/editar/'.$id;
              $btn = "Guardar Cambios";
              $class="success";
          break;
      }
                  
    foreach ($registro as $r) 
    { 

    ?>

     <form role="form" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombreevento">Título del Evento</label> 
                    <input type="text" class="form-control" id="nombreevento" name="nombreevento" placeholder="Ingrese el Nombre del Menu" value="<?php echo $r->nombreEvento; ?>">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Descripción del Evento</label> 
                    <textarea class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el contenido"><?php echo $r->descripcion; ?></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group col-md-6">
                    <label for="fechaevento">Fecha del Evento</label> 
                    <input type="date" class="form-control" id="fechaevento" name="fechaevento" placeholder="Ingrese el Nombre del Menu" value="<?php echo $r->fechaEvento; ?>">
                </div>

                <div class="form-group  col-md-6">
                    <label for="horaevento">Hora del Evento</label> 
                    <input type="text" class="form-control" id="horaevento" name="horaevento" placeholder="00:00 AM - 00:00 AM" value="<?php echo $r->horaEvento; ?>">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="url">Url del Evento</label> 
                    <input type="text" class="form-control" id="url" name="url" placeholder="http://direccionopcional.com" value="<?php echo $r->Url; ?>">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="estado">Estado del Evento</label>
                    <select multiple class="form-control" name="estado" id="estado">
                        <?php  
                          if ($r->estado == 'A'):
                          ?>
                            <option value='A' selected>Activo</option>
                            <option value='I'>Inactivo</option>
                          <?php
                          else:
                              ?>
                            <option value='A'>Activo</option>
                            <option value='I' selected>Inactivo</option>
                          <?php endif; ?>
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
            <button type="submit" class="btn btn-<?php echo $class;?>   pull-right"><?php echo $btn; ?></button>
        </div>
    </form>

    
<?php } ?>

</div>   
</div>
    </section>	
</div>