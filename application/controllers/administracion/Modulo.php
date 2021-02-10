<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Modulo_model");
			$this->load->model("NegocioVerde_model");
			$this->load->model("Cms_model");
			$this->rol_usuario = $this->session->userdata("rol");
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

	public function index()
	{
		$data = array(
			'modulos' => $this->Modulo_model->getModulos(),
		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/modulo/lista", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function agregar(){
		$data = array(
			'modulospadre' => $this->Modulo_model->getModulosPadre(),
		);
		$jquery = array("jquery"=>"modulo.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/modulo/agrega", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
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

	private function ordenarModulo($condicion,$orden){
		$datos = $this->Modulo_model->getSiguientesModulo($condicion);
		foreach ($datos as $d) {
			$orden++;
			//var_dump($d);
			//echo $d->id."<br>";
			$aux = array(
				'orden'=>$orden,
			);
			//var_dump($aux);
			$this->Modulo_model->updateModulo($d->id, $aux);
		}
	}


	public function almacenar(){

		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$controlador = $this->input->post("controlador");
		$ubicacion = $this->input->post("ubicacion");
		$posicion = $this->input->post("posicion");
		$icon = $this->input->post("icon");
		$fecha_registro = date("Y-m-d H:i:s");
		$modulo_defecto = ($this->input->post("modulo_defecto"))?1:0;
		$modulo_padre = $this->input->post("modulo_padre");
		$exclusivo_administracion = ($this->input->post("exclusivo_administracion"))?1:0;

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[modulo.nombre]");
		$this->form_validation->set_rules("controlador", "Controlador","required");


		if ($this->form_validation->run()==TRUE) {

			$condicion = array('modulo_padre' => $modulo_padre);
			
			if($ubicacion==3){
				$ultimo = $this->Modulo_model->getUltimoModulo($condicion);
				//var_dump($ultimo);
				$orden = $ultimo + 1;
			}else{
				$aux = $this->Modulo_model->getOrdenModulo($posicion);
				//echo "orden de la posicion ".$aux->orden."<br>";
				if($ubicacion==1){
					$condicion['id<>'] = $posicion;
					$condicion['orden>='] = $aux->orden;
					$orden = $aux->orden + 1;
				}else{
					
					$orden = $aux->orden;
					$condicion['orden>='] = $orden;
				}
				
				//var_dump($condicion);
				$this->ordenarModulo($condicion, $orden);
			}


			$data  = array(
				'nombre' => $nombre, 
				'descripcion'=> $descripcion,
				'controlador'=> $controlador,
				'icon'=> $icon,
				'orden'=> $orden,
				'fecha_registro'=>$fecha_registro,
				'modulo_defecto'=>$modulo_defecto,
				'modulo_padre'=>$modulo_padre,
				'exclusivo_administracion'=>$exclusivo_administracion,
			);

			if ($this->Modulo_model->guardarModulo($data)) {
				redirect(base_url()."modulo");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."modulo/agregar");
			}
		}
		else{
			$this->agregar();
		}
	}

	public function editar($id){
		$data  = array(
			'modulo' => $this->Modulo_model->getModulo($id), 
			'modulospadre' => $this->Modulo_model->getModulosPadre(),
		);

		$jquery = array("jquery"=>"modulo.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/modulo/edita", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function actualizar(){
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$ubicacion = $this->input->post("ubicacion");
		$posicion = $this->input->post("posicion");
		$controlador = $this->input->post("controlador");
		$icon = $this->input->post("icon");
		$modulo_defecto = ($this->input->post("modulo_defecto"))?1:0;
		$modulo_padre = $this->input->post("modulo_padre");
		$exclusivo_administracion = ($this->input->post("exclusivo_administracion"))?1:0;
		$moduloactual = $this->Modulo_model->getModulo($id);

		if ($nombre == $moduloactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[modulo.nombre]";
		}

		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		$this->form_validation->set_rules("controlador", "Controlador","required");

		if($this->form_validation->run()==TRUE) {
			$condicion = array('modulo_padre' => $modulo_padre);

			if($ubicacion==3){
				$ultimo = $this->Modulo_model->getUltimoModulo($condicion);
				//var_dump($ultimo);
				$orden = $ultimo + 1;
			}else{
				$aux = $this->Modulo_model->getOrdenModulo($posicion);
				//echo "orden de la posicion ".$aux->orden."<br>";
				if($ubicacion==1){
					$condicion['id<>'] = $posicion;
					$condicion['orden>='] = $aux->orden;
					$orden = $aux->orden + 1;
				}else{
					
					$orden = $aux->orden;
					$condicion['orden>='] = $orden;
				}
				
				//var_dump($condicion);
				$this->ordenarModulo($condicion, $orden);
			}

			$data = array(
				'nombre' => $nombre,
				'descripcion'=> $descripcion,
				'controlador'=> $controlador,
				'icon'=> $icon,
				'orden'=> $orden,
				'modulo_defecto'=>$modulo_defecto,
				'modulo_padre'=>$modulo_padre,
				'exclusivo_administracion'=>$exclusivo_administracion,
			);

			if ($this->Modulo_model->actualizarModulo($id,$data)) {
				redirect(base_url()."modulo");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."modulo/editar/".$id);
			}
		}else{
			$this->editar($id);
		}
	}

	public function estado($modulo_id){
		$info = $this->Modulo_model->getEstado($modulo_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Modulo_model->actualizarModulo($modulo_id, $data);
		redirect(base_url()."modulo");
	}

	public function eliminar($id){
		$this->Modulo_model->deleteModulo($id);
		redirect(base_url()."modulo");
	}


	
}