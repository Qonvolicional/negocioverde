<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NegocioVerde extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->has_userdata("login")){
			$this->load->model("NegocioVerde_model");
			$this->load->model("Reporte_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->verificador_id = $this->session->userdata("usuario");
			$admin = $this->session->userdata("admin");
			$this->moduloControlador = array(
				'modulos' => ($admin)?$this->Modulo_model->getModulos():$this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $admin,
			);
			$this->pathImagen = array(
				"assets/template/img/cabezote.png",
			);

			//Librerias
			$this->load->library('excel');
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}		
	}

	private function encriptar($clave){
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

	public function index(){
		$usuario_actual = $this->session->userdata("usuario");
		$persona_actual = $this->session->userdata("persona");
		$admin = $this->session->userdata("admin");
		if($this->session->has_userdata('empresa_id')){
			$this->session->unset_userdata('empresa_id');
			$this->session->unset_userdata('persona_id');
		}
		if($this->session->has_userdata("empresario_id")) $this->session->unset_userdata('empresario_id');
		$empresas = ($admin)?$this->NegocioVerde_model->getRegistros():$this->NegocioVerde_model->getRegistrosUsuarios($usuario_actual, $persona_actual);
		
		$data = array(
			'empresas' => $empresas,
			'admin' => $admin,
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/negocioVerde/lista", $data);
		$this->load->view("layouts/dashboard/footer");
	}

	public function gurlweb(){

		if(strlen($this->input->post("url_web")) < 5)
			echo json_encode(array("estado" => 3));

		if($this->NegocioVerde_model->actualizarWeb($this->input->post("empresa_id"), $this->input->post("url_web"))){
			echo json_encode( array("estado" => 1) );
		}else
			echo json_encode(array("estado" => 2));
	}

	public function negociosVerdesMunicipio($municipio_id){
		$usuario_actual = $this->session->userdata("usuario");
		$persona_actual = $this->session->userdata("persona");
		$admin = $this->session->userdata("admin");
		if($this->session->has_userdata('empresa_id')){
			$this->session->unset_userdata('empresa_id');
			$this->session->unset_userdata('persona_id');
		}
		if($this->session->has_userdata("empresario_id")) $this->session->unset_userdata('empresario_id');
		$empresas = ($admin)?$this->NegocioVerde_model->getRegistrosMunicipio($municipio_id):$this->NegocioVerde_model->getRegistrosUsuariosMunicipio($usuario_actual, $persona_actual, $municipio_id);
		
		$data = array(
			'empresas' => $empresas,
			'admin' => $admin,
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/negocioVerde/lista_municipio", $data);
		$this->load->view("layouts/dashboard/footer");
	}

	public function negocio()
	{
		
		$empresa_id = $_SERVER['SERVER_NAME'];
		$empresa_razon_id = explode(".", $empresa_id);
		$data = $this->NegocioVerde_model->getEmpresaRazonid($empresa_razon_id[0]);
		if(is_null($data)){
			var_dump($data);
			//redirect(base_url());
		}
		

		$empresa_producto = $this->NegocioVerde_model->getEmpresaProductos($empresa_razon_id[0]);
		$empresa = $this->NegocioVerde_model->getEmpresaDescripcion($empresa_razon_id[0]);
		$resultado=  verificar_negocio($empresa->puntaje, $empresa->puntaje_adicional);
		$color = verificar_negocio_color($empresa->puntaje, $empresa->puntaje_adicional);
		$empresa_imagen = is_null($empresa->url) ? "assets/template/img/logo1.png" : $empresa->url;
		if(count($empresa_producto) == 0)
			$empresa_producto = $this->NegocioVerde_model->getEmpresaCaracteristicaProductos($empresa->id);
		$data = array("empresa" => $empresa,
					"empresa_producto" => 	$empresa_producto,
					"resultado" => $resultado,
					"color" => $color,
					"empresa_imagen" => $empresa_imagen
					);
		$this->load->view("negocio/inicio", $data);
	}

	public function ver($empresa_id){
		$this->session->set_userdata("empresa_id", $empresa_id);
		$data = array(
			'informacionCheck' => $this->NegocioVerde_model->getInformacionEmpresa('empresa_informacion_check', $empresa_id),
			'anioVerificados' => $this->NegocioVerde_model->getInformacionEmpresa('anio_verificado_empresa', $empresa_id),
			'informacionGeneral' => $this->NegocioVerde_model->getInformacionGeneral($empresa_id),
			'informacionAsociacion' => $this->NegocioVerde_model->getInformacionAsociacion($empresa_id),
			'informacionDescripcion' => $this->NegocioVerde_model->getInformacionDescripcion($empresa_id),
			'informacionSubsector' => $this->NegocioVerde_model->getInformacionSubsector($empresa_id),
			'informacionEmpresario' => $this->NegocioVerde_model->getEmpresarioEmpresa($empresa_id),
			'informacionRepresentante' => $this->NegocioVerde_model->getRepresentanteLegalEmpresa($empresa_id),
			'informacionImagen' => $this->NegocioVerde_model->getImagenEmpresa($empresa_id),
			'informacionDocumento' => $this->NegocioVerde_model->getDocumentoEmpresa($empresa_id),
			'tipo_persona' => $this->NegocioVerde_model->getOpciones('tipo_persona'),
			'tipo_identificacion' => $this->NegocioVerde_model->getOpciones('tipo_identificacion'),
			'region' => $this->NegocioVerde_model->getRegistrosCondicionados('region', array('pais_id'=>1)),
			'municipio' => $this->NegocioVerde_model->getOpciones('municipio'),
			'departamento' => $this->NegocioVerde_model->getOpciones('departamento'),
			'autoridad_ambiental' => $this->NegocioVerde_model->getOpciones('autoridad_ambiental'),
			'afirmacion' => $this->NegocioVerde_model->getOpciones('si_no'),
			'cumple' => $this->NegocioVerde_model->getOpciones('cumple_nocumple'),
			'aplica' => $this->NegocioVerde_model->getOpciones('aplica_noaplica'),
			'desc_demografia' => $this->NegocioVerde_model->getOpciones('desc_demografia'),
			'etapa' => $this->NegocioVerde_model->getOpciones('etapa'),
			'etapa_empresa' => $this->NegocioVerde_model->getOpciones('etapa_empresa'),
			'tamanio_empresa' => $this->NegocioVerde_model->getOpciones('tamanio_empresa'),
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
			'categoria' => $this->NegocioVerde_model->getOpciones('categoria'),
			'sector' => $this->NegocioVerde_model->getOpciones('sector'),
			'subsector' => $this->NegocioVerde_model->getOpciones('subsector'),
			'empresaImpacto' => $this->NegocioVerde_model->getInformacionEmpresa('impacto_empresa', $empresa_id),
			'empresaConservacion' => $this->NegocioVerde_model->getInformacionEmpresa('conservacion', $empresa_id),
			'bienLider' => $this->NegocioVerde_model->getEmpresaServicios($empresa_id, 1),
			'empresaBienes' => $this->NegocioVerde_model->getEmpresaServicios($empresa_id, 0),
			'empresaActividades' => $this->NegocioVerde_model->getInformacionEmpresa('actividad_empresa', $empresa_id),
			'verificador' => $this->NegocioVerde_model->getInformacionVerificador2($empresa_id),
			'progreso' => $this->NegocioVerde_model->getProgresoInscripcion($empresa_id),
		);
		if(!empty($data['informacionRepresentante'])) $this->session->set_userdata("persona_id", $data['informacionRepresentante']->id);
		if(!empty($data['informacionEmpresario'])) $this->session->set_userdata("empresario_id", $data['informacionEmpresario']->id);
		

		$jquery = array('jquery' => 'formatoInscripcion2.js');
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/negocioVerde/ver", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	public function agregar(){
		if($this->session->has_userdata('empresa_id')){
			$this->session->unset_userdata('empresa_id');
			$this->session->unset_userdata('persona_id');
		}
		if($this->session->has_userdata("empresario_id")) $this->session->unset_userdata('empresario_id');

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
			'verificador' => $this->Usuarios_model->getVerificadorInformacion($this->verificador_id),
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
		);

		$jquery = array('jquery' => 'formatoInscripcion2.js');
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/negocioVerde/agrega", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
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
		$mensaje = array('error' => -1, 'fase' => 'No se logró registrar correctamente la información general del negocio verde.');
	
		if($this->session->has_userdata('empresa_id')){
		    //Verificar si se esta actualizando la información general	
			$empresa_id = $this->session->userdata('empresa_id');
			if($this->session->has_userdata('persona_id')){
				$this->NegocioVerde_model->actualizarPersona($this->session->userdata('persona_id'), $persona);
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
				$mensaje['representante_legal_id'] = $representante_legal_id;	
				$empresa['representante_legal_id'] = $representante_legal_id;

			}

			if($this->NegocioVerde_model->getNumRows('empresa_asociacion', $empresa_id)){
				$this->NegocioVerde_model->actualizarAsociacion($empresa_id,$asociacion);
			}else{
				$asociacion['empresa_id'] = $empresa_id;
				$this->NegocioVerde_model->guardarAsociacion($asociacion);
			}

			if($this->NegocioVerde_model->getNumRows('anio_verificado_empresa', $empresa_id)) $this->NegocioVerde_model->eliminarRegistros('anio_verificado_empresa', $empresa_id);

			if(!empty($anio_verificado)){
				foreach ($anio_verificado as $value ) {
					$anios_verificacion[] = array('empresa_id'=>$this->session->userdata('empresa_id'), 'anio'=>$value);
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
	                	//unlink("../public_html/".$archivo_prev->url);
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

			$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('empresa_id'), $empresa);

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
				$this->session->set_userdata('empresa_id', $empresa_id);
				$this->session->set_userdata('estado_emp', 1);
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
			        		$this->NegocioVerde_model->actualizarEmpresa($empresa_id, array('documento_consentimiento_id'=>$documento_id));
			        	}else{
			        		$mensaje['fase'] = 'Error al intentar guardar el documento. Lo demás se almaceno correctamente';
			        	}      
			        }
			    }else{
			        $guardoDoc = 2;
			    }

				if($this->NegocioVerde_model->guardarAsociacion($asociacion) && $guardoArc && $guardoDoc){
					if(!empty($anio_verificado)){
						foreach ($anio_verificado as $value ) {
							$anios_verificacion[] = array('empresa_id'=>$empresa_id, 'anio'=>$value);
						}
						$this->NegocioVerde_model->guardarRegistrosBatch('anio_verificado_empresa', $anios_verificacion);
					}
					
				    $mensajeEmprendimiento="Felicidades!
                    Te has registrado en nuestro programa de negocios verdes.
                    Próximamente te asignaremos un verificador que se encargará de explicarte claramente lo que son los negocios verdes y te realizará la respetiva aplicación y verificación de criterios para determinar el nivel de avance de tu iniciativa o emprendimiento verde.
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
    				//Guardar información de check
    				//
    				$this->NegocioVerde_model->guardarInformacionCheck(array("empresa_id"=>$empresa_id));
    				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
    				$mensaje['empresa_id'] = $empresa_id;
					$mensaje['representante_legal_id'] = $representante_legal_id;
    				$mensaje['progreso']=$progreso->progreso;
					$mensaje['error'] = 1;
				    $mensaje['fase']='Se guardó correctamente la información del Negocio Verde.';
				}else{
					$this->NegocioVerde_model->eliminar('usuarios', $usuario_id);
					$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
					$this->NegocioVerde_model->eliminar('empresa', $this->session->userdata('empresa_id'));
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
					$mensaje['fase']='Error al intentar guardar la asociación.';
				}
			}else{
				$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
				$mensaje['error'] = -1;
				$mensaje['fase'] = 'Error al intentar registrar los datos de la empresa.';
			}
		}
		else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = 'No se logró registrar correctamente la información general del negocio verde.';
		}
		
		echo json_encode($mensaje);
	}

	public function descripcionNegocio(){
		$empresa_id = $this->session->userdata("empresa_id");
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
		$empresa_id = $this->session->userdata('empresa_id');
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
		$empresa_id = $this->session->userdata('empresa_id');
		$impacto_ambiental = $this->input->post('impacto_ambiental');
		$conservacion = $this->input->post('conservacion');

		//Eliminando datos anteriores
		$this->NegocioVerde_model->eliminarRegistros('conservacion', $empresa_id);
		$this->NegocioVerde_model->eliminarRegistros('impacto_empresa', $empresa_id);
		//Guardando registros
		
		if(!empty($conservacion))$this->NegocioVerde_model->guardarRegistrosBatch('conservacion', $conservacion);
		if(!empty($impacto_ambiental))$this->NegocioVerde_model->guardarRegistrosBatch('impacto_empresa', $impacto_ambiental);
		$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresa_check'=>1));
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['fase'] = 'Se guardó/actualizó correctamente de los impactos ambientales positivos y buenas prácticas realizadas por el negocio verde.';
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		$mensaje['error'] = 1;

		echo json_encode($mensaje);

	}

	public function informacionVerificacion(){
		$empresa_id = $this->session->userdata('empresa_id');
		$empresario = $this->input->post('empresario');
		$mensaje = array();

		if($this->session->has_userdata("empresario_id")){
			if(!empty($empresario)){
				$this->NegocioVerde_model->actualizarEmpresario($this->session->empresario_id, $empresario);
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresario_check'=>1));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
				$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
				$mensaje['error'] = 1;
				$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_general'=>1, 'informacion_as'=>1,));
			}
		}elseif($this->NegocioVerde_model->guardarEmpresario($empresario)){
			$empresario_id = $this->NegocioVerde_model->lastID();
			$this->session->set_userdata("empresario_id", $empresario_id);
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
    
	public function almacenarInformacionGeneral2(){
		//Definiendo zona horaria
		date_default_timezone_set('America/Bogota');
		
		$persona = json_decode($this->input->post("persona"), true);
		$empresa = json_decode($this->input->post("empresa"), true);
		$asociacion = json_decode($this->input->post("asociacion"), true);
		$razon_social_id = explode(" ", preg_replace('/\&(.)[^;]*;/', '\\1', htmlentities($empresa['razon_social'])));
		if(count($razon_social_id) > 2){
			$razon_social_id = $razon_social_id[0]."".substr($razon_social_id[1], 0,1)."".substr($razon_social_id[2], 0,1);
		}else{
			$razon_social_id = implode("", $razon_social_id);	
		}
		$empresa['razon_social_id'] = str_replace(".","",$razon_social_id);
		
		$img = array(
					'nombre'=> $empresa['razon_social'],
				);
		$mensaje = array('error' => 1, 'fase' => 'No se logró registrar correctamente la información general del negocio verde');
		if(($this->session->has_userdata('empresa_id')) && ($this->session->has_userdata('persona_id'))){//Verificar si se esta actualizando la información general	
			$this->NegocioVerde_model->actualizarPersona($this->session->userdata('persona_id'), $persona);
			$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('empresa_id'), $empresa);
			$this->NegocioVerde_model->actualizarAsociacion($this->session->userdata('empresa_id'),$asociacion);
			$mensaje['error'] = 2;
			$mensaje['fase'] = 'La información se actualizo correctamente';
			if(isset($_FILES['archivo']['size'])){
				$archivo_prev = $this->NegocioVerde_model->getArchivo($this->session->userdata("empresa_id"));
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= 'empresa_id_'.$this->session->userdata('empresa_id');
		        $config['max_size']             = 6000;
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
	                	unlink("../public_html/".$archivo_prev->url);
						$this->NegocioVerde_model->actualizarImagen($img, $archivo_prev->id);
						$mensaje['fase'] = 'La información se actualizo correctamente. Actualizó correctamente su archivo imagen';
	                }else{
	                	if($this->NegocioVerde_model->guardarImagen($img)){
	                		$mensaje['fase'] = 'La información se actualizo correctamente. Y se agrego el archivo imagen correspondiente al emprendimiento';
			        		$archivo_id = $this->NegocioVerde_model->lastID();
			        		//actualizar campo archivo_id en Empresa
			        		$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('empresa_id'), array('archivo_id'=>$archivo_id));
			        	}else{
			        		$mensaje['fase'] = 'La información se actualizo correctamente. No se pudo agregar correctamente la imagen';
			        	} 
	                }        
		        }
			}
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
			$razon_social_id = $empresa['razon_social'];
			$razon_social_id	 = str_replace(".", " ", $razon_social);
			$razon_social_id = explode(" ", $razon_social);
			if(count($razon_social_id) > 2){
				$razon_social_id = $razon_social_id[0]."".substr($razon_social_id[1], 0,1)."".substr($razon_social_id[2], 0,1);
			}else{
				$razon_social_id = implode("", $razon_social_id);	
			}

			$empresa['representante_legal_id'] = $representante_legal_id;
			$empresa['verificador_id'] = $verificador_id;
			$empresa['razon_social_id'] = $razon_social_id;
			$empresa['informacion_general']	= 0;
			$empresa['informacion_as']	= 0;
			$empresa['verificacion1']	= 0;
			$empresa['verificacion2']	= 0;
			$empresa['plan_mejora']	= 0;
			$empresa['fecha_registro'] = $fecha_registro;
			
			//$empresa = array_merge($empresa, $representante_legal);
			if($this->NegocioVerde_model->guardarEmpresa($empresa)){
                $mensajeEmprendimiento="Felicidades!
            Te has registrado en nuestro programa de negocios verdes.
            Próximamente te asignaremos un verificador que se encargará de explicarte claramente lo que son los negocios verdes y te realizará la respetiva aplicación y verificación de criterios para determinar el nivel de avance de tu iniciativa o emprendimiento verde.
            Somos Ventanilla de Emprendimientos Verdes del Chocó.";
                
                
				if(trim($persona['correo'])){
				    $this->envioCorreo('Registro de emprendimiento verde', trim($persona['correo']), $mensajeEmprendimiento);
				}
				
				$administrativos = $this->NegocioVerde_model->getAdministrativos();
				
				if(!empty($administrativos)){
				    foreach($administrativos as $a){
				        if(trim($a->correo)){
				            $mensajeAdministrador = $a->nombre1.",
                Se creo un nuevo emprendimiento (".$empresa['razon social']."), la cual requiere que se le asigne un verificador que pueda explicarle claramente lo que son los negocios verdes y realizar respectivamente la aplicación y verificación de criterios para determinar el nivel de avance de la iniciativa o emprendimiento verde. Podrás asignar un verificador ingresando al módulo de Administrador de verificadores en la pestaña de asignación de aplicación de criterios. Somos ventanilla de emprendimientos verdes del Chocó";
				            $this->envioCorreo('Nuevo emprendimiento por asignar verificador', trim($a->correo), $mensajeAdministrador);
				        }
				    }
				}
				
				//Obteniendo el ID del ultimo registro agregado a la base de datos
				//$empresa_id = $this->NegocioVerde_model->lastID();
				//Guardar información de check
				$this->session->set_userdata('empresa_id', $this->NegocioVerde_model->lastID());
				$this->NegocioVerde_model->guardarInformacionCheck(array("empresa_id"=>$this->session->userdata("empresa_id")));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($this->session->userdata("empresa_id"));
				$mensaje['progreso']=$progreso->progreso;
				$this->session->set_userdata('estado_emp', 1);
				$asociacion['empresa_id'] = $this->session->userdata('empresa_id');

				if($this->NegocioVerde_model->guardarAsociacion($asociacion)){
					$mensaje['empresa_id'] = $this->session->userdata('empresa_id');
					if($_FILES['archivo']['size']){
						//Subiendo el imagen
						$config['upload_path']          = './assets/archivo/';
						//echo base_url().'assets/';
				        $config['allowed_types']        = 'gif|jpg|png';
				        //Configurando el nuevo del archivo
				        $config['file_name']			= 'empresa_id_'.$this->session->userdata('empresa_id');
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
				        		$this->NegocioVerde_model->actualizarEmpresa($this->session->userdata('empresa_id'), array('archivo_id'=>$archivo_id));
				        		$mensaje['error'] = 1;
				        	}else{
				        		$mensaje['fase'] = 'Error al intentar guardar la imagen. Lo demás se almaceno correctamente';
				        	}      
				        }
				    }
				    $mensaje['fase']='Se guardó correctamente la información del Negocio Verde';
				}else{
					$this->NegocioVerde_model->eliminar('usuarios', $usuario_id);
					$this->NegocioVerde_model->eliminar('persona', $representante_legal_id);
					$this->NegocioVerde_model->eliminar('empresa', $this->session->userdata('empresa_id'));
					$mensaje['error'] = -1;
					$mensaje['fase']='Error al intentar guardar la asociación';
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
			$mensaje['fase'] = 'No se logró registrar correctamente la información general del negocio verde';
		}
		echo json_encode($mensaje);	
	}

	public function descripcionNegocio2(){
		$empresa_id = $this->session->userdata("empresa_id");
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

	public function categoriaNegocio2(){
		$empresa_id = $this->session->userdata('empresa_id');
		$categoria = $this->input->post("categoria");
		$mensaje = array('error' => 1);
		if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, $categoria)){
			$mensaje['fase'] = "Se actualizó correctamente el subsector del emprendimiento";
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('categoria_check'=>1));
		}else{
			$mensaje['error'] = -1;
			$mensaje['fase'] = "No se pudo guardar correctamente la información";
		}
		$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
		$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		echo json_encode($mensaje);
	}

	public function informacionEmpresa2(){
		$empresa_id = $this->session->userdata('empresa_id');
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

		echo json_encode($mensaje);


	}

	public function informacionVerificacion2(){
		$empresa_id = $this->session->userdata('empresa_id');
		$empresario = $this->input->post('empresario');
		$mensaje = array();

		if($this->session->has_userdata("empresario_id")){
			if(!empty($empresario)){
				$this->NegocioVerde_model->actualizarEmpresario($this->session->empresario_id, $empresario);
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresario_check'=>1));
				$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
				$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
				$mensaje['error'] = 1;
			}
		}elseif($this->NegocioVerde_model->guardarEmpresario($empresario)){
			$empresario_id = $this->NegocioVerde_model->lastID();
			$this->session->set_userdata("empresario_id", $empresario_id);
			if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, array('empresario_id'=>$empresario_id))){
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

	public function observacionGeneral(){
		$empresa_id = $this->session->userdata('empresa_id');
		$observacion = $this->input->post('observacion');
		if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, $observacion)){
			$mensaje['error'] = 1;
			$this->NegocioVerde_model->actualizarProgresoFase($empresa_id, array('informacion_general'=>1));
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('observacion_check'=>1));
			$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);
			$mensaje['progreso'] =(!empty($progreso))?$progreso->progreso:0;
		}else{
			$mensaje['error'] = 'No se pudo guardar correctamente la información';
		}
		echo json_encode($mensaje);
	}
	
	private function cargarImagenExcel($url, $coordenada=NULL, $height = NULL, $width=NULL){
		$gdImage = imagecreatefrompng($url);
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Sample image');
		$objDrawing->setDescription('Sample image');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		if($coordenada) $objDrawing->setCoordinates($coordenada);
		if($height) $objDrawing->setHeight($height);
		if($width) $objDrawing->setWidth($width);
		return $objDrawing;
	}

	public function consolidado($empresa_id){

		$info = $this->Reporte_model->getPromedios($empresa_id);
		$colores = array(
			array('rgb' => '53833A'),//verde intenso - 0
			array('rgb' => '6FAE4A'),//verde semiintenso - 1
			array('rgb' => 'A6CF90'),//Verde suave - 2
			array('rgb' => 'D9D9D9'),//Gris suave - 3
			array('rgb' => 'FFFFFF'),//Blanco - 4
			array('rgb' => '000000'),//Negro - 5
			array('rgb' => 'F0A071'),//NARANJA - 6
			array('rgb' => 'B60004'),//ROJO - 7
		);

		$bordes = array(
			'b1' => array( 
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
						'color'=>$colores[2] 
					)
				)
			),
			'b2' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN
					)
				)
			),
			'b3' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[2]
					)
				)
			),
			'b4' => array(
				'borders' => array(
					'inside' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
						'color'=>$colores[5]
					)
				)
			),
			'b5' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[5]
					)
				)
			),
			'b6' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[5]
					)
				)
			),
			'b7' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
					)
				)
			),
			'b8' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[2]
					)
				)
			),
			'b9' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[1]
					)
				)
			),
		);

		$fills = array(
			'f1' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[0]
				)
			),
			'f2' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[1]
				)
			),
			'f3' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[2]
				)
			),
			'f4' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[3]
				)
			),
			'f5' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[6]
				)
			),
		);

		$fonts = array(
			'f1' => array(
				'font'=>array(//Titulos principales en blanco 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[5]
				)
			),
			'f2' => array(//Titulos principales en negro
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[4]
				)
			),
			'f3' => array(//Titulos secundarios
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
			'f4' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
			'f5' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[3]
				)
			),
			'f6' => array(
				'font'=>array(//Titulos principales en blanco 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[7]
				)
			),
		);

		$alignments = array(
			'a1' => array(
				'alignment'=>array(//Titulos principales
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				)
			),
			'a2' => array(
				'alignment'=>array(//Textos basicos
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
				)
			),
			'a3' => array(
				'alignment'=>array(//Textos basicos
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			),
			'a4' => array(
				'alignment'=>array(//Titulos principales
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				)
			),
			
		);

		$this->excel->getProperties()
		->setCreator($this->session->userdata("nombre"))
		->setTitle("Resumen")
		->setSubject("Negocios de emprendimientos verdes")
		->setDescription("Plan de mejora");
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Resumen');
		$fecha_descarga = date("Y-m-d H:i:s");
		$this->excel->getActiveSheet()->setCellValue('B2', 'Fecha de descarga: '.$fecha_descarga);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B2:E5');
		$this->excel->getActiveSheet()->setCellValue('F2', 'VERIFICACIONES DE NEGOCIOS VERDES');
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($fills['f1']);
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('F2:K5');
		$this->excel->getActiveSheet()->setCellValue('B6', 'F-00');
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B6:E7');
		$this->excel->getActiveSheet()->setCellValue('B8', 'Version: 1.2');
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B8:E8');
		$this->excel->getActiveSheet()->setCellValue('F6', 'PLAN DE MEJORA');
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('F6:Q8');
		$this->excel->getActiveSheet()->getStyle('B9')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->mergeCells('B9:Q9');
		$this->excel->getActiveSheet()->getStyle('B2:Q9')->applyFromArray($bordes['b1']);

		$this->excel->getActiveSheet()->setCellValue('B11', 'ESTA SERÁ LA VERSIÓN IMPRESA Y DIGITAL QUE DEBERÁ ENTREGARLE AL EMPRESARIO');
		//$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fonts['f6']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B11:Q12');
		$this->excel->getActiveSheet()->getStyle('B11:Q12')->applyFromArray($bordes['b6']);

		$this->excel->getActiveSheet()->setCellValue('B14', 'NOTA: Señor empresario, recuerde que esta es una HOJA RESUMEN de toda la información diligenciada, por tanto, si desea corroborar o saber información adicional, por favor remitase a la Ficha de Verificación original y diligenciada.');
		
		$this->excel->getActiveSheet()->getStyle('B14')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('B14')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B14:Q16');
		$this->excel->getActiveSheet()->getStyle('B14:Q16')->applyFromArray($bordes['b3']);

		$this->excel->getActiveSheet()->setCellValue('B18', 'I. Información General');
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B18:C18');
		$this->excel->getActiveSheet()->getStyle('B18:C18')->applyFromArray($bordes['b3']);

		$this->excel->getActiveSheet()->setCellValue('N18', 'Año de verificación');
		$this->excel->getActiveSheet()->getStyle('N18')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('N18')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('N18:O18');
		$this->excel->getActiveSheet()->setCellValue('P18', '2019');
		$this->excel->getActiveSheet()->getStyle('P18')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('P18')->applyFromArray($alignments['a3']);
		$this->excel->getActiveSheet()->mergeCells('P18:Q18');
		$this->excel->getActiveSheet()->getStyle('N18:Q18')->applyFromArray($bordes['b6']);

		//INFORMACIÓN GENERAL
		$this->excel->getActiveSheet()->setCellValue('B20', 'Nombre o razón social:');
		$this->excel->getActiveSheet()->mergeCells('B20:C20');
		$this->excel->getActiveSheet()->setCellValue('D20', $info['empresa']['razon_social']);
		$this->excel->getActiveSheet()->mergeCells('D20:Q20');

		$this->excel->getActiveSheet()->setCellValue('B21', 'E-mail:');
		$this->excel->getActiveSheet()->mergeCells('B21:C21');
		$this->excel->getActiveSheet()->setCellValue('D21', $info['empresa']['correo']);
		$this->excel->getActiveSheet()->mergeCells('D21:Q21');

		$this->excel->getActiveSheet()->setCellValue('B22', 'Departamento:');
		$this->excel->getActiveSheet()->mergeCells('B22:C22');
		$this->excel->getActiveSheet()->setCellValue('D22', $info['empresa']['departamento']);
		$this->excel->getActiveSheet()->mergeCells('D22:Q22');

		$this->excel->getActiveSheet()->setCellValue('B23', 'Autoridad Ambiental:');
		$this->excel->getActiveSheet()->mergeCells('B23:C23');
		$this->excel->getActiveSheet()->setCellValue('D23', $info['empresa']['autoridad']);
		$this->excel->getActiveSheet()->mergeCells('D23:Q23');

		$this->excel->getActiveSheet()->setCellValue('B24', 'Nombre Representante Legal');
		$this->excel->getActiveSheet()->mergeCells('B24:C24');
		$this->excel->getActiveSheet()->setCellValue('D24', $info['empresa']['representante']);
		$this->excel->getActiveSheet()->mergeCells('D24:Q24');

		$this->excel->getActiveSheet()->setCellValue('B25', 'Número de Identificación/NIT:');
		$this->excel->getActiveSheet()->mergeCells('B25:C25');
		$this->excel->getActiveSheet()->setCellValue('D25', $info['empresa']['nit']);
		$this->excel->getActiveSheet()->mergeCells('D25:Q25');

		$this->excel->getActiveSheet()->setCellValue('B26', 'Celular:');
		$this->excel->getActiveSheet()->mergeCells('B26:C26');
		$this->excel->getActiveSheet()->setCellValue('D26', $info['empresa']['fijo'].", ".$info['empresa']['celular']);
		$this->excel->getActiveSheet()->mergeCells('D26:Q26');

		$this->excel->getActiveSheet()->setCellValue('B27', 'Municipio:');
		$this->excel->getActiveSheet()->mergeCells('B27:C27');
		$this->excel->getActiveSheet()->setCellValue('D27', $info['empresa']['municipio']);
		$this->excel->getActiveSheet()->mergeCells('D27:Q27');

		$this->excel->getActiveSheet()->setCellValue('B28', 'Dirección de correspondencia:');
		$this->excel->getActiveSheet()->mergeCells('B28:C28');
		$this->excel->getActiveSheet()->setCellValue('D28', $info['empresa']['direccion']);
		$this->excel->getActiveSheet()->mergeCells('D28:Q28');

		$this->excel->getActiveSheet()->setCellValue('B29', 'Nombre de Verificador:');
		$this->excel->getActiveSheet()->mergeCells('B29:C29');
		$this->excel->getActiveSheet()->setCellValue('D29', $info['empresa']['verificador']);
		$this->excel->getActiveSheet()->mergeCells('D29:M29');
		$this->excel->getActiveSheet()->setCellValue('N29', 'OPERADOR');
		$this->excel->getActiveSheet()->setCellValue('O29', 'UT Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('O29:Q29');
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('D20:Q29')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('D20:Q29')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B20:Q31')->applyFromArray($bordes['b7']);

		//DESCRIPCION
		$this->excel->getActiveSheet()->setCellValue('B30', 'Descripción del negocio');
		$this->excel->getActiveSheet()->mergeCells('B30:D30');
		$this->excel->getActiveSheet()->setCellValue('E30', $info['empresa']['descripcion_negocio']);
		$this->excel->getActiveSheet()->mergeCells('E30:Q30');
		$this->excel->getActiveSheet()->setCellValue('B31', 'Características ambientales del negocio');
		$this->excel->getActiveSheet()->mergeCells('B31:D31');
		$this->excel->getActiveSheet()->setCellValue('E31', $info['empresa']['caracteristica_ambiental']);
		$this->excel->getActiveSheet()->mergeCells('E31:Q31');
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($alignments['a4']);

		$this->excel->getActiveSheet()->getStyle('E30:Q31')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('E30:Q31')->applyFromArray($alignments['a2']);


		//CATEGORIA
		$this->excel->getActiveSheet()->setCellValue('B32', 'Categoría');
		$this->excel->getActiveSheet()->mergeCells('B32:F32');
		$this->excel->getActiveSheet()->setCellValue('B33', $info['empresa']['categoria']);
		$this->excel->getActiveSheet()->mergeCells('B33:F33');
		$this->excel->getActiveSheet()->setCellValue('G32', 'Sector');
		$this->excel->getActiveSheet()->mergeCells('G32:L32');
		$this->excel->getActiveSheet()->setCellValue('G33', $info['empresa']['sector']);
		$this->excel->getActiveSheet()->mergeCells('G33:L33');
		$this->excel->getActiveSheet()->setCellValue('M32', 'Subsector');
		$this->excel->getActiveSheet()->mergeCells('M32:Q32');
		$this->excel->getActiveSheet()->setCellValue('M33', $info['empresa']['subsector']);
		$this->excel->getActiveSheet()->mergeCells('M33:Q33');
		//estilos
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($bordes['b9']);

		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($bordes['b6']);

		//BIEN LIDER
		$this->excel->getActiveSheet()->setCellValue('B35', 'Bien o servicio líder');
		$this->excel->getActiveSheet()->mergeCells('B35:D35');
		$this->excel->getActiveSheet()->setCellValue('E35', $info['empresa']['bien_lider']);
		$this->excel->getActiveSheet()->mergeCells('E35:Q35');
		//estilos
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($alignments['a4']);

		$this->excel->getActiveSheet()->getStyle('E35:Q35')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('E35:Q35')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B35:Q35')->applyFromArray($bordes['b7']);
		
		//RESULTADOS DE VERIFICACION
		$this->excel->getActiveSheet()->setCellValue('B37', 'II. Resultados de verificación');
		$this->excel->getActiveSheet()->mergeCells('B37:E37');
		$this->excel->getActiveSheet()->getStyle('B37:E37')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B37:E37')->applyFromArray($fonts['f2']);
		//TITULO 1
		$this->excel->getActiveSheet()->setCellValue('B39', 'Resultado Nivel 1. Criterios de Cumplimiento de Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('B39:H39');
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B40', 'Criterio');
		$this->excel->getActiveSheet()->mergeCells('B40:G40');
		$this->excel->getActiveSheet()->setCellValue('H40', 'Promedio');
		$this->excel->getActiveSheet()->setCellValue('B41', 'Viabilidad económica del Negocio:');
		$this->excel->getActiveSheet()->mergeCells('B41:G41');
		$this->excel->getActiveSheet()->setCellValue('H41', $info['p1'][0]);
		$this->excel->getActiveSheet()->setCellValue('B42', 'Impacto Ambiental Positivo  y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('B42:G42');
		$this->excel->getActiveSheet()->setCellValue('H42', $info['p1'][1]);
		$this->excel->getActiveSheet()->setCellValue('B43', 'Enfoque ciclo de vida del bien o servicio');
		$this->excel->getActiveSheet()->mergeCells('B43:G43');
		$this->excel->getActiveSheet()->setCellValue('H43', $info['p1'][2]);
		$this->excel->getActiveSheet()->setCellValue('B44', 'Vida útil');
		$this->excel->getActiveSheet()->mergeCells('B44:G44');
		$this->excel->getActiveSheet()->setCellValue('H44', $info['p1'][3]);
		$this->excel->getActiveSheet()->setCellValue('B45', 'Sustitución de sustancias o materiales peligrosos');
		$this->excel->getActiveSheet()->mergeCells('B45:G45');
		$this->excel->getActiveSheet()->setCellValue('H45', $info['p1'][4]);
		$this->excel->getActiveSheet()->setCellValue('B46', 'Reciclabilidad y/o uso de materiales reciclados');
		$this->excel->getActiveSheet()->mergeCells('B46:G46');
		$this->excel->getActiveSheet()->setCellValue('H46', $info['p1'][5]);
		$this->excel->getActiveSheet()->setCellValue('B47', 'Uso eficiente y sostenible de recursos para la producción de bienes o servicios');
		$this->excel->getActiveSheet()->mergeCells('B47:G47');
		$this->excel->getActiveSheet()->setCellValue('H47', $info['p1'][6]);
		$this->excel->getActiveSheet()->setCellValue('B48', 'Responsabilidad social al interior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B48:G48');
		$this->excel->getActiveSheet()->setCellValue('H48', $info['p1'][7]);
		$this->excel->getActiveSheet()->setCellValue('B49', 'Responsabilidad social en la cadena de valor de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B49:G49');
		$this->excel->getActiveSheet()->setCellValue('H49', $info['p1'][8]);
		$this->excel->getActiveSheet()->setCellValue('B50', 'Responsabilidad social al exterior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B50:G50');
		$this->excel->getActiveSheet()->setCellValue('H50', $info['p1'][9]);
		$this->excel->getActiveSheet()->setCellValue('B51', 'Comunicación de atributos del bien y servicio');
		$this->excel->getActiveSheet()->mergeCells('B51:G51');
		$this->excel->getActiveSheet()->setCellValue('H51', $info['p1'][10]);
		$this->excel->getActiveSheet()->setCellValue('B52', 'Puntaje Total');
		$this->excel->getActiveSheet()->mergeCells('B52:G52');
		$this->excel->getActiveSheet()->setCellValue('H52', $info['promTotal1']);
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($fills['f5']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($fonts['f6']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->getStyle('B39:H61')->applyFromArray($bordes['b9']);
		$this->excel->getActiveSheet()->getStyle('B39:H61')->applyFromArray($bordes['b4']);

		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle("H41:H52")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getStyle("H55:H57")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getStyle("H59:H60")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getRowDimension('30')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('31')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('65')->setRowHeight(50);
		$this->excel->getActiveSheet()->getRowDimension('69')->setRowHeight(50);
		$this->excel->getActiveSheet()->getRowDimension('73')->setRowHeight(50);
		//TITULO 2
		$this->excel->getActiveSheet()->setCellValue('B53', 'Resultado Nivel 2. Criterios Adicionales (ideales) Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('B53:H53');
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B54', 'Criterio');
		$this->excel->getActiveSheet()->mergeCells('B54:G54');
		$this->excel->getActiveSheet()->setCellValue('H54', 'Promedio');
		$this->excel->getActiveSheet()->setCellValue('B55', 'Esquemas, programas o reconocimientos implementados o recibidos:');
		$this->excel->getActiveSheet()->mergeCells('B55:G55');
		$this->excel->getActiveSheet()->setCellValue('H55', $info['p2'][0]);
		$this->excel->getActiveSheet()->setCellValue('B56', 'Responsabilidad social al interior de la empresa adicional:');
		$this->excel->getActiveSheet()->mergeCells('B56:G56');
		$this->excel->getActiveSheet()->setCellValue('H56', $info['p2'][1]);
		$this->excel->getActiveSheet()->setCellValue('B57', 'Puntaje Total');
		$this->excel->getActiveSheet()->mergeCells('B57:G57');
		$this->excel->getActiveSheet()->setCellValue('H57', $info['promTotal2']);
		//TITULO 3
		$this->excel->getActiveSheet()->setCellValue('B58', 'Resultado Nivel 1+ Nivel 2');
		$this->excel->getActiveSheet()->mergeCells('B58:H58');
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B59', 'Puntaje Total. Criterios Adicionales (ideales) Negocios Verdes:');
		$this->excel->getActiveSheet()->mergeCells('B59:G59');
		$this->excel->getActiveSheet()->setCellValue('H59', $info['promTotal1']);
		$this->excel->getActiveSheet()->setCellValue('B60', 'Impacto Ambiental Positivo  y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('B60:G60');
		$this->excel->getActiveSheet()->setCellValue('H60', $info['promTotal2']);
		$this->excel->getActiveSheet()->setCellValue('B61', 'Resultado');
		$this->excel->getActiveSheet()->setCellValue('C61', $info['nivelEmpresa']);
		$this->excel->getActiveSheet()->mergeCells('C61:H61');
		//RECOMENDACIÓN COMPONENTE ECONOMICO
		$this->excel->getActiveSheet()->setCellValue('B63', 'III. RECOMENDACIONES COMPONENTE ECONÓMICO');
		$this->excel->getActiveSheet()->mergeCells('B63:F63');
		$this->excel->getActiveSheet()->getStyle('B63:F63')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B63:F63')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B65', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B65:Q65');

		$this->excel->getActiveSheet()->setCellValue('B67', 'IV. RECOMENDACIONES COMPONENTE AMBIENTAL');
		$this->excel->getActiveSheet()->mergeCells('B67:F67');
		$this->excel->getActiveSheet()->getStyle('B67:F67')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B67:F67')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B69', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B69:Q69');

		$this->excel->getActiveSheet()->setCellValue('B71', 'V. RECOMENDACIONES COMPONENTE SOCIAL');
		$this->excel->getActiveSheet()->mergeCells('B71:F71');
		$this->excel->getActiveSheet()->getStyle('B71:F71')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B71:F71')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B73', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B73:Q73');


		$dataSeriesLabels = array(
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$41', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$42', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$43', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$44', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$45', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$46', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$47', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$48', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$49', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$50', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$51', NULL, 1),	//	2010
		);
		//	Set the X-Axis Labels
		//		Datatype
		//		Cell reference for data
		//		Format Code
		//		Number of datapoints in series
		//		Data values
		//		Data Marker
		$xAxisTickValues = array(
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$39', NULL, 1),	//	Q1 to Q4
		);
		//	Set the Data values for each data series we want to plot
		//		Datatype
		//		Cell reference for data
		//		Format Code
		//		Number of datapoints in series
		//		Data values
		//		Data Marker
		$dataSeriesValues = array(
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$41', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$42', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$43', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$44', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$45', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$46', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$47', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$48', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$49', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$50', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$51', NULL, 1),	//	2010
		);
		//	Build the dataseries
		$series = new PHPExcel_Chart_DataSeries(
			PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
			PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
			range(0, count($dataSeriesValues)-1),			// plotOrder
			$dataSeriesLabels,								// plotLabel
			$xAxisTickValues,								// plotCategory
			$dataSeriesValues								// plotValues
		);
		//	Set additional dataseries parameters
		//		Make it a vertical column rather than a horizontal bar graph
		$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
		//	Set the series in the plot area
		$plotArea = new PHPExcel_Chart_PlotArea(NULL, array($series));
		//	Set the chart legend
		$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
		$title = new PHPExcel_Chart_Title('RESULTADOS NIVEL 1');
		$yAxisLabel = new PHPExcel_Chart_Title('Porcentaje (%)');
		//	Create the chart
		$chart = new PHPExcel_Chart(
			'chart1',		// name
			$title,			// title
			$legend,		// legend
			$plotArea,		// plotArea
			true,			// plotVisibleOnly
			0,				// displayBlanksAs
			NULL,			// xAxisLabel
			$yAxisLabel		// yAxisLabel
		);
		//	Set the position where the chart should appear in the worksheet
		$chart->setTopLeftPosition('J39');
		$chart->setBottomRightPosition('W61');
		//	Add the chart to the worksheet
		$this->excel->getActiveSheet()->addChart($chart);

		$path = $this->pathImagen[0];
		$objDrawing = $this->cargarImagenExcel($path, 'L2', 80);
		$objDrawing->setWorksheet($this->excel->getActiveSheet());

		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="resumen_'.$info['empresa']['razon_social'].'.xlsx"');
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        // Forzamos a la descarga
        $objWriter->save('php://output');

	}

}