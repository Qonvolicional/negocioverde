<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Cms_model");
			$this->load->model("Usuarios_model");
			$this->load->model("NegocioVerde_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->usuario_id = $this->session->userdata("usuario");
			$this->super = $this->session->userdata("super");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario, $this->super),
				'admin' => $this->session->userdata("admin"),
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}

	}

	public function index(){
	    
	    $data = array(
	    	'menus' => $this->Cms_model->getMenus(),
	    );
	    $jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/cms/menu/lista", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function agregar(){
		$jquery = array("jquery" => "menuAgrega.js");
		$data = array(
			'tipomenu' => $this->Cms_model->getTipoMenu2(),
			'menupadre' => $this->Cms_model->getMenuPadre(),
	    	'contenidos' => $this->Cms_model->getContenidos2(),
			'tiposPublicacion' => $this->Cms_model->getTipoPublicacionesC(),
			'menuPrincipal' => $this->Cms_model->getMenusPrincipal(),
			'menuSecundario' => $this->Cms_model->getMenusSecundario(),

		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/menu/agregar", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function cargarCombo()
	{
		$tabla = $this->input->post('tabla');
		$where = $this->input->post('where');
		$datos = $this->NegocioVerde_model->getRegistrosCondicionados($tabla, $where);
		$mensaje = array('opciones'=>'');
		$mensaje['opciones'].="<option value='' selected>Selecciona una opción</option>";
		foreach ($datos as $value) {
			$mensaje['opciones'].="<option value='".$value->id."'>".$value->nombre."</option>";
		}
		$mensaje['numero'] = $this->Cms_model->getNumsRegistros($tabla, $where);
		echo json_encode($mensaje);
	}

	private function getNumRows(){
		$tabla = $this->input->post("tabla");
		$where = $this->input->post("where");
		$mensaje = array("numero" => $this->Cms_model->getNumsRegistros($tabla, $where));
		echo json_encode($mensaje); 
	}

	private function ordenarMenu($condicion,$orden){
		$datos = $this->Cms_model->getSiguientesMenu($condicion);
		foreach ($datos as $d) {
			$orden++;
			$aux = array(
				'orden'=>$d->orden,
			);
			$this->Cms_model->updateMenu3($d->id, $aux);
		}
	}

	public function almacenar(){
		
		$this->form_validation->set_rules("menu_padre","Menu padre","required");
		$this->form_validation->set_rules("nombre","Título de menu","required|min_length[6]|max_length[100]|is_unique[cms_menu.nombre]");
		$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de contenido","required");
		if($this->form_validation->run())
		{
			date_default_timezone_set('America/Bogota');
			$menupadre = intval($this->input->post("menu_padre"));
			$tipomenu = intval($this->input->post("tipo_menu"));
			$nombre = trim($this->input->post("nombre"));
			$descripcion = trim($this->input->post("descripcion"));
			$contenido = $this->input->post("menu_contenidos");
			$ubicacion = intval($this->input->post("ubicacion"));
			$posicion = intval($this->input->post("posicion"));

			$condicion = array();
			if($menupadre){//Cuando pertenece a un menu 
				$condicion['menupadre'] = $menupadre;
			}else{//Cuando se crea un menu padre
				$condicion['tipomenu'] = $tipomenu;
			}
			
			if($ubicacion==3){
				$ultimo = $this->Cms_model->getUltimoMenu($condicion);
				$orden = $ultimo + 1;
			}else{
				$aux = $this->Cms_model->getOrdenMenu($posicion);
				if($ubicacion==1){
					$condicion['id'] = '> '.$posicion;
					$orden = $aux->orden + 1;
				}else{
					$condicion['id'] = '>= '.$posicion;
					$orden = $aux->orden - 1;
				}
				$this->ordenarMenu($condicion, $orden);
			}

			$cms_tipo_publicacion_id = $this->input->post("cms_tipo_publicacion_id");
			$noPermitoSlug = array(4);
			if(!in_array($cms_tipo_publicacion_id, $noPermitoSlug)){
				if($cms_tipo_publicacion_id == 6){
					$slugArticulo = trim($this->input->post("slugArticulo"));
				}else{
					$slugArticulo = $this->Cms_model->getSlugTipoPublicacion($cms_tipo_publicacion_id);
					$slugArticulo = $slugArticulo->slug;
				}
			}else{
				$slugArticulo = trim($this->input->post("slugArticulo2"));
			}
			$fecha_creacion = date('Y-m-d H:i:s');
			$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
			$info = array(
						'menupadre' => $menupadre,
						'nombre' => $nombre,
						'descripcion' => $descripcion,
						'cms_tipo_publicacion_id' => $cms_tipo_publicacion_id,
						'tipomenu' => ((int)$tipomenu == 0) ? 1:$tipomenu,
						'slugArticulo' => $slugArticulo,
						'orden'=> $orden,
						'fecha_creacion' => $fecha_creacion,
						'usuario_id' => $this->usuario_id,
						'fecha_modificacion' => $fecha_creacion,
						'usuario_modificacion_id' => $this->usuario_id,
						'estado' => 1,
			);

		    if($this->Cms_model->setMenu($info))
		    {
		    	$mensaje.="<li>La información general de la publicación se guardo con éxito.</li>";
		    	$idMenu = $this->Cms_model->lastID();
		    	if(!empty($contenido) && $cms_tipo_publicacion_id == 4){
		    		$infoContenido = array();
		    		$i = 0;
		    		foreach($contenido as $c){
		    			$infoContenido[$i]['cms_menu_id'] = $idMenu;
		    			$infoContenido[$i]['cms_publicacion_id'] = $c;
		    			$infoContenido[$i]['orden'] = $i+1;
		    			$i++; 
		    		}
		    		$this->Cms_model->setMenuContenido($infoContenido);
		    		$mensaje.="<li>El contenido del menu guardo con exito.</li>";
		    	}
		    	$mensaje.="</ul>";
		    	$this->session->set_flashdata("error",$mensaje);
		    	redirect(base_url()."cms/menu");
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."cms/menu/agregar");
		    }
		}else{
			$this->agregar();
		}
	}	

	public function actualizar(){
		/*$path = "assets/archivo/convocatoria_documento_Inaguracion_35-45__2020-02-27.png";
		if (is_readable($path) && unlink($path)) {
		    echo "The file has been deleted";
		} else {
		    echo "The file was not found or not readable and could not be deleted";
		}*/
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$nombreMenu = $this->Cms_model->getMenu3($id);

		if (strcmp($nombre, $nombreMenu->nombre) === 0 OR trim(strtolower($nombre)) === trim(strtolower($nombreMenu->nombre))) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[cms_menu.nombre]";

		}
		
		$this->form_validation->set_rules("tipo_menu","Posición del menu","required");
		$this->form_validation->set_rules("nombre","Título de menu","required|min_length[6]|max_length[100]".$is_unique);
		$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de contenido","required");
		
		if($this->form_validation->run()){
			date_default_timezone_set('America/Bogota');
			$contenido = $this->input->post("menu_contenidos");
			$tipomenu = $this->input->post("tipo_menu");
			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$ubicacion = $this->input->post("ubicacion");
			$menuPrincipal = $this->input->post("orden_menu_principal");
			$menuSecundario = $this->input->post("orden_menu_secundaria");
			$menupadre = intval($this->input->post("menu_padre"));
			$posicion = intval($this->input->post("posicion"));

			$condicion = array();
			if($menupadre){//Cuando pertenece a un menu 
				$condicion['menupadre'] = $menupadre;
			}else{//Cuando se crea un menu padre
				$condicion['tipomenu'] = $tipomenu;
			}
			
			if($ubicacion==3){
				$ultimo = $this->Cms_model->getUltimoMenu($condicion);
				$orden = $ultimo + 1;
			}else{
				$aux = $this->Cms_model->getOrdenMenu($posicion);
				
				if($ubicacion==1){
					$condicion['id'] = '> '.$posicion;
					$orden = $aux->orden + 1;
				}else{
					$condicion['id'] = '>= '.$posicion;
					$orden = $aux->orden - 1;
				}
				$this->ordenarMenu($condicion, $orden);
			}

			$cms_tipo_publicacion_id = $this->input->post("cms_tipo_publicacion_id");
			$noPermitoSlug = array(4);
			if(!in_array($cms_tipo_publicacion_id, $noPermitoSlug)){
				if($cms_tipo_publicacion_id == 6){
					$slugArticulo = $this->input->post("slugArticulo");
				}else{
					$slugArticulo = $this->Cms_model->getSlugTipoPublicacion($cms_tipo_publicacion_id);
					$slugArticulo = $slugArticulo->slug;
				}
			}else{
				$slugArticulo = $slugArticulo = $this->input->post("slugArticulo2");
			}
			$fecha_modificacion = date('Y-m-d H:i:s');
			$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
			$info = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'menupadre' => $menupadre,
				'cms_tipo_publicacion_id' => $cms_tipo_publicacion_id,
				'tipomenu' => $tipomenu,
				'slugArticulo' => $slugArticulo,
				'orden'=>$orden,
				'fecha_modificacion' => $fecha_modificacion,
				'usuario_modificacion_id' => $this->usuario_id,
			);

		    if($this->Cms_model->updateMenu3($id, $info))
		    {
		    	$mensaje.="<li>La información general del menu se actualizó con éxito.</li>";
		    	$idMenu = $this->Cms_model->lastID();
		    	if(!empty($contenido) && $cms_tipo_publicacion_id == 4){
		    		$this->Cms_model->deleteMenuContenido($id);
		    		$infoContenido = array();
		    		$i = 0;
		    		foreach($contenido as $c){
		    			$infoContenido[$i]['cms_menu_id'] = $id;
		    			$infoContenido[$i]['cms_publicacion_id'] = $c;
		    			$infoContenido[$i]['orden'] = $i+1;
		    			$i++; 
		    		}
		    		$this->Cms_model->setMenuContenido($infoContenido);
		    		$mensaje.="<li>El contenido del menu ha sido actualizado.</li>";
		    	}
		    	$mensaje.="</ul>";
		    	$this->session->set_flashdata("error",$mensaje);
		    	redirect(base_url()."cms/menu");
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."cms/menu/seleccionar/".$id."/editar");
		    }

		}else{
			$this->seleccionar($id);
		}

	}

	public function estado($id){
		$info = $this->Cms_model->getMenu3($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Cms_model->updateMenu3($id, $data);
		redirect(base_url()."cms/menu");
	}
	

	public function eliminar($id){
		$this->Cms_model->deleteMenu($id);
		redirect(base_url()."cms/menu");

	}

	public function seleccionar($id, $acc = ""){

		//$data = array('id' => $id,);
		$jquery = array("jquery" => "menuAgrega.js");
		$data = array(
			'tipomenu' => $this->Cms_model->getTipoMenu2(),
			'menupadre' => $this->Cms_model->getMenuPadre(),
	    	'contenidos' => $this->Cms_model->getContenidos2(),
			'tiposPublicacion' => $this->Cms_model->getTipoPublicacionesC(),
			'menu' => $this->Cms_model->getMenu3($id),
			'menuContenido' => $this->Cms_model->getMenuContenidos($id),
			'menuContenido2' => $this->Cms_model->getMenuContenidos2($id),
			'menuPrincipal' => $this->Cms_model->getMenusPrincipal(),
			'menuSecundario' => $this->Cms_model->getMenusSecundario(),
		);

		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/menu/ver", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);

	}
	
	
}

