
<section class="container-fluid" style="position: relative; width: 100%;">
  <div class="d-flex flex-md-row flex-column py-5">
    <div class="ml-auto col-md-12 col-sm-12 mr-4 p-3" style="">
      <div class="container card">
        <hr class="my-4">
        <form action="<?php echo base_url(); ?>solicitudDonacion/almacenar" method="POST" class="container text-sm">
          <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>solicitudDonacion/">
          <div class="card-body">
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
                <label for="">(*)Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
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
              <label for="">(*)Mensaje</label>
              <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required></textarea>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
              <button type="submit" style="font-size:16px; background: transparent;border: 1px solid red;color: red; padding: 5px 30px;">Enviar solicitud  </i> <i class="fas fa-hands-helping pl-2"></i></button>
            </div>
          </div>
          
        </form>
       
      </div>
    </div>
  </div>
</section>
