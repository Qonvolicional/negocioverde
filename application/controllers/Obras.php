<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Obras extends CI_Controller {



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

	}


	public function index($slug='teatro'){	
	    

		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
             'menu_secundario' => $this->Cms_model->getMenuSecundario(),

    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	    'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

        $itemPag = 15;
	    $tabla = 'obras';
	    $where = array('obras.estado'=>1,'tipo_obra.controlador'=>$slug);
	    $total_rows = $this->Cms_model->getNumObras($slug);
	    $start = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
       	
       	$data = array();

        if($total_rows > 0){

	        $config['base_url'] = base_url() . "obras/$slug/";
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
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
        	
        	/*$this->config->load("Pagination");
			$page_limit = $this->config->item("per_page");
			$config['total_rows'] = $total_rows; // Some variable count
			 $this->pagination->initialize($config);*/
            
            
            $this->pagination->initialize($config);
            $data['datos_obras'] = $this->Cms_model->getObras($consulta);
            //var_dump($this->pagination);
            $data["pagination"] = $this->pagination->create_links();
            
	    }

	    $data['menu'] = $this->Cms_model->getMenuId(17);
        /*$data = array(
        	'datos_servicios' => $this->Cms_model->getServicios2(),
        	'menu' => $this->Cms_model->getMenuId(17),
        );*/

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/obras', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

	public function leer($slug)

	{	

		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	   'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

       	
       	$data = array();

        $data['dato_obra'] = $this->Cms_model->getObraSlug($slug);
        if($data['dato_obra']){
        	$data['galeria'] = $this->Cms_model->getObraRecurso($data['dato_obra']->id,1);
        	$data['videos'] = $this->Cms_model->getObraRecurso($data['dato_obra']->id,2);
        }
        
        $data['datos_obras_recientes'] = $this->Cms_model->getObrasRecientes($slug);

	    $data['menu'] = $this->Cms_model->getMenuId(25);
       

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/leerObra', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

	public function teatro()

	{	
	   
	   $slug='teatro';

		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	   'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

        $itemPag = 15;
	    $tabla = 'obras';
	    $where = array('obras.estado'=>1,'tipo_obra.controlador'=>$slug);
	    $total_rows = $this->Cms_model->getNumObras($slug);
	    $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
       	
       	$data = array();

        if($total_rows > 0){

	        $config['base_url'] = base_url() . "obras/$slug/";
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
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
        	
        	/*$this->config->load("Pagination");
			$page_limit = $this->config->item("per_page");
			$config['total_rows'] = $total_rows; // Some variable count
			 $this->pagination->initialize($config);*/
            
            
            $this->pagination->initialize($config);
            $data['datos_obras'] = $this->Cms_model->getObras($consulta);
            //var_dump($this->pagination);
            $data["pagination"] = $this->pagination->create_links();
            
	    }

	    $data['menu'] = $this->Cms_model->getMenuId(25);
        /*$data = array(
        	'datos_servicios' => $this->Cms_model->getServicios2(),
        	'menu' => $this->Cms_model->getMenuId(17),
        );*/

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/obras', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

	public function danzaUrbana()

	{	
	   
	   $slug='danzaUrbana';

		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	   'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

        $itemPag = 15;
	    $tabla = 'obras';
	    $where = array('obras.estado'=>1,'tipo_obra.controlador'=>$slug);
	    $total_rows = $this->Cms_model->getNumObras($slug);
	    $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
       	
       	$data = array();

        if($total_rows > 0){

	        $config['base_url'] = base_url() . "obras/$slug/";
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
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
        	
        	/*$this->config->load("Pagination");
			$page_limit = $this->config->item("per_page");
			$config['total_rows'] = $total_rows; // Some variable count
			 $this->pagination->initialize($config);*/
            
            
            $this->pagination->initialize($config);
            $data['datos_obras'] = $this->Cms_model->getObras($consulta);
            //var_dump($this->pagination);
            $data["pagination"] = $this->pagination->create_links();
            
	    }

	    $data['menu'] = $this->Cms_model->getMenuId(27);
        /*$data = array(
        	'datos_servicios' => $this->Cms_model->getServicios2(),
        	'menu' => $this->Cms_model->getMenuId(17),
        );*/

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/obras', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

	public function danzaTradicional()

	{	
	   
	   $slug='danzaTradicional';

		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	   'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

        $itemPag = 15;
	    $tabla = 'obras';
	    $where = array('obras.estado'=>1,'tipo_obra.controlador'=>$slug);
	    $total_rows = $this->Cms_model->getNumObras($slug);
	    $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
       	
       	$data = array();

        if($total_rows > 0){

	        $config['base_url'] = base_url() . "obras/$slug/";
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
	        $config["uri_segment"] = 5;
	        
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
        	
        	/*$this->config->load("Pagination");
			$page_limit = $this->config->item("per_page");
			$config['total_rows'] = $total_rows; // Some variable count
			 $this->pagination->initialize($config);*/
            
            
            $this->pagination->initialize($config);
            $data['datos_obras'] = $this->Cms_model->getObras($consulta);
            //var_dump($this->pagination);
            $data["pagination"] = $this->pagination->create_links();
            
	    }

	    $data['menu'] = $this->Cms_model->getMenuId(26);
        /*$data = array(
        	'datos_servicios' => $this->Cms_model->getServicios2(),
        	'menu' => $this->Cms_model->getMenuId(17),
        );*/

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/obras', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

}

