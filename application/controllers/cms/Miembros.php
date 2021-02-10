<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miembros extends CI_Controller {

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
	    
	    $data = array('contenidos' => $this->Cms_model->getRegistrosSliders(),);
	    
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/miembros/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	    
	  
	    $data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosSliders(),
	    );

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/miembros/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
	
		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/contenido/";
        $config['file_name'] = "cont_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
		$url_img = $config['upload_path'].$data['uploadSuccess']['orig_name'];


		$data  = array(
						'id' => Null,
						'nombre' => $nombre,
						'descripcion' =>$descripcion,
						'fotografia' => $url_img
					  );

		$this->Cms_model->insertar('cms_galeria', $data);
		redirect(base_url()."dashboard/cms/miembros/");

	}


	public function editar($id, $data){

		$data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosSliders(),
	    );

		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
	
		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/contenido/";
        $config['file_name'] = "cont_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
		$url_img = $config['upload_path'].$data['uploadSuccess']['orig_name'];



		$data  = array(
						'id' => Null,
						'nombre' => $nombre,
						'descripcion' =>$descripcion,
						'fotografia' => $url_img
					  );

		$this->Cms_model->actualizar('cms_galeria', 'id', $id, $data);
		redirect(base_url()."dashboard/cms/miembros/");

	}


	public function eliminar($id){
		$this->Cms_model->eliminar('cms_galeria', 'id', $id);
		redirect(base_url()."dashboard/cms/miembros/");
	}


	public function activar($id){
		$this->Cms_model->active('cms_galeria', 'id', $id, 'statusSlider', "'A'");
		redirect(base_url()."dashboard/cms/miembros/");
	}
	public function desactivar($id){
		$this->Cms_model->active('cms_galeria', 'id', $id, 'statusSlider', "'I'");
		redirect(base_url()."dashboard/cms/miembros/");
	}


	public function seleccionar($id, $acc = ""){

		 $data = array(
	    	'menu' => $this->Cms_model->getRegistrosSliders(),
	    	'id' => $id,
	    	'acc' => $acc,
			'registro' => $this->Cms_model->getVerRegistroSliders($id),
			'orden_menu' => $this->Cms_model->getListaMenu(),
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/miembros/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
}

