<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidad_model extends CI_Model {
	
	
	public function getEntidades(){
		$resultados = $this->db->get("entidad");
		return $resultados->result();
	}

	public function getEntidadesActivas(){
		$this->db->where("estado", 1);
		$resultados = $this->db->get("entidad");
		return $resultados->result();
	}

	public function getEntidad($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("entidad");
		return $resultados->row();
	}

	public function guardarEntidad($data){
		return $this->db->insert('entidad', $data);
	}

	public function actualizarEntidad($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('entidad', $data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function eliminarEntidad($data){
		return $this->db->delete('entidad', $data);
	}

}