<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {

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
			'roles' => $this->Usuarios_model->getRoles($this->rol_usuario),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/rol/lista", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function agregar(){
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/rol/agrega");
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function almacenar(){

		$nombre = $this->input->post("nombre");
		$administrador = ($this->input->post("administrador"))?1:0;
		$super = ($this->input->post("super"))?1:0;

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[rol.nombre]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre' => $nombre, 
				'administrador'=>$administrador,
				'super'=>$super,
			);

			if ($this->Usuarios_model->guardarRol($data)) {
				redirect(base_url()."rol");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."rol/agregar");
			}
		}
		else{
			$this->agregar();
		}
	
	}

	public function editar($id){
		$data  = array(
			'rol' => $this->Usuarios_model->getRol($id), 
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/rol/edita", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function actualizar(){
		
		$id = $this->input->post("rol_id");
		$nombre = $this->input->post("nombre");
		$rolactual = $this->Usuarios_model->getRol($id);
		$administrador = ($this->input->post("administrador"))?1:0;
		$super = ($this->input->post("super"))?1:0;
		
		if ($nombre == $rolactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[rol.nombre]";

		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		if($this->form_validation->run()==TRUE) {

			$data = array(
				'nombre' => $nombre,
				'administrador'=>$administrador,
				'super'=>$super,
			);
			
			if ($this->Usuarios_model->actualizarRol($id,$data)) {
				redirect(base_url()."rol");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."rol/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	
	}

	public function estado($rol_id){
		$info = $this->Usuarios_model->getEstadoRol($rol_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Usuarios_model->actualizarRol($rol_id, $data);
		redirect(base_url()."rol");
	}

	public function eliminar($id){
		$this->Usuarios_model->eliminarRol($id);
		redirect(base_url()."rol");

	}


	
}