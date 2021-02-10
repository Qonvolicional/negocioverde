<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso_model extends CI_Model {
	


	public function getRoles($rol_id){
		$this->db->where("id <", $rol_id);
		$resultados = $this->db->get("rol");
		return $resultados->result();
	}

	public function getRol($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("rol");
		return $resultados->row();
	}

	private function getModulosHijos($where){
		$this->db->select("id, nombre, modulo_padre, icon");
		$this->db->where($where);
		$resultados = $this->db->get("modulo");
		return $resultados->result_array();
	}	

	public function getModulosPadre(){
		$this->db->select("id, nombre, modulo_padre, icon, modulo_defecto, exclusivo_administracion");
		$this->db->where("estado", 1);
		$this->db->where("modulo_padre", 0);
		$resultados = $this->db->get("modulo");
		$datos = array();
		foreach ($resultados->result_array() as $item) {
			$condicion = array('modulo_padre'=>$item['id']);
			$item['hijos'] = $this->getModulosHijos($condicion);
			$datos[] = $item;
		}
		return $datos;
	}

	public function getModulos(){
		$this->db->where("estado", 1);
		$resultados = $this->db->get("modulo");
		return $resultados->result();
	}

	public function getPermisos(){
		$resultados = $this->db->get("modulo_rol");
		return $resultados->result();
	}
	
	public function eliminarPermiso($id){
		$this->db->where('rol_id', $id);
		return $this->db->delete('modulo_rol');
	}

	public function guardarPermiso($data){
		return $this->db->insert_batch('modulo_rol', $data);
	}

	public function verificarModuloRol($data){

		$resultado = $this->db->get_where('modulo_rol', $data);
		return $resultado->num_rows();
	}

}