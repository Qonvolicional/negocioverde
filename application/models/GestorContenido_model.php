<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestorContenido_model extends CI_Model {
	
	//** PublicaciÃ³n **//
	public function getPublicaciones(){
		$this->db->select("c.id, c.nombre, c.descripcion, DATE_FORMAT(c.fecha_creacion,'%d - %b - %Y a las %h:%i:%s ') AS fecha_creacion, c.estado, t.nombre as tipo_publicacion, t.icono");
		$this->db->from("cms_publicacion c");
		$this->db->join("cms_tipo_publicacion t", "t.id=c.cms_tipo_publicacion_id", "left");
		$this->db->order_by("c.fecha_creacion","DESC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	/* Modificaciones*/
    //** Publicaci¨®n **//

	public function getObras(){
		$this->db->select("o.id, o.nombre, o.sinopsi, DATE_FORMAT(o.fecha_modificacion,'%d - %b - %Y a las %h:%i:%s ') AS fecha_modificacion, o.estado, t.nombre as tipo_obra");
		$this->db->from("obras o");
		$this->db->join("tipo_obra t", "t.id=o.tipo_obra_id", "left");
		$this->db->order_by("o.fecha_modificacion","DESC");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getLastOrdenMenu($menu_id){
		$this->db->select("max(orden) as orden");
		$this->db->where("cms_menu_id", $menu_id);
		$resultado = $this->db->get("cms_menu_contenido");
		return $resultado->row();

	}
	public function getPublicacionRecursos($publicacion_id, $tipo_recurso){
		$this->db->where("cms_publicacion_id", $publicacion_id);
		$this->db->where("tipo_recurso_id", $tipo_recurso);
		$resultados = $this->db->get("cms_publicacion_recurso");
		return $resultados->result();
	}

	public function getMenusPublicacion($publicacion_id){
		$this->db->where("cms_publicacion_id", $publicacion_id);
		$resultados = $this->db->get("cms_menu_contenido");
		return $resultados->result();
	}

	public function deleteRecursosPublicacion($cms_publicacion_id, $tipo_recurso_id){
		$this->db->where("cms_publicacion_id", $cms_publicacion_id);
		$this->db->where("tipo_recurso_id", $tipo_recurso_id);
		return $this->db->delete("cms_publicacion_recurso");
	}
	
	public function deleteMenuContenido($cms_publicacion_id){
		$this->db->where("cms_publicacion_id", $cms_publicacion_id);
		return $this->db->delete("cms_menu_contenido");
	}

	public function setMenuContenido($recurso){
		return $this->db->insert_batch("cms_menu_contenido", $recurso);
	}

	public function setPublicacionRecurso($recurso){
		return $this->db->insert_batch("cms_publicacion_recurso", $recurso);
	}

	public function getMenus(){
		$this->db->from("cms_menu");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	/*Productos*/
	public function getProductos(){
		$resultados = $this->db->get("producto");
		return $resultados->result();
	}

	public function getProducto($id){
		$this->db->where("id",$id);
		$resultados = $this->db->get("producto");
		return $resultados->row();
	}

	public function setProducto($data){
		return $this->db->insert('producto', $data);
	}

	public function deleteProducto($id){
		$this->db->where("id",$id);
		return $this->db->delete('producto');
	}

	public function updateProducto($data, $id){
		$this->db->where("id",$id);
		return $this->db->update('producto',$data);
	}

	public function getEstadoProducto($id){
		$this->db->select("estado");
		$this->db->from("producto");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	/*Productos*/

	/*Agenda*/
	public function getAgendas(){
		$resultados = $this->db->get("agenda");
		return $resultados->result();
	}

	public function getAgenda($id){
		$this->db->where("id",$id);
		$resultados = $this->db->get("agenda");
		return $resultados->row();
	}

	public function setAgenda($data){
		return $this->db->insert('agenda', $data);
	}

	public function deleteAgenda($id){
		$this->db->where("id",$id);
		return $this->db->delete('agenda');
	}

	public function updateAgenda($data, $id){
		$this->db->where("id",$id);
		return $this->db->update('agenda',$data);
	}

	public function getEstadoAgenda($id){
		$this->db->select("estado");
		$this->db->from("agenda");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	/*Agenda*/

	/*Servicios*/
	public function getServicios(){
		$resultados = $this->db->get("servicio");
		return $resultados->result();
	}

	public function getServicio($id){
		$this->db->where("id",$id);
		$resultados = $this->db->get("servicio");
		return $resultados->row();
	}

	public function setServicio($data){
		return $this->db->insert('servicio', $data);
	}

	public function deleteServicio($id){
		$this->db->where("id",$id);
		return $this->db->delete('servicio');
	}

	public function updateServicio($data, $id){
		$this->db->where("id",$id);
		return $this->db->update('servicio',$data);
	}

	public function getEstadoServicio($id){
		$this->db->select("estado");
		$this->db->from("servicio");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	/*Servicios*/

	public function getTestimonios(){
		$this->db->select("t.id, CONCAT(p.nombres,' ',p.apellidos) as nombre_completo, t.estado, t.nombre, t.fecha_modificacion");
		$this->db->from("testimonio t");
		$this->db->join("persona p", "t.persona_id=p.id", "left");
		$this->db->order_by("t.fecha_modificacion","DESC");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getTestimonio($id){
		$this->db->where("id",$id);
		$resultados = $this->db->get("testimonio");
		return $resultados->row();
	}

	public function getReferentes(){
		$this->db->select("p.id, CONCAT(p.nombres,' ',p.apellidos) as nombre_completo, tp.nombre as perfil");
		$this->db->from("usuarios u");
		$this->db->join("persona p", "u.persona_id=p.id");
		$this->db->join("tipo_perfil tp", "u.tipo_perfil_id=tp.id");
		//$this->db->join("rol r", "u.rol_id=r.id", "left");
		$this->db->where("u.rol_id",0);
		//$this->db->where("r.super",0);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setTestimonio($data){
		return $this->db->insert('testimonio', $data);
	}

	public function deleteTestimonio($id){
		$this->db->where("id",$id);
		return $this->db->delete('testimonio');
	}

	public function updateTestimonio($data, $id){
		$this->db->where("id",$id);
		return $this->db->update('testimonio',$data);
	}

	public function getEstadoTestimonio($id){
		$this->db->select("estado");
		$this->db->from("testimonio");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}


	public function getTipoObras(){
		$resultados = $this->db->get("tipo_obra");
		return $resultados->result();
	}

	public function getObra($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("obras");
		return $resultados->row();
	}

	public function getRecursosObra($tipo_recurso_id, $obra_id){
		$this->db->where("obra_id", $obra_id);
		$this->db->where("tipo_recurso_id", $tipo_recurso_id);
		$resultados = $this->db->get("obra_recurso");
		return $resultados->result();
	}

	public function setObra($data){
		return $this->db->insert('obras', $data);
	}

	public function deleteObra($id){
		$this->db->where("id",$id);
		return $this->db->delete('obras');
	}

	public function setRecursoO($data){
		return $this->db->insert_batch('obra_recurso', $data);
	}

	public function deleteRecursosObra($id){
		$this->db->where("obra_id",$id);
		return $this->db->delete('obra_recurso');
	}

	public function deleteRecursosObraAct($id, $tipo_obra_id){
		$this->db->where("obra_id",$id);
		$this->db->where("tipo_recurso_id",$tipo_obra_id);
		return $this->db->delete('obra_recurso');
	}

	public function getEstadoObra($id){
		$this->db->select("estado");
		$this->db->from("obras");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updateObra($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("obras", $data);
	}


    /* Fin de modificacion */
    
	public function getTipoPublicaciones(){
		$this->db->where("id<>",6);
		$resultados = $this->db->get("cms_tipo_publicacion");
		return $resultados->result();
	}
	
	public function getNombreTipoPublicacion($id){
	    $this->db->where("id",$id);
	    $resultado = $this->db->get("cms_tipo_publicacion");
	    return $resultado->row();
	}

	public function setArchivo($data){
		return $this->db->insert('archivo', $data);
	}

	public function setDocumento($data){
		return $this->db->insert('cms_documento', $data);
	}

	public function setPublicacion($data){
		return $this->db->insert('cms_publicacion', $data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function getPublicacion($id){
		$this->db->select("c.id, c.cms_tipo_publicacion_id, c.nombre, c.descripcion, c.fecha_apertura, c.fecha, c.fecha_cierre, c.hora_apertura, a.url as url_imagen, a.nombre as imagen, d.url as url_documento, d.nombre as documento, c.url");
		$this->db->from("cms_publicacion c");
		$this->db->join("archivo a", "a.id=c.imagen_id", "left");
		$this->db->join("cms_documento d", "d.id=c.cms_documento_id", "left");
		$this->db->where("c.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoPublicacion($id){
		$this->db->select("estado");
		$this->db->from("cms_publicacion");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updatePublicacion($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_publicacion", $data);
	}

	public function deletePublicacion($id){
		$this->db->where("id", $id);
		return $this->db->delete("cms_publicacion");
	}

	/*public function deleteMenuContenido($id){
		$this->db->where("cms_publicacion_id", $id);
		return $this->db->delete("cms_menu_contenido");
	}*/

	public function updateDocumento($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_documento", $data);
	}

	public function updateArchivo($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("archivo", $data);
	}

	public function getArchivosPublicacion($id){
		$this->db->select("a.url as url_imagen, a.id as imagen, d.url as url_documento, d.id as documento");
		$this->db->from("cms_publicacion c");
		$this->db->join("archivo a", "a.id=c.imagen_id", "right");
		$this->db->join("cms_documento d", "d.id=c.cms_documento_id", "right");
		$this->db->where("c.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstado($id){
		$this->db->select("estado");
		$this->db->from("cms_publicacion");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	//* Fin de publicaciÃ³n *//

	/** Sliders **/
	public function getSliders(){
		$this->db->select("id, nombre, descripcion, fecha_creacion, estado, url, url_imagen");
		$this->db->from("cms_slider");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setSlider($data){
		return $this->db->insert('cms_slider', $data);
	}

	public function getSlider($id){
		$this->db->select("id, nombre, descripcion, url, url_imagen");
		$this->db->from("cms_slider");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoSlider($id){
		$this->db->select("estado");
		$this->db->from("cms_slider");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updateSlider($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_slider", $data);
	}

	public function deleteSlider($id){
		$this->db->where("id", $id);
		return $this->db->delete("cms_slider");
	}
	/** Fin Sliders**/

	/** Galeria **/
	public function getGalerias(){
		$this->db->select("g.id, g.nombre, g.descripcion, g.fecha_creacion, g.estado, ga.url");
		$this->db->from("cms_galeria g");
		$this->db->join("cms_galeria_archivo ga", "g.id = ga.cms_galeria_id", "left");
		$this->db->group_by("g.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setGaleria($data){
		return $this->db->insert('cms_galeria', $data);
	}

	public function setGaleriaArchivo($data){
		return $this->db->insert_batch('cms_galeria_archivo', $data);
	}

	public function getGaleria($id){
		$this->db->select("id, nombre, descripcion, fecha_creacion");
		$this->db->from("cms_galeria");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getImagenes($id){
		$this->db->select("url");
		$this->db->from("cms_galeria_archivo");
		$this->db->where("cms_galeria_id",$id);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getEstadoGaleria($id){
		$this->db->select("estado");
		$this->db->from("cms_galeria");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updateGaleria($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_galeria", $data);
	}

	public function eliminarImagenesGaleria($idGaleria){
		$this->db->where("cms_galeria_id", $idGaleria);
		return $this->db->delete("cms_galeria_archivo");
	}
	
	public function deleteGaleria($id){
		$this->db->where("id", $id);
		return $this->db->delete("cms_galeri");
	}
	/** Fin Galerias**/

	/** Patrocinadores **/
	public function getPatrocinadores(){
		$this->db->select("*");
		$this->db->from("cms_patrocinadores");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setPatrocinador($data){
		return $this->db->insert('cms_patrocinadores', $data);
	}

	public function getPatrocinador($id){
		$this->db->select("*");
		$this->db->from("cms_patrocinadores");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoPatrocinador($id){
		$this->db->select("estado");
		$this->db->from("cms_patrocinadores");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updatePatrocinador($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_patrocinadores", $data);
	}
	/** Fin Patrocinadores **/

	/** Fondos de inversiones **/
	public function getFondos(){
		$this->db->select("*");
		$this->db->from("cms_fondos");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setFondo($data){
		return $this->db->insert('cms_fondos', $data);
	}

	public function getFondo($id){
		$this->db->select("*");
		$this->db->from("cms_fondos");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoFondo($id){
		$this->db->select("estado");
		$this->db->from("cms_fondos");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function updateFondo($data, $id){
		$this->db->where("id", $id);
		return $this->db->update("cms_fondos", $data);
	}
	/** Fin Fondos de inversiones **/

	public function getRegistros(){
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as, empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general = 1 OR empresa.informacion_as = 1), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as hoja2, IF((empresa.verificacion2 = 1 AND  verificadorxempresa.estado = 1), 1, 0) as mejora, IF((empresa.plan_mejora = 1 AND verificadorxempresa.estado = 1), 1, 0) as consolidado");
		$this->db->from("empresa");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id","LEFT");
		//$this->db->where("verificador_id", $usuario_id);
		//$this->db->where("empresa.estado", 1);
		//$this->db->or_where("representante_legal_id", $persona_id);
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
		$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, empresa.informacion_general, empresa.informacion_as,  empresa.verificacion1, empresa.verificacion2, empresa.plan_mejora, empresa.estado, IF((empresa.informacion_general=1 AND empresa.informacion_as = 0), 1, 0) as formato_as, IF((empresa.informacion_as = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja1,  IF( (empresa.verificacion1 = 1 AND verificadorxempresa.estado = 1), 1, 0) as hoja2, IF( (empresa.verificacion2 = 1 AND verificadorxempresa.estado = 1), 1, 0) as mejora, IF( (empresa.plan_mejora = 1), 1, 0) as consolidado");
		$this->db->from("empresa");
		$this->db->join("verificadorxempresa", "empresa.id=verificadorxempresa.empresa_id AND verificadorxempresa.persona_id = $persona_id","LEFT");
		$this->db->where("empresa.estado", 1);
		$this->db->where("verificador_id", $usuario_id);
		$this->db->or_where("representante_legal_id", $persona_id);	
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

	public function getInformacionGeneral($empresa_id){
		$this->db->select('*, empresa.id as empresa_id, persona.identificacion as documento, persona.id as persona_id, municipio.id as municipio, archivo.nombre as nombreArchivo');
		$this->db->from('empresa');
		$this->db->join("persona", "empresa.representante_legal_id=persona.id", "left");
		$this->db->join("archivo", "empresa.archivo_id=archivo.id", "left");
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
		$this->db->select("CONCAT(persona.nombre1,' ',persona.nombre2,' ',persona.apellido1, ' ',persona.apellido2) as nombre_completo, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id=persona.id");
		$this->db->join("cargo", "usuarios.cargo_id=cargo.id", "left");
		$this->db->join("entidad", "usuarios.entidad_id=entidad.id", "left");
		$this->db->join("area", "usuarios.area_id=area.id", "left");
		$this->db->where("usuarios.id", $persona_id);
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
		$this->db->select('id, nombre');
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

}