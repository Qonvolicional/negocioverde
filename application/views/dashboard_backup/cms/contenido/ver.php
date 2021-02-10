


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Contenidos
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Contenido</a></li>
        <li class="active">Modificar</li>
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
              $url = base_url().'cms/contenido/eliminar/'.$id;
              $btn = "Eliminar Registro";
              $class ="danger";
          break;
          case 'editar':
              $url =
              $btn = "Guardar Cambios";
              $class="success";
          break;
      }
                  
    foreach ($registro as $r) 
    { 

    ?>

    <form role="form" method="post" action="<?php echo  base_url().'cms/contenido/editar/'.$id; ?>" enctype="multipart/form-data">
    
     <div class="box-body">
        <div class="row">
          <div class="col-sm">
              <div class="<?php echo $this->session->flashdata('alert_data'); ?>"><strong><?php echo $this->session->flashdata('mensaje'); ?></strong></div>
          </div>
        </div>
           <div class="row">

                <div class="form-group">
                    <label for="titulo">Título de la Publicación</label> 
                    <input type="hidden" name="url" id="url" value="<?php echo base_url(); ?>">
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el Nombre del Menu" value="<?php echo $r->titulo; ?>" required="required">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="contenido">Cuerpo de la Publicación</label> 
                    <textarea class="editor form-control" id="contenido" name="contenido" placeholder="Ingrese el contenido" required="required"><?php echo $r->cuerpo; ?></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="categoria">Categoria del Contenido </label>
                    <select multiple class="form-control" name="categoria" id="categoria" required="required">
                         <?php 

                              foreach ($categorias as $categoria) {
                                  if ($r->id_categoria == $categoria->id){
                                      $opc = "selected";
                                      
                                  }else{$opc ="";}
                               echo "<option value='$categoria->id' $opc>$categoria->nombre_categoria</option>";
                              }
                          ?>
                    </select>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="imagen">Imagen de la Publicación</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
           </div>
     
        </div>
       
        <div class="box-footer pull-right">
          <a href="<?php echo base_url(); ?>cms/contenido" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
            <button type="submit" class="btn btn-<?php echo $class;?>   pull-right"><i class="fa fa-save"></i> Guardar Cambios</button>
        </div>
    </form>

    
<?php } ?>

</div>   
</div>
    </section>	
</div>