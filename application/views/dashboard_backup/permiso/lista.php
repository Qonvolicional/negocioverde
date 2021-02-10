
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modulos
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>/modulo">Módulo</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box box-success">
            <div class="box-header">
              <!-- <div>
                <b style="font-size: 1.1em;">Acciones</b>
              </div>
              <span style="color: skyblue;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Ver Registro
              <span style="color: orange;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Editar Registro
              <span style="color: red;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Eliminar Registro -->
              <a href="<?php echo base_url(); ?>modulo/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar Módulo</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Nombre</th>
                    <th>Controlador</th>
                    <th>Fecha de registro</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($modulos)): ?>
                		<?php foreach ($modulos as $modulo ):?> 
			                <tr>
			                  <td>
                          <?php echo $modulo->nombre; ?>
                        </td>
                        <td>
                          <?php echo $modulo->descripcion; ?>
                        </td>
                        <td>
                          <?php echo $modulo->fecha_registro; ?>
                        </td>
			                  <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url()?>modulo/editar/<?php echo $modulo->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a href="<?php echo base_url();?>modulo/eliminar/<?php echo $modulo->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                          </div>
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