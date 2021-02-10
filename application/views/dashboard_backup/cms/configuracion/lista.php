<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Configuración Página Principal | 
         <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li class="active">Configuración Página Principal</li>
      </ol>
   </section>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right">
                     <a class="btn btn-block btn-social btn-danger col-sm-3" href="<?php echo base_url(); ?>cms/striming/activar">
                     <i class="fa fa-plus"></i>Activar el Striming de Video (YouTube)
                     </a> 
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                          
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 168px;">Nombre de la Seccion</th>
                          
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 40px;">Orden</th>
                          
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90px;">Estado</th>

                           <th style="width: 70px;">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($contenidos as $contenido): ?>

                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $contenido->nombre_seccion; ?></td>
                           <td class="sorting_1"><?php echo $contenido->orden; ?></td>
                           <td class="sorting_1"><?php echo $contenido->estado; ?></td>
                           <td class="sorting_1">
                             <!-- <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/eventos/seleccionar/<?php echo $contenido->id; ?>/editar">
                                 <i class="fa fa-pencil"></i>
                              </a>
                              <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>cms/eventos/seleccionar/<?php echo $contenido->id; ?>/eliminar">
                                 <i class="fa fa-trash"></i>
                              </a> -->
                              
                              <?php if ($contenido->estado == 'A'): ?>
                                 <a class="btn btn-social-icon bg-olive" href="<?php echo base_url(); ?>cms/configuracion/desactivar/<?php echo $contenido->id; ?>">
                                    <i class="fa fa-eye-slash"></i>
                                 </a>
                              <?php else: ?>
                                 <a class="btn btn-social-icon bg-orange" href="<?php echo base_url(); ?>cms/configuracion/activar/<?php echo $contenido->id; ?>">
                                    <i class="fa fa-eye"></i>
                                 </a>    
                              <?php endif; ?>
                           </td>
                        </tr>
                       
                        <?php endforeach; ?>

                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">Nombre de la Sección</th>
                           <th rowspan="1" colspan="1">Orden</th>
                           <th rowspan="1" colspan="1">Estado</th>
                           <th rowspan="1" colspan="1">Acciones</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   </section>
</div>