<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenido extends CI_Controller {

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

	public function getGaleria(){
		$query = $this->Cms_model->getContenidoGaleria();
		$data = array();
		foreach ($query as $key) {
			$data[] = array("title" => $key->nombre, "value" => base_url().$key->url);
		}
		echo json_encode($data);
	}

	public function index(){
	    
	    $data = array('contenidos' => $this->Cms_model->getRegistrosContenidos(),);
	    
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/contenido/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
	public function agregar(){
	    
	  
	     $data = array(
	    	'conteidos' => $this->Cms_model->getRegistrosContenidos(),
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
	    	);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/contenido/agregar", $data);
		$this->load->view("layouts/dashboard/footer.php", array("jquery" => "contenido.js"));
	}
	
	public function guardar(){
		$titulo = $this->input->post("titulo");
		$contenido = $this->input->post("contenido");
		$categoria = $this->input->post("categoria");
		$slug = $this->Cms_model->slugify($titulo);

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
						'titulo' => $titulo,
						'descripcion' => $contenido,
						'cuerpo' => $contenido,
						'id_categoria' => $categoria,
						'postSlug' => $slug,
						'likes' => Null,
						'hates' => Null,
						'autor' => 'Admin',
						'fechacrea' => date('Y-m-d H:i:s'),
						'portada' => $url_img,
						'statusPost' => 'A'
					  );

		$this->Cms_model->insertar('cms_entradas', $data);
		
		
		$data  = array(
						'id' => Null,
						'nombre' => $titulo,
						'Url' => 'noticias/leer/'.$slug,
						'descripcion' =>$contenido,
						'statusSlider' =>'A',
						'fotografia' => $url_img
					  );

		$this->Cms_model->insertar('cms_slider', $data);
		
		
		
		redirect(base_url()."cms/contenido/");

	}


	public function editar($id){

		 $data = array(
	    	//'conteidos' => $this->Cms_model->getRegistrosContenidos(),
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
	    	);


		$titulo = $this->input->post("titulo");
		$contenido = $this->input->post("contenido");
		$categoria = $this->input->post("categoria");
		$slug = $this->Cms_model->slugify($titulo);

		$datos  = array(
						'titulo' => $titulo,
						'descripcion' => $contenido,
						'cuerpo' =>$contenido,
						'id_categoria' => $categoria,
						'postSlug' => $slug,
						'likes' => Null,
						'hates' => Null,
						'autor' => 'Admin',
						'fechacrea' => date('Y-m-d H:i:s'),						
						'statusPost' => 'A'
					  );


		if(count($_FILES) > 0 ){
			$mi_archivo = 'imagen';
	        $config['upload_path'] = "uploads/contenido/";
	        $config['file_name'] = "cont_".$id."_".rand(999,99929);
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        $config['max_width'] = "2000";
	        $config['max_height'] = "2000";

	        $this->load->library('upload', $config);
	        
	        if (!$this->upload->do_upload($mi_archivo)) {
	            $data['uploadError'] = $this->upload->display_errors();
	            $this->session->set_flashdata("alert_data", "alert alert-warning");
				$this->session->set_flashdata("mensaje","Algo está mal, no se ha cargado el archivo");
	        }else{
		        $data['uploadSuccess'] = $this->upload->data();
				$url_img = $config['upload_path'].$data['uploadSuccess']['orig_name'];
				$datos['portada']  = $url_img;
			}
		}

		
		if($this->Cms_model->actualizar('cms_entradas', 'id', $id, $datos)){
			$this->session->set_flashdata("alert_data", "alert alert-success");
			$this->session->set_flashdata("mensaje","El contenido fue modificado con éxito");
		}else
		{
			$this->session->set_flashdata("alert_data", "alert alert-danger");
			$this->session->set_flashdata("mensaje","Ocurrio un error, el contenido no fue modificado");
		}

		redirect(base_url()."cms/contenido/seleccionar/$id/editar");



	}


	public function eliminar($id){
		$this->Cms_model->eliminar('cms_entradas', 'id', $id);
		redirect(base_url()."cms/contenido/");
	}


	public function activar($id){
		$this->Cms_model->active('cms_entradas', 'id', $id, 'statusPost', "'A'");
		redirect(base_url()."cms/contenido/");
	}
	public function desactivar($id){
		$this->Cms_model->active('cms_entradas', 'id', $id, 'statusPost', "'I'");
		redirect(base_url()."cms/contenido/");
	}


	public function seleccionar($id, $acc = ""){

		 $data = array(
	    	'menu' => $this->Cms_model->getRegistros(),
	    	'tipomenu' => $this->Cms_model->getTipoMenu(),
	    	'contenido' => $this->Cms_model->getContenidos(),
	    	'id' => $id,
	    	'acc' => $acc,
	    	'categorias' => $this->Cms_model->getCategoriasContenidos(),
			'registro' => $this->Cms_model->getVerRegistroContenido($id),
			'orden_menu' => $this->Cms_model->getListaMenu(),
			"jquery" => "contenido.js"
		);

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/contenido/ver", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}
	
}

