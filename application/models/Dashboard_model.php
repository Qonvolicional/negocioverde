<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	public function getBienesRegistrados(){
		$this->db->select("count(*) as bienes_registrados");
		$this->db->from("caracterizacion_empresa_bien_servicio ce");
		$this->db->join("empresa e", "e.id=ce.empresa_id AND e.estado=1");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getNumEmprendimientos(){
		$this->db->select("count(*) as emprendimientos");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getNumEvaluados(){
		$this->db->select("count(*) as evaluados");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
		$this->db->where("verificacion2", 1);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getNumNoEvaluados(){
		$this->db->select("count(*) as no_evaluados");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
		$this->db->where("verificacion2<>", 1);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}


	public function getUsuario($data){
		return $this->db->insert('archivo', $data);
	}

	public function guardarCategoria($id, $data){
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

	public function lastID(){
		return $this->db->insert_id();
	}

	public function getRegistros(){
		//$this->db->select("empresa.id, empresa.identificacion, empresa.razon_social, empresa.fecha_registro, CONCAT(persona.nombre1, ' ', persona.apellido1) as representante_legal, tamanio_empresa.nombre");
		$this->db->select('id, identificacion, razon_social, fecha_registro');
		$this->db->from("empresa");
		$this->db->order_by("fecha_registro", "ASC");
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getEmpresa($empresa_id){
		$this->db->select('id, identificacion, razon_social, fecha_registro');
		$this->db->from('empresa');
		$this->db->where('id', $empresa_id);
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

	public function getOpciones($tabla){
		$this->db->select('id, nombre');
		$this->db->from($tabla);
		$this->db->order_by('id', 'DESC');
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

	public function eliminar($tabla, $id){
		$this->db->where('id', $id);
		return $this->db->delete($tabla);
	}

	public function guardarRegistrosBatch($tabla, $data){
		return $this->db->insert_batch($tabla, $data);
	}

	public function guardarRegistro($tabla, $data){
		return $this->db->insert($tabla, $data);
	}

}