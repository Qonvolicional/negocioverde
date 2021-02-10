<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Valores extends CI_Controller {

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
		 $this->load->library("session");
		 $this->load->library('pagination');
		 $this->load->model("Dashboard_model");
		 $this->load->model("Persona_model");

	}





	public function index()
	{	
                $dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionReciente(),
		    	    'contacto' => $this->Cms_model->getContacto()
                );
                $this->load->view('layouts/contenido/header.php', array("data_style" => "valores.css"));
		$this->load->view('layouts/contenido/menu', $dataMenu);
				$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(22)));
				$this->load->view('layouts/componentes/circular');
				
				$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->has_userdata('counter')),
					'jquery' => array("assets/template/js/lazy.js" ),
					  'contacto' => $this->Cms_model->getContacto()				) );
		
		$newdata = array(
        'ultima_url'  => $_SERVER['SCRIPT_NAME'],
		);

		$this->session->set_userdata($newdata);
		$this->session->set_userdata("counter", $_SERVER['REMOTE_ADDR']);
	}
}
