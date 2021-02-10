
<section class="container">
  <div class="d-flex flex-md-row flex-column py-5">
    <div class= col-md-8 col-sm-12 jumbotron shadow-lg mr-4 p-3" style="">
      <div class="container card">
        <form action="<?php echo base_url(); ?>apadrinamiento/recibir-solicitud" method="POST" class="container text-sm">
          <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>solicitudDonacion/">
          <input type="hidden" name="id_referente" id="base_url" value="<?php echo $id_referente; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h2>Formulario de apadrinamiento</h2>
                <?php if($this->session->flashdata('error_apadrinamiento')): ?>
                                <h4 class="vibrant-color">Gracias por tu interés de apadrinar un referente, lastimosamente estamos  nuestros servicios no están funcionando correctamente, por favor intente más tarde
                .Puedes comunicarte usando la información de contacto e informar, nos comunicaremos! 
                </h4>
              <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">(*)Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label for="apellidos">(*)Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                 <div><small style="font-style: italic;">Lo utilizaremos para contacterte luego</small></div>
                <label for="">(*)Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                  <div><small style="font-style: italic;">opcional</small></div>
                <label for="fijo">Telefono fijo</label>
                <input type="text" name="fijo" id="fijo" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="correo">Correo electronico</label>
              <input type="email" name="correo" id="correo" class="form-control" required>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label for="pais_id">Pais</label>
                <select name="pais_id" id="pais_id" class="form-control select2">
                  <option value="0">Selecciona una opcion</option>
                  <?php if(!empty($paises)):?>
                    <?php foreach($paises as $pais):?>
                      <option value="<?php echo $pais->id; ?>"> <?php echo $pais->nombre; ?> </option>
                    <?php endforeach;?>
                  <?php endif;?>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="departamento_id">Departamento</label>
                <select name="departamento_id" id="departamento_id" class="form-control select2">
                  <option value="">Selecciona una opcion</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="municipio_id">(*)Municipio</label>
                <select name="municipio_id" id="municipio_id" class="form-control select2">
                  <option value="">Selecciona una opcion</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="">(*)Dejanos un Comentario</label>
              <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required></textarea>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
              <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-send" style="color:white;"></i> Enviar</button>
            </div>
          </div>
          
        </form>
       
      </div>
    </div>
    <?php 

                $imagen = ($perfil->sexo_id>1)?base_url()."assets/template/img/jch_6.png":base_url()."assets/template/img/avatar.png";

                $imagen_perfil = (file_exists(base_url().$perfil->foto))? $imagen:base_url().$perfil->foto;
              ?>
     <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp; margin-bottom: 25px;">
            <div class=" text-center">
              <div><h3>Referente</h3></div>
              <div class="post-thumb">
                  <div style="width:200px; height: 200px; 
                  background:url(<?php echo $imagen_perfil; ?>); 
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
                  <h4><a href="<?php echo base_url().'persona/perfil/'.$perfil->id; ?>" style="cursor: pointer;"><?php echo $perfil->nombre; ?></a></h4>
                  <span style="color:rgba(0,0,0,0.7);"><?php echo $perfil->rol; ?></span>
                  <a href="<?php echo base_url().'referente/perfil/'.$perfil->id; ?>" class="btn btn-dark  btn-lg btn-block"><i class="fa fa-heart" style="color:white;"></i> Ver perfil</a>
                </div>
                
              </div>
            </div>
          </div>
  </div>
</section>
