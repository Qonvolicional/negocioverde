<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Patrocinadores
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li><a href="<?php echo base_url(); ?>cms/patrocinadores">Patrocinadores</a></li>
        <li class="active">Agregar</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-success col-sm-4">
  

    <form role="form" method="post" action="<?php echo base_url(); ?>cms/patrocinadores/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
             <div class="col-sm">  
                <div class="<?php echo $this->session->flashdata('alert'); ?>"><strong><?php echo $this->session->flashdata('alert_message'); ?></strong></div>
              </div>
                <div class="form-group">
                    <label for="nombre">Nombre del Patrocinador</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre"  required="required" placeholder="Nombre del Patrocinador">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Descripcion del Patrocinador</label> 
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Detalles del Patrocinador">
                </div>
           </div>

       
           <div class="row">
                <div class="form-group">
                    <label for="imagen">Logo del Patrocinador</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required="required">
                </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar y Publicar Patrocinador</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
    </section>	
</div>