<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu <small class="text-sm">Lista</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 accent-danger">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Control Estadístico</a></li>
              <li class="breadcrumb-item active">Menu</li>
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
                  <a class="btn btn-danger"href="<?php echo base_url(); ?>cms/menu/agregar"><i class="fa fa-plus"></i> Nuevo Menu</a>
                  <div class="ml-auto">Acciones: <small><span class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></span><span>Ver|Editar </span><span class="btn btn-outline-danger"><i class="fa fa-trash"></i></span> <span>Eliminar </span><span class="btn btn-outline-info"><i class="fa fa-eye"></i></span><span>Público</span><span class="btn btn-outline-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></small>
                  </div>
               </div>
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped dataTable responsive" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th>Posición</th>
                           <th>Título</th>
                           <th>Tipo de contenido</th>
                           <th>Enlace</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($menus)): ?>
                           <?php foreach ($menus as $menu ):?>
                              <?php 
                                 $btn_estado = ($menu->estado)?'btn btn-outline-info':'btn btn-outline-warning';
                                 $span_estado = ($menu->estado)?'fa fa-eye':'fa fa-eye-slash';
                              ?>
                              <tr>
                                 <td> <?php echo $menu->posicion; ?></td>
                                 <td> <?php echo $menu->nombre; ?></td>
                                 <td> <?php echo $menu->contenido; ?></td>
                                 <td> <?php echo $menu->slugArticulo; ?></td>
                                 <td class="btn-group">
                                    <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>cms/menu/seleccionar/<?php echo $menu->id; ?>/editar"><i class="fas fa-pencil-alt"></i></a>

                                    <a class="btn btn-outline-danger" href="<?php echo base_url(); ?>cms/menu/eliminar/<?php echo $menu->id; ?>"><i class="fa fa-trash"></i></a>

                                    <a class="<?php echo $btn_estado; ?>" href="<?php echo base_url(); ?>cms/menu/estado/<?php echo $menu->id; ?>"><i class="<?php echo $span_estado; ?>"></i></a>
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