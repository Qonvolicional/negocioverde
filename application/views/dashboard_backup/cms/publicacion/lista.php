
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Publicaciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms_publicaciones">Publicaciones</a></li>
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
                <a href="<?php echo base_url(); ?>cms_publicacion/agregar" class="btn btn-social btn-success col-sm-3 pull-right"><i class="fa fa-plus"></i>Nueva Publicacion
                     </a>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
	                <tr>
                    <th>Tipo de publicación</th>
	                  <th>Título</th>
	                  <th>Fecha de creación</th>
                    <th>
                      <p>Acciones</p>
                       <span class="btn btn-social-icon btn-dropbox"><i class="fa fa-pencil"></i></span><span>Editar</span>
                       <span class="btn btn-info"><i class="fa fa-eye"></i></span><span>PÚblico</span>
                       <span class="btn btn-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span>
                    </th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($publicaciones)): ?>
                		<?php foreach ($publicaciones as $publicacion ):?>
                      <?php 
                        $btn_estado = ($publicacion->estado)?'btn btn-info':'btn btn-warning';
                        $span_estado = ($publicacion->estado)?'fa fa-eye':'fa fa-eye-slash';
                      ?>
			                <tr>
			                  <td>
			                      <span class="<?php echo $publicacion->icono; ?>"> </span>
                          <?php echo $publicacion->tipo_publicacion; ?>
                        </td>
                        <td>
                          <?php echo $publicacion->nombre; ?>
                        </td>
                        <td>
                          <?php echo $publicacion->fecha_creacion; ?>
                        </td>
                        <td class="btn-centrar">
                          <a href="<?php echo base_url()?>cms_publicacion/<?php echo $publicacion->id;?>" class="btn btn-social-icon btn-dropbox"><span class="fa fa-pencil"> </span> </a>
                            <a href="<?php echo base_url();?>cms_publicacion/estado/<?php echo $publicacion->id;?>" class="<?php echo $btn_estado; ?>"> <span class="<?php echo $span_estado; ?>"></span></a>
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