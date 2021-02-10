
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Verificación
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>/verificador">Verificador</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box box-success">
            <!-- <div class="box-header">
              <div>
                <b style="font-size: 1.1em;">Acciones</b>
              </div>
              <span style="color: skyblue;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Ver Registro
              <span style="color: orange;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Editar Registro
              <span style="color: red;"><i class="fa fa-circle fa-sm"></i></span>
              <span>Eliminar Registro
              
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <!-- nav-tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">VERIFICADORES</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab">ASIGNACIÓN DE APLICACIÓN DE CRITERIO</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box-header">
                      <a href="<?php echo base_url(); ?>verificador/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar Verificador</a>
                    </div>
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nombre de Verificador</th>
                            <th>Entidad</th>
                            <th>Área</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($verificadores)): ?>
                            <?php foreach ($verificadores as $verificador ):?> 
                              <?php 
                                $btn_estado_v = ($verificador->estado)?'btn btn-info':'btn btn-danger';
                                $span_estado_v = ($verificador->estado)?'fa fa-eye':'fa fa-eye-slash';
                              ?>
                              <tr>
                                <td>
                                  <?php echo $verificador->nombre; ?>
                                </td>
                                <td>
                                 <?php echo $verificador->entidad; ?>
                                </td>
                                <td>
                                  <?php echo $verificador->area; ?>
                                </td>
                                <td>
                                  <?php echo $verificador->cargo; ?>
                                </td>
                                <td>
                                  <div class="btn-group">
                                    <a href="<?php echo base_url()?>verificador/<?php echo $verificador->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                    <a href="<?php echo base_url();?>verificador/estadoVerificador/<?php echo $verificador->id;?>" class="<?php echo $btn_estado_v; ?>"><span class="<?php echo $span_estado_v; ?>"></span></a>
                                  </div>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_2">
                    <div class="box-header">
                      <a href="<?php echo base_url(); ?>verificador/asignar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Asignación de aplicación de criterios</a>
                    </div>
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nombre de Verificador</th>
                            <th>Emprendimiento</th>
                            <th>Fecha de asignación</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($verificaciones)): ?>
                            <?php foreach ($verificaciones as $verificacion ):?>
                            <?php 
                              $btn_estado_a = ($verificacion->estado)?'btn btn-info':'btn btn-danger';
                              $span_estado_a = ($verificacion->estado)?'fa fa-eye':'fa fa-eye-slash';
                            ?> 
                              <tr>
                                <td>
                                  <?php echo $verificacion->nombre; ?>
                                </td>
                                <td>
                                 <?php echo $verificacion->emprendimiento; ?>
                                </td>
                                <td>
                                  <?php echo $verificacion->fecha_asignacion; ?>
                                </td>
                                <td>
                                  <div class="btn-group">
                                    <a href="<?php echo base_url()?>verificador/editarAsignacion/<?php echo $verificacion->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                    <a href="<?php echo base_url();?>verificador/estadoAsignacion/<?php echo $verificacion->id;?>" class="<?php echo $btn_estado_a; ?>"><span class="<?php echo $span_estado_a; ?>"></span></a>
                                  </div>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>

              
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