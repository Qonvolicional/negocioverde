<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agenda <small class="text-sm">Lista</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control Estadístico</a></li>
              <li class="breadcrumb-item active">Agenda</li>
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
                  <a class="btn btn-danger"href="<?php echo base_url().$_SESSION['modulo_string']; ?>/agregar"><i class="fa fa-plus"></i> Nueva Agenda</a>
                  <div class="ml-auto d-flex flex-column flex-md-row"> <h6>Acciones:</h6> <small><span class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></span><span>Ver|Editar </span><span class="btn btn-outline-danger"><i class="fa fa-trash"></i></span> <span>Eliminar </span><span class="btn btn-outline-info"><i class="fa fa-eye"></i></span><span>Público</span><span class="btn btn-outline-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></small>
                  </div>
               </div>
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped dataTable responsive" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">Video</th>
                          <th scope="col">Fecha de agenda</th>
                          <th scope="col">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($agendas)): ?>
                          <?php foreach ($agendas as $agenda ):?>
                          <?php 
                              $btn_estado = ($agenda->estado)?'btn btn-outline-info':'btn btn-outline-warning';
                              $span_estado = ($agenda->estado)?'fa fa-eye':'fa fa-eye-slash';
                            ?>  
                            <tr>
                              <td class="" scope="row">
                               <?php echo $agenda->nombre; ?> 
                              </td>
                              
                              <td class="">
                                <?php if(!empty($agenda->url_imagen) && file_exists($agenda->url_imagen)):?>
                                 <img class="d-flex mx-auto img-fluid img-thumbnail img-responsive" style="max-height: 100px; max-width: 100px" src="<?php echo $agenda->url_imagen; ?>" alt="<?php echo $agenda->nombre; ?>">
                                 <?php else: ?>
                                  <span class="text-center"><i class="far fa-window-close"></i> No se encontró imagen</span>
                                 <?php endif; ?>
                              </td>

                              <td class="">
                                <?php if(!empty($agenda->url_video) && file_exists($agenda->url_video)):?>
                                 <div class="mr-2 embed-responsive embed-responsive-16by9">
                                    <video class="embed-responsive-item videos"  controls>
                                        <source src="<?php echo base_url().$agenda->url_video; ?>" type="video/mp4">
                                    </video>
                                  </div>
                                 <?php else: ?>
                                  <span class="text-center"><i class="far fa-window-close"></i> No se encontró video</span>
                                 <?php endif; ?>
                              </td>
                              
                              <td>
                                <?php echo $agenda->fecha; ?>
                              </td>
                              
                              <td class="btn-group">
                                <a class="btn btn-outline-primary" href="<?php echo base_url().$_SESSION['modulo_string']; ?>/<?php echo $agenda->id;?>"><i class="fas fa-pencil-alt"></i></a>

                                <a class="btn btn-outline-danger btn-eliminar" href="#" data-toggle="modal" data-target="#modalEliminacion" data-href="<?php echo base_url().$_SESSION['modulo_string']; ?>/eliminar/<?php echo $agenda->id;?>"><i class="fa fa-trash"></i></a>

                                <a class="<?php echo $btn_estado; ?>" href="<?php echo base_url().$_SESSION['modulo_string']; ?>/estado/<?php echo $agenda->id;?>"><i class="<?php echo $span_estado; ?>"></i></a>
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
  <div class="modal fade" id="modalEliminacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Eliminar módulo</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>¿Desea continuar con la eliminación del módulo y con ellos los módulos hijos?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="" class="btn btn-primary" id="btn-confirmar">Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin de modal -->
</div>