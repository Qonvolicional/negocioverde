<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');


	/**
	* Hoja de Verificacion uno 
	*/
	class VerificacionDos_model extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getOpciones($filter)
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo',$filter);
			$result = $this->db->get();
			return $result->result();
		}

		public function getVerificacionEmpresa($empresa_id){
			
			$this->db->select("h2.opciones_id, h2.observacion, archivo.nombre as nombre_archivo, calificacion.nombre as calificacion, calificacion.id as calificacion_id");
			$this->db->from("hv2_verificacion h2");
			$this->db->join('calificacion', 'h2.calificacion_id = calificacion.id');
			$this->db->join("archivo", 'h2.evidencia = archivo.id', 'left outer');
			$this->db->where('empresa_id',$empresa_id);
			$result = $this->db->get();
			return $result->result();
		}
		
		public function guardarVerificacion($data, $empresa_id)
		{
			$insert_data = array(
				'empresa_id' => $empresa_id,
				'opciones_id' => $data->opcion_id,
				'calificacion_id' => $data->calificacion,
				'observacion' => $data->observacion
			);
			return $this->db->insert('hv2_verificacion', $insert_data);
		}

		public function existeOpcionEmpresa($opcion_id, $empresa_id)
		{
			$query = $this->db->get_where('hv2_verificacion',
											array('empresa_id' => $empresa_id,
									 			  'opciones_id' => $opcion_id
										  ));
			return $query->num_rows() > 0;
		}

		public function actualizarVerificacionSoporte($data)
		{
			$this->db->set('evidencia', $data['evidencia_id']);
			$this->db->where('id', $data['verificacion_id']);
			return $this->db->update('hv2_verificacion');
		}

		public function guardarEvidencia($data)
		{
			$insert_data = array('nombre' => $data['nombre_archivo'],
								  'url' => $data['ruta']
							);
			return $this->db->insert('archivo', $insert_data);
		}

		public function updateState($empresa_id){
			$this->db->set('verificacion2', '1');
			$this->db->where('id', $empresa_id);
			return $this->db->update('empresa');
		}

		public function updateVerificacfionDos($empresa_id){
			$this->db->set('verificacion2', 'verificacion2+1', FALSE);
			$this->db->where('id', $empresa_id);
			return $this->db->update('empresa');
		}

		public function isCompleted($empresa_id){
			$this->db->select("verificacion2");
			$this->db->from("empresa");
			$this->db->where('id',$empresa_id);
			$query = $this->db->get();
			$row = $query->row();
			return $row->verificacion2 == 15;
		}

		public function lastID(){
			return $this->db->insert_id();
		}

		public function getVerificacion($opcion_id, $empresa_id)
		{
			$query = $this->db->get_where('hv2_verificacion',
											array('empresa_id' => $empresa_id,
									 			  'opciones_id' => $opcion_id
										  ));
			return $query->first_row();
		}
		public function updateVerificacion($data, $empresa_id)
		{	
			$update_data = array(
				'calificacion_id' => $data->calificacion,
				'observacion' => $data->observacion
				);

			return $this->db->update('hv2_verificacion', 
									 $update_data, 
									 array('empresa_id' => $empresa_id,
									 		'opciones_id' => $data->opcion_id
										  )
									);
		}

		public function updatePuntaje($empresa_id){
				//nivel 0
			$this->db->select("id");
			$this->db->from("opciones");
			$this->db->like("codigo", "VIABILIDAD_ECONOMICA", "after");
			$this->db->or_like("codigo", "CONTRIBUCION_CONSERVACION", "after");
			$this->db->or_like("codigo", "CICLO_VIDA", "after");
			$this->db->or_like("codigo", "VIDA_UTIL", "after");
			$this->db->or_like("codigo", "SUSTITUCION_MATERIALES", "after");
			$this->db->or_like("codigo", "MATERIALES_RECICLADOS", "after");
			$this->db->or_like("codigo", "SOSTENIBLE_RECURSO", "after");
			$this->db->or_like("codigo", "RESPO_SOCIAL_EMPRESA", "after");
			$this->db->or_like("codigo", "RESPO_SOCIAL_VALOR", "after");
			$this->db->or_like("codigo", "RESPO_SOCIAL_EXTERIOR", "after");
			$this->db->or_like("codigo", "COMUNICACION_ATRIBUTOS", "after");
			$query_opciones = $this->db->get();
			$data_nivel_0 = array();
			foreach ($query_opciones->result() as $key => $value) {
				$data_nivel_0[] = $value->id;
			}

			$this->db->select_avg("nombre", "puntaje");
			$this->db->from("hv2_verificacion");
			$this->db->join("calificacion", "calificacion.id = hv2_verificacion.calificacion_id");
			$this->db->where_in("opciones_id", $data_nivel_0);
			$this->db->where("calificacion_id !=", 4);
			$this->db->where("empresa_id", $empresa_id);
			$query = $this->db->get();
			$nivel_0 =$query->row();

			//nivel 1
			$this->db->select("id");
			$this->db->from("opciones");
			$this->db->like("codigo", "RESPON_SOCIAL_ADICCIONAL", "after");
			$this->db->or_like("codigo", "RESPON_SOCIAL_ADICCIONAL", "after");
			$query_opcion_1 = $this->db->get();
			$data_nivel_1 = array();
			foreach ($query_opcion_1->result() as $key => $value) {
				$data_nivel_1[] = $value->id;
			}

			$this->db->select_avg("nombre", "puntaje_adicional");
			$this->db->from("hv2_verificacion");
			$this->db->join("calificacion", "calificacion.id = hv2_verificacion.calificacion_id");
			$this->db->where_in("opciones_id", $data_nivel_1);
			$this->db->where("calificacion_id !=", 4);
			$this->db->where("empresa_id", $empresa_id);
			$query = $this->db->get();
			$nivel_1 = $query->row();
		
			$this->db->set("puntaje", $nivel_0->puntaje * 100);
			$this->db->set("verificacion2", 1);
			$this->db->set("puntaje_adicional", $nivel_1->puntaje_adicional * 100);
			$this->db->where("id", $empresa_id);
			return $this->db->update("empresa");
		
			/*			$this->db->select_avg("nombre");
			$this->db->from("hv2_verificacion");
			$this->db->join("calificacion", "calificacion.id = hv2_verificacion.calificacion_id");
			$this->db->where("empresa_id", $empresa_id);
			$this->db->where("calificacion_id !=", 4);
			$result = $this->db->get();
			$row = $result->first_row();
			 $this->db->update("empresa", array("puntaje" => floatval($row->nombre)*100),  array('id' => $empresa_id));
			 return $sql;

			*/
		}

		
	}

?>