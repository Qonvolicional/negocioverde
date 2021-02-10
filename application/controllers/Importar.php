<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $this->session->userdata("admin"),
			);
			$this->load->model("Importar_model");
			$this->load->model("NegocioVerde_model");
			//Librerias
			$this->load->library('excel');
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}
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

	public function index(){
		//exec('rm ._*.xlsx');
		$path = "./aplicacion_criterio/";
		 // Creamos un puntero al directorio y obtenemos el listado de archivos
		$ficheros = scandir($path);
		//var_dump($ficheros);
		//if(preg_match('', subject))
		$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
		$cacheSettings = array( ' memoryCacheSize ' => '8MB');
		PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

		$inputFileType = PHPExcel_IOFactory::identify($path.$ficheros[10]);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$objReader->setLoadSheetsOnly( array("Formato Inscripción v.11") );

		$objPHPExcel = $objReader->load($path.$ficheros[10]);
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();

		$empresa = array();
		$persona = array();
		$usuario = array();
		$asociacion = array();
		$descripcion = array();
		$empresa_empleado_sexo = array();
		$caracterizacion_vinculacion_empresa = array();
		$empresa_empleado_edad = array();
		$caracterizacion_empleado_educativo = array();
		$caracterizacion_demografia_empresa = array();
		$actividad_empresa = array();
		$caracterizacion_organizacion_empresa = array();
		$verificador = array();
		$empresario = array();

		$empresa['tipo_persona_id'] = $this->Importar_model->getIdLike($sheet->getCell("J16")->getValue(),'tipo_persona')['id'];
		echo "Tipo de persona: ".$this->Importar_model->getIdLike($sheet->getCell("J16")->getValue(),'tipo_persona')['id']."<br>";
		$empresa['tipo_identificacion_id'] = $this->Importar_model->getIdLike($sheet->getCell("Z16")->getValue(),'tipo_identificacion')['id'];
		echo "Tipo de identificacion: ".$this->Importar_model->getIdLike($sheet->getCell("Z16")->getValue(),'tipo_identificacion')['id']."<br>";
		$empresa['identificacion'] = $sheet->getCell("AI16")->getValue();
		$persona['identificacion'] = $sheet->getCell("AI16")->getValue();
		$empresa['razon_social'] = $sheet->getCell("J17")->getValue();
		$nombre_completo = explode(' ',trim(" ".$sheet->getCell("J18")->getValue()));
		//var_dump($nombre_completo);
		$cantidad = count($nombre_completo);
		if($cantidad==4){
			$persona['nombre1'] = $nombre_completo[0];
			$persona['nombre2'] = $nombre_completo[1];
			$persona['apellido1'] = $nombre_completo[2];
			$persona['apellido2'] = $nombre_completo[3];
		}else if($cantidad==3){
			$persona['nombre1'] = $nombre_completo[0];
			$persona['apellido1'] = $nombre_completo[1];
			$persona['apellido2'] = $nombre_completo[2];
		}else if($cantidad==2){
			$persona['nombre1'] = $nombre_completo[0];
			$persona['apellido1'] = $nombre_completo[1];
		}else if($cantidad==1){
			$persona['nombre1'] = $nombre_completo[0];
		}
		if(isset($persona['nombre1'])){
			$persona['correo'] = $sheet->getCell("J19")->getValue();
			$telefonos = explode(',',trim($sheet->getCell("J20")->getValue()));
			if(count($telefonos)>=2){
				$persona['fijo'] = $telefonos[0];
				$persona['celular'] = $telefonos[1];
			}else if(count($telefonos)==1){
				$persona['fijo'] = $telefonos[0];
			}
		}
		$empresa['coordenada_n'] = $sheet->getCell("P23")->getValue();
		$empresa['coordenada_w'] = $sheet->getCell("AB23")->getValue();
		$empresa['vereda'] = $sheet->getCell("J22")->getValue();
		$empresa['altitud']= $sheet->getCell("AL23")->getValue();
		$empresa['autoridad_ambiental_id'] = $this->Importar_model->getIdLike($sheet->getCell("AI24")->getCalculatedValue(),'autoridad_ambiental')['id'];
		$empresa['area_predio'] = $sheet->getCell("J25")->getValue();
		$empresa['predio_unidad_medida'] = $this->Importar_model->getIdLike($sheet->getCell("R25")->getValue(),'predio_unidad')['id'];
		$empresa['pot_estado'] = $this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AH25")->getValue()),'si_no')['id'];
		$empresa['subsector_id'] = $this->Importar_model->getIdLike($sheet->getCell("AK41")->getCalculatedValue(),'subsector')['id'];
		$empresa['etapa_empresa_id'] = $this->Importar_model->getIdLike($sheet->getCell("J81")->getCalculatedValue(),'etapa_empresa')['id'];
		$empresa['observacion_general'] = $sheet->getCell("E105")->getValue();

		if($this->NegocioVerde_model->guardarPersona($persona)){//Agregando un nuevo emprendimiento
			$representante_legal_id = $this->NegocioVerde_model->lastID();
			date_default_timezone_set('America/Bogota');
			$fecha_registro = date('Y-m-d H:i:s');
			$fecha_retiro = date('Y-m-d', strtotime($fecha_registro.'+ 1 Year'));
			$usuario = array(
				'persona_id'=>$representante_legal_id,
				'contrasena'=>$this->encriptar($persona['identificacion']),
				'rol_id'=>4,
				'fecha_registro'=>$fecha_registro,
				'fecha_retiro'=>$fecha_retiro,
				'estado'=>1,
			);
			$empresa['representante_legal_id'] = $representante_legal_id;
			$empresa['informacion_general']	= 1;
			$empresa['informacion_as']	= 1;
			$empresa['verificacion1']	= 1;
			$empresa['verificacion2']	= 1;
			$empresa['plan_mejora']	= 1;
			$empresa['fecha_registro'] = $fecha_registro;
			if($this->NegocioVerde_model->guardarEmpresa($empresa)){
				$empresa_id = $this->NegocioVerde_model->lastID();
				$this->NegocioVerde_model->guardarInformacionCheck(array("empresa_id"=>$empresa_id,));
			}
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('categoria_check'=>1));
		}
		
		if(isset($empresa_id)){
			
			$empresa_asociacion = array(
				'empresa_id'=>$empresa_id,
				'tamanio_empresa_id'=>$this->Importar_model->getIdLike($sheet->getCell("AK27")->getValue(),'tamanio_empresa')['id'],
				'numero_asociados'=>$sheet->getCell("S27")->getValue(),
				'famiempresa_estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AA27")->getCalculatedValue()),'si_no')['id'],
				'asociacion_estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("I27")->getCalculatedValue()),'si_no')['id'],
				'fecha_registro'=>$fecha_registro,
			);
			$this->NegocioVerde_model->guardarAsociacion($empresa_asociacion);

			$descripcion['empresa_id'] = $empresa_id;
			$descripcion['descripcion_negocio'] = $sheet->getCell("E32")->getValue();
			$descripcion['caracteristica_ambiental'] = $sheet->getCell("E34")->getValue();

			if($this->NegocioVerde_model->getNumRows("descripcion_empresa", $empresa_id)==0){
				$this->NegocioVerde_model->guardarDescripcion($descripcion);
				$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('descripcion_check'=>1));
			}
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 1,
				'sexo_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("P49")->getValue())),
			);
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 1,
				'sexo_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("N49")->getValue())),
			);
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 2,
				'sexo_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("AI49")->getValue())),
			);
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 2,
				'sexo_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("AH49")->getValue())),
			);
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 3,
				'sexo_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("Z54")->getValue())),
			);
			$empresa_empleado_sexo[] = array(
				'empresa_id'=>$empresa_id,
				'socio_empleado_id' => 3,
				'sexo_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("X54")->getValue())),
			);
			//caracterización vinculación
			$caracterizacion_vinculacion_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'vinculacion_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("J59")->getValue())),
			);
			$caracterizacion_vinculacion_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'vinculacion_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("J60")->getValue())),
			);
			$caracterizacion_vinculacion_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'vinculacion_id' => 3,
				'cantidad' => intval(trim($sheet->getCell("J62")->getValue())),
			);

			//Caracterización de empleados por edad
			$empresa_empleado_edad[] = array(
				'empresa_id'=>$empresa_id,
				'rango_edad_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("AK59")->getValue())),
			);
			$empresa_empleado_edad[] = array(
				'empresa_id'=>$empresa_id,
				'rango_edad_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("AK60")->getValue())),
			);
			$empresa_empleado_edad[] = array(
				'empresa_id'=>$empresa_id,
				'rango_edad_id' => 3,
				'cantidad' => intval(trim($sheet->getCell("AK62")->getValue())),
			);

			//Caracterización de emplead por nivel educativo
			$caracterizacion_empleado_educativo[] = array(
				'empresa_id'=>$empresa_id,
				'nivel_id' => 1,
				'cantidad' => intval(trim($sheet->getCell("J66")->getValue())),
			);
			$caracterizacion_empleado_educativo[] = array(
				'empresa_id'=>$empresa_id,
				'nivel_id' => 2,
				'cantidad' => intval(trim($sheet->getCell("J67")->getValue())),
			);
			$caracterizacion_empleado_educativo[] = array(
				'empresa_id'=>$empresa_id,
				'nivel_id' => 3,
				'cantidad' => intval(trim($sheet->getCell("J68")->getValue())),
			);
			$caracterizacion_empleado_educativo[] = array(
				'empresa_id'=>$empresa_id,
				'nivel_id' => 4,
				'cantidad' => intval(trim($sheet->getCell("J69")->getValue())),
			);
			$caracterizacion_empleado_educativo[] = array(
				'empresa_id'=>$empresa_id,
				'nivel_id' => 5,
				'cantidad' => intval(trim($sheet->getCell("J70")->getValue())),
			);
			
			//CARACTERIZACIÓN DEMOGRAFICA DE LOS EMPLEADOS
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 1,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC66")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J66")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 2,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC67")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J67")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 3,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC68")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J68")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 4,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC69")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J69")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 5,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC70")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J70")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 6,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC71")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J69")->getValue())),
			);
			$caracterizacion_demografia_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'demografia_id' => 7,
				'estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("AC72")->getValue()),'si_no')['id'],
				'cantidad' => intval(trim($sheet->getCell("J70")->getValue())),
			);

			//Caracterización de actividad empresa
			$actividad_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'actividad_id' => 1,
				'confirmacion'=>(trim($sheet->getCell("X77")->getCalculatedValue())=='x')?1:0,
			);
			$actividad_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'actividad_id' => 2,
				'confirmacion'=>(trim($sheet->getCell("X78")->getCalculatedValue())=='x')?1:0,
			);
			$actividad_empresa[] = array(
				'empresa_id'=>$empresa_id,
				'actividad_id' => 3,
				'confirmacion'=>(trim($sheet->getCell("X79")->getCalculatedValue())=='x')?1:0,
			);
			$caracterizacion_empresa_bien_servicio = array();
			for ($i=77; $i <85 ; $i++) { 
				$nombre = trim($sheet->getCell("AG".$i)->getValue());
				if($nombre!=""){
					$caracterizacion_empresa_bien_servicio[] = array(
						'empresa_id'=>$empresa_id,
						'nombre' => $nombre,
						'lider_estado'=>0,
					);
				}
			}
			$nombre = trim($sheet->getCell("AG85")->getValue());
			if($nombre!=""){
				$caracterizacion_empresa_bien_servicio[] = array(
					'empresa_id'=>$empresa_id,
					'nombre' => $nombre,
					'lider_estado'=>1,
				);
			}
			$anio_registro = trim($sheet->getCell("AK87")->getValue());
			$anio_empresa = trim($sheet->getCell("AK88")->getValue());
			if($anio_registro!=0){
				if(!(strpos('meses', $anio_registro)===false)){
					$anio_registro = intval(str_replace('meses', '', $anio_registro));
				}else if(!(strpos('mes', $anio_registro)===false)){
					$anio_registro = intval(str_replace('mes', '', $anio_registro));
				}else if(!(strpos('año', $anio_registro)===false)){
					$anio_registro = intval(str_replace('año', '', $anio_registro))*12;
				}else if(!(strpos('años', $anio_registro)===false)){
					$anio_registro = intval(str_replace('años', '', $anio_registro))*12;
				}else{
					$anio_registro = intval($anio_registro)*12;
				}
			}else{
				$anio_registro=0;
			}
			
			if($anio_empresa!=""){
				if(!(strpos('meses', $anio_empresa)===false)){
					$anio_empresa = intval(str_replace('meses', '', $anio_empresa));
				}else if(!(strpos('mes', $anio_empresa)===false)){
					$anio_empresa = intval(str_replace('mes', '', $anio_empresa));
				}else if(!(strpos('año', $anio_empresa)===false)){
					$anio_empresa = intval(str_replace('año', '', $anio_empresa))*12;
				}else if(!(strpos('años', $anio_empresa)===false)){
					$anio_empresa = intval(str_replace('años', '', $anio_empresa))*12;
				}else{
					$anio_empresa = intval($anio_empresa)*12;
				}
			}else{
				$anio_empresa=0;
			}
			

			$caracterizacion_organizacion_empresa = array(
				'constitucion_legal_estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("X87")->getCalculatedValue()),'si_no')['id'],
				'opera_actualmente_estado'=>$this->Importar_model->getIdLike(str_replace('Í', 'i', $sheet->getCell("X88")->getCalculatedValue()),'si_no')['id'],
				'anio_funcionamiento_registro'=>$anio_registro,
				'anio_funcionamiento_empresa'=>$anio_empresa
			);


			$verificador = array();
			//Eliminando datos anteriores
			$this->NegocioVerde_model->eliminarRegistros('empresa_empleado_sexo', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('caracterizacion_vinculacion_empresa', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('empresa_empleado_edad', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('caracterizacion_empleado_educativo', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('caracterizacion_demografia_empresa', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('actividad_empresa', $empresa_id);
			$this->NegocioVerde_model->eliminarRegistros('caracterizacion_organizacion_empresa', $empresa_id);

			if(!empty($empresa_empleado_sexo))$this->NegocioVerde_model->guardarRegistrosBatch('empresa_empleado_sexo', $empresa_empleado_sexo);
			if(!empty($caracterizacion_vinculacion_empresa))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_vinculacion_empresa', $caracterizacion_vinculacion_empresa);
			if(!empty($empresa_empleado_edad))$this->NegocioVerde_model->guardarRegistrosBatch('empresa_empleado_edad', $empresa_empleado_edad);
			if(!empty($caracterizacion_empleado_educativo))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_empleado_educativo', $caracterizacion_empleado_educativo);
			if(!empty($caracterizacion_demografia_empresa))$this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_demografia_empresa', $caracterizacion_demografia_empresa);
			if(!empty($actividad_empresa))$this->NegocioVerde_model->guardarRegistrosBatch('actividad_empresa', $actividad_empresa);
			if(!empty($caracterizacion_empresa_bien_servicio)) $this->NegocioVerde_model->guardarRegistrosBatch('caracterizacion_empresa_bien_servicio', $caracterizacion_empresa_bien_servicio);
			if(!empty($caracterizacion_organizacion_empresa))$this->NegocioVerde_model->guardarRegistro('caracterizacion_organizacion_empresa', $caracterizacion_organizacion_empresa);
			$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresa_check'=>1));
			$progreso = $this->NegocioVerde_model->getProgresoInscripcion($empresa_id);

			$nombre_empresario = trim($sheet->getCell("AK94")->getValue());
			if($nombre_empresario!=""){
				$empresario = array(
					'nombre'=>$nombre_empresario,
					'identificacion'=>$sheet->getCell("AK95")->getValue(),
					'cargo'=>$sheet->getCell("AK97")->getValue(),
				);
				if($this->NegocioVerde_model->guardarEmpresario($empresario)){
					$empresario_id = $this->NegocioVerde_model->lastID();
					if($this->NegocioVerde_model->actualizarEmpresa($empresa_id, array('empresario_id'=>$empresario_id))){
						$this->NegocioVerde_model->actualizarInformacionCheck($empresa_id, array('empresario_check'=>1));
					}
				}
			}
		}
		var_dump($empresa, $persona, $usuario, $asociacion, $descripcion, $empresa_empleado_sexo, $empresa_empleado_edad, $caracterizacion_vinculacion_empresa, $caracterizacion_empleado_educativo, $caracterizacion_empresa_bien_servicio, $caracterizacion_demografia_empresa, $actividad_empresa, $caracterizacion_organizacion_empresa, $empresario);

		// echo "Numero de identificacion: ".$sheet->getCell("AI16")->getValue()."<br>";
		// echo "Nombre: ".$sheet->getCell("J17")->getValue()."<br>";
		// echo "Representante legal: ".$sheet->getCell("J18")->getValue()."<br>";
		// echo "Email: ".$sheet->getCell("J19")->getValue()."<br>";
		// echo "Telefono: ".$sheet->getCell("J20")->getValue()."<br>";
		// echo "Departamento: ".$this->Importar_model->getIdLike($sheet->getCell("J21")->getValue(),'departamento')['id']."<br>";
		// 	echo "Departamento: ".$this->Importar_model->getIdLike($sheet->getCell("AI21")->getValue(),'municipio')['id']."<br>";
		// echo "Vereda: ".$sheet->getCell("J22")->getValue()."<br>";
		// echo "Coordenada_n: ".$sheet->getCell("P23")->getValue()."<br>";
		// echo "Coordenada_w: ".$sheet->getCell("AB23")->getValue()."<br>";
		// echo "Altitud: ".$sheet->getCell("AL23")->getValue()."<br>";
		// echo "Region: ".$sheet->getCell("J24")->getCalculatedValue()."<br>";
		// echo "Autoridad: ".$sheet->getCell("AI24")->getCalculatedValue()."<br>";
		// echo "Area total: ".$sheet->getCell("J25")->getValue()."<br>";
		// echo "Escala: ".$sheet->getCell("R25")->getValue()."<br>";
		// echo "Predio POT: ".$sheet->getCell("AH25")->getValue()."<br>";
		// echo "Area total: ".$sheet->getCell("J25")->getValue()."<br>";
		// echo "Asociación: ".$sheet->getCell("I27")->getValue()."<br>";
		// echo "Numero Asociación: ".$sheet->getCell("S27")->getValue()."<br>";
		// echo "Famiempresa: ".$sheet->getCell("AA27")->getValue()."<br>";
		// echo "Tamaño de empresa: ".$sheet->getCell("AK27")->getValue()."<br>";
		// echo "Descripción del negocio: ".$sheet->getCell("E32")->getValue()."<br>";
		// echo "Caracteristica ambiental: ".$sheet->getCell("E34")->getValue()."<br>";
		// echo "Categoria: ".$sheet->getCell("E41")->getCalculatedValue()."<br>";
		// echo "Sector: ".$sheet->getCell("S41")->getCalculatedValue()."<br>";
		// echo "Subsector: ".$sheet->getCell("AK41")->getCalculatedValue()."<br>";
		// echo "Socio Femenino: ".$sheet->getCell("N49")->getValue()."<br>";
		// echo "Socio Masculino: ".$sheet->getCell("P49")->getValue()."<br>";
		// echo "Vinculado Femenino: ".$sheet->getCell("AH49")->getValue()."<br>";
		// echo "Vinculado Masculino: ".$sheet->getCell("AI49")->getValue()."<br>";
		// echo "Empleado Femenino: ".$sheet->getCell("X54")->getValue()."<br>";
		// echo "Empleado Masculino: ".$sheet->getCell("Z54")->getValue()."<br>";
		// echo "Empleado termino indefinido: ".$sheet->getCell("J59")->getValue()."<br>";
		// echo "Empleado termino definido: ".$sheet->getCell("J60")->getValue()."<br>";
		// echo "Empleado por Dias: ".$sheet->getCell("J62")->getValue()."<br>";
		// echo "Empleado Edad Categoria 1: ".$sheet->getCell("AK59")->getValue()."<br>";
		// echo "Empleado Edad Categoria 2: ".$sheet->getCell("AK60")->getValue()."<br>";
		// echo "Empleado Edad Categoria 3: ".$sheet->getCell("AK62")->getValue()."<br>";
		// echo "Nivel Educacion Cat1 : ".$sheet->getCell("J66")->getValue()."<br>";
		// echo "Nivel Educacion Cat2 : ".$sheet->getCell("J67")->getValue()."<br>";
		// echo "Nivel Educacion Cat3 : ".$sheet->getCell("J68")->getValue()."<br>";
		// echo "Nivel Educacion Cat4 : ".$sheet->getCell("J69")->getValue()."<br>";
		// echo "Nivel Educacion Cat5 : ".$sheet->getCell("J70")->getValue()."<br>";
		// echo "Nivel Educacion Cat6 : ".$sheet->getCell("J71")->getValue()."<br>";

		// echo "Condiciones especiales Cat1 : ".$sheet->getCell("AK66")->getValue()."<br>";
		// echo "Condiciones especiales Cat2 : ".$sheet->getCell("AK67")->getValue()."<br>";
		// echo "Condiciones especiales Cat3 : ".$sheet->getCell("AK68")->getValue()."<br>";
		// echo "Condiciones especiales Cat4 : ".$sheet->getCell("AK69")->getValue()."<br>";
		// echo "Condiciones especiales Cat5 : ".$sheet->getCell("AK70")->getValue()."<br>";
		// echo "Condiciones especiales Cat6 : ".$sheet->getCell("AK72")->getValue()."<br>";
		// echo "Condiciones especiales Cat7 : ".$sheet->getCell("AK73")->getValue()."<br>";

		// echo "Actividades realizadas Cat1 : ".$sheet->getCell("X77")->getCalculatedValue()."<br>";
		// echo "Actividades realizadas Cat2 : ".$sheet->getCell("X78")->getCalculatedValue()."<br>";
		// echo "Actividades realizadas Cat3 : ".$sheet->getCell("X79")->getCalculatedValue()."<br>";

		// echo "Etapa empresarial: ".$sheet->getCell("J81")->getCalculatedValue()."<br>";

		// echo "Bien o Servicio 1 : ".$sheet->getCell("AG77")->getValue()."<br>";
		// echo "Bien o Servicio 2 : ".$sheet->getCell("AG78")->getValue()."<br>";
		// echo "Bien o Servicio 3 : ".$sheet->getCell("AG79")->getValue()."<br>";
		// echo "Bien o Servicio 4 : ".$sheet->getCell("AG81")->getValue()."<br>";
		// echo "Bien o Servicio 5 : ".$sheet->getCell("AG82")->getValue()."<br>";
		// echo "Bien o Servicio 6 : ".$sheet->getCell("AG83")->getValue()."<br>";
		// echo "Bien o Servicio 7 : ".$sheet->getCell("AG84")->getValue()."<br>";
		// echo "Bien o Servicio Lider : ".$sheet->getCell("AG85")->getValue()."<br>";

		// echo "Organización  legalmente : ".$sheet->getCell("X87")->getCalculatedValue()."<br>";
		// echo "Organización  operando : ".$sheet->getCell("X88")->getCalculatedValue()."<br>";
		// echo "Organización  año funcionamiento: ".$sheet->getCell("AK87")->getValue()."<br>";
		// echo "Organización  año funcionamiento despues de registro: ".$sheet->getCell("AK88")->getValue()."<br>";

		// echo "Nombre de verificador: ".$sheet->getCell("M94")->getValue()."<br>";
		// echo "Entidad: ".$sheet->getCell("M95")->getValue()."<br>";
		// echo "Área: ".$sheet->getCell("M96")->getValue()."<br>";
		// echo "Cargo: ".$sheet->getCell("M97")->getValue()."<br>";

		// echo "Nombre de empresario: ".$sheet->getCell("AK94")->getValue()."<br>";
		// echo "Identificacion: ".$sheet->getCell("AK95")->getValue()."<br>";
		// echo "Empresa: ".$sheet->getCell("AK96")->getValue()."<br>";
		// echo "Cargo: ".$sheet->getCell("AK97")->getValue()."<br>";
		// echo "Observación general: ".$sheet->getCell("E105")->getValue()."<br>";
		//getCalculatedValue()echo "Asociación: ".$sheet->getCell("I27")->getValue()."<br>";
		// for ($row = 2; $row <= $highestRow; $row++){ 
		// 		echo $sheet->getCell("A".$row)->getValue()." - ";
		// 		echo $sheet->getCell("B".$row)->getValue()." - ";
		// 		echo $sheet->getCell("C".$row)->getValue();
		// 		echo "<br>";
		// }
	}

}

