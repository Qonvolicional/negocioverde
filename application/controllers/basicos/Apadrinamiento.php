<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Apadrinamiento extends CI_Controller {





	public function __construct(){

		parent::__construct();

		if($this->session->userdata("login")){

			$this->load->model("Usuarios_model");

			$this->load->model("Cargo_model");

			$this->load->model("Area_model");

			$this->load->model("Entidad_model");

			$this->load->model("Modulo_model");

			$this->load->model("Apadrinamiento_model");

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

			'historia' => $this->Apadrinamiento_model->getHistorias(),

		);



		$modulo = array(

			'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),

			'admin' => $this->session->userdata("admin"),

		);

		$this->load->view("layouts/dashboard/header.php");

		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);

		$this->load->view("dashboard/apadrinamiento/historia/lista", $data);

		$this->load->view("layouts/dashboard/footer.php");

	}



	public function guardarHistoria($referente_id){

		if($this->Apadrinamiento_model->guardarHistoria($referente_id)){

			redirect(base_url()."apadrinamiento/historia");

		}

	}



	public function solicitudes()

	{

		

		$data = array(

			'solicitudes' => $this->Apadrinamiento_model->getSolicitudes($this->rol_usuario),

		);



		$modulo = array(

			'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),

			'admin' => $this->session->userdata("admin"),

		);

		$this->load->view("layouts/dashboard/header.php");

		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);

		$this->load->view("dashboard/apadrinamiento/solicitud/lista", $data);

		$this->load->view("layouts/dashboard/footer.php");

	}



	

	public function nuevaHistoria(){

			$data = array(

						'referentes' => $this->Apadrinamiento_model->getReferentes($this->rol_usuario),

					);



					$modulo = array(

						'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),

						'admin' => $this->session->userdata("admin"),

					);

					$this->load->view("layouts/dashboard/header.php");

					$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);

					$this->load->view("dashboard/apadrinamiento/historia/agregar", $data);

					$this->load->view("layouts/dashboard/footer.php", array('jquery' => 'apadrinamiento.js'));

	}



	public function verHistoria($historia_id){

		

	}



}