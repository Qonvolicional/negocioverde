<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanMejora extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("NegocioVerde_model");
			$this->load->model("PlanMejora_model");
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

	public function index($empresa_id){
		$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
					'cumplimiento_legal' => $this->PlanMejora_model->getOpcionesVerirfiacionUno('CUMPLIMIENTO_LEGAL', $empresa_id),
					'condiciones_laborales' => $this->PlanMejora_model->getOpcionesVerirfiacionUno('CONDICION_LABORAL', $empresa_id),
					'impacto_ambiental' => $this->PlanMejora_model->getOpcionesVerirfiacionUno('IMPACTO_AMBIENTAL', $empresa_id),
					'impacto_social' => $this->PlanMejora_model->getOpcionesVerirfiacionUno('IMPACTO_SOCIAL', $empresa_id),
					'sustancia_material' => $this->PlanMejora_model->getOpcionesVerirfiacionUno('MATERIAL_PELIGROSO', $empresa_id),
					'viabilidad_economica' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('VIABILIDAD_ECONOMICA', $empresa_id),
					'impacto_ambienta_positivo' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('CONTRIBUCION_CONSERVACION', $empresa_id),
					'enfoque_ciclo_vida' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('CICLO_VIDA', $empresa_id),
					'vida_util' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('VIDA_UTIL', $empresa_id),
					'sustitucion_sustancias' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('SUSTITUCION_MATERIALES', $empresa_id),
					'reciclabilidad' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('SOSTENIBLE_RECURSO', $empresa_id),
					'uso_eficiente_sostenible' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('SOSTENIBLE_RECURSO', $empresa_id),
					'responsabilidad_interior' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('RESPO_SOCIAL_EMPRESA', $empresa_id),
					'responsabilidad_cadena' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('RESPO_SOCIAL_VALOR', $empresa_id),
					'responsabilidad_exterior' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('RESPO_SOCIAL_EXTERIOR', $empresa_id),
					'comunicacion_atributos' => $this->PlanMejora_model->getOpcionesVerirfiacionDos('COMUNICACION_ATRIBUTOS', $empresa_id),
					'estado_mes' => array("1" => True,
										"0" => False)

			);

		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar",$this->moduloControlador);
		$this->load->view("dashboard/planMejora/agregar", $data);
		$this->load->view("layouts/dashboard/footer");
		$this->load->view("dashboard/planMejora/script");
	}

	public function guardar(){

		$opcion_data = json_decode($this->input->post('opcion_data'));
		$registro = array();
		foreach ($opcion_data as $key => $value) {
			if($this->PlanMejora_model->guardarPlan($value, $this->input->post('empresa_id'))){
				$registro[] = $value->opcion_id;
			}
		}
		var_dump($registro);
	}
}