<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negociose extends CI_Controller {

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



	public function index()
	{	
	    $data = array(
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
	    );

	   $itemPag = 6;
	    $tabla = 'negocios_evaludos2';
	    $where = array('estado'=>1, 'verificacion2'=>1);
	    $total_rows = $this->Cms_model->getTotal($tabla,$where);
	    $start = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $total_rows = $this->Cms_model->getTotal($tabla,$where);
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );

        if($total_rows > 0){

	        $config['base_url'] = base_url() . 'negociose/';
	        $config['total_rows'] = $total_rows;
	        $config['per_page'] = $itemPag;
	        $config["uri_segment"] = 6;
	        
	        // get current page records
	       	     
	        // custom paging configuration
	        $config['num_links'] = 6;
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
        	//$this->config->load("Pagination");
			// $page_limit = $this->config->item("per_page");
			// $config['total_rows'] = $total_rows; // Some variable count
			// $this->pagination->initialize($config);
            $this->pagination->initialize($config);
            $data['datos_negociose'] = $this->Cms_model->getRowsTabla($consulta);
            $data["pagination"] = $this->pagination->create_links();
	    }
	    exit;
		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/negociose', $data);
		$this->load->view('layouts/sitio/footerinicio.php', array("jquery" => array("assets/template/js/lazy.js"), "counter" => count_visitor($this->session->userdata("counter"))) );
	}

}
