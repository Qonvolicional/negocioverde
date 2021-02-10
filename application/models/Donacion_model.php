<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donacion_model extends CI_Model {
	
	public function setSolicitudDonacion($data){
		return $this->db->insert("donacion", $data);
	}

	public function getDonaciones(){
		$resultados = $this->db->get("donacion");
		return $resultados->result();
	}

	public function getDonacion($id){
		$this->db->select("d.*, p.id as pais_id, m.id as municipio_id, p.id as pais_id");
		$this->db->from("donacion d");
		$this->db->join("municipio m","m.id=d.municipio_id","left");
		$this->db->join("departamento dd","m.departamento_id=dd.id","left");
		$this->db->join("pais p","dd.pais_id=p.id","left");
		$this->db->where("d.id",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function getPais(){
		$resultados = $this->db->get("pais");
		return $resultados->result();
	}

	public function getDepartamento(){
		$resultados = $this->db->get("departamento");
		return $resultados->result();
	}

	public function getMunicipio(){
		$resultados = $this->db->get("municipio");
		return $resultados->result();
	}

	public function getDepartamentos($pais_id){
		$this->db->where("pais_id", $pais_id);
		$resultados = $this->db->get("pais");
		return $resultados->result();
	}

	public function getMunicipios($departamento_id){
		$this->db->where("departamento_id", $departamento_id);
		$resultados = $this->db->get("municipio");
		return $resultados->result();
	}

	public function getRegistrosCondicionados($tabla, $where){
		$this->db->select("*");
		$this->db->where($where);
		$resultados = $this->db->get($tabla);
		return $resultados->result();
	}
}