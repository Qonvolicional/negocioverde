
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Galerias
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>cms_galerias">Galerias</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
    <?php if($this->session->flashdata("error")):?>
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
       </div>
    <?php endif;?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->

          <div class="box box-success">
              <div class="box-header">
                <a href="<?php echo base_url(); ?>cms_galeria/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar registro</a>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
	                <tr>
	                  <th>Título</th>
                    <th>Vista previa</th>
	                  <th>Fecha de creación</th>
                    <th>Acciones</th>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($galerias)): ?>
                		<?php foreach ($galerias as $galeria ):?>
                      <?php 
                        $btn_estado = ($galeria->estado)?'btn btn-info':'btn btn-warning';
                        $span_estado = ($galeria->estado)?'fa fa-eye':'fa fa-eye-slash';
                      ?>
			                <tr>
                        <td>
                          <?php echo $galeria->nombre; ?>
                        </td>
                        <td>
                          <?php if($galeria->url): ?>
                          <img class="img-fluid img-thumbnail img-responsive" style="max-height: 150px; max-width: 150px" src="<?php echo $galeria->url; ?>" alt="<?php echo $galeria->nombre; ?>">
                          <?php else: ?>
                            <h5 class="has-error help-block btn btn-sm">No tiene asignada imagen</h5>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php echo $galeria->fecha_creacion; ?>
                        </td>
                        <td class="btn-centrar">
                          <a href="<?php echo base_url()?>cms_galeria/<?php echo $galeria->id;?>" class="btn btn-warning"><span class="fa fa-pencil"> </span> </a>
                            <a href="<?php echo base_url();?>cms_galeria/estado/<?php echo $galeria->id;?>" class="<?php echo $btn_estado; ?>"> <span class="<?php echo $span_estado; ?>"></span></a>
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