<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Gestor de Publicaciones | 
         <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li ><a href="<?php echo base_url(); ?>cms/contenido">Gestor de Publicaciones</a></li>
         <li class="active">Lista</li>
      </ol>
   </section>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">

               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right">
                     <a class="btn btn-block btn-social btn-success col-sm-3" href="<?php echo base_url(); ?>cms/contenido/agregar">
                     <i class="fa fa-plus"></i>Nueva Publicacion
                     </a>
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                          
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 168px;">Tìtulo</th>
                          
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 40px;">Estado</th>
                          
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90px;">Fecha Creacion(s)</th>

                           <th style="width: 70px;">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($contenidos as $contenido): ?>

                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $contenido->titulo; ?></td>
                           <td class="sorting_1"><?php echo $contenido->statusPost; ?></td>
                           <td class="sorting_1"><?php echo $contenido->fechacrea; ?></td>
                           <td class="sorting_1">
                              <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/contenido/seleccionar/<?php echo $contenido->id; ?>/editar">
                                 <i class="fa fa-pencil"></i>
                              </a>
                              <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>cms/contenido/seleccionar/<?php echo $contenido->id; ?>/eliminar">
                                 <i class="fa fa-trash"></i>
                              </a>
                              
                              <?php if ($contenido->statusPost == 'A'): ?>
                                 <a class="btn btn btn-info" href="<?php echo base_url(); ?>cms/contenido/desactivar/<?php echo $contenido->id; ?>">
                                    <span class="fa fa-eye-slash"></span>
                                 </a>
                              <?php else: ?>
                                 <a class="btn btn-warning" href="<?php echo base_url(); ?>cms/contenido/activar/<?php echo $contenido->id; ?>">
                                    <span class="fa fa-eye"></span>
                                 </a>    
                              <?php endif; ?>
                           </td>
                        </tr>
                       
                        <?php endforeach; ?>

                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">Título</th>
                           <th rowspan="1" colspan="1">Estado</th>
                           <th rowspan="1" colspan="1">Fecha</th>
                           <th rowspan="1" colspan="1">Acciones</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
</div>
</section>  
</div>