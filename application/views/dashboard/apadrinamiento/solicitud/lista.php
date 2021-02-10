<div class="content-wrapper">

   <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Apadrinamiento <small class="text-sm">Solicitud / Lista</small></h1>

          </div><!-- /.col -->

          <div class="col-sm-6 accent-danger">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>JCH</a></li>

              <li class="breadcrumb-item"><a href="#">Apadrinamiento</a></li>

              <li class="breadcrumb-item active">Solicitudes</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

   </section>

   <!-- /.content-header -->

   

   <section class="content">

      <div class="row">

         <div class="col-12">

            <div class="card">

               <div class="card-header d-flex flex-column flex-md-row">

                  <div class="ml-auto">Acciones: <small><span class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></span><span>Ver|Editar </span><span class="btn btn-outline-danger"><i class="fa fa-trash"></i></span> <span>Eliminar </span><span class="btn btn-outline-info"><i class="fa fa-eye"></i></span><span>Público</span><span class="btn btn-outline-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></small>

                  </div>

               </div>

               <div class="card-body container-fluid">

                  <table id="example1" class="table table-bordered table-striped dataTable responsive" style="width:100% !important;"role="grid" aria-describedby="example1_info">

                     <thead>

                        <tr role="row">

                           <th>Nombre del solicitante</th>
                           <th>referente</th>
                           <th>Concato</th>
                           <th>Comentario</th>
                           <th>Fecha</th>
                           <th>Acciones</th>

                        </tr>

                     </thead>

                     <tbody>

                        <?php 
                        if(!empty($solicitudes)): ?>

                           <?php foreach ($solicitudes as $solicitud ):?>

                        
                              <tr>

                                 <td> <?php echo $solicitud->solicitante; ?></td>

                                 <td> <?php echo $solicitud->referente; ?></td>

                                 <td> <?php echo $solicitud->contacto; ?></td>
                                 <td> <?php echo $solicitud->comentario; ?></td>
  
                                 <td> <?php echo strftime( "%d de %B del %Y", strtotime($solicitud->fecha_registro)); ?></td>
        
                                 <td class="btn-group">
                                    <a class="btn btn-outline-danger" href="#"><i class="fa fa-trash"></i></a>
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

</div>