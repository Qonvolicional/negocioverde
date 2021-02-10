


<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Patrocinadores
        <small>Ver | Editar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms/patrocinadores">Patrocinadores</a></li>
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
      
                  
    foreach ($registro as $r) 
    { 

    ?>

    <form role="form" method="post" action="<?php echo  base_url().'cms/patrocinadores/editar'; ?>" enctype="multipart/form-data">

        <div class="box-body">
          
            <div class="row">
                <div class="col-sm text-center">  
                <div class="<?php echo $this->session->flashdata('alert'); ?>"><strong><?php echo $this->session->flashdata('alert_message'); ?></strong>
        
                </div>
                <img src="<?php echo base_url().$r->Url; ?>" style="width: 100px;height: 100px;border-radius: 100%; border:4px solid green; margin: auto; padding: 4px;">
              </div>
                <div class="form-group">
                    <label for="nombre">Nombre del Patrocinador</label> 
                    <input type="hidden" name="patrocinador_id" value="<?php echo $id; ?>">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $r->nombre; ?>" required="required">
                </div>
           </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombre">Descripcion del Patrocinador</label> 
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  value="<?php echo $r->descripcion; ?>" required="required">
                </div>
           </div>

       
           <div class="row">
                <div class="form-group">
                    <label for="imagen">Logo</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*, .jpg, .png"  >
                </div>
           </div>
     
        </div>

         <div class="box-footer">
            <button type="submit" class="btn btn-success  pull-right">Modificar datos</button>
        </div>
    </form>

    
<?php } ?>

</div>   
</div>
    </section>	
</div>