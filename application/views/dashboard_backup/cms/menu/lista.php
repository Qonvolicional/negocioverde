<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Menu
         <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
         <li class="active">Menus</li>
      </ol>
   </section>
   <?php 
        $activacion = ($admin==9)?"":"style='display:none'";
   
   ?>
   <section class="content">
       <div class="box box-success">
      <div class="box-body">
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
               <div class="col-sm-12">
                  <div class="row col-sm-3 pull-right" <?php echo $activacion; ?> >
                     <a class="btn btn-block btn-social btn-success col-sm-3" href="<?php echo base_url(); ?>cms/menu/agregar">
                     <i class="fa fa-plus"></i>Nuevo Menu
                     </a>
                  </div>
                  <br/> <br/> <br/>
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                     <thead>
                        <tr role="row">
                           <th>Posición</th>
                           <th>Título</th>
                           <th>Tipo de contenido</th>
                           <th>Enlace</th>
                           <th>Acciones <span class="btn btn-social-icon btn-dropbox"><i class="fa fa-pencil"></i></span><span>Ver|Editar </span>
                        <span class=" btn btn-social-icon btn-google" <?php echo $activacion; ?> ><i class="fa fa-trash"></i></span> <span <?php echo $activacion; ?> >Eliminar </span>
                           <span class="btn btn-info"><i class="fa fa-eye"></i></span><span>Público</span>
                       <span class="btn btn-warning"><i class="fa fa-eye-slash"></i></span><span>Privado</span></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($menus)): ?>
                           <?php foreach ($menus as $menu ):?>
                              <?php 
                                 $btn_estado = ($menu->estado)?'btn btn-info':'btn btn-warning';
                                 $span_estado = ($menu->estado)?'fa fa-eye':'fa fa-eye-slash';
                              ?>
                              <tr>
                                 <td> <?php echo $menu->posicion; ?></td>
                                 <td> <?php echo $menu->nombre; ?></td>
                                 <td> <?php echo $menu->contenido; ?></td>
                                 <td> <?php echo $menu->slugArticulo; ?></td>
                                 <td class="btn-centrar">
                                    <a class="btn btn-social-icon btn-dropbox" href="<?php echo base_url(); ?>cms/menu/seleccionar/<?php echo $menu->id; ?>/editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>cms/menu/eliminar/<?php echo $menu->id; ?>" <?php echo $activacion; ?>><i class="fa fa-trash"></i></a>
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
   </div>
   </div>
</section>  
</div>