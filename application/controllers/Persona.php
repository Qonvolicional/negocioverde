<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->model("Cms_model");
		 $this->load->model("Persona_model");
		 $this->load->library('pagination');
	}

	public function perfil($persona_id){
		 $dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionReciente(),
		    	    'contacto' => $this->Cms_model->getContacto()
		);
		$data = array(
			"perfil" => $this->Persona_model->getPerfilId($persona_id),
			"perfil_habilidades" => $this->Persona_model->getPerfilHabilidadesId($persona_id),
			"data_style" => 'perfil.css',
			"randon_image" => $this->Persona_model->randonImage()
		);

		$this->load->view('layouts/contenido/header.php', $data);
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('sitio/referente/perfil', $data);
		//$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(31)));
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}

	public function referentes(){
		 $dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionReciente(),
		    	    'contacto' => $this->Cms_model->getContacto()
		);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$numeros_registros = 3;
		$total_rows =  $this->Persona_model->getAllPerfilNumRows();
		$data = array(
			"menu" => $this->Cms_model->getMenuId(35),
			"datos_equipo" => $this->Persona_model->getAllPerfilLimited($numeros_registros, $start),
			
		);

	    
        if(count($data['datos_equipo']) > 0){

	        $config['base_url'] = base_url() . 'inspira/referentes/';
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $numeros_registros;
	        $config["uri_segment"] = 3;
	        // get current page records
	       	     
	        // custom paging configuration
	        $config['num_links'] = 2;
	        $config['use_page_numbers'] = TRUE;
	        $config['reuse_query_string'] = TRUE;
	         
	        $config['full_tag_open'] = '<ul class="pagination  d-flex flex-wrap m-0">';
	        $config['full_tag_close'] = '</ul>';
	         
	        $config['prev_link'] = '<i class="fas fa-angle-double-left"></i>';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';

	        $config['first_link'] = '<i class="fas fa-angle-double-left"></i>';
	        $config['first_tag_open'] = '<li class="prev">';
	        $config['first_tag_close'] = '</li>';
	         
	        $config['last_link'] = '<i class="fas fa-angle-double-right"></i>';
	        $config['last_tag_open'] = '<li class="next">';
	        $config['last_tag_close'] = '</li>';
	         
	        $config['next_link'] = '<i class="fas fa-angle-double-right"></i>';
	        $config['next_tag_open'] = '<li class="next">';
	        $config['next_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li><a href="#" class="active d-none d-md-block">';
	        $config['cur_tag_close'] = '</a></li>';

	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data["pagination"] = $this->pagination->create_links();
        
	    }

		$this->load->view('layouts/contenido/header.php');
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('layouts/componentes/perfiles_detalle', $data);
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}
}
 ?>