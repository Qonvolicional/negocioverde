<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Documetos
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms/documentos"> Publicación de Documentos</a></li>
        <li class="active">Agregar</li>
      </ol>
    </section>

    <section class="content">
    <div class="box box-success col-sm-12">
    <div class="box-header">
        <h3 class="box-title">
           <?php echo validation_errors(); ?>
        </h3>
    </div>
    
    
    <form role="form" method="post" id="form" action="<?php echo base_url(); ?>cms/documentos/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
          <div class="row">
          <div class="col-sm">
              <div class="<?php echo $this->session->flashdata('alert_data'); ?>"><strong><?php echo $this->session->flashdata('mensaje'); ?></strong></div>
          </div>
        </div>
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Nombre del Documento</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre del Documento">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Detalles del Documento</label> 
                    <input type="text" class="form-control" id="descripcion" name="descripcion"placeholder="Detalles del Documento">
                </div>
           </div>

       
           <div class="row">
                <div class="form-group">
                  
                    <label for="documento" id="lbldocument" class="btn btn-default"> <span class="fa fa-file-image-o"></span> Agrega un Documento</label>
                    <input type="file" name="imagen" id="documento" class="form-control"  accept=".pdf" style="display: none;">
                </div>
                <div class="col-sm-12"> 
                    <ul id="lista-doc">
                    </ul>
                    <img src="" id="view-document" />
                </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer pull-right">
           <a href="<?php echo base_url(); ?>cms/documentos" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar y Publicar Documento</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>