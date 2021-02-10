<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."dashboard");
		}else{
			$this->load->view('dashboard/login');
		}
	}

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$resultado = $this->Usuarios_model->loginEncriptado($username, $password);
		if(!$resultado)
		{
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			$this->index();
		}else{
			if(boolval($resultado->estado)){
				$admin = ($resultado->rol_id==9 || $resultado->rol_id==5)?True:False;
				$imagen = $this->Usuarios_model->getImagenUrl($resultado->archivo_id);
				//echo $imagen;
				$imagenPerfil = (!$imagen || !file_exists($imagen->url))? base_url()."assets/template/img/avatar2.png":base_url().$imagen->url;
				$data = array(
					'usuario' => $resultado->id,
					'persona'=> $resultado->persona_id,
					'super'=> $resultado->super,
					'rol' => $resultado->rol_id,
					'rol_nombre'=> $resultado->rol_nombre,
					'fecha_registro'=> $resultado->fecha_registro,
					//'fecha_retiro'=> $resultado->fecha_retiro, 
					'nombre' => $resultado->nombre,
					'admin' => $admin,
					'imagenUrl' => $imagenPerfil,
					'login' => TRUE 
				);
				$this->session->set_userdata($data);
				redirect(base_url()."dashboard");
			}else{
				$this->session->set_flashdata("error","El usuario esta inactivo, por favor comuniquese con el administrador.");
				$this->index();
			}
			
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}