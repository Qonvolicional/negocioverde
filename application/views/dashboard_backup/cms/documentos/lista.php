<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Gestor de Documentos | 
         <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li class="active">Gestor de Documentos</li>
      </ol>
   </section>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right">
                     <a class="btn btn-block btn-social btn-success col-sm-3" href="<?php echo base_url(); ?>cms/documentos/agregar">
                     <i class="fa fa-plus"></i>Nuevo Documento
                     </a>
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                          
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 168px;">Tìtulo</th>
                          
                            
                          
                           <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90px;">Nombre</th>

                           <th style="width: 70px;"><p>Acciones</p>
                           <span class="btn btn-social-icon btn-dropbox"><i class="fa fa-pencil"></i></span><span>Ver|Editar </span>
                        <span class=" btn btn-social-icon btn-google"><i class="fa fa-trash"></i></span> <span>Eliminar </span>
                     </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($listaFi as $fi): ?>

                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo ucwords($fi->nombre); ?></td>
                          
                           <td class="sorting_1"><?php echo $fi->descripcion ; ?></td>
                           <td class="sorting_1">
                              <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/documentos/seleccionar/<?php echo $fi->id; ?>/editar">
                                 <i class="fa fa-pencil"></i>
                              </a>
                              <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>cms/documentos/eliminar/<?php echo $fi->id; ?>">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </td>
                        </tr>
                       
                        <?php endforeach; ?>

                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">Título</th>
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