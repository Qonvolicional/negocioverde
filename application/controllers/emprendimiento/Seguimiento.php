
<?php  
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* Controlador del seguimientos realizados a los empredimientdos
	*/
	class Seguimiento extends CI_Controller
	{
		public function __construct(){

		   parent::__construct();
    		if($this->session->has_userdata("login")){
    			$this->load->model("NegocioVerde_model");
			    $this->load->model("Seguimiento_model");
    			$this->load->model("Usuarios_model");
    			$this->load->model("PlanMejora_model");
    			$this->load->model("Modulo_model");
    			$this->rol_usuario = $this->session->userdata("rol");
    			$this->verificador_id = $this->session->userdata("usuario");
    			$admin = $this->session->userdata("admin");
    			$this->moduloControlador = array(
    				'modulos' => ($admin)?$this->Modulo_model->getModulos():$this->Modulo_model->getModulosRol($this->rol_usuario),
    				'admin' => $admin,
    			);


    		}else{
    			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
    			redirect(base_url()."auth");
    		}
		}
		
		public function index($empresa_id)
		{
		
			$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
						  'seguimientos' => $this->Seguimiento_model->getSeguimiento($empresa_id));
			$this->load->view("layouts/dashboard/header");
			$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
			$this->load->view("dashboard/seguimiento/lista", $data);
			$this->load->view("layouts/dashboard/footer");
		}

		public function agregar($empresa_id)
		{
			$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
						'indicadores_mejora' =>$this->Seguimiento_model->getPlanMejoraEmpresa($empresa_id),
						'jquery' => 'seguimiento.js'
						 );
			$this->load->view("layouts/dashboard/header");
			$this->load->view("layouts/dashboard/sidebar",$this->moduloControlador);
			$this->load->view("dashboard/seguimiento/agregar", $data);
			$this->load->view("layouts/dashboard/footer");
		}

		public function guardar()
		{

			$seguimiento = array(
				'empresa_id' => $this->input->post("empresa_id"),
				'fecha' => $this->input->post('fecha'), 
				'lugar' => $this->input->post('lugar'),
				'h_inicio' =>$this->input->post('h_inicio'),
				'h_fin' => $this->input->post('h_fin'),
				'temas' => $this->input->post('temas'),
				'desarrollo' =>  $this->input->post('desarrollo'),
				'acuerdos' => $this->input->post('acuerdos') ,
				'compromiso' => $this->input->post('compromisos')
			);
			if($this->Seguimiento_model->guardar($seguimiento)){
				$seguimiento_id = $this->Seguimiento_model->lastID();
				$this->Seguimiento_model->gurdarSeguimientoPlanMejora($seguimiento_id, $this->input->post("indicadores"));
				if(count($_FILES) > 0){
		        	$soporte_real = $_FILES['soporte']['name'];
					
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = 'doc|word|pdf';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= 'seguimiento_id_'.$seguimiento_id;
			        $config['max_size']             = 10000;
			        $config['max_width']            = 3000;
			        $config['max_height']           = 3000;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('soporte')){
			        	$data = array('upload_data' => $this->upload->data());

			        	$soporte['ruta'] = "/assets/archivo/".$data['upload_data']['file_name'];
			        	$soporte['nombre_archivo'] = $soporte_real;

			        	if($this->Seguimiento_model->guardarSoporte($soporte)){
			        		$soporte_id = $this->Seguimiento_model->lastID();

			        		$actualizarSeguimiento = array('soporte_id' => $soporte_id,
			        										'seguimiento_id' =>  $seguimiento_id);

			        		$actualizados = $this->Seguimiento_model->actualizarSeguimientoSoporte($actualizarSeguimiento);
			        		if($actualizados > 0){
			        			$this->session->set_flashdata('alert_message', 'alert alert-success');
			        			$this->session->set_flashdata('message', 'El seguimiento se ha guardado con éxito');
			        		}else{
			        				$this->session->set_flashdata('alert_message', 'alert alert-warning');
			        			$this->session->set_flashdata('message', 'No se pudo guardar el seguimiento, intentar nuevamente');
			        		}
			        	}
			        }

			
			     }else{
			     		$this->session->set_flashdata('alert_message', 'alert alert-success');
			        			$this->session->set_flashdata('message', 'El seguimiento se ha guardado con éxito');
			     }
			 }else{
			 	$this->session->set_flashdata('alert_message', 'alert aalert-warning');
			 	$this->session->set_flashdata('message', 'No se pudo guardar el seguimiento, intentar nuevamente');
			 }

			 redirect(base_url().'seguimiento/'.$seguimiento['empresa_id']."/agregar");

		}

		public function ver($empresa_id, $seguimiento_id)
		{
			$data = array('empresa' => $this->NegocioVerde_model->getEmpresa($empresa_id),
						 'seguimiento' => $this->Seguimiento_model->getSeguimientoId($seguimiento_id),
						 'indicadores_mejora' =>$this->Seguimiento_model->getPlanMejoraEmpresaSeguimiento($empresa_id, $seguimiento_id),
						 'indicadores_mejora_general' => $this->Seguimiento_model->getPlanMejoraEmpresa($empresa_id),
						 'jquery' => 'seguimiento.js'
						 );
			$this->load->view("layouts/dashboard/header");
			$this->load->view("layouts/dashboard/sidebar",$this->moduloControlador);
			$this->load->view("dashboard/seguimiento/actualizar", $data);
			$this->load->view("layouts/dashboard/footer");
		}

		public function actualizar()
		{
			$seguimiento = array(
				'seguimiento_id' => $this->input->post("seguimiento_id"),
				'empresa_id' => $this->input->post("empresa_id"),
				'fecha' => $this->input->post('fecha'), 
				'lugar' => $this->input->post('lugar'),
				'h_inicio' =>$this->input->post('h_inicio'),
				'h_fin' => $this->input->post('h_fin'),
				'temas' => $this->input->post('temas'),
				'desarrollo' =>  $this->input->post('desarrollo'),
				'acuerdos' => $this->input->post('acuerdos') ,
				'compromiso' => $this->input->post('compromisos')
			);
			
			if($this->Seguimiento_model->actualizar($seguimiento) > 0){
				 $this->Seguimiento_model->gurdarSeguimientoPlanMejora($seguimiento['seguimiento_id'], $this->input->post("indicadores"));
				
				if(!empty($_FILES['soporte']['name']) > 0){
		        	$soporte_real = $_FILES['soporte']['name'];

					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = 'doc|word|pdf';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= 'seguimiento_id_'.$seguimiento["seguimiento_id"];
			        $config['max_size']             = 10000;
			        $config['max_width']            = 3000;
			        $config['max_height']           = 3000;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('soporte')){
			        	$data = array('upload_data' => $this->upload->data());

			        	$soporte['ruta'] = "/assets/archivo/".$data['upload_data']['file_name'];
			        	$soporte['nombre_archivo'] = $soporte_real;

			        	$actual_seguimiento = $this->Seguimiento_model->getSeguimientoId($seguimiento["seguimiento_id"]);

			        	if(is_null($actual_seguimiento->soporte)){
			        		echo "sin documento";
			        		//guardar en caso de no tener soporte
			        		if($this->Seguimiento_model->guardarSoporte($soporte)){
				        		$soporte_id = $this->Seguimiento_model->lastID();

				        		$actualizarSeguimiento = array('soporte_id' => $soporte_id,
				        										'seguimiento_id' =>  $seguimiento["seguimiento_id"]);

				        		$actualizados = $this->Seguimiento_model->actualizarSeguimientoSoporte($actualizarSeguimiento);
				        		if($actualizados > 0){
				        			$this->session->set_flashdata('alert_message', 'alert alert-success');
				        			$this->session->set_flashdata('message', 'El seguimiento se ha actualizar con éxito');
				        		}else{
				        				$this->session->set_flashdata('alert_message', 'alert alert-warning');
				        			$this->session->set_flashdata('message', 'No se pudo actualizar el seguimiento, intentar nuevamente');
				        		}
			        		}
			        	}else{
			        		$soporte['soporte_id'] = $actual_seguimiento->soporte;
			        		$actualizados = $this->Seguimiento_model->actualizarSoporte($soporte);
				        	if($actualizados > 0){
				        		$this->session->set_flashdata('alert_message', 'alert alert-success');
				        		$this->session->set_flashdata('message', 'El seguimiento se ha actualizado con éxito');
				        	}else{
				       			$this->session->set_flashdata('alert_message', 'alert alert-warning');
				        		$this->session->set_flashdata('message', 'No se pudo actualizar el seguimiento, intentar nuevamente');
				        	}
			        	}
			        	
			        }

			
			     }else{
			     		$this->session->set_flashdata('alert_message', 'alert alert-success');
			        			$this->session->set_flashdata('message', 'El seguimiento se ha actualizado con éxito');
			     }
			 }else{
			 	$this->session->set_flashdata('alert_message', 'alert aalert-warning');
			 	$this->session->set_flashdata('message', 'No se pudo actualziar el seguimiento, intentar nuevamente');
			 }

			 redirect(base_url().'seguimiento/'.$seguimiento['empresa_id']."/ver/".$seguimiento["seguimiento_id"]);
		}
	}
?>
