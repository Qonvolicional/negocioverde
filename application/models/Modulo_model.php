<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo_model extends CI_Model {
	
	/* Modificaciones */
	public function getModuloActivo($controlador){
		$this->db->where("controlador", $controlador);
		$resultado = $this->db->get("modulo");
		return $resultado->row();
	}
	
	
	/* Fin de modificaciones */
	
	public function getModulos(){
		$this->db->order_by("orden", "ASC");
		$resultados = $this->db->get("modulo");
		return $resultados->result();
	}
    
	public function getModulosPadre(){
		$this->db->order_by("orden", "ASC");
		$this->db->where("modulo_padre", 0);
		$resultados = $this->db->get("modulo");
		return $resultados->result();
	}

	public function getUltimoModulo($where){
		$this->db->select("max(orden) as ultimo");
		$this->db->from("modulo");
		$this->db->where($where);
		$resultado = $this->db->get();
		return $resultado->row()->ultimo;
	}

	public function getOrdenModulo($id){
		$this->db->select("orden");
		$this->db->from("modulo");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getSiguienteModulo($tipoModulo, $orden){
		$this->db->select("orden");
		$this->db->from("modulo");
		$this->db->where("tipoModulo", $tipoModulo);
		$this->db->where("orden>", $orden);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getSiguientesModulo($where){
		$this->db->select("id, orden");
		$this->db->from("modulo");
		$this->db->where($where);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getModulo($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("modulo");
		return $resultados->row();
	}

	public function getEstado($id){
		$this->db->select("estado");
		$this->db->where('id', $id);
		$resultados = $this->db->get("modulo");
		return $resultados->row();
	}

	public function guardarModulo($data){
		return $this->db->insert('modulo', $data);
	}

	public function actualizarModulo($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('modulo', $data);
	}

	public function updateModulo($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("modulo", $data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function deleteModulo($id){
		$this->db->where("id", $id);
		$this->db->or_where("modulo_padre", $id);
		return $this->db->delete("modulo");
	}

	private function getModulosHijos($where, $super=0){
		$this->db->select("modulo.id, modulo.nombre, modulo.controlador, modulo.icon");
		if($super){
			$this->db->from("modulo");
		}else{
			$this->db->from("modulo_rol");
			$this->db->join("modulo", "modulo_rol.modulo_id=modulo.id");
		}
		$this->db->where($where);
		$this->db->order_by("modulo.orden", "ASC");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getModulosRol($rol_id, $super = 0){
		if($super){
			$this->db->select("modulo.id, modulo.nombre, modulo.controlador, modulo.icon");
			$this->db->from("modulo");
			$this->db->where("modulo.modulo_padre", 0);
			$this->db->or_where("modulo.modulo_defecto", 1);
			//$this->db->where("modulo.estado",1);
			$this->db->order_by("modulo.orden", "ASC");
		}else{
			$this->db->select("modulo.id, modulo.nombre, modulo.controlador, modulo.icon");
			$this->db->from("modulo_rol");
			$this->db->join("modulo", "modulo_rol.modulo_id=modulo.id");
			$this->db->where("modulo_rol.rol_id", $rol_id);
			$this->db->where("modulo.modulo_padre", 0);
			$this->db->or_where("modulo.modulo_defecto", 1);
			$this->db->order_by("modulo.orden", "ASC");
		}
		
		$resultados = $this->db->get();
		$datos = array();
		foreach($resultados->result_array() as $r){
			//var_dump($r);
			$condicion = array(
				'modulo.modulo_padre'=>$r['id']
			);
			if(!$super) $condicion['modulo_rol.rol_id'] = $rol_id;
			$r['hijos'] = $this->getModulosHijos($condicion, $super);
			$datos[] = $r;
		}
		return $datos;
	}

}