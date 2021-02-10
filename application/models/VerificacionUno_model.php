<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');


	/**
	* Hoja de Verificacion uno 
	*/
	class VerificacionUno_model extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getComuplimientoLegalOpciones()
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo','CUMPLIMIENTO_LEGAL');
			$result = $this->db->get();
			return $result->result();
		}

		public function getVerificacionEmpresa($empresa_id){
			
			$this->db->select("opciones_id, observacion, nombre, estado_verificacion.id as estado");
			$this->db->from("hv1_verificacion");
			$this->db->join('estado_verificacion', 'hv1_verificacion.estado = estado_verificacion.id');
			$this->db->where('empresa_id',$empresa_id);
			$result = $this->db->get();
			return $result->result();
		}

		public function getCondicionesLaboralesOpciones()
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo','CONDICION_LABORAL');
			$result = $this->db->get();
			return $result->result();
		}

		public function updateState($empresa_id){
			$this->db->set('verificacion1', '1');
			$this->db->where('id', $empresa_id);
			return $this->db->update('empresa');
		}

		public function updateVerificacfionUno($empresa_id){
			$this->db->set('verificacion1', 'verificacion1+1',FALSE);
			$this->db->where('id', $empresa_id);
			return $this->db->update('empresa');
		}

		public function isCompleted($empresa_id){
			$this->db->select("verificacion1");
			$this->db->from("empresa");
			$this->db->where('id',$empresa_id);
			$query = $this->db->get();
			$row = $query->row();
			return $row->verificacion1 == 6;
		}

		public function getImpactoAmbientalOpciones()
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo','IMPACTO_AMBIENTAL');
			$result = $this->db->get();
			return $result->result();
		}

		public function getImpactoAmbientalEmpresa($empresa_id){

		}

		public function getImpactoSocialOpciones()
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo','IMPACTO_SOCIAL');
			$result = $this->db->get();
			return $result->result();
		}

		public function getImpactoSocialEmpresa($empresa_id){

		}

		public function getSustanciasMaterialesOpciones()
		{
			$this->db->from("opciones");
			$this->db->select("id, nombre");
			$this->db->like('codigo','MATERIAL_PELIGROSO');
			$result = $this->db->get();
			return $result->result();
		}

		public function getSustanciaMaterialEmpresa($empresa_id)
		{
			
		}

		public function existeOpcionEmpresa($opcion_id, $empresa_id)
		{
			$query = $this->db->get_where('hv1_verificacion',
											array('empresa_id' => $empresa_id,
									 			  'opciones_id' => $opcion_id
										  ));
			return $query->num_rows() > 0;
		}

		public function guardarOpcion($data, $empresa_id)
		{	
			$insert_data = array(
				'empresa_id' => $empresa_id,
				'opciones_id' => $data->opcion_id,
				'estado' => $data->opcion_estado,
				'observacion' => $data->opcion_descripcion
				);

			return $this->db->insert('hv1_verificacion', $insert_data);
		}

		public function updateOpcion($data, $empresa_id)
		{	
			$update_data = array(
				'estado' => $data->opcion_estado,
				'observacion' => $data->opcion_descripcion
				);

			return $this->db->update('hv1_verificacion', 
									 $update_data, 
									 array('empresa_id' => $empresa_id,
									 		'opciones_id' => $data->opcion_id
										  )
									);
		}

		

		public function lastID(){
			return $this->db->insert_id();
		}

	}

?>