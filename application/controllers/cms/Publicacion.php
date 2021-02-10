<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("login")){
			$this->load->model("GestorContenido_model");
			$this->load->model("Cms_model");
			$this->load->model("Usuarios_model");
			$this->load->model("Modulo_model");
			$this->rol_usuario = $this->session->userdata("rol");
			$this->usuario_id = $this->session->userdata("usuario");
			$this->super = $this->session->userdata("super");
			$this->moduloControlador = array(
				'modulos' => $this->Modulo_model->getModulosRol($this->rol_usuario, $this->super),
				'admin' => $this->session->userdata("admin"),
			);
		}else{
			$this->session->set_flashdata("error","Su sesión expiró. Por favor, ingresar sus credenciales para iniciar nueva sesión.");
			redirect(base_url()."auth");
		}		
	}

	public function index(){
		$data = array(
			"publicaciones"=>$this->GestorContenido_model->getPublicaciones(),

		);
		$jquery = array("jquery"=>"lista.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/publicacion/lista", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	
	public function agregar(){
		$jquery = array("jquery" => "publicacionAgrega.js");
		$data = array(
			"tipo_publicacion" => $this->GestorContenido_model->getTipoPublicaciones(),
			"menus"=> $this->GestorContenido_model->getMenus(),
		);
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/publicacion/agrega2", $data);
		$this->load->view("layouts/dashboard/footer", $jquery);
	}

	//Tipo recurso = 1(Imagen) 2(Enlaces de video) 3(Menus)
	private function setRecursosPublicacion($tipo_recurso, $publicacion_id, $archivo){
	    if($tipo_recurso == 3 && !is_array($archivo)){
	        $cantidadRecurso = 0;
	    }else{
	        $cantidadRecurso =($tipo_recurso == 1)?count($_FILES[$archivo]['name']):count($archivo);
	    }
		
		$datos = 0;
		//var_dump($_FILES[$archivo]);
		//echo "$archivo -- cantidad".$cantidadRecurso."<br>";
    	if($cantidadRecurso>0){
    		$recursos = array();
    		if($tipo_recurso==1){
	            for($i = 0; $i < $cantidadRecurso; $i++){
	            	if($_FILES[$archivo]['size'][$i]>0){
		                $_FILES['aux']['name'] = $_FILES[$archivo]['name'][$i];
		                $_FILES['aux']['type'] = $_FILES[$archivo]['type'][$i];
		                $_FILES['aux']['tmp_name'] = $_FILES[$archivo]['tmp_name'][$i];
		                $_FILES['aux']['error'] = $_FILES[$archivo]['error'][$i];
		                $_FILES['aux']['size'] = $_FILES[$archivo]['size'][$i];
						//Subiendo el imagen
						$config['upload_path']          = './assets/archivo/';
						//echo base_url().'assets/';
				        $config['allowed_types']        = '*';
				        //Configurando el nuevo del archivo
				        //$config['file_name']			= $url_imagen;
				        $config['max_size']             = 11000;
				        $config['max_width'] = "2000";
			        	$config['max_height'] = "2000";
				        $this->load->library('upload', $config);
				        if ( !$this->upload->do_upload('aux'))
				        {

			                $error = array('error' => $this->upload->display_errors());
				        }
				        else
				        {
			                $data = array('upload_data' => $this->upload->data());
			                //var_dump($data);
			                //Directorio donde se almacena la imagen
			                $recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
			                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
			                $recursos[$i]['url_recurso'] = "assets/archivo/".$data['upload_data']['file_name'];
			                $datos++;
				        }
				    }
				}
				if($datos)$this->GestorContenido_model->setPublicacionRecurso($recursos);
	    	}else if($tipo_recurso==2){
	    		for($i = 0; $i < $cantidadRecurso; $i++){
	    			$recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
	                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
	                $recursos[$i]['url_recurso'] = $archivo[$i];
	                $datos++;
	    		}
	    		if($datos)$this->GestorContenido_model->setPublicacionRecurso($recursos);
	    	}else{//Agregar la publicación en los menus
	    		$datosMenu=0;
	    		for($i = 0; $i < $cantidadRecurso; $i++){
	    			$recursos[$i]['cms_menu_id'] = $archivo[$i];
	                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
	                $orden = $this->GestorContenido_model->getLastOrdenMenu($archivo[$i]);
	                $recursos[$i]['orden'] = ($orden)?$orden->orden+1:1;
	                $datosMenu++;
	    		}
	    		if($datosMenu)$this->GestorContenido_model->setMenuContenido($recursos);
	    	}
	    }
	    
	}

	private function updateRecursosPublicacion($tipo_recurso, $publicacion_id, $archivo){
	    if($tipo_recurso == 3 && !is_array($archivo)){
	        $cantidadRecurso = 0;
	    }else{
	        $cantidadRecurso =($tipo_recurso == 1)?count($_FILES[$archivo]['name']):count($archivo);
	    }
		$datos = 0;
		$datosEnv = 0;
		if($cantidadRecurso>0){
    		$recursos = array();
    		if($tipo_recurso==1){
	            for($i = 0; $i < $cantidadRecurso; $i++){
	            	if($_FILES[$archivo]['size'][$i]>0){
	            		$datosEnv++;
		                $_FILES['aux']['name'] = $_FILES[$archivo]['name'][$i];
		                $_FILES['aux']['type'] = $_FILES[$archivo]['type'][$i];
		                $_FILES['aux']['tmp_name'] = $_FILES[$archivo]['tmp_name'][$i];
		                $_FILES['aux']['error'] = $_FILES[$archivo]['error'][$i];
		                $_FILES['aux']['size'] = $_FILES[$archivo]['size'][$i];
						//Subiendo el imagen
						$config['upload_path']          = './assets/archivo/';
						//echo base_url().'assets/';
				        $config['allowed_types']        = '*';
				        //Configurando el nuevo del archivo
				        //$config['file_name']			= $url_imagen;
				        $config['max_size']             = 11000;
				        $config['max_width'] = "2000";
			        	$config['max_height'] = "2000";
				        $this->load->library('upload', $config);
				        if ( !$this->upload->do_upload('aux'))
				        {

			                $error = array('error' => $this->upload->display_errors());
				        }
				        else
				        {
			                $data = array('upload_data' => $this->upload->data());
			                //var_dump($data);
			                //Directorio donde se almacena la imagen
			                $recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
			                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
			                $recursos[$i]['url_recurso'] = "assets/archivo/".$data['upload_data']['file_name'];
			                $datos++;
				        }
				    }
				}
				if($datosEnv){
		    		$this->GestorContenido_model->deleteRecursosPublicacion($publicacion_id,$tipo_recurso);
		    		if($datos)$this->GestorContenido_model->setPublicacionRecurso($recursos);
		    	}
	    	}else if($tipo_recurso==2){
	    		for($i = 0; $i < $cantidadRecurso; $i++){
	    			$recursos[$i]['tipo_recurso_id'] = $tipo_recurso;
	                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
	                $recursos[$i]['url_recurso'] = $archivo[$i];
	                $datos++;
	    		}
	    		$this->GestorContenido_model->deleteRecursosPublicacion($publicacion_id,$tipo_recurso);
	    		if($datos)$this->GestorContenido_model->setPublicacionRecurso($recursos);
	    	}else{//Agregar la publicación en los menus
	    		$this->GestorContenido_model->deleteMenuContenido($publicacion_id);
	    		$datosMenu=0;
	    		for($i = 0; $i < $cantidadRecurso; $i++){
	    			$recursos[$i]['cms_menu_id'] = $archivo[$i];
	                $recursos[$i]['cms_publicacion_id'] = $publicacion_id;
	                $orden = $this->GestorContenido_model->getLastOrdenMenu($archivo[$i]);
	                $recursos[$i]['orden'] = ($orden)?$orden->orden+1:1;
	                $datosMenu++;
	    		}
	    		if($datosMenu)$this->GestorContenido_model->setMenuContenido($recursos);
	    	}
	    }else{
	        if($tipo_recurso==3)$this->GestorContenido_model->deleteMenuContenido($publicacion_id);
	    }
	    
	}

	public function almacenar(){
		date_default_timezone_set('America/Bogota');
		$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de publicación","required");
		$this->form_validation->set_rules("nombre","Nombre de publicación","required|min_length[3]|max_length[100]|is_unique[cms_publicacion.nombre]");
		$this->form_validation->set_rules("descripcion","Descripción de publicación","required|min_length[3]");
		if($this->form_validation->run())
		{
			$fAperturaPermitido = array(1,2);
			$fCierrePermitido = array(1);
			$hAperturaPermitida = array(2);
			$documentoPermitido = array(1,2);
			$enlacePermitido = array(1,2,3);
			$cms_tipo_publicacion_id = $this->input->post("cms_tipo_publicacion_id");
			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$slug = $this->Cms_model->slugify($nombre);
			$fecha_apertura = (in_array($cms_tipo_publicacion_id, $fAperturaPermitido))?$this->input->post("fecha_apertura"):"";
			$fecha_cierre = (in_array($cms_tipo_publicacion_id, $fCierrePermitido))?$this->input->post("fecha_cierre"):"";
			$hora_apertura = (in_array($cms_tipo_publicacion_id, $hAperturaPermitida))?$this->input->post("hora_apertura"):"";
			$fecha_creacion = date('Y-m-d H:i:s');
			$fecha = ($cms_tipo_publicacion_id == 5)?$this->input->post("fecha"):"";
			$video = $this->input->post("video");
			$menu_id = $this->input->post("menu_id");
			$url = (in_array($cms_tipo_publicacion_id, $enlacePermitido))?$this->input->post("url"):"";
			$mensaje = "<h5>Información sobre la acción realizada:</h5><ul>";
			$tipo = $this->GestorContenido_model->getNombreTipoPublicacion($cms_tipo_publicacion_id);
			$nombre_archivo = ($tipo)?$tipo->nombre:'No aplica';
			$documento = array(
							'nombre'=>$nombre_archivo.'_documento'.$nombre.'__'.$fecha_apertura,
						);

			$imagen = array(
							'nombre'=>$nombre_archivo.'_imagen_'.$nombre.'__'.$fecha_apertura,
						);

			$info = array(
						'nombre' => $nombre,
						'cms_tipo_publicacion_id' => $cms_tipo_publicacion_id,
						'descripcion' => $descripcion,
						'fecha'=> $fecha,
						'slug' => $slug,
						'fecha_apertura' => $fecha_apertura,
						'fecha_cierre' => $fecha_cierre,
						'fecha_creacion' => $fecha_creacion,
						'hora_apertura' => $hora_apertura,
						'usuario_id' => $this->usuario_id,
						'url' => $url,
						'estado' => 1,
			);

			if(($_FILES['documento']['size']>0) && (in_array($cms_tipo_publicacion_id, $documentoPermitido))){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_documento_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 8000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('documento'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $mensaje.="<li>No se cargo correctamente el documento de la publicación. <sub>".$error['error']."</sub>.</li>";
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $documento['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if($this->GestorContenido_model->setDocumento($documento)){
	                	$info["cms_documento_id"] = $this->GestorContenido_model->lastID();
	                	$mensaje.="<li>El documento de la publicación se guardo con éxito.</li>";
		        	}    
		        }
		    }

		    /*if(($_FILES['imagen']['size']>0)){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_imagen_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 5000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $mensaje.="<li>No se cargo correctamente la imagen de la publicación. <sub>".$error['error']."</sub>.</li>";
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $imagen['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Guardar el registro de la nueva imagen
	                if($this->GestorContenido_model->setArchivo($imagen)){
		        		$info["imagen_id"] = $this->GestorContenido_model->lastID();
		        		$mensaje.="<li>La imagen de la publicación se guardo con éxito.</li>";
		        	}
		        }
		    }*/

		    if(!in_array($cms_tipo_publicacion_id, $enlacePermitido)){
				$info['cms_documento_id'] = 0;
			}

		    if($this->GestorContenido_model->setPublicacion($info))
		    {
		    	$publicacion_id = $this->GestorContenido_model->lastID();
		    	$this->setRecursosPublicacion(1, $publicacion_id, 'imagen');
		    	$this->setRecursosPublicacion(2, $publicacion_id, $video);
		    	$this->setRecursosPublicacion(3, $publicacion_id, $menu_id);

		    	$mensaje.="<li>La información general de la publicación se guardo con éxito.</li>";
		    	$this->session->set_flashdata("error",$mensaje);
		    	redirect(base_url()."cms_publicaciones");
		    }else{
		    	$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."cms_publicacion/agregar");
		    }

		}else{
			$this->agregar();
		}
	}

	public function editar($id){
		$data = array(
			"publicacion" => $this->GestorContenido_model->getPublicacion($id),
			"tipo_publicacion" => $this->GestorContenido_model->getTipoPublicaciones(),
			"videos" => $this->GestorContenido_model->getPublicacionRecursos($id,2),
			"imagenes" => $this->GestorContenido_model->getPublicacionRecursos($id,1),
			"menus" => $this->GestorContenido_model->getMenus(),
			"menuPublicacion" => $this->GestorContenido_model->getMenusPublicacion($id),
		);
		$jquery = array("jquery" => "publicacionAgrega.js");
		$this->load->view("layouts/dashboard/header");
		$this->load->view("layouts/dashboard/sidebar", $this->moduloControlador);
		$this->load->view("dashboard/cms/publicacion/editar", $data);
		$this->load->view("layouts/dashboard/footer",$jquery);
	}	

	public function actualizar(){
		/*$path = "assets/archivo/convocatoria_documento_Inaguracion_35-45__2020-02-27.png";
		if (is_readable($path) && unlink($path)) {
		    echo "The file has been deleted";
		} else {
		    echo "The file was not found or not readable and could not be deleted";
		}*/
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$publicacionActual = $this->GestorContenido_model->getPublicacion($id);

		if ($nombre == $publicacionActual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[cms_publicacion.nombre]";

		}
		//$this->form_validation->set_rules("cms_tipo_publicacion_id","Tipo de publicación","required");
		$this->form_validation->set_rules("nombre","Nombre de publicación","required|min_length[3]|max_length[100]".$is_unique);
		$this->form_validation->set_rules("descripcion","Descripción de publicación","required|min_length[3]");
		if($this->form_validation->run()){
			$fAperturaPermitido = array(1,2);
			$fCierrePermitido = array(1);
			$hAperturaPermitida = array(2);
			$documentoPermitido = array(1,2);
			$enlacePermitido = array(1,2,3);
			$cms_tipo_publicacion_id = $this->input->post("cms_tipo_publicacion_id");
			$descripcion = $this->input->post("descripcion");
			$fecha_apertura = (in_array($cms_tipo_publicacion_id, $fAperturaPermitido))?$this->input->post("fecha_apertura"):"";
			$fecha_cierre = (in_array($cms_tipo_publicacion_id, $fCierrePermitido))?$this->input->post("fecha_cierre"):"";
			$hora_apertura = (in_array($cms_tipo_publicacion_id, $hAperturaPermitida))?$this->input->post("hora_apertura"):"";
			$fecha_creacion = date('Y-m-d H:i:s');
			$url = (in_array($cms_tipo_publicacion_id, $enlacePermitido))?$this->input->post("url"):"";
			$fecha = ($cms_tipo_publicacion_id == 5)?$this->input->post("fecha"):"";
			$video = $this->input->post("video");
			$menu_id = $this->input->post("menu_id");
			/*$slug = $this->Cms_model->slugify($nombre);*/
			$archivos = $this->GestorContenido_model->getArchivosPublicacion($id);
			$mensaje = "<h5>Información sobre la actualización realizada:</h5><ul>";
			$tipo = $this->GestorContenido_model->getNombreTipoPublicacion($cms_tipo_publicacion_id);
			$nombre_archivo = ($tipo)?$tipo->nombre:'No aplica';
			$documento = array(
							'nombre'=>$nombre_archivo.'_documento'.$nombre.'__'.$fecha_apertura,
						);
			$imagen = array(
							'nombre'=>$nombre_archivo.'_imagen_'.$nombre.'__'.$fecha_apertura,
						);
			$info = array(
						'nombre' => $nombre,
						'cms_tipo_publicacion_id' => $cms_tipo_publicacion_id,
						'descripcion' => $descripcion,
						'fecha'=> $fecha,
						'fecha_apertura' => $fecha_apertura,
						'fecha_cierre' => $fecha_cierre,
						'url' => $url,
						/*'slug' => $slug,*/
			);
			
			if(($_FILES['documento']['size']>0) && (in_array($cms_tipo_publicacion_id, $documentoPermitido))){
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_documento_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 8000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('documento'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $mensaje.="<li>No se pudo actualizar con éxito el documento de referencia de la publicación ".$nombre.". <sub>".$error['error']."</sub></li>";
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);

	                //Directorio donde se almacena la imagen
	                $documento['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Se verifica si hubo documento previo
	                if($archivos->documento){
	                	if (is_readable($archivos->url_documento) && unlink($archivos->url_documento)) {
						    echo "The file has been deleted";
						} else {
						    echo "The file was not found or not readable and could not be deleted";
						}
	                	$this->GestorContenido_model->updateDocumento($documento, $archivos->documento);
	                	$mensaje.="<li>El documento de referencia de la publicación fue actualizado con éxito. </li>";
	                }else{
	                	//Guardar el registro por primera vez
		                if($this->GestorContenido_model->setDocumento($documento)){
		                	$info["cms_documento_id"] = $this->GestorContenido_model->lastID();
		                	$mensaje.="<li>El documento de referencia de la publicación fue creado con éxito. </li>";
			        	}
	                }
	                    
		        }
		    }

		    /*if(($_FILES['imagen']['size']>0)){
		    	
				//Subiendo el imagen
				$config['upload_path']          = './assets/archivo/';
				//echo base_url().'assets/';
		        $config['allowed_types']        = '*';
		        //Configurando el nuevo del archivo
		        $config['file_name']			= $tipo[$cms_tipo_publicacion_id-1].'_imagen_'.$nombre.'__'.$fecha_apertura;
		        $config['max_size']             = 5000;
		        $config['max_width'] = "2000";
	        	$config['max_height'] = "2000";
		        $this->load->library('upload', $config);
		        if ( !$this->upload->do_upload('imagen'))
		        {
	                $error = array('error' => $this->upload->display_errors());
	                $mensaje.="<li>No se pudo actualizar con éxito la imagen de portada de la publicación ".$nombre.". <sub>".$error['error']."</sub></li>";
		        }
		        else
		        {
	                $data = array('upload_data' => $this->upload->data());
	                //var_dump($data);
	                //Directorio donde se almacena la imagen
	                $imagen['url'] = "assets/archivo/".$data['upload_data']['file_name'];
	                //Se verifica si hubo documento previo
	                if($archivos->imagen){
	                	
	                	if (is_readable($archivos->url_imagen) && unlink($archivos->url_imagen)) {
						    echo "The file has been deleted ".$archivos->url_imagen;
						} else {
						    echo "The file was not found or not readable and could not be deleted".$archivos->url_imagen;
						}
	                	$this->GestorContenido_model->updateArchivo($imagen, $archivos->imagen);
	                	$mensaje.="<li>La imagen de portada de la publicación fue actualizada con éxito. </li>";
	                }else{
	                	
	                	//Guardar el registro por primera vez
		                if($this->GestorContenido_model->setArchivo($imagen)){	
		                	$info["imagen_id"] = $this->GestorContenido_model->lastID();
		                	$mensaje.="<li>La imagen de portada de la publicación fue creada con éxito. </li>";
			        	}
	                }
		        }
		    }*/
		    
		    if(!in_array($cms_tipo_publicacion_id, $enlacePermitido)){
		    	if(isset($archivos)){
		    		// if(is_readable($archivos->url_imagen) && unlink($archivos->url_imagen)){
			    	// 	echo "El archivo fue eliminado";
			    	// }
			    	if(is_readable($archivos->url_documento) && unlink($archivos->url_documento)){
			    		echo "El archivo fue eliminado";
			    	}
		    	}
	    		$info["cms_documento_id"] = 0;
	    		//$info["imagen_id"] = 0;
		    }
		    
		    if($this->GestorContenido_model->updatePublicacion($info, $id)){
		    	$this->updateRecursosPublicacion(1, $id, 'imagen');
		    	$this->updateRecursosPublicacion(2, $id, $video);
		    	$this->updateRecursosPublicacion(3, $id, $menu_id);
		    	
		    	$mensaje.="<li>La información general de la publicación fue actualizada con éxito. </li></ul>";
		    	$this->session->set_flashdata("error",$mensaje);
		    	redirect(base_url()."cms_publicaciones");
		    }else{
		    	$this->session->set_flashdata("error","Error al actualizar información.");
				redirect(base_url()."cms_publicacion/".$id);
		    }

		}else{
			$this->editar($id);
		}

	}

	public function estado($id){
		$info = $this->GestorContenido_model->getEstado($id);
		$estado = ($info->estado)?0:1;
		$data = array('estado'=>$estado);
		$this->GestorContenido_model->updatePublicacion($data, $id);
		redirect(base_url()."cms_publicaciones");
	}
	
	public function eliminar($id){
		$this->GestorContenido_model->deleteMenuContenido($id);
		$this->GestorContenido_model->deletePublicacion($id);
		redirect(base_url()."cms_publicaciones");
	}


}