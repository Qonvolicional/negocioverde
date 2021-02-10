<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');


	/**
	* Hoja de Verificacion uno 
	*/
	class Seguimiento_model extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getPlanMejoraEmpresa($empresa_id){
			$this->db->select("plan_mejora.id, opciones.nombre");
			$this->db->from("plan_mejora");
			$this->db->join("opciones", "opciones.id = plan_mejora.opciones_id");
			$this->db->where("empresa_id",$empresa_id);
			$query = $this->db->get();
			return $query->result();
		}

		public function getPlanMejoraEmpresaSeguimiento($empresa_id, $seguimiento_id){
			$this->db->select("plan_mejora.id, opciones.nombre");
			$this->db->from("seguimiento_plan_mejora");
			$this->db->join("plan_mejora", "plan_mejora.id = seguimiento_plan_mejora.plan_mejora_id");
			$this->db->join("opciones", "opciones.id = plan_mejora.opciones_id");
			$this->db->where("empresa_id",$empresa_id);
			$this->db->where("seguimiento_id",$seguimiento_id);
			$query = $this->db->get();
			return $query->result();
		}

		public function getSeguimiento($filter)
		{
			$this->db->select("s.*, archivo.url as url");
			$this->db->from("seguimiento as s");
			$this->db->join("archivo", 's.soporte = archivo.id', 'left outer');
			$this->db->where("s.empresa_id", $filter);
			$query = $this->db->get();
			//_where("seguimiento", array('empresa_id' => $filter));
			return $query->result();
		}

		public function getSeguimientoId($seguimiento_id)
		{
			
			$this->db->select("s.*, archivo.url as url, archivo.nombre as nombre_archivo");
			$this->db->from("seguimiento as s");
			$this->db->join("archivo", 's.soporte = archivo.id', 'left outer');
			$this->db->where("s.id", $seguimiento_id);
			$query = $this->db->get();
			//_where("seguimiento", array('empresa_id' => $filter));
			return $query->first_row();
		}

		
		public function guardar($data)
		{

			$insert_data = array(
				'empresa_id' => $data['empresa_id'],
				'fecha' => $data['fecha'],
				'lugar' => $data['lugar'],
				'hora_inicio' => $data['h_inicio'],
				'hora_fin' => $data['h_fin'],
				'temas_tratados' => $data['temas'],
				'desarrollo' => $data['desarrollo'],
				'acuerdos' => $data['acuerdos'],
				'compromisos' => $data['compromiso']
			);
			return $this->db->insert('seguimiento', $insert_data);
		}

		public function guardarSoporte($data)
		{
			$insert_data = array('nombre' => $data['nombre_archivo'],
								  'url' => $data['ruta']
							);
			return $this->db->insert('archivo', $insert_data);
		}

		public function actualizarSoporte($data)
		{
			$update_data = array('nombre' => $data['nombre_archivo'],
								  'url' => $data['ruta']
							);
			$this->db->where('id', $data['soporte_id']);
			

			 $this->db->update('archivo', $update_data);
			  return $this->db->affected_rows();
		}

		public function actualizar($data)
		{
			
			$update_data = array(
				'fecha' => $data['fecha'],
				'lugar' => $data['lugar'],
				'hora_inicio' => $data['h_inicio'],
				'hora_fin' => $data['h_fin'],
				'temas_tratados' => $data['temas'],
				'desarrollo' => $data['desarrollo'],
				'acuerdos' => $data['acuerdos'],
				'compromisos' => $data['compromiso']
			);

			$this->db->where('id', $data["seguimiento_id"]);	
			$this->db->update('seguimiento', $update_data);
			 return $this->db->affected_rows();
		}

		public function gurdarSeguimientoPlanMejora($seguimiento, $indicadores){
			$data = array();
			foreach ($indicadores as $indicador) {
				$data[] = array(
					'seguimiento_id' => $seguimiento,
					'plan_mejora_id' => $indicador
				);
			}

			return $this->db->insert_batch('seguimiento_plan_mejora', $data);
		}
		public function actualizarSeguimientoSoporte($data)
		{
			$this->db->set('soporte', $data['soporte_id']);
			$this->db->where('id', $data['seguimiento_id']);
			 $this->db->update('seguimiento');
			  return $this->db->affected_rows();
		}

		public function lastID(){
			return $this->db->insert_id();
		}

		
	}

?>