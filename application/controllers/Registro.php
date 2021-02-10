<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model("Cms_model");
		$this->load->model("NegocioVerde_model");
		$this->load->model("Usuarios_model");
		if($this->session->userdata("login")){
			$this->verificador_id = $this->session->userdata("usuario");
		}
	}

	public function index2()
	{	
	    //Si hay una variable de sesi車n creada de un negocio anterior, se elimina porque se va a crear otro
	    if($this->session->has_userdata('Rempresa_id')){
			$this->session->unset_userdata('Rempresa_id');
			$this->session->unset_userdata('Rpersona_id');
		}
		
	    $data = array(
	        'tipo_persona' => $this->NegocioVerde_model->getOpciones('tipo_persona'),
			'tipo_identificacion' => $this->NegocioVerde_model->getOpciones('tipo_identificacion'),
			'region' => $this->NegocioVerde_model->getRegistrosCondicionados('region', array('pais_id'=>1)),
			'unidad_medida' => $this->NegocioVerde_model->getOpciones('unidad_medida'),
			'afirmacion' => $this->NegocioVerde_model->getOpciones('si_no'),
			'cumple' => $this->NegocioVerde_model->getOpciones('cumple_nocumple'),
			'categoria' => $this->NegocioVerde_model->getOpciones('categoria'),
			'aplica' => $this->NegocioVerde_model->getOpciones('aplica_noaplica'),
			'desc_demografia' => $this->NegocioVerde_model->getOpciones('desc_demografia'),
			'etapa' => $this->NegocioVerde_model->getOpciones('etapa'),
			'etapa_empresa' => $this->NegocioVerde_model->getOpciones('etapa_empresa'),
			'desc_demografia' => $this->NegocioVerde_model->getOpciones('desc_demografia'),
			'organizacion' => $this->NegocioVerde_model->getOpciones('orientacion'),
			'tamanio_empresa' => $this->NegocioVerde_model->getOpciones('tamanio_empresa'),
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),	    	
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_contacto' => $this->Cms_model->getContacto(),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
	    );

        $jquery = array('jquery' => 'inscripcionSitio.js',"counter" => count_visitor($this->session->userdata("counter")));
		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/registro', $data);
		$this->load->view('layouts/sitio/footerinicio.php', $jquery);
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
	
	public function encriptar($clave){
		/**
		 * Observe que la sal se genera aleatoriamente aqu赤.
		 * No use nunca una sal est芍tica o una que no se genere aleatoriamente.
		 *
		 * Para la GRAN mayor赤a de los casos de uso, dejar que password_hash genere la sal aleatoriamente
		 */
		$opciones = [
		    'cost' => 12,
		    //'salt' => random_bytes(30),
		];
		$resultado = password_hash($clave, PASSWORD_BCRYPT, $opciones);
		return $resultado;
	}
	
	public function cargarCombo()
	{
		$tabla = $this->input->post('tabla');
		$where = $this->input->post('where');
		$datos = $this->NegocioVerde_model->getRegistrosCondicionados($tabla, $where);
		echo "<option value='' selected>Selecciona una opción</option>";
		foreach ($datos as $value) {
			echo "<option value='".$value->id."'>".$value->nombre."</option>";
		}
	}
	
	public function estado($empresa_id){
		$info = $this->NegocioVerde_model->getEstado($empresa_id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->NegocioVerde_model->actualizarEmpresa($empresa_id, $data);
		redirect(base_url()."negocioVerde");
	}

	public function unique(){
		$tabla = $this->input->post('tabla');
		$where = $this->input->post('where');
		$id = $this->input->post('id');
		$respuesta = $this->NegocioVerde_model->validarUnico($tabla, $where);
		if($respuesta)
		{
			if($respuesta->id==$id){
				echo 0;
			}else{
				echo 1;
			}
		}else{
			echo 0;
		}
	}
	
	public function index()
	{	
	    //Si hay una variable de sesi車n creada de un negocio anterior, se elimina porque se va a crear otro
	    if($this->session->has_userdata('Rempresa_id')){
			$this->session->unset_userdata('Rempresa_id');
			$this->session->unset_userdata('Rpersona_id');
		}
		if($this->session->has_userdata("Rempresario_id")) $this->session->unset_userdata('Rempresario_id');
		
	    $data = array(
	        'tipo_persona' => $this->NegocioVerde_model->getOpciones('tipo_persona'),
			'tipo_identificacion' => $this->NegocioVerde_model->getOpciones('tipo_identificacion'),
			'region' => $this->NegocioVerde_model->getRegistrosCondicionados('region', array('pais_id'=>1)),
			'afirmacion' => $this->NegocioVerde_model->getOpciones('si_no'),
			'cumple' => $this->NegocioVerde_model->getOpciones('cumple_nocumple'),
			'categoria' => $this->NegocioVerde_model->getOpciones('categoria'),
			'aplica' => $this->NegocioVerde_model->getOpciones('aplica_noaplica'),
			'desc_demografia' => $this->NegocioVerde_model->getOpciones('desc_demografia'),
			'etapa' => $this->NegocioVerde_model->getOpciones('etapa'),
			'etapa_empresa' => $this->NegocioVerde_model->getOpciones('etapa_empresa'),
			'desc_demografia' => $this->NegocioVerde_model->getOpciones('desc_demografia'),
			'organizacion' => $this->NegocioVerde_model->getOpciones('orientacion'),
			'tamanio_empresa' => $this->NegocioVerde_model->getOpciones('tamanio_empresa'),
			//'verificador' => $this->Usuarios_model->getVerificadorInformacion($this->verificador_id),
			'actividades' => $this->NegocioVerde_model->getActividades(),
			'practica_conservacion' => $this->NegocioVerde_model->getOpcionesLike('PC'),
			'impacto_ambiental' => $this->NegocioVerde_model->getOpcionesLike('IMPACTO_AMBIENTAL_P'),
			'si_no_aplica' => $this->NegocioVerde_model->getOpciones('aplica_opciones'),
			'tipo_personeria' => $this->NegocioVerde_model->getOpciones('tipo_personeria_juridica'),
			'grupo_etnico' => $this->NegocioVerde_model->getOpciones('grupo_etnico'),
			'opciones_bienes_servicios' => $this->NegocioVerde_model->getOpciones('opciones_bienes_servicios'),
			'territorio_colectivo' => $this->NegocioVerde_model->getOpciones('territorio_colectivo'),
			'tamanio_empresa' => $this->NegocioVerde_model->getOpciones('tamanio_empresa'),
			'departamentos' => $this->NegocioVerde_model->getRegistrosCondicionados('departamento', array('region_id'=>3)),
			'municipios' => $this->NegocioVerde_model->getRegistrosCondicionados('municipio', array('departamento_id'=>1)),
			'tenencia_tierra' => $this->NegocioVerde_model->getOpcionesLike('TT'),
	    	'datos_menu' => $this->Cms_model->getMenu(),
	    	'datos_menu2' => $this->Cms_model->getMenu2(),
	    	'datos_principal' => $this->Cms_model->getContenidoPrincial(),
	    	'datos_principal2' => $this->Cms_model->getContenidoPrincial2(),	    	
	    	'datos_galeria' => $this->Cms_model->getGaleria(),
	    	'datos_contacto' => $this->Cms_model->getContacto(),
	    	'datos_streaming' => $this->Cms_model->getStreaming(),
	    	'estado_usuario' => $this->session->userdata("login") ? "Dashboard" : "Iniciar Sesión"
	    );

        $jquery = array(
        	'jquery' => array('assets/template/js/formatoInscripcion2.js','assets/template/js/lazy.js'),
        	"counter" => count_visitor($this->session->userdata("counter"))
        );
		$this->load->view('layouts/sitio/header.php');
		$this->load->view('layouts/sitio/menu0', $data);
		$this->load->view('sitio/registro2', $data);
		$this->load->view('layouts/sitio/footerinicio', $jquery);
	}
	
	public function almacenarInformacionGeneral(){
		//Definiendo zona horaria
		date_default_timezone_set('America/Bogota');
		$persona = json_decode($this->input->post("persona"), true);
		$empresa = json_decode($this->input->post("empresa"), true);
		$asociacion = json_decode($this->input->post("asociacion"), true);
		$anio_verificado = json_decode($this->input->post("anio_verificado"), true);
		$anios_verificacion = array();

		$razon_social_id = explode(" ", preg_replace('/\&(.)[^;]*;/', '\\1', htmlentities($empresa['razon_social'])));
		if(count($razon_social_id) > 2){
			$razon_social_id = $razon_social_id[0]."".substr($razon_social_id[1], 0,1)."".substr($razon_social_id[2], 0,1);
		}else{
			$razon_social_id = implode("", $razon_social_id);	
		}

		$img = array(
					'nombre'=> $empresa['razon_social'],
				);
		$doc = array(
					'nombre'=> "Carta_consentimiento_".$empresa['razon_social'],
				);
		$mensaje = array('error' => -1, 'fase' => 'No se logró registrar correctamente la información general del negocio verde');
		$mensaje['soloRegistro'] = 1;
	   /*echo "Actualizando: ".intval($this->session->has_userdata('Rempresa_id'))."<br>";
		var_dump($_FILES['documento']);
		echo "//documento <br>";
		var_dump($_FILES['archivo']);
		echo "//imagen_portada <br>";
		var_dump($asociacion);
		echo "//asociacion <br>";
		var_dump($persona);
		echo "//persona <br>";
		var_dump($empresa);
		echo "//empresa <br>";*/
		//Verificar si se esta actualizando la información general
	    if($this->session->has_userdata('Rempresa_id')){
			$empresa_id = $this->session->userdata('Rempresa_id');
			if($this->session->has_userdata('Rpersona_id')){
				$this->NegocioVerde_model->actualizarPersona($this->session->userdata('Rpersona_id'), $persona);
			}else{
				$this->NegocioVerde_model->guardarPersona($persona);
				$fecha_registro = date('Y-m-d H:i:s');
				$fecha_retiro = date('Y-m-d', strtotime($fecha_registro.'+ 1 Year'));
				//Obteniendo el ID del ultimo registro agregado a la base de datos
				$representante_legal_id = $this->NegocioVerde_model->lastID();
				$contrasena = $this->encriptar($persona['identificacion']); 
				$usuario = array(
					'persona_id'=>$representante_legal_id,
					'contrasena'=>$contrasena,
					'rol_id'=>4,
					'fecha_registro'=>$fecha_registro,
					'fecha_retiro'=>$fecha_retiro,
					'estado'=>1
				);
				//Crear un usuario al representante legal
				$this->Usuarios_model->guardarUsuario($usuario);
				//$usuario_id = $this->Usuarios_model->lastID();

				$empresa['representante_legal_id'] = $representante_legal_id;

			}

			if($this->NegocioVerde_model->getNumRows('empresa_asociacion', $empresa_id)){
				$this->NegocioVerde_model->actualizarAsociacion($this->session->userdata('Rempresa_id'),$asociacion);
			}else{
				$asociacion['empresa_id'] = $empresa_id;
				$this->NegocioVerde_model->guardarAsociacion($asociacion);
			}

			if($this->NegocioVerde_model->getNumRows('anio_verificado_empresa', $empresa_id)) $this->NegocioVerde_model->eliminarRegistros('anio_verificado_empresa', $empresa_id);

			if(!empty($anio_verificado)){
				foreach ($anio_verificado as $value ) {
					$anios_verificacion[] = array('empresa_id'=>$this->session->userdata('Rempresa_id'), 'anio'=>$value);
				}
				$this->NegocioVerde_model->guardarRegistrosBatch('anio_verificado_empresa', $anios_verificacion);
			}

			
			$mensaje['error'] = 2;
			$mensaje['fase'] = 'La información se actualizo correctamente.';
	
			//Actualizando imagen de emprendimiento
			if($_FILES['archivo']['size']>0){
				$archivo_prev = $this->NegocioVerde_model->getArchivo($empresa_id);
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= 'Imagen_empresa_'.$empresa_id;
		        $config['max_size']             = 3000;
		        $config['max_width']            = 3000;
		        $config['max_height']           = 3000;
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('archivo'))
		        {
	               $error = array('error' => $this->upload->display_errors());
	               $mensaje['fase'] = 'La información se actualizo correctamente. Error, no se pudo cargar la imagen';
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if(!empty($archivo_prev)){
	                	
	                	if (is_readable($archivo_prev->url) && unlink($archivo_prev->url)) {
						   
						}else {
						    //echo "The file was not found or not readable and could not be deleted";
						}
	                	//unlink("../ventanilla_reforma/".$archivo_prev->url);
						$this->NegocioVerde_model->actualizarImagen($img, $archivo_prev->id);
						$mensaje['fase'] = 'La información se actualizo correctamente. Actualizó correctamente su archivo imagen';
	                }else{
	                	if($this->NegocioVerde_model->guardarImagen($img)){
	                		$mensaje['fase'] = 'La información se actualizo correctamente. Y se agrego el archivo imagen correspondiente al emprendimiento';
			        		//actualizar campo archivo_id en Empresa
			        		$empresa['archivo_id'] = $this->NegocioVerde_model->lastID();
			        	}else{
			        		$mensaje['fase'] = 'La información se actualizo correctamente. No se pudo agregar correctamente la imagen';
			        	} 
	                }        
		        }
			}

			//Actualizando imagen de emprendimiento
			if($_FILES['documento']['size']>0){
				$documento_prev = $this->NegocioVerde_model->getDocumentoConsentimiento($empresa_id);
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		         $config['file_name']			= "Carta_consentimiento_".$empresa['razon_social']."_".$empresa_id;
		        $config['max_size']             = 8000;
		        $config['max_width']            = 2000;
		        $config['max_height']           = 2000;
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('documento'))
		        {
	               $error = array('error' => $this->upload->display_errors());
	               $mensaje['fase'] = 'La información se actualizo correctamente. Error, no se pudo cargar la imagen';
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $doc['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen

	                if(!empty($documento_prev)){
	                	unlink("../public_html/".$documento_prev->url);
						$this->NegocioVerde_model->actualizarImagen($doc, $documento_prev->id);
						$mensaje['fase'] = 'La información se actualizo correctamente. Actualizó correctamente documento de consentimiento.';
	                }else{
	                	if($this->NegocioVerde_model->guardarImagen($doc)){
	                		$mensaje['fase'] = 'La información se actualizo correctamente. Y se agrego documento de consentimiento de verificación.';
			        		//actualizar campo documento_consentimiento_id en Empresa
			        		$empresa['documento_consentimiento_id'] = $this->NegocioVerde_model->lastID();
			        	}else{
			        		$mensaje['fase'] = 'La información se actualizo correctamente. No se pudo agregar correctamente el documento de consentimiento.';
			        	} 
	                }        
		        }
			}

			$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('Rempresa_id'), $empresa);

		}elseif($this->NegocioVerde_model->guardarPersona($persona)){//Agregando un nuevo emprendimiento
			$fecha_registro = date('Y-m-d H:i:s');
			$fecha_retiro = date('Y-m-d', strtotime($fecha_registro.'+ 1 Year'));
			//Obteniendo el ID del ultimo registro agregado a la base de datos
			$representante_legal_id = $this->NegocioVerde_model->lastID();
			$contrasena = $this->encriptar($persona['identificacion']); 
			$usuario = array(
				'persona_id'=>$representante_legal_id,
				'contrasena'=>$contrasena,
				'rol_id'=>4,
				'fecha_registro'=>$fecha_registro,
				'fecha_retiro'=>$fecha_retiro,
				'estado'=>1
			);
			//Crear un usuario al representante legal
			$this->Usuarios_model->guardarUsuario($usuario);
			$usuario_id = $this->Usuarios_model->lastID();

			//Verificador que llena la información
			$verificador_id = $this->session->userdata("usuario");
			//Campos adicionales de la tabla empresa
			$empresa['razon_social_id'] = str_replace(".","",$razon_social_id);
			$empresa['representante_legal_id'] = $representante_legal_id;
			$empresa['verificador_id'] = $verificador_id;
			$empresa['informacion_general']	= 0;
			$empresa['informacion_as']	= 0;
			$empresa['verificacion1']	= 0;
			$empresa['verificacion2']	= 0;
			$empresa['plan_mejora']	= 0;
			$empresa['fecha_registro'] = $fecha_registro;
			$empresa['bandera'] = 2;
			
			if($this->NegocioVerde_model->guardarEmpresa($empresa)){
				//Obteniendo el ID del ultimo registro agregado a la base de datos
    			$empresa_id = $this->NegocioVerde_model->lastID();
				//Guardar información de check
				$this->session->set_userdata('Rempresa_id', $empresa_id);
				$asociacion['empresa_id'] = $empresa_id;
				
				if($_FILES['archivo']['size']>0){
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= 'Imagen_Portada_'.$empresa['razon_social'];
			        $config['max_size']             = 6000;
			        $config['max_width']            = 3000;
			        $config['max_height']           = 3000;
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('archivo'))
			        {
		                $error = array('error' => $this->upload->display_errors());
		                $mensaje['fase'] = 'Error la imagen no se pudo cargar';
		                $guardoArc = 3;
			        }
			        else
			        {
		                $guardoArc = 3;
		                $data = array('upload_data' => $this->upload->data());
		                //Directorio donde se almacena la imagen
		                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
		                //Guardar el registro de la nueva imagen
		                if($this->NegocioVerde_model->guardarImagen($img)){
		                    $guardoArc = 1;
			        		$archivo_id = $this->NegocioVerde_model->lastID();
			        		//actualizar campo archivo_id en Empresa
			        		$this->NegocioVerde_model->actualizarEmpresa($empresa_id, array('archivo_id'=>$archivo_id));
			        	}else{
			        		$mensaje['fase'] = 'Error al intentar guardar la imagen. Lo demás se almaceno correctamente';
			        	}      
			        }
			    }else{
			        $guardoArc = 2;
			    }

			    if($_FILES['documento']['size']>0){
					//Subiendo el imagen
					$config['upload_path']          = './assets/archivo/';
					//echo base_url().'assets/';
			        $config['allowed_types']        = '*';
			        //Configurando el nuevo del archivo
			        $config['file_name']			= "Carta_consentimiento_".$empresa['razon_social']."_".$empresa_id;
			        $config['max_size']             = 8000;
	        		$config['max_width'] = 2000;
        			$config['max_height'] = 2000;
			        $this->load->library('upload', $config);
			        if ( !$this->upload->do_upload('documento'))
			        {
		                $error = array('error' => $this->upload->display_errors());
		                $mensaje['fase'] = 'Error la imagen no se pudo cargar';
		                $guardoDoc = 3;
			        }
			        else
			        {
		                $guardoDoc = 3;
		                $data = array('upload_data' => $this->upload->data());
		                //Directorio donde se almacena la imagen
		                $doc['url'] = "assets/archivo/".$data['upload_data']['file_name'];
		                //Guardar el registro de la nueva imagen
		                if($this->NegocioVerde_model->guardarImagen($doc)){
		                    $guardoDoc = 1;
			        		$documento_id = $this->NegocioVerde_model->lastID();
			        		//actualizar campo archivo_id en Empresa
			        		$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('Rempresa_id'), array('documento_consentimiento_id'=>$documento_id));
			        	}else{
			        		$mensaje['fase'] = 'Error al intentar guardar el documento. Lo demás se almaceno correctamente';
			        	}      
			        }
			    }else{
			        $guardoDoc = 2;
			    }

				if($this->NegocioVerde_model->guardarAsociacion($asociacion) && $guardoArc && $guardoDoc){
					$mensaje['empresa_id'] = $this->session->userdata('Rempresa_id');
					$mensaje['representante_legal_id'] = $representante_legal_id;
					$this->session->set_userdata('estado_emp', 1);
					$this->NegocioVerde_model->guardarInformacionCheck(array("empresa_id"=>$this->session->userdata("Rempresa_id")));
    				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($this->session->userdata("Rempresa_id"));
    				$mensaje['progreso']=$progreso->progreso;
    				
				    if(!empty($anio_verificado)){
						foreach ($anio_verificado as $value ) {
							$anios_verificacion[] = array('empresa_id'=>$this->session->userdata('Rempresa_id'), 'anio'=>$value);
						}
						$this->NegocioVerde_model->guardarRegistrosBatch('anio_verificado_empresa', $anios_verificacion);
					}
					
					$mensajeEmprendimiento="Felicidades!
                    Te has registrado en nuestro programa de negocios verdes.
                    Próximamente te asignaremos un verificador que se encargará de explicarte claramente lo que son los negocios verdes y te realizará la respectiva aplicación y verificación de criterios para determinar el nivel de avance de tu iniciativa o emprendimiento verde.
                    Somos Ventanilla de Emprendimientos Verdes del Chocó.";
                    
    				if(trim($persona['correo'])){
    				    $this->envioCorreo('Registro de emprendimiento verde', trim($persona['correo']), $mensajeEmprendimiento);
    				}
    				
    				$administrativos = $this->NegocioVerde_model->getAdministrativos();
    				
    				if(!empty($administrativos)){
    				    foreach($administrativos as $a){
    				        if(trim($a->correo)){
    				            $mensajeAdministrador = $a->nombre1.",
                    Se creo un nuevo emprendimiento (".$empresa['razon_social']."), la cual requiere que se le asigne un verificador que pueda explicarle claramente lo que son los negocios verdes y realizar respectivamente la aplicación y verificación de criterios para determinar el nivel de avance de la iniciativa o emprendimiento verde. Podrás asignar un verificador ingresando al módulo de Administrador de verificadores en la pestaña de asignación de aplicación de criterios. Somos ventanilla de emprendimientos verdes del Chocó";
    				            $this->envioCorreo('Nuevo emprendimiento por asignar verificador', trim($a->correo), $mensajeAdministrador);
    				        }
    				    }
    				}
    				
					$mensaje['error'] = 1;
				    $mensaje['fase']='Se guardó correctamente la información del Negocio Verde';
				}else{
					$this->NegocioVerde_model->eliminar('usuarios', $usuario_id);
					$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
					$this->NegocioVerde_model->eliminar('empresa', $this->session->userdata('Rempresa_id'));
					if($guardoDoc == 1){
					    $this->NegocioVerde_model->eliminar('archivo', $documento_id);
					    if (is_readable($doc['url']) && unlink($doc['url'])) {
						   $mensaje['deleteDoc']='1';
						}else{
						    $mensaje['deleteDoc']='0';
						}
					}
					if($guardoArc == 1){
					    $this->NegocioVerde_model->eliminar('archivo', $archivo_id);
					    if (is_readable($img['url']) && unlink($img['url'])) {
						   $mensaje['deleteImg']='1';
						}else{
						    $mensaje['deleteImg']='0';
						}
					    
					}
					$mensaje['error'] = -1;
					$mensaje['fase']='Error al intentar guardar la asociación';
				}
			}else{
				$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error al intentar registrar los datos de la empresa';
			}
		}
		else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se logró registrar correctamente la información general del negocio verde';
		}
		$this->session->set_flashdata("mensaje",$mensaje['fase']);
		echo json_encode($mensaje);
	}

	public function descripcionNegocio(){
		$empresa_id = $this->session->userdata("Rempresa_id");
		date_default_timezone_set('America/Bogota');
		$fecha_registro = date("Y-m-d H:i:s");
		$descripcion = $this->input->post("descripcion");
		$descripcion['empresa_id'] = $empresa_id;
		$descripcion['fecha_registro'] = $fecha_registro;
		$mensaje = array('error' => 1);
		if($this->NegocioVerde_model->getNumRows("descripcion_empresa", $empresa_id)>0){
			if($this->NegocioVerde_model->actualizarRegistro("descripcion_empresa", $descripcion, $empresa_id)){
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('descripcion_check'=>1));
				$mensaje['fase'] = "Se actualizó correctamente la información";
			}else{
				$mensaje['error'] = -1;
				$mensaje['fase'] = "No se pudo actualizar la información correctamente";
			}
		}elseif($this->NegocioVerde_model->guardarDescripcion($descripcion)){
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('descripcion_check'=>1));
			$mensaje['fase'] = "Se guardó correctamente la información";
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = "No se pudo guardar la información correctamente";
		}
		//Obteniendo el progreso de la Inscripción
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		//var_dump($progreso);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		echo json_encode($mensaje);
	}

	public function categoriaNegocio(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		$categoria = $this->input->post("categoria");
		$actividades = $this->input->post("actividades");
		$servicios = $this->input->post("servicios");
		$serviciosActualizar = $this->input->post("serviciosActualizar");
		$mensaje = array('error' => 1);
		//Eliminando datos anteriores 
		$this->NegocioVerde_model->eliminarRegistros('actividad_empresa', $empresa_id);
		//$this->NegocioVerde_model->eliminarRegistros('caracterizacion_empresa_bien_servicio', $empresa_id);
		
		if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, $categoria)){
			$mensaje['fase'] = "Se actualizó correctamente el subsector del emprendimiento";
			if(!empty($actividades))$this->NegocioVerde_model->guardarRegistrosBatch('actividad_empresa', $actividades);
			if(!empty($servicios))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_empresa_bien_servicio', $servicios);
			if(!empty($serviciosActualizar)) $this->NegocioVerde_model->actualizarRegistrosBienes('caracterizacion_empresa_bien_servicio', $serviciosActualizar);
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('categoria_check'=>1,'observacion_check'=>1));
			$mensaje['bienLider'] = $this->NegocioVerde_model->getEmpresaServicios($empresa_id, 1);
			$mensaje['empresaBienes'] = $this->NegocioVerde_model->getEmpresaServicios($empresa_id, 0);
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = "No se pudo guardar correctamente la información";
		}
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		echo json_encode($mensaje);
	}

	public function informacionEmpresa(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		$impacto_ambiental = $this->input->post("impacto_ambiental");
		$conservacion = $this->input->post('conservacion');
		//var_dump($impacto_ambiental);
		//Eliminando datos anteriores
		$this->NegocioVerde_model->eliminarRegistros('impacto_empresa', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('conservacion', $empresa_id);

		//Guardando registros
		if(!empty($impacto_ambiental))$this->NegocioVerde_model->guardarRegistrosBatch('impacto_empresa', $impacto_ambiental);
		if(!empty($conservacion))$this->NegocioVerde_model->guardarRegistrosBatch('conservacion', $conservacion);
		$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresa_check'=>1));
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['fase'] = 'Se guardó correctamente de los impactos ambientales positivos y buenas prácticas realizadas por el negocio verde.';
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		$mensaje['error'] = 1;

		echo json_encode($mensaje);

	}

	public function informacionVerificacion(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		var_dump($this->input->post());
		$empresario = $this->input->post('empresario');
		$mensaje = array();
		if($this->session->has_userdata("Rempresario_id")){
			if(!empty($empresario)){
				$this->NegocioVerde_model->actualizarEmpresario($this->session->empresario_id, $empresario);
				$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_general'=>1, 'informacion_as'=>1,));
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresario_check'=>1));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
				$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
				$mensaje['error'] = 1;
			}
		}elseif($this->NegocioVerde_model->guardarEmpresario($empresario)){
			$empresario_id = $this->NegocioVerde_model->lastID();
			$this->session->set_userdata("Rempresario_id", $empresario_id);
			if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, array('empresario_id'=>$empresario_id))){
				$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_general'=>1, 'informacion_as'=>1,));
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresario_check'=>1));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
				$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
				$mensaje['error'] = 1;
			}else{
				$mensaje['error'] = 'No se pudo actualizar el empresario en la tabla empresa';
			}
		}else{
			$mensaje['error'] = 'No se pudo guardar correctamente la información';	
		}
		echo json_encode($mensaje);

	}

	public function obtenerRazonSocial(){
		$empresa_id = $this->input->post("empresa_id");
		$empresa = $this->NegocioVerde_model->getEmpresa2($empresa_id);
		echo json_encode($empresa);
	}

	public function obtenerRepresentante(){
		
		$representante_id = $this->input->post("representante_id");
		$representante = $this->NegocioVerde_model->getRepresentanteLegal($representante_id);
		echo json_encode($representante);
	}

	public function almacenarInformacionGeneral2(){
		//Definiendo zona horaria
		date_default_timezone_set('America/Bogota');
		//Mensaje ccreado por defecto
		$mensaje = array();
		$mensaje = array (
		    "error"=>-1,
		    "fase"=>"No se pudo guardar con exito el Negocio Verde."
		);
		//Obteniendo los datos enviados desde el formulario
		$persona = json_decode($this->input->post("persona"), true);
		$empresa = json_decode($this->input->post("empresa"), true);
		$asociacion = json_decode($this->input->post("asociacion"), true);
		//Creando la razon_social_id para el micrositio
		$razon_social_id = explode(" ", preg_replace('/\&(.)[^;]*;/', '\\1', htmlentities($empresa['razon_social'])));
		if(count($razon_social_id) > 2){
			$razon_social_id = $razon_social_id[0]."".substr($razon_social_id[1], 0,1)."".substr($razon_social_id[2], 0,1);
		}else{
			$razon_social_id = implode("", $razon_social_id);	
		}
		$empresa['razon_social_id'] = $razon_social_id;
		
		$img = array(
			"nombre"=> $empresa["razon_social"],
		);
		
		//Verificar por medio de las variables de sesi車n si el negocio ya fue creado y esta en proceso de actualizaci車n
		if(($this->session->has_userdata('Rempresa_id')) && ($this->session->has_userdata('Rpersona_id'))){	
			$this->NegocioVerde_model->actualizarPersona($this->session->userdata('Rpersona_id'), $persona);
			$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('Rempresa_id'), $empresa);
			$this->NegocioVerde_model->actualizarAsociacion($this->session->userdata('Rempresa_id'),$asociacion);
			$mensaje['error'] = 2;
			$mensaje['fase'] = 'Se actualiz車 correctamenta la informaci車n del Negocio Verde '.$empresa['razon_social'].".";
			if(isset($_FILES['archivo']['size'])){
				$archivo_prev = $this->NegocioVerde_model->getArchivo($this->session->userdata("Rempresa_id"));
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= 'empresa_id_'.$this->session->userdata('Rempresa_id');
		        $config['max_size']             = 6000;
		        $config['max_width']            = 3000;
		        $config['max_height']           = 3000;
		        //Se ejecuta la libreria para cargar la nueva imagen seg迆n la configuraci車n
		        $this->load->library('upload', $config);
		        //Se verifica si hubo falla cargando el archivo
		        if ( !$this->upload->do_upload('archivo'))
		        {
	               $error = array('error' => $this->upload->display_errors());
	               $mensaje['fase'] = 'Se actualiz車 correctamenta la informaci車n del Negocio Verde '.$empresa['razon_social'].", pero no se pudo cargar la imagen del negocio";
		        }
		        else //Si no hay falla en la carga del archivo
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //Directorio donde se almacena la imagen
	                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if(!empty($archivo_prev)){
	                	unlink("../public_html/".$archivo_prev->url);
						$this->NegocioVerde_model->actualizarImagen($img, $archivo_prev->id);
						$mensaje['fase'] = 'Se actualiz車 correctamenta la informaci車n del Negocio Verde '.$empresa['razon_social']."y se actualiz車 correctamente la imagen del negocio.";
	                }else{
	                	if($this->NegocioVerde_model->guardarImagen($img)){
	                	    $mensaje['fase'] = 'Se actualiz車 correctamenta la informaci車n del Negocio Verde '.$empresa['razon_social'].".Y se agrego el archivo imagen correspondiente al emprendimiento";
			        		$archivo_id = $this->NegocioVerde_model->lastID();
			        		//actualizar campo archivo_id en Empresa
			        		$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('Rempresa_id'), array('archivo_id'=>$archivo_id));
			        	}else{
			        	    $mensaje['fase'] = 'Se actualiz車 correctamenta la informaci車n del Negocio Verde '.$empresa['razon_social'].".No se pudo agregar correctamente la imagen";
			        	} 
	                }        
		        }
			}
		}
		elseif($this->NegocioVerde_model->guardarPersona($persona)){//Agregando un nuevo emprendimiento
		    //Creando la fecha de registrio y de retiro para el representante legal
		    $mensaje['error'] = 1;
		    $mensaje["fase"] = "Se guard車 con exito el representante legal";
			$fecha_registro = date('Y-m-d H:i:s');
			$fecha_retiro = date('Y-m-d', strtotime($fecha_registro.'+ 1 Year'));
			
			//Obteniendo el ID del ultimo registro agregado a la base de datos
			$representante_legal_id = $this->NegocioVerde_model->lastID();
			$this->session->set_userdata('Rpersona_id', $representante_legal_id);
			$contrasena = $this->encriptar($persona['identificacion']); 
			$usuario = array(
				'persona_id'=>$representante_legal_id,
				'contrasena'=>$contrasena,
				'rol_id'=>4,
				'fecha_registro'=>$fecha_registro,
				'fecha_retiro'=>$fecha_retiro,
				'estado'=>1
			);
			//Crear un usuario al representante legal
			$this->Usuarios_model->guardarUsuario($usuario);
			$usuario_id = $this->Usuarios_model->lastID();

			//Verificador que llena la informaci車n
			//$verificador_id = $this->session->userdata("usuario");
			//Si existe un usuario activo y no es un representante legal
			if($this->session->has_userdata("usuario") && ($this->session->has_userdata("rol") && $this->session->userdata("rol") != 4) ) $empresa['verificador_id'] = $this->session->userdata("usuario");
			$empresa['representante_legal_id'] = $representante_legal_id;
			//$empresa['verificador_id'] = $verificador_id;
			$empresa['informacion_general']	= 0;
			$empresa['informacion_as']	= 0;
			$empresa['verificacion1']	= 0;
			$empresa['verificacion2']	= 0;
			$empresa['plan_mejora']	= 0;
			$empresa['fecha_registro'] = $fecha_registro;
			
			//$empresa = array_merge($empresa, $representante_legal);
			if($this->NegocioVerde_model->guardarEmpresa($empresa)){
			    $mensaje["error"] = 1;
				//Obteniendo el ID del ultimo registro agregado a la base de datos
				//$empresa_id = $this->NegocioVerde_model->lastID();
				//Guardar informaci車n de check
				$this->session->set_userdata('Rempresa_id', $this->NegocioVerde_model->lastID());
				$this->NegocioVerde_model->guardarInformacionCheck(array("empresa_id"=>$this->session->userdata("Rempresa_id")));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($this->session->userdata("Rempresa_id"));
				$mensaje['progreso']=$progreso->progreso;
				$this->session->set_userdata('estado_emp', 1);
				$asociacion['empresa_id'] = $this->session->userdata('Rempresa_id');

				if($this->NegocioVerde_model->guardarAsociacion($asociacion)){
					$mensaje['empresa_id'] = $this->session->userdata('Rempresa_id');
					if($_FILES['archivo']['size']){
						//Subiendo el imagen
						$config['upload_path']          = './assets/archivo/';
						//echo base_url().'assets/';
				        $config['allowed_types']        = 'gif|jpg|png';
				        //Configurando el nuevo del archivo
				        $config['file_name']			= 'empresa_id_'.$this->session->userdata('Rempresa_id');
				        $config['max_size']             = 6000;
				        $config['max_width']            = 3000;
				        $config['max_height']           = 3000;
				        $this->load->library('upload', $config);
				        if ( !$this->upload->do_upload('archivo'))
				        {
			                $error = array('error' => $this->upload->display_errors());
			                $mensaje['fase'] = 'Error la imagen no se pudo cargar';
				        }
				        else
				        {
			                $data = array('upload_data' => $this->upload->data());
			                //var_dump($data);
			                //Directorio donde se almacena la imagen
			                $img['url'] = "assets/archivo/".$data['upload_data']['file_name'];
			                //Guardar el registro de la nueva imagen
			                if($this->NegocioVerde_model->guardarImagen($img)){
				        		$archivo_id = $this->NegocioVerde_model->lastID();
				        		//actualizar campo archivo_id en Empresa
				        		$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('Rempresa_id'), array('archivo_id'=>$archivo_id));
				        		$mensaje['error'] = 1;
				        	}else{
				        		$mensaje['fase'] = 'Error al intentar guardar la imagen. Lo dem芍s se almaceno correctamente';
				        	}      
				        }
				    }
				    $mensaje['fase']='Se guard車 correctamente la informaci車n del Negocio Verde '.$empresa['razon_social'];
				}else{
					$this->NegocioVerde_model->eliminar('usuarios', $usuario_id);
					$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
					$this->NegocioVerde_model->eliminar('empresa', $this->session->userdata('empresa_id'));
					$mensaje['error'] = -1;
					$mensaje['fase']='Error al intentar guardar la asociaci車n';
				}
			}else{
			    $this->NegocioVerde_model->eliminar('usuarios', $usuario_id);
				$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error al intentar registrar los datos de la empresa';
			}
		}
		else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se logr車 registrar correctamente la informaci車n general del negocio verde';
		}
		
		echo json_encode($mensaje);	
	}

	public function descripcionNegocio2(){
		$empresa_id = $this->session->userdata("Rempresa_id");
		date_default_timezone_set('America/Bogota');
		$fecha_registro = date("Y-m-d H:i:s");
		$descripcion = $this->input->post("descripcion");
		$descripcion['empresa_id'] = $empresa_id;
		$descripcion['fecha_registro'] = $fecha_registro;
		$mensaje = array('error' => 1);
		if($this->NegocioVerde_model->getNumRows("descripcion_empresa", $empresa_id)>0){
			if($this->NegocioVerde_model->actualizarRegistro("descripcion_empresa", $descripcion, $empresa_id)){
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('descripcion_check'=>1));
				$mensaje['fase'] = "Se actualiz車 correctamente la descripci車n del negocio.";
			}else{
				$mensaje['error'] = -1;
				$mensaje['fase'] = "No se pudo actualizar la informaci車n correctamente.";
			}
		}elseif($this->NegocioVerde_model->guardarDescripcion($descripcion)){
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('descripcion_check'=>1));
			$mensaje['fase'] = "Se guard車 correctamente la descripci車n del negocio.";
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = "No se pudo guardar la descripci車n del negocio.";
		}
		//Obteniendo el progreso de la Inscripci車n
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		//var_dump($progreso);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		echo json_encode($mensaje);
	}

	public function categoriaNegocio2(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		$categoria = $this->input->post("categoria");
		$mensaje = array('error' => 1);
		if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, $categoria)){
			$mensaje['fase'] = "Se actualiz車 correctamente el subsector del emprendimiento.";
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('categoria_check'=>1));
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = "No se pudo guardar la informaci車n del subsector del negocio/emprendimiento.";
		}
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		echo json_encode($mensaje);
	}

	public function informacionEmpresa2(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		$etapa_empresarial = $this->input->post("etapa_empresarial");
		$empresa_empleado_sexo = $this->input->post('empresa_empleado_sexo');
		$caracterizacion_vinculacion_empresa = $this->input->post('caracterizacion_vinculacion_empresa');
		$empresa_empleado_edad = $this->input->post('empresa_empleado_edad');
		$caracterizacion_empleado_educativo = $this->input->post('caracterizacion_empleado_educativo');
		$caracterizacion_demografia_empresa = $this->input->post('caracterizacion_demografia_empresa');
		$empresa_actividad = $this->input->post('empresa_actividad');
		$caracterizacion_empresa_bien_servicio = $this->input->post('caracterizacion_empresa_bien_servicio');
		$caracterizacion_empresa_bien_servicio_actualizar = $this->input->post('caracterizacion_empresa_bien_servicio_actualizar');
		$caracterizacion_organizacion_empresa = $this->input->post('caracterizacion_organizacion_empresa');
		$caracterizacion_organizacion_empresa[0]['empresa_id'] = $empresa_id;
		
		//Eliminando datos anteriores
		$this->NegocioVerde_model->eliminarRegistros('empresa_empleado_sexo', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('caracterizacion_vinculacion_empresa', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('empresa_empleado_edad', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('caracterizacion_empleado_educativo', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('caracterizacion_demografia_empresa', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('actividad_empresa', $empresa_id);
		//$this->NegocioVerde_model->eliminarRegistros('caracterizacion_empresa_bien_servicio', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('caracterizacion_organizacion_empresa', $empresa_id);

		$this->NegocioVerde_model->actualizarEtapaEmpresarial($empresa_id, $etapa_empresarial);
		if(!empty($empresa_empleado_sexo))$this->NegocioVerde_model->guardarRegistrosBatch('empresa_empleado_sexo', $empresa_empleado_sexo);
		if(!empty($caracterizacion_vinculacion_empresa))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_vinculacion_empresa', $caracterizacion_vinculacion_empresa);
		if(!empty($empresa_empleado_edad))$this->NegocioVerde_model->guardarRegistrosBatch('empresa_empleado_edad', $empresa_empleado_edad);
		if(!empty($caracterizacion_empleado_educativo))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_empleado_educativo', $caracterizacion_empleado_educativo);
		if(!empty($caracterizacion_demografia_empresa))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_demografia_empresa', $caracterizacion_demografia_empresa);
		if(!empty($empresa_actividad))$this->NegocioVerde_model->guardarRegistrosBatch('actividad_empresa', $empresa_actividad);
		if(!empty($caracterizacion_empresa_bien_servicio)) $this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_empresa_bien_servicio', $caracterizacion_empresa_bien_servicio);
		if(!empty($caracterizacion_empresa_bien_servicio_actualizar)) $this->NegocioVerde_model->actualizarRegistrosBienes('caracterizacion_empresa_bien_servicio', $caracterizacion_empresa_bien_servicio_actualizar);
		if(!empty($caracterizacion_organizacion_empresa))$this->NegocioVerde_model->guardarRegistro('caracterizacion_organizacion_empresa', $caracterizacion_organizacion_empresa[0]);
		$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresa_check'=>1));
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		$mensaje['error'] = 1;
		$mensaje["fase"] = "Se guard車 correctamente la informaci車n de bienes/servicios y empleados del negocio/emprendimiento verde.";
		echo json_encode($mensaje);

	}
	
	public function observacionGeneral2(){
		$empresa_id = $this->session->userdata('Rempresa_id');
		$observacion = $this->input->post('observacion');
		if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, $observacion)){
			$mensaje['error'] = 1;
			$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_general'=>1));
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('observacion_check'=>1));
			$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
			$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		}else{
			$mensaje['error'] = 'No se pudo guardar las observaciones del negocio verde';
		}
		echo json_encode($mensaje);
	}
	


}
