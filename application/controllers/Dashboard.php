<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->load->model("Dashboard_model");
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

	public function index(){
		$modulo = array(
			'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),
			'admin' => $this->session->userdata("admin"),
		);
		$numBienes = $this->Dashboard_model->getBienesRegistrados()['bienes_registrados'];
		$emprendimientos = $this->Dashboard_model->getNumEmprendimientos()['emprendimientos'];
		$evaluados = $this->Dashboard_model->getNumEvaluados()['evaluados'];
		$no_evaluados = $this->Dashboard_model->getNumNoEvaluados()['no_evaluados'];

		$porc_evaluados = number_format(($evaluados / $emprendimientos * 100),2);
		$porc_noevaluados = number_format(($no_evaluados / $emprendimientos * 100),2);

		$data = array(
			'numBienes'=>$numBienes,
			'total'=>$emprendimientos,
			'porc_evaluados'=>$porc_evaluados,
			'porc_noevaluados'=>$porc_noevaluados,
		);
		
		/*$micarpeta = './application/controllers/controladores_prueba/';
		if(!file_exists($micarpeta)){
			mkdir($micarpeta, 0777, true);
			echo "Se creo el folder";
		}else{
			echo "Ya existe el folder";
			$archivo = ucfirst("modulo");
			$fn = fopen($micarpeta.$archivo.".php", 'w') or die ("Se produjo un error al intentar abrir el archivo.");
			$texto = <<<_ARCH
			<?php
				defined('BASEPATH') OR exit('No direct script access allowed');

				class Auth extends CI_Controller {

					public function __construct(){
						parent::__construct();
						this->load->model("Usuarios_model");
					}

					public function index()
					{
						if(this->session->userdata("login")){
							redirect(base_url()."dashboard");
						}else{
							this->load->view('dashboard/login');
						}
					}

					public function login(){
						$username = this->input->post("username");
						$password = this->input->post("password");
						$resultado = this->Usuarios_model->loginEncriptado($username, $password);
						if(!$resultado)
						{
							this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
							this->index();
						}else{
							if($resultado->estado){
								$admin = ($resultado->rol_id==9 || $resultado->rol_id==5)?True:False;
								$imagen = this->Usuarios_model->getImagenUrl($resultado->archivo_id);  
								$imagenPerfil = (!imagen)? base_url()."assets/template/img/avatar2.png":base_url().imagen->url;
								data = array(
									'usuario' => resultado->id,
									'persona'=> resultado->persona_id,
									'rol' => resultado->rol_id,
									'rol_nombre'=> resultado->rol_nombre,
									'fecha_registro'=> resultado->fecha_registro,
									'fecha_retiro'=> resultado->fecha_retiro, 
									'nombre' => resultado->nombre,
									'admin' => admin,
									'imagenUrl' => imagenPerfil,
									'login' => TRUE 
								);
								this->session->set_userdata(data);
								redirect(base_url()."dashboard");
							}else{
								this->session->set_flashdata("error","El usuario esta inactivo, por favor comuniquese con el administrador.");
								this->index();
							}
							
						}
					}

					public function logout(){
						this->session->sess_destroy();
						redirect(base_url());
					}
				}
			_ARCH;
			fwrite($fn, $texto);
			fclose($fn);
			echo "Se ha escrito sin problemas";

		}*/

		$jquery = array('jquery' => 'prueba.js');
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("layouts/dashboard/prueba");
		//$this->load->view("dashboard/dashboard", $data);
		$this->load->view("layouts/dashboard/footer.php");



	}

	public function perfil(){
		$usuario_id = $this->session->userdata("usuario");
		$data = array(
		 'usuario' => $this->Usuarios_model->getUsuario($usuario_id), 
		);
		$jquery = array('jquery' => 'perfil.js');
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/perfil", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}
}

