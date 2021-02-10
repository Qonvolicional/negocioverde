<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {

	public function getAreas(){
		$resultados = $this->db->get("area");
		return $resultados->result();
	}

	public function getAreasActivas(){
		$this->db->where("estado", 1);
		$resultados = $this->db->get("area");
		return $resultados->result();
	}

	public function getArea($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("area");
		return $resultados->row();
	}

	public function guardarArea($data){
		return $this->db->insert('area', $data);
	}

	public function actualizarArea($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('area', $data);
	}

	public function eliminarArea($data){
		return $this->db->delete('area', $data);
	}

}