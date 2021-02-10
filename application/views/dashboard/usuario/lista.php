<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Referentes <small class="text-sm">Lista</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control Estadístico</a></li>
              <li class="breadcrumb-item active">Referentes</li>
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
                  <a class="btn btn-danger"href="<?php echo base_url(); ?>referente/agregar"><i class="fa fa-plus"></i> Nuevo Referente</a>
                  <div class="ml-auto">Acciones: <small><span class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></span><span>Ver|Editar </span><span class="btn btn-outline-danger"><i class="fa fa-trash"></i></span> <span>Eliminar </span><span class="btn btn-outline-info"><i class="fa fa-eye"></i></span><span>Público</span><span class="btn btn-outline-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></small>
                  </div>
               </div>
               <div class="card-body container-fluid">
                  <table id="example1" class="table table-bordered table-striped dataTable responsive" style="width:100% !important;"role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th>Identificación</th>
                           <th>Nombre completo</th>
                           <th>Tipo de referente</th>
                           <th>Fecha de modificación</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($usuarios)): ?>
                           <?php foreach ($usuarios as $usuario ):?>
                              <?php 
                                 $btn_estado = ($usuario->estado)?'btn btn-outline-info':'btn btn-outline-warning';
                                 $span_estado = ($usuario->estado)?'fa fa-eye':'fa fa-eye-slash';
                              ?>
                              <tr>
                                 <td> <?php echo $usuario->identificacion; ?></td>
                                 <td> <?php echo $usuario->nombre; ?></td>
                                 <td> <?php echo $usuario->tipo_perfil; ?></td>
                                 <td> <?php echo $usuario->fecha_modificacion; ?></td>
                                 <td class="btn-group">
                                    <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>referente/<?php echo $usuario->id; ?>"><i class="fas fa-pencil-alt"></i></a>

                                    <a class="btn btn-outline-danger" href="<?php echo base_url(); ?>referente/eliminar/<?php echo $usuario->id; ?>"><i class="fa fa-trash"></i></a>

                                    <a class="<?php echo $btn_estado; ?>" href="<?php echo base_url(); ?>referente/estado/<?php echo $usuario->id; ?>"><i class="<?php echo $span_estado; ?>"></i></a>
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