<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

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



	public function eventos()
	{	
	   	
		$dataHeader = array();
		$dataMenu = array(
		    'datos_menu' => $this->Cms_model->getMenu(),
		    'datos_contacto' => $this->Cms_model->getContacto(),
		    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
		);
		$dataContenido = array();
		$data = array(
	    	'datos_negociosverdes' => $this->Cms_model->getNegociosverdes(),
	    	'datos_documentos' => $this->Cms_model->getDocumentos(),
	    	'datos_convocatorias' => $this->Cms_model->getConvocatorias(),
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_slider' => $this->Cms_model->getSlider(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),
	    	'datos_psocios' => $this->Cms_model->getPratrocinadores(),
	    	'datos_equipo' => $this->Cms_model->getEquipov(),
	    	'datos_evento' => $this->Cms_model->getEventov(),
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_convocatorias' => $this->Cms_model->getConvocatorias(),
	    	'datos_acercade' => $this->Cms_model->getAcercade(),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
	    );
        
        $itemPag = 2;
	    $tabla = 'cms_publicacion';
	    $where = array('cms_publicacion.estado'=>1, 'cms_publicacion.cms_tipo_publicacion_id'=>2);
	    $total_rows = $this->Cms_model->getTotal($tabla,$where);
	    $start = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        	'limit'=>$itemPag,
        	'start'=>(!$start)?$start:($start-1)*$itemPag,
        );
        $data['datos_eventos'] = $this->Cms_model->getPublicacionesRecientes($consulta);

        if($total_rows > 0){

	        $config['base_url'] = base_url() . 'eventos/';
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
            $data['eventos'] = $this->Cms_model->getRowsTabla2($consulta);
            $data["pagination"] = $this->pagination->create_links();
	    }

		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $dataMenu);
		$this->load->view('sitio/eventosC', $data);
		$this->load->view('layouts/sitio/footerinicio.php', array("counter" => count_visitor($this->session->userdata("counter"))) );
	}

	public function leer($slug)
	{	
	   /* $data = array(
	    	// 'datos_menu' => $this->Cms_model->getMenu(),
	    	// 'datos_menu2' => $this->Cms_model->getMenu2(),
	    	// 'datos_slider' => $this->Cms_model->getSlider(),
	    	// 'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	// 'datos_psocios' => $this->Cms_model->getPratrocinadores(),
	    	// 'datos_equipo' => $this->Cms_model->getEquipov(),
	    	// 'datos_evento' => $this->Cms_model->getEventov(),
	    	// 'datos_galeria' => $this->Cms_model->getGaleria(),
	    	// 'datos_noticias' => $this->Cms_model->getNoticias(),
	    	// 'datos_documentos' => $this->Cms_model->getDocumentos(),
	    	// 'datos_convocatorias' => $this->Cms_model->getConvocatorias(),
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_slider' => $this->Cms_model->getSlider(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_psocios' => $this->Cms_model->getPratrocinadores(),
	    	'datos_equipo' => $this->Cms_model->getEquipov(),
	    	'datos_evento' => $this->Cms_model->getEventov(),
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_noticias' => $this->Cms_model->getNoticias(),
	    	'datos_servicios' => $this->Cms_model->getServicios(),
	    	'datos_documentos' => $this->Cms_model->getDocumentos(),
	    	'datos_convocatorias' => $this->Cms_model->getConvocatorias(),
	    	'datos_acercade' => $this->Cms_model->getAcercade(),
	    	'datos_noticias_slug' => $this->Cms_model->getNoticiasSlug($slug),
	    	'datos_convocatorias_slug' => $this->Cms_model->getConvocatoriaSlug($slug),
	    	'convocatoria'=>$this->Cms_model->getConvocatoria($slug),
	    	'convocatorias'=>$this->Cms_model->getConvocatoriasVigentes(5),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),
	    	
	    );

		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/leercon', $data);
		$this->load->view('layouts/sitio/footer.php');*/
		$tabla = 'cms_publicacion';
	    $where = array(
	    	'cms_publicacion.estado'=>1, 
	    	'cms_publicacion.cms_tipo_publicacion_id'=>2,
	    	'cms_publicacion.slug'=>$slug,
	    );
		$consulta = array(
        	'tabla'=>$tabla,
        	'where'=>$where,
        );
        $whereReciente = array(
	    	'cms_publicacion.estado'=>1, 
	    	'cms_publicacion.cms_tipo_publicacion_id'=>2,
	    );
        $eventosRecientes = array(
        	'tabla'=>$tabla,
        	'where'=>$whereReciente,
        );
	    
	    $data = array(
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_evento' => $this->Cms_model->getEventov(),
	    	'datos_contacto' => $this->Cms_model->getContacto(),
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_noticias_slug' => $this->Cms_model->getNoticiasSlug($slug),
	    	'evento'=>$this->Cms_model->getPublicacion($consulta),
	    	'eventos'=>$this->Cms_model->getPublicacionesRecientes($eventosRecientes),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),
	    );

		$this->load->view('layouts/sitio/header.php',$data);
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/leerEvento', $data);
			$this->load->view('layouts/sitio/footerinicio.php', 
				array("counter" => count_visitor($this->session->userdata("counter")),
				"jquery" => 'lazy.js'
		) );
	}

}
