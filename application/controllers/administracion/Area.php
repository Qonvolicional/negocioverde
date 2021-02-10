<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Area_model");
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
			'areas' => $this->Area_model->getAreas(),
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/area/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function agregar(){
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/area/agrega");
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function almacenar(){

		$nombre = $this->input->post("nombre");

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[area.nombre]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre' => $nombre, 
			);

			if ($this->Area_model->guardarArea($data)) {
				redirect(base_url()."area");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."area/agregar");
			}
		}
		else{
			$this->agregar();
		}
	
	}

	public function editar($id){
		$data  = array(
			'area' => $this->Area_model->getArea($id), 
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/area/edita", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function actualizar(){
		$id = $this->input->post("area_id");
		$nombre = $this->input->post("nombre");
		$areaactual = $this->Area_model->getarea($id);

		if ($nombre == $areaactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[area.nombre]";

		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		if($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre' => $nombre,
			);

			if ($this->Area_model->actualizarArea($id,$data)) {
				redirect(base_url()."area");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."area/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	
	}

	public function eliminar($id){
		$data = array('id' => $id);
		$this->Area_model->eliminarArea($data);
		redirect(base_url()."area");
	}

	public function estado($area_id){
		$info = $this->Area_model->getArea($area_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Area_model->actualizarArea($area_id, $data);
		redirect(base_url()."area");
	}

	
}