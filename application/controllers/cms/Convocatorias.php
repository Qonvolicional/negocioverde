<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatorias extends CI_Controller {

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
	    
	    $data = array('contenidos' => $this->Cms_model->getRegistrosConvocatorias(),);
	    
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/convocatorias/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	    
	  
	     $data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosConvocatorias(),
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
	    	);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/convocatorias/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$titulo = $this->input->post("titulo");
		$contenido = $this->input->post("contenido");
		$fechacierre = $this->input->post("fechacierre");
		$slug = $this->Cms_model->slugify($titulo);

		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/convocatorias/";
        $config['file_name'] = "cont_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
       

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
						'titulo' => $titulo,
						'descripcion' => $contenido,
						'slugconvo' => $slug,
						'fechacierre' => date('Y-m-d H:i:s'),
						'portada' => $url_img,
						'statusPost' => 'A'
					  );

		$this->Cms_model->insertar('cms_convocatorias', $data);
		redirect(base_url()."cms/convocatorias/");

	}


	public function editar($id){

		 $data = array(
	    	//'conteidos' => $this->Cms_model->getRegistrosContenidos(),
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
	    	);


		$titulo = $this->input->post("titulo");
		$contenido = $this->input->post("contenido");
		$fechacierre = $this->input->post("fechacierre");

		$slug = $this->Cms_model->slugify($titulo);

		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/convocatorias/";
        $config['file_name'] = "cont_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
		$url_img = $config['upload_path'].$data['uploadSuccess']['orig_name'];
	
		$data  = array(
						'titulo' => $titulo,
						'descripcion' => $contenido,
						'slugconvo' => $slug,
						'fechacierre' => date('Y-m-d H:i:s'),
						'portada' => $url_img,
						'statusPost' => 'A'
					  );

		$this->Cms_model->actualizar('cms_convocatorias', 'id', $id, $data);

		redirect(base_url()."cms/convocatorias/");
	}


	public function eliminar($id){
		$this->Cms_model->eliminar('cms_convocatorias', 'id', $id);
		redirect(base_url()."cms/convocatorias/");
	}


	public function activar($id){
		$this->Cms_model->active('cms_convocatorias', 'id', $id, 'statusPost', "'A'");
		redirect(base_url()."cms/convocatorias/");
	}
	public function desactivar($id){
		$this->Cms_model->active('cms_convocatorias', 'id', $id, 'statusPost', "'I'");
		redirect(base_url()."cms/convocatorias/");
	}


	public function seleccionar($id, $acc = ""){

		 $data = array(
	    	'menu' => $this->Cms_model->getRegistros(),
	    	'tipomenu' => $this->Cms_model->getTipoMenu(),
	    	'contenido' => $this->Cms_model->getContenidos(),
	    	'id' => $id,
	    	'acc' => $acc,
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
			'registro' => $this->Cms_model->getVerRegistroCovocatorias($id),
			'orden_menu' => $this->Cms_model->getListaMenu(),
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/convocatorias/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
}

