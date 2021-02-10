<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormatoAS extends CI_Controller {

	public function __construct(){
	    parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("NegocioVerde_model");
		    $this->load->model("FormatoAS_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->verificador_id = $this->session->userdata("usuario");
			$admin = $this->session->userdata("admin");
			$this->moduloControlador = array(
				'modulos' => ($admin)?$this->Modulo_model->getModulos():$this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $admin,
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}
		
	}

	public function editar($empresa_id){
		$this->session->set_userdata('empresa_id', $empresa_id);
		$data = array(
			'empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
			'tenencia_tierra' => $this->NegocioVerde_model->getOpcionesLike('TT'),
			'empresaTenencia' => $this->NegocioVerde_model->getInformacionEmpresa('tenencia_tierra', $empresa_id),
			'empresaRegistro' => $this->NegocioVerde_model->getInformacionEmpresa('registro', $empresa_id),
			'empresaPermiso' => $this->NegocioVerde_model->getInformacionEmpresa('permiso', $empresa_id),
			'empresaLicencia' => $this->NegocioVerde_model->getInformacionEmpresa('licencia', $empresa_id),
			'empresaPrograma' => $this->NegocioVerde_model->getInformacionEmpresa('programa', $empresa_id),
			'empresaConservacion' => $this->NegocioVerde_model->getInformacionEmpresa('conservacion', $empresa_id),
			'empresaEcosistema' => $this->NegocioVerde_model->getInformacionEmpresa('ecosistema', $empresa_id),
			'empresaPlan' => $this->NegocioVerde_model->getInformacionEmpresa('plan_manejo', $empresa_id),
			'empresaCertificacion' => $this->NegocioVerde_model->getInformacionEmpresa('certificacion', $empresa_id),
			'empresaInvolucra' => $this->NegocioVerde_model->getInformacionEmpresa('involucra', $empresa_id),
			'empresaActividad' => $this->NegocioVerde_model->getInformacionEmpresa('actividades', $empresa_id),
			'empresaApoyo' => $this->NegocioVerde_model->getInformacionEmpresa('institucion', $empresa_id),
			'empresaEconomia' => $this->NegocioVerde_model->getInformacionEmpresa('sost_economica', $empresa_id),
			'otroLegislacion' => $this->NegocioVerde_model->getInformacionEmpresaRow('otros_legislacion', $empresa_id),
			'otroCertificacion' => $this->NegocioVerde_model->getInformacionEmpresaRow('otros_certificacion', $empresa_id),
			'otroEcosistema' => $this->NegocioVerde_model->getInformacionEmpresaRow('otros_ecosistema', $empresa_id),
			'otroConservacion' => $this->NegocioVerde_model->getInformacionEmpresaRow('otros_conservacion', $empresa_id),
			'otroEcosistema' => $this->NegocioVerde_model->getInformacionEmpresaRow('otros_ecosistema', $empresa_id),
			'otroActividad' => $this->NegocioVerde_model->getInformacionEmpresaRow('otro_actividades', $empresa_id),
			'otroTenencia' => $this->NegocioVerde_model->getInformacionEmpresaRow('otro_tenencia_tierra', $empresa_id),
			'otroPrograma' => $this->NegocioVerde_model->getInformacionEmpresaRow('otro_programa', $empresa_id),
			'otroInvolucra' => $this->NegocioVerde_model->getInformacionEmpresaRow('otro_involucra', $empresa_id),
			'otroActividad' => $this->NegocioVerde_model->getInformacionEmpresaRow('otro_actividades', $empresa_id),
			'registro' => $this->NegocioVerde_model->getOpcionesLike('RR'),
			'permiso' => $this->NegocioVerde_model->getOpcionesLike('PL'),
			'licencia' => $this->NegocioVerde_model->getOpcionesLike('LL'),
			'certificacion' => $this->NegocioVerde_model->getOpcionesLike('CE'),
			'involucra' => $this->NegocioVerde_model->getOpcionesLike('INVOLUCRA'),
			'actividad_involucra' => $this->NegocioVerde_model->getOpcionesLike('ACTIVIDAD_COMU'),
			'canal_comercializacion' => $this->NegocioVerde_model->getOpcionesLike('CANAL_COMERZIALIZA'),
			'forma_pago' => $this->NegocioVerde_model->getOpcionesLike('FORMA_PAGO'),
			'mecanismo_venta' => $this->NegocioVerde_model->getOpcionesLike('MECANISMO_VENTA'),
			'estado_crecimiento' => $this->NegocioVerde_model->getOpcionesLike('ESTADO_CRECIMIENTO'),
			'recursos' => $this->NegocioVerde_model->getOpciones('recurso'),

			'practica_conservacion' => $this->NegocioVerde_model->getOpcionesLike('PC'),
			'area_ecosistema' => $this->NegocioVerde_model->getOpcionesLike('AREA_ECO'),
			'plan_manejo' => $this->NegocioVerde_model->getOpcionesLike('PM'),
			'cumple' => $this->NegocioVerde_model->getOpciones('cumple_nocumple'),
			'aplica' => $this->NegocioVerde_model->getOpciones('aplica_noaplica'),
			'etapa' => $this->NegocioVerde_model->getOpciones('etapa'),
			'recurso' => $this->NegocioVerde_model->getOpciones('recurso'),
			'orientacion' => $this->NegocioVerde_model->getOpciones('orientacion'),
			'unidad' => $this->NegocioVerde_model->getOpciones('unidad_medida'),
			'bien_servicio' => $this->NegocioVerde_model->getInformacionEmpresa('caracterizacion_empresa_bien_servicio', $empresa_id),
			'cantidadOtroCert' => $this->FormatoAS_model->getNumRows('otros_certificacion', $empresa_id),
			'cantidadCertificacion' => $this->FormatoAS_model->getCheckConfirmacion('certificacion', $empresa_id),
			'cantidadOtroInv' => $this->FormatoAS_model->getNumRows('otro_involucra', $empresa_id),
			'cantidadInvolucra' => $this->FormatoAS_model->getCheckConfirmacion('involucra', $empresa_id),
			'cantidadOtroAct' => $this->FormatoAS_model->getNumRows('otro_actividades', $empresa_id),
			'cantidadActividad' => $this->FormatoAS_model->getCheckConfirmacion('actividades', $empresa_id),
			'cantidadOtroProg' => $this->FormatoAS_model->getNumRows('otro_programa', $empresa_id),
			'cantidadPrograma' => $this->FormatoAS_model->getCheckConfirmacion('programa', $empresa_id),
			'cantidadApoyo' => $this->FormatoAS_model->getNumRows('institucion', $empresa_id),
			'fuente_energia' => $this->FormatoAS_model->getFunteEnergia(),
			'fuente_energia_consumo' => $this->FormatoAS_model->getFunteEnergiaConsumo(),
			'eliminacion_basura' => $this->NegocioVerde_model->getOpciones("eliminacion_basura"),
			'tipo_residuo' => $this->NegocioVerde_model->getOpciones("tipo_residuo"),
			'tipo_residuo_peligroso' => $this->NegocioVerde_model->getOpciones("residuo_peligroso"),
			'area_conservacion' => $this->NegocioVerde_model->getOpcionesLike('AREA_CONSERVACION'),
			'tipo_disposicion_residuo' => $this->NegocioVerde_model->getOpciones("disposicion_residuo"),
			'tipo_apoyo' =>  $this->NegocioVerde_model->getOpcionesLike("TIPO_APOYO"),
			'afirmacion' => $this->NegocioVerde_model->getOpciones('si_no'),
			//'caracterizacion_bien_servicio_empresa' => $this->NegocioVerde_model->
		);

		$jquery = array('jquery' => 'formatoAS.js');
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/formatoAS/editar", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenarTenenciaTierra(){
		$empresa_id = $this->session->userdata('empresa_id');
		$tenencia_tierra = $this->input->post('tenencia_tierra');
		$otra_tenencia_tierra = $this->input->post('otro_tenencia_tierra');
		$tablas = array('otro_tenencia_tierra', 'tenencia_tierra');
		$mensaje = array();
		
		$this->FormatoAS_model->eliminarRegistros('tenencia_tierra', $empresa_id);
		if(!empty($tenencia_tierra) && $this->FormatoAS_model->guardarRegistrosBatch('tenencia_tierra', $tenencia_tierra)){
			$this->FormatoAS_model->eliminarRegistros('otro_tenencia_tierra', $empresa_id);
			if(!empty($otra_tenencia_tierra)){
				if($this->FormatoAS_model->guardarRegistrosBatch('otro_tenencia_tierra', $otra_tenencia_tierra)){
					$mensaje['error'] = 1;
					$mensaje['fase'] = 'Se guarda con exito la información la información de tenencia y la adicional';
				}else{
					$mensaje['error'] = -1;
					$mensaje['fase'] = 'No se pudo guardar la información adicional de tenencia de tierra';
				}
			}else{
				$mensaje['error'] = 1;
				$mensaje['fase'] = 'Se guarda con exito la información';
			}
		}else{
			//echo "hola";
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se pudo guardar la información relacionada con tenencia de tierra';
		}
		
		echo json_encode($mensaje);
	}

	public function almacenarLegislacionAmbiental(){
		$empresa_id = $this->session->userdata('empresa_id');
		$licencia = $this->input->post('licencia');
		$permiso = $this->input->post('permiso');
		$registro = $this->input->post('registro');
		$otros_legislacion = $this->input->post('otros_legislacion');
		$mensaje = array();
		
		$this->FormatoAS_model->eliminarRegistros('registro', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('permiso', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('licencia', $empresa_id);
		//var_dump($permiso);
		//$this->FormatoAS_model->guardarRegistrosBatch('registro', $registro);
		
		if(!empty($registro) && $this->FormatoAS_model->guardarRegistrosBatch('registro', $registro)){
			$this->FormatoAS_model->eliminarRegistros('otros_legislacion', $empresa_id);
			if(!empty($permiso) && $this->FormatoAS_model->guardarRegistrosBatch('permiso', $permiso)){
				if(!empty($licencia) && $this->FormatoAS_model->guardarRegistrosBatch('licencia', $licencia)){
						if(!empty($otros_legislacion)){
							if($this->FormatoAS_model->guardarRegistrosBatch('otros_legislacion', $otros_legislacion)){
								$mensaje['error'] = 1;
								$mensaje['fase'] = 'Se guarda con exito la información';
							}else{
								$mensaje['error'] = -1;
								$mensaje['fase'] = 'Error';
							}
						}else{
							$mensaje['error'] = 1;
							$mensaje['fase'] = 'Se guarda con exito la información';
						}
				}else{
					$mensaje['error'] = -1;
					$mensaje['fase'] = 'Error. No se pudo guardar la información sobre las licencias';
				}
			}else{
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error. No se pudo guardar la información sobre los permisos';
			}
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se pudo guardar la información relacionada con la legislacion ambiental';
		}
		echo json_encode($mensaje);
	}	

	public function almacenarCertificacion(){
		$empresa_id = $this->session->userdata('empresa_id');
		$certificacion = $this->input->post('certificacion');
		$otroCertificacion = $this->input->post('otros_certificacion');
		$mensaje = array();
		//var_dump($certificacion);	
		$this->FormatoAS_model->eliminarRegistros('certificacion', $empresa_id);
		if(!empty($certificacion) && $this->FormatoAS_model->guardarRegistrosBatch('certificacion', $certificacion)){
			$this->FormatoAS_model->eliminarRegistros('otros_certificacion', $empresa_id);
			if(!empty($otroCertificacion) && $this->FormatoAS_model->guardarRegistrosBatch('otros_certificacion', $otroCertificacion))
			{
				$mensaje['error'] = 1;
				$mensaje['fase'] = 'Se guarda con exito la información';
			}elseif(empty($otroCertificacion)){
				$mensaje['error'] = 1;
				$mensaje['fase'] = 'Se guarda con exito la información. Pero no había registros para agregar nuevas categorias de certificación.';
			}else{
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error. No se pudo guardar la información de otras certificaciones';
			}
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se pudo guardar la información relacionada con las certificaciones del negicio';
		}
		echo json_encode($mensaje);
	}

	public function almacenarSostenibilidadAmbiental(){
		$mensaje = array();
		$area_conservacion = json_decode($this->input->post("area_conservacion"));
		$residuos_peligrosos = json_decode($this->input->post("residuos_peligrosos"));
		$residuos_reciclados = json_decode($this->input->post("residuos_reciclados"));

		if(is_null($this->input->post("empresa_id"))){
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'Error. No se pudo guardar la información sobre información de plan de manejo o mejora';
			echo json_encode($mensaje);
			exit();
		}

		if(is_null($residuos_peligrosos))
			$residuos_peligrosos = array();

		if(is_null($area_conservacion))
			$area_conservacion = array();

		if(is_null($residuos_reciclados))
			$residuos_reciclados = array();

		$empresa_id = $this->session->userdata('empresa_id');

		$sost_ambiental = array(
				'id_fuente_energia' => $this->input->post('tipo_fuente_energia'),
				'consumo_promedio_anio' => $this->input->post('input_fuente_consumo_anio'),
				'tipo_consumo_promedio_anio' => $this->input->post('opcion_fuente_consumo_anio'),
				'consumo_promedio_mensual' => $this->input->post('input_fuente_consumo_mensual'),
				'tipo_consumo_promedio_mensial' => $this->input->post('opcion_fuente_consumo_mensual'),
				'emisiones_co2' => $this->input->post('input_fuente_emisiones'), 
				'id_empresa' => $empresa_id

		);
		$sost_ambiental_agua =  array(
				'promedio_anio_anterior' => $this->input->post('input_agua_consumo_anio'),
				'promedio_actual' => $this->input->post('input_fuente_consumo_anio'),
				'tipo_unidad_medida' => $this->input->post('opcion_agua_consumo_anio'),
				'consumo_promedio_mensual' => $this->input->post('input_agua_consumo_actual'),
				'id_empresa' => $empresa_id
				
				

		);
		$sost_ambiental_residuo =  array(
				'empresa_id' => $empresa_id,
				'cantidad' => $this->input->post('input_residuo_consumo'),
				'tipo_unidad' => $this->input->post('opcion_residuo_consumo'),
				'creado' => strftime("Y-m-d"), 
				'descripcion' => $this->input->post('input_descripcion_residuo_consumo'),
		);

		$sost_ambiental_residuo_reciclado = array();
		foreach ($residuos_reciclados as $item) {
			$sost_ambiental_residuo_reciclado[] =  array(
					'empresa_id' => $empresa_id,
					'tipo_residuo' => $item['opcion_residuo_recicla_tipo'],
					'proceso_productivo' => $item['option_residuo_recicla_productivo'],
					'cantidad_promedio' => $item['input_residuo_recicla_promedio'],
					'reincorpora' => $item['input_residuo_recicla_parte_reincorpora'],
			);
		}

		$sost_ambiental_residuo_peligroso = array();
		foreach ($residuos_peligrosos as $item) {
			$sost_ambiental_residuo_peligroso[] =  array(
					'empresa_id' => $empresa_id,
					'tipo_residuo_peligroso' => $item['opcion_residuo_peligroso_genera_residuo'],
					'cantidad_residuo' => $item['input_residuo_peligroso_cantidad_residuo'],
					'tipo_desposicion' => $item['opcion_residuo_peligroso_dispocision_residuo']
			);
		}

		$sost_ambiental_area_conservacion = array();
		foreach ($area_conservacion as $item) {
			$sost_ambiental_area_conservacion[] =  array(
					'empresa_id' => $empresa_id,
					'opciones_id' => $item['opcion_area_conservacion'],
					'area' => $item['input_area_conservacion'],
					'confirmacion' => 1,
					'unidad' => $item['opcion_area_conservacion_tipo'],
					'area_valor' =>  $item['input_area_conservacion'],
			);
		}
		
		
		$this->FormatoAS_model->eliminarRegistros('sost_ambiental', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('sost_ambiental_agua', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('sost_ambiental_residuo', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('sost_ambiental_residuo_reciclado', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('sost_ambiental_residuo_peligroso', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('ecosistema', $empresa_id);
		
		if($this->FormatoAS_model->guardarRegistros('sost_ambiental',$sost_ambiental)){
			if($this->FormatoAS_model->guardarRegistros('sost_ambiental_agua', $sost_ambiental_agua)){
				if($this->FormatoAS_model->guardarRegistros('sost_ambiental_residuo', $sost_ambiental_residuo)){

					$mensaje['error'] = 1;
					$mensaje['fase'] = 'Se guarda con exito la información';
				}else{
					$mensaje['error'] = -1;
					$mensaje['fase'] = 'Error. No se pudo guardar la información sobre información de plan de manejo o mejora';
				}
			}else{
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error. No se pudo guardar la información sobre información de ecosistemas';
			}
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se pudo guardar la información relacionada sobre información de conservación';
		}
		echo json_encode($mensaje);
	}

	public function almacenarSostenibilidadSocial(){
		$empresa_id = $this->session->userdata('empresa_id');
		$actividades = $this->input->post('actividades');
		$involucra = $this->input->post('involucra');
		$instituciones = $this->input->post('instituciones');
		$programa = $this->input->post('programa');
		$otro_involucra = $this->input->post('otro_involucra');
		$otro_actividades = $this->input->post('otro_actividades');
		$otro_programa = $this->input->post('otro_programa');
		$mensaje = array('error'=>1, 'fase'=>"",);
		
		$this->FormatoAS_model->eliminarRegistros('actividades', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('involucra', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('institucion', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('programa', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('otro_involucra', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('otro_actividades', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('otro_programa', $empresa_id);

		if(!empty($involucra)){
			if($this->FormatoAS_model->guardarRegistrosBatch('involucra', $involucra)){
				$mensaje['fase'].=" Guardo con exito la información de involucra.";
				if(!empty($otro_involucra)){
					$this->FormatoAS_model->guardarRegistrosBatch('otro_involucra', $otro_involucra);
				}
			}else{
				$mensaje['error']=-1;
				$mensaje['fase'].=" No se pudo guardar la información de involucra";
			}
		}
		
		if(!empty($actividades)){
			if($this->FormatoAS_model->guardarRegistrosBatch('actividades', $actividades)){
				$mensaje['fase'].=" Guardo con exito la información de actividades.";
				if(!empty($otro_actividades)){
					$this->FormatoAS_model->guardarRegistrosBatch('otro_actividades', $otro_actividades);
				}
			}else{
				$mensaje['error']=-1;
				$mensaje['fase'].=" No se pudo guardar la información de actividades";
			}
		}

		if(!empty($programa)){
			if($this->FormatoAS_model->guardarRegistrosBatch('programa', $programa)){
				$mensaje['fase'].=" Guardo con exito la información de programa.";
				if(!empty($otro_programa)){
					$this->FormatoAS_model->guardarRegistrosBatch('otro_programa', $otro_programa);
				}
			}else{
				$mensaje['error']=-1;
				$mensaje['fase'].=" No se pudo guardar la información de programa";
			}
		}

		if(!empty($instituciones)){
			if($this->FormatoAS_model->guardarRegistrosBatch('institucion', $instituciones)){
				$mensaje['fase'].=" Guardo con exito la información de instituciones.";
			}else{
				$mensaje['error']=-1;
				$mensaje['fase'].=" No se pudo guardar la información de instituciones";
			}
		}
		echo json_encode($mensaje);
	}

	public function almacenarSostenibilidadEconomica(){
		$empresa_id = $this->session->userdata('empresa_id');
		$bien_servicio = $this->input->post("bien_servicio");
		$costo_insumos = $this->input->post("costo_insumos");
		$costo_mano_obra = $this->input->post("costo_mano_obra");
		$total_ventas = $this->input->post("total_ventas");
		$mensaje = array('error'=>1, 'fase'=>'Se guardo correctamente la información.');
		//Eliminando los registros pasados
		$this->FormatoAS_model->eliminarRegistros('sost_economica', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('costo_insumos', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('costo_mano_obra', $empresa_id);
		$this->FormatoAS_model->eliminarRegistros('total_ventas', $empresa_id);
		//var_dump($costo_insumos);
		//Guardando los nuevos valores
		if(!empty($bien_servicio))$this->FormatoAS_model->guardarRegistrosBatch('sost_economica', $bien_servicio);
		if(!empty($costo_insumos))$this->FormatoAS_model->guardarRegistrosBatch('costo_insumos', $costo_insumos);
		if(!empty($costo_mano_obra))$this->FormatoAS_model->guardarRegistrosBatch('costo_mano_obra', $costo_mano_obra);
		if(!empty($total_ventas))$this->FormatoAS_model->guardarRegistrosBatch('total_ventas', $total_ventas);
		$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_as'=>1));

		echo json_encode($mensaje);
	}	
}