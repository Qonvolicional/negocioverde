<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patrocinador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("GestorContenido_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->usuario_id = $this->session->userdata("usuario");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $this->session->userdata("admin"),
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}		
	}

	public function index(){
		$data = array(
			"patrocinadores"=>$this->GestorContenido_model->getPatrocinadores(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/patrocinador/lista", $data);
		$this->load->view("layouts/dashboard/footer");
	}

	public function agregar(){
		$jquery = array("jquery" => "patrocinadorAgrega.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/patrocinador/agrega2");
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		//$this->form_validation->set_rules("imagen","Imagen de portada","required");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$enlace = $this->input->post("enlace");
		$fecha_creacion = date('Y-m-d H:i:s');
		$fecha_modificacion = $fecha_creacion;
		$url_imagen = 'Patrocinador_'.$nombre.'__'.$fecha_creacion;
		$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
		$info = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'fecha_creacion' => $fecha_creacion,
					'fecha_modificacion' => $fecha_modificacion,
					'usuario_modificacion_id' => $this->usuario_id,
					'usuario_id' => $this->usuario_id,
					'enlace' => $enlace,
					'estado' => 1,
		);

		//Verificar la imagen ***
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
                $mensaje.="<li>No se cargo correctamente el logo del patrocinador. <sub>".$error['error']."</sub>.</li>";
	        }
	        else
	        {
                $data = array('upload_data' => $this->upload->data());
                //Directorio donde se almacena la imagen
                $info['url'] = "assets/archivo/".$data['upload_data']['file_name'];
                $mensaje.="<li>El logo del patrocinador se guardo de manera exitosa.</li>";
	        }
	    }
	    if($this->GestorContenido_model->setPatrocinador($info))
	    {
	    	$mensaje.="<li> La información general del patrocinador se guardo de manera exitosa. </li></ul>";
	    	$this->session->set_flashdata("error",$mensaje);
	    	redirect(base_url()."cms_patrocinadores");
	    }else{
	    	$this->session->set_flashdata("error","No se pudo guardar la información.");
			redirect(base_url()."cms_patrocinador/agregar");
	    }
		
	}

	public function editar($id){
		$data = array(
			"patrocinador" => $this->GestorContenido_model->getPatrocinador($id),
		);
		$jquery = array("jquery" => "patrocinadorEditar.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/patrocinador/editar", $data);
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
		$descripcion = $this->input->post("descripcion");
		$enlace = $this->input->post("enlace");
		$fecha_modificacion = date("Y-m-d H:i:s");
		$url_imagen = 'Fondo_'.$nombre.'__'.$fecha_modificacion;
		$archivo = $this->GestorContenido_model->getPatrocinador($id);
		$mensaje = "<h5>Información sobre la actualización realizada:</h5><ul>";
		$info = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'enlace' => $enlace,
				'fecha_modificacion' => $fecha_modificacion,
				'usuario_modificacion_id' => $this->usuario_id,
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
                $mensaje.="<li>No se pudo actualizar con éxito el logo del patrocinador ".$nombre.". <sub>".$error['error']."</sub></li>";
                
	        }
	        else
	        {
                $data = array('upload_data' => $this->upload->data());
                //var_dump($data);
                //Directorio donde se almacena la imagen
                $info['url'] = "assets/archivo/".$data['upload_data']['file_name'];
                $mensaje.="<li>El logo fue actualizado con éxito. </li>";
                //Se verifica si hubo documento previo
                if($archivo->url){
                	if (is_readable($archivo->url) && unlink($archivo->url)) {
					    echo "El archivo ".$archivo->url." fue eliminado con éxito.";
					} else {
					    echo "El archivo ".$archivo->url." no fue encontrado en el directorio.";
					}
                }
	        }
	    }
	    
	    if($this->GestorContenido_model->updatePatrocinador($info, $id)){
	    	$mensaje.="<li>La información del patrocinador fue actualizada con éxito. </li></ul>";
	    	$this->session->set_flashdata("error",$mensaje);
	    	redirect(base_url()."cms_patrocinadores");
	    }else{
	    	$this->session->set_flashdata("error","Error al actualizar información.");
			redirect(base_url()."cms_patrocinador/".$id);
	    }
	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstadoPatrocinador($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updatePatrocinador($data, $id);
		redirect(base_url()."cms_patrocinadores");
	}
}