
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>/rol">Rol</a></li>
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
              <a href="<?php echo base_url(); ?>rol/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar rol</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Nombre</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($roles)): ?>
                		<?php foreach ($roles as $rol ):?>
                    <?php 
                        $btn_estado = ($rol->estado)?'btn btn-info':'btn btn-danger';
                        $span_estado = ($rol->estado)?'fa fa-eye':'fa fa-eye-slash';
                    ?> 
			                <tr>
			                  <td>
                          <?php echo $rol->nombre; ?>
                        </td>
			                  <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url()?>rol/editar/<?php echo $rol->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a href="<?php echo base_url();?>rol/estado/<?php echo $rol->id;?>" class="<?php echo $btn_estado; ?>"><span class="<?php echo $span_estado; ?>"></span></a>
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