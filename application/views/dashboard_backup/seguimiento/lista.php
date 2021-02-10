<div class="content-wrapper">
	
	<section class="content-header">
      <h1>
        Seguimiento - <small><?php echo $empresa->razon_social ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>emprendimiento/negocioVerde">Negocios Verdes</a></li>
        <li class="active">Seguimientos</li>
      </ol>
    </section>

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
              <a href="<?php echo base_url()."seguimiento/".$empresa->id."/agregar"; ?>" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar seguimiento</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tematica Tratada</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($seguimientos)): ?>
                    <?php foreach ($seguimientos as $seguimiento ):?> 
                      <tr>
                        <td>

                          <?php echo $seguimiento->lugar; ?> <a href="<?php echo base_url()."seguimiento/".$empresa->id."/ver/".$seguimiento->id; ?>" class="btn btn-info pull-right"><span class="fa fa-eye"></span></a>
                        </td>
                        <td class="btn-centrar">
                          <?php echo $seguimiento->fecha; ?>
                        </td>
                        <td class="btn-centrar">
                          <?php echo $seguimiento->hora_inicio." | ".$seguimiento->hora_fin; ?>
                        </td>
                        <td class="btn-centrar">
                         <?php echo $seguimiento->temas_tratados; ?>
                        </td>
                        <td class="btn-centrar">
                          <?php if(!empty($seguimiento->url)): ?>
                              <a target="_blank" href="<?php echo base_url().$seguimiento->url; ?>" class="btn btn-info pull-right"><span class="glyphicon glyphicon-download"></span> Descargar Soporte</a>
                          <?php endif; ?>
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
</div>