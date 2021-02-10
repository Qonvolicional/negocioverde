<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

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
	    $data = array('listaFi' => $this->Cms_model->getRegistrosEq(),"jquery" => "equipo.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/equipo/lista", $data);
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
		$this->load->view("dashboard/cms/equipo/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("cargo");



		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/equipo/";
        $config['file_name'] = "eqp_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
		$url_doc = $config['upload_path'].$data['uploadSuccess']['orig_name'];

		
		$data  = array(
						'nombre' => $nombre,
						'fotografia' => $url_doc,
						'descripcion' => $descripcion
					  );

		$this->Cms_model->insertarEq($data);
		redirect(base_url()."dashboard/cms/equipo/");
	}
	
	public function editar(){
		$id = $this->input->post("miembro_id");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("cargo");
		$datos  = array(
						'nombre' => $nombre,
						
						'descripcion' => $descripcion
					  );
		if(count($_FILES) > 0) { 

			$mi_archivo = 'imagen';
	        $config['upload_path'] = "uploads/equipo/";
	        $config['file_name'] = "eqp_".rand(999,99929);
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        

	        $this->load->library('upload', $config);
	        
	        if (!$this->upload->do_upload($mi_archivo)) {
	            $data['uploadError'] = $this->upload->display_errors();
	            $this->session->set_flashdata('alert_upload', 'alert alert-error');
	        }
	        $data['uploadSuccess'] = $this->upload->data();
			$url_doc = $config['upload_path'].$data['uploadSuccess']['orig_name'];
			$datos['fotografia'] = $url_doc;
		}
		
		if($this->Cms_model->actualizarEq($id, $datos)){
			 $this->session->set_flashdata('alert_data', 'alert alert-success');
			 $this->session->set_flashdata('mensaje', 'Los datos se han modificado con éxito');
		}else{
			 $this->session->set_flashdata('alert_data', 'alert alert-error');
			 $this->session->set_flashdata('mensaje', 'Ocurrio un error al modificar los datos');
		}
		
		redirect(base_url()."cms/equipo/seleccionar/".$id."/editar");
	}

	public function eliminar($id){
		$id = $id;
		$this->Cms_model->eliminarEq($id);
		redirect(base_url()."dashboard/cms/equipo/");
	}

	public function seleccionar($id, $acc = ""){
		 $data = array(
	    	'id' => $id,
			'registro' => $this->Cms_model->getVerRegistroEq($id),

		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/equipo/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");

	}
	
}

