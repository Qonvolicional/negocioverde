<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Gestor de Galeria | 
         <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li class="active">Gestor de Galeria</li>
      </ol>
   </section>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right">
                     <a class="btn btn-block btn-social btn-success col-sm-3" href="<?php echo base_url(); ?>cms/galeria/agregar">
                     <i class="fa fa-plus"></i>Nuevo Imagen
                     </a>
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 168px;">Tìtulo</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 40px;">Vista Previa</th>
                           <th style="width: 70px;">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($contenidos as $contenido): ?>
                        <tr role="row" class="odd">
                           <td class="sorting_1"><?php echo $contenido->nombre; ?></td>
                           <td class="sorting_1"><img src="<?php echo base_url().$contenido->fotografia; ?>" style="width:150px; height: 70px;"></td>
                           <td class="sorting_1">
                              <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/galeria/seleccionar/<?php echo $contenido->id; ?>/editar">
                                 <i class="fa fa-pencil"></i>
                              </a>
                              <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>cms/galeria/seleccionar/<?php echo $contenido->id; ?>/eliminar">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </td>
                        </tr>
                        <?php endforeach; ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th rowspan="1" colspan="1">Título</th>
                           <th rowspan="1" colspan="1">Vista Previa</th>
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