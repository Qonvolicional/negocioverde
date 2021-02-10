<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Permiso_model");
			$this->load->model("Modulo_model");
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
			'roles' => $this->Permiso_model->getRoles($this->rol_usuario),
			'modulos' => $this->Permiso_model->getModulosPadre(),
			'permisos' => $this->Permiso_model->getPermisos(),
		);

		$jquery = array('jquery' => 'administracion.js');
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/permiso/agrega", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function almacenar(){

		$rol_id = $this->input->post("rol_id");
		$modulo_rol = $this->input->post("modulo_rol");
		$this->Permiso_model->eliminarPermiso($rol_id);
		if ($this->Permiso_model->guardarPermiso($modulo_rol)) {
			echo "permiso";
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			echo "permiso";
		}

	}

	public function cargarModulo(){
		$rol_id = $this->input->post("rol_id");
		$modulos = $this->Permiso_model->getModulosPadre();
		$html = "<label class='col-sm-2 col-form-label'>Modulos:</label><div class='col-sm-10'>";
		foreach($modulos as $m){
			$aux = array(
				'rol_id'=>$rol_id,
				'modulo_id' => $m['id'],
			);
			$disabled = ($m['modulo_defecto']==1)?'disabled':'';
			$html .= "<div class='form-check'><label class='checkbox-inline d-flex'>";
			$html .="<input class='form-check-input modulo' type='checkbox' name='modulo_id".$m["id"]."' id='modulo_id".$m["id"]."' ".$disabled." value='".$m["id"]."'";
			if(!empty($m['hijos'])){
				$html.= ($this->Permiso_model->verificarModuloRol($aux) == 1 || $m['modulo_defecto'])?"checked>".$m['nombre']." <a class='btn btn-danger btn-sm ml-auto btn-collapse' data-toggle='collapse' href='#hijos".$m['id']."'><i class='fas fa-bars'></i></a> </label>":">".$m['nombre']." <a class='btn btn-danger btn-sm ml-auto btn-collapse' data-toggle='collapse' href='#hijos".$m['id']."'><i class='fas fa-minus'></i></a> </label>";
				$html.="<div class='ml-3 item-hijos' id='hijos".$m['id']."'>";
				foreach ($m['hijos'] as $h) 
				{
					$aux['modulo_id'] = $h['id'];
					$html .= "<div class='form-check'><label class='checkbox-inline'>";
					$html .="<input class='form-check-input modulo' type='checkbox' name='modulo_id".$h["id"]."' id='modulo_id".$h["id"]."' value='".$h["id"]."'";
					$html.= ($this->Permiso_model->verificarModuloRol($aux) == 1)?"checked>".$h['nombre']."</label></div>":">".$h['nombre']."</label></div>";           
				}
				$html.="</div>"; 
			}else{
				$html.= ($this->Permiso_model->verificarModuloRol($aux) == 1 || $m['modulo_defecto'])?"checked>".$m['nombre']."</i> </label>":">".$m['nombre']."</label>";
			}
			$html.="</div>";         
		}
		$html.="</div>";
		echo $html; 
	}

	
}