<?php  
defined("BASEPATH") or exit("No está permitido el acceso a este espacio");


/**
* Mesa controller
*/
class Contenido extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->model("Cms_model");
		 $this->load->library("session");
		 $this->load->library('pagination');
	}


	public function index($menu_id){

				$dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
                    'menu_secundario' => $this->Cms_model->getMenuSecundario(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),
		    	    'contacto' => $this->Cms_model->getContacto(),

                );
				$this->load->view('layouts/contenido/header.php', array( 'data_style' => "perfil.css"));
				$this->load->view('layouts/contenido/menu', $dataMenu);
				$parametros = explode("-",$menu_id);
				$menu = "";
				if(count($parametros) > 1 && is_int((int)$parametros[0]))
					$menu = $parametros[0];
				
				;

				$contenido_datps = $this->Cms_model->getMenuContenidoPublicacion($menu);
				if(count($contenido_datps) == 1){
					$contenido =  $this->Cms_model->getMenuContenidoPublicacion($menu_id);
					$contenido_menu = array(
							"nombre" =>  $this->Cms_model->getMenuContenidoPublicacion($menu_id)[0]->titulo,
							"descripcion" =>  $this->Cms_model->getMenuContenidoPublicacion($menu_id)[0]->descripcion,
							"slugArticulo" => "contenido/".$menu_id
					);
					$this->load->view('layouts/componentes/columna', array(
						'menu' => (object)$contenido_menu,
						'datos_contenido' => $this->Cms_model->getMenuContenidoPublicacion($menu)
					));
				}
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}

	public function organigrama(){
		
		
				$dataMenu = array(
                    'datos_menu' => $this->Cms_model->getMenuPrincipal(),
		    	    'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión",
		    	    'sliders' => $this->Cms_model->getSlider2(),
		    	    'publicaciones_recientes' => $this->Cms_model->getPublicacionRecienteLimite(1),
		    	    'contacto' => $this->Cms_model->getContacto()
                );
				$this->load->view('layouts/contenido/header.php', array("data_style" => "organigrama-style.css"));
				$this->load->view('layouts/contenido/menu', $dataMenu);
				$this->load->view('layouts/componentes/organigrama');
		$this->load->view('layouts/sitio/footerinicio.php', 
					array("counter" => count_visitor($this->session->userdata("counter")),
					'jquery' => array("assets/template/js/lazy.js" )) );
	}
}

?>