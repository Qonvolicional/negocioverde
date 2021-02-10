<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Cargo_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
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

	public function index()
	{
		$data = array(
			'cargos' => $this->Cargo_model->getCargos(),
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cargo/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function agregar(){
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cargo/agrega");
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function almacenar(){

		$nombre = $this->input->post("nombre");

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[cargo.nombre]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre' => $nombre, 
			);

			if ($this->Cargo_model->guardarCargo($data)) {
				redirect(base_url()."cargo");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."cargo/agregar");
			}
		}
		else{
			$this->agregar();
		}
	
	}

	public function editar($id){
		$data  = array(
			'cargo' => $this->Cargo_model->getCargo($id), 
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cargo/edita", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function actualizar(){
		$id = $this->input->post("cargo_id");
		$nombre = $this->input->post("nombre");
		$cargoactual = $this->Cargo_model->getCargo($id);

		if ($nombre == $cargoactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[cargo.nombre]";

		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		if($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre' => $nombre,
			);

			if ($this->Cargo_model->actualizarCargo($id,$data)) {
				redirect(base_url()."cargo");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."cargo/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	
	}

	public function eliminar($id){
		$data = array('id' => $id);
		$this->Cargo_model->eliminarCargo($data);
		redirect(base_url()."cargo");
	}

	public function estado($cargo_id){
		$info = $this->Cargo_model->getCargo($cargo_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Cargo_model->actualizarCargo($cargo_id, $data);
		redirect(base_url()."cargo");
	}


	
}