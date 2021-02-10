


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Publicación de Documentos
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li> <a href="<?php echo base_url(); ?>cms/documentos">Publicación de Documentos</a></li>
         <li class="active">Modificar</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
   
    <div class="box box-success col-sm-4">
       
    <?php 
      switch ($acc) 
      {
          case 'eliminar':
              $url = base_url().'cms/documentos/eliminar/'.$id;
              $btn = "Eliminar Registro";
              $class ="danger";
          break;
          case 'editar':
              $url = base_url().'cms/documentos/editar/'.$id;
              $btn = "Guardar Cambios";
              $class="success";
          break;
      }
                  
    foreach ($registro as $r) 
    { 
    ?>

    <form role="form" method="post" action="<?php echo base_url()."cms/documentos/editar/".$id; ?>" enctype="multipart/form-data">

        <div class="box-body">
            <div class="row">
               <div class="col-sm text-center">
                   <div class="<?php echo $this->session->flashdata('alert_data'); ?>"><strong><?php echo $this->session->flashdata('mensaje'); ?></strong></div>
               </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="nombre">Nombre del Documento</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $r->nombre; ?>">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Descripcion del Documento</label> 
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  value="<?php echo $r->descripcion; ?>">
                </div>
           </div>

       
           <div class="row">
                <div class="form-group">
                    <label for="documento"  class="btn btn-default"> <span class="fa fa-file-image-o"> </span> Agrega un Documento</label>
                    <input type="file" name="imagen" id="documento" class="form-control"  accept=".pdf" style="display: none;">
                </div>
                <div class="col-sm-12">
                    <ul id="lista-doc">
                      <?php if(!is_null($r->Url)): ?>
                          <li><a href="<?php echo base_url().$r->Url; ?>"> <?php 
                          $nombre =  explode("/", $r->Url);
                          echo $nombre[count($nombre) - 1];
                           ?> </a></li>
                      <?php endif; ?>
                    </ul>
                    <img src="" id="view-document" />
                </div>
           </div>
     
        </div>

         <div class="box-footer pull-right">
             <a href="<?php echo base_url(); ?>cms/documentos" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
            <button type="submit" class="btn btn-<?php echo $class;?>   pull-right"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </form>

    
<?php } ?>

</div>   
</div>
    </section>	
</div>