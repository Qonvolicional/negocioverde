<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Publicaciones
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Publicaciones</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
   
    <div class="box box-success col-sm-4">
    
    <form role="form" method="post" action="<?php echo base_url(); ?>cms/contenido/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
       <div class="row">
          <div class="col-sm">
              <div class="<?php echo $this->session->flashdata('alert_data'); ?>"><strong><?php echo $this->session->flashdata('mensaje'); ?></strong></div>
          </div>
        </div>
           <div class="row">
                <div class="form-group">
                    <label for="titulo">Título de la Publicación</label> 
                    <input type="hidden" name="url" id="url"  value="<?php echo base_url(); ?>">
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el Título de la Publicación" required="required">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="contenido">Cuerpo de la Publicación</label> 
                    <textarea class="editor form-control" id="contenido" name="contenido" placeholder="Ingrese el Contenido o Cuerpo" ></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="categoria">Categoria del Contenido</label>
                    <select multiple class="form-control" name="categoria" id="categoria" required="required">
                        <?php 

                            foreach ($categorias as $categoria) {
                               echo "<option value='$categoria->id'>$categoria->nombre_categoria</option>";
                            }


                         ?>
                    </select>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="imagen" class="btn btn-default"><i class="fa fa-file-image-o"> Agregar una imagen de al contenido </i></label>
                    <input type="file" name="imagen" id="imagen" class="form-control" style="display: none;" accept="image/*, png, .jpg">
                </div>
           </div>
           <div class="row">
             <div class="col-sm">
               <img src="" id="conenido_image">
             </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer pull-right">
            <a href="<?php echo base_url(); ?>cms/contenido" name="btn-atras" id="btn-atras" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-backward"> Cancelar</span></a>
            <button type="submit" class="btn btn-success "><i class="fa fa-save"> Guardar</i></button>
              
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>