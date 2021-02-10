<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obra extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("GestorContenido_model");
			$this->load->model("Cms_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			//var_dump($this->uri);
			$this->session->set_userdata("modulo_active",$this->Modulo_model->getModuloActivo($this->uri->segments[1])->id);
			$this->session->set_userdata("submodulo_active","");
			$this->session->set_userdata("modulo_string", $this->uri->segments[1]);
			$this->rol_usuario = $this->session->userdata("rol");
			$this->usuario_id = $this->session->userdata("usuario");
			$this->super = $this->session->userdata("super");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario, $this->super),
				'admin' => $this->session->userdata("admin"),
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}		
	}

	public function index(){
		$data = array(
			"obras"=>$this->GestorContenido_model->getObras(),

		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/obra/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "obra.js");
		$data = array(
			"tipoObra" => $this->GestorContenido_model->getTipoObras(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/obra/agrega2", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		$this->form_validation->set_rules("tipo_obra_id","Tipo de Obra","required");
		$this->form_validation->set_rules("nombre","Nombre de obra","required|min_length[3]|max_length[100]|is_unique[obras.nombre]");
		if($this->form_validation->run())
		{
			$tipo_obra_id = $this->input->post("tipo_obra_id");
			$nombre = $this->input->post("nombre");
			$sinopsi = $this->input->post("sinopsi");
			$musicalizacion = $this->input->post("musicalizacion");
			$slug = $this->Cms_model->slugify($nombre);
			

			$info = array(
				'tipo_obra_id' => $tipo_obra_id,
				'nombre' => $nombre,
				'sinopsi'=> $sinopsi,
				'musicalizacion'=> $musicalizacion,
				'slug' => $slug,
				'estado' => 1,
			);

		    if($this->GestorContenido_model->setObra($info))
		    {
		    	$obra_id = $this->GestorContenido_model->lastID();
		    	$this->setRecursosObra(1, $obra_id, 'imagen');
		    	$this->setRecursosObra(2, $obra_id, 'video');
		    	redirect(base_url().$this->session->userdata("modulo_string"));
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url().$this->session->userdata("modulo_string")."/agregar");
		    }
		}else{
			$this->agregar();
		}
	}

	private function setRecursosObra($tipo_recurso, $obraId, $archivo){
		$cantidadRecurso = count($_FILES[$archivo]['name']);
		$datos = 0;
    	if($cantidadRecurso>0){
    		$recursos = array();
            for($i = 0; $i < $cantidadRecurso; $i++){
            	if($_FILES[$archivo]['size'][$i]>0){
	                $_FILES['aux']['name'] = $_FILES[$archivo]['name'][$i];
	                $_FILES['aux']['type'] = $_FILES[$archivo]['type'][$i];
	                $_FILES['aux']['tmp_name'] = $_FILES[$archivo]['tmp_name'][$i];
	                $_FILES['aux']['error'] = $_FILES[$archivo]['error'][$i];
	                $_FILES['aux']['size'] = $_FILES[$archivo]['size'][$i];
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        //$config['file_name']			= $url_imagen;
			        $config['max_size']             = 11000;
			        //$config['max_width'] = "2000";
		        	//$config['max_height'] = "2000";
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('aux'))
			        {

		                $error = array('error' => $this->upload->display_errors());
			        }
			        else
			        {
		                $data = array('upload_data' => $this->upload->data());
		                //var_dump($data);
		                //Directorio donde se almacena la imagen
		                $recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
		                $recursos[$i]['obra_id'] = $obraId;
		                $recursos[$i]['url_recurso'] = "assets/archivo/".$data['upload_data']['file_name'];
		                $datos++;
			        }
			    }
	    	}
	    	if($datos)$this->GestorContenido_model->setRecursoO($recursos);	
	    }
	    
	}

	private function updateRecursosObra($tipo_recurso, $obraId, $archivo){
		$cantidadRecurso = count($_FILES[$archivo]['name']);
		$datos = 0;
		$datosEnv = 0;
    	if($cantidadRecurso>0){
    		$recursos = array();
            for($i = 0; $i < $cantidadRecurso; $i++){
            	if($_FILES[$archivo]['size'][$i]>0){
            		$datosEnv++;
	                $_FILES['aux']['name'] = $_FILES[$archivo]['name'][$i];
	                $_FILES['aux']['type'] = $_FILES[$archivo]['type'][$i];
	                $_FILES['aux']['tmp_name'] = $_FILES[$archivo]['tmp_name'][$i];
	                $_FILES['aux']['error'] = $_FILES[$archivo]['error'][$i];
	                $_FILES['aux']['size'] = $_FILES[$archivo]['size'][$i];
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        //$config['file_name']			= $url_imagen;
			        $config['max_size']             = 11000;
			        //$config['max_width'] = "2000";
		        	//$config['max_height'] = "2000";
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('aux'))
			        {

		                $error = array('error' => $this->upload->display_errors());
			        }
			        else
			        {
		                $data = array('upload_data' => $this->upload->data());
		                //var_dump($data);
		                //Directorio donde se almacena la imagen
		                $recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
		                $recursos[$i]['obra_id'] = $obraId;
		                $recursos[$i]['url_recurso'] = "assets/archivo/".$data['upload_data']['file_name'];
		                $datos++;
			        }
			    }
	    	}
	    	if($datosEnv){
	    		$this->GestorContenido_model->deleteRecursosObraAct($obraId,$tipo_recurso);
	    		//echo "Numero de datos enviados".$datosEnv;
	    		//var_dump($datos);
	    		if($datos)$this->GestorContenido_model->setRecursoO($recursos);
	    	}	
	    }
	    
	}

	public function editar($id){
		$data = array(
			"obra" => $this->GestorContenido_model->getObra($id),
			"videos" => $this->GestorContenido_model->getRecursosObra(2,$id),
			"imagenes" => $this->GestorContenido_model->getRecursosObra(1,$id),
			"tipo_obra" => $this->GestorContenido_model->getTipoObras(),
		);
		$jquery = array("jquery" => "obra.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/obra/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		/*$path = "assets/archivo/convocatoria_documento_Inaguracion_35-45__2020-02-27.png";
		if (is_readable($path) && unlink($path)) {
		    echo "The file has been deleted";
		} else {
		    echo "The file was not found or not readable and could not be deleted";
		}*/
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$obraActual = $this->GestorContenido_model->getObra($id);

		if ($nombre == $obraActual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[obras.nombre]";

		}
		//$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de publicación","required");
		$this->form_validation->set_rules("nombre","Nombre de obra","required|min_length[3]|max_length[100]".$is_unique);
		if($this->form_validation->run()){
			$tipo_obra_id = $this->input->post("tipo_obra_id");
			$sinopsi = $this->input->post("sinopsi");
			$musicalizacion = $this->input->post("musicalizacion");
			$info = array(
				'nombre' => $nombre,
				'tipo_obra_id' => $tipo_obra_id,
				'sinopsi' => $sinopsi,
				'musicalizacion'=> $musicalizacion,
						
			);
			
			$this->updateRecursosObra(1, $id, 'imagen');
			$this->updateRecursosObra(2, $id, 'video');
	                
		    if($this->GestorContenido_model->updateObra($info, $id)){
		    	redirect(base_url().$this->session->userdata("modulo_string"));
		    }else{
		    	$this->session->set_flashdata("error","Error al actualizar información.");
				redirect(base_url().$this->session->userdata("modulo_string")."/".$id);
		    }

		}else{
			$this->editar($id);
		}

	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstadoObra($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updateObra($data, $id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}
	
	public function eliminar($id){
		$this->GestorContenido_model->deleteRecursosObra($id);
		$this->GestorContenido_model->deleteObra($id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}


}