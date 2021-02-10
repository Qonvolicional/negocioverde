<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Usuario
        <small>Ver</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           
            <div class="row">
                <div class="col-sm-12">
                    
                    <div class="row col-sm-3 pull-right">
                        <a class="btn btn-block btn-social btn-success col-sm-3">
                            <i class="fa fa-plus"></i> Agregar Nuevo Contenido
                        </a>
                    </div>
                    <br/> <br/> <br/>
                    
                    
                    <?php // print_r($menu); ?>
                    
             
                </div>
            </div>

             

          
        </div>
    </div>


    <div class="box box-success col-sm-4">
    <div class="box-header with-border">
        <h3 class="box-title">Creacion de Menu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?php echo base_url(); ?>cms/menu/guardar">
        <div class="box-body">
           <div class="row">
                <div class="form-group">
                    <label for="posicionmenu">Posicion Menu</label>
                    <select class="form-control input-lg" name="posicionmenu" id="posicionmenu">
                        <option>Seleccione la Posicion del Menu</option>
                        <?php foreach ($tipomenu as $tm) {
                            echo "<option value='$tm->nameType'>$tm->nameType</option>";
                        } ?>

                    </select>
                </div>
           </div>
            <div class="row">
                    <div class="form-group">
                        <label for="nivelmenu">Nivel Menu</label>
                        <select class="form-control input-lg" id="nivelmenu" name="nivelmenu">
                            <option>Seleccione el nivel del Menu</option>
                            <option value="0">Menu Padre</option>
                            <option value="1">Menu Hijo</option>
                        </select>
                    </div>
               </div>

           <div class="row">
                <div class="form-group">
                    <label for="nombremenu">Nombre del Menu</label> 
                    <input type="text" class="form-control" id="nombremenu" name="nombremenu" placeholder="Ingrese el Nombre del Menu">
                </div>
           </div>

           <div class="row">
                    <div class="form-group">
                        <label for="funcionalidad">Contenido a asignar al Menu</label>
                        <select class="form-control input-lg" name="funcionalidad" id="funcionalidad">
                            <option>Seleccione una opcion de la lista</option>
                            <option value="c">contenido</option>
                            <option value="m">Modulo</option>
                        </select>
                    </div>
               </div>

            <div class="row" id="contenidoDiv">
                <div class="form-group">
                  <label for="slugArticulo">Select contenido de la lista</label>
                  <select multiple="" class="form-control" style="height: 100px;" id="slugArticulo" name="slugArticulo">
                    <?php 
                        foreach ($contenido as $cnt) {
                            echo "<option value='$cnt->id'>$cnt->titulo</option>";
                        }
                    ?>
                  </select>
                </div>
            </div>

            <div class="row" id="organizarDiv">
                <div class="form-group">
                  <label>Ubicar despues de</label>
                  <select multiple="" class="form-control" style="height: 200px;">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
            </div>

            <div class="row" id="moduloDiv">
                <div class="form-group">
                  <label>Select Modulo de la lista</label>
                  <select multiple="" class="form-control" style="height: 200px;">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
            </div>


            <div class="row" id="moduloDiv">
                <div class="form-group">
                  <label>Select estado del menu</label>
                  <select multiple="" class="form-control">
                    <option>Activo</option>
                    <option>Inactivo</option>
                  </select>
                </div>
            </div>


            
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Guardar menu</button>
        </div>
    </form>
</div>   
    <!-- /.box-body -->
</div>
    </section>	
</div>