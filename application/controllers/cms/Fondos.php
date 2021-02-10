<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fondos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->verificador_id = $this->session->userdata("usuario");
			$admin = $this->session->userdata("admin");
			$this->moduloControlador = array(
				'modulos' => ($admin)?$this->Modulo_model->getModulos():$this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $admin,
			);
	    	$this->load->model("Cms_model");
	    }else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}

	}

	public function index(){
	    $data = array('listaFi' => $this->Cms_model->getRegistrosFi(),);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/fondos/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	     $data = array(
	    	'menu' => $this->Cms_model->getRegistros(),
	    	'tipomenu' => $this->Cms_model->getTipoMenu(),
	    	'contenido' => $this->Cms_model->getContenidos(),
			'orden_menu' => $this->Cms_model->getListaMenu(),
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/fondos/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombre = $this->input->post("nombre");
		$url = $this->input->post("url");
		$descripcion = $this->input->post("descripcion");
		$data  = array(
						'id' => Null,
						'nombre' => $nombre,
						'Url' => $url,
						'descripcion' => $descripcion
					  );
		$this->Cms_model->insertarFi($data);
		redirect(base_url()."dashboard/cms/fondos/");
	}
	
	public function editar($id, $data){
		$nombre = $this->input->post("nombre");
		$url = $this->input->post("url");
		$descripcion = $this->input->post("descripcion");
		$data  = array(
						'nombre' => $nombre,
						'Url' => $url,
						'descripcion' => $descripcion
					  );
		$this->Cms_model->actualizarFi($id, $data);
		redirect(base_url()."dashboard/cms/fondos/");
	}

	public function eliminar($id){
		$id = $id;
		$this->Cms_model->eliminarFi($id);
		redirect(base_url()."dashboard/cms/fondos/");
	}

	public function seleccionar($id, $acc = ""){
		 $data = array(
	    	'id' => $id,
	    	'acc' => $acc,
			'registro' => $this->Cms_model->getVerRegistroFi($id)
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/fondos/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");

	}
	
}

