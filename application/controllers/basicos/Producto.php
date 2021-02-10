<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

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
			"productos"=>$this->GestorContenido_model->getProductos(),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/producto/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "producto.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/producto/agrega2");
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		$this->form_validation->set_rules("nombre","Nombre de producto","required|min_length[3]|max_length[100]|is_unique[producto.nombre]");
		if($this->form_validation->run())
		{
			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$slug = $this->Cms_model->slugify($nombre);
			$fecha_creacion = date('Y-m-d H:i:s');

			$info = array(
				'nombre' => $nombre,
				'descripcion'=> $descripcion,
				'slug' => $slug,
				'fecha_creacion'=>$fecha_creacion,
				'estado' => 1,
			);

			if(($_FILES['imagen']['size']>0)){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        //$config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_imagen_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 7000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //Directorio donde se almacena la imagen
	                $info['url_imagen'] = "assets/archivo/".$data['upload_data']['file_name'];
		        }
		    }
		    if($this->GestorContenido_model->setProducto($info))
		    {
		    	redirect(base_url().$this->session->userdata("modulo_string"));
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url().$this->session->userdata("modulo_string")."/agregar");
		    }
		}else{
			$this->agregar();
		}
	}

	public function editar($id){
		$data = array(
			"producto" => $this->GestorContenido_model->getProducto($id),
		);
		$jquery = array("jquery" => "producto.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/producto/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$productoActual = $this->GestorContenido_model->getProducto($id);

		if ($nombre == $productoActual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[producto.nombre]";

		}
		//$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de publicación","required");
		$this->form_validation->set_rules("nombre","Nombre de producto","required|min_length[3]|max_length[100]".$is_unique);
		if($this->form_validation->run()){
			$descripcion = $this->input->post("descripcion");
			$info = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,		
			);

			if(($_FILES['imagen']['size']>0)){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        //$config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_imagen_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 7000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //Directorio donde se almacena la imagen
	                $info['url_imagen'] = "assets/archivo/".$data['upload_data']['file_name'];
		        }
		    }

		    if($this->GestorContenido_model->updateProducto($info, $id)){
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
		$info = $this->GestorContenido_model->getEstadoProducto($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updateProducto($data, $id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}
	
	public function eliminar($id){
		$this->GestorContenido_model->deleteProducto($id);
		redirect(base_url().$this->session->userdata("modulo_string"));
	}


}