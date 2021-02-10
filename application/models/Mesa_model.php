<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Mesa_model extends CI_Model {

	public function getData(){
		$this->db->select("*");
		$this->db->from("cms_menu");
		$this->db->where("slugArticulo","mesa");
		$result = $this->db->get();
		return $result->first_row();
	}

	public function getPublicacion($slug){
		$this->db->select("cms_publicacion.*, archivo.url as portada, archivo.nombre as portada_nombre");
		$this->db->from("cms_menu");
		$this->db->join("cms_menu_contenido", "cms_menu.id = cms_menu_contenido.cms_menu_id");
		$this->db->join("cms_publicacion", "cms_menu_contenido.cms_publicacion_id = cms_publicacion.id");
		$this->db->join("archivo", "archivo.id = cms_publicacion.imagen_id", "left");
		$this->db->where("cms_publicacion.slug",$slug);
		$result = $this->db->get();
		return $result->first_row();
	}


	public function getContentidoPrincipal(){
		$this->db->select("cms_publicacion.*, archivo.url as portada, archivo.nombre as portada_nombre");
		$this->db->from("cms_menu");
		$this->db->join("cms_menu_contenido", "cms_menu.id = cms_menu_contenido.cms_menu_id");
		$this->db->join("cms_publicacion", "cms_menu_contenido.cms_publicacion_id = cms_publicacion.id");
		$this->db->join("archivo", "archivo.id = cms_publicacion.imagen_id", "left");
		$this->db->where("slugArticulo","mesa");
		$result = $this->db->get();
		return $result->first_row();	
	}

	public function getPublicaciones(){
		$this->db->select("cms_publicacion.*");
		$this->db->from("cms_menu");
		$this->db->join("cms_menu_contenido", "cms_menu.id = cms_menu_contenido.cms_menu_id");
		$this->db->join("cms_publicacion", "cms_menu_contenido.cms_publicacion_id = cms_publicacion.id");
		$this->db->join("archivo", "archivo.id = cms_publicacion.imagen_id", "left");
		$this->db->where("slugArticulo","mesa");
		$this->db->order_by("fecha_creacion", "asc");
		$this->db->where("cms_publicacion.estado",1);
		
		$this->db->limit(5, 1);
		$result = $this->db->get();
		return $result->result();		
	}

}
?>