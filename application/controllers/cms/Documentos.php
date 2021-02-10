<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

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
		 $this->load->helper(array('form', 'url'));
		  $this->load->library('form_validation');
	}

	public function index(){
	    $data = array('listaFi' => $this->Cms_model->getRegistrosDoc());
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/documentos/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	     $data = array(
	    	'menu' => $this->Cms_model->getRegistros(),
	    	'tipomenu' => $this->Cms_model->getTipoMenu(),
	    	'contenido' => $this->Cms_model->getContenidos(),
			'orden_menu' => $this->Cms_model->getListaMenu(),
			"jquery" => "documento.js"
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/documentos/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function guardar(){
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		$this->form_validation->set_rules("nombre","Nombre","required|min_length[5]");
		$this->form_validation->set_rules("descripcion","descripcion","required|min_length[5]");


		if($this->form_validation->run() == FALSE){
			$this->form_validation->set_message("rule", "Debes llenar todos los campos");
			$this->session->set_flashdata("alert_data", "alert alert-danger");
			$this->session->set_flashdata("mensaje", "Debes llenar todos los campos");
			redirect(base_url()."cms/documentos/agregar");

		} 
		
		$mi_archivo = 'imagen';
        $config['upload_path'] = "uploads/documentos/";
        $config['file_name'] = "doc_".rand(999,99929);
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            $this->form_validation->set_message("rule", "Debes llenar todos los campos");
			$this->session->set_flashdata("alert_data", "alert alert-danger");
			$this->session->set_flashdata("mensaje", "Ocurrio un error mientras se cargaba el documento,  intentar más tarde");
			redirect(base_url()."cms/documentos/agregar");
        }

        $data['uploadSuccess'] = $this->upload->data();
		$url_doc = $config['upload_path'].$data['uploadSuccess']['orig_name'];

		$data  = array(
						'id' => Null,
						'nombre' => $nombre,
						'Url' => $url_doc,
						'descripcion' => $descripcion
					  );

		if($this->Cms_model->insertarDoc($data)){
			$this->session->set_flashdata("alert_data", "alert alert-success");
			$this->session->set_flashdata("mensaje", "Los datos fueron agregados con éxito");
		}else{
			$this->form_validation->set_message("rule", "Debes llenar todos los campos");
			$this->session->set_flashdata("alert_data", "alert alert-danger");
			$this->session->set_flashdata("mensaje", "Debes llenar todos los campos");
			redirect(base_url()."cms/documentos/agregar");
		}
		redirect(base_url()."cms/documentos/");
	}
	
	public function editar($id){
		$nombre = $this->input->post("nombre");
		$url = $this->input->post("url");
		$descripcion = $this->input->post("descripcion");
		$datos  = array(
						'nombre' => $nombre,
						'descripcion' => $descripcion
					  );

		if(count($_FILES) > 0 ){
			$mi_archivo = 'imagen';
	        $config['upload_path'] = "uploads/documentos/";
	        $config['file_name'] = "doc_".$id."_".rand(999,99929);
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        

	        $this->load->library('upload', $config);
	        
	        if (!$this->upload->do_upload($mi_archivo)) {
	            $data['uploadError'] = $this->upload->display_errors();
	            echo $this->upload->display_errors();
	            $this->session->set_flashdata("alert_data", "alert alert-warning");
				$this->session->set_flashdata("mensaje","El registro fue modificado con éxito");
	        }

	        $data['uploadSuccess'] = $this->upload->data();
			$url_doc = $config['upload_path'].$data['uploadSuccess']['orig_name'];
			$datos['Url'] = $url_doc; 
		}

		
		if($this->Cms_model->actualizarDoc($id, $datos)){
			$this->session->set_flashdata("alert_data", "alert alert-success");
			$this->session->set_flashdata("mensaje","El registro fue modificado con éxito");
		}else{
			$this->session->set_flashdata("alert_data", "alert alert-danger");
			$this->session->set_flashdata("mensaje","Ocurrio un error al modificar los datos");
		}
		redirect(base_url()."cms/documentos/seleccionar/$id/editar");
	}

	public function eliminar($id){
		$id = $id;
		$this->Cms_model->eliminarDoc($id);
		redirect(base_url()."cms/documentos/");
	}

	public function seleccionar($id, $acc = ""){
		 $data = array(
	    	'id' => $id,
	    	'acc' => $acc,
			'registro' => $this->Cms_model->getVerRegistroDoc($id),
			"jquery" => "documento.js"
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/documentos/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");

	}
	
}

