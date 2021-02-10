<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidad extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Entidad_model");
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
			'entidades' => $this->Entidad_model->getEntidades(),
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/entidad/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function agregar(){
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/entidad/agrega");
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function almacenar(){

		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$sigla = $this->input->post("sigla");
		
		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[entidad.nombre]");
		
		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'nombre' => $nombre, 
				'descripcion'=> $descripcion,
				'sigla'=> $sigla,
			);

			if ($this->Entidad_model->guardarEntidad($data)) {
				redirect(base_url()."entidad");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."entidad/agregar");
			}
		}
		else{
			$this->agregar();
		}
	
	}

	public function editar($id){
		$data  = array(
			'entidad' => $this->Entidad_model->getEntidad($id), 
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/entidad/edita", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function actualizar(){
		$id = $this->input->post("entidad_id");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$sigla = $this->input->post("sigla");
		$entidadactual = $this->Entidad_model->getEntidad($id);

		if ($nombre == $entidadactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[entidad.nombre]";
		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);

		if($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre' => $nombre,
				'descripcion'=> $descripcion,
				'sigla'=> $sigla,
			);

			if ($this->Entidad_model->actualizarEntidad($id,$data)) {
				redirect(base_url()."entidad");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."entidad/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	
	}

	public function eliminar($id){
		$data = array('id' => $id);
		$this->Entidad_model->eliminarEntidad($data);
		redirect(base_url()."entidad");
	}

	public function estado($entidad_id){
		$info = $this->Entidad_model->getEntidad($entidad_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Entidad_model->actualizarEntidad($entidad_id, $data);
		redirect(base_url()."entidad");
	}


	
}