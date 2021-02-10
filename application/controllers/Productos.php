<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Productos extends CI_Controller {



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







	public function index($idMenu = 40)

	{	
	  
		$dataMenu = array(

            'datos_menu' => $this->Cms_model->getMenuPrincipal(),
            'menu_secundario' => $this->Cms_model->getMenuSecundario(),
    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",

    	    'sliders' => $this->Cms_model->getSlider2(),
		    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),

    	    'contacto' => $this->Cms_model->getContacto()

        );

        $itemPag = 2;
	    $tabla = 'producto';
	    $where = array('producto.estado'=>1);
	    $total_rows = $this->Cms_model->getProductos2();
	    $start = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
       	
       	$data = array();

        if($total_rows > 0){

	        $config['base_url'] = base_url() . 'productos/';
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
	        $config["uri_segment"] = 2;
	        
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
            $data['datos_productos'] = $this->Cms_model->getRowsTabla3($consulta);
            //var_dump($this->pagination);
            $data["pagination"] = $this->pagination->create_links();
            
	    }

	    $data['menu'] = $this->Cms_model->getMenuId(40);
        /*$data = array(
        	'datos_servicios' => $this->Cms_model->getServicios2(),
        	'menu' => $this->Cms_model->getMenuId(17),
        );*/

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/productos2', $data);

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

        $data['dato_producto'] = $this->Cms_model->getProductoSlug($slug);
        $data['datos_productos_recientes'] = $this->Cms_model->getProductoSRecientes();

	    $data['menu'] = $this->Cms_model->getMenuId(17);
       

		$this->load->view('layouts/contenido/header.php');

		$this->load->view('layouts/contenido/menu', $dataMenu);

		$this->load->view('sitio/leerProducto', $data);

		$this->load->view('layouts/sitio/footerinicio.php', 

					array("counter" => count_visitor($this->session->userdata("counter")),

					'jquery' => array("assets/template/js/lazy.js" )));

	

	}

}

