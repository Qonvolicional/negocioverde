<?php

/**
* Contenido Model
*/
class Contenido_model extends CI_Model
{
	public function getMenu($menu){
		$query = $this->db->get_where("cms_menu", array("slugArticulo" => $menu));
		return $query->first_row();
	}

	public function get($menu){
		$this->db->select("cms_publicacion.*, archivo.url as portada, archivo.nombre as portada_nombre");
		$this->db->from("cms_menu");
		$this->db->join("cms_menu_contenido", "cms_menu.id = cms_menu_contenido.cms_menu_id");
		$this->db->join("cms_publicacion", "cms_menu_contenido.cms_publicacion_id = cms_publicacion.id");
		$this->db->join("archivo", "archivo.id = cms_publicacion.imagen_id", "left");
		$this->db->where("slugArticulo",$menu);
		$this->db->where("cms_publicacion.estado",1);
		$result = $this->db->get();
		return $result->result();	
	}
}