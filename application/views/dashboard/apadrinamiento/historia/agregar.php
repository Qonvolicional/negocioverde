<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Apadrinamiento Historias <small class="text-sm">Agregar</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> JCH</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>apadrinamiento"><i class="fa fa-dashboard"></i> Historias </a></li>
            <li class="breadcrumb-item active"> Agregar </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
      
  </section>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-plus"></i> Nueva Historia</h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."cms_publicacion/"; ?>">
          
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-md-12 <?php echo form_error('cms_tipo_publicacion_id') == true ? 'has-error':''?>">
                            <label for="cms_tipo_publicacion_id">(*)Seleccionar Perfil (Referente)</label>
                            <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar por nombre">
                        </div>
                            <div class="row">
                                <?php 
                                    $i = 0;
                                foreach ($referentes as $deq):
                                    $i++;

                                 ?>
                                  <div style="<?php echo ($i>8)? "display: none;":""; ?>" class="col-lg-3 col-sm-6 p-3" data-item="<?php echo $deq->id; ?>" id="r-<?php echo $deq->id;?>">
                                    <div class=" text-center">
                                      <div class="post-thumb">
                                          <div style="width:100px; 
                                          min-height: 100px; 
                                          background:url(<?php echo base_url().$deq->imagen_perfil; ?>); 
                                          background-size:cover; 
                                          background-position:center; 
                                          border-radius:50%; 
                                          border-top:3px solid rgba(17, 102, 129, 1);
                                          border-right: 3px solid rgba(237, 184, 3, 1);
                                          border-bottom: 3px solid rgba(244, 144, 77, 1);
                                          border-left: 3px solid rgba(223, 40, 36, 1); 
                                          margin: 0 auto; 
                                          margin-bottom:10px;">
                                          </div>
                                              <div class="post-content" style="color:rgba(0,0,0,0.8); border-radius:10px;height: 90px;">
                                          <input type="hidden" class="referentes"  value="<?php echo $deq->nombre; ?>" data-cod="<?php echo $deq->id; ?>">
                                          <h4><a href="javascript:;"><?php echo $deq->nombre; ?></a></h4>
                                          <span style="color:rgba(0,0,0,0.7);"><?php echo $deq->rol; ?></span>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    <div>
                                     <a  href="<?php echo base_url().'apadrinamiento/historia/guardar/'.$deq->id; ?>" class="btn btn-outline-dark btn-lg btn-block" ><span class="fas fa-heart" style="color:rgb(233,40,36);"></span> Seleccionar </a >
                                     </div>
                                  </div>
                                  <?php endforeach;?>
                            </div>              
                            
                    </div> 
                </div>
                   
                   
                   
                    
                  
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
<!-- /.content-wrapper -->