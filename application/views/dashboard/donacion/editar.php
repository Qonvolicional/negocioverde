
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Solictud de donación <small class="text-sm"><?php echo $donacion->nombres; ?></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right  accent-danger">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().$_SESSION['modulo_string']; ?>"><i class="fa fa-dashboard"></i> Solictudes de donación</a></li>
            <li class="breadcrumb-item active">Editar</li>
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
              <h3 class="card-title">Donante - <?php echo $donacion->nombres; ?></h3>
            </div>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url().$_SESSION['modulo_string']."/"; ?>">
            <form action="">
                <input type="hidden" value="<?php echo $donacion->id; ?>" name="id">
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="">(*)Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $donacion->nombres; ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidos">(*)Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $donacion->apellidos; ?>" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="">(*)Celular</label>
                        <input type="text" name="celular" id="celular" class="form-control" value="<?php echo $donacion->celular; ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="fijo">Telefono fijo</label>
                        <input type="text" name="fijo" id="fijo" class="form-control" value="<?php echo $donacion->fijo; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo electronico</label>
                      <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $donacion->correo; ?>" readonly>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="pais_id">Pais</label>
                        <select name="pais_id" id="pais_id" class="form-control select2" disabled>
                          <option value="0">Selecciona una opcion</option>
                          <?php if(!empty($paises)):?>
                            <?php foreach($paises as $pais):?>
                              <option value="<?php echo $pais->id; ?>" <?php echo ($pais->id=$donacion->pais_id)?'selected':''; ?> > <?php echo $pais->nombre; ?> </option>
                            <?php endforeach;?>
                          <?php endif;?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="departamento_id">Departamento</label>
                        <select name="departamento_id" id="departamento_id" class="form-control select2" disabled>
                           <option value="0">Selecciona una opcion</option>
                          <?php if(!empty($departamentos)):?>
                            <?php foreach($departamentos as $departamento):?>
                              <option value="<?php echo $departamento->id; ?>" <?php echo ($departamento->id=$donacion->departamento_id)?'selected':''; ?>> <?php echo $departamento->nombre; ?> </option>
                            <?php endforeach;?>
                          <?php endif;?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="municipio_id">(*)Municipio</label>
                        <select name="municipio_id" id="municipio_id" class="form-control select2" disabled>
                          <option value="0">Selecciona una opcion</option>
                          <?php if(!empty($municipios)):?>
                            <?php foreach($municipios as $municipio):?>
                              <option value="<?php echo $municipio->id; ?>" <?php echo ($municipio->id=$donacion->municipio_id)?'selected':''; ?> > <?php echo $municipio->nombre; ?> </option>
                            <?php endforeach;?>
                          <?php endif;?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $donacion->direccion; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">(*)Mensaje</label>
                      <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required readonly> <?php echo $donacion->mensaje; ?></textarea>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="ml-auto">
                        <a href="<?php echo base_url().$_SESSION['modulo_string']; ?>" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>
                    </div>
                </div>              
            </form>
          </div>
        </div>
      </div>
    </div> 
  </section>
</div>
<!-- /.content-wrapper -->