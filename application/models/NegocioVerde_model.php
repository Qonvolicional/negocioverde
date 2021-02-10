<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NegocioVerde_model extends CI_Model {
	
	public function validarUnico($tabla, $condicion){
		$this->db->where($condicion);
		$resultado = $this->db->get($tabla);
		if($resultado->num_rows()>0){
			return $resultado->row();
		}else{
			return false;
		}
	}
	public function guardarImagen($data){
		return $this->db->insert('archivo', $data);
	}

	public function guardarCategoria($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('empresa', $data);
	}

	public function actualizarEtapaEmpresarial($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('empresa', $data);
	}

	public function guardarDescripcion($data){
		return $this->db->insert('descripcion_empresa', $data);
	}

	public function guardarEmpresario($data){
		return $this->db->insert('empresario', $data);
	}

	public function guardarEmpresa($data){
		return $this->db->insert('empresa', $data);
	}

	public function guardarPersona($datos){
		return $this->db->insert('persona', $datos);
	}

	public function guardarAsociacion($datos){
		return $this->db->insert("empresa_asociacion", $datos);
	}

	public function guardarInformacionCheck($data){
		return $this->db->insert("empresa_informacion_check", $data);
	}

	public function actualizarInformacionCheck($empresa_id, $data){
		$this->db->where("empresa_id", $empresa_id);
		return $this->db->update("empresa_informacion_check", $data);
	}

	public function actualizarProgresoFase($empresa_id, $data){
		$this->db->where("id", $empresa_id);
		return $this->db->update("empresa", $data);
	}


	public function getProgresoInscripcion($empresa_id){
		$this->db->select("(1 + descripcion_check + categoria_check + empresa_check + empresario_check + observacion_check)/6*100 as progreso");
		$this->db->where("empresa_id", $empresa_id);
		$resultado = $this->db->get("empresa_informacion_check");
		return $resultado->row();
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function getNumRows($tabla, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultado = $this->db->get($tabla);
		if($resultado->num_rows()>0){
			return $resultado->num_rows();
		}else{
			return 0;
		}
	}

	public function actualizarRegistro($tabla, $data, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		return $this->db->update($tabla, $data);
	}

	public function getEstado($empresa_id){
		$this->db->select("estado");
		$this->db->from("empresa");
		$this->db->where("id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getRegistros(){
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as, empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general = 1 OR empresa.informacion_as = 1), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja2, IF((empresa.verificacion2 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as mejora, IF((empresa.plan_mejora = 1 AND verificadorxempresa.estado = 1), 1, 0) as consolidado");
		$this->db->from("empresa");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id","LEFT");
		$this->db->group_by("empresa.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getRegistrosMunicipio($municipio_id){
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as, empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general = 1 OR empresa.informacion_as = 1), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja2, IF((empresa.verificacion2 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as mejora, IF((empresa.plan_mejora = 1 AND verificadorxempresa.estado = 1), 1, 0) as consolidado,, municipio.nombre as municipio");
		$this->db->from("empresa");
		$this->db->join("municipio", "municipio.id = empresa.municipio_id", "left");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id","LEFT");
		$this->db->where("municipio_id", $municipio_id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEmpresasResumen(){
		$this->db->select("id, razon_social");
		$this->db->from("empresa");
		//$this->db->where("plan_mejora", 1);
		$this->db->where("estado", 1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEmpresasPlanMejora(){
		$this->db->select("id, razon_social");
		$this->db->from("empresa");
		$this->db->where("plan_mejora", 1);
		$this->db->where("estado", 1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

    public function getRegistrosUsuarios($usuario_id, $persona_id){
        //$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as,  empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general=1 AND empresa.informacion_as = 0), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja2, IF( (empresa.verificacion2 = 1 AND verificadorxempresa.estado = 1), 1, 0) as mejora, IF( (empresa.plan_mejora = 1), 1, 0) as consolidado");
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as,  empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general=1), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja2, IF( (empresa.verificacion2 = 1 AND verificadorxempresa.estado = 1), 1, 0) as mejora, IF( (empresa.plan_mejora = 1), 1, 0) as consolidado");
		$this->db->from("empresa");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id AND verificadorxempresa.estado = 1","LEFT");
		$this->db->where("empresa.estado", 1);
		$this->db->where("verificador_id", $usuario_id);
		$this->db->or_where("representante_legal_id", $persona_id);	
		$this->db->or_where("verificadorxempresa.persona_id", $persona_id);	
		$resultados = $this->db->get();
		return $resultados->result();
	}

	 public function getRegistrosUsuariosMunicipio($usuario_id, $persona_id, $municipio_id){
        //$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as,  empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general=1 AND empresa.informacion_as = 0), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja2, IF( (empresa.verificacion2 = 1 AND verificadorxempresa.estado = 1), 1, 0) as mejora, IF( (empresa.plan_mejora = 1), 1, 0) as consolidado");
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as,  empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general=1), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja2, IF( (empresa.verificacion2 = 1 AND verificadorxempresa.estado = 1), 1, 0) as mejora, IF( (empresa.plan_mejora = 1), 1, 0) as consolidado");
		$this->db->from("empresa");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id AND verificadorxempresa.estado = 1","LEFT");
		$this->db->where("empresa.estado", 1);
		$this->db->where("empresa.municipio_id", $municipio_id);
		$this->db->where("verificador_id", $usuario_id);
		$this->db->or_where("representante_legal_id", $persona_id);	
		$this->db->or_where("verificadorxempresa.persona_id", $persona_id);	

		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	public function getPersona_id($usuario_id){
		$this->db->select("persona_id");
		$this->db->from("usuarios");
		$this->db->where("id", $usuario_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function actualizarRegistrosBienes($tabla, $data){
		$r = TRUE;
		foreach ($data as $d) {
			$this->db->where("id", $d["id"]);
			$aux = $this->db->update($tabla, $d);
			if(!$aux) $r = $aux;
		}
		return $r;
	}

	public function getEmpresa($empresa_id){
		$this->db->select('id, identificacion, razon_social, fecha_registro');
		$this->db->from('empresa');
		$this->db->where('id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresa2($empresa_id){
		$this->db->select('id, identificacion, razon_social, fecha_registro');
		$this->db->from('empresa');
		$this->db->where('id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getRepresentanteLegalEmpresa($empresa_id){
		$this->db->select('p.*');
		$this->db->from('empresa e');
		$this->db->join('persona p','e.representante_legal_id=p.id');
		$this->db->where('e.id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresarioEmpresa($empresa_id){
		$this->db->select('p.*');
		$this->db->from('empresa e');
		$this->db->join('empresario p','e.empresario_id=p.id');
		$this->db->where('e.id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getImagenEmpresa($empresa_id){
		$this->db->select('a.*');
		$this->db->from('empresa e');
		$this->db->join('archivo a','e.archivo_id=a.id');
		$this->db->where('e.id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getDocumentoEmpresa($empresa_id){
		$this->db->select('a.*');
		$this->db->from('empresa e');
		$this->db->join('archivo a','e.documento_consentimiento_id=a.id');
		$this->db->where('e.id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getRepresentanteLegal($representante_legal_id){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where('id', $representante_legal_id);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}
	
	public function actualizarWeb($empresa_id, $url_web){
		$this->db->set("url_web", $url_web);
		$this->db->where("id", $empresa_id);
		$this->db->update("empresa");
		return $this->db->affected_rows();
	}
	public function getInformacionGeneral($empresa_id){
		$this->db->select('*, empresa.id as empresa_id, municipio.id as municipio');
		$this->db->from('empresa');
		//$this->db->join("persona", "empresa.representante_legal_id=persona.id", "left");
		//$this->db->join("archivo", "empresa.archivo_id=archivo.id", "left");
		$this->db->join("municipio", "municipio.id=empresa.municipio_id");
		$this->db->join("departamento", "departamento.id=municipio.departamento_id");
		$this->db->where('empresa.id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getInformacionAsociacion($empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultado = $this->db->get("empresa_asociacion");
		return $resultado->row();
	}

	public function getInformacionDescripcion($empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultado = $this->db->get("descripcion_empresa");
		return $resultado->row();
	}

	public function getInformacionVerificador($persona_id){
		$this->db->select("CONCAT(persona.nombre1,' ',persona.nombre2,' ',persona.apellido1, ' ',persona.apellido2) as nombre_completo, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo, persona.celular, persona.correo");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id=persona.id");
		$this->db->join("cargo", "usuarios.cargo_id=cargo.id", "left");
		$this->db->join("entidad", "usuarios.entidad_id=entidad.id", "left");
		$this->db->join("area", "usuarios.area_id=area.id", "left");
		$this->db->where("usuarios.id", $persona_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getInformacionVerificador2($empresa_id){
		$this->db->select("CONCAT(persona.nombre1,' ',persona.nombre2,' ',persona.apellido1, ' ',persona.apellido2) as nombre_completo, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo, persona.celular, persona.correo");
		$this->db->from("empresa");
		$this->db->join("usuarios","usuarios.id=empresa.verificador_id");
		$this->db->join("persona", "usuarios.persona_id=persona.id");
		$this->db->join("cargo", "usuarios.cargo_id=cargo.id", "left");
		$this->db->join("entidad", "usuarios.entidad_id=entidad.id", "left");
		$this->db->join("area", "usuarios.area_id=area.id", "left");
		$this->db->where("empresa.id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	
	public function getInformacionSubsector($empresa_id){
		$this->db->select("subsector.id as subsector, sector.id as sector, categoria.id as categoria");
		$this->db->from("subsector");
		$this->db->join("empresa", "empresa.subsector_id=subsector.id");
		$this->db->join("sector", "subsector.sector_id = sector.id");
		$this->db->join("categoria", "categoria.id = sector.categoria_id");
		$this->db->where("empresa.id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresaServicios($empresa_id, $lider_estado){
		$this->db->where("empresa_id", $empresa_id);
		$this->db->where("lider_estado", $lider_estado);
		$resultados = $this->db->get('caracterizacion_empresa_bien_servicio');
		if($lider_estado==1){
			return $resultados->row();
		}else{
			return $resultados->result_array();
		}
		
	}

	public function getInformacionEmpresa($tabla, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultados = $this->db->get($tabla);
		return $resultados->result_array();
	}

	public function getInformacionEmpresaRow($tabla, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultados = $this->db->get($tabla);
		return $resultados->row();
	}

	public function getInformacionEmpresaSexo($sexo_id, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$this->db->where("sexo_id", $sexo_id);
		$resultados = $this->db->get('empresa_empleado_sexo');
		return $resultados->result_array();
	}

	public function getInformacionEmpresario($empresa_id){
		$this->db->select("empresario.id, empresario.identificacion, empresario.nombre, empresario.cargo");
		$this->db->from("empresario");
		$this->db->join("empresa", "empresa.empresario_id=empresario.id");
		$this->db->where("empresa.id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getOpcionesLike($like){
		$this->db->select('*');
		$this->db->from('opciones');
		$this->db->like('codigo', $like, 'after');
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEmpresasVerificador($usuario){
		$this->db->select('empresa.id,empresa.razon_social,empresa.identificacion');
		$this->db->from('verificadorxempresa');
		$this->db->join('empresa', 'empresa.id = verificadorxempresa.empresa_id');
		$this->db->where("verificadorxempresa.persona_id", $usuario);
		$this->db->where("informacion_as","no");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEmpresaVinculacion($empresa_id){
		$this->db->select("vinculacion_id, cantidad");
		$this->db->from("caracterizacion_vinculacion_empresa");
		$this->db->where("empresa_id", $empresa_id);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getOpciones($tabla, $orden="DESC"){
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->order_by('id', $orden);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getRegistrosCondicionados($tabla, $where){
		$this->db->from($tabla);
		$this->db->where($where);
		$resultados = $this->db->get();
		return $resultados->result(); 
	}

	public function actualizarEmpresa($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('empresa', $data);
	}

	public function actualizarPersona($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("persona", $data);
	}

	public function actualizarEmpresario($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("empresario", $data);
	}

	public function getArchivo($empresa_id){
		$this->db->select("archivo.id, archivo.url, archivo.nombre");
		$this->db->from("archivo");
		$this->db->join("empresa", "empresa.archivo_id=archivo.id");
		$resultado = $this->db->get();
		return $resultado->row();
	}
	
	public function getDocumentoConsentimiento($empresa_id){
		$this->db->select("archivo.id, archivo.url, archivo.nombre");
		$this->db->from("archivo");
		$this->db->join("empresa", "empresa.documento_consentimiento_id=archivo.id");
		$this->db->where("empresa.id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function actualizarImagen($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("archivo", $data);
	}

	public function actualizarAsociacion($id, $data){
		$this->db->where("empresa_id", $id);
		return $this->db->update("empresa_asociacion", $data);
	}

	public function eliminar($tabla, $id){
		$this->db->where('id', $id);
		return $this->db->delete($tabla);
	}

	public function eliminarRegistros($tabla, $id){
		$this->db->where("empresa_id", $id);
		return $this->db->delete($tabla);
	}

	public function guardarRegistrosBatch($tabla, $data){
		return $this->db->insert_batch($tabla, $data);
	}

	public function guardarRegistro($tabla, $data){
		return $this->db->insert($tabla, $data);
	}


	public function verificacion($empersa_id){

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "VIABILIDAD_ECONOMICA", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_viabilidad = $this->db->get();
		
		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "CONTRIBUCION_CONSERVACION", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_contribucion_conservacion = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "CICLO_VIDA", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_ciclo_vida = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "VIDA_UTIL", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_vida_util = $this->db->get();

	
		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "SUSTITUCION_MATERIALES", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_sustitucion_materiales = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "MATERIALES_RECICLADOS", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_materiales_reciclados = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "SOSTENIBLE_RECURSO", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_sostenible_recurso = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "RESPO_SOCIAL_EMPRESA", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_respon_social_empresa = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "RESPO_SOCIAL_VALOR", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_respon_social_valor = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "RESPO_SOCIAL_EXTERIOR", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_respon_social_exterior = $this->db->get();

		$this->db->select_avg("calificacion.nombre", "opcion_avg");
		$this->db->from("opciones");
		$this->db->join("hv2_verificacion", "hv2_verificacion.opciones_id = opciones.id");
		$this->db->join("calificacion", "hv2_verificacion.calificacion_id = calificacion.id");
		$this->db->like("codigo", "COMUNICACION_ATRIBUTOS", "after");
		$this->db->where("calificacion.id !=" ,4);
		$this->db->where("empresa_id" ,$empersa_id);
		$query_comunicacion = $this->db->get();

		return array('VIABILIDAD_ECONOMICA' => $query_viabilidad->row(),
					'CONTRIBUCION_CONSERVACION' => $query_contribucion_conservacion->row(),
					'CICLO_VIDA' => $query_ciclo_vida->row(),
					'VIDA_UTIL' => $query_vida_util->row(),
					'SUSTITUCION_MATERIALES' => $query_sustitucion_materiales->row(),
					'MATERIALES_RECICLADOS' => $query_materiales_reciclados->row(),
					'SOSTENIBLE_RECURSO' => $query_sostenible_recurso->row(),
					'RESPO_SOCIAL_EMPRESA' => $query_respon_social_empresa->row(),
					'RESPO_SOCIAL_VALOR' => $query_respon_social_valor->row(),
					'RESPO_SOCIAL_EXTERIOR' => $query_respon_social_exterior->row(),
					'COMUNICACION_ATRIBUTOS' => $query_comunicacion->row()
					);
	}

	public function getEmpresaRazonid($razon_id){
		$this->db->select('id, identificacion, puntaje, puntaje_adicional, razon_social, fecha_registro');
		$this->db->from('empresa');
		$this->db->where('razon_social_id', $razon_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresaDescripcion($empresa_id){
		$this->db->select('empresa.id, puntaje, puntaje_adicional, empresa.identificacion, razon_social, direccion_predio, empresa.fecha_registro, descripcion_negocio, caracteristica_ambiental, CONCAT_WS(" ", persona.nombre1, persona.nombre2, persona.apellido1, persona.apellido2) as empresario, municipio.nombre as municipio, persona.correo, persona.celular, archivo.url');
		$this->db->from('empresa');
		$this->db->join("descripcion_empresa", "descripcion_empresa.empresa_id = empresa.id", "right");
		$this->db->join("persona", "persona.id = empresa.empresario_id", "right");
		$this->db->join("municipio", "municipio.id = empresa.municipio_id", "right");
		$this->db->join("archivo", "archivo.id = empresa.archivo_id", "left");
		$this->db->where('razon_social_id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresaMunicipio($codigo_muncipio){
		$this->db->select("empresa.id, razon_social, razon_social_id, direccion_predio, fecha_registro, municipio.nombre");
		$this->db->from("empresa");
		$this->db->join("municipio", "municipio.id = empresa.municipio_id", "left");
		$this->db->where("municipio_id", $codigo_muncipio);
		$query = $this->db->get();
		return $query->result();
	}
	public function getEmpresaProductos($empresa_id){
		$this->db->select('id, bien_servicio');
		$this->db->from('sost_economica');
		$this->db->where('empresa_id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getEmpresaCaracteristicaProductos($empresa_id){
		$this->db->select('id, nombre as bien_servicio');
		$this->db->from('caracterizacion_empresa_bien_servicio');
		$this->db->where('empresa_id', $empresa_id);
		$resultado = $this->db->get();
		return $resultado->result();
	}
	
	public function getAdministrativos(){
	    $this->db->select('p.nombre1, p.correo');
	    $this->db->from('usuarios u');
	    $this->db->join('persona p', 'p.id=u.persona_id');
	    $this->db->where('u.estado', 1);
	    $this->db->where('u.rol_id',3);
	    $this->db->or_where('u.rol_id',5);
	    $resultados = $this->db->get();
	    return $resultados->result();
	}
	
	public function getActividades(){
		$resultados = $this->db->get("actividad");
		return $resultados->result();
	}
	
}