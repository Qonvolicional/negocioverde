





<div class="content-wrapper">

    <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Datos de Contacto y Redes Sociales <small class="text-sm">Editar</small></h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right  accent-danger">

            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> JCH</a></li>

            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>referente"><i class="fa fa-dashboard"></i> Corporación</a></li>

            <li class="breadcrumb-item active">Editar</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div>

  </section>

  <?php 

    $imagen =base_url()."assets/template/img/jch_6.png";

    $imagen_perfil = ($empresa->imagen=="" || !file_exists(base_url().$empresa->imagen))? $imagen:base_url().$empresa->image;

  ?>

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <div class="card card-danger">

            <div class="card-header">

              <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edición <small class="badge badge-primary">Datos de Contacto</small></h3>

            </div>

            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()."referente/"; ?>">

            <div class="card-header bg-light">

                <div class="d-flex">

                    <img src="<?php echo $imagen_perfil; ?>" class="mx-auto rounded-circle img-responsive img-thumbnail" style="width: 150px; height: 150px;" alt="User Image" id="previsualizar"> 

                        <span id="editarImagen" class="fas fa-user-circle border border-dark bg-light text-danger" style="position: absolute; left: 54%; top: 70%; color: black; height: 20px; width:20px; font-size: 1.2em; text-align: center; opacity: 1; border-radius: 50%;"></span>

                </div>

            </div>

            <form role="form" action="<?php echo base_url();?>informacion/actualizar" method="post" enctype="multipart/form-data">

                <input type="hidden" name="corporacion_id" id="usuario_id" value="<?php echo $empresa->id; ?>">

                <h4 class="card-header display-5">Datos de Contacto</h4>

                <div id="datos_personales" class="card-body container">

                   

                                        

                    <div class="row">

                        <div class="form-group col col-md-6">

                            <label for="nombres">(*) Nombre</label>

                            <input type="text" name="nombre" id="nombres" class="form-control" placeholder="Nombres de la persona" value="<?php echo $empresa->nombre; ?>" required>

                        </div>

                        <div class="form-group col col-md-6">

                            <label for="correo">(*) Correo Electrónico</label>

                            <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="<?php echo $empresa->correo; ?>" required>

                        </div>

                    </div>



                    <div class="row">

                        

                        <div class="form-group col col-md-6">

                            <label for="horario_atenciom">Horario de atención</label>

                            <input type="text" name="horario_atencion" id="horario_atencion" class="form-control" placeholder="Horario de atención de la empresa" value="<?php echo $empresa->horario_atencion; ?>" required>

                        </div>



                        <div class="form-group col col-md-6">

                            <label for="telefono">Teléfono</label>

                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono de contacto" value="<?php echo $empresa->telefono; ?>" required>

                        </div>

                    </div>

               



                <h4 class="card-header display-5">Datos de perfil</h4>

                <input type="hidden" name="archivo_id" value="<?php echo $empresa->imagen_id; ?>">

                <div class="card-body container">

                    <div class="form-group">

                        <label for="">Imagen Corporativa</label>

                        <div class="custom-file">   

                            <input type="file" name="imagen" id="imagen" class="custom-file-input" accept="image/*">

                            <label class="custom-file-label">Seleccionar imagen de perfil...</label>

                        </div>

                    </div>



                    

                 

                    

                    <div class="form-group" id="redes_sociales">

                        <label>Redes sociales</label>

                        <div class="form-row">

                            <div class="form-group col-md-3">

                                <label for="">Facebook</label>

                                <input type="url" class="form-control" name="facebook" id="facebook" placeholder="Enlace de Facebook" value="<?php echo (!empty($empresa))?$empresa->facebook:""; ?>">

                            </div>

                            <div class="form-group col-md-3">

                                <label for="">Instagram</label>

                                <input type="url" class="form-control" name="instagram" id="instagram" placeholder="Enlace de Instagram" value="<?php echo (!empty($empresa))?$empresa->instagram:""; ?>">

                            </div>

                            <div class="form-group col-md-3">

                                <label for="">Twitter</label>

                                <input type="url" class="form-control" name="twitter" id="twitter" placeholder="Enlace de Twitter" value="<?php echo (!empty($empresa))?$empresa->twitter:""; ?>">

                            </div>

                            <div class="form-group col-md-3">

                                <label for="">Youtube</label>

                                <input type="url" class="form-control" name="youtube" id="youtube" placeholder="Enlace de Youtube" value="<?php echo (!empty($empresa))?$empresa->youtube:""; ?>">

                            </div>

                        </div>

                    </div>



                </div>



              

              <!-- /.card-body -->

              <!-- .card-footer -->

              <div class="card-footer d-flex">

                <div class="ml-auto btn-group">

                  <a href="<?php echo base_url(); ?>dashboard" name="btn-atras" id="btn-atras" class="btn bg-gradient-secondary" style="color:white;"><span class="fa fa-backward"> Atrás</span></a>

                  <button type="submit" class="btn bg-gradient-danger btn-flat active" name="btn-guardar" id="btn-guardar"><span class="fa fa-save"> Guardar</span></button>

                </div>

              </div>

              <!-- /.card-footer -->

            </form>

          </div>

        </div>

      </div>

    </div> 

  </section>

</div>