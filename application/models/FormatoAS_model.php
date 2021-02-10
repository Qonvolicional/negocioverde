<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormatoAS_model extends CI_Model {
	
	

	public function getOpcionesLike($like){
		$this->db->select('id, nombre');
		$this->db->from('opciones');
		$this->db->like('codigo', $like);
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();

	}

	public function eliminarRegistros($tablas, $id){
		$this->db->where('empresa_id', $id);
		return $this->db->delete($tablas);
	}

	public function getFunteEnergia(){
		$this->db->select("*");
		$this->db->from("fuente_energia");
		return $this->db->get()->result();
	}

	public function getFunteEnergiaConsumo(){
		$this->db->select("*");
		$this->db->from("fuente_energia_consumo");
		return $this->db->get()->result();
	}

	public function guardarRegistrosBatch($tabla, $data){
		return $this->db->insert_batch($tabla, $data);
	}

	public function guardarRegistros($tabla, $data){
		return $this->db->insert($tabla, $data);
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

	public function getRegistrosBien($empresa_id){
		
		$this->db->where("empresa_id", $empresa_id);
	}

	public function getNumRows($tabla, $empresa_id){
		$this->db->where("empresa_id", $empresa_id);
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

	public function getCheckConfirmacion($tabla, $empresa_id){
		$this->db->where("confirmacion", 1);
		$this->db->where("empresa_id", $empresa_id);
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}


}