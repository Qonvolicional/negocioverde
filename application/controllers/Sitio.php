<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio extends CI_Controller {

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
				$this->load->view('layouts/sitio/header.php');
				$this->load->view('layouts/sitio/menu', $dataMenu);
				$this->load->view('layouts/componentes/perfiles', array(
					'menu' => $this->Cms_model->getMenuId(16),
					'datos_equipo' => $this->Persona_model->getAllPerfilLimited(8)
				));

				$this->load->view('layouts/componentes/catalogo_opcion_1', array(
					'menu' => $this->Cms_model->getMenuId(17),
					'datos_contenido' => $this->Cms_model->getMenuContenidoPublicacion(17)
				));

				$this->load->view('layouts/componentes/columna_video', array(
					'menu' => $this->Cms_model->getMenuId(14),
				));				
				//$this->load->view('sitio/layout_2_column_video', $this->Cms_model->getEntrada());
				
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
