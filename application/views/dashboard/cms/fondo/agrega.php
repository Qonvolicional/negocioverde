<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Convocatorias
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Convocatorias</li>
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


    <form role="form" method="post" action="<?php echo base_url(); ?>cms/convocatorias/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="titulo">Título de la Convocatoria</label> 
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el Nombre del Menu">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="contenido">Cuerpo de la Convocatoria</label> 
                    <textarea class="editor form-control" id="contenido" name="contenido" placeholder="Ingrese el contenido"></textarea>
                </div>
           </div>


           <div class="row">
                <div class="form-group">
                    <label for="imagen">Documento Base de la Convocatoria <sub>Términos de Referencia</sub></label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
           </div>
     
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar Convocatoria</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>