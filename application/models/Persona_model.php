<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Persona_model extends CI_Model {

		public function randonImage(){
			$this->db->select("a.url");
			$this->db->from("archivo a");
			$this->db->join("cms_publicacion", "a.id = cms_publicacion.imagen_id");
			$this->db->where("imagen_id !=", 0);
			return $this->db->get()->first_row();
		}


		public function getPerfilId($persona_id){
				$this->db->select("usuarios.id, persona.correo, persona.celular, persona.identificacion, CONCAT_WS(' ', persona.nombres, persona.apellidos) as nombre, tipo_perfil.nombre as rol, usuarios.fecha_registro, usuarios.descripcion, sexo.nombre as sexo, sexo.id as sexo_id, archivo.url as foto, redes_sociales.facebook, redes_sociales.youtube, redes_sociales.instagram, redes_sociales.linkedin, ah.id as apadrinamiento");
				$this->db->from("usuarios");
				$this->db->join("persona", "usuarios.persona_id = persona.id");
				$this->db->join("apadrinamiento_historia ah", "ah.persona_id = persona.id", "left");
				$this->db->join("redes_sociales", "usuarios.id = redes_sociales.usuario_id", "left");
				$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id");
				$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
				$this->db->join("sexo", "persona.sexo_id = sexo.id","left");
				$this->db->where("usuarios.id", $persona_id);
				$resultado = $this->db->get();
				return $resultado->row();
		}
		public function getPerfilHabilidadesId($persona_id){
			$this->db->select("habilidad.nombre");
			$this->db->from("usuarios");
			$this->db->join("usuario_habilidad uh", "uh.usuario_id = usuarios.id");
			$this->db->join("habilidad", "habilidad.id = uh.habilidad_id");
			$resultado = $this->db->get();
			return $resultado->result();
		}
		public function getAllPerfilLimited($limit=0, $offset = 0){
				$this->db->select("usuarios.id as id, persona.identificacion, CONCAT_WS(' ', persona.nombres, persona.apellidos) as nombre, tipo_perfil.nombre as rol, usuarios.fecha_registro, usuarios.descripcion, sexo.nombre as sexo, sexo.id as sexo_id, archivo.url as foto, redes_sociales.facebook, redes_sociales.youtube, redes_sociales.instagram, redes_sociales.linkedin");
				$this->db->from("usuarios");
				$this->db->join("persona", "usuarios.persona_id = persona.id");
				$this->db->join("redes_sociales", "usuarios.id = redes_sociales.usuario_id", "left");
				$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id");
				$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
				$this->db->join("sexo", "persona.sexo_id = sexo.id","left");
				$this->db->where("usuarios.rol_id ", 0);

				if($limit > 0)
					$this->db->limit($limit, $offset);

				$resultado = $this->db->get();
				return $resultado->result();
		}

		public function getAllPerfilNumRows(){
				$this->db->select("persona.id, persona.identificacion, CONCAT_WS(' ', persona.nombres, persona.apellidos) as nombre, tipo_perfil.nombre as rol, usuarios.fecha_registro, usuarios.descripcion, sexo.nombre as sexo, sexo.id as sexo_id, archivo.url as foto, redes_sociales.facebook, redes_sociales.youtube, redes_sociales.instagram, redes_sociales.linkedin");
				$this->db->from("usuarios");
				$this->db->join("persona", "usuarios.persona_id = persona.id");
				$this->db->join("redes_sociales", "usuarios.id = redes_sociales.usuario_id", "left");
				$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id");
				$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
				$this->db->join("sexo", "persona.sexo_id = sexo.id","left");
				$resultado = $this->db->get();
				return $resultado->num_rows();
		}

		public function gerPerfilHabilidades($persona_id){
			$this->db->select("");
			$this->db->from("usuario_habilidad uh");
			$this->db->join("habilidades h", "h.id = uh.habilidad_id");
			$this->db->where("usuario_habilidad.usuario_id", $usuario_id);
			$resultado = $this->db->get();
			return $resultado->result();
		}

	}

?>