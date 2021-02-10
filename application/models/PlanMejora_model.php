<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');


	/**
	* Hoja de Verificacion uno 
	*/
	class PlanMejora_model extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getOpcionesVerirfiacionUno($filter, $empresa_id)
		{
			$this->db->select("plan_mejora.acciones, plan_mejora.actor, plan_mejora.resultado,
				plan_mejora.mes_1, plan_mejora.mes_2, plan_mejora.mes_3, plan_mejora.mes_4, plan_mejora.mes_5, plan_mejora.mes_6,
				plan_mejora.mes_7, plan_mejora.mes_8, plan_mejora.mes_9, plan_mejora.mes_10, plan_mejora.mes_11, plan_mejora.mes_12, plan_mejora.observacion, opciones.*, hv1_verificacion.*");
			$this->db->from("hv1_verificacion");
			$this->db->join('opciones', 'opciones.id = hv1_verificacion.opciones_id');
			$this->db->join('plan_mejora', 'plan_mejora.opciones_id = opciones.id');
			$this->db->where('hv1_verificacion.estado',"1");
			$this->db->where('hv1_verificacion.empresa_id',$empresa_id);
			$this->db->where('plan_mejora.empresa_id',$empresa_id);
			$this->db->like('opciones.codigo', $filter);
			$result = $this->db->get();

			return $result->result();
		}

		public function getPlanMejora($empresa){
			$this->db->select("*");
			$this->db->from("hv2_verificacion");
		}
		public function getOpcionesVerirfiacionDos($filter, $empresa_id)
		{
			$calificaciones = array("1","2");
			$this->db->select("plan_mejora.acciones, plan_mejora.actor, plan_mejora.resultado,
				plan_mejora.mes_1, plan_mejora.mes_2, plan_mejora.mes_3, plan_mejora.mes_4, plan_mejora.mes_5, plan_mejora.mes_6,
				plan_mejora.mes_7, plan_mejora.mes_8, plan_mejora.mes_9, plan_mejora.mes_10, plan_mejora.mes_11, plan_mejora.mes_12, plan_mejora.observacion, opciones.*, hv2_verificacion.*");
			$this->db->from("hv2_verificacion");
			$this->db->join('opciones', 'opciones.id = hv2_verificacion.opciones_id');
			$this->db->join('plan_mejora', 'plan_mejora.opciones_id = opciones.id');
			$this->db->where_in('hv2_verificacion.calificacion_id',$calificaciones);
			$this->db->where('hv2_verificacion.empresa_id',$empresa_id);
			$this->db->where('plan_mejora.empresa_id',$empresa_id);
			$this->db->like('codigo', $filter);
			//echo $this->db->get_compiled_select();
			$result = $this->db->get();

			return $result->result();
		}

		public function getOpciones($filter)
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo',$filter);
			$result = $this->db->get();
			return $result->result();
		}

		public function guardarPlan($data, $empresa_id){

			$insert_data = array(
				'empresa_id' => $empresa_id,
				'opciones_id' => $data->opcion_id,
				'acciones' => $data->acciones,
				'actor' => $data->actores,
				'resultado' => $data->resultados,
				'mes_1' => $data->mes_1,
				'mes_2' => $data->mes_2,
				'mes_3' => $data->mes_3,
				'mes_4' => $data->mes_4,
				'mes_5' => $data->mes_5,
				'mes_6' => $data->mes_6,
				'mes_7' => $data->mes_7,
				'mes_8' => $data->mes_8,
				'mes_9' => $data->mes_9,
				'mes_10' => $data->mes_10,
				'mes_11' => $data->mes_11,
				'mes_12' => $data->mes_12,
				'observacion' => $data->observaciones
			);
			return $this->db->insert('plan_mejora', $insert_data);
		}
	}

?>