<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acercade extends CI_Controller {

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
	}



	public function index()
	{	
	    $data = array(
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_acercade' => $this->Cms_model->getAcercade(),
	    	'datos_contacto' => $this->Cms_model->getContacto(),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
	    );

		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/acercade', $data);
		$this->load->view('layouts/sitio/footerinicio.php', 
			array(
				"counter" => count_visitor($this->session->userdata("counter")),
				'jquery' => array("assets/template/js/lazy.js")) );

	}

}
