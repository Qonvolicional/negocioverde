<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificacionUno extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
    		$this->load->model("NegocioVerde_model");
    		$this->load->model("VerificacionUno_model");
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
		$varificacion_uno = $this->VerificacionUno_model->getVerificacionEmpresa($empresa_id);
		$verificacion_empresa = array();
		foreach ($varificacion_uno as $key => $value) {
			$verificacion_empresa[$value->opciones_id] = $value;
		}
		$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
					 'verificacion_uno' => $verificacion_empresa,
					  'cumplimiento_legal' => $this->VerificacionUno_model->getComuplimientoLegalOpciones(),
					  'condiciones_laborales' => $this->VerificacionUno_model->getCondicionesLaboralesOpciones(),
					  'impacto_ambiental' => $this->VerificacionUno_model->getImpactoAmbientalOpciones(),
					  'impacto_social' => $this->VerificacionUno_model->getImpactoSocialOpciones(),
					  'sustancia_material' => $this->VerificacionUno_model->getSustanciasMaterialesOpciones()
			);

		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar",$this->moduloControlador);
		$this->load->view("dashboard/verificacionUno/agregar", $data);
		$this->load->view("layouts/dashboard/footer");
		$this->load->view("dashboard/verificacionUno/script", $data);
	}

	public function guardar()
	{
		$opcion_data = json_decode($_POST['opcion_data']);
		$registros = array();
		$newRow = true ;
		foreach ($opcion_data as $key => $value) {
			
			if(!$this->VerificacionUno_model->existeOpcionEmpresa($value->opcion_id, $_POST['empresa_id'] )){
					if($this->VerificacionUno_model->guardarOpcion($value, $_POST['empresa_id'])){
						$registros[] = $value->opcion_id;
					}	
			}else{
				$newRow = false;
				if($this->VerificacionUno_model->updateOpcion($value, $_POST['empresa_id'])){
						$registros[] = $value->opcion_id;
				}
			}
		}
		if($newRow){
			$registros[] = $this->VerificacionUno_model->updateVerificacfionUno($this->input->post('empresa_id'));
		}

		if($this->VerificacionUno_model->isCompleted($this->input->post('empresa_id'))){
			$this->VerificacionUno_model->updateState($this->input->post('empresa_id'));
		}
		var_dump($registros);
	}
	
}