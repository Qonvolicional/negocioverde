<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriaCms extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("GestorContenido_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
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
			"galerias"=>$this->GestorContenido_model->getGalerias(),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/galeria_cms/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "galeriaAgrega.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/galeria_cms/agrega2");
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		//$this->form_validation->set_rules("imagen","Imagen de portada","required");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$fecha_creacion = date('Y-m-d H:i:s');
		$url_imagen = 'Galeria_'.$nombre.'__'.$fecha_creacion;
		$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
		$imagenes = array();
		$info = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'fecha_creacion' => $fecha_creacion,
					'usuario_id' => $this->usuario_id,
					'fecha_modificacion' => $fecha_creacion,
					'usuario_modificacion_id' => $this->usuario_id,
					'estado' => 1,
		);
		
		if($this->GestorContenido_model->setGaleria($info))
	    {
	    	$mensaje.="<li>La información general de la galeria se guardo con éxito.</li>";
	    	$galeria_id = $this->GestorContenido_model->lastID();
	    	$cantidadImagen = count($_FILES['imagen']['name']);
	    	if($cantidadImagen>0){
	            for($i = 0; $i < $cantidadImagen; $i++){
	                $_FILES['aux']['name'] = $_FILES['imagen']['name'][$i];
	                $_FILES['aux']['type'] = $_FILES['imagen']['type'][$i];
	                $_FILES['aux']['tmp_name'] = $_FILES['imagen']['tmp_name'][$i];
	                $_FILES['aux']['error'] = $_FILES['imagen']['error'][$i];
	                $_FILES['aux']['size'] = $_FILES['imagen']['size'][$i];
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= $url_imagen;
			        $config['max_size']             = 5120;
			        $config['max_width'] = "2000";
		        	$config['max_height'] = "2000";
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('aux'))
			        {

		                $error = array('error' => $this->upload->display_errors());
		                $mensaje.="<li>La imagen $i tuvo el siguiente error ".$error['error']."</li>";
			        }
			        else
			        {
		                $data = array('upload_data' => $this->upload->data());
		                //var_dump($data);
		                //Directorio donde se almacena la imagen
		                $imagenes[$i]['cms_galeria_id'] = $galeria_id;
		                $imagenes[$i]['url'] = "assets/archivo/".$data['upload_data']['file_name'];
			        }
		    	}
		    	$this->GestorContenido_model->setGaleriaArchivo($imagenes);
		    	$this->session->set_flashdata("error",$mensaje);
		    }
	    	redirect(base_url()."cms_galerias");
	    }else{
	    	$this->session->set_flashdata("error","No se pudo guardar la información.");
			redirect(base_url()."cms_galeria/agregar");
	    }
	}

	public function editar($id){
		$data = array(
			"galeria" => $this->GestorContenido_model->getGaleria($id),
			"imagenes" => $this->GestorContenido_model->getImagenes($id),
		);
		$jquery = array("jquery" => "galeriaEditar.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/galeria_cms/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		date_default_timezone_set('America/Bogota');
		//$this->form_validation->set_rules("imagen","Imagen de portada","required");
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$fecha_creacion = date('Y-m-d H:i:s');
		$url_imagen = 'Galeria_'.$nombre.'__'.$fecha_creacion;
		$mensaje = "<h5>Información sobre la acción de actualización realizada:</h5><ul>";
		$imagenes = array();
		$info = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'fecha_modificacion' => $fecha_creacion,
				'usuario_modificacion_id' => $this->usuario_id,
		);
		//print_r($_FILES['imagen']);
		//echo "Tamaño del vector ".count($_FILES['imagen']['name']);
		if($this->GestorContenido_model->updateGaleria($info, $id))
	    {
	    	$mensaje.="<li>La información general de la galeria fue actualizada con éxito</li>";
	    	$cantidadImagen = count($_FILES['imagen']['name']);
	    	if(($cantidadImagen == 1 && $_FILES['imagen']['name'][0] && $_FILES['imagen']['size']) || $cantidadImagen > 1){
	    		$this->GestorContenido_model->eliminarImagenesGaleria($id);
		    	
	            for($i = 0; $i < $cantidadImagen; $i++){
	                $_FILES['aux']['name'] = $_FILES['imagen']['name'][$i];
	                $_FILES['aux']['type'] = $_FILES['imagen']['type'][$i];
	                $_FILES['aux']['tmp_name'] = $_FILES['imagen']['tmp_name'][$i];
	                $_FILES['aux']['error'] = $_FILES['imagen']['error'][$i];
	                $_FILES['aux']['size'] = $_FILES['imagen']['size'][$i];
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= $url_imagen;
			        $config['max_size']             = 5120;
			        $config['max_width'] = "2000";
		        	$config['max_height'] = "2000";
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('aux'))
			        {

		                $error = array('error' => $this->upload->display_errors());
		                $mensaje.="<li>La imagen $i tuvo el siguiente error ".$error['error']."</li>";
			        }
			        else
			        {
		                $data = array('upload_data' => $this->upload->data());
		                //var_dump($data);
		                //Directorio donde se almacena la imagen
		                $imagenes[$i]['cms_galeria_id'] = $id;
		                $imagenes[$i]['url'] = "assets/archivo/".$data['upload_data']['file_name'];
			        }
		    	}
		    	$mensaje.="</ul>";
		    	$this->GestorContenido_model->setGaleriaArchivo($imagenes);
		    	$this->session->set_flashdata("error",$mensaje);
		    }	
	    	redirect(base_url()."cms_galerias");
	    }else{
	    	$this->session->set_flashdata("error","No se pudo actualizar la información.");
			$this->editar($id);
	    }
	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstadoGaleria($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updateGaleria($data, $id);
		redirect(base_url()."cms_galerias");
	}

	public function eliminar($id){
		$this->GestorContenido_model->eliminarImagenesGaleria($id);
		$this->GestorContenido_model->deleteGaleria($id);
		redirect(base_url()."cms_galerias");
	}
	
}