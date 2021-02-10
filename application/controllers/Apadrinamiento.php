<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apadrinamiento extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
			$this->load->model("Usuarios_model");
			$this->load->model("Persona_model");
			$this->load->model("Area_model");
			$this->load->model("Cms_model");
			$this->load->model("Modulo_model");
			$this->load->model("Apadrinamiento_model");
			$this->load->model("Donacion_model");
			$this->load->library('session');
			$this->rol_usuario = $this->session->userdata("rol");
			$this->super = $this->session->userdata("super");
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
		$data = array(
			"data_style" => 'perfil.css',
			"randon_image" => $this->Persona_model->randonImage()
		);

		$this->load->view('layouts/contenido/header.php', $data);
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(14))); //56,  57, 58, '''59
		$this->load->view('layouts/componentes/publicacion_simple', array("contenido" => $this->Cms_model->getContenidoId(56))); //56,  57, 58, '''59
		
		$this->load->view('layouts/componentes/columna_3_pasos', array("contenido" => array(
			$this->Cms_model->getContenidoId(58),
			$this->Cms_model->getContenidoId(57),
			$this->Cms_model->getContenidoId(59)
		)));
		$this->load->view('layouts/componentes/parragrafo_vibrante.php', 
			array("primer_texto" => " ¿ Quieres enviar una solicitud de apadrinamiento pero no sabes a cual referente ?",
				   "segundo_texto" => "Ir a mira los referentes para apadrinar",  
				   "href_ir" => "inspira/referentes/"));
		
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}

	public function guardarHistoria($referente_id){
		if($this->Apadrinamiento_model->guardarHistoria($referente_id)){
			redirect(base_url()."apadrinamiento");
		}
	}

	public function gracias(){


		$dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionReciente(),
		    	    'contacto' => $this->Cms_model->getContacto()
		);
		$data = array(
			"data_style" => 'perfil.css',
			"randon_image" => $this->Persona_model->randonImage()
		);

		$this->load->view('layouts/contenido/header.php', $data);
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(14))); //56,  57, 58, '''59
		$this->load->view('layouts/componentes/parragrafo_vibrante.php', 
			array("primer_texto" => "Gracias por mostrar interes en apadrinar un referenre de nuestra corporación",
				   "segundo_texto" => "Te contactaremos lo más pronto posible para seguir el proceso de apadrinamiento",  
				   "href_ir" => "#"));
		
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}

	public function funcionamiento(){


		$dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionReciente(),
		    	    'contacto' => $this->Cms_model->getContacto()
		);
		$data = array(
			"data_style" => 'perfil.css',
			"randon_image" => $this->Persona_model->randonImage()
		);

		$this->load->view('layouts/contenido/header.php', $data);
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(14))); //56,  57, 58, '''59
		$this->load->view('layouts/componentes/publicacion_simple', array("contenido" => $this->Cms_model->getContenidoId(56))); //56,  57, 58, '''59
		
		$this->load->view('layouts/componentes/columna_3_pasos', array("contenido" => array(
			$this->Cms_model->getContenidoId(58),
			$this->Cms_model->getContenidoId(57),
			$this->Cms_model->getContenidoId(59)
		)));
		$this->load->view('layouts/componentes/parragrafo_vibrante.php', 
			array("primer_texto" => "Quieres enviar una solicitud de apadrinamiento pero no sabes a cual referente",
				   "segundo_texto" => "Ir a mira los referentes para apadrinar",  
				   "href_ir" => "inspira/referentes/"));
		
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}

	public function referente($persona_id){


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
			"randon_image" => $this->Persona_model->randonImage(),
			"paises"=>$this->Donacion_model->getPais(),
			"id_referente" => $persona_id
		);

		$this->load->view('layouts/contenido/header.php', $data);
		$this->load->view('layouts/contenido/menu', $dataMenu);
		$this->load->view('layouts/componentes/titulo_vibrante', array("menu" => $this->Cms_model->getMenuId(14)));
		$this->load->view('layouts/componentes/publicacion_simple', array("contenido" => $this->Cms_model->getContenidoId(56))); //56,  57, 58, '''59
		
		$this->load->view('layouts/componentes/columna_3_pasos', array("contenido" => array(
			$this->Cms_model->getContenidoId(58),
			$this->Cms_model->getContenidoId(57),
			$this->Cms_model->getContenidoId(59)
		)));

		$this->load->view('sitio/apadrinamiento/solicitud');
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js", "assets/template/js/donacion.js")) );
	}

	public function guardarSolicitud(){
		$id_referente = $this->input->post("id_referente");
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
			'celular'=>$celular,
			'fijo'=>$fijo,
			'correo'=>$correo,
			'direccion'=>$direccion,
			'ciudad_id'=>$municipio_id,
			'comentario'=>$mensaje,
			"persona_id" => $id_referente,
		);

		if($this->Apadrinamiento_model->guardarSolicitud($data)){
			redirect(base_url()."apadrinamiento/gracias");	
		}else{
			$this->session->set_flashdata('error_apadrinamiento', "error");
			redirect(base_url()."apadrinamiento/referente/". $id_referente);	
		}
		
	}

	public function verHistoria($historia_id){
		
	}

}