<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("NegocioVerde_model");
			$this->load->model("Reporte_model");
			$this->load->model("Modulo_model");

			$this->rol_usuario = $this->session->userdata("rol");
			$admin = $this->session->userdata("admin");
			$this->moduloControlador = array(
				'modulos' => ($admin)?$this->Modulo_model->getModulos():$this->Modulo_model->getModulosRol($this->rol_usuario),
				'admin' => $admin,
			);

			$this->pathImagen = array(
				"assets/template/img/cabezote.png",
			);

			//Librerias
			$this->load->library('excel');
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}
	}

	public function index()
	{
		$data = array(
			'empresasResumen' => $this->NegocioVerde_model->getEmpresasResumen(),
			'empresasPlanMejora' =>$this->NegocioVerde_model->getEmpresasPlanMejora(),
		);
		$this->load->view("layouts/dashboard/header.php");
		$this->load->view("layouts/dashboard/sidebar.php", $this->moduloControlador);
		$this->load->view("dashboard/reportes/index", $data);
		$this->load->view("layouts/dashboard/footer.php");
	}

	private function cargarImagenExcel($url, $coordenada=NULL, $height = NULL, $width=NULL){
		$gdImage = imagecreatefrompng($url);
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Sample image');
		$objDrawing->setDescription('Sample image');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		if($coordenada) $objDrawing->setCoordinates($coordenada);
		if($height) $objDrawing->setHeight($height);
		if($width) $objDrawing->setWidth($width);
		return $objDrawing;
	}

	public function plan_mejora(){

		$empresa_id = $this->input->post("empresa_mejora");
		$mejora_hv1 = $this->Reporte_model->getPlanMejoraH1($empresa_id);
		$mejora_hv2 = $this->Reporte_model->getPlanMejoraH2($empresa_id);
		$razon_social = $this->Reporte_model->getRazonSocial($empresa_id)->razon_social;

		$colores = array(
			array('rgb' => '53833A'),//verde intenso,
			array('rgb' => '6FAE4A'),//verde semiintenso,
			array('rgb' => 'A6CF90'),//Verde suave,
			array('rgb' => 'D9D9D9'),//Gris suave,
			array('rgb' => 'FFFFFF'),//Blanco
			array('rgb' => '000000'),//Negro
		);

		$bordes = array(
			'b1' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
						'color'=>$colores[2]
					)
				)
			),
			'b2' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN
					)
				)
			),
			'b3' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[2]
					)
				)
			),
			'b4' => array(
				'borders' => array(
					'inside' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN
					)
				)
			),
		);

		$fills = array(
			'f1' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[0]
				)
			),
			'f2' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[1]
				)
			),
			'f3' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[2]
				)
			),
			'f4' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[3]
				)
			),
		);

		$fonts = array(
			'f1' => array(
				'font'=>array(//Titulos principales en blanco 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[5]
				)
			),
			'f2' => array(//Titulos principales en negro
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[4]
				)
			),
			'f3' => array(//Titulos secundarios
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
			'f4' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[4]
				)
			),
			'f5' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[3]
				)
			),
			'f6' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
		);

		$alignments = array(
			'a1' => array(
				'alignment'=>array(//Titulos principales
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				)
			),
			'a2' => array(
				'alignment'=>array(//Textos basicos
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_TOP,
					'wrap'=>true
				)
			),
			
		);

		$this->excel->getProperties()
		->setCreator($this->session->userdata("nombre"))
		->setTitle("Plan de Mejora")
		->setSubject("Negocios de emprendimientos verdes")
		->setDescription("Plan de mejora");
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Plan de Mejora');
		$fecha_descarga = date("Y-m-d H:i:s");
		$this->excel->getActiveSheet()->setCellValue('B2', 'Fecha de descarga: '.$fecha_descarga);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B2:D5');
		$this->excel->getActiveSheet()->setCellValue('E2', 'VERIFICACIONES DE NEGOCIOS VERDES');
		$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($fills['f1']);
		$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('E2:U5');
		$path = $this->pathImagen[0];
		$objDrawing = $this->cargarImagenExcel($path, 'V2', 80);
		$objDrawing->setWorksheet($this->excel->getActiveSheet());
		$this->excel->getActiveSheet()->setCellValue('B6', 'F-00');
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B6:D7');
		$this->excel->getActiveSheet()->setCellValue('B8', 'Version: 1.2');
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B8:D8');
		$this->excel->getActiveSheet()->setCellValue('E6', 'PLAN DE MEJORA');
		$this->excel->getActiveSheet()->getStyle('E6')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('E6')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('E6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('E6:AD8');
		$this->excel->getActiveSheet()->getStyle('B9')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->mergeCells('B9:AD9');
		$this->excel->getActiveSheet()->getStyle('B2:AD9')->applyFromArray($bordes['b1']);

		$this->excel->getActiveSheet()->setCellValue('B11', 'RECUERDE: La información que va a diligenciar a continuación, debe estar en letra minúscula y con buena ortografía.');
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->mergeCells('B11:P11');
		$this->excel->getActiveSheet()->getStyle('B11:P11')->applyFromArray($bordes['b2']);

		$this->excel->getActiveSheet()->setCellValue('B13', 'NIVEL 0');
		$this->excel->getActiveSheet()->getStyle('B13')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B13')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B13')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B13:AD14');

		//Titulos de las columnas de la celda Nivel 0
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('B15','Nº');
		$this->excel->getActiveSheet()->mergeCells('B15:B16');
		$this->excel->getActiveSheet()->SetCellValue('C15','Aspectos');
		$this->excel->getActiveSheet()->mergeCells('C15:D16');
		$this->excel->getActiveSheet()->SetCellValue('E15','Acciones correctivas por indicador (Son todas aquellas actividades para alcanzar un mejoramiento continuo con el fin de lograr el cumplimiento de los criterios de los negocios verdes). Estas acciones deben estar de acurdo a los medios de verificación de cada uno de los criterios');
		$this->excel->getActiveSheet()->mergeCells('E15:K16');
		$this->excel->getActiveSheet()->SetCellValue('L15','Actor que podría participar en la actividad');
		$this->excel->getActiveSheet()->mergeCells('L15:M16');
		
		$this->excel->getActiveSheet()->SetCellValue('N15','Resultado esperado');
		$this->excel->getActiveSheet()->mergeCells('N15:P16');

		$this->excel->getActiveSheet()->SetCellValue('Q15','Cronograma(Meses). Marcar con x');
		$this->excel->getActiveSheet()->mergeCells('Q15:AB15');
		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Q16','1');
		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('R16','2');
		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('S16','3');
		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('T16','4');
		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('U16','5');
		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('V16','6');
		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('W16','7');
		$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('X16','8');
		$this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Y16','9');
		$this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Z16','10');
		$this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AA16','11');
		$this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AB16','12');
		$this->excel->getActiveSheet()->SetCellValue('AC15','Observaciones');
		$this->excel->getActiveSheet()->mergeCells('AC15:AD16');
		$this->excel->getActiveSheet()->getStyle('B15:AD16')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B15:AD16')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('B15:AD16')->applyFromArray($alignments['a1']);
		//Aspectos
		$this->excel->getActiveSheet()->SetCellValue('C17','Cumplimiento legal');
		$this->excel->getActiveSheet()->mergeCells('C17:D17');
		$this->excel->getActiveSheet()->SetCellValue('C18','Condiciones laborales');
		$this->excel->getActiveSheet()->mergeCells('C18:D21');
		$this->excel->getActiveSheet()->SetCellValue('C22','Impacto ambiental positivo y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('C22:D26');
		$this->excel->getActiveSheet()->SetCellValue('C27','Impacto Social Positivo');
		$this->excel->getActiveSheet()->mergeCells('C27:D28');
		$this->excel->getActiveSheet()->SetCellValue('C29','Sustancias o materiales  peligrosos');
		$this->excel->getActiveSheet()->mergeCells('C29:D30');
		$this->excel->getActiveSheet()->getStyle('C17:D30')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('C17:D30')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('C17:D30')->applyFromArray($alignments['a2']);

		//Titulos de las columnas de la celda Nivel 1
		$this->excel->getActiveSheet()->setCellValue('B31', 'NIVEL 1');
		$this->excel->getActiveSheet()->getStyle('B31')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B31')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B31')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B31:AD32');
		//$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('B33','Nº');
		$this->excel->getActiveSheet()->mergeCells('B33:B34');
		$this->excel->getActiveSheet()->SetCellValue('C33','Aspectos');
		$this->excel->getActiveSheet()->mergeCells('C33:D34');
		$this->excel->getActiveSheet()->SetCellValue('E33','Acciones correctivas por indicador (Son todas aquellas actividades para alcanzar un mejoramiento continuo con el fin de lograr el cumplimiento de los criterios de los negocios verdes). Estas acciones deben estar de acurdo a los medios de verificación de cada uno de los criterios');
		$this->excel->getActiveSheet()->mergeCells('E33:K34');
		$this->excel->getActiveSheet()->SetCellValue('L33','Actor que podría participar en la actividad');
		$this->excel->getActiveSheet()->mergeCells('L33:M34');
		
		$this->excel->getActiveSheet()->SetCellValue('N33','Resultado esperado');
		$this->excel->getActiveSheet()->mergeCells('N33:P34');

		$this->excel->getActiveSheet()->SetCellValue('Q33','Cronograma(Meses). Marcar con x');
		$this->excel->getActiveSheet()->mergeCells('Q33:AB33');
		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Q34','1');
		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('R34','2');
		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('S34','3');
		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('T34','4');
		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('U34','5');
		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('V34','6');
		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('W34','7');
		$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('X34','8');
		$this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Y34','9');
		$this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Z34','10');
		$this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AA34','11');
		$this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AB34','12');
		$this->excel->getActiveSheet()->SetCellValue('AC33','Observaciones');
		$this->excel->getActiveSheet()->mergeCells('AC33:AD34');
		$this->excel->getActiveSheet()->getStyle('B33:AD34')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B33:AD34')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('B33:AD34')->applyFromArray($alignments['a1']);
		//Aspectos c35:d80
		$this->excel->getActiveSheet()->SetCellValue('C35','Viabilidad económica del Negocio:');
		$this->excel->getActiveSheet()->mergeCells('C35:D39');
		$this->excel->getActiveSheet()->SetCellValue('C40','Impacto Ambiental Positivo  y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('C40:D47');
		$this->excel->getActiveSheet()->SetCellValue('C48','Enfoque ciclo de vida del bien o servicio ');
		$this->excel->getActiveSheet()->mergeCells('C48:D52');
		$this->excel->getActiveSheet()->SetCellValue('C53','Vida útil');
		$this->excel->getActiveSheet()->mergeCells('C53:D55');
		$this->excel->getActiveSheet()->SetCellValue('C56','Sustitución de sustancias o materiales peligrosos');
		$this->excel->getActiveSheet()->mergeCells('C56:D56');
		$this->excel->getActiveSheet()->SetCellValue('C57','Reciclabilidad y/o uso de materiales reciclados	');
		$this->excel->getActiveSheet()->mergeCells('C57:D60');
		$this->excel->getActiveSheet()->SetCellValue('C61','Uso eficiente y sostenible de recursos para la producción de bienes o servicios');
		$this->excel->getActiveSheet()->mergeCells('C61:D66');
		$this->excel->getActiveSheet()->SetCellValue('C67','Responsabilidad social al interior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('C67:D69');
		$this->excel->getActiveSheet()->SetCellValue('C70','Responsabilidad social en la cadena de valor de la empresa');
		$this->excel->getActiveSheet()->mergeCells('C70:D72');
		$this->excel->getActiveSheet()->SetCellValue('C73','Responsabilidad social al exterior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('C73:D78');
		$this->excel->getActiveSheet()->SetCellValue('C79','Comunicación de atributos del bien y servicio');
		$this->excel->getActiveSheet()->mergeCells('C79:D80');
		$this->excel->getActiveSheet()->getStyle('C35:D80')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('C35:D80')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('C35:D80')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B13:AD80')->applyFromArray($bordes['b3']);
		$this->excel->getActiveSheet()->getStyle('B13:AD80')->applyFromArray($bordes['b4']);

		//$this->excel->getActiveSheet()->getRowDimension(2)->setRowHeight(40);
		$fila = 17;//Comienzo de plan mejora nivel 0
		foreach ($mejora_hv1 as $v1) {
			$this->excel->getActiveSheet()->SetCellValue("B$fila",$v1->No);
			$this->excel->getActiveSheet()->SetCellValue("E$fila",$v1->actor);
			$this->excel->getActiveSheet()->mergeCells("E$fila:K$fila");
			$this->excel->getActiveSheet()->SetCellValue("N$fila",$v1->resultado);
			$this->excel->getActiveSheet()->mergeCells("N$fila:P$fila");
			$this->excel->getActiveSheet()->SetCellValue("Q$fila",$v1->mes_1);
			$this->excel->getActiveSheet()->SetCellValue("R$fila",$v1->mes_2);
			$this->excel->getActiveSheet()->SetCellValue("S$fila",$v1->mes_3);
			$this->excel->getActiveSheet()->SetCellValue("T$fila",$v1->mes_4);
			$this->excel->getActiveSheet()->SetCellValue("U$fila",$v1->mes_5);
			$this->excel->getActiveSheet()->SetCellValue("V$fila",$v1->mes_6);
			$this->excel->getActiveSheet()->SetCellValue("W$fila",$v1->mes_7);
			$this->excel->getActiveSheet()->SetCellValue("X$fila",$v1->mes_8);
			$this->excel->getActiveSheet()->SetCellValue("Y$fila",$v1->mes_9);
			$this->excel->getActiveSheet()->SetCellValue("Z$fila",$v1->mes_10);
			$this->excel->getActiveSheet()->SetCellValue("AA$fila",$v1->mes_11);
			$this->excel->getActiveSheet()->SetCellValue("AB$fila",$v1->mes_12);
			$this->excel->getActiveSheet()->SetCellValue("AC$fila",$v1->observacion);
			$this->excel->getActiveSheet()->mergeCells("AC$fila:AD$fila");
			$fila++;
		}
		$this->excel->getActiveSheet()->getStyle('B17:AD'.$fila)->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('E17:AD'.$fila)->applyFromArray($fonts['f6']);
		$fila = 35;//Comienzo de plan mejora nivel I
		foreach ($mejora_hv2 as $v2) {
			$this->excel->getActiveSheet()->SetCellValue("B$fila",$v2->No);
			$this->excel->getActiveSheet()->SetCellValue("E$fila",$v2->actor);
			$this->excel->getActiveSheet()->mergeCells("E$fila:K$fila");
			$this->excel->getActiveSheet()->SetCellValue("N$fila",$v2->resultado);
			$this->excel->getActiveSheet()->mergeCells("N$fila:P$fila");
			$this->excel->getActiveSheet()->SetCellValue("Q$fila",$v2->mes_1);
			$this->excel->getActiveSheet()->SetCellValue("R$fila",$v2->mes_2);
			$this->excel->getActiveSheet()->SetCellValue("S$fila",$v2->mes_3);
			$this->excel->getActiveSheet()->SetCellValue("T$fila",$v2->mes_4);
			$this->excel->getActiveSheet()->SetCellValue("U$fila",$v2->mes_5);
			$this->excel->getActiveSheet()->SetCellValue("V$fila",$v2->mes_6);
			$this->excel->getActiveSheet()->SetCellValue("W$fila",$v2->mes_7);
			$this->excel->getActiveSheet()->SetCellValue("X$fila",$v2->mes_8);
			$this->excel->getActiveSheet()->SetCellValue("Y$fila",$v2->mes_9);
			$this->excel->getActiveSheet()->SetCellValue("Z$fila",$v2->mes_10);
			$this->excel->getActiveSheet()->SetCellValue("AA$fila",$v2->mes_11);
			$this->excel->getActiveSheet()->SetCellValue("AB$fila",$v2->mes_12);
			$this->excel->getActiveSheet()->SetCellValue("AC$fila",$v2->observacion);
			$this->excel->getActiveSheet()->mergeCells("AC$fila:AD$fila");
			$fila++;
		}
		$this->excel->getActiveSheet()->getStyle('B35:AD'.$fila)->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('E35:AD'.$fila)->applyFromArray($fonts['f6']);
		
		
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="plan_mejora_'.$razon_social.'.xlsx"');
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        // Forzamos a la descarga
        $objWriter->save('php://output');
        // header('Content-Type: application/pdf');
        // header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        // header('Cache-Control: max-age=0'); //no cache
        // // $objWriter = new PHPExcel_Writer_PDF($this->excel);
        // $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'PDF'); 
        // $objWriter->setSheetIndex(0);
        // $objWriter->save('php://output');

	}

	public function resumen(){

		$empresa_id = $this->input->post("empresa_id");
		$info = $this->Reporte_model->getPromedios($empresa_id);
		$colores = array(
			array('rgb' => '53833A'),//verde intenso - 0
			array('rgb' => '6FAE4A'),//verde semiintenso - 1
			array('rgb' => 'A6CF90'),//Verde suave - 2
			array('rgb' => 'D9D9D9'),//Gris suave - 3
			array('rgb' => 'FFFFFF'),//Blanco - 4
			array('rgb' => '000000'),//Negro - 5
			array('rgb' => 'F0A071'),//NARANJA - 6
			array('rgb' => 'B60004'),//ROJO - 7
		);

		$bordes = array(
			'b1' => array( 
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
						'color'=>$colores[2] 
					)
				)
			),
			'b2' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN
					)
				)
			),
			'b3' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[2]
					)
				)
			),
			'b4' => array(
				'borders' => array(
					'inside' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
						'color'=>$colores[5]
					)
				)
			),
			'b5' => array(
				'borders' => array(
					'outline' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[5]
					)
				)
			),
			'b6' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[5]
					)
				)
			),
			'b7' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THIN,
					)
				)
			),
			'b8' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[2]
					)
				)
			),
			'b9' => array(
				'borders' => array(
					'allborders' => array(
						'style'=>PHPExcel_Style_Border::BORDER_THICK,
						'color'=>$colores[1]
					)
				)
			),
		);

		$fills = array(
			'f1' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[0]
				)
			),
			'f2' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[1]
				)
			),
			'f3' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[2]
				)
			),
			'f4' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[3]
				)
			),
			'f5' => array(
				'fill'=>array( 
					'type'=>PHPExcel_Style_Fill::FILL_SOLID,
					'color' => $colores[6]
				)
			),
		);

		$fonts = array(
			'f1' => array(
				'font'=>array(//Titulos principales en blanco 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[5]
				)
			),
			'f2' => array(//Titulos principales en negro
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[4]
				)
			),
			'f3' => array(//Titulos secundarios
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
			'f4' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[5]
				)
			),
			'f5' => array(//Texto secundario
				'font'=>array( 
					'name'=>'Calibri',
					'bold'=>false,
					'size'=>9,	
					'color' => $colores[3]
				)
			),
			'f6' => array(
				'font'=>array(//Titulos principales en blanco 
					'name'=>'Calibri',
					'bold'=>true,
					'size'=>11,	
					'color' => $colores[7]
				)
			),
		);

		$alignments = array(
			'a1' => array(
				'alignment'=>array(//Titulos principales
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				)
			),
			'a2' => array(
				'alignment'=>array(//Textos basicos
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
				)
			),
			'a3' => array(
				'alignment'=>array(//Textos basicos
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			),
			'a4' => array(
				'alignment'=>array(//Titulos principales
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				)
			),
			
		);

		$this->excel->getProperties()
		->setCreator($this->session->userdata("nombre"))
		->setTitle("Resumen")
		->setSubject("Negocios de emprendimientos verdes")
		->setDescription("Plan de mejora");
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Resumen');
		$fecha_descarga = date("Y-m-d H:i:s");
		$this->excel->getActiveSheet()->setCellValue('B2', 'Fecha de descarga: '.$fecha_descarga);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B2:E5');
		$this->excel->getActiveSheet()->setCellValue('F2', 'VERIFICACIONES DE NEGOCIOS VERDES');
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($fills['f1']);
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('F2')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('F2:K5');
		$this->excel->getActiveSheet()->setCellValue('B6', 'F-00');
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B6:E7');
		$this->excel->getActiveSheet()->setCellValue('B8', 'Version: 1.2');
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B8')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B8:E8');
		$this->excel->getActiveSheet()->setCellValue('F6', 'PLAN DE MEJORA');
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('F6')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('F6:Q8');
		$this->excel->getActiveSheet()->getStyle('B9')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->mergeCells('B9:Q9');
		$this->excel->getActiveSheet()->getStyle('B2:Q9')->applyFromArray($bordes['b1']);

		$this->excel->getActiveSheet()->setCellValue('B11', 'ESTA SERÁ LA VERSIÓN IMPRESA Y DIGITAL QUE DEBERÁ ENTREGARLE AL EMPRESARIO');
		//$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($fonts['f6']);
		$this->excel->getActiveSheet()->getStyle('B11')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B11:Q12');
		$this->excel->getActiveSheet()->getStyle('B11:Q12')->applyFromArray($bordes['b6']);

		$this->excel->getActiveSheet()->setCellValue('B14', 'NOTA: Señor empresario, recuerde que esta es una HOJA RESUMEN de toda la información diligenciada, por tanto, si desea corroborar o saber información adicional, por favor remitase a la Ficha de Verificación original y diligenciada.');
		
		$this->excel->getActiveSheet()->getStyle('B14')->applyFromArray($fonts['f1']);
		$this->excel->getActiveSheet()->getStyle('B14')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B14:Q16');
		$this->excel->getActiveSheet()->getStyle('B14:Q16')->applyFromArray($bordes['b3']);

		$this->excel->getActiveSheet()->setCellValue('B18', 'I. Información General');
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B18')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('B18:C18');
		$this->excel->getActiveSheet()->getStyle('B18:C18')->applyFromArray($bordes['b3']);

		$this->excel->getActiveSheet()->setCellValue('N18', 'Año de verificación');
		$this->excel->getActiveSheet()->getStyle('N18')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('N18')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->mergeCells('N18:O18');
		$this->excel->getActiveSheet()->setCellValue('P18', '2019');
		$this->excel->getActiveSheet()->getStyle('P18')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('P18')->applyFromArray($alignments['a3']);
		$this->excel->getActiveSheet()->mergeCells('P18:Q18');
		$this->excel->getActiveSheet()->getStyle('N18:Q18')->applyFromArray($bordes['b6']);

		//INFORMACIÓN GENERAL
		$this->excel->getActiveSheet()->setCellValue('B20', 'Nombre o razón social:');
		$this->excel->getActiveSheet()->mergeCells('B20:C20');
		$this->excel->getActiveSheet()->setCellValue('D20', $info['empresa']['razon_social']);
		$this->excel->getActiveSheet()->mergeCells('D20:Q20');

		$this->excel->getActiveSheet()->setCellValue('B21', 'E-mail:');
		$this->excel->getActiveSheet()->mergeCells('B21:C21');
		$this->excel->getActiveSheet()->setCellValue('D21', $info['empresa']['correo']);
		$this->excel->getActiveSheet()->mergeCells('D21:Q21');

		$this->excel->getActiveSheet()->setCellValue('B22', 'Departamento:');
		$this->excel->getActiveSheet()->mergeCells('B22:C22');
		$this->excel->getActiveSheet()->setCellValue('D22', $info['empresa']['departamento']);
		$this->excel->getActiveSheet()->mergeCells('D22:Q22');

		$this->excel->getActiveSheet()->setCellValue('B23', 'Autoridad Ambiental:');
		$this->excel->getActiveSheet()->mergeCells('B23:C23');
		$this->excel->getActiveSheet()->setCellValue('D23', $info['empresa']['autoridad']);
		$this->excel->getActiveSheet()->mergeCells('D23:Q23');

		$this->excel->getActiveSheet()->setCellValue('B24', 'Nombre Representante Legal');
		$this->excel->getActiveSheet()->mergeCells('B24:C24');
		$this->excel->getActiveSheet()->setCellValue('D24', $info['empresa']['representante']);
		$this->excel->getActiveSheet()->mergeCells('D24:Q24');

		$this->excel->getActiveSheet()->setCellValue('B25', 'Número de Identificación/NIT:');
		$this->excel->getActiveSheet()->mergeCells('B25:C25');
		$this->excel->getActiveSheet()->setCellValue('D25', $info['empresa']['nit']);
		$this->excel->getActiveSheet()->mergeCells('D25:Q25');

		$this->excel->getActiveSheet()->setCellValue('B26', 'Celular:');
		$this->excel->getActiveSheet()->mergeCells('B26:C26');
		$this->excel->getActiveSheet()->setCellValue('D26', $info['empresa']['fijo'].", ".$info['empresa']['celular']);
		$this->excel->getActiveSheet()->mergeCells('D26:Q26');

		$this->excel->getActiveSheet()->setCellValue('B27', 'Municipio:');
		$this->excel->getActiveSheet()->mergeCells('B27:C27');
		$this->excel->getActiveSheet()->setCellValue('D27', $info['empresa']['municipio']);
		$this->excel->getActiveSheet()->mergeCells('D27:Q27');

		$this->excel->getActiveSheet()->setCellValue('B28', 'Dirección de correspondencia:');
		$this->excel->getActiveSheet()->mergeCells('B28:C28');
		$this->excel->getActiveSheet()->setCellValue('D28', $info['empresa']['direccion']);
		$this->excel->getActiveSheet()->mergeCells('D28:Q28');

		$this->excel->getActiveSheet()->setCellValue('B29', 'Nombre de Verificador:');
		$this->excel->getActiveSheet()->mergeCells('B29:C29');
		$this->excel->getActiveSheet()->setCellValue('D29', $info['empresa']['verificador']);
		$this->excel->getActiveSheet()->mergeCells('D29:M29');
		$this->excel->getActiveSheet()->setCellValue('N29', 'OPERADOR');
		$this->excel->getActiveSheet()->setCellValue('O29', 'UT Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('O29:Q29');
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B20:C29')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('D20:Q29')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('D20:Q29')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B20:Q31')->applyFromArray($bordes['b7']);

		//DESCRIPCION
		$this->excel->getActiveSheet()->setCellValue('B30', 'Descripción del negocio');
		$this->excel->getActiveSheet()->mergeCells('B30:D30');
		$this->excel->getActiveSheet()->setCellValue('E30', $info['empresa']['descripcion_negocio']);
		$this->excel->getActiveSheet()->mergeCells('E30:Q30');
		$this->excel->getActiveSheet()->setCellValue('B31', 'Características ambientales del negocio');
		$this->excel->getActiveSheet()->mergeCells('B31:D31');
		$this->excel->getActiveSheet()->setCellValue('E31', $info['empresa']['caracteristica_ambiental']);
		$this->excel->getActiveSheet()->mergeCells('E31:Q31');
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B30:D31')->applyFromArray($alignments['a4']);

		$this->excel->getActiveSheet()->getStyle('E30:Q31')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('E30:Q31')->applyFromArray($alignments['a2']);


		//CATEGORIA
		$this->excel->getActiveSheet()->setCellValue('B32', 'Categoría');
		$this->excel->getActiveSheet()->mergeCells('B32:F32');
		$this->excel->getActiveSheet()->setCellValue('B33', $info['empresa']['categoria']);
		$this->excel->getActiveSheet()->mergeCells('B33:F33');
		$this->excel->getActiveSheet()->setCellValue('G32', 'Sector');
		$this->excel->getActiveSheet()->mergeCells('G32:L32');
		$this->excel->getActiveSheet()->setCellValue('G33', $info['empresa']['sector']);
		$this->excel->getActiveSheet()->mergeCells('G33:L33');
		$this->excel->getActiveSheet()->setCellValue('M32', 'Subsector');
		$this->excel->getActiveSheet()->mergeCells('M32:Q32');
		$this->excel->getActiveSheet()->setCellValue('M33', $info['empresa']['subsector']);
		$this->excel->getActiveSheet()->mergeCells('M33:Q33');
		//estilos
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($fills['f3']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->getStyle('B32:Q32')->applyFromArray($bordes['b9']);

		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B33:Q33')->applyFromArray($bordes['b6']);

		//BIEN LIDER
		$this->excel->getActiveSheet()->setCellValue('B35', 'Bien o servicio líder');
		$this->excel->getActiveSheet()->mergeCells('B35:D35');
		$this->excel->getActiveSheet()->setCellValue('E35', $info['empresa']['bien_lider']);
		$this->excel->getActiveSheet()->mergeCells('E35:Q35');
		//estilos
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B35:D35')->applyFromArray($alignments['a4']);

		$this->excel->getActiveSheet()->getStyle('E35:Q35')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('E35:Q35')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B35:Q35')->applyFromArray($bordes['b7']);
		
		//RESULTADOS DE VERIFICACION
		$this->excel->getActiveSheet()->setCellValue('B37', 'II. Resultados de verificación');
		$this->excel->getActiveSheet()->mergeCells('B37:E37');
		$this->excel->getActiveSheet()->getStyle('B37:E37')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B37:E37')->applyFromArray($fonts['f2']);
		//TITULO 1
		$this->excel->getActiveSheet()->setCellValue('B39', 'Resultado Nivel 1. Criterios de Cumplimiento de Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('B39:H39');
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B39:H39')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B40', 'Criterio');
		$this->excel->getActiveSheet()->mergeCells('B40:G40');
		$this->excel->getActiveSheet()->setCellValue('H40', 'Promedio');
		$this->excel->getActiveSheet()->setCellValue('B41', 'Viabilidad económica del Negocio:');
		$this->excel->getActiveSheet()->mergeCells('B41:G41');
		$this->excel->getActiveSheet()->setCellValue('H41', $info['p1'][0]);
		$this->excel->getActiveSheet()->setCellValue('B42', 'Impacto Ambiental Positivo  y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('B42:G42');
		$this->excel->getActiveSheet()->setCellValue('H42', $info['p1'][1]);
		$this->excel->getActiveSheet()->setCellValue('B43', 'Enfoque ciclo de vida del bien o servicio');
		$this->excel->getActiveSheet()->mergeCells('B43:G43');
		$this->excel->getActiveSheet()->setCellValue('H43', $info['p1'][2]);
		$this->excel->getActiveSheet()->setCellValue('B44', 'Vida útil');
		$this->excel->getActiveSheet()->mergeCells('B44:G44');
		$this->excel->getActiveSheet()->setCellValue('H44', $info['p1'][3]);
		$this->excel->getActiveSheet()->setCellValue('B45', 'Sustitución de sustancias o materiales peligrosos');
		$this->excel->getActiveSheet()->mergeCells('B45:G45');
		$this->excel->getActiveSheet()->setCellValue('H45', $info['p1'][4]);
		$this->excel->getActiveSheet()->setCellValue('B46', 'Reciclabilidad y/o uso de materiales reciclados');
		$this->excel->getActiveSheet()->mergeCells('B46:G46');
		$this->excel->getActiveSheet()->setCellValue('H46', $info['p1'][5]);
		$this->excel->getActiveSheet()->setCellValue('B47', 'Uso eficiente y sostenible de recursos para la producción de bienes o servicios');
		$this->excel->getActiveSheet()->mergeCells('B47:G47');
		$this->excel->getActiveSheet()->setCellValue('H47', $info['p1'][6]);
		$this->excel->getActiveSheet()->setCellValue('B48', 'Responsabilidad social al interior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B48:G48');
		$this->excel->getActiveSheet()->setCellValue('H48', $info['p1'][7]);
		$this->excel->getActiveSheet()->setCellValue('B49', 'Responsabilidad social en la cadena de valor de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B49:G49');
		$this->excel->getActiveSheet()->setCellValue('H49', $info['p1'][8]);
		$this->excel->getActiveSheet()->setCellValue('B50', 'Responsabilidad social al exterior de la empresa');
		$this->excel->getActiveSheet()->mergeCells('B50:G50');
		$this->excel->getActiveSheet()->setCellValue('H50', $info['p1'][9]);
		$this->excel->getActiveSheet()->setCellValue('B51', 'Comunicación de atributos del bien y servicio');
		$this->excel->getActiveSheet()->mergeCells('B51:G51');
		$this->excel->getActiveSheet()->setCellValue('H51', $info['p1'][10]);
		$this->excel->getActiveSheet()->setCellValue('B52', 'Puntaje Total');
		$this->excel->getActiveSheet()->mergeCells('B52:G52');
		$this->excel->getActiveSheet()->setCellValue('H52', $info['promTotal1']);
		//ESTILOS
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B40:G52')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H40')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H52')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B54:G57')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H54')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('H57')->applyFromArray($alignments['a2']);

		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B59:G60')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($fills['f4']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($fonts['f3']);
		$this->excel->getActiveSheet()->getStyle('B61')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($fills['f5']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($fonts['f6']);
		$this->excel->getActiveSheet()->getStyle('C61:H61')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->getStyle('B39:H61')->applyFromArray($bordes['b9']);
		$this->excel->getActiveSheet()->getStyle('B39:H61')->applyFromArray($bordes['b4']);

		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B65:Q65')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B69:Q69')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($fonts['f4']);
		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($alignments['a2']);
		$this->excel->getActiveSheet()->getStyle('B73:Q73')->applyFromArray($bordes['b5']);

		$this->excel->getActiveSheet()->getStyle("H41:H52")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getStyle("H55:H57")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getStyle("H59:H60")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);

		$this->excel->getActiveSheet()->getRowDimension('30')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('31')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('65')->setRowHeight(50);
		$this->excel->getActiveSheet()->getRowDimension('69')->setRowHeight(50);
		$this->excel->getActiveSheet()->getRowDimension('73')->setRowHeight(50);
		//TITULO 2
		$this->excel->getActiveSheet()->setCellValue('B53', 'Resultado Nivel 2. Criterios Adicionales (ideales) Negocios Verdes');
		$this->excel->getActiveSheet()->mergeCells('B53:H53');
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B53:H53')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B54', 'Criterio');
		$this->excel->getActiveSheet()->mergeCells('B54:G54');
		$this->excel->getActiveSheet()->setCellValue('H54', 'Promedio');
		$this->excel->getActiveSheet()->setCellValue('B55', 'Esquemas, programas o reconocimientos implementados o recibidos:');
		$this->excel->getActiveSheet()->mergeCells('B55:G55');
		$this->excel->getActiveSheet()->setCellValue('H55', $info['p2'][0]);
		$this->excel->getActiveSheet()->setCellValue('B56', 'Responsabilidad social al interior de la empresa adicional:');
		$this->excel->getActiveSheet()->mergeCells('B56:G56');
		$this->excel->getActiveSheet()->setCellValue('H56', $info['p2'][1]);
		$this->excel->getActiveSheet()->setCellValue('B57', 'Puntaje Total');
		$this->excel->getActiveSheet()->mergeCells('B57:G57');
		$this->excel->getActiveSheet()->setCellValue('H57', $info['promTotal2']);
		//TITULO 3
		$this->excel->getActiveSheet()->setCellValue('B58', 'Resultado Nivel 1+ Nivel 2');
		$this->excel->getActiveSheet()->mergeCells('B58:H58');
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->getStyle('B58:H58')->applyFromArray($alignments['a1']);
		$this->excel->getActiveSheet()->setCellValue('B59', 'Puntaje Total. Criterios Adicionales (ideales) Negocios Verdes:');
		$this->excel->getActiveSheet()->mergeCells('B59:G59');
		$this->excel->getActiveSheet()->setCellValue('H59', $info['promTotal1']);
		$this->excel->getActiveSheet()->setCellValue('B60', 'Impacto Ambiental Positivo  y contribución a la conservación y preservación de los recursos ecosistemicos');
		$this->excel->getActiveSheet()->mergeCells('B60:G60');
		$this->excel->getActiveSheet()->setCellValue('H60', $info['promTotal2']);
		$this->excel->getActiveSheet()->setCellValue('B61', 'Resultado');
		$this->excel->getActiveSheet()->setCellValue('C61', $info['nivelEmpresa']);
		$this->excel->getActiveSheet()->mergeCells('C61:H61');
		//RECOMENDACIÓN COMPONENTE ECONOMICO
		$this->excel->getActiveSheet()->setCellValue('B63', 'III. RECOMENDACIONES COMPONENTE ECONÓMICO');
		$this->excel->getActiveSheet()->mergeCells('B63:F63');
		$this->excel->getActiveSheet()->getStyle('B63:F63')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B63:F63')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B65', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B65:Q65');

		$this->excel->getActiveSheet()->setCellValue('B67', 'IV. RECOMENDACIONES COMPONENTE AMBIENTAL');
		$this->excel->getActiveSheet()->mergeCells('B67:F67');
		$this->excel->getActiveSheet()->getStyle('B67:F67')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B67:F67')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B69', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B69:Q69');

		$this->excel->getActiveSheet()->setCellValue('B71', 'V. RECOMENDACIONES COMPONENTE SOCIAL');
		$this->excel->getActiveSheet()->mergeCells('B71:F71');
		$this->excel->getActiveSheet()->getStyle('B71:F71')->applyFromArray($fills['f2']);
		$this->excel->getActiveSheet()->getStyle('B71:F71')->applyFromArray($fonts['f2']);
		$this->excel->getActiveSheet()->setCellValue('B73', '-----------');
		$this->excel->getActiveSheet()->mergeCells('B73:Q73');


		$dataSeriesLabels = array(
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$41', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$42', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$43', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$44', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$45', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$46', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$47', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$48', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$49', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$50', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$51', NULL, 1),	//	2010
		);
		//	Set the X-Axis Labels
		//		Datatype
		//		Cell reference for data
		//		Format Code
		//		Number of datapoints in series
		//		Data values
		//		Data Marker
		$xAxisTickValues = array(
			new PHPExcel_Chart_DataSeriesValues('String', 'Resumen!$B$39', NULL, 1),	//	Q1 to Q4
		);
		//	Set the Data values for each data series we want to plot
		//		Datatype
		//		Cell reference for data
		//		Format Code
		//		Number of datapoints in series
		//		Data values
		//		Data Marker
		$dataSeriesValues = array(
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$41', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$42', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$43', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$44', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$45', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$46', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$47', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$48', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$49', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$50', NULL, 1),	//	2010
			new PHPExcel_Chart_DataSeriesValues('Number', 'Resumen!$H$51', NULL, 1),	//	2010
		);
		//	Build the dataseries
		$series = new PHPExcel_Chart_DataSeries(
			PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
			PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
			range(0, count($dataSeriesValues)-1),			// plotOrder
			$dataSeriesLabels,								// plotLabel
			$xAxisTickValues,								// plotCategory
			$dataSeriesValues								// plotValues
		);
		//	Set additional dataseries parameters
		//		Make it a vertical column rather than a horizontal bar graph
		$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
		//	Set the series in the plot area
		$plotArea = new PHPExcel_Chart_PlotArea(NULL, array($series));
		//	Set the chart legend
		$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
		$title = new PHPExcel_Chart_Title('RESULTADOS NIVEL 1');
		$yAxisLabel = new PHPExcel_Chart_Title('Porcentaje (%)');
		//	Create the chart
		$chart = new PHPExcel_Chart(
			'chart1',		// name
			$title,			// title
			$legend,		// legend
			$plotArea,		// plotArea
			true,			// plotVisibleOnly
			0,				// displayBlanksAs
			NULL,			// xAxisLabel
			$yAxisLabel		// yAxisLabel
		);
		//	Set the position where the chart should appear in the worksheet
		$chart->setTopLeftPosition('J39');
		$chart->setBottomRightPosition('W61');
		//	Add the chart to the worksheet
		$this->excel->getActiveSheet()->addChart($chart);

		$path = $this->pathImagen[0];
		$objDrawing = $this->cargarImagenExcel($path, 'L2', 80);
		$objDrawing->setWorksheet($this->excel->getActiveSheet());

		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="resumen_'.$info['empresa']['razon_social'].'.xlsx"');
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        // Forzamos a la descarga
        $objWriter->save('php://output');

	}

	public function mads(){
		$mads = $this->Reporte_model->getMads();
		//var_dump($mads);

		$fila = 7;
		$filaInicial = $fila;	
		// Estilos para los titulos de las columnas
		$estiloTituloColumnas = array(
			'font' => array(
			'name'  => 'Arial',
			'bold'  => true,
			'size' =>10,
			'color' => array(
			'rgb' => '000000'
			)
			),
			'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => 'A5D6A7')
			),
			'borders' => array(
			'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
			)
			),
			'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);

		//Estilo de la informacion
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray( array(
			'font' => array(
			'name'  => 'Arial',
			'color' => array(
			'rgb' => '000000'
			)
			),
			'fill' => array(
			'type'  => PHPExcel_Style_Fill::FILL_SOLID
			),
			'borders' => array(
			'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
			)
			),
			'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		));

		$this->excel->getProperties()
		->setCreator('Ventanilla de emprendimientos verdes')
		->setDescription('Solo Para Los MADS'); //algunas propiedades para el archivo excel


		$this->excel->setActiveSheetIndex(0);//Desdde que hoja vamos a inicair a trabajar
		$this->excel->getActiveSheet()->setTitle('SOLO MADS'); // el nombre de la hoja
		$this->excel->getActiveSheet()->getStyle('CX3:DO3')->applyFromArray($estiloTituloColumnas);
		$this->excel->getActiveSheet()->getStyle('CX4:DU4')->applyFromArray($estiloTituloColumnas);
		$this->excel->getActiveSheet()->getStyle('A5:DU5')->applyFromArray($estiloTituloColumnas);
		$this->excel->getActiveSheet()->getStyle('A6:DU6')->applyFromArray($estiloTituloColumnas); // aplicar estilos
		// $this->excel->getActiveSheet()->getStyle('A5:U5')->applyFromArray($estilocabeza);

		$this->excel->getActiveSheet()->setCellValue('A5', 'INFORMACION GENERAL');
		$this->excel->getActiveSheet()->mergeCells('A5:U5');
		$this->excel->getActiveSheet()->setCellValue('V5', 'CRITERIO No 1');
		$this->excel->getActiveSheet()->mergeCells('V5:Z5');
		$this->excel->getActiveSheet()->setCellValue('AA5', 'CRITERIO No 2');
		$this->excel->getActiveSheet()->mergeCells('AA5:AH5');
		$this->excel->getActiveSheet()->setCellValue('AI5', 'CRITERIO No 3');
		$this->excel->getActiveSheet()->mergeCells('AI5:AM5');
		$this->excel->getActiveSheet()->setCellValue('AN5', 'CRITERIO No 4');
		$this->excel->getActiveSheet()->mergeCells('AN5:AP5');
		$this->excel->getActiveSheet()->setCellValue('AQ5', 'CRITERIO No 5');
		// $this->excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(30);
		$this->excel->getActiveSheet()->setCellValue('AR5', 'CRITERIO No 6');
		$this->excel->getActiveSheet()->mergeCells('AR5:AU5');
		$this->excel->getActiveSheet()->setCellValue('AV5', 'CRITERIO No 7');
		$this->excel->getActiveSheet()->mergeCells('AV5:BA5');
		$this->excel->getActiveSheet()->setCellValue('BB5', 'CRITERIO No 8');
		$this->excel->getActiveSheet()->mergeCells('BB5:BD5');
		$this->excel->getActiveSheet()->setCellValue('BE5', 'CRITERIO No 9');
		$this->excel->getActiveSheet()->mergeCells('BE5:BG5');
		$this->excel->getActiveSheet()->setCellValue('BH5', 'CRITERIO No 10');
		$this->excel->getActiveSheet()->mergeCells('BH5:BM5');
		// $this->excel->getActiveSheet()->getColumnDimension('BN')->setWidth(30);
		$this->excel->getActiveSheet()->setCellValue('BN5', 'CRITERIO No 11');
		$this->excel->getActiveSheet()->mergeCells('BN5:BO5');
		$this->excel->getActiveSheet()->setCellValue('BP5', 'CRITERIO No 12');
		$this->excel->getActiveSheet()->mergeCells('BP5:BS5');
		$this->excel->getActiveSheet()->setCellValue('BT5', 'CALIFICACION No CRITERIO');
		$this->excel->getActiveSheet()->mergeCells('BT5:CE5');
		$this->excel->getActiveSheet()->mergeCells('CF5:CK5');
		$this->excel->getActiveSheet()->setCellValue('CL5', 'Plan de Mejora');
		$this->excel->getActiveSheet()->mergeCells('CL5:CL6');

		$this->excel->getActiveSheet()->setCellValue('CM5', 'Ventas Totales');
		$this->excel->getActiveSheet()->mergeCells('CM5:CM6');
		$this->excel->getActiveSheet()->setCellValue('CN5', 'Costos Totales');
		$this->excel->getActiveSheet()->mergeCells('CN5:CN6');

		$this->excel->getActiveSheet()->setCellValue('CO5', 'Género empleados');
		$this->excel->getActiveSheet()->mergeCells('CO5:CQ5');

		$this->excel->getActiveSheet()->setCellValue('CR5', 'Componente Etário Empleados');
		$this->excel->getActiveSheet()->mergeCells('CR5:CU5');

		$this->excel->getActiveSheet()->setCellValue('CV5', 'Tipo de vinculación laboral');
		$this->excel->getActiveSheet()->mergeCells('CV5:CW5');

		$this->excel->getActiveSheet()->setCellValue('CX3', 'Legislación Ambiental Colombiana');
		$this->excel->getActiveSheet()->mergeCells('CX3:DO3');

		$this->excel->getActiveSheet()->setCellValue('CX4', 'Registros');
		$this->excel->getActiveSheet()->mergeCells('CX4:DE4');

		$this->excel->getActiveSheet()->setCellValue('CX5', 'Registro Invima');
		$this->excel->getActiveSheet()->mergeCells('CX5:CY5');

		$this->excel->getActiveSheet()->setCellValue('CZ5', 'Registro ICA');
		$this->excel->getActiveSheet()->mergeCells('CZ5:DA5');

		$this->excel->getActiveSheet()->setCellValue('DB5', 'Registro Nacional de turismo');
		$this->excel->getActiveSheet()->mergeCells('DB5:DC5');

		$this->excel->getActiveSheet()->setCellValue('DD5', 'Registro de Plantación Forestal');
		$this->excel->getActiveSheet()->mergeCells('DD5:DE5');

		$this->excel->getActiveSheet()->setCellValue('DF4', 'Permisos');
		$this->excel->getActiveSheet()->mergeCells('DF4:DO4');

		$this->excel->getActiveSheet()->setCellValue('DF5', 'Permiso de Aprovechamiento');
		$this->excel->getActiveSheet()->mergeCells('DF5:DG5');

		$this->excel->getActiveSheet()->setCellValue('DH5', 'Concesión de aguas (subterraneas o superficiales)');
		$this->excel->getActiveSheet()->mergeCells('DH5:DI5');


		$this->excel->getActiveSheet()->setCellValue('DJ5', 'Permiso de Vertimientos o Emisiones');
		$this->excel->getActiveSheet()->mergeCells('DJ5:DK5');


		$this->excel->getActiveSheet()->setCellValue('DL5', 'Permiso Tala de arboles');
		$this->excel->getActiveSheet()->mergeCells('DL5:DM5');


		$this->excel->getActiveSheet()->setCellValue('DN5', 'Permiso de Movilización');
		$this->excel->getActiveSheet()->mergeCells('DN5:DO5');

		$this->excel->getActiveSheet()->setCellValue('DP4', 'Caracteristicas del Negocio');
		$this->excel->getActiveSheet()->mergeCells('DP4:DU4');

		$this->excel->getActiveSheet()->setCellValue('DP5', 'Actividades Realizadas por la empresa');
		$this->excel->getActiveSheet()->mergeCells('DP5:DR5');

		$this->excel->getActiveSheet()->setCellValue('DS5', 'Etapa empresarial');
		$this->excel->getActiveSheet()->mergeCells('DS5:DS6');

		$this->excel->getActiveSheet()->setCellValue('DT5', 'Sobre la Organización');
		$this->excel->getActiveSheet()->mergeCells('DT5:DU5');


		// Titulos de las columnas de la celda
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
		$this->excel->getActiveSheet()->SetCellValue('A6','Año');

		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('B6','Entidad de apoyo');

		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('C6','Numero NV');

		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('D6','Codigo completo');

		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('E6','Region');

		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$this->excel->getActiveSheet()->SetCellValue('F6','Autoridad ambiental');

		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$this->excel->getActiveSheet()->SetCellValue('G6','Razon social');

		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('H6','NIT/CC');

		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('I6','Categoria');

		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('J6','Sector');

		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('K6','Subsector');

		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
		$this->excel->getActiveSheet()->SetCellValue('L6','Descripcion');

		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('M6','Cadena productiva');

		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('N6','Correo');

		$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('O6','Nombre');

		$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
		$this->excel->getActiveSheet()->SetCellValue('P6','Telefono');

		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('Q6','Direccion');

		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('R6','Municipio');

		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('S6','Departamento');

		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('T6','Año de verificacion');

		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('U6','Version criterios de verificacion');

		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('V6','1.1');

		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('W6','1.2');

		$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('X6','1.3');

		$this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Y6','1.4');

		$this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('Z6','1.5');

		$this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AA6','1.6');

		$this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AB6','1.7');

		$this->excel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AC6','1.8');

		$this->excel->getActiveSheet()->getColumnDimension('AD')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AD6','1.9');

		$this->excel->getActiveSheet()->getColumnDimension('AE')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AE6','1,10');

		$this->excel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AF6','1.11');

		$this->excel->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AG6','1.12');

		$this->excel->getActiveSheet()->getColumnDimension('AH')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AH6','1.13');

		$this->excel->getActiveSheet()->getColumnDimension('AI')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AI6','1.14');

		$this->excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AJ6','1.15');

		$this->excel->getActiveSheet()->getColumnDimension('AK')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AK6','1.16');

		$this->excel->getActiveSheet()->getColumnDimension('AL')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AL6','1.17');

		$this->excel->getActiveSheet()->getColumnDimension('AM')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AM6','1.18');

		$this->excel->getActiveSheet()->getColumnDimension('AN')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AN6','1.19');

		$this->excel->getActiveSheet()->getColumnDimension('AO')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AO6','1,20');

		$this->excel->getActiveSheet()->getColumnDimension('AP')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AP6','1.21');

		$this->excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('AQ6','1.22');

		$this->excel->getActiveSheet()->getColumnDimension('AR')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AR6','1.23');

		$this->excel->getActiveSheet()->getColumnDimension('AS')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AS6','1.24');

		$this->excel->getActiveSheet()->getColumnDimension('AT')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AT6','1.25');

		$this->excel->getActiveSheet()->getColumnDimension('AU')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AU6','1.26');

		$this->excel->getActiveSheet()->getColumnDimension('AV')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AV6','1.27');

		$this->excel->getActiveSheet()->getColumnDimension('AW')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AW6','1.28');

		$this->excel->getActiveSheet()->getColumnDimension('AX')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AX6','1.29');

		$this->excel->getActiveSheet()->getColumnDimension('AY')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AY6','1,30');

		$this->excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('AZ6','1.31');

		$this->excel->getActiveSheet()->getColumnDimension('BA')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BA6','1.32');

		$this->excel->getActiveSheet()->getColumnDimension('BB')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BB6','1.33');

		$this->excel->getActiveSheet()->getColumnDimension('BC')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BC6','1.34');

		$this->excel->getActiveSheet()->getColumnDimension('BD')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BD6','1.35');

		$this->excel->getActiveSheet()->getColumnDimension('BE')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BE6','1.36');

		$this->excel->getActiveSheet()->getColumnDimension('BF')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BF6','1.37');

		$this->excel->getActiveSheet()->getColumnDimension('BG')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BG6','1.38');

		$this->excel->getActiveSheet()->getColumnDimension('BH')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BH6','1.39');

		$this->excel->getActiveSheet()->getColumnDimension('BI')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BI6','1,40');

		$this->excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BJ6','1.41');

		$this->excel->getActiveSheet()->getColumnDimension('BK')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BK6','1.42');

		$this->excel->getActiveSheet()->getColumnDimension('BL')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BL6','1.43');

		$this->excel->getActiveSheet()->getColumnDimension('BM')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BM6','1.44');

		$this->excel->getActiveSheet()->getColumnDimension('BN')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('BN6','1.45');

		$this->excel->getActiveSheet()->getColumnDimension('BO')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('BO6','1.46');

		$this->excel->getActiveSheet()->getColumnDimension('BP')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BP6','2.1');

		$this->excel->getActiveSheet()->getColumnDimension('BQ')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BQ6','2.2');

		$this->excel->getActiveSheet()->getColumnDimension('BR')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BR6','2.3');

		$this->excel->getActiveSheet()->getColumnDimension('BS')->setWidth(5);
		$this->excel->getActiveSheet()->SetCellValue('BS6','2.4');

		$this->excel->getActiveSheet()->getColumnDimension('BT')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BT6','1. Viabilidad');

		$this->excel->getActiveSheet()->getColumnDimension('BU')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BU6','2. Impacto');

		$this->excel->getActiveSheet()->getColumnDimension('BV')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BV6','3. Ciclo Vida');

		$this->excel->getActiveSheet()->getColumnDimension('BW')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BW6','4. Vida útil');

		$this->excel->getActiveSheet()->getColumnDimension('BX')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BX6','5. Sust. Peligrosas');

		$this->excel->getActiveSheet()->getColumnDimension('BY')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BY6','6. Recicla');

		$this->excel->getActiveSheet()->getColumnDimension('BZ')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('BZ6','7. Uso RN');

		$this->excel->getActiveSheet()->getColumnDimension('CA')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CA6','8. RS int.');

		$this->excel->getActiveSheet()->getColumnDimension('CB')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CB6','9. RS Cadena.');

		$this->excel->getActiveSheet()->getColumnDimension('CC')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CC6','10. RS Ext.');

			  $this->excel->getActiveSheet()->getColumnDimension('CD')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CD6','11. Comunicación');

		$this->excel->getActiveSheet()->getColumnDimension('CE')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CE6','12. Adiccionales');

		$this->excel->getActiveSheet()->getColumnDimension('CF')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CF6','Calificacion Nivel 1');

		$this->excel->getActiveSheet()->getColumnDimension('CG')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CG6','Calificacion Nivel 2');

		$this->excel->getActiveSheet()->getColumnDimension('CH')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CH6','Resultado');

		$this->excel->getActiveSheet()->getColumnDimension('CI')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CI6','Economicos');

		$this->excel->getActiveSheet()->getColumnDimension('CJ')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CJ6','Ambientales');

		$this->excel->getActiveSheet()->getColumnDimension('CK')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CK6','Sociales');

		$this->excel->getActiveSheet()->getColumnDimension('CL')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('CM')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('CN')->setWidth(20);

		$this->excel->getActiveSheet()->getColumnDimension('CO')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('CO6','Mujeres');
		$this->excel->getActiveSheet()->getColumnDimension('CP')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('CP6','Hombres');
		$this->excel->getActiveSheet()->getColumnDimension('CQ')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('CQ6','Total');

		$this->excel->getActiveSheet()->getColumnDimension('CR')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CR6','Entre 18 y 30');
		$this->excel->getActiveSheet()->getColumnDimension('CS')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CS6','Entre 31 y 50');
		$this->excel->getActiveSheet()->getColumnDimension('CT')->setWidth(15);
		$this->excel->getActiveSheet()->SetCellValue('CT6','Mayores de 50');
		$this->excel->getActiveSheet()->getColumnDimension('CU')->setWidth(10);
		$this->excel->getActiveSheet()->SetCellValue('CU6','Total');

		$this->excel->getActiveSheet()->getColumnDimension('CV')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CV6','No empleados a termino indefinido');
		$this->excel->getActiveSheet()->getColumnDimension('CW')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CW6','No empleados a termino definido');

		$this->excel->getActiveSheet()->getColumnDimension('CX')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CX6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('CY')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CY6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('CZ')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('CZ6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DA')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DA6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DB')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DB6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DC')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DC6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DD')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DD6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DE')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DE6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DF')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DF6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DG')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DG6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DH')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DH6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DI')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DI6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DJ')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DJ6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DK')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DK6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DL')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DL6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DM')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DM6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DN')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DN6','Aplica/ No Aplica');
		$this->excel->getActiveSheet()->getColumnDimension('DO')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DO6','Cumple/ No Cumple');

		$this->excel->getActiveSheet()->getColumnDimension('DP')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DP6','Producción Materia Prima');
		$this->excel->getActiveSheet()->getColumnDimension('DQ')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DQ6','Transformación');
		$this->excel->getActiveSheet()->getColumnDimension('DR')->setWidth(20);
		$this->excel->getActiveSheet()->SetCellValue('DR6','Comercialización');

		$this->excel->getActiveSheet()->getColumnDimension('DS')->setWidth(20);

		$this->excel->getActiveSheet()->getColumnDimension('DT')->setWidth(40);
		$this->excel->getActiveSheet()->SetCellValue('DT6','¿Su organización está cosntituida legalmente(Cámara de comercion, DIAN)?');
		$this->excel->getActiveSheet()->getColumnDimension('DU')->setWidth(40);
		$this->excel->getActiveSheet()->SetCellValue('DU6','¿Su organización se encuentra operando en la actualidad?');

		foreach ($mads as $mad) {
			$anio = date("Y");
			$this->excel->getActiveSheet()->SetCellValue('A'.$fila, $anio);
			$this->excel->getActiveSheet()->SetCellValue('B'.$fila,'--');
			$this->excel->getActiveSheet()->SetCellValue('C'.$fila,'--');
			$this->excel->getActiveSheet()->SetCellValue('D'.$fila,'--');
			$this->excel->getActiveSheet()->SetCellValue('E'.$fila,$mad['region']);
			$this->excel->getActiveSheet()->SetCellValue('F'.$fila,$mad['autoridad']);
			$this->excel->getActiveSheet()->SetCellValue('G'.$fila,$mad['razon_social']);
			$this->excel->getActiveSheet()->SetCellValue('H'.$fila,$mad['nit']);
			$this->excel->getActiveSheet()->SetCellValue('I'.$fila,$mad['categoria']);
			$this->excel->getActiveSheet()->SetCellValue('J'.$fila,$mad['sector']);
			$this->excel->getActiveSheet()->SetCellValue('K'.$fila,$mad['subsector']);
			$this->excel->getActiveSheet()->SetCellValue('L'.$fila,$mad['descripcion_negocio']);
			$this->excel->getActiveSheet()->SetCellValue('M'.$fila,$mad['caracteristica_ambiental']);
			$this->excel->getActiveSheet()->SetCellValue('N'.$fila,$mad['correo']);
			$this->excel->getActiveSheet()->SetCellValue('O'.$fila,$mad['representante']);
			$this->excel->getActiveSheet()->SetCellValue('P'.$fila,$mad['celular']);
			$this->excel->getActiveSheet()->SetCellValue('Q'.$fila,$mad['direccion']);
			$this->excel->getActiveSheet()->SetCellValue('R'.$fila,$mad['municipio']);
			$this->excel->getActiveSheet()->SetCellValue('S'.$fila,$mad['departamento']);
			$this->excel->getActiveSheet()->SetCellValue('T'.$fila,$anio);
			$this->excel->getActiveSheet()->SetCellValue('U'.$fila,'11');
			$this->excel->getActiveSheet()->SetCellValue('V'.$fila,$mad['nivel1']);
			$this->excel->getActiveSheet()->SetCellValue('W'.$fila,$mad['nivel2']);
			$this->excel->getActiveSheet()->SetCellValue('X'.$fila,$mad['nivel3']);
			$this->excel->getActiveSheet()->SetCellValue('Y'.$fila,$mad['nivel4']);
			$this->excel->getActiveSheet()->SetCellValue('Z'.$fila,$mad['nivel5']);
			$this->excel->getActiveSheet()->SetCellValue('AA'.$fila,$mad['nivel6']);
			$this->excel->getActiveSheet()->SetCellValue('AB'.$fila,$mad['nivel7']);
			$this->excel->getActiveSheet()->SetCellValue('AC'.$fila,$mad['nivel8']);
			$this->excel->getActiveSheet()->SetCellValue('AD'.$fila,$mad['nivel9']);
			$this->excel->getActiveSheet()->SetCellValue('AE'.$fila,$mad['nivel10']);
			$this->excel->getActiveSheet()->SetCellValue('AF'.$fila,$mad['nivel11']);
			$this->excel->getActiveSheet()->SetCellValue('AG'.$fila,$mad['nivel12']);
			$this->excel->getActiveSheet()->SetCellValue('AH'.$fila,$mad['nivel13']);
			$this->excel->getActiveSheet()->SetCellValue('AI'.$fila,$mad['nivel14']);
			$this->excel->getActiveSheet()->SetCellValue('AJ'.$fila,$mad['nivel15']);
			$this->excel->getActiveSheet()->SetCellValue('AK'.$fila,$mad['nivel16']);
			$this->excel->getActiveSheet()->SetCellValue('AL'.$fila,$mad['nivel17']);
			$this->excel->getActiveSheet()->SetCellValue('AM'.$fila,$mad['nivel18']);
			$this->excel->getActiveSheet()->SetCellValue('AN'.$fila,$mad['nivel19']);
			$this->excel->getActiveSheet()->SetCellValue('AO'.$fila,$mad['nivel20']);
			$this->excel->getActiveSheet()->SetCellValue('AP'.$fila,$mad['nivel21']);
			$this->excel->getActiveSheet()->SetCellValue('AQ'.$fila,$mad['nivel22']);
			$this->excel->getActiveSheet()->SetCellValue('AR'.$fila,$mad['nivel23']);
			$this->excel->getActiveSheet()->SetCellValue('AS'.$fila,$mad['nivel24']);
			$this->excel->getActiveSheet()->SetCellValue('AT'.$fila,$mad['nivel25']);
			$this->excel->getActiveSheet()->SetCellValue('AU'.$fila,$mad['nivel26']);
			$this->excel->getActiveSheet()->SetCellValue('AV'.$fila,$mad['nivel27']);
			$this->excel->getActiveSheet()->SetCellValue('AW'.$fila,$mad['nivel28']);
			$this->excel->getActiveSheet()->SetCellValue('AX'.$fila,$mad['nivel29']);
			$this->excel->getActiveSheet()->SetCellValue('AY'.$fila,$mad['nivel30']);
			$this->excel->getActiveSheet()->SetCellValue('AZ'.$fila,$mad['nivel31']);
			$this->excel->getActiveSheet()->SetCellValue('BA'.$fila,$mad['nivel32']);
			$this->excel->getActiveSheet()->SetCellValue('BB'.$fila,$mad['nivel33']);
			$this->excel->getActiveSheet()->SetCellValue('BC'.$fila,$mad['nivel34']);
			$this->excel->getActiveSheet()->SetCellValue('BD'.$fila,$mad['nivel35']);
			$this->excel->getActiveSheet()->SetCellValue('BE'.$fila,$mad['nivel36']);
			$this->excel->getActiveSheet()->SetCellValue('BF'.$fila,$mad['nivel37']);
			$this->excel->getActiveSheet()->SetCellValue('BG'.$fila,$mad['nivel38']);
			$this->excel->getActiveSheet()->SetCellValue('BH'.$fila,$mad['nivel39']);
			$this->excel->getActiveSheet()->SetCellValue('BI'.$fila,$mad['nivel40']);
			$this->excel->getActiveSheet()->SetCellValue('BJ'.$fila,$mad['nivel41']);
			$this->excel->getActiveSheet()->SetCellValue('BK'.$fila,$mad['nivel42']);
			$this->excel->getActiveSheet()->SetCellValue('BL'.$fila,$mad['nivel43']);
			$this->excel->getActiveSheet()->SetCellValue('BM'.$fila,$mad['nivel44']);
			$this->excel->getActiveSheet()->SetCellValue('BN'.$fila,$mad['nivel45']);
			$this->excel->getActiveSheet()->SetCellValue('BO'.$fila,$mad['nivel46']);
			$this->excel->getActiveSheet()->SetCellValue('BP'.$fila,$mad['nivel47']);
			$this->excel->getActiveSheet()->SetCellValue('BQ'.$fila,$mad['nivel48']);
			$this->excel->getActiveSheet()->SetCellValue('BR'.$fila,$mad['nivel49']);
			$this->excel->getActiveSheet()->SetCellValue('BS'.$fila,$mad['nivel50']);
			$this->excel->getActiveSheet()->SetCellValue('BT'.$fila, '=AVERAGE(V'.$fila.':Z'.$fila.')');
			$this->excel->getActiveSheet()->getStyle('BT'.$fila.':CK'.$fila)
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
			);
			$this->excel->getActiveSheet()->SetCellValue('BU'.$fila, '=AVERAGE(AA'.$fila.':AH'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('BV'.$fila, '=AVERAGE(AI'.$fila.':AM'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('BW'.$fila, '=AVERAGE(AN'.$fila.':AP'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('BX'.$fila, '=AVERAGE(AQ'.$fila.':AQ'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('BY'.$fila, '=AVERAGE(AR'.$fila.':AU'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('BZ'.$fila, '=AVERAGE(AV'.$fila.':BA'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CA'.$fila, '=AVERAGE(BB'.$fila.':BD'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CB'.$fila, '=AVERAGE(BE'.$fila.':BG'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CC'.$fila, '=AVERAGE(BH'.$fila.':BM'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CD'.$fila, '=AVERAGE(BN'.$fila.':BO'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CE'.$fila, '=AVERAGE(BP'.$fila.':BS'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CF'.$fila, '=AVERAGE(BT'.$fila.':CD'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CG'.$fila, '=CE'.$fila);

			$this->excel->getActiveSheet()->SetCellValue('CH'.$fila, '=IF(CF'.$fila.'<=10%,"Inicial",IF(AND(CF'.$fila.'>10%,CF'.$fila.'<=30%),"Básico",IF(AND(CF'.$fila.'>30%,CF'.$fila.'<=50%),"Intermedio",IF(AND(CF'.$fila.'>50%,CF'.$fila.'<=80%),"Satisfactorio",IF(AND(CF'.$fila.'>80%,CF'.$fila.'<=100%,CG'.$fila.'<30%),"Avanzado",IF(AND(CF'.$fila.'>80%,CF'.$fila.'<=100%,CG'.$fila.'>=50%),"Ideal"))))))');

			$this->excel->getActiveSheet()->SetCellValue('CI'.$fila, '=AVERAGE(V'.$fila.':Z'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CJ'.$fila, '=AVERAGE(AA'.$fila.':BA'.$fila.')');
			$this->excel->getActiveSheet()->SetCellValue('CK'.$fila, '=AVERAGE(BB'.$fila.':BO'.$fila.')');

			$this->excel->getActiveSheet()->SetCellValue('CL'.$fila,$mad['plan_mejora']);

			$this->excel->getActiveSheet()->SetCellValue('CM'.$fila,$mad['venta_total']);
			$this->excel->getActiveSheet()->SetCellValue('CN'.$fila,$mad['costo_total']);

			$informacionEmpleado = $this->Reporte_model->getInformacionEmpleado($mad['id']);
			$caracteristicaEdad = $this->Reporte_model->getCaracteristicaEdad($mad['id']);
			// $caracteristicaEscolaridad = $this->Reporte_model->getCaracteristicaEscolaridad($mad['id']);
			// $caracteristicaDemografia = $this->Reporte_model->getCaracteristicaDemografia($mad['id']); 
			$caracteristicaVinculacion = $this->Reporte_model->getCaracteristicaVinculacion($mad['id']);
			$legislacion = $this->Reporte_model->getLegislacion($mad['id']);
			if($informacionEmpleado){
				$this->excel->getActiveSheet()->SetCellValue('CO'.$fila,$informacionEmpleado['socio_masculino']);
				$this->excel->getActiveSheet()->SetCellValue('CP'.$fila,$informacionEmpleado['socio_femenino']);
				// $this->excel->getActiveSheet()->SetCellValue('CO'.$fila,$informacionEmpleado['vinculado_masculino']);
				// $this->excel->getActiveSheet()->SetCellValue('CP'.$fila,$informacionEmpleado['vinculado_femenino']);
				// $this->excel->getActiveSheet()->SetCellValue('CO'.$fila,$informacionEmpleado['empleado_masculino']);
				// $this->excel->getActiveSheet()->SetCellValue('CP'.$fila,$informacionEmpleado['empleado_femenino']);
			}
			$this->excel->getActiveSheet()->SetCellValue('CQ'.$fila,"=SUM(CO".$fila.":CP".$fila.")");
			if($caracteristicaEdad){
				$this->excel->getActiveSheet()->SetCellValue('CR'.$fila,$caracteristicaEdad['empleado_rango_edad1']);
				$this->excel->getActiveSheet()->SetCellValue('CS'.$fila,$caracteristicaEdad['empleado_rango_edad2']);
				$this->excel->getActiveSheet()->SetCellValue('CT'.$fila,$caracteristicaEdad['empleado_rango_edad3']);
			}
			$this->excel->getActiveSheet()->SetCellValue('CU'.$fila,"=SUM(CR".$fila.":CT".$fila.")");
			if($caracteristicaVinculacion){
				$this->excel->getActiveSheet()->SetCellValue('CV'.$fila,$caracteristicaVinculacion['vinculacion_indefinido']);
				$this->excel->getActiveSheet()->SetCellValue('CW'.$fila,$caracteristicaVinculacion['vinculacion_definido']);
				//$this->excel->getActiveSheet()->SetCellValue('CT'.$fila,$caracteristicaVinculacion['vinculacion_dias']);
			}

			if($legislacion){
				$this->excel->getActiveSheet()->SetCellValue('CX'.$fila,$legislacion['aplica_registro1']);
				$this->excel->getActiveSheet()->SetCellValue('CY'.$fila,$legislacion['cumple_registro1']);
				$this->excel->getActiveSheet()->SetCellValue('CZ'.$fila,$legislacion['aplica_registro2']);
				$this->excel->getActiveSheet()->SetCellValue('DA'.$fila,$legislacion['cumple_registro2']);
				$this->excel->getActiveSheet()->SetCellValue('DB'.$fila,$legislacion['aplica_registro3']);
				$this->excel->getActiveSheet()->SetCellValue('DC'.$fila,$legislacion['cumple_registro3']);
				$this->excel->getActiveSheet()->SetCellValue('DD'.$fila,$legislacion['aplica_registro4']);
				$this->excel->getActiveSheet()->SetCellValue('DE'.$fila,$legislacion['cumple_registro4']);
				$this->excel->getActiveSheet()->SetCellValue('DF'.$fila,$legislacion['aplica_permiso1']);
				$this->excel->getActiveSheet()->SetCellValue('DG'.$fila,$legislacion['cumple_permiso1']);
				$this->excel->getActiveSheet()->SetCellValue('DH'.$fila,$legislacion['aplica_permiso2']);
				$this->excel->getActiveSheet()->SetCellValue('DI'.$fila,$legislacion['cumple_permiso2']);
				$this->excel->getActiveSheet()->SetCellValue('DJ'.$fila,$legislacion['aplica_permiso3']);
				$this->excel->getActiveSheet()->SetCellValue('DK'.$fila,$legislacion['cumple_permiso3']);
				$this->excel->getActiveSheet()->SetCellValue('DL'.$fila,$legislacion['aplica_permiso4']);
				$this->excel->getActiveSheet()->SetCellValue('DM'.$fila,$legislacion['cumple_permiso4']);
				$this->excel->getActiveSheet()->SetCellValue('DN'.$fila,$legislacion['aplica_permiso5']);
				$this->excel->getActiveSheet()->SetCellValue('DO'.$fila,$legislacion['cumple_permiso5']);
				// $this->excel->getActiveSheet()->SetCellValue('DP'.$fila,$legislacion['aplica_licencia1']);
				// $this->excel->getActiveSheet()->SetCellValue('DQ'.$fila,$legislacion['cumple_licencia1']);
			}

			$this->excel->getActiveSheet()->SetCellValue('DP'.$fila,$mad['actividad1']);
			$this->excel->getActiveSheet()->SetCellValue('DQ'.$fila,$mad['actividad2']);
			$this->excel->getActiveSheet()->SetCellValue('DR'.$fila,$mad['actividad3']);
			$this->excel->getActiveSheet()->SetCellValue('DS'.$fila,$mad['etapa']);
			$this->excel->getActiveSheet()->SetCellValue('DT'.$fila,$mad['constitucion_legal']);
			$this->excel->getActiveSheet()->SetCellValue('DU'.$fila,$mad['opera_actualmente']);
			
			$fila++;
		}
		$fila--;
		$this->excel->getActiveSheet()->setSharedStyle($estiloInformacion, "A$filaInicial:DU$fila");
		$this->excel->getActiveSheet()->getStyle("BT$filaInicial:CK$fila")
			->getNumberFormat()->applyFromArray( 
			array( 
			    'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
			)
		);
		//$this->excel->getActiveSheet()->setSharedStyle($estiloInformacion, "CL7:DU".$fila);


		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="informe_general.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		$objWriter->save('php://output');
	}

	

	
}