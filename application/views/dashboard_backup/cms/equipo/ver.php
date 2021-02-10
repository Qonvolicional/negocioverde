


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Equipo de Trabajo
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms/equipo"><i class="fa fa-dashboard"></i> Equipo de Trabajo</a></li>
        <li class="active">Modificar</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
   
    <div class="box box-success col-sm-4">
   
   

    <form role="form" method="post" action="<?php  echo base_url().'cms/equipo/editar'; ?>" enctype="multipart/form-data">

        <div class="box-body">
          <div class="row">
            <div class="col-sm text-center">
              <div class="<?php echo $this->session->flashdata('alert_data'); ?>"><strong><?php echo $this->session->flashdata('mensaje'); ?></strong></div>
               <img src="<?php echo base_url().$registro->fotografia; ?>" style="width: 150px;height: 150px;border-radius: 100%; border:4px solid green; margin: auto; padding: 4px;">
            </div>
          </div>
           <div class="row">
                <div class="form-group">
                    <label for="nombre">Nombre del Funcionario</label> 
                    <input type="hidden" value="<?php echo $registro->id ?>" name="miembro_id">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingreseun Titulo para el Slider" value="<?php echo $registro->nombre; ?>" required="required">
                </div>
           </div>

            <div class="row">
                <div class="form-group">
                    <label for="descripcion">Cargo o Rol</label> 
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingreseun Titulo para el Slider" value="<?php echo $registro->descripcion; ?>" required="required">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="imagen">Seleccionar una Imagen<?php echo $registro->fotografia; ?></label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*,.jpg,.png">
                </div>
           </div>
     
        </div>

         <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">Modificar registro</button>
        </div>
    </form>

</div>   
</div>
    </section>	
</div>