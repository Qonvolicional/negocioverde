<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	
	public function getUsuarios($rol_id){
		$this->db->select("usuarios.id, persona.identificacion, CONCAT(persona.nombres, ' ',persona.apellidos) as nombre, rol.nombre as rol, usuarios.fecha_registro, usuarios.estado, usuarios.fecha_modificacion");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("rol", "usuarios.rol_id = rol.id");
		$this->db->where("usuarios.rol_id <", $rol_id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
    
    public function getReferentes(){
        $this->db->select("usuarios.id, persona.identificacion, CONCAT(persona.nombres, ' ',persona.apellidos) as nombre, usuarios.fecha_registro, usuarios.estado, usuarios.fecha_modificacion, sexo.nombre as sexo, tipo_perfil.nombre as tipo_perfil");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id");
		$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
		$this->db->join("sexo", "persona.sexo_id = sexo.id","left");
		$this->db->where("usuarios.rol_id ", 0);
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
	public function getUsuarios2($rol_id=0){
		$this->db->select("usuarios.id, persona.identificacion, CONCAT(persona.nombres, ' ',persona.apellidos) as nombre, rol.nombre as rol, usuarios.fecha_registro, usuarios.estado, usuarios.fecha_modificacion, sexo.nombre as sexo, tipo_perfil.nombre as tipo_perfil");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("tipo_perfil", "usuarios.tipo_perfil_id = tipo_perfil.id","left");
		$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
		$this->db->join("sexo", "persona.sexo_id = sexo.id","left");
		$this->db->join("rol", "usuarios.rol_id = rol.id");
		$this->db->where("usuarios.rol_id ", $rol_id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getSexo(){
		$this->db->select("*");
		$this->db->from("sexo");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getHabilidades2(){
		$this->db->select("*");
		$this->db->from("habilidad");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getHabilidades(){
		$this->db->select("*");
		$this->db->from("habilidad");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function setHabilidad($data){
		return $this->db->insert('habilidad', $data);
	}

	public function getHabilidadDuplicada($nombre){
		$this->db->where("nombre", $nombre);
		$resultado = $this->db->get("habilidad");
		return $resultado->num_rows();
	}

	public function getTipoPerfil(){
		$this->db->select("*");
		$this->db->from("tipo_perfil");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getTipoIdentificacion(){
		$this->db->select("*");
		$this->db->from("tipo_identificacion");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMunicipios(){
		$this->db->select("*");
		$this->db->from("municipio");
		$this->db->where("departamento_id",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getVerificadorInformacion($usuario_id){
		$this->db->select("usuarios.id, CONCAT(persona.nombre1, ' ', persona.nombre2, ' ', persona.apellido1, ' ', persona.apellido2) as nombre_completo, entidad.nombre as entidad, area.nombre as area, cargo.nombre as cargo, persona.correo, persona.celular");
		$this->db->from("usuarios");
		//$this->db->where("usuarios.estado", 1);
		$this->db->join("persona", "usuarios.persona_id = persona.id");
		$this->db->join("entidad", "usuarios.entidad_id = entidad.id", "left");
		$this->db->join("area", "usuarios.area_id = area.id", "left");
		$this->db->join("cargo", "usuarios.cargo_id = cargo.id", "left");
		$this->db->where("usuarios.id", $usuario_id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function getUsuario($usuario_id){
		$this->db->select("usuarios.*, archivo.url as imagen");
		$this->db->from("usuarios");
		//$this->db->where("usuarios.estado", 1);
		$this->db->join("archivo", "usuarios.archivo_id = archivo.id","left");
		$this->db->where("usuarios.id", $usuario_id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function getHabilidadUsuario($usuario_id){
		$this->db->from("usuario_habilidad");
		$this->db->where("usuario_id", $usuario_id);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}
	

	public function getRedesUsuario($usuario_id){
		$this->db->from("redes_sociales");
		$this->db->where("usuario_id", $usuario_id);
		$resultados = $this->db->get();
		return $resultados->row();
	}
	
	public function deleteRedesUsuario($usuario_id){
		$this->db->where("usuario_id", $usuario_id);
	    return $this->db->delete("redes_sociales");
	}

	public function guardarRedes($data){
		return $this->db->insert("redes_sociales", $data);
	}

	public function getUsuarioHash($usuario_id){
		$this->db->select("contrasena");
		$this->db->where("id", $usuario_id);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();
	}

	public function getIdentificacion($usuario_id){
		$this->db->select("persona.identificacion");
		$this->db->from("usuarios");
		$this->db->join("persona","usuarios.persona_id=persona.id");
		$this->db->where("usuarios.id", $usuario_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function actualizarUsuario($usuario_id, $data){
		$this->db->where("id", $usuario_id);
		return $this->db->update("usuarios", $data);
	}

	public function actualizarRedes($usuario_id, $data){
		$this->db->where("usuario_id", $usuario_id);
		return $this->db->update("redes_sociales", $data);
	}

	public function existeRedesUsuario($usuario_id){
		$this->db->where("usuario_id",$usuario_id);
		$resultado = $this->db->get("redes_sociales");
		return $resultado->num_rows();
	}

	public function existeHabilidadUsuario($usuario_id){
		$this->db->where("usuario_id",$usuario_id);
		$resultado = $this->db->get("usuario_habilidad");
		return $resultado->num_rows();
	}

	public function eliminarHabilidadUsuario($usuario_id){
		$this->db->where("usuario_id",$usuario_id);
		return $this->db->delete("usuario_habilidad");
	}

	public function getEstado($usuario_id){
		$this->db->select("estado");
		$this->db->from("usuarios");
		$this->db->where("id", $usuario_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoRol($rol_id){
		$this->db->select("estado");
		$this->db->from("rol");
		$this->db->where("id", $rol_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEstadoPerfil($perfil_id){
		$this->db->select("estado");
		$this->db->from("tipo_perfil");
		$this->db->where("id", $perfil_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getRoles($rol_id){
		$this->db->where("id<", $rol_id);
		$resultados = $this->db->get("rol");
		return $resultados->result();
	}

	public function getPerfiles($rol_id){
		$resultados = $this->db->get("tipo_perfil");
		return $resultados->result();
	}

	public function getRolesActivos($rol_id){
		$this->db->where("id<", $rol_id);
		$this->db->where("estado", 1);
		$resultados = $this->db->get("rol");
		return $resultados->result();
	}

	public function getRol($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("rol");
		return $resultados->row();
	}

	public function getPerfil($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("tipo_perfil");
		return $resultados->row();
	}

	public function guardarRol($data){
		return $this->db->insert('rol', $data);
	}

	public function guardarPerfil($data){
		return $this->db->insert('tipo_perfil', $data);
	}

	public function guardarHabilidades($data){
		return $this->db->insert_batch('usuario_habilidad', $data);
	}

	public function actualizarRol($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('rol', $data);
	}

	public function actualizarPerfil($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('tipo_perfil', $data);
	}

	public function eliminarPerfil($id){
		$this->db->where("id",$id);
		return $this->db->delete('tipo_perfil');
	}

	public function eliminarRol($id){
		$this->db->where("id",$id);
		return $this->db->delete('rol');
	}

	public function getPersona($usuario_id){
		$this->db->select("persona.*");
		$this->db->from("usuarios");
		$this->db->join("persona","usuarios.persona_id=persona.id");
		$this->db->where("usuarios.id", $usuario_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	
	public function deletePersona($id){
		$this->db->where("id", $id);
	    return $this->db->delete("persona");
	}

	public function getDatosSesion($usuario_id){
		$this->db->select("usuarios.id as usuario, usuarios.persona_id as persona, usuarios.rol_id, rol.nombre as rol_nombre, usuarios.fecha_registro, usuarios.fecha_retiro, CONCAT(persona.nombre1,' ', persona.apellido1) as nombre, IF(usuarios.rol_id = 5 OR usuarios.rol_id=9,1,0) as admin, archivo.url as imagenUrl");
		$this->db->from("usuarios");
		$this->db->join("persona", "usuarios.persona_id = persona.id", "LEFT");
		$this->db->join("rol", "usuarios.rol_id = rol.id", "LEFT");
		$this->db->join("archivo", "usuarios.archivo_id = archivo.id", "LEFT");
		$this->db->where("usuarios.id", $usuario_id);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}
	// public function login($username, $password){
	// 	$this->db->select("persona.id, persona.rol_id, persona.nombre1, persona.identificacion");
	// 	$this->db->from("persona");
	// 	$this->db->join("login", "login.persona_id = persona.id");
	// 	$this->db->where("login.usuario", $username);
	// 	$this->db->where("login.clave", $password);
	// 	$resultado = $this->db->get();

	// 	if($resultado->num_rows() > 0){
	// 		return $resultado->row();
	// 	}else{
	// 		return false;
	// 	}
	// }

	private function getUsuarioID($username){
		$this->db->select("usuarios.id");
		$this->db->from("persona");
		$this->db->join("usuarios", "usuarios.persona_id = persona.id");
		$this->db->where("persona.identificacion", $username);
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function verificarEstadoUsuario($username){
		$usuario = $this->getUsuarioID($username);
		if($usuario){
			$data = array(
				'estado'=> 0,
			);
			date_default_timezone_set('America/Bogota');
			$now = date("Y:m:d");
			$this->db->where("id", $usuario['id']);
			$this->db->where("estado", 1);
			$this->db->where("fecha_retiro<=", $now);
			$this->db->where("rol_id<>", 5); //Roles diferentes al administrador
			$this->db->where("rol_id<>", 9); //Roles diferentes al super-administrador
			$this->db->update("usuarios", $data);
		}
	}

	public function loginEncriptado($username, $password){
		//$this->verificarEstadoUsuario($username);//Verifica si la fecha de inactividad ya se le cumplió para cambiarle el estado dentro del sistema

		$this->db->select("persona.id as persona_id, CONCAT(persona.nombres, ' ', persona.apellidos) as nombre, usuarios.rol_id, usuarios.contrasena, usuarios.id, usuarios.archivo_id, rol.nombre as rol_nombre, rol.super, usuarios.fecha_modificacion, usuarios.fecha_registro, usuarios.estado");
		$this->db->from("usuarios");
		$this->db->join("persona", "persona.id=usuarios.persona_id");
		$this->db->join("rol", "usuarios.rol_id=rol.id", "left");
		$this->db->where("usuarios.estado", 1);
		$this->db->where("persona.identificacion", $username);
		$resultado = $this->db->get();
		if($resultado->num_rows()==0){
			return false;
		}else{
			
			if(password_verify($password,  $resultado->row()->contrasena)){
				return $resultado->row();
			}else{
				return false;
			}
		}
	}

	public function getModulos(){
		$resultados = $this->db->get("modulo");
		return $resultados->result();
	}

	public function getPermisos(){
		$resultados = $this->db->get("modulo_rol");
		return $resultados->result();
	}
	public function getModulo($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("modulo");
		return $resultados->row();
	}

	public function eliminarPermiso($id){
		$this->db->where('rol_id', $id);
		return $this->db->delete('modulo_rol');
	}

	public function guardarPermiso($data){
		return $this->db->insert_batch('modulo_rol', $data);
	}

	public function actualizarModulo($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('modulo', $data);
	}

	public function guardarImagen($data){
		return $this->db->insert('archivo', $data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function getImagenUrl($archivo_id){
		$this->db->select("url");
		$this->db->where("id", $archivo_id);
		$resultado = $this->db->get("archivo");
		return $resultado->row();

	}

	public function agregarPersona($data){
		return $this->db->insert('persona', $data);
	}

	public function actualizarPersona($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('persona', $data);
	}

	public function guardarUsuario($data){
		return $this->db->insert('usuarios', $data);
	}
	
	public function deleteUsuario($usuario_id){
		$this->db->where("id", $usuario_id);
	    return $this->db->delete("usuarios");
	}

	public function actualizarImagenUsuario($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("usuarios", $data);
	}

	public function actualizarArchivoUsuario($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("archivo", $data);
	}

	public function getCargos(){
		$resultados = $this->db->get('cargo');
		return $resultados->result();
	}

	public function getAreas(){
		$resultados = $this->db->get('area');
		return $resultados->result();
	}

	public function getEntidades(){
		$resultados = $this->db->get('entidad');
		return $resultados->result();
	}

}