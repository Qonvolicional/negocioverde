<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends CI_Model {

	public function getCargos(){
		$resultados = $this->db->get("cargo");
		return $resultados->result();
	}

	public function getCargosActivos(){
		$this->db->where("estado",1);
		$resultados = $this->db->get("cargo");
		return $resultados->result();
	}

	public function getCargo($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("cargo");
		return $resultados->row();
	}

	public function guardarCargo($data){
		return $this->db->insert('cargo', $data);
	}

	public function actualizarCargo($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('cargo', $data);
	}

	public function eliminarCargo($data){
		return $this->db->delete('cargo', $data);
	}

}