<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Donación <small class="text-sm">Lista</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control Estadístico</a></li>
              <li class="breadcrumb-item active">Donación</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content-header -->
   
   <section class="content">
      <div class="row">
         <div class="col">
            <div class="card">
               <div class="card-header d-flex flex-column flex-md-row">
                  <h3>Solicitudes de donación</h3>
                  <div class="ml-auto d-flex flex-column flex-md-row"> <h6>Acciones: </h6> <small><span class="btn btn-outline-primary"><i class="fas fa-eye"></i></span><span> Ver|Editar </span></small>
                  </div>
               </div>
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped dataTable responsive" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr>
                          <th scope="col">Solicitante</th>
                          <th scope="col">Correo electrocino</th>
                          <th scope="col">Fecha de solicitud</th>
                          <th scope="col">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($donaciones)): ?>
                          <?php foreach ($donaciones as $donacion ):?>
                            <tr>
                              <td class="" scope="row">
                               <?php echo $donacion->nombres." ".$donacion->apellidos; ?> 
                              </td>
                              
                              <td>
                                <?php echo $donacion->correo; ?>
                              </td>
                              
                              <td>
                                <?php echo $donacion->fecha; ?>
                              </td>
                              
                              <td class="btn-group">
                                <a class="btn btn-outline-primary" href="<?php echo base_url().$_SESSION['modulo_string']; ?>/<?php echo $donacion->id;?>"><i class="fas fa-eye"></i></a>
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
   </section>
  <!-- Modal -->
  
  <!-- Fin de modal -->
</div>