<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Estadística
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
              <h3 class="box-title">Registro de Emprendimientos Mes</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                 
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->

                </div>
                <!-- /.col -->
              
             
                <div class="col-md-4">
                
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="box-header with-border">
                     <h3 class="box-title">Sub-sectores</h3>
                  </div>
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Bienes y Servicios Sostenibles</li>
                    <li><i class="fa fa-circle-o text-green"></i> Ecoproductos Industriales</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Mercados de Carbono</li>
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
              <h3 class="box-title">Reportes de Visitantes de los negocios verdes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 325px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visitas generales</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Colombia</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text"></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="row">
            <!-- /.col -->

            <div class="col-md-9">
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
                      <img src="<?php echo base_url(); ?>assets/template/img/logo_nv.png" alt="User Image">
                      <a class="users-list-name" href="#">Fundación Parque tematico afrika</a>
                      <span class="users-list-date">Hoy</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>assets/template/img/logo_nv.png" alt="User Image">
                      <a class="users-list-name" href="#">Bocaditos doña betty</a>
                      <span class="users-list-date">Hoy</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>assets/template/img/logo_nv.png" alt="User Image">
                      <a class="users-list-name" href="#">Prueba Verde SAS</a>
                      <span class="users-list-date">Ayer</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>assets/template/img/logo_nv.png" alt="User Image">
                      <a class="users-list-name" href="#">Qonvolucional SAS</a>
                      <span class="users-list-date">12 Jun</span>
                    </li>
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
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->