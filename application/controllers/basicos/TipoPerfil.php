<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPerfil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
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

	public function index()
	{
		$data = array(
			'perfiles' => $this->Usuarios_model->getPerfiles($this->rol_usuario),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/tipoPerfil/lista", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function agregar(){
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/tipoPerfil/agrega");
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function almacenar(){

		$nombre = $this->input->post("nombre");
		$usuario_acceso = ($this->input->post("usuario_acceso"))?1:0;

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[tipo_perfil.nombre]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre' => $nombre, 
				'usuario_acceso'=>$usuario_acceso,
			);

			if ($this->Usuarios_model->guardarPerfil($data)) {
				redirect(base_url()."perfiles");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."perfiles/agregar");
			}
		}
		else{
			$this->agregar();
		}
	
	}

	public function editar($id){
		$data  = array(
			'perfil' => $this->Usuarios_model->getPerfil($id), 
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/tipoPerfil/edita", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function actualizar(){
		
		$id = $this->input->post("rol_id");
		$nombre = $this->input->post("nombre");
		$rolactual = $this->Usuarios_model->getRol($id);
		$usuario_acceso = ($this->input->post("usuario_acceso"))?1:0;
		
		
		if ($nombre == $rolactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[tipo_perfil.nombre]";

		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		if($this->form_validation->run()==TRUE) {

			$data = array(
				'nombre' => $nombre,
				'usuario_acceso'=>$usuario_acceso,
			);
			
			if ($this->Usuarios_model->actualizarPerfil($id,$data)) {
				redirect(base_url()."perfiles");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."perfiles/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	
	}

	public function eliminar($id){
		$this->Usuarios_model->eliminarPerfil($id);
		redirect(base_url()."perfiles");

	}

	public function estado($rol_id){
		$info = $this->Usuarios_model->getEstadoPerfil($rol_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Usuarios_model->actualizarPerfil($rol_id, $data);
		redirect(base_url()."perfiles");
	}


	
}