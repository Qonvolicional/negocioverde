<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');





function verificar_negocio($puntaje, $criterio_adicional)

{

		$resultado = "Inicial";

		if($puntaje > 10 && $puntaje <= 30){

						$resultado = "Básico";

		}elseif ($puntaje > 30 && $puntaje <= 50) {

						$resultado = 'Intermedio';

		}elseif ($puntaje > 50 && $puntaje <= 80) {

					$resultado = 'Satisfactorio';

		}elseif ($puntaje > 80 && $puntaje <= 100 && $criterio_adicional < 50) {

							$resultado = 'Avanzado';

		}elseif($puntaje > 80 && $puntaje <= 100 && $criterio_adicional >= 50){

							$resultado = 'Ideal';

		}



  return $resultado;

}



function verificar_negocio_color($puntaje, $criterio_adicional)

{

		$resultado = "rgba(237, 125, 49, 1)";

		if($puntaje > 10 && $puntaje <= 30){

						$resultado = "rgba(244, 176, 132, 1)";

		}elseif ($puntaje > 30 && $puntaje <= 50) {

						$resultado = "rgba(169, 208, 142, 1)";

		}elseif ($puntaje > 50 && $puntaje <= 80) {

					$resultado = "rgba(201, 201, 201, 1)";

		}elseif ($puntaje > 80 && $puntaje <= 100 && $criterio_adicional < 50) {

							$resultado = "rgba(165, 165, 165, 1)";

		}elseif($puntaje > 80 && $puntaje <= 100 && $criterio_adicional >= 50){

							$resultado = "rgba(71, 247, 29, 1)";

		}



  return $resultado;

}





function meses_nombre_a_numero($mes){

	$mes = explode(" ", $mes);

	$mes= $mes[0];

	$tipos = array(

			'Enero' => '01',

			'Febrero' => '02',

			'Abril' => '02',

			'Marzo' => '04',

			'Mayo' => '05',

			'Junio' => '06',

			'Julio' => '07',

			'Agosto' => '08',

			'Septiembre' => '09',

			'Octubre' => '10',

			'Noviembre' => '11',

			'Diciembre' => '12'

				);



	

	if(array_key_exists($mes, $tipos)){

		return $tipos[$mes];

	}else{

		return "01";

	}

}



function actividad_confirmacion($estado){

		$estado = explode(" ", $estado);

	$estado= $estado[0];

	if($estado == "x"){

		return True;

	}



	return False;

}



function siNoEstado_boolean($estado){

	$estado = explode(" ", $estado);

	$estado= $estado[0];

	$tipos = array(

				'SÍ' => True,

				'SI' => True,

				'NO' => False,

			);



	if(array_key_exists($estado, $tipos)){

		

		return $tipos[$estado];

	}else{

		return False;

	}

}



function calificacion_verificacion($calificacion_id){

	$calificacion_id = explode(",", $calificacion_id);

	$calificacion_id= $calificacion_id[0];

	$tipos = array(

				'0' => 1,

				'05' => 2,

				'1' => 3,

				'N/A' => 4,

			);



	if(array_key_exists($calificacion_id, $tipos)){

		

		return $tipos[$calificacion_id];

	}else{

		return 4;

	}

}



function orienacion_entidad($entidad){

	/**

	 * 1 	Privada

	 * 2 	Pública

	 * 3 	ONG

	 * 4 	Otra

	 */

	$entidad = explode(" ", $entidad);

	$entidad= $entidad[0];

	$tipos = array(

				'Pública' => 1,

				'Privada' => 2,

				'ONG' => 3,

				'Otra' => 4,

			);



	if(array_key_exists($entidad, $tipos)){

		

		return $tipos[$entidad];

	}else{

		return 2;

	}

}



function actividad_involucra($estado)

{

	$estado = explode(" ", $estado);

	$estado= $estado[0];

	$tipos = array(

				'SÍ' => 1,

				'SI' => 1,

				'Si' => 1,

				'NO' => 2,

				'No' => 2,

			);



	if(array_key_exists($estado, $tipos)){

		

		return $tipos[$estado];

	}else{

		return 2;

	}

}





function etapa_empresa($etapa){

	$etapa = explode(" ", $etapa);

	$etapa = implode("",$etapa);

	$tipos = array(

			'InversiónInicial' => 2,

			'Idea' => 1,

			'Despegue' => 3,

			'Consolidación' => 5,

			'Expansión' => 4,

			);



	if(array_key_exists($etapa, $tipos)){

		return $tipos[$etapa];

	}else{

		return 1;

	}				

}





function tipo_identificacion($identificacion){

		$identificacion = explode(" ", $identificacion);

	$identificacion= $identificacion[0];

	$tipos = array(

			'NIT' => 4,

			'Céduladeciudadanía' => 1,

			'CC' => 1,

			'RC' => 3,

			'TI' => 2,

			'Registro civil' => 3

			);



	if(array_key_exists($identificacion, $tipos)){

		return $tipos[$identificacion];

	}else{

		return 1;

	}

}



function tipo_persona($tipoPersona){

	$tipoPersona = explode(" ", $tipoPersona);

	$tipoPersona= $tipoPersona[0];

	$tipos = array(

			'Natural' => 1,

			'Jurídica' => 2,

			'Juridica' => 2,

			);



	if(array_key_exists($tipoPersona, $tipos)){

		return $tipos[$tipoPersona];

	}else{

		return 1;

	}

}



 function encriptar($clave){

		/**

		 * Observe que la sal se genera aleatoriamente aquí.

		 * No use nunca una sal estática o una que no se genere aleatoriamente.

		 *

		 * Para la GRAN mayoría de los casos de uso, dejar que password_hash genere la sal aleatoriamente

		 */

		$opciones = array(

		    'cost' => 11,

		    'salt' => random_bytes(30),

		);

		$resultado = pasword_hash($clave, PASSWORD_BCRYPT, $opciones);

		return $resultado;

	}



function siNoEstado($estado){

	$estado = explode(" ", $estado);

	$estado= $estado[0];

	$tipos = array(

				'SÍ' => 1,

				'SI' => 1,

				'NO' => 2,

			);



	if(array_key_exists($estado, $tipos)){

		

		return $tipos[$estado];

	}else{

		return 3;

	}

}



function estado_aplica($estado){

	$estado = explode(" ", $estado);

	$estado= implode("",$estado);

	$tipos = array(

				'Aplica' => 1,

				'Noaplica' => 2,

			);



	if(array_key_exists($estado, $tipos)){

		

		return $tipos[$estado];

	}else{

		return 2;

	}

}



function estado_cumple($estado){

	$estado = explode(" ", $estado);

	$estado= implode("",$estado);

	$tipos = array(

				'Cumple' => 1,

				'Nocumple' => 2,

			);

	if(array_key_exists($estado, $tipos)){

		

		return $tipos[$estado];

	}else{

		return 2;

	}

}



function tamanoEmpresa($tempresa){

	$tempresa = explode(" ", $tempresa);

	$tempresa= $tempresa[0];

	$tipos = array(

			'Microempresa' => 2,

			'PequeñaEmpresa' => 3,

			'MedianaEmpresa' => 4,

			);



	

	if(array_key_exists($tempresa, $tipos)){

		return $tipos[$tempresa];

	}else{

		return 2;

	}

}



function etapa_verificacion($etapa){

	/*

	1 	Propuesta

	2 	En proceso

	3 	Emitida

	 */

	$etapa = explode(" ", $etapa);

	$etapa= implode("", $etapa);

	$tipos = array(

			'Propuesta' => 2,

			'Enproceso' => 3,

			'Emitida' => 4,

			);



	

	if(array_key_exists($etapa, $tipos)){

		return $tipos[$etapa];

	}else{

		return 1;

	}

}



function unidad_medida($unidad){

		$unidad = explode(" ", $unidad);

	$unidad= $unidad[0];

	$tipos = array(

			'Kg' => 1,

			'Lb' => 2,

			'Unidad' => 3,

			'Ltrs' => 4,

			'Otros' => 5,

			);



	if(array_key_exists($unidad, $tipos)){

		return $tipos[$unidad];

	}else{

		return 2;

	}

}





function predio_unidad($unidad){

	$unidad = explode(" ", $unidad);

	$unidad= $unidad[0];

	$tipos = array(

			'Ha' => 1,

			'M2' => 2,

			'Fanegadas' => 3,

			'Cuadras' => 4

			);



	if(array_key_exists($unidad, $tipos)){

		return $tipos[$unidad];

	}else{

		return 2;

	}

}



function categoria($categoria){

	$categoria = explode(" ", $categoria);

	$categoria= $categoria[0];

	$tipos = array(

			'Bienes_y_servicios_sostenibles_provenientes_de_recursos_naturales' => 1,

			'Ecoproductos_industriales' => 2,

			'Mercados_de_Carbono' => 3,

			);



	if(array_key_exists($categoria, $categoria)){

		return $tipos[$categoria];

	}else{

		return 1;

	}

}



function sector($sector){

	$sector = explode(" ", $sector);

	$sector= $sector[0];

	$tipos = array(

			'Biocomercio ' => 1,

			'Agrosistemas_Sostenibles ' => 2,

			'Fuentes_no_convencionales_de_energía_renovable' => 3,

			'Construcción_Sostenible' => 4,

			'Aprovechamiento_y_valoración_de_Residuos' => 5,

			'Otros_bienes_y_Productos_Verdes_Sostenibles' => 6,

			'Mercado_Regulado' => 7,

			'Mercado_Voluntario' => 8

			);



	if(array_key_exists($sector, $sector)){

		return $tipos[$sector];

	}else{

		return 1;

	}

}



function subsector($subsector){

	$subsector = explode(" ", $subsector);

	$subsector= implode("_",$subsector);

	echo $subsector;

	$tipos = array(

			'Maderables' => 1,

			'No_maderables ' => 2,

			'Productos_derivados_de_fauna_silvestre' => 3,

			'Construcción_Sostenible' => 4,

			'Turismo_de_naturaleza/Ecoturismo' => 5,

			'Recursos_genéticos_y_productos_derivados' => 6,

			'Sistema_de_producción_ecológico,_orgánico_y_biológico' => 7,

			'Aprovechamiento_y_valoración_de_Residuos' => 8,

			'Energía_Solar' => 9,

			'Energía_Eólica' => 10,

			'Energía_Geotérmica' => 11,

			'Biomasa' => 12,

			'Energía_de_los_Mares' => 13,

			'Pequeños_aprovechamientos_hidroeléctricos' => 14,

			'Construcción_Sostenible' => 15,

			'Otros_bienes_y_Productos_Verdes_Sostenibles' => 16,

			'Mercado_Regulado' => 17,

			'Mercado_Voluntario' => 18

			);



	if(array_key_exists($subsector, $tipos)){

		return $tipos[$subsector];

	}else{

		return 1;

	}

}





function count_visitor($session_id)
{
	
		
        $filecounter=(APPPATH . 'logs/counter.txt');
        $kunjungan=file($filecounter);
        $nuevo_visitante = (int)$kunjungan[0];
        if(!$session_id) $nuevo_visitante++;
        $file=fopen($filecounter, 'w');
        fputs($file, $nuevo_visitante);
        fclose($file);


        return $nuevo_visitante;
}



function counter_element($ele){

	return "<span>".$ele."</span>";

}