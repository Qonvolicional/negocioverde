
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tipo de perfiles <small class="text-sm">Lista</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control Estadístico</a></li>
              <li class="breadcrumb-item active">Tipo de perfiles</li>
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
                  <a class="btn btn-danger"href="<?php echo base_url(); ?>perfiles/agregar"><i class="fa fa-plus"></i> Nuevo Tipo de Perfil</a>
                  <div class="ml-auto d-flex flex-column flex-md-row"> <h6>Acciones:</h6> <small><span class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></span><span>Ver|Editar </span><span class="btn btn-outline-danger"><i class="fa fa-trash"></i></span> <span>Eliminar </span><span class="btn btn-outline-info"><i class="fa fa-eye"></i></span><span>Público</span><span class="btn btn-outline-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></small>
                  </div>
               </div>
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped dataTable responsive" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($perfiles)): ?>
                          <?php foreach ($perfiles as $perfil ):?>
                          <?php 
                              $btn_estado = ($perfil->estado)?'btn btn-outline-info':'btn btn-outline-warning';
                              $span_estado = ($perfil->estado)?'fa fa-eye':'fa fa-eye-slash';
                            ?>  
                            <tr>
                              <td>
                                <?php echo $perfil->nombre; ?>
                              </td>
                              <td class="btn-group">
                                <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>perfiles/<?php echo $perfil->id;?>"><i class="fas fa-pencil-alt"></i></a>

                                <a class="btn btn-outline-danger btn-eliminar" href="#" data-toggle="modal" data-target="#modalEliminacion" data-href="<?php echo base_url(); ?>perfiles/eliminar/<?php echo $perfil->id;?>"><i class="fa fa-trash"></i></a>

                                <a class="<?php echo $btn_estado; ?>" href="<?php echo base_url(); ?>perfiles/estado/<?php echo $perfil->id;?>"><i class="<?php echo $span_estado; ?>"></i></a>
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
          <h3 class="modal-title" id="exampleModalLongTitle">Borrar registro</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>¿Desea continuar eliminar el registro?</h4>
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
  <!-- /.content-wrapper -->