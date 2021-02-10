
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patrocinadores
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms_patrocinadores">Patrocinadores</a></li>
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
                <a href="<?php echo base_url(); ?>cms_patrocinador/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar registro</a>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
	                <tr>
	                  <th>Nombre</th>
                    <th>Vista previa</th>
	                  <th>Fecha de creación</th>
                    <th>Última fecha de modificación</th>
                    <th>Acciones</th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($patrocinadores)): ?>
                		<?php foreach ($patrocinadores as $patrocinador ):?>
                      <?php 
                        $btn_estado = ($patrocinador->estado)?'btn btn-info':'btn btn-warning';
                        $span_estado = ($patrocinador->estado)?'fa fa-eye':'fa fa-eye-slash';
                      ?>
			                <tr>
                        <td>
                          <?php echo $patrocinador->nombre; ?>
                        </td>
                        <td>
                          <img class="img-fluid img-thumbnail img-responsive img-circle" style="height: 100px; width: 100px" src="<?php echo $patrocinador->url; ?>" alt="<?php echo $patrocinador->nombre; ?>">
                        </td>
                        <td>
                          <?php echo $patrocinador->fecha_creacion; ?>
                        </td>
                        <td>
                          <?php echo $patrocinador->fecha_modificacion; ?>
                        </td>
                        <td class="btn-centrar">
                          <a href="<?php echo base_url()?>cms_patrocinador/<?php echo $patrocinador->id;?>" class="btn btn-warning"><span class="fa fa-pencil"> </span> </a>
                            <a href="<?php echo base_url();?>cms_patrocinador/estado/<?php echo $patrocinador->id;?>" class="<?php echo $btn_estado; ?>"> <span class="<?php echo $span_estado; ?>"></span></a>
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