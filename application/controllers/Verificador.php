<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verificador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Verificador_model");
			$this->load->model("Cargo_model");
			$this->load->model("Area_model");
			$this->load->model("Entidad_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
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

	public function index()
	{
		$data = array(
			'verificaciones'=>$this->Verificador_model->getVerificaciones(),
			'verificadores'=>$this->Verificador_model->getVerificadores(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/verificador/lista", $data);
		$this->load->view("layouts/dashboard/footer");
	}

	public function agregar()
	{
		$data = array(
			'cargos'=>$this->Verificador_model->getCargos(),
			'areas'=>$this->Area_model->getAreasActivas(),
			'empresas' =>$this->Verificador_model->getEmpresas(),
			'entidades'=>$this->Entidad_model->getEntidadesActivas(),
			'cargos'=>$this->Cargo_model->getCargosActivos(),
			'verificadores' => $this->Verificador_model->getVerificadoresActivos(),
		);
		$jquery = array("jquery"=>"perfilUsuario.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/verificador/agrega", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function editar($id)
	{
		$data = array(
			'cargos'=>$this->Verificador_model->getCargos(),
			'areas'=>$this->Area_model->getAreasActivas(),
			'empresas' =>$this->Verificador_model->getEmpresas(),
			'entidades'=>$this->Entidad_model->getEntidadesActivas(),
			'cargos'=>$this->Cargo_model->getCargosActivos(),
			'verificadores' => $this->Verificador_model->getVerificadoresActivos(),
			'verificador' => $this->Verificador_model->getVerificador($id),
		);
		$jquery = array("jquery"=>"perfilUsuario.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/verificador/editar", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function editarAsignacion($id)
	{
		$data = array(
			'empresas' =>$this->Verificador_model->getEmpresas(),
			'verificadores' => $this->Verificador_model->getVerificadoresActivos(),
			'asignacion' => $this->Verificador_model->getAsignacion($id),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/verificador/editarAsignacion", $data);
		$this->load->view("layouts/dashboard/footer");
	}


	public function encriptar($clave){
		/**
		 * Observe que la sal se genera aleatoriamente aquí.
		 * No use nunca una sal estática o una que no se genere aleatoriamente.
		 *
		 * Para la GRAN mayoría de los casos de uso, dejar que password_hash genere la sal aleatoriamente
		 */
		$opciones = [
		    'cost' => 12,
		    //'salt' => random_bytes(30),
		];
		$resultado = password_hash($clave, PASSWORD_BCRYPT, $opciones);
		return $resultado;
	}

	public function verificar($clave, $hash){
		return password_verify($clave, $hash);
	}


	public function almacenar()
	{
		$identificacion = $this->input->post("identificacion");
		$rol_id = $this->input->post("rol_id");
		$nombre1 = $this->input->post("nombre1");
		$nombre2 = $this->input->post("nombre2");
		$apellido1 = $this->input->post("apellido1");
		$apellido2 = $this->input->post("apellido2");
		$correo = $this->input->post("correo");
		$celular = $this->input->post("celular");
		$fijo = $this->input->post("fijo");
		$direccion = $this->input->post("direccion");
		$entidad_id = $this->input->post("entidad_id");
		$cargo_id = $this->input->post("cargo_id");
		$area_id = $this->input->post("area_id");
		$fecha_retiro = $this->input->post("fecha_retiro");

		$persona = array(
			'identificacion' => $identificacion,
			'nombre1' => $nombre1,
			'nombre2' => $nombre2,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'correo' => $correo,
			'celular' => $celular,
			'fijo' => $fijo,
			'direccion' => $direccion,
		);

		$img = array('nombre'=> $nombre1." ".$apellido1,);


		if($this->Usuarios_model->agregarPersona($persona)){

			$persona_id = $this->Usuarios_model->lastID();
			$archivo_id = 0;
			if(($_FILES['imagen']['size'])){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= 'verificador_id_'.$persona_id;
		        $config['max_size']             = 3000;
		        $config['max_width']            = 3000;
		        $config['max_height']           = 3000;
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $this->session->set_flashdata("errorPerfil","No se cargo correctamente la imagen de perfil");
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if($this->Usuarios_model->guardarImagen($img)){
		        		$archivo_id = $this->Usuarios_model->lastID();
		        	}else{
		        		$this->session->set_flashdata("errorPerfil","No se pudo guardar la informacion de la imagen");
		        	}      
		        }
	        }
	        //Datos del usuario asociado a la persona creada
	        $usuario = array(
				'persona_id' => $persona_id,
				'contrasena' => $this->encriptar($identificacion),
				'rol_id' => $rol_id,
				'entidad_id' => $entidad_id,
				'area_id' => $area_id,
				'cargo_id' => $cargo_id,
				'fecha_retiro' => $fecha_retiro,
				'estado' => 1,
				'archivo_id' => $archivo_id,
			);
			if($this->Usuarios_model->guardarUsuario($usuario)){
				redirect(base_url()."verificador");
			}else{
				$this->session->set_flashdata("errorPerfil","No se pudo guardar la información correspondiente al usuario");
				redirect(base_url()."verificador/agregar");
			}

		}else{
			$this->session->set_flashdata("errorPerfil","No se pudo guardar la información");
			redirect(base_url()."verificador/agregar");
		}
	}

	public function asignar()
	{
		$data = array(
			'empresas' =>$this->Verificador_model->getEmpresas(),
			'verificadores' => $this->Verificador_model->getVerificadoresActivos(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/verificador/asignar", $data);
		$this->load->view("layouts/dashboard/footer");
	}
    
    private function envioCorreo($asunto, $destinatario, $mensaje){
	    $config = array(
         'protocol' => 'smtp',
         'smtp_host' => 'mail.ventanilladenegociosverdes.com',
         'smtp_user' => '_mainaccount@ventanilladenegociosverdes.com', //Su Correo
         'smtp_pass' => 'X93@Kyp[0Ap7Ps', // Su Password
         'smtp_port' => '465',
         'smtp_crypto' => 'ssl',
         'mailtype' => 'text',
         'wordwrap' => TRUE,
         'charset' => 'utf-8'
         );
    	$this->load->library('email');
    	$this->load->library('email', $config);
    	 
    	$this->email->from('_mainaccount@ventanilladenegociosverdes.com');
    	$this->email->subject($asunto);
    	$this->email->message($mensaje);
    	$this->email->to($destinatario);
        if($this->email->send(FALSE)){
            return true;
            /*echo "enviado<br/>";
            echo $this->email->print_debugger(array('headers'));*/
        }else {
            return false;
            /*echo "fallo <br/>";
            echo "error: ".$this->email->print_debugger(array('headers'));*/
        }
	}
    
	public function asignacion()
	{
		$empresa_id = $this->input->post("empresa_id");
		$persona_id = $this->input->post("persona_id");
		//$fecha_asignacion = $this->input->post("fecha_asignacion");
        $verificador = $this->Verificador_model->getVerificador($persona_id);
		$data = array('empresa_id'=>$empresa_id, 'persona_id'=>$persona_id);
		

		if($this->Verificador_model->guardarAsignacion($data)){
		    if(!empty($verificador)){
		        if(trim($verificador->correo)){
		            $mensajeCorreo = "Hola ".$verificador->nombre1."!
        Se te ha asignado un nuevo emprendimiento para su respectivo acompañamiento, por favor ingresa a tu perfil y podrás conocer cuál es, dónde se encuentra ubicado y la información de contacto para que te presentes a él cuando hayas organizado tu agenda.
        Somos Ventanilla de Emprendimientos Verdes del Chocó.";
		            $this->envioCorreo('Notificación de asignación de emprendimiento verde',trim($verificador->correo),$mensajeCorreo);
		        }
		    }
			redirect(base_url()."verificador");
		}else{
			$this->session->set_flashdata("errorAsignación","No se pudo guardar la información");
			redirect(base_url()."verificador/asignar");
		}
	}

	public function actualizarAsignacion()
	{
		$asignacion_id = $this->input->post("asignacion_id");
		$empresa_id = $this->input->post("empresa_id");
		$persona_id = $this->input->post("persona_id");
		/*$fecha_asignacion = $this->input->post("fecha_asignacion");
		$fecha_retiro = $this->input->post("fecha_retiro");*/

		$data = array(
			'empresa_id'=>$empresa_id, 
			'persona_id'=>$persona_id, 
			//'fecha_asignacion'=>$fecha_asignacion, 
			//'fecha_retiro'=>$fecha_retiro
		);

		if($this->Verificador_model->actualizarAsignacion($asignacion_id, $data)){
			redirect(base_url()."verificador");
		}else{
			$this->session->set_flashdata("errorAsignación","No se pudo actualizar la información");
			redirect(base_url()."verificador/asignar");
		}
	}

	public function actualizar(){
		$persona_id = $this->input->post("persona_id");
		$usuario_id = $this->input->post("usuario_id");
		$identificacion = $this->input->post("identificacion");
		$rol_id = $this->input->post("rol_id");
		$nombre1 = $this->input->post("nombre1");
		$nombre2 = $this->input->post("nombre2");
		$apellido1 = $this->input->post("apellido1");
		$apellido2 = $this->input->post("apellido2");
		$correo = $this->input->post("correo");
		$celular = $this->input->post("celular");
		$fijo = $this->input->post("fijo");
		$direccion = $this->input->post("direccion");
		$entidad_id = $this->input->post("entidad_id");
		$cargo_id = $this->input->post("cargo_id");
		$area_id = $this->input->post("area_id");
		$fecha_retiro = $this->input->post("fecha_retiro");

		$persona = array(
			'identificacion' => $identificacion,
			'nombre1' => $nombre1,
			'nombre2' => $nombre2,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'celular' => $celular,
			'fijo' => $fijo,
			'correo' => $correo,
			'direccion' => $direccion,
		);

		$usuario = array(
			'entidad_id'=>$entidad_id,
			'area_id'=>$area_id,
			'cargo_id'=>$cargo_id,
			'fecha_retiro'=>$fecha_retiro,
		);

		if($this->Verificador_model->actualizarPersona($persona_id, $persona)){
			if($_FILES['archivo']['size']){
				$img = array('nombre'=> $nombre1." ".$apellido1,);
				$archivo_id = "";
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= 'persona_id_'.$persona_id;
		        $config['max_size']             = 3000;
		        $config['max_width']            = 3000;
		        $config['max_height']           = 3000;
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $this->session->set_flashdata("error","No se cargo correctamente la imagen de perfil");
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if($this->Verificador_model->guardarImagen($img)){
		        		$archivo_id = $this->Verificador_model->lastID();
		        	}else{
		        		$this->session->set_flashdata("error","No se pudo guardar la informacion de la imagen");
		        	}      
		        }
		        $usuario['archivo_id'] = $archivo_id;
			}
			$this->Verificador_model->actualizarUsuario($usuario_id, $usuario);
			redirect(base_url()."verificador");
		}else{
			$this->session->set_flashdata("errorVerificador","No se pudo actualizar la información");
			redirect(base_url()."verificador/editar");
		}

	}

	public function reestablecer(){
		$usuario_id = $this->input->post("usuario_id_r");
		$identificacion = $this->input->post("identificacion_v");

		$usuario = array('contrasena'=>$this->encriptar($identificacion));

		$this->Verificador_model->actualizarUsuario($usuario_id, $usuario);
		redirect(base_url()."verificador");
	}

	public function estadoAsignacion($asignacion_id){

		$info = $this->Verificador_model->getEstadoAsignacion($asignacion_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Verificador_model->actualizarAsignacion($asignacion_id, $data);
		redirect(base_url()."verificador");
	}

	public function estadoVerificador($verificador_id){
		$info = $this->Usuarios_model->getEstado($verificador_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Usuarios_model->actualizarUsuario($verificador_id, $data);
		redirect(base_url()."verificador");
	}


}