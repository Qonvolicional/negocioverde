<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificacionDos extends CI_Controller {

	public function __construct(){
	    
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("NegocioVerde_model");
		    $this->load->model("VerificacionDos_model");
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
		$varificacion_dos = $this->VerificacionDos_model->getVerificacionEmpresa($empresa_id);
		$verificacion_empresa = array();
		foreach ($varificacion_dos as $key => $value) {
			$verificacion_empresa[$value->opciones_id] = $value;
		}
		$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
					  'verificacion_dos' => $verificacion_empresa,
					  'viabilidad_economica' => $this->VerificacionDos_model->getOpciones('VIABILIDAD_ECONOMICA'),
					  'impapcto_ambiental' => $this->VerificacionDos_model->getOpciones('CONTRIBUCION_CONSERVACION'),
					  'enfoque_ciclo' => $this->VerificacionDos_model->getOpciones('CICLO_VIDA'),
					  'vida_util' => $this->VerificacionDos_model->getOpciones('VIDA_UTIL'),
					  'sustancia_material' => $this->VerificacionDos_model->getOpciones('SUSTITUCION_MATERIALES'),
					  'reciclabilidad' => $this->VerificacionDos_model->getOpciones('MATERIALES_RECICLADOS'),
					  'uso_eficiente' => $this->VerificacionDos_model->getOpciones('SOSTENIBLE_RECURSO'),
					  'responsabilidad_interior' => $this->VerificacionDos_model->getOpciones('RESPO_SOCIAL_EMPRESA'),
					  'responsabilidad_cadena' => $this->VerificacionDos_model->getOpciones('RESPO_SOCIAL_VALOR'),
					  'responsabilidad_exterior' => $this->VerificacionDos_model->getOpciones('RESPO_SOCIAL_EXTERIOR'),
					  'comunicacion_atributo' => $this->VerificacionDos_model->getOpciones('COMUNICACION_ATRIBUTOS'),
					  'esquema_programa' => $this->VerificacionDos_model->getOpciones('ESQUEMAS_RECONOCIMIENTOS'),
					  'responsabilidad_social' => $this->VerificacionDos_model->getOpciones('RESPON_SOCIAL_ADICCIONAL'),
			);

		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar",$this->moduloControlador);
		$this->load->view("dashboard/verificacionDos/agregar", $data);
		$this->load->view("layouts/dashboard/footer");
		$this->load->view("dashboard/verificacionDos/script");
	}

	public function guardar()
	{
		$opcion_data = json_decode($this->input->post('opcion_data'));
		$registros = array();
		var_dump($opcion_data);
		foreach ($opcion_data as $key => $value) {
			if(!$this->VerificacionDos_model->existeOpcionEmpresa($value->opcion_id, $this->input->post('empresa_id'))){
				if($this->VerificacionDos_model->guardarVerificacion($value, $this->input->post('empresa_id'))){
					$registros[] = $value->opcion_id;

					if(array_key_exists('evidencia_'.$value->opcion_id, $_FILES)){
							$evidencia_nombre = $_FILES['evidencia_'.$value->opcion_id]['name'];
							$verificacion_id = $this->VerificacionDos_model->lastID();
							//Subiendo el imagen
							$config['upload_path']          = './assets/archivo/';
							//echo base_url().'assets/';
					        $config['allowed_types']        = 'doc|word|pdf';
					        //Configurando el nuevo del archivo
					        $config['file_name']			= 'evidencia_id_'.$verificacion_id;
					        $config['max_size']             = 10000;
					        $config['max_width']            = 3000;
					        $config['max_height']           = 3000;
					        $this->load->library('upload', $config);
					        if($this->upload->do_upload('evidencia_'.$value->opcion_id)){

					        	$data = array('upload_data' => $this->upload->data());

					        	$soporte['ruta'] = "/assets/archivo/".$data['upload_data']['file_name'];
					        	$soporte['nombre_archivo'] = $evidencia_nombre;

					        	if($this->VerificacionDos_model->guardarEvidencia($soporte)){

					        		$evidencia_id = $this->VerificacionDos_model->lastID();

					        		$data_verificacion = array('evidencia_id' => $evidencia_id,
					        										'verificacion_id' =>  $verificacion_id);

					        		if($this->VerificacionDos_model->actualizarVerificacionSoporte($data_verificacion)){
					        			$registros[] = "ac-".$value->opcion_id;
					        		}

					        	}
					        }

					}
				}
			}
			else{

				if($this->VerificacionDos_model->updateVerificacion($value, $this->input->post('empresa_id'))){
					$registros[] = $value->opcion_id;
					if(array_key_exists('evidencia_'.$value->opcion_id, $_FILES)){

						$evidencia_nombre = $_FILES['evidencia_'.$value->opcion_id]['name'];
						$verificacion = $this->VerificacionDos_model->getVerificacion($value->opcion_id, $this->input->post('empresa_id'));
							//Subiendo el imagen
							$config['upload_path']          = './assets/archivo/';
							//echo base_url().'assets/';
					        $config['allowed_types']        = 'doc|word|pdf';
					        //Configurando el nuevo del archivo
					        $config['file_name']			= 'evidencia_id_'.$verificacion->id;
					        $config['max_size']             = 10000;
					        $config['max_width']            = 3000;
					        $config['max_height']           = 3000;
					        $this->load->library('upload', $config);
					        if($this->upload->do_upload('evidencia_'.$value->opcion_id)){

					        	$data = array('upload_data' => $this->upload->data());

					        	$soporte['ruta'] = "/assets/archivo/".$data['upload_data']['file_name'];
					        	$soporte['nombre_archivo'] = $evidencia_nombre;

					        	if($this->VerificacionDos_model->guardarEvidencia($soporte)){

					        		$evidencia_id = $this->VerificacionDos_model->lastID();

					        		$data_verificacion = array('evidencia_id' => $evidencia_id,
					        										'verificacion_id' =>  $verificacion->id);

					        		if($this->VerificacionDos_model->actualizarVerificacionSoporte($data_verificacion)){
					        			$registros[] = "ac-".$value->opcion_id;
					        		}

					        	}

					        }
					}
				}
			}
		}

		$this->VerificacionDos_model->updateVerificacfionDos($this->input->post('empresa_id'));
		if($this->VerificacionDos_model->isCompleted($this->input->post('empresa_id'))){
			$this->VerificacionDos_model->updateState($this->input->post('empresa_id'));
		}
		$sql = $this->VerificacionDos_model->updatePuntaje($this->input->post('empresa_id'));
		$registros[] = $sql;
		var_dump($registros);
	}
}