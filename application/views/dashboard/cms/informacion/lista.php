<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Datos de Contacto y Redes Sociales | 
         <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li class="active">Contacto y Redes Sociales</li>
      </ol>
   </section>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right">
                     <!-- <a class="btn btn-block btn-social btn-success col-sm-3" href="<?php echo base_url(); ?>cms/informacion/agregar">
                     <i class="fa fa-plus"></i>Definir Datos
                     </a> -->
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 168px;">Correo</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 168px;">Horario</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 207px;">Telefono</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 207px;">Whatsapp</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 207px;">Streaming</th>
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($informacion as $info){
                           
                           ?>
                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $info->correo; ?></td>
                           <td class="sorting_1"><?php echo $info->horario_atencion; ?></td>
                           <td><?php echo $info->telefono; ?></td>
                           <td><?php echo $info->whatsapp; ?></td>
                           <td><?php 
                           $info->estado;
                           
                           if($info->estado == 'I'){
                               echo "Inactivo";
                           }else{
                               echo "Activo";
                           }
                            ?></td>
                           <td>
                              <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/informacion/seleccionar/<?php echo $info->id; ?>/editar"><i class="fa fa-pencil"></i> </a>
                              
                              
                              <?php if ($info->estado == 'A'): ?>
                                 <a class="btn btn-social-icon bg-olive" href="<?php echo base_url(); ?>cms/informacion/desactivar/<?php echo $info->id; ?>">
                                    <i class="fa fa-eye-slash"></i>
                                 </a>
                              <?php else: ?>
                                 <a class="btn btn-social-icon bg-orange" href="<?php echo base_url(); ?>cms/informacion/activar/<?php echo $info->id; ?>">
                                    <i class="fa fa-eye"></i>
                                 </a>    
                              <?php endif; ?>
                              
                           </td>
                        </tr>
                        <?php
                           }
                           
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">Correo</th>
                           <th rowspan="1" colspan="1">Horario</th>
                           <th rowspan="1" colspan="1">Telefono</th>
                           <th rowspan="1" colspan="1">Whatsapp</th>
                           <th rowspan="1" colspan="1">Streaming</th>
                           <th rowspan="1" colspan="1">Acciones</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
</div>
</div>
</section>  
</div>