<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Usuarios_model");
			$this->load->model("Cargo_model");
			$this->load->model("Area_model");
			$this->load->model("Entidad_model");
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
			'usuarios' => $this->Usuarios_model->getReferentes(),
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

	public function getHabilidades(){
		$datos = $this->Usuarios_model->getHabilidades();
		echo json_encode($datos);
	}

	public function agregarHabilidad(){
		$habilidad = ucfirst(trim($this->input->post("habilidad")));
		$mensaje = array();
		if($this->Usuarios_model->getHabilidadDuplicada($habilidad)){
			$mensaje['duplicado'] = true;
			$mensaje['error'] = false;
		}else{
			$mensaje['duplicado'] = false;
			$data = array("nombre"=>$habilidad);
			$valido = $this->Usuarios_model->setHabilidad($data);
			if($valido){
				$mensaje['id'] = $this->Usuarios_model->lastID();
				$mensaje['text'] = $habilidad;
				$mensaje['error'] = false;
			}else{
				$mensaje['error'] = true;
			}
		}
		echo json_encode($mensaje);
	}

	public function agregar(){
		$data = array(
			'tipoidentificacion' => $this->Usuarios_model->getTipoIdentificacion(),
			'tipoperfil'=>$this->Usuarios_model->getTipoPerfil(),
			//'roles'=>$this->Usuarios_model->getRoles($this->rol_usuario),
			'sexo'=>$this->Usuarios_model->getSexo(),
			'habilidades'=>$this->Usuarios_model->getHabilidades(),
			'municipios'=>$this->Usuarios_model->getMunicipios(),
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
		date_default_timezone_set('America/Bogota');
		$fecha_registro = date('Y-m-d H:i:s');
		//Datos personales
		$tipo_documento_id = $this->input->post("tipo_documento");
		$identificacion = $this->input->post("identificacion");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$sexo_id = $this->input->post("sexo_id");
		$fecha_nacimiento = $this->input->post("fecha_nacimiento");
		$municipio_nacimiento_id = $this->input->post("municipio_nacimiento_id");
		$correo = $this->input->post("correo");
		$celular = $this->input->post("celular");
		$fijo = $this->input->post("fijo");
		$municipio_residencia_id = $this->input->post("municipio_residencia_id");
		$direccion = $this->input->post("direccion");

		//Perfil
		$tipo_perfil_id = $this->input->post("tipo_perfil_id");
		//$rol_id = $this->input->post("rol_id");
		$rol_id = 0;
		$descripcion = $this->input->post("descripcion");
		$fecha_registro = date('Y-m-d H:i:s');

		//Habilidades
		$habilidades_id = $this->input->post("habilidades_id");

		//Redes
		$facebook = $this->input->post("facebook");
		$youtube = $this->input->post("youtube");
		$linkedin = $this->input->post("linkedin");
		$instagram = $this->input->post("instagram");


		$persona = array(
			'tipo_documento_id' => $tipo_documento_id,
			'identificacion' => $identificacion,
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'sexo_id' => $sexo_id,
			'fecha_nacimiento' => $fecha_nacimiento,
			'municipio_nacimiento_id' => $municipio_nacimiento_id,
			'correo' => $correo,
			'celular' => $celular,
			'fijo' => $fijo,
			'municipio_residencia_id' => $municipio_residencia_id,
			'direccion' => $direccion,
		);


		if($this->Usuarios_model->agregarPersona($persona)){
			$persona_id = $this->Usuarios_model->lastID();
			$imagen = array('nombre'=> $nombres." ".$apellidos,);
			$usuario = array(
				'persona_id' => $persona_id,
				'contrasena' => $this->encriptar($identificacion),
				'tipo_perfil_id' => $tipo_perfil_id,
				'rol_id' => $rol_id,
				'descripcion' => $descripcion,
				'fecha_registro' => $fecha_registro,
				'estado' => 1
			);

			if(($_FILES['imagen']['size']>0)){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['max_size']             = 5000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $usuario['archivo_id'] = 0;
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $imagen['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                $imagen['nombre'] = $data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if($this->Usuarios_model->guardarImagen($imagen)){
		        		$usuario["archivo_id"] = $this->Usuarios_model->lastID();
		        	}
		        }
		    }	

			if($this->Usuarios_model->guardarUsuario($usuario)){
				$usuario_id = $this->Usuarios_model->lastID();
				//Redes sociales
				$redes = array(
					'usuario_id'=>$usuario_id,
					'facebook' => $facebook,
					'instagram' => $instagram,
					'youtube' => $youtube,
					'linkedin' => $linkedin,
				);
				//Guardar redes sociales
				$this->Usuarios_model->guardarRedes($redes);

				//Guardando habilidades del usuario
				if(!empty($habilidades_id)){
					$habilidades = array();
					foreach ($habilidades_id as $habilidad) {
						$aux = array('usuario_id'=>$usuario_id, 'habilidad_id'=>$habilidad);
						$habilidades[] = $aux;
					}
					$this->Usuarios_model->guardarHabilidades($habilidades);
				}
				redirect(base_url()."referente");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información correspondiente al usuario");
				redirect(base_url()."referente");
			}
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la información");
			redirect(base_url()."referente/almacenar");
		}
		
	}
	
	public function editar($usuario_id){
		$data = array(
			'persona'=>$this->Usuarios_model->getPersona($usuario_id),
			'usuario'=>$this->Usuarios_model->getUsuario($usuario_id),
			'tipoidentificacion' => $this->Usuarios_model->getTipoIdentificacion(),
			'tipoperfil'=>$this->Usuarios_model->getTipoPerfil(),
			//'roles'=>$this->Usuarios_model->getRoles($this->rol_usuario),
			'sexo'=>$this->Usuarios_model->getSexo(),
			'habilidades'=>$this->Usuarios_model->getHabilidades(),
			'usuario_habilidad'=>$this->Usuarios_model->getHabilidadUsuario($usuario_id),
			'redes'=>$this->Usuarios_model->getRedesUsuario($usuario_id),
			'municipios'=>$this->Usuarios_model->getMunicipios(),
		);
		$jquery = array("jquery"=>"perfilUsuario.js");

		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php",$this->moduloControlador);
		$this->load->view("dashboard/usuario/edita", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function perfil(){
		$usuario_id = $this->session->userdata("usuario");
		$data = array(
			'persona'=>$this->Usuarios_model->getPersona($usuario_id),
			'usuario'=>$this->Usuarios_model->getUsuario($usuario_id),
			'tipoidentificacion' => $this->Usuarios_model->getTipoIdentificacion(),
			'tipoperfil'=>$this->Usuarios_model->getTipoPerfil(),
			'roles'=>$this->Usuarios_model->getRoles($this->rol_usuario),
			'sexo'=>$this->Usuarios_model->getSexo(),
			'habilidades'=>$this->Usuarios_model->getHabilidades(),
			'usuario_habilidad'=>$this->Usuarios_model->getHabilidadUsuario($usuario_id),
			'redes'=>$this->Usuarios_model->getRedesUsuario($usuario_id),
			'municipios'=>$this->Usuarios_model->getMunicipios(),
		);
		$jquery = array('jquery' => 'perfilUsuario.js');
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/perfil", $data);
		$this->load->view("layouts/dashboard/footer.php", $jquery);
	}

	public function actualizarPerfil(){
	  
		date_default_timezone_set('America/Bogota');
		$fecha_modificacion = date('Y-m-d H:i:s');
		//ID
		$usuario_id = $this->input->post("usuario_id");
		$persona_id = $this->input->post("persona_id");
		$archivo_id = $this->input->post("archivo_id");
		
		//Datos personales
		$tipo_documento_id = $this->input->post("tipo_documento");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$sexo_id = $this->input->post("sexo_id");
		$fecha_nacimiento = $this->input->post("fecha_nacimiento");
		$municipio_nacimiento_id = $this->input->post("municipio_nacimiento_id");
		$correo = $this->input->post("correo");
		$celular = $this->input->post("celular");
		$fijo = $this->input->post("fijo");
		$municipio_residencia_id = $this->input->post("municipio_residencia_id");
		$direccion = $this->input->post("direccion");

		//Perfil
		$tipo_perfil_id = $this->input->post("tipo_perfil_id");
		$rol_id = $this->input->post("rol_id");
		$descripcion = $this->input->post("descripcion");

		//Habilidades
		$habilidades_id = $this->input->post("habilidades_id");

		//Redes
		$facebook = $this->input->post("facebook");
		$youtube = $this->input->post("youtube");
		$linkedin = $this->input->post("linkedin");
		$instagram = $this->input->post("instagram");

		$persona = array(
			'tipo_documento_id' => $tipo_documento_id,
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'sexo_id' => $sexo_id,
			'fecha_nacimiento' => $fecha_nacimiento,
			'municipio_nacimiento_id' => $municipio_nacimiento_id,
			'correo' => $correo,
			'celular' => $celular,
			'fijo' => $fijo,
			'municipio_residencia_id' => $municipio_residencia_id,
			'direccion' => $direccion,
		);

		$img = array();
		
		if($this->Usuarios_model->actualizarPersona($persona_id, $persona)){
			$imagen = array('nombre'=> $nombres." ".$apellidos,);
			$usuario = array(
				'tipo_perfil_id' => $tipo_perfil_id,
				'rol_id' => $rol_id,
				'descripcion' => $descripcion,
				'fecha_modificacion' => $fecha_modificacion
			);

			if(($_FILES['imagen']['size']>0)){
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
			        		$usuario['archivo_id'] = $archivo_id_gen;
			        		//$this->Usuarios_model->actualizarImagenUsuario($usuario_id, array('archivo_id'=>$archivo_id_gen));
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
			
			if($this->Usuarios_model->actualizarUsuario($usuario_id, $usuario)){
				//Redes sociales
				$redes = array(
					'facebook' => $facebook,
					'instagram' => $instagram,
					'youtube' => $youtube,
					'linkedin' => $linkedin,
				);

				if($this->Usuarios_model->existeRedesUsuario($usuario_id)){
					$this->Usuarios_model->actualizarRedes($usuario_id, $redes);
				}else{
					//Guardar redes sociales
					$redes['usuario_id'] = $usuario_id;
					$this->Usuarios_model->guardarRedes($redes);
				}
				
				if($this->Usuarios_model->existeHabilidadUsuario($usuario_id)){
					$this->Usuarios_model->eliminarHabilidadUsuario($usuario_id);
				}

				//Guardando habilidades del usuario
				if(!empty($habilidades_id)){
					$habilidades = array();
					foreach($habilidades_id as $habilidad) {
						$aux = array('usuario_id'=>$usuario_id, 'habilidad_id'=>intval($habilidad));
						$habilidades[] = $aux;
					}
					$this->Usuarios_model->guardarHabilidades($habilidades);
				}
				redirect(base_url()."referente");
			}else{
				$this->session->set_flashdata("error","No se pudo actualizar la información correspondiente al usuario.");
				redirect(base_url()."referente");
			}


		}else{
			$this->session->set_flashdata("errorPerfil","No se pudo actualizar correctamente la información personal del usuario");
		}
		$this->actualizarSesion($usuario_id);//Actualizar datos de sesión
		redirect(base_url()."referente");
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
			echo password_verify($clave_actual, $datoUsuario->contrasena);
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
		redirect(base_url()."referente");
	}
	
	public function eliminar($id){
	    $usuario = $this->Usuarios_model->getUsuario($id);
	    $persona_id = $usuario->persona_id;
		$this->Usuarios_model->eliminarHabilidadUsuario($id);
		$this->Usuarios_model->deleteRedesUsuario($id);
		$this->Usuarios_model->deleteUsuario($id);
		$this->Usuarios_model->deletePersona($persona_id);
		redirect(base_url()."referente");
	}
}