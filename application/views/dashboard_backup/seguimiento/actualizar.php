<div class="content-wrapper">
	
	<section class="content-header">
      <h1>
        Actualizar Seguimiento - <small><?php echo $empresa->razon_social ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li><a href="<?php echo base_url(); ?>seguimiento/<?php echo $empresa->id; ?>">Seguimiento</a></li>
        <li class="active">Modificar</li>
      </ol>
    </section>

   <section class="content">
   	 <!-- Default box -->
        <div class="box box-success">
        	<div class="box-header">
        		<?php if($this->session->flashdata('alert_message')): ?>
        			<div class="<?php echo $this->session->flashdata('alert_message'); ?>"><strong><?php echo $this->session->flashdata('message'); ?></strong></div>
        		<? endif; ?>
        	</div>
            <div class="box-body">
            		 	 <form action="<?php echo base_url();?>seguimiento/actualizar" method="POST" enctype="multipart/form-data">
            		 	 	<input type="hidden" name="empresa_id" value="<?php echo $empresa->id; ?>">
            		 	 	<input type="hidden" name="seguimiento_id" value="<?php echo $seguimiento->id; ?>">
            		 	 	<div class="row">
								<div class="col-md-12">
									<h3>Indicadores del Seguimiento</h3>
								</div>
							</div>
            		 	 	<div class="row">	
            		 	 		
            		 	 		<div class="col-md-12">
									<select id="select-indicador" name="indicadores[]" multiple="multiple" class="form-control" required>
										<?php 
										foreach ($indicadores_mejora as $key => $value):?>
											<option value="<?php echo $value->id; ?>" selected><?php echo $value->nombre; ?></option>
										<?php endforeach; ?>
										<?php foreach ($indicadores_mejora_general as $key => $value):?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
										<?php endforeach; ?>
									</select>
            		 	 		</div>
            		 	 	</div>
            		 	 	<div class="row">
            		 	 		 <div class="col-md-12">
	                           		 <div class="form-group <?php echo form_error('lugar') == true ? 'has-error':''?>">
	                                <label for="lugar">Lugar :</label>
	                                <input type="text" class="form-control" id="lugar" name="lugar" value="<?php echo $seguimiento->lugar; ?>" required>
	                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
	                            </div>
	                          </div>

							</div>
							
							<div class="row">
            		 	 		 <div class="col-md-4">
	                           		 <div class="form-group <?php echo form_error('fecha') == true ? 'has-error':''?>">
	                                <label for="fecha">Fecha :</label>
	                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $seguimiento->fecha; ?>" required>
	                                <?php echo form_error("fecha","<span class='help-block'>","</span>");?>
	                           		 </div>
	                          	</div>

	                          	<div class="col-md-4">
	                           		 <div class="form-group <?php echo form_error('h_inicio') == true ? 'has-error':''?>">
	                                <label for="h_inicio">Hora de Inicio :</label>
	                                <input type="time" class="form-control" id="h_inicio" name="h_inicio" value="<?php echo $seguimiento->hora_inicio; ?>" required>
	                                <?php echo form_error("h_inicio","<span class='help-block'>","</span>");?>
	                           		 </div>
	                          	</div>
								
								<div class="col-md-4">
	                           		 <div class="form-group <?php echo form_error('h_fin') == true ? 'has-error':''?>">
	                                <label for="h_fin">Hora de Terminación :</label>
	                                <input type="time" class="form-control" id="h_fin" name="h_fin" value="<?php echo $seguimiento->hora_fin; ?>" required>
	                                <?php echo form_error("h_fin","<span class='help-block'>","</span>");?>
	                           		 </div>
	                          	</div>
							</div>
						
							<div class="row">
            		 	 		 <div class="col-md-12">
	                           		 <div class="form-group <?php echo form_error('temas') == true ? 'has-error':''?>">
	                                <label for="temas">Tematicas Tratadas <small>Separar por comas (,)</small> :</label>
	                                <input type="text" class="form-control" id="temas" name="temas" value="<?php echo $seguimiento->temas_tratados; ?>" required>
	                                <?php echo form_error("temas","<span class='help-block'>","</span>");?>
	                            </div>
	                          </div>
							</div>


							<div class="row">
            		 	 		 <div class="col-md-12">
	                           		 <div class="form-group <?php echo form_error('desarrollo') == true ? 'has-error':''?>">
	                                <label for="desarrollo">Desarrollo de la Reunion:</label>
	                                <textarea  class="form-control" id="desarrollo" name="desarrollo" required><?php echo $seguimiento->desarrollo; ?></textarea>
	                                <?php echo form_error("desarrollo","<span class='help-block'>","</span>");?>
	                            </div>
	                          </div>
							</div>

							<div class="row">
            		 	 		 <div class="col-md-12">
	                           		 <div class="form-group <?php echo form_error('desarrollo') == true ? 'has-error':''?>">
	                                <label for="acuerdos">Acuerdos: </label>
	                                <textarea class="form-control" id="acuerdos" name="acuerdos"  required><?php echo $seguimiento->acuerdos; ?></textarea>
	                                <?php echo form_error("acuerdos","<span class='help-block'>","</span>");?>
	                            </div>
	                          </div>
							</div>

							<div class="row">
            		 	 		 <div class="col-md-12">
	                           		 <div class="form-group <?php echo form_error('compromisos') == true ? 'has-error':''?>">
	                                <label for="compromisos">Compromisos: </label>
	                                <textarea class="form-control" id="compromisos" name="compromisos" required><?php echo $seguimiento->compromisos; ?></textarea>
	                                <?php echo form_error("compromisos","<span class='help-block'>","</span>");?>
	                            </div>
	                          </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div>
										<?php if(!empty($seguimiento->nombre_archivo)): ?>
										<span class="label label-info" id="nombre_archivo">Nombre del archivo: <?php echo $seguimiento->nombre_archivo; ?></span>
									<?php endif; ?>
									</div>
									<div class="form-group">
										<label for="soporte" class="btn btn-info"><span class="glyphicon glyphicon-file"></span> Adjuntar documento soporte</label> 
										<input type="file" name="soporte" id="soporte" style="display: none;"">
									</div>

								</div>
							</div>
                            <div class="row">
	            		 	 	 <div class="col-md-12">
		                            <div class="form-group">
		                                <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
		                            </div>
		                         </div>
	                   		</div>
                         
                        </form>
            	   </div>	 
         </div>
    </section>
</div>

<script type="text/javascript">
	document.getElementById("soporte").addEventListener('change', function(evt){
		let file = evt.target.files[0];
		document.getElementById("nombre_archivo").innerText = "Nombre del archivo: "+ file.name + " - ("+ file.type +")";
	});
</script>