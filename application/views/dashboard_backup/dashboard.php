<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <span></span> Estadística

        <small>control estadístico</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Control estadístico</li>

      </ol>

    </section>



    <!-- Main content -->

        <section class="content">

           <div class="row">

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-aqua">

            <div class="inner">

              <h3><?php echo $numBienes;?></h3>



              <p>Productos registrados</p>

            </div>

            <div class="icon">

              <i class="ion ion-bag"></i>

            </div>

          

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-green">

            <div class="inner">

              <h3><?php echo $porc_evaluados;?> <sup style="font-size: 20px">%</sup></h3>

              <p>Emprendimientos Evaluados</p>

            </div>

            <div class="icon">

              <i class="ion ion-stats-bars"></i>

            </div>

          

          </div>

        </div>

        

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-red">

            <div class="inner">

              <h3><?php echo $porc_noevaluados;?> <sup style="font-size: 20px">%</sup></h3>



              <p>Emprendimientos sin Evaluar</p>

            </div>

            <div class="icon">

              <i class="ion ion-pie-graph"></i>

            </div>

          </div>

        </div>

        <!-- ./col -->

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-yellow">

            <div class="inner">

              <h3><?php echo $total;?></h3>

              <p>Emprendimientos Registrados</p>

            </div>

            <div class="icon">

              <i class="ion ion-person-add"></i>

            </div>

          </div>

        </div>

      </div>

      <!-- /.row -->

      <div class="row">



      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Estado de la Hoja de Verificacion 2</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                 
                  <div class="chart">
                    <!-- Chart Canvas -->
                    <canvas id="verificacionChart" style="height: 300px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->

                </div>
                <!-- /.col -->
              
             
                <div class="col-md-4">
                
                  <div class="chart-responsive" id="chart-suburst">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="box-header with-border">
                     <h3 class="box-title">Sector</h3>
                  </div>
                  <ul class="chart-legend clearfix" id="sector_container">
                    
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
   
                <!-- /.col -->
              </div>
              <!-- /.row -->
        
            <!-- ./box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes de los negocios verdes por Municipios</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-8 col-sm-7">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="choco-map-markers" style="height: 400px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" id="municpios_des" style="min-height: 280px; max-height: 380px;overflow-y: auto;">
                   <!-- <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visitas generales</span>
                    </div>-->
                    
                  </div>
                </div>


                <!-- /.col -->
              </div>
              
              <!-- /.row -->
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
          <!-- /.row -->
          
          <!-- /.box -->
        </div>

         <div class="col-md-4">
            <div class="box box-success">
                    <div class="box-header with-border">
                     <h3 class="box-title">Resultados</h3>
                  </div>
                   <div class="chart-responsive" id="resultado-suburst">
                    <canvas id="resultadoChart" height="150"></canvas>
                  </div>
                  <ul class="chart-legend clearfix" id="resultado_container" style="padding:16px; ">
                    
                  </ul>
            </div>
        </div>
        <!-- /.col -->
      </div>
       <div class="row">
            <!-- /.col -->

            <div class="col-md-8">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ultimos Emprendimientos registrados</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">4 Nuevos</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="<?php echo base_url().$ultimas_empresas[0]->url;?>" alt="User Image">
                      <a class="users-list-name" href="negocioVerde/ver/<?php echo $ultimas_empresas[0]->id;?>"><?php echo $ultimas_empresas[0]->razon_social; ?></a>
                      <span class="users-list-date"><?php echo $ultimas_empresas[0]->registro; ?></span>
                    </li>
                    <li>
                      <?php if(count($ultimas_empresas) > 1): ?>
                      <img src="<?php echo base_url().$ultimas_empresas[1]->url;?>" alt="User Image">
                      <a class="users-list-name" href="negocioVerde/ver/<?php echo $ultimas_empresas[1]->id;?>"><?php echo $ultimas_empresas[1]->razon_social; ?></a>
                      <span class="users-list-date"><?php echo $ultimas_empresas[1]->registro; ?></span>
                    </li>
                  <?php endif; ?>
                  <?php if(count($ultimas_empresas) > 2): ?>
                    <li>
                       <img src="<?php echo base_url().$ultimas_empresas[2]->url;?>" alt="User Image">
                      <a class="users-list-name" href="negocioVerde/ver/<?php echo $ultimas_empresas[2]->id;?>"><?php echo $ultimas_empresas[2]->razon_social; ?></a>
                      <span class="users-list-date"><?php echo $ultimas_empresas[2]->registro; ?></span>
                    </li>
                   <?php endif; ?>
                    <?php if(count($ultimas_empresas) > 3): ?>
                    <li>
                       <img src="<?php echo base_url().$ultimas_empresas[3]->url;?>" alt="User Image">
                      <a class="users-list-name" href="negocioVerde/ver/<?php echo $ultimas_empresas[3]->id;?>"><?php echo $ultimas_empresas[3]->razon_social; ?></a>
                      <span class="users-list-date"><?php echo $ultimas_empresas[3]->registro; ?></span>
                    </li>
                     <?php endif; ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="negocioVerde" class="uppercase">Ver todos</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>


            <!-- /.col -->
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->