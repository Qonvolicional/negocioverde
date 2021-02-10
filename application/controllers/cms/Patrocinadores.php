<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patrocinadores extends CI_Controller {

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
	    $data = array('listaFi' => $this->Cms_model->getRegistrosPat(),);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/patrocinadores/lista", $data);
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
		$this->load->view("dashboard/cms/patrocinadores/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombre = $this->input->post("nombre");
		$url = $this->input->post("url");
		$descripcion = $this->input->post("descripcion");

		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/patrocinadores/";
        $config['file_name'] = "pat_".rand(999,99929);
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
						'id' => Null,
						'nombre' => $nombre,
						'Url' => $url_doc,
						'descripcion' => $descripcion
					  );

		$this->Cms_model->insertarPat($data);
		redirect(base_url()."cms/patrocinadores/");
	}
	
	public function editar(){
		$id = $this->input->post("patrocinador_id");
		$nombre = $this->input->post("nombre");
		$url = $this->input->post("url");
		$descripcion = $this->input->post("descripcion");
		$datos  = array(
						'nombre' => $nombre,
						
						'descripcion' => $descripcion
					  );

		if(count($_FILES) >0){
			$mi_archivo = 'imagen';
	        $config['upload_path'] = "uploads/patrocinadores/";
	        $config['file_name'] = "pat_".rand(999,99929);
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        

	        $this->load->library('upload', $config);
	        
	        if (!$this->upload->do_upload($mi_archivo)) {
	            $data['uploadError'] = $this->upload->display_errors();
	            $this->upload->display_errors();
	            $this->session->set_flashdata("alert", "alert alert-error");
	            $this->session->set_flashdata("alert_message", "Ocurrio un poblema, No fue posible agregar el logo del patrocinador");
	        }
    	

	        $data['uploadSuccess'] = $this->upload->data();
			$url_doc = $config['upload_path'].$data['uploadSuccess']['orig_name'];
			$datos['Url'] = $url_doc;
		}
		
		
		if($this->Cms_model->actualizarPat($id, $datos)){
			$this->session->set_flashdata("alert", "alert alert-success");
            $this->session->set_flashdata("alert_message", "el patrocinador fue guardado con éxito");
		}else{
				$this->session->set_flashdata("alert", "alert alert-error");
	            $this->session->set_flashdata("alert_message", "Ocurrio un poblema, No fue posible agregar el logo del patrocinador");
		}
		redirect(base_url()."cms/patrocinadores/seleccionar/$id/editar");
	}

	public function eliminar($id){
		$id = $id;
		$this->Cms_model->eliminarPat($id);
		redirect(base_url()."cms/patrocinadores/");
	}

	public function seleccionar($id, $acc = ""){
		 $data = array(
	    	'id' => $id,
	    	'acc' => $acc,
			'registro' => $this->Cms_model->getVerRegistroPat($id)
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/patrocinadores/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");

	}
	
}

