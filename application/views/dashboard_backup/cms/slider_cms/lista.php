
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms_sliders">Sliders</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->

          <div class="box box-success">
              <div class="box-header">
                <a href="<?php echo base_url(); ?>cms_slider/agregar" class="btn btn-social btn-success col-sm-3 pull-right"><i class="fa fa-plus"></i>Nueva Publicacion
                     </a>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
	                <tr>
	                  <th>Título</th>
                    <th>Vista previa</th>
	                  <th>Fecha de creación</th>
                    <th><p>Acciones</p>
                     <span class="btn btn-social-icon btn-dropbox"><i class="fa fa-pencil"></i></span><span>Editar</span>
                       <span class="btn btn-info"><i class="fa fa-eye"></i></span><span>Publico</span>
                       <span class="btn btn-warning"><i class="fa fa-eye-slash"></i></span><span>Privatdo</span>
                     </th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($sliders)): ?>
                		<?php foreach ($sliders as $slider ):?>
                      <?php 
                        $btn_estado = ($slider->estado)?'btn btn-info':'btn btn-warning';
                        $span_estado = ($slider->estado)?'fa fa-eye':'fa fa-eye-slash';
                      ?>
			                <tr>
                        <td>
                          <?php echo $slider->nombre; ?>
                        </td>
                        <td>
                          <img class="img-fluid img-thumbnail img-responsive" style="max-height: 150px; max-width: 150px" src="<?php echo $slider->url_imagen; ?>" alt="<?php echo $slider->nombre; ?>">
                        </td>
                        <td>
                          <?php echo $slider->fecha_creacion; ?>
                        </td>
                        <td class="btn-centrar">
                          <a href="<?php echo base_url()?>cms_slider/<?php echo $slider->id;?>" class="btn btn-social-icon btn-dropbox"><span class="fa fa-pencil"> </span> </a>
                            <a href="<?php echo base_url();?>cms_slider/estado/<?php echo $slider->id;?>" class="<?php echo $btn_estado; ?>"> <span class="<?php echo $span_estado; ?>"></span></a>
                        </td>
			              	</tr>
	              		<?php endforeach; ?>
	              	<?php endif; ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->