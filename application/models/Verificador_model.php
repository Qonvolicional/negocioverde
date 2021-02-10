<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verificador_model extends CI_Model {
	
	public function getVerificaciones(){
		$this->db->select("verificadorxempresa.id,verificadorxempresa.fecha_asignacion, verificadorxempresa.fecha_asignacion, empresa.razon_social as emprendimiento, CONCAT(persona.nombre1, ' ',persona.apellido1) as nombre, verificadorxempresa.estado");
		$this->db->from("verificadorxempresa");
		$this->db->join("persona", "verificadorxempresa.persona_id = persona.id");
		$this->db->join("empresa", "verificadorxempresa.empresa_id = empresa.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getCargos(){
		$resultados = $this->db->get('cargo');
		return $resultados->result();
	}

	public function getAreas(){
		$resultados = $this->db->get('area');
		return $resultados->result();
	}

	public function getEntidades(){
		$resultados = $this->db->get('entidad');
		return $resultados->result();
	}

	public function getVerificadores(){
		$this->db->select("persona.id as persona_id, CONCAT(persona.nombre1, ' ', persona.apellido1) as nombre, usuarios.id, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo, usuarios.estado");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("entidad", "usuarios.entidad_id=entidad.id", "left");
		//$this->db->where("usuarios.estado", 1);
		$this->db->join("area", "usuarios.area_id=area.id" , "left");
		$this->db->join("cargo", "usuarios.cargo_id=cargo.id" , "left");
		$this->db->where("usuarios.rol_id", "2");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getVerificadoresActivos(){
		$this->db->select("persona.id as persona_id, CONCAT(persona.nombre1, ' ', persona.apellido1) as nombre, usuarios.id, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo, usuarios.estado");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("entidad", "usuarios.entidad_id=entidad.id", "left");
		$this->db->where("usuarios.estado", 1);
		$this->db->join("area", "usuarios.area_id=area.id" , "left");
		$this->db->join("cargo", "usuarios.cargo_id=cargo.id" , "left");
		$this->db->where("usuarios.rol_id", "2");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEstadoAsignacion($asignacion_id){
		$this->db->select("estado");
		$this->db->from("verificadorxempresa");
		$this->db->where("id", $asignacion_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresas(){
		$this->db->select("empresa.id, empresa.razon_social as nombre");
		$this->db->from("empresa");
		$this->db->where("empresa.informacion_as", 1);
		$this->db->where("empresa.estado", 1);
		// $this->db->from("verificadorxempresa");
		// $this->db->join("empresa", "verificadorxempresa.empresa_id=empresa.id", "right");
		// $this->db->where("verificadorxempresa.empresa_id", NULL, FALSE);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getEmpresas2(){
		$this->db->select("empresa.id, empresa.razon_social as nombre");
		$resultados = $this->db->get("empresa");
		return $resultados->result();
	}

	public function guardarAsignacion($data){
		return $this->db->insert('verificadorxempresa', $data);
	}

	public function actualizarAsignacion($id, $data){
		$this->db->where("id", $id);
		return $this->db->update('verificadorxempresa', $data);
	}

	public function getAsignacion($id){
		$this->db->where("id", $id);
		$resultado = $this->db->get("verificadorxempresa");
		return $resultado->row();
	}

	public function getVerificador($id){
		$this->db->select("usuarios.id, persona.id as persona_id, persona.identificacion, persona.nombre1, persona.nombre2, persona.apellido1, persona.apellido2, persona.correo, archivo.url as imagen, persona.direccion, usuarios.id as usuario_id, usuarios.rol_id, usuarios.entidad_id, usuarios.cargo_id, usuarios.area_id, persona.celular, persona.fijo, usuarios.archivo_id, usuarios.fecha_retiro");
		$this->db->from("usuarios");
		$this->db->where("usuarios.id", $id);
		$this->db->where("usuarios.estado", 1);
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("archivo", "usuarios.archivo_id = archivo.id", "LEFT");
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function actualizarUsuario($usuario_id, $data){
		$this->db->where("id", $usuario_id);
		return $this->db->update("usuarios", $data);
	}

	public function actualizarPersona($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('persona', $data);
	}

	public function actualizarImagenUsuario($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("usuarios", $data);
	}

	public function actualizarArchivoUsuario($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("archivo", $data);
	}

	public function guardarImagen($data){
		return $this->db->insert('archivo', $data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}
	
	public function getVerificador($persona_id){
	    $this->db->select('p.nombre1, p.correo');
	    $this->db->from('usuarios u');
	    $this->db->jooin('persona p','p.id=u.persona_id');
	    $this->db->where('u.persona_id', $persona_id);
	    $resultado = $this->db->get();
	    return $resultado->row();
	}


}