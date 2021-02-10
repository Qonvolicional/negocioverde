<!-- page header section ending here -->
        <section class="page-header padding-tb page-header-bg-1">
            <div class="container">
                <div class="page-header-item d-flex align-items-center justify-content-center">
                    <div class="post-content">
                        <h3>Negocios Verdes en Cifras</h3>
                        <div class="breadcamp">
                            <ul class="d-flex flex-wrap justify-content-center align-items-center">
                                <li><a href="index.html">Inicio</a></li>
                                <li><a class="active">Distribución de Negocios Verdes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section class="about style-2 padding-tb">
      <div class="container">
        <div class="row">

        <div class="col-md-6 col-sm-6">
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
            <h6>Seleccionar una región para ver los Negocios verdes</h6>
             <div class="row">
                <div class="col-md-6 col-sm-7">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="choco-map-markers" style="height: 400px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-5 col-sm-4">
                  <div class="pad box-pane-right bg-green" id="municpios_des" style="min-height: 280px; max-height: 380px;overflow-y: auto;">
                  
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row justify-content-center">
                <div class="col-md">
                 
               </div>
                 <div class="col-md">
                  <!--<a  href="#" target="_new" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Ver Más</a>-->
               </div> 
               
              </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <h6>Negocios en <span id="negocio-ciudad"></span></h6>
            <div id="empresas-verdes" style="min-height: 280px; max-height: 380px;overflow-y: auto;">
            <table id="negocios" class="table table-responsive table-hover" >
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
      
    </div>
      </div>
</section>