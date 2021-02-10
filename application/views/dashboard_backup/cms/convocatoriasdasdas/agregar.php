<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Slider
        <small>Agregar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Slider</li>
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


    <form role="form" method="post" action="<?php echo base_url(); ?>cms/slider/guardar" enctype="multipart/form-data">
    
     <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Título del Slider</label> 
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingreseun Titulo para el Slider">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Descripción del Slider</label> 
                    <textarea class="editor form-control" id="descripcion" name="descripcion" placeholder="Ingrese el contenido"></textarea>
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="Url">Url del Evento <sub>(Opcional)</sub></label> 
                    <input type="text" class="form-control" id="Url" name="Url" placeholder="http://ejemplopaginaweb.com">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="statusSlider">Estado del Slider</label>
                    <select multiple class="form-control" name="statusSlider" id="statusSlider">
                         <option value='A'>Activo</option>
                         <option value='I'>Inactivo</option>
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
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-save"></i> Guardar Slider</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>