<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Informacion extends CI_Controller {



	public function __construct(){

		parent::__construct();

		if($this->session->userdata("login")){

			$this->load->model("Usuarios_model");

			$this->load->model("Cargo_model");

			$this->load->model("Area_model");

			$this->load->model("Entidad_model");

			$this->load->model("Modulo_model");

			$this->load->model("Apadrinamiento_model");

			$this->load->model("Cms_model");

			$this->rol_usuario = $this->session->userdata("rol");

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

	        'informacion' => $this->Cms_model->getContacto(),

	    );

	    

		$this->load->view("layouts/dashboard/header.php");

		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);

		$this->load->view("dashboard/cms/informacion/lista", $data);

		$this->load->view("layouts/dashboard/footer.php");

	}



	public function actualizar($id=1){

		$url_id = 0;



		if(count($_FILES) > 0 ){

				//Subiendo el imagen

				$config['upload_path']          = './assets/archivo/';

				//echo base_url().'assets/';

		        $config['allowed_types']        = '*';

		        //Configurando el nuevo del archivo

		        $config['file_name']			= 'empresa_id_'.$id;

		        $config['max_size']             = 5000;

		        $config['max_width'] = "2000";

	        	$config['max_height'] = "2000";

		        $this->load->library('upload', $config);

		        if ( !$this->upload->do_upload('imagen'))

		        {

	                $error = array('error' => $this->upload->display_errors());

	                $url_id = 0;

		        }

		        else

		        {

	                $data = array('upload_data' => $this->upload->data());

	                //var_dump($data);

	                //Directorio donde se almacena la imagen

	                $imagen['url'] = "assets/archivo/".$data['upload_data']['file_name'];

	                $imagen['nombre'] = $data['upload_data']['file_name'];

	                //Guardar el registro de la nueva imagen

	                if($this->Usuarios_model->guardarImagen($imagen)){

		        		$url_id = $this->Usuarios_model->lastID();

		        	}

		        }

		    }	



		$data  = array(

						'nombre' => $this->input->post("nombre"),

						'correo' => $this->input->post("correo"),

						'horario_atencion' => $this->input->post("horario_atencion"),

						'telefono' =>  $this->input->post("telefono"),

						'facebook' =>  $this->input->post("facebook"),

						'instagram' =>  $this->input->post("instagram"),

						'twitter' => $this->input->post("twitter"),

						'youtube' => $this->input->post("youtube"),

						'whatsapp' => $this->input->post("telefono"),

						'imagen_id' => $url_id

					  );

					  

		$this->Cms_model->actualizarDatos($id, $data);

		redirect(base_url()."informacion/");

	}

	

	public function activar($id){

		$this->Cms_model->active('cms_contacto', 'id', $id, 'estado', "'A'");

		redirect(base_url()."informacion/");

	}

	public function desactivar($id){

		$this->Cms_model->active('cms_contacto', 'id', $id, 'estado', "'I'");

		redirect(base_url()."informacion/");

	}



	public function seleccionar($id=1, $acc = ""){

		//$data = array('id' => $id,);

		 $data = array(

	    	'empresa' => $this->Cms_model->getContacto(),

	    	'id' => $id,

	    	'acc' => $acc

		);



		$this->load->view("layouts/dashboard/header.php");

		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);

		$this->load->view("dashboard/cms/informacion/ver", $data);

		$this->load->view("layouts/dashboard/footer.php");

	}

	

}



