<?php  





defined('BASEPATH') OR exit('No direct script access allowed');



class Apadrinamiento_model extends CI_Model {



	public function getSolicitudes(){

		$this->db->select("concat_ws(' ', ah.nombres, ah.apellidos) as solicitante, concat_ws(' ', p.nombres,p.apellidos) as referente, ah.correo,  ah.fecha_registro , concat_ws('-', ah.celular, ah.fijo) as contacto, ah.comentario");

		$this->db->from("apadrinamiento_persona ah");
		$this->db->join("usuarios u", "ah.persona_id = u.id");
		$this->db->join("persona p", "u.persona_id = p.id");
		$resultado = $this->db->get();
		
		return $resultado->result();

	}





	public function getHistorias(){

		$this->db->select("ah.id, concat_ws(' ', p.nombres, p.apellidos) as nombre, a.url as imagen_perfil,  ah.fecha_registro as fecha_modificacion, tipo_perfil.nombre as rol");

		$this->db->from("apadrinamiento_historia ah");

		$this->db->join("persona p", "ah.persona_id = p.id");

		$this->db->join("usuarios u", "u.persona_id = p.id");
		$this->db->join("tipo_perfil", "u.tipo_perfil_id = tipo_perfil.id");

		$this->db->join("archivo a", "a.id = u.archivo_id", "left");

		$resultado = $this->db->get();

		

		return $resultado->result();

	}



	public function guardarHistoria($referente_id){



		return $this->db->insert("apadrinamiento_historia", array("persona_id" => $referente_id));

	}



	public function getReferentes($rol_id){

		$this->db->select("persona.id, persona.identificacion, CONCAT_WS(' ', persona.nombres, persona.apellidos) as nombre, tipo_perfil.nombre as rol, usuarios.fecha_registro, sexo.nombre as sexo, archivo.url as imagen_perfil");

		$this->db->from("usuarios");

		$this->db->join("persona", "usuarios.persona_id = persona.id");

		$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id");

		$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");

		$this->db->join("sexo", "persona.sexo_id = sexo.id");
		$this->db->where("usuarios.rol_id ", 0);

		$resultados = $this->db->get();

		return $resultados->result();

	}

	public function guardarSolicitud($data){
		return $this->db->insert("apadrinamiento_persona", $data);
	}

}





?>