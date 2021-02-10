<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permios
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                        <form class="col-md-offset-1 col-md-8" style="margin-top: 2em;">
                            <div class="form-group row">
                                <label class="col-md-1 text-right"for="nombre">Roles:</label>
                                <div class="col-md-11">
                                    <select name="rol_id" id="rol_id" class="form-control permisos">
                                        <option value="" selected>Seleccione una opción</option>
                                        <?php if(!empty($roles)):?>
                                            <?php foreach($roles as $rol):?>
                                                <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre;?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modulos" id="modulos" style="display: none;">
                                <label class="">Modulos:</label>
                                <div class="form-group row col-md-offset-1 col-md-11">
                                <?php if(!empty($modulos)): ?>
                                  <?php foreach ($modulos as $m): ?> 
                                    <!--Inicio-->
                                    <div class="form-check">  
                                      <label class="checkbox-inline" for="">
                                        <input class="form-check-input modulo" type="checkbox" name="modulo_id" id="modulo_id" value="<?php echo $m->id; ?>" ><?php echo $m->nombre; ?>
                                      </label>
                                    </div>                     
                                    <!--Cierre-->
                                  <?php endforeach; ?>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-success btn-flat pull-right" id="btn-guardarModuloRol">Guardar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->