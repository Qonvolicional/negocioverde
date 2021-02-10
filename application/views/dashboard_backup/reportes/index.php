
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box box-success">
            <div class="box-header with-border">
              <h2>Resumen de emprendimiento</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url();?>reporte/resumen" role="form" method="post" target="_blank">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <select class="form-control" id="empresa_id" name="empresa_id" required="">
                        <option value="">Selecciona un emprendimiento</option>
                        <?php if(!empty($empresasResumen)):?>
                          <?php foreach ($empresasResumen as $empresa):?> 
                          <option value="<?php echo $empresa->id; ?>"><?php echo $empresa->razon_social;?></option>
                        <?php endforeach; ?>
                        <?php endif;?>
                      </select>
                    </div>
                  </div>
                  <div class="btn-group col-md-2">
                    <button type="submit" class="btn btn-success"><span class="fa fa-file"></span> EXCEL</button>
                  </div>

                </div>
              </form>
            </div>
            <!-- /.box-body -->


            <div class="box-header with-border">
              <h2>Plan de mejora</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url();?>reporte/plan_mejora" role="form" method="post" target="_blank">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <select class="form-control" id="empresa_mejora" name="empresa_mejora" required="">
                        <option value="">Selecciona un emprendimiento</option>
                        <?php if(!empty($empresasPlanMejora)):?>
                          <?php foreach ($empresasPlanMejora as $empresa):?> 
                          <option value="<?php echo $empresa->id; ?>"><?php echo $empresa->razon_social;?></option>
                        <?php endforeach; ?>
                        <?php endif;?>
                      </select>
                    </div>
                  </div>
                  <div class="btn-group col-md-2">
                    <button type="submit" class="btn btn-success"><span class="fa fa-file"></span> EXCEL</button>
                  </div> 
                </div>
              </form>
            </div>
            <!-- /.box-body -->
            <div class="box-header with-border">
              <h2>Informe General (SÓLO MADS)</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url();?>reporte/mads" role="form" target="_blank" method="post">
                <div class="row">
                  <div class="col-md-8 form-group">
                    <span>NOTA: Este documento contiene el resumen de los emprendimientos a los cuales se le han aplicado todas las fases de evaluación</span>
                  </div>
                  <div class="btn-group col-md-2">
                    <button type="submit" class="btn btn-success"><span class="fa fa-file"></span> EXCEL</button>
                  </div>
                  
                </div>
              </form>
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