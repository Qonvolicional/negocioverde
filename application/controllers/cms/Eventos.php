<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

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
	    
	    $data = array('contenidos' => $this->Cms_model->getRegistrosEventos(),);
	    
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/eventos/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	    
	  
	    $data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosEventos(),
	    );

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/eventos/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombreEvento = $this->input->post("nombreevento");
		$descripcion = $this->input->post("descripcion");
		$fechaEvento = $this->input->post("fechaevento");
		$horaEvento = $this->input->post("horaevento");
		$portadaEvento = $this->input->post("portadaEvento");
		$infoExtra = $descripcion;
		$slug = $this->Cms_model->slugify($nombreEvento);
		$Url = $this->input->post("url");
		$estado = $this->input->post("estado");

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
						'nombreEvento' => $nombreEvento,
						'descripcion' => $descripcion,
						'fechaEvento' =>$fechaEvento,
						'horaEvento' => $horaEvento,
						'portadaEvento' => $url_img,
						'Url' => $Url,
						'infoExtra' => $infoExtra,
						'slug' => $slug,
						'estado' => $estado
					  );

		$this->Cms_model->insertar('cms_eventos', $data);
		redirect(base_url()."cms/eventos/");

	}


	public function editar($id){

		$data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosEventos(),
	    );

		$nombreEvento = $this->input->post("nombreevento");
		$descripcion = $this->input->post("descripcion");
		$fechaEvento = $this->input->post("fechaevento");
		$horaEvento = $this->input->post("horaevento");
		$portadaEvento = $this->input->post("portadaEvento");
		$infoExtra = $descripcion;
		$slug = $this->Cms_model->slugify($nombreEvento);
		$Url = $this->input->post("url");
		$estado = $this->input->post("estado");

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
						'nombreEvento' => $nombreEvento,
						'descripcion' => $descripcion,
						'fechaEvento' =>$fechaEvento,
						'horaEvento' => $horaEvento,
						'portadaEvento' => $url_img,
						'Url' => $Url,
						'infoExtra' => $infoExtra,
						'slug' => $slug,
						'estado' => $estado
					  );

		$this->Cms_model->actualizar('cms_eventos', 'id', $id, $data);
		redirect(base_url()."cms/eventos/");

	}


	public function eliminar($id){
		$this->Cms_model->eliminar('cms_eventos', 'id', $id);
		redirect(base_url()."cms/eventos/");
	}


	public function activar($id){
		$this->Cms_model->active('cms_eventos', 'id', $id, 'estado', "'A'");
		redirect(base_url()."cms/eventos/");
	}
	public function desactivar($id){
		$this->Cms_model->active('cms_eventos', 'id', $id, 'estado', "'I'");
		redirect(base_url()."cms/eventos/");
	}


	public function seleccionar($id, $acc = ""){

		 $data = array(
	    	'menu' => $this->Cms_model->getRegistros(),
	    	'tipomenu' => $this->Cms_model->getTipoMenu(),
	    	'id' => $id,
	    	'acc' => $acc,
			'registro' => $this->Cms_model->getVerRegistroEventos($id),
			'orden_menu' => $this->Cms_model->getListaMenu(),
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/eventos/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
}

