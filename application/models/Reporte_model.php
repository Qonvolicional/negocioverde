<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {
	
	public function getPlanMejoraH1($empresa_id){
		$this->db->select("IFNULL(p.acciones,'') as acciones, IFNULL(p.actor,'') as actor, IFNULL(p.resultado,'') as resultado, IFNULL(mes_1,'') as mes_1, IFNULL(mes_2,'') as mes_2, IFNULL(mes_3,'') as mes_3, IFNULL(mes_4,'') as mes_4,IFNULL(mes_5,'') as mes_5, IFNULL(mes_6,'') as mes_6, IFNULL(mes_7,'') as mes_7,IFNULL(mes_8,'') as mes_8, IFNULL(mes_9,'') as mes_9, IFNULL(mes_10,'') as mes_10, IFNULL(mes_11,'') as mes_11, IFNULL(mes_12,'') as mes_12, IFNULL(p.observacion,'') as observacion, IFNULL(h.estado,'') as estado, IFNULL(o.No,'') as No");
		$this->db->from("opciones o");
		$this->db->join("hv1_verificacion h", "h.opciones_id = o.id", "LEFT");
		$this->db->join("plan_mejora p", "p.opciones_id = o.id", "LEFT");
		$this->db->order_by("o.No","ASC");
		$this->db->where("o.id>", 72);
		$this->db->where("o.id<", 86);
		$this->db->where("h.empresa_id", $empresa_id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getPlanMejoraH2($empresa_id){
		$this->db->select("IFNULL(p.acciones,'') as acciones, IFNULL(p.actor,'') as actor, IFNULL(p.resultado,'') as resultado, IFNULL(mes_1,'') as mes_1, IFNULL(mes_2,'') as mes_2, IFNULL(mes_3,'') as mes_3, IFNULL(mes_4,'') as mes_4,IFNULL(mes_5,'') as mes_5, IFNULL(mes_6,'') as mes_6, IFNULL(mes_7,'') as mes_7,IFNULL(mes_8,'') as mes_8, IFNULL(mes_9,'') as mes_9, IFNULL(mes_10,'') as mes_10, IFNULL(mes_11,'') as mes_11, IFNULL(mes_12,'') as mes_12, IFNULL(p.observacion,'') as observacion, IFNULL(o.No,'') as No");
		$this->db->from("opciones o");
		$this->db->join("hv2_verificacion h", "h.opciones_id = o.id", "LEFT");
		$this->db->join("plan_mejora p", "p.opciones_id = o.id", "LEFT");
		$this->db->where("o.id>", 85);
		$this->db->where("o.id<", 131);
		$this->db->where("h.empresa_id", $empresa_id);
		$this->db->group_by("o.id");
		$this->db->order_by("o.id","ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getRazonSocial($empresa_id){
		$this->db->select("razon_social");
		$this->db->from("empresa");
		$this->db->where("id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getEmpresa($empresa_id){
		$this->db->select("e.razon_social, a.nombre as autoridad, CONCAT(p.nombre1, ' ', p.nombre2, ' ', p.apellido1, ' ', p.apellido2) as representante, e.identificacion as nit, p.celular, p.fijo, p.direccion, p.correo, m.nombre as municipio, d.nombre as departamento, CONCAT(v.nombre1, ' ', v.nombre2, ' ', v.apellido1, ' ', v.apellido2) as verificador, de.descripcion_negocio, de.caracteristica_ambiental, s.nombre as sector, ss.nombre as subsector, c.nombre as categoria, ce.nombre as bien_lider");
		$this->db->from("empresa e");
		$this->db->join("autoridad_ambiental a", "a.id = e.autoridad_ambiental_id");
		$this->db->join("persona p", "e.representante_legal_id = p.id", "LEFT");
		$this->db->join("municipio m", "e.municipio_id = m.id", "LEFT");
		$this->db->join("departamento d", "m.departamento_id = d.id", "LEFT");
		$this->db->join("usuarios u", "u.id = e.verificador_id", "LEFT");
		$this->db->join("persona v", "u.persona_id = v.id", "LEFT");
		$this->db->join("descripcion_empresa de", "e.id = de.empresa_id", "LEFT");
		$this->db->join("subsector ss", "ss.id = e.subsector_id", "LEFT");
		$this->db->join("sector s", "s.id = ss.sector_id", "LEFT");
		$this->db->join("categoria c", "c.id = s.categoria_id", "LEFT");
		$this->db->join("caracterizacion_empresa_bien_servicio ce", "ce.empresa_id = e.id and ce.lider_estado = 1", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$resultado = $this->db->get();
		return $resultado->row_array();

	}

	public function getMads(){
		$this->db->select("e.id, re.nombre as region, e.razon_social, a.nombre as autoridad, CONCAT(p.nombre1, ' ', p.nombre2, ' ', p.apellido1, ' ', p.apellido2) as representante, e.identificacion as nit, p.celular, p.fijo, p.direccion, p.correo, m.nombre as municipio, d.nombre as departamento, CONCAT(v.nombre1, ' ', v.nombre2, ' ', v.apellido1, ' ', v.apellido2) as verificador, de.descripcion_negocio, de.caracteristica_ambiental, s.nombre as sector, ss.nombre as subsector, c.nombre as categoria, IF(e.plan_mejora = 1, 'Si', 'No') as plan_mejora, SUM(se.ventas_anual) as venta_total, SUM(se.costo_produccion) as costo_total, cebs.nombre as bien_lider, ee.nombre as etapa, IF(coe.constitucion_legal_estado=1, 'Si', 'No') as constitucion_legal, IF(coe.opera_actualmente_estado=1, 'Si', 'No') as opera_actualmente,
			MAX(CASE WHEN ae.actividad_id = 1 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad1,
			MAX(CASE WHEN ae.actividad_id = 2 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad2,
			MAX(CASE WHEN ae.actividad_id = 3 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad3,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA1%' THEN hc.nombre END) as nivel1,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA2%' THEN hc.nombre END) as nivel2,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA3%' THEN hc.nombre END) as nivel3,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA4%' THEN hc.nombre END) as nivel4,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA5%' THEN hc.nombre END) as nivel5,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION1%' THEN hc.nombre END) as nivel6,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION2%' THEN hc.nombre END) as nivel7,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION3%' THEN hc.nombre END) as nivel8,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION4%' THEN hc.nombre END) as nivel9,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION5%' THEN hc.nombre END) as nivel10,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION6%' THEN hc.nombre END) as nivel11,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION7%' THEN hc.nombre END) as nivel12,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION8%' THEN hc.nombre END) as nivel13,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA1%' THEN hc.nombre END) as nivel14,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA2%' THEN hc.nombre END) as nivel15,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA3%' THEN hc.nombre END) as nivel16,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA4%' THEN hc.nombre END) as nivel17,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA5%' THEN hc.nombre END) as nivel18,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL1%' THEN hc.nombre END) as nivel19,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL2%' THEN hc.nombre END) as nivel20,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL3%' THEN hc.nombre END) as nivel21,
			MAX(CASE WHEN oh.codigo like '%SUSTITUCION_MATERIALES1%' THEN hc.nombre END) as nivel22,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS1%' THEN hc.nombre END) as nivel23,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS2%' THEN hc.nombre END) as nivel24,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS3%' THEN hc.nombre END) as nivel25,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS4%' THEN hc.nombre END) as nivel26,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO1%' THEN hc.nombre END) as nivel27,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO2%' THEN hc.nombre END) as nivel28,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO3%' THEN hc.nombre END) as nivel29,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO4%' THEN hc.nombre END) as nivel30,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO5%' THEN hc.nombre END) as nivel31,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO6%' THEN hc.nombre END) as nivel32,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA1%' THEN hc.nombre END) as nivel33,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA2%' THEN hc.nombre END) as nivel34,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA3%' THEN hc.nombre END) as nivel35,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR1%' THEN hc.nombre END) as nivel36,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR2%' THEN hc.nombre END) as nivel37,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR3%' THEN hc.nombre END) as nivel38,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR1%' THEN hc.nombre END) as nivel39,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR2%' THEN hc.nombre END) as nivel40,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR3%' THEN hc.nombre END) as nivel41,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR4%' THEN hc.nombre END) as nivel42,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR5%' THEN hc.nombre END) as nivel43,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR6%' THEN hc.nombre END) as nivel44,
			MAX(CASE WHEN oh.codigo like '%COMUNICACION_ATRIBUTOS1%' THEN hc.nombre END) as nivel45,
			MAX(CASE WHEN oh.codigo like '%COMUNICACION_ATRIBUTOS2%' THEN hc.nombre END) as nivel46,
			MAX(CASE WHEN oh.codigo like '%ESQUEMAS_RECONOCIMIENTOS1%' THEN hc.nombre END) as nivel47,
			MAX(CASE WHEN oh.codigo like '%ESQUEMAS_RECONOCIMIENTOS2%' THEN hc.nombre END) as nivel48,
			MAX(CASE WHEN oh.codigo like '%RESPON_SOCIAL_ADICCIONAL1%' THEN hc.nombre END) as nivel49,
			MAX(CASE WHEN oh.codigo like '%RESPON_SOCIAL_ADICCIONAL2%' THEN hc.nombre END) as nivel50
			");
		$this->db->from("empresa e");
		$this->db->join("autoridad_ambiental a", "a.id = e.autoridad_ambiental_id");
		$this->db->join("region re", "a.region_id = re.id");
		$this->db->join("persona p", "e.representante_legal_id = p.id", "LEFT");
		$this->db->join("municipio m", "e.municipio_id = m.id", "LEFT");
		$this->db->join("departamento d", "m.departamento_id = d.id", "LEFT");
		$this->db->join("usuarios u", "u.id = e.verificador_id", "LEFT");
		$this->db->join("persona v", "u.persona_id = v.id", "LEFT");
		$this->db->join("descripcion_empresa de", "e.id = de.empresa_id", "LEFT");
		$this->db->join("subsector ss", "ss.id = e.subsector_id", "LEFT");
		$this->db->join("caracterizacion_empresa_bien_servicio cebs", "cebs.empresa_id = e.id AND cebs.lider_estado = 1", "LEFT");
		$this->db->join("caracterizacion_organizacion_empresa coe", "coe.empresa_id = e.id", "LEFT");
		$this->db->join("actividad_empresa ae", "ae.empresa_id = e.id", "LEFT");
		$this->db->join("sector s", "s.id = ss.sector_id", "LEFT");
		$this->db->join("categoria c", "c.id = s.categoria_id", "LEFT");
		$this->db->join("etapa_empresa ee", "ee.id = e.etapa_empresa_id", "LEFT");
		$this->db->join("sost_economica se", "e.id = se.empresa_id", "LEFT");
		$this->db->join("hv2_verificacion h", "e.id = h.empresa_id", "LEFT");
		$this->db->join("opciones oh", "oh.id = h.opciones_id");
		$this->db->join("calificacion hc", "h.calificacion_id = hc.id", "LEFT");
		//$this->db->where("e.verificacion2", 1);
		$this->db->group_by("e.id");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getInformacionEmpleado($empresa_id){
		$this->db->select("e.id, MAX(CASE WHEN ees.socio_empleado_id=1 AND ees.sexo_id = 1 THEN ees.cantidad END) as socio_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 1 AND ees.sexo_id = 2 THEN ees.cantidad END) as socio_femenino,
			MAX(CASE WHEN ees.socio_empleado_id = 2 AND ees.sexo_id = 1 THEN ees.cantidad END) as vinculado_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 2 AND ees.sexo_id = 2 THEN ees.cantidad END) as vinculado_femenino,
			MAX(CASE WHEN ees.socio_empleado_id = 3 AND ees.sexo_id = 1 THEN ees.cantidad END) as empleado_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 3 AND ees.sexo_id = 2 THEN ees.cantidad END) as empleado_femenino");
		$this->db->from("empresa e");
		$this->db->join("empresa_empleado_sexo ees", "ees.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getCaracteristicaEdad($empresa_id){
		$this->db->select("e.id,  MAX(CASE WHEN eee.rango_edad_id = 1 THEN eee.cantidad END) as empleado_rango_edad1,
			MAX(CASE WHEN eee.rango_edad_id = 2 THEN eee.cantidad END) as empleado_rango_edad2,
			MAX(CASE WHEN eee.rango_edad_id = 3 THEN eee.cantidad END) as empleado_rango_edad3");
		$this->db->from("empresa e");
		$this->db->join("empresa_empleado_edad eee", "eee.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getCaracteristicaEscolaridad($empresa_id){
		$this->db->select("e.id,  MAX(CASE WHEN cee.nivel_id = 1 THEN cee.cantidad END) as nivel_primaria,
			MAX(CASE WHEN cee.nivel_id = 2 THEN cee.cantidad END) as nivel_bachillerato,
			MAX(CASE WHEN cee.nivel_id = 3 THEN cee.cantidad END) as nivel_tecnico,
			MAX(CASE WHEN cee.nivel_id = 4 THEN cee.cantidad END) as nivel_universitario,
			MAX(CASE WHEN cee.nivel_id = 5 THEN cee.cantidad END) as nivel_otros");
		$this->db->from("empresa e");
		$this->db->join("caracterizacion_empleado_educativo cee", "cee.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}
	
	public function getCaracteristicaDemografia($empresa_id){
		$this->db->select("e.id,  MAX(CASE WHEN cde.demografia_id = 1 AND cde.estado = 1 THEN cde.cantidad END) as demografia1,
			MAX(CASE WHEN cde.demografia_id = 2 AND cde.estado = 1 THEN cde.cantidad END) as demografia2,
			MAX(CASE WHEN cde.demografia_id = 3 AND cde.estado = 1 THEN cde.cantidad END) as demografia3,
			MAX(CASE WHEN cde.demografia_id = 4 AND cde.estado = 1 THEN cde.cantidad END) as demografia4,
			MAX(CASE WHEN cde.demografia_id = 5 AND cde.estado = 1 THEN cde.cantidad END) as demografia5,
			MAX(CASE WHEN cde.demografia_id = 6 AND cde.estado = 1 THEN cde.cantidad END) as demografia6,
			MAX(CASE WHEN cde.demografia_id = 7 AND cde.estado = 1 THEN cde.cantidad END) as demografia7");
		$this->db->from("empresa e");
		$this->db->join("caracterizacion_demografia_empresa cde", "cde.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getCaracteristicaVinculacion($empresa_id){
		$this->db->select("e.id,  MAX(CASE WHEN cve.vinculacion_id = 1 THEN cve.cantidad END) as vinculacion_indefinido,
			MAX(CASE WHEN cve.vinculacion_id = 2 THEN cve.cantidad END) as vinculacion_definido,
			MAX(CASE WHEN cve.vinculacion_id = 3 THEN cve.cantidad END) as vinculacion_dias");
		$this->db->from("empresa e");
		$this->db->join("caracterizacion_vinculacion_empresa cve", "cve.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}
	public function getLegislacion($empresa_id){
		$this->db->select("e.id,  MAX(CASE WHEN pe.opciones_id = 22 THEN IF(pe.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_permiso1,
			MAX(CASE WHEN pe.opciones_id = 22 THEN IF(pe.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_permiso1,
			MAX(CASE WHEN pe.opciones_id = 23 THEN IF(pe.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_permiso2,
			MAX(CASE WHEN pe.opciones_id = 23 THEN IF(pe.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_permiso2,
			MAX(CASE WHEN pe.opciones_id = 24 THEN IF(pe.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_permiso3,
			MAX(CASE WHEN pe.opciones_id = 24 THEN IF(pe.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_permiso3,
			MAX(CASE WHEN pe.opciones_id = 25 THEN IF(pe.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_permiso4,
			MAX(CASE WHEN pe.opciones_id = 25 THEN IF(pe.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_permiso4,
			MAX(CASE WHEN pe.opciones_id = 26 THEN IF(pe.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_permiso5,
			MAX(CASE WHEN pe.opciones_id = 26 THEN IF(pe.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_permiso5,
			MAX(CASE WHEN re.opciones_id = 18 THEN IF(re.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_registro1,
			MAX(CASE WHEN re.opciones_id = 18 THEN IF(re.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_registro1,
			MAX(CASE WHEN re.opciones_id = 19 THEN IF(re.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_registro2,
			MAX(CASE WHEN re.opciones_id = 19 THEN IF(re.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_registro2,
			MAX(CASE WHEN re.opciones_id = 20 THEN IF(re.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_registro3,
			MAX(CASE WHEN re.opciones_id = 20 THEN IF(re.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_registro3,
			MAX(CASE WHEN re.opciones_id = 21 THEN IF(re.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_registro4,
			MAX(CASE WHEN re.opciones_id = 21 THEN IF(re.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_registro4,
			MAX(CASE WHEN li.opciones_id = 27 THEN IF(li.aplica_noaplica_id = 1, 'Aplica','No Aplica') END) as aplica_licencia1,
			MAX(CASE WHEN li.opciones_id = 27 THEN IF(li.cumple_nocumple_id = 1,'Cumple','No Cumple') END) as cumple_licencia1");
		$this->db->from("empresa e");
		$this->db->join("permiso pe", "pe.empresa_id = e.id", "LEFT");
		$this->db->join("registro re", "re.empresa_id = e.id", "LEFT");
		$this->db->join("licencia li", "li.empresa_id = e.id", "LEFT");
		$this->db->where("e.id", $empresa_id);
		$this->db->group_by("e.id");
		$resultado = $this->db->get();
		return $resultado->row_array();
	}

	public function getMads2(){
		$this->db->select("78e.razon_social, a.nombre as autoridad, CONCAT(p.nombre1, ' ', p.nombre2, ' ', p.apellido1, ' ', p.apellido2) as representante, e.identificacion as nit, p.celular, p.fijo, p.direccion, p.correo, m.nombre as municipio, d.nombre as departamento, CONCAT(v.nombre1, ' ', v.nombre2, ' ', v.apellido1, ' ', v.apellido2) as verificador, de.descripcion_negocio, de.caracteristica_ambiental, s.nombre as sector, ss.nombre as subsector, c.nombre as categoria, IF(e.plan_mejora = 1, 'Si', 'No') as plan_mejora, SUM(se.ventas_anual) as venta_total, SUM(se.costo_produccion) as costo_total, cebs.nombre as bien_lider, ee.nombre as etapa, IF(coe.constitucion_legal_estado=1, 'Si', 'No') as constitucion_legal, IF(coe.opera_actualmente_estado=1, 'Si', 'No') as opera_actualmente,
			MAX(CASE WHEN ees.socio_empleado_id = 1 AND ees.sexo_id = 1 THEN ees.cantidad END) as socio_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 1 AND ees.sexo_id = 2 THEN ees.cantidad END) as socio_femenino,
			MAX(CASE WHEN ees.socio_empleado_id = 2 AND ees.sexo_id = 1 THEN ees.cantidad END) as vinculado_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 2 AND ees.sexo_id = 2 THEN ees.cantidad END) as vinculado_femenino,
			MAX(CASE WHEN ees.socio_empleado_id = 3 AND ees.sexo_id = 1 THEN ees.cantidad END) as empleado_masculino,
			MAX(CASE WHEN ees.socio_empleado_id = 3 AND ees.sexo_id = 2 THEN ees.cantidad END) as empleado_femenino,
			MAX(CASE WHEN cve.vinculacion_id = 1 THEN cve.cantidad END) as vinculacion_indefinido,
			MAX(CASE WHEN cve.vinculacion_id = 2 THEN cve.cantidad END) as vinculacion_definido,
			MAX(CASE WHEN cve.vinculacion_id = 3 THEN cve.cantidad END) as vinculacion_dias,
			MAX(CASE WHEN eee.rango_edad_id = 1 THEN eee.cantidad END) as empleado_rango_edad1,
			MAX(CASE WHEN eee.rango_edad_id = 2 THEN eee.cantidad END) as empleado_rango_edad2,
			MAX(CASE WHEN eee.rango_edad_id = 3 THEN eee.cantidad END) as empleado_rango_edad3,
			MAX(CASE WHEN cee.nivel_id = 1 THEN cee.cantidad END) as nivel_primaria,
			MAX(CASE WHEN cee.nivel_id = 2 THEN cee.cantidad END) as nivel_bachillerato,
			MAX(CASE WHEN cee.nivel_id = 3 THEN cee.cantidad END) as nivel_tecnico,
			MAX(CASE WHEN cee.nivel_id = 4 THEN cee.cantidad END) as nivel_universitario,
			MAX(CASE WHEN cee.nivel_id = 5 THEN cee.cantidad END) as nivel_otros,
			MAX(CASE WHEN cde.demografia_id = 1 AND cde.estado = 1 THEN cde.cantidad END) as demografia1,
			MAX(CASE WHEN cde.demografia_id = 2 AND cde.estado = 1 THEN cde.cantidad END) as demografia2,
			MAX(CASE WHEN cde.demografia_id = 3 AND cde.estado = 1 THEN cde.cantidad END) as demografia3,
			MAX(CASE WHEN cde.demografia_id = 4 AND cde.estado = 1 THEN cde.cantidad END) as demografia4,
			MAX(CASE WHEN cde.demografia_id = 5 AND cde.estado = 1 THEN cde.cantidad END) as demografia5,
			MAX(CASE WHEN cde.demografia_id = 6 AND cde.estado = 1 THEN cde.cantidad END) as demografia6,
			MAX(CASE WHEN cde.demografia_id = 7 AND cde.estado = 1 THEN cde.cantidad END) as demografia7,
			MAX(CASE WHEN ae.actividad_id = 1 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad1,
			MAX(CASE WHEN ae.actividad_id = 2 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad2,
			MAX(CASE WHEN ae.actividad_id = 3 AND ae.confirmacion = 1 THEN 'Si' ELSE 'No' END) as actividad3,
			MAX(CASE WHEN pe.opciones_id = 22 AND pe.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_permiso1,
			MAX(CASE WHEN pe.opciones_id = 22 AND pe.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_permiso1,
			MAX(CASE WHEN pe.opciones_id = 23 AND pe.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_permiso2,
			MAX(CASE WHEN pe.opciones_id = 23 AND pe.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_permiso2,
			MAX(CASE WHEN pe.opciones_id = 24 AND pe.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_permiso3,
			MAX(CASE WHEN pe.opciones_id = 24 AND pe.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_permiso3,
			MAX(CASE WHEN pe.opciones_id = 25 AND pe.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_permiso4,
			MAX(CASE WHEN pe.opciones_id = 25 AND pe.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_permiso4,
			MAX(CASE WHEN pe.opciones_id = 26 AND pe.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_permiso5,
			MAX(CASE WHEN pe.opciones_id = 26 AND pe.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_permiso5,
			MAX(CASE WHEN re.opciones_id = 18 AND re.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_registro1,
			MAX(CASE WHEN re.opciones_id = 18 AND re.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_registro1,
			MAX(CASE WHEN re.opciones_id = 19 AND re.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_registro2,
			MAX(CASE WHEN re.opciones_id = 19 AND re.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_registro2,
			MAX(CASE WHEN re.opciones_id = 20 AND re.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_registro3,
			MAX(CASE WHEN re.opciones_id = 20 AND re.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_registro3,
			MAX(CASE WHEN re.opciones_id = 21 AND re.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_registro4,
			MAX(CASE WHEN re.opciones_id = 21 AND re.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_registro4,
			MAX(CASE WHEN li.opciones_id = 27 AND li.aplica_noaplica_id = 1 THEN 'Aplica' ELSE 'No Aplica' END) as aplica_licencia1,
			MAX(CASE WHEN li.opciones_id = 27 AND li.cumple_nocumple_id = 1 THEN 'Cumple' ELSE 'No Cumple' END) as cumple_licencia1,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA1%' THEN hc.nombre END) as nivel1,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA2%' THEN hc.nombre END) as nivel2,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA3%' THEN hc.nombre END) as nivel3,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA4%' THEN hc.nombre END) as nivel4,
			MAX(CASE WHEN oh.codigo like '%VIABILIDAD_ECONOMICA5%' THEN hc.nombre END) as nivel5,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION1%' THEN hc.nombre END) as nivel6,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION2%' THEN hc.nombre END) as nivel7,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION3%' THEN hc.nombre END) as nivel8,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION4%' THEN hc.nombre END) as nivel9,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION5%' THEN hc.nombre END) as nivel10,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION6%' THEN hc.nombre END) as nivel11,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION7%' THEN hc.nombre END) as nivel12,
			MAX(CASE WHEN oh.codigo like '%CONTRIBUCION_CONSERVACION8%' THEN hc.nombre END) as nivel13,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA1%' THEN hc.nombre END) as nivel14,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA2%' THEN hc.nombre END) as nivel15,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA3%' THEN hc.nombre END) as nivel16,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA4%' THEN hc.nombre END) as nivel17,
			MAX(CASE WHEN oh.codigo like '%CICLO_VIDA5%' THEN hc.nombre END) as nivel18,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL1%' THEN hc.nombre END) as nivel19,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL2%' THEN hc.nombre END) as nivel20,
			MAX(CASE WHEN oh.codigo like '%VIDA_UTIL3%' THEN hc.nombre END) as nivel21,
			MAX(CASE WHEN oh.codigo like '%SUSTITUCION_MATERIALES1%' THEN hc.nombre END) as nivel22,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS1%' THEN hc.nombre END) as nivel23,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS2%' THEN hc.nombre END) as nivel24,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS3%' THEN hc.nombre END) as nivel25,
			MAX(CASE WHEN oh.codigo like '%MATERIALES_RECICLADOS4%' THEN hc.nombre END) as nivel26,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO1%' THEN hc.nombre END) as nivel27,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO2%' THEN hc.nombre END) as nivel28,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO3%' THEN hc.nombre END) as nivel29,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO4%' THEN hc.nombre END) as nivel30,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO5%' THEN hc.nombre END) as nivel31,
			MAX(CASE WHEN oh.codigo like '%SOSTENIBLE_RECURSO6%' THEN hc.nombre END) as nivel32,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA1%' THEN hc.nombre END) as nivel33,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA2%' THEN hc.nombre END) as nivel34,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EMPRESA3%' THEN hc.nombre END) as nivel35,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR1%' THEN hc.nombre END) as nivel36,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR2%' THEN hc.nombre END) as nivel37,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_VALOR3%' THEN hc.nombre END) as nivel38,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR1%' THEN hc.nombre END) as nivel39,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR2%' THEN hc.nombre END) as nivel40,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR3%' THEN hc.nombre END) as nivel41,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR4%' THEN hc.nombre END) as nivel42,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR5%' THEN hc.nombre END) as nivel43,
			MAX(CASE WHEN oh.codigo like '%RESPO_SOCIAL_EXTERIOR6%' THEN hc.nombre END) as nivel44,
			MAX(CASE WHEN oh.codigo like '%COMUNICACION_ATRIBUTOS1%' THEN hc.nombre END) as nivel45,
			MAX(CASE WHEN oh.codigo like '%COMUNICACION_ATRIBUTOS2%' THEN hc.nombre END) as nivel46,
			MAX(CASE WHEN oh.codigo like '%ESQUEMAS_RECONOCIMIENTOS1%' THEN hc.nombre END) as nivel47,
			MAX(CASE WHEN oh.codigo like '%ESQUEMAS_RECONOCIMIENTOS2%' THEN hc.nombre END) as nivel48,
			MAX(CASE WHEN oh.codigo like '%RESPON_SOCIAL_ADICCIONAL1%' THEN hc.nombre END) as nivel49,
			MAX(CASE WHEN oh.codigo like '%RESPON_SOCIAL_ADICCIONAL2%' THEN hc.nombre END) as nivel50,
			AVG(CASE WHEN h.opciones_id IN(86,87,88,89,137) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom1,
			AVG(CASE WHEN (h.opciones_id BETWEEN 90 AND 97) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom2, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 98 AND 102) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom3, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 103 AND 105) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom4, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 106 AND 106) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom5, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 107 AND 110) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom6, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 111 AND 116) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom7, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 117 AND 119) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom8, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 120 AND 122) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom9, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 123 AND 128) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom10, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 129 AND 130) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom11, 
			AVG(CASE WHEN (h.opciones_id BETWEEN 133 AND 134) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom12,
			AVG(CASE WHEN (h.opciones_id BETWEEN 135 AND 136) AND hc.nombre <> 'N/A' THEN hc.nombre END)*100 as prom13 
			");
		$this->db->from("empresa e");
		$this->db->join("autoridad_ambiental a", "a.id = e.autoridad_ambiental_id");
		$this->db->join("persona p", "e.representante_legal_id = p.id", "LEFT");
		$this->db->join("municipio m", "e.municipio_id = m.id", "LEFT");
		$this->db->join("departamento d", "m.departamento_id = d.id", "LEFT");
		$this->db->join("usuarios u", "u.id = e.verificador_id", "LEFT");
		$this->db->join("persona v", "u.persona_id = v.id", "LEFT");
		$this->db->join("descripcion_empresa de", "e.id = de.empresa_id", "LEFT");
		$this->db->join("subsector ss", "ss.id = e.subsector_id", "LEFT");
		$this->db->join("empresa_empleado_sexo ees", "ees.empresa_id = e.id", "LEFT");
		$this->db->join("caracterizacion_vinculacion_empresa cve", "cve.empresa_id = e.id", "LEFT");
		$this->db->join("empresa_empleado_edad eee", "eee.empresa_id = e.id", "LEFT");
		$this->db->join("caracterizacion_empleado_educativo cee", "cee.empresa_id = e.id", "LEFT");
		$this->db->join("caracterizacion_demografia_empresa cde", "cde.empresa_id = e.id", "LEFT");
		$this->db->join("caracterizacion_empresa_bien_servicio cebs", "cebs.empresa_id = e.id AND cebs.lider_estado = 1", "LEFT");
		$this->db->join("caracterizacion_organizacion_empresa coe", "coe.empresa_id = e.id", "LEFT");
		$this->db->join("permiso pe", "pe.empresa_id = e.id", "LEFT");
		$this->db->join("registro re", "re.empresa_id = e.id", "LEFT");
		$this->db->join("licencia li", "li.empresa_id = e.id", "LEFT");
		$this->db->join("actividad_empresa ae", "ae.empresa_id = e.id", "LEFT");
		$this->db->join("sector s", "s.id = ss.sector_id", "LEFT");
		$this->db->join("categoria c", "c.id = s.categoria_id", "LEFT");
		$this->db->join("etapa_empresa ee", "ee.id = e.etapa_empresa_id", "LEFT");
		$this->db->join("sost_economica se", "e.id = se.empresa_id", "LEFT");
		$this->db->join("hv2_verificacion h", "e.id = h.empresa_id", "LEFT");
		$this->db->join("opciones oh", "oh.id = h.opciones_id");
		$this->db->join("calificacion hc", "h.calificacion_id = hc.id", "LEFT");
		//$this->db->where("e.verificacion2", 1);
		$this->db->group_by("e.id");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}
	

	public function getPromedios($empresa_id){
		$promedioUno = array(
			$this->getPromedioUno($empresa_id, array(86,87,88,89,137)),//prom1
			$this->getPromedio($empresa_id, 90, 97),//prom2
			$this->getPromedio($empresa_id, 98, 102),//prom3
			$this->getPromedio($empresa_id, 103, 105),//prom4
			$this->getPromedio($empresa_id, 106, 106),//prom5
			$this->getPromedio($empresa_id, 107, 110),//prom6
			$this->getPromedio($empresa_id, 111, 116),//prom7
			$this->getPromedio($empresa_id, 117, 119),//prom8
			$this->getPromedio($empresa_id, 120, 122),//prom9
			$this->getPromedio($empresa_id, 123, 128),//prom10
			$this->getPromedio($empresa_id, 129, 130),//prom11
		);
		$promedioDos = array(
			$this->getPromedio($empresa_id, 133, 134),
			$this->getPromedio($empresa_id, 135, 136),
		);
		$promTotal1 = round(array_sum($promedioUno)/count($promedioUno),2);
		$promTotal2 = round(array_sum($promedioDos)/count($promedioDos),2);
		$promTotal3 = round(($promTotal1+$promTotal2)/2,2);
		
		if ($promTotal1 >= 0 && $promTotal1 <= 0.10) {
			$categoria = 'Inicial';
		}else if ($promTotal1 > 0.10 && $promTotal1 <= 0.30) {
			$categoria = 'Básico';
		}else if ($promTotal1 > 0.30 && $promTotal1 <= 0.50) {
			$categoria = 'Intermedio';
		}else if ($promTotal1 > 0.50 && $promTotal1 <= 0.80) {
			$categoria = 'Satisfactorio';
		}else if ($promTotal1 > 0.80 && $promTotal1 <= 1 && $promTotal2 < 0.50) {
			$categoria = 'Avanzado';
		}else if ($promTotal1 > 0.80 && $promTotal1 <= 1 && $promTotal2 >= 0.50 ) {
			$categoria = 'Ideal';
		}

		$promedios = array(
			'empresa'=>$this->getEmpresa($empresa_id),
			'p1'=> $promedioUno,
			'p2'=> $promedioDos,
			'promTotal1' => $promTotal1,
			'promTotal2' => $promTotal2,
			'nivelEmpresa' => $categoria,
		);
		return $promedios;
	}

	public function getPromedioUno($empresa_id, $opciones){
		$this->db->select("COUNT(*) as division, sum(c.nombre) as suma");
		$this->db->from("hv2_verificacion h");
		$this->db->join("calificacion c", "c.id = h.calificacion_id AND c.nombre <> 'N/A'");
		$this->db->where_in("h.opciones_id", $opciones);
		$this->db->where("h.empresa_id", $empresa_id);
		$resultado = $this->db->get();
		$resultados = $resultado->row_array();
		if(!$resultados['division'] || !$resultados['suma']){
			$promedio = 0;
		}else{
			$promedio = round($resultados['suma']/$resultados['division'],2);
		}
		return $promedio;
	}

	public function getPromedio($empresa_id, $inferior, $superior){
		$this->db->select("COUNT(*) as division, sum(c.nombre) as suma");
		$this->db->from("hv2_verificacion h");
		$this->db->join("calificacion c", "c.id = h.calificacion_id AND c.nombre <> 'N/A'");
		$this->db->where("h.opciones_id >=", $inferior);
		$this->db->where("h.opciones_id <=", $superior);
		$this->db->where("h.empresa_id", $empresa_id);
		$resultado = $this->db->get();
		$resultado = $resultado->row_array();
		if(!$resultado['division'] || !$resultado['suma']){
			$promedio = 0;
		}else{
			$promedio = round($resultado['suma']/$resultado['division'],2);
		}
		return $promedio;
	}



}