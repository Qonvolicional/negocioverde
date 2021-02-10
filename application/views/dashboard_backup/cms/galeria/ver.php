


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Galeria
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Galeria</li>
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
              $url = base_url().'cms/galeria/eliminar/'.$id;
              $btn = "Eliminar Registro";
              $class ="danger";
          break;
          case 'editar':
              $url = base_url().'cms/galeria/editar/'.$id;
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
                    <label for="descripcion">Descripción</label> 
                    <textarea class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el contenido"><?php echo $r->descripcion; ?></textarea>
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