


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Slider
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Slider</li>
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
              $url = base_url().'cms/slider/eliminar/'.$id;
              $btn = "Eliminar Registro";
              $class ="danger";
          break;
          case 'editar':
              $url = base_url().'cms/slider/editar/'.$id;
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
                    <label for="nombre">Título del Slider</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingreseun Titulo para el Slider" value="<?php echo $r->nombre; ?>">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Descripción del Slider</label> 
                    <textarea class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el contenido"><?php echo $r->descripcion; ?></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="Url">Url del Evento <sub>(Opcional)</sub></label> 
                    <input type="text" class="form-control" id="Url" name="Url" placeholder="http://ejemplopaginaweb.com" value="<?php echo $r->Url; ?>">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="statusSlider">Estado del Slider</label>
                    <select multiple class="form-control" name="statusSlider" id="statusSlider">
                        <?php  
                        if ($r->statusSlider == 'A'):
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
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
           </div>
     
        </div>

         <div class="box-footer">
            <button type="submit" class="btn btn-<?php echo $class;?>   pull-right"><?php echo $btn; ?></button>
        </div>
    </form>

    
<?php } ?>

</div>   
</div>
    </section>	
</div>