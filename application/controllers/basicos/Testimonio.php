<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("GestorContenido_model");
			$this->load->model("Cms_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			//var_dump($this->uri);
			$this->session->set_userdata("modulo_active",$this->Modulo_model->getModuloActivo($this->uri->segments[1])->id);
			$this->session->set_userdata("submodulo_active","");
			$this->session->set_userdata("modulo_string", $this->uri->segments[1]);
			$this->rol_usuario = $this->session->userdata("rol");
			$this->usuario_id = $this->session->userdata("usuario");
			$this->super = $this->session->userdata("super");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario, $this->super),
				'admin' => $this->session->userdata("admin"),
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}		
	}

	public function index(){
		$data = array(
			"testimonios"=>$this->GestorContenido_model->getTestimonios(),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/testimonio/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "testimonio.js");
		$data = array(
			"referentes" => $this->GestorContenido_model->getReferentes(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/testimonio/agrega2", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		$this->form_validation->set_rules("persona_id","Referente","required");
		$this->form_validation->set_rules("nombre","Nombre de obra","required|min_length[3]|max_length[100]|is_unique[testimonio.nombre]");
		if($this->form_validation->run())
		{
			$persona_id = $this->input->post("persona_id");
			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$url = $this->input->post("url");
			$slug = $this->Cms_model->slugify($nombre);
			

			$info = array(
				'persona_id' => $persona_id,
				'nombre' => $nombre,
				'descripcion'=> $descripcion,
				'url'=> $url,
				'slug' => $slug,
				'estado' => 1,
			);

		    if($this->GestorContenido_model->setTestimonio($info))
		    {
		    	redirect(base_url().$this->session->userdata("modulo_string"));
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url().$this->session->userdata("modulo_string")."/agregar");
		    }
		}else{
			$this->agregar();
		}
	}

	public function editar($id){
		$data = array(
			"testimonio" => $this->GestorContenido_model->getTestimonio($id),
			"referentes" => $this->GestorContenido_model->getReferentes(),
		);
		$jquery = array("jquery" => "testimonio.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/testimonio/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		/*$path = "assets/archivo/convocatoria_documento_Inaguracion_35-45__2020-02-27.png";
		if (is_readable($path) && unlink($path)) {
		    echo "The file has been deleted";
		} else {
		    echo "The file was not found or not readable and could not be deleted";
		}*/
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$testimonioActual = $this->GestorContenido_model->getTestimonio($id);

		if ($nombre == $testimonioActual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[testimonio.nombre]";

		}
		//$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de publicación","required");
		$this->form_validation->set_rules("nombre","Nombre de obra","required|min_length[3]|max_length[100]".$is_unique);
		if($this->form_validation->run()){
			$persona_id = $this->input->post("persona_id");
			$descripcion = $this->input->post("descripcion");
			$url = $this->input->post("url");
			$info = array(
				'nombre' => $nombre,
				'persona_id' => $persona_id,
				'descripcion' => $descripcion,
				'url'=> $url,				
			);        
		    if($this->GestorContenido_model->updateTestimonio($info, $id)){
		    	redirect(base_url().$this->session->userdata("modulo_string"));
		    }else{
		    	$this->session->set_flashdata("error","Error al actualizar información.");
				redirect(base_url().$this->session->userdata("modulo_string")."/".$id);
		    }

		}else{
			$this->editar($id);
		}

	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstadoTestimonio($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updateTestimonio($data, $id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}
	
	public function eliminar($id){
		$this->GestorContenido_model->deleteTestimonio($id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}


}