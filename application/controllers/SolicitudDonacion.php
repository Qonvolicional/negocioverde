<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudDonacion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		 $this->load->model("Cms_model");
		 $this->load->library('pagination');
		  $this->load->model('Donacion_model');
	}



	public function index()
	{	
	   	
		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	    'sliders' => $this->Cms_model->getSlider2(),

    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

	   	$data = array(
	   		"paises"=>$this->Donacion_model->getPais()
	   		
	   	);
	   		$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(31))); 
		$jquery = array("jquery"=>array("assets/template/js/lazy.js","assets/template/js/donacion.js"));
		
		$this->load->view('sitio/donacion', $data);
		$this->load->view('layouts/sitio/footerinicio.php', array("counter" => count_visitor($this->session->userdata("counter")),"jquery"=>array("assets/template/js/lazy.js","assets/template/js/donacion.js")) );
		//$this->load->view('layouts/sitio/footerinicio',$jquery);
	}

	public function almacenar(){
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$fijo = $this->input->post("fijo");
		$celular = $this->input->post("celular");
		$correo = $this->input->post("correo");
		$direccion = $this->input->post("direccion");
		$municipio_id = $this->input->post("municipio_id");
		$mensaje = $this->input->post("mensaje");
		$data = array(
			'nombres'=>$nombres,
			'apellidos'=>$apellidos,
			'fijo'=>$fijo,
			'celular'=>$celular,
			'correo'=>$correo,
			'direccion'=>$direccion,
			'municipio_id'=>$municipio_id,
			'mensaje'=>$mensaje,
		);
		$this->Donacion_model->setSolicitudDonacion($data);
		redirect(base_url()."solicitudDonacion");
	}

	public function cargarCombo()
	{
		$tabla = $this->input->post('tabla');
		$where = $this->input->post('where');
		$datos = $this->Donacion_model->getRegistrosCondicionados($tabla, $where);
		echo "<option value='' selected>Selecciona una opción</option>";
		foreach ($datos as $value) {
			echo "<option value='".$value->id."'>".$value->nombre."</option>";
		}
	}

	

}
