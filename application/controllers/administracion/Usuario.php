<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Usuarios_model");
			$this->load->model("Cargo_model");
			$this->load->model("Area_model");
			$this->load->model("Entidad_model");
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
			'usuarios' => $this->Usuarios_model->getUsuarios($this->rol_usuario),
		);

		$modulo = array(
			'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),
			'admin' => $this->session->userdata("admin"),
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/usuario/lista", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	public function agregar(){
		$data = array(
			'roles' => $this->Usuarios_model->getRolesActivos($this->rol_usuario),
			'cargos'=>$this->Cargo_model->getCargosActivos(),
			'areas'=>$this->Area_model->getAreasActivas(),
			'entidades'=>$this->Entidad_model->getEntidadesActivas(),
		);

		$jquery = array("jquery"=>"perfilUsuario.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/usuario/agrega", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
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

	public function almacenar(){
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
		$area_id = $this->input->post("area_id");
		$cargo_id = $this->input->post("cargo_id");
		$fecha_retiro = $this->input->post("fecha_retiro");


		$persona = array(
			'identificacion' => $identificacion,
			'nombre1' => $nombre1,
			'nombre2' => $nombre2,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'correo' => $correo,
			'direccion' => $direccion,
		);

		$img = array('nombre'=> $nombre1." ".$apellido1,);


		if($this->Usuarios_model->agregarPersona($persona)){

			$persona_id = $this->Usuarios_model->lastID();
			$archivo_id = "";
			
			//Subiendo el imagen
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
	                if($this->Usuarios_model->guardarImagen($img)){
		        		$archivo_id = $this->Usuarios_model->lastID();
		        	}else{
		        		$this->session->set_flashdata("error","No se pudo guardar la informacion de la imagen");
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
				redirect(base_url()."usuario");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información correspondiente al usuario");
				redirect(base_url()."usuario");
			}
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."usuario/almacenar");
		}
		
	}
	
	public function editar($usuario_id){
		$data = array(
			'usuario'=>$this->Usuarios_model->getUsuario($usuario_id),
			'roles' => $this->Usuarios_model->getRoles($this->rol_usuario),
			'cargos'=>$this->Usuarios_model->getCargos(),
			'areas'=>$this->Usuarios_model->getAreas(),
			'entidades'=>$this->Usuarios_model->getEntidades(),
		);
		$jquery = array("jquery"=>"perfilUsuario.js");
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/usuario/edita", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function actualizarPerfil(){
		$usuario_id = $this->session->userdata("usuario");
		$persona_id = $this->input->post("persona_id");
		$archivo_id = $this->input->post("archivo_id");
		//$identificacion = $this->input->post("identificacion");
		$nombre1 = $this->input->post("nombre1");
		$nombre2 = $this->input->post("nombre2");
		$apellido1 = $this->input->post("apellido1");
		$apellido2 = $this->input->post("apellido2");
		$correo = $this->input->post("correo");
		$celular = $this->input->post("celular");
		$fijo = $this->input->post("fijo");
		$direccion = $this->input->post("direccion");
		

		$img = array();
		$persona = array(
			//'identificacion' => $identificacion,
			'nombre1' => $nombre1,
			'nombre2' => $nombre2,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'correo' => $correo,
			'celular'=> $celular,
			'fijo'=> $fijo,
			'direccion' => $direccion,
		);

		if($this->Usuarios_model->actualizarPersona($persona_id, $persona)){
			if(($_FILES['imagen']['size'])){
				//Subiendo el imagen
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
	                $this->session->set_flashdata("errorPerfil","Se actualizan los datos personales del usuario, pero no se cargo correctamente la imagen de perfil");
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                $img['nombre'] = 'persona_id_'.$persona_id;
	                //Guardar el registro de la nueva imagen
	                if($archivo_id==0){
	                	 if($this->Usuarios_model->guardarImagen($img)){
			        		$archivo_id_gen = $this->Usuarios_model->lastID();
			        		$this->Usuarios_model->actualizarImagenUsuario($usuario_id, array('archivo_id'=>$archivo_id_gen));
			        		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personales y se cargo correctamente la imagen de perfil del usuario");
			        	}else{
			        		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personal del usuario, pero no logró guardar la imagen de perfil");
			        	}  
	                }else{
	                	if($this->Usuarios_model->actualizarArchivoUsuario($archivo_id, $img)){
	                		$this->session->set_flashdata("errorPerfil","Se actualizó correctamente la información personal del usuario y la imagen de perfil");
	                	}else{
	                		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personal del usuario, pero no actualizan el archivo de la imagen de perfil");
	                	}
	                }
	               
		        }
			}
			else{

				$this->session->set_flashdata("errorPerfil","Se actualizó correctamente la información personal del usuario");
			}

		}else{
			$this->session->set_flashdata("errorPerfil","No se pudo actualizar correctamente la información personal del usuario");
		}
		$this->actualizarSesion($usuario_id);//Actualizar datos de sesión
		redirect(base_url()."dashboard/perfil");
	}

	private function actualizarSesion($usuario_id){
		$datosSesion = $this->Usuarios_model->getDatosSesion($usuario_id);
		if($datosSesion){
			$datosSesion['imagenUrl'] = (!$datosSesion['imagenUrl'])?base_url()."assets/template/img/avatar2.png":base_url().$datosSesion['imagenUrl'];
			$this->session->set_userdata($datosSesion);
		}

	}

	public function actualizarPerfilUsuario(){
		$usuario_id = $this->input->post("usuario_id");
		$persona_id = $this->input->post("persona_id");
		$archivo_id = $this->input->post("archivo_id");
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
		$area_id = $this->input->post("area_id");
		$cargo_id = $this->input->post("cargo_id");
		$fecha_retiro = $this->input->post("fecha_retiro");

		$img = array();
		$persona = array(
			'identificacion' => $identificacion,
			'nombre1' => $nombre1,
			'nombre2' => $nombre2,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'correo' => $correo,
			'celular'=> $celular,
			'fijo'=> $fijo,
			'direccion' => $direccion,
		);

		$dataUsuario = array(
			'rol_id'=>$rol_id,
			'entidad_id'=>$entidad_id,
			'area_id'=>$area_id,
			'cargo_id'=>$cargo_id,
			'fecha_retiro'=>$fecha_retiro,
		); 

		if($this->Usuarios_model->actualizarPersona($persona_id, $persona)){
			$this->Usuarios_model->actualizarUsuario($usuario_id, $dataUsuario);
			if(($_FILES['imagen']['size'])){
				//Subiendo el imagen
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
	                $this->session->set_flashdata("errorPerfil","Se actualizan los datos personales del usuario, pero no se cargo correctamente la imagen de perfil");
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                $img['nombre'] = 'persona_id_'.$persona_id;
	                //Guardar el registro de la nueva imagen
	                if($archivo_id==0){
	                	 if($this->Usuarios_model->guardarImagen($img)){
			        		$archivo_id_gen = $this->Usuarios_model->lastID();
			        		$this->Usuarios_model->actualizarImagenUsuario($usuario_id, array('archivo_id'=>$archivo_id_gen));
			        		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personales y se cargo correctamente la imagen de perfil del usuario");
			        	}else{
			        		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personal del usuario, pero no logró guardar la imagen de perfil");
			        	}  
	                }else{
	                	if($this->Usuarios_model->actualizarArchivoUsuario($archivo_id, $img)){
	                		$this->session->set_flashdata("errorPerfil","Se actualizó correctamente la información personal del usuario y la imagen de perfil");
	                	}else{
	                		$this->session->set_flashdata("errorPerfil","Se actualizan los datos personal del usuario, pero no actualizan el archivo de la imagen de perfil");
	                	}
	                }  
		        }
			}else{
				$this->session->set_flashdata("errorPerfil","Se actualizó correctamente la información personal del usuario");
			}

		}else{
			$this->session->set_flashdata("errorPerfil","No se pudo actualizar correctamente la información personal del usuario");
		}

		redirect(base_url()."usuario/".$usuario_id);
	}

	public function actualizarCredencial()
	{
		$usuario_id = $this->session->userdata("usuario");
		$clave_actual = $this->input->post("clave_actual");
		$nueva_clave = $this->input->post("nueva_clave");
		$confirma_clave = $this->input->post("confirma_clave");

		$datoUsuario = $this->Usuarios_model->getUsuarioHash($usuario_id);

		if($datoUsuario){
			//echo password_verify($clave_actual, $datoUsuario->contrasena);
			if($this->verificar($clave_actual, $datoUsuario->contrasena)){
				if($nueva_clave==$confirma_clave){
					$credencial = array(
						'contrasena'=> $this->encriptar($nueva_clave), );
					$this->Usuarios_model->actualizarUsuario($usuario_id, $credencial);
					$this->session->set_flashdata("error","Se actualizó correctamente sus credenciales de usuario");
					$this->logout();
				}else{
					$this->session->set_flashdata("errorCredencial","No coinciden la clave nueva insertada con la confirmación");
					redirect(base_url()."dashboard/perfil");
				}
			}else{
				$this->session->set_flashdata("errorCredencial","La contraseña actual digitada no coincide con la que se encuentra en el sistema.");
				redirect(base_url()."dashboard/perfil");
			}
		}else{
			$this->session->set_flashdata("errorCredencial","Error");
			redirect(base_url()."dashboard/perfil");
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."auth");
	}

	public function reestablecerCredencial(){
		$usuario_id = $this->input->post("usuario_id");
		$identificacion = $this->Usuarios_model->getIdentificacion($usuario_id)->identificacion;
		$hash = $this->encriptar($identificacion);
		$data = array('contrasena'=>$hash);
		$this->Usuarios_model->actualizarUsuario($usuario_id, $data);
		$this->session->set_flashdata("errorPerfil","Se ha reestablecido la contraseña");
		redirect(base_url()."usuario/".$usuario_id);

	}

	public function estado($usuario_id){
		$info = $this->Usuarios_model->getEstado($usuario_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->Usuarios_model->actualizarUsuario($usuario_id, $data);
		redirect(base_url()."usuario");
	}
}