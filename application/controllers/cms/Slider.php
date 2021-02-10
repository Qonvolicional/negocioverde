<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
			"sliders"=>$this->GestorContenido_model->getSliders(),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/slider_cms/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "sliderAgrega.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/slider_cms/agrega2");
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		//$this->form_validation->set_rules("imagen","Imagen de portada","required");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$fecha_creacion = date('Y-m-d H:i:s');
		$url = $this->input->post("url");
		$url_imagen = 'Slider_'.$nombre.'__'.$fecha_creacion;
		$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
		$info = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'fecha_creacion' => $fecha_creacion,
					'usuario_id' => $this->usuario_id,
					'url' => $url,
					'estado' => 1,
		);

	    if(($_FILES['imagen']['size']>0)){
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
	        if ( !$this->upload->do_upload('imagen'))
	        {
                $error = array('error' => $this->upload->display_errors());
                $mensaje.="<li>No se cargo correctamente la imagen del slider. <sub>".$error['error']."</sub>.</li>";
	        }
	        else
	        {
                $data = array('upload_data' => $this->upload->data());
                //var_dump($data);
                //Directorio donde se almacena la imagen
                $info['url_imagen'] = "assets/archivo/".$data['upload_data']['file_name'];
                $mensaje.="<li>La imagen del slider fue guardada con éxito.</li>";
	        }
	    }
	    if($this->GestorContenido_model->setSlider($info))
	    {
	    	$mensaje.="<li> La información general del slider se guardo con éxito. </li></ul>";
	    	$this->session->set_flashdata("error",$mensaje);
	    	redirect(base_url()."cms_sliders");
	    }else{
	    	$this->session->set_flashdata("error","No se pudo guardar la información.");
			redirect(base_url()."cms_slider/agregar");
	    }
		
	}

	public function editar($id){
		$data = array(
			"slider" => $this->GestorContenido_model->getSlider($id)
		);
		$jquery = array("jquery" => "sliderEditar.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/slider_cms/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		/*$path = "assets/archivo/convocatoria_documento_Inaguracion_35-45__2020-02-27.png";
		if (is_readable($path) && unlink($path)) {
		    echo "The file has been deleted";
		} else {
		    echo "The file was not found or not readable and could not be deleted";
		}*/
		$fecha_creacion = date("Y-m-d H:i:s");
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$url = $this->input->post("url");
		$url_imagen = 'Slider_'.$nombre.'__'.$fecha_creacion;
		$archivo = $this->GestorContenido_model->getSlider($id);
		$mensaje = "<h5>Información sobre la actualización realizada:</h5><ul>";
		$info = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'url' => $url,
		);
		
	    if(($_FILES['imagen']['size']>0)){
	    	
			//Subiendo el imagen
			$config['upload_path']          = './assets/archivo/';
			//echo base_url().'assets/';
	        $config['allowed_types']        = '*';
	        //Configurando el nuevo del archivo
	        $config['file_name']			= $url_imagen;
	        $config['max_size']             = 51024;
	        $config['max_width'] = "2000";
        	$config['max_height'] = "2000";
	        $this->load->library('upload', $config);
	        if ( !$this->upload->do_upload('imagen'))
	        {
                $error = array('error' => $this->upload->display_errors());
                $mensaje.="<li>No se pudo actualizar con éxito la imagen del slider ".$nombre.". <sub>".$error['error']."</sub></li>";
	        }
	        else
	        {
                $data = array('upload_data' => $this->upload->data());
                //var_dump($data);
                //Directorio donde se almacena la imagen
                $info['url_imagen'] = "assets/archivo/".$data['upload_data']['file_name'];
                $mensaje.="<li>La imagen del slider fue actualizada con éxito. </li>";
                //Se verifica si hubo documento previo
                if($archivo->url_imagen){
                	if (is_readable($archivo->url_imagen) && unlink($archivo->url_imagen)) {
					    echo "El archivo ".$archivo->url_imagen." fue eliminado con éxito";
					} else {
					    echo "El archivo ".$archivo->url_imagen." no fue encontrado en el directorio";
					}
                }
	        }
	    }
	    
	    if($this->GestorContenido_model->updateSlider($info, $id)){
	    	$mensaje.="<li>La información del slider fue actualizada con éxito. </li></ul>";
	    	$this->session->set_flashdata("error",$mensaje);
	    	redirect(base_url()."cms_sliders");
	    }else{
	    	$this->session->set_flashdata("error","Error al actualizar información.");
			redirect(base_url()."cms_slider/".$id);
	    }
	}

	public function eliminar($id){
		$this->GestorContenido_model->deleteSlider($id);
		redirect(base_url()."cms_sliders");

	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstadoSlider($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updateSlider($data, $id);
		redirect(base_url()."cms_sliders");
	}
	


}