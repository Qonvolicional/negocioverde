
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Negocios Verdes (<?php echo $empresas[0]->municipio; ?>)
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="#">Negocios Verdes</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->

          <div class="box box-success">
            <?php if($_SESSION['rol']!=4): ?>
              <div class="box-header">
                <a href="<?php echo base_url(); ?>negocioVerde/agregar" class="btn btn-primary btn-flat pull-right"><span class="fa fa-plus"></span> Agregar registro</a>
              </div>
            <?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Razón social</th>
                    <?php if($_SESSION['rol']!=4):?>
	                  <th>Formato AS</th>
	                  <th>Hojas de verificación</th>
	                  <th>Plan de Mejora</th>
	                  <th>Consolidado</th>
                    <?php endif; ?>
                    <?php 
                      if($admin) echo "<th>Estado</th>";
                    ?>
	                </tr>
                </thead>
                <tbody>
                	<?php if(!empty($empresas)): ?>
                		<?php foreach ($empresas as $empresa ):?>
                      <?php 

                        //$disabledIG = (!$empresa->informacion_general || $admin)?" ":"disabled onclick='return false;'";
                        $disabledIG = "";
                        $disabledFAS = (!$empresa->formato_as)?"disabled onclick='return false;'":"";
                        $disabledH1 = (!$empresa->hoja1)?"disabled onclick='return false;'":"";
                        $disabledH2 = (!$empresa->hoja2)?"disabled onclick='return false;'":"";
                        $disabledP = (!$empresa->mejora)?"disabled onclick='return false;'":"";
                        $disabledC = (!$empresa->consolidado)?"disabled onclick='return false;'":"";
                        
                        //$urlIG = (!$empresa->informacion_general || $admin)?base_url()."negocioVerde/ver/".$empresa->id:'';
                        $urlIG = base_url()."negocioVerde/ver/".$empresa->id;
                        $urlFAS = ($empresa->formato_as)?base_url()."formatoAS/".$empresa->id:'';
                        $urlH1 = ($empresa->hoja1)?base_url()."verificacion-uno/".$empresa->id:'';
                        $urlH2 = ($empresa->hoja2)?base_url()."verificacion-dos/".$empresa->id:'';
                        $urlP = ($empresa->mejora)?base_url()."plan-de-mejora/".$empresa->id:'';
                        $urlC = ($empresa->consolidado)?base_url()."consolidado/".$empresa->id:'';
                        $disabled_estado = ($empresa->estado)?'':'disabled';
                        $btn_estado = ($empresa->estado)?'btn btn-info':'btn btn-warning';
                        $span_estado = ($empresa->estado)?'fa fa-eye':'fa fa-eye-slash';
                      ?>
			                <tr>
			                  <td>
                          <?php echo $empresa->razon_social; ?><a href="<? base_url()?>seguimiento/<?php echo $empresa->id; ?>"> Ver seguimientos</a><a <?php echo $disabledIG; ?> href="<?php echo $urlIG; ?>" class="btn btn-info pull-right"><span class="fa fa-eye"></span></a>
                        </td>
                        <?php if($_SESSION['rol']!=4): ?>
			                  <td class="btn-centrar">
                          <a <?php echo $disabledFAS; ?> href="<?php echo $urlFAS; ?>" class="btn btn-warning"><span class="fa fa-check-square"></span></a>
                        </td>
                        
                        <td class="btn-centrar">
                          <div class="btn-group">
                            <a <?php echo $disabledH1; ?> href="<?php echo $urlH1; ?>" style="margin-right: 5px;"class="btn btn-primary "><span class="fa fa-file-text">  H1</span></a>
                            <a <?php echo $disabledH2; ?> href="<?php echo $urlH2; ?>" class="btn btn-success ">H2  <span class="fa fa-file-text-o"></span></a>
                          </div>
                        </td>
			                  <td class="btn-centrar">
                          <a <?php echo $disabledP; ?> href="<?php echo $urlP; ?>" class="btn btn-danger"> <span class="fa fa-plus-square"></span>
                        </td>
			                  <td class="btn-centrar">
                          <a <?php echo $disabledC; ?> href="<?php echo $urlC; ?>" class="btn btn-success"> <span class="fa fa-files-o"></span></td>
                        </td>
                        <?php if($admin): ?>
                          <td class="btn-centrar">
                            <a <?php echo $disabled_estado; ?> href="<?php base_url(); ?>estadoEmprendimiento/<?php echo $empresa->id; ?>" class="<?php echo $btn_estado; ?>"> <span class="<?php echo $span_estado; ?> "></span></td>
                          </td>
                        <?php endif; ?>
                      <?php endif; ?>
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