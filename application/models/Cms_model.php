<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_model extends CI_Model {
    
    public function getRegistrosCondifuracion(){
        $this->db->select('id,idseccion,nombre_seccion,orden,estado,display');
		$this->db->from('cms_conf_ppal');
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();    
    } 
    
    public function getRegistros(){
        $this->db->select('id,nivel_menu,menupadre,nombre,tipomenu,slugArticulo,programado,inicio,final,estado,fecha');
		$this->db->from('vistamenu');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();    
    }    
    /** Modificaciones de última versión **/
    public function getMenus(){
    	$this->db->select("m.id, IF(m.menupadre=0, tm.nombre, mp.nombre) as posicion, m.nombre, tp.nombre as contenido, m.slugArticulo, m.estado, m.menupadre");
    	$this->db->from("cms_menu m");
    	$this->db->join("cms_menu mp", "m.menupadre=mp.id","left");
    	$this->db->join("cms_tipo_menu tm","m.tipomenu=tm.id", "left");
    	$this->db->join("cms_tipo_publicacion tp","m.cms_tipo_publicacion_id=tp.id", "left");
    	$this->db->order_by("m.orden");
    	$resultados = $this->db->get();
    	return $resultados->result();
    }
       

    public function getListaMenu(){
        $this->db->select('id,nombre');
		$this->db->from('cms_menu');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } 

    public function getMenuPadre(){
        $this->db->select('id,nombre');
		$this->db->from('cms_menu');
		$this->db->order_by('orden', 'ASC');
		$this->db->where('menuPadre', 0);
		$resultados = $this->db->get();
		return $resultados->result();        
    }

    public function getTipoMenu2(){
        $this->db->select('*');
		$this->db->from('cms_tipo_menu');
		$this->db->where('estado',1);
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }  
    public function getTipoMenu(){
        $this->db->select('id,nameType');
		$this->db->from('cms_menu_type');
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    } 

    public function getContenidos2(){
    	$this->db->select("*");
    	$this->db->from("cms_publicacion");
    	$this->db->where("cms_tipo_publicacion_id",4);
    	$resultados = $this->db->get();
    	return $resultados->result();
    }

     public function getContenidoId($id_contenido){
    	$this->db->select("*");
    	$this->db->from("cms_publicacion");
    	$this->db->where("id",$id_contenido);
    	$this->db->where("cms_tipo_publicacion_id",4);
    	$resultados = $this->db->get();
    	return $resultados->first_row();
    }

    public function getSlugTipoPublicacion($id){
    	$this->db->select("slug");
    	$this->db->from("cms_tipo_publicacion");
    	$this->db->where("id", $id);
    	$resultado = $this->db->get();
    	return $resultado->row();
    }

    public function getTipoPublicacionesC(){
    	$this->db->select("*");
    	$this->db->from("cms_tipo_publicacion");
    	$this->db->where("id<=",6);
    	$resultados = $this->db->get();
    	return $resultados->result();
    }

    public function setMenu($datos){
		return $this->db->insert("cms_menu", $datos);
	}

	public function getMenu3($id){
		$this->db->select("*");
		$this->db->from("cms_menu");
		$this->db->where("id",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function getMenusPrincipal(){
		$this->db->select("*");
		$this->db->from("cms_menu");
		$this->db->where("tipomenu",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMenusSecundario(){
		$this->db->select("*");
		$this->db->from("cms_menu");
		$this->db->where("tipomenu",2);
		$this->db->where("estado",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUltimoMenu($where){
		$this->db->select("max(orden) as ultimo");
		$this->db->from("cms_menu");
		$this->db->where($where);
		$resultado = $this->db->get();
		return $resultado->row()->ultimo;
	}

	public function getOrdenMenu($id){
		$this->db->select("orden");
		$this->db->from("cms_menu");
		$this->db->where("id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getSiguienteMenu($tipomenu, $orden){
		$this->db->select("orden");
		$this->db->from("cms_menu");
		$this->db->where("tipomenu", $tipomenu);
		$this->db->where("orden>", $orden);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getSiguientesMenu($where){
		$this->db->select("id, orden");
		$this->db->from("cms_menu");
		$this->db->where($where);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function updateMenu3($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("cms_menu", $data);
	}

	public function deleteMenu($id){
		$this->db->where("id", $id);
		return $this->db->delete("cms_menu");
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function setMenuContenido($data){
		return $this->db->insert_batch('cms_menu_contenido', $data);
	}

	public function getMenuContenidos($id){
		$this->db->select("cms_publicacion_id");
		$this->db->from("cms_menu_contenido");
		//$this->db->join("cms_publicacion p","mc.cms_publicacion_id=p.id");
		$this->db->where("cms_menu_id",$id);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getMenuContenidos2($id){
		$this->db->select("mc.*, p.nombre as titulo");
		$this->db->from("cms_menu_contenido mc");
		$this->db->join("cms_publicacion p","mc.cms_publicacion_id=p.id");
		$this->db->where("mc.cms_menu_id",$id);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getMenuContenidoPublicacion($menu_id){
		$this->db->select("mc.*, p.nombre as titulo, a.url as portada, p.descripcion");
		$this->db->from("cms_menu_contenido mc");
		$this->db->join("cms_publicacion p","mc.cms_publicacion_id=p.id");
		$this->db->join("archivo a", "p.imagen_id=a.id", "left");
		$this->db->where("mc.cms_menu_id",$menu_id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function deleteMenuContenido($id){
		$this->db->where("cms_menu_id", $id);
		return $this->db->delete("cms_menu_contenido");
	}
    /** Fin de moficación **/
    public function getContenidoGaleria(){
    	 $this->db->select('cms_galerias.id, nombre,descripcion, fecha_creacion, url');
		$this->db->from('cms_galerias');
		$this->db->join("cms_galeria_archivo", "cms_galeria_archivo.cms_galeria_id = cms_galerias.id");
    	$query = $this->db->get();
    	 
    	return $query->result();
    }

    /*public function getListaMenu(){
        $this->db->select('id,nombre');
		$this->db->from('cms_menu');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } */

    public function getRegistroMenu($id){
    	$this->db->select("*");
    	$this->db->from("cms_menu");
    	$this->db->where("id", $id);
    	$query = $this->db->get();
    	return $query->first_row();
    }
    public function setEstadoMenu($estado, $id){
    	$this->db->set("estado",$estado);
    	$this->db->where("id", $id);
    	$this->db->update("cms_menu");
    	return $this->db->affected_rows();
    }

    /*public function getTipoMenu(){
        $this->db->select('id,nameType');
		$this->db->from('cms_menu_type');
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }*/ 

    public function getNumsRegistros($tabla, $where){
    	$resultados = $this->db->get_where($tabla, $where);
    	return $resultados->num_rows();
    }

    public function getContenidos(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,likes,hates,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->order_by('titulo', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    }


	public function insertarMenu($datos){
		return $this->db->insert("cms_menu", $datos);
	}	

	public function eliminarMenu($id){
		$this->db->where('id', $id);
		$this->db->delete('cms_menu');
		//return $this->db->delete("cms_menu", $datos);
	}

	public function actualizarMenu($id, $data){
		
		$this->db->where('id', $id);
		$this->db->update('cms_menu', $data);
	}
	
	public function actualizarDatos($id, $data){
		$this->db->update('cms_contacto', $data);
		$this->db->where('id', $id);
		
	}


	 public function getVerRegistro($id){
        $this->db->select('id, nivel_menu, menupadre, nombre, tipomenu,slugArticulo,programado,inicio,final,estado,fecha');
		$this->db->from('vistamenu');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    } 	

	/***********************************************************/
	//fondos de inversion
	/***********************************************************/

	 public function getRegistrosFi(){
        $this->db->select('id,nombre, Url, descripcion');
		$this->db->from('cms_fondos');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }     

    public function getListaFi(){
        $this->db->select('id,nombre');
		$this->db->from('cms_fondos');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } 

    public function getContenidosFi(){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_fondos');
		$this->db->order_by('titulo', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }

     public function getVerRegistroFi($id){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_fondos');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }

	public function insertarFi($datos){
		return $this->db->insert("cms_fondos", $datos);
	}	

	public function eliminarFi($id){
		$this->db->where('id', $id);
		$this->db->delete('cms_fondos');
	}

	public function actualizarFi($id, $data){
		$this->db->where('id', $id);
		$this->db->update('cms_fondos', $data);
	}	

	/***********************************************************/
	//fondos de Doc
	/***********************************************************/

	 public function getRegistrosDoc(){
        $this->db->select('id,nombre, Url, descripcion');
		$this->db->from('cms_documentos');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }     

    public function getListaDoc(){
        $this->db->select('id,nombre');
		$this->db->from('cms_documentos');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } 

    public function getContenidosDoc(){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_documentos');
		$this->db->order_by('titulo', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }

     public function getVerRegistroDoc($id){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_documentos');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }

	public function insertarDoc($datos){
		return $this->db->insert("cms_documentos", $datos);
	}	

	public function eliminarDoc($id){
		$this->db->where('id', $id);
		$this->db->delete('cms_documentos');
	}

	public function actualizarDoc($id, $data){
		$this->db->where('id', $id);
		$this->db->update('cms_documentos', $data);
		return $this->db->affected_rows();
	}	

/***********************************************************/
	//fondos de Patrocinadores Logos 
	/***********************************************************/

	 public function getRegistrosPat(){
        $this->db->select('id,nombre, Url, descripcion');
		$this->db->from('cms_patrocinadores');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }     

    public function getListaPat(){
        $this->db->select('id,nombre');
		$this->db->from('cms_patrocinadores');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } 

    public function getContenidosPat(){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_patrocinadores');
		$this->db->order_by('titulo', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }

     public function getVerRegistroPat($id){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_patrocinadores');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }

	public function insertarPat($datos){
		return $this->db->insert("cms_patrocinadores", $datos);
	}	

	public function eliminarPat($id){
		$this->db->where('id', $id);
		$this->db->delete('cms_patrocinadores');
	}

	public function actualizarPat($id, $data){
		$this->db->where('id', $id);
		$this->db->update('cms_patrocinadores', $data);
		return	$this->db->affected_rows();
	}	

	/***********************************************************/
	//Equipo de trabajo
	/***********************************************************/

	 public function getRegistrosEq(){
        $this->db->select('id,nombre, fotografia, descripcion');
		$this->db->from('cms_miembros');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();        
    }     

    public function getListaEq(){
        $this->db->select('id,nombre');
		$this->db->from('cms_miembros');
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();        
    } 

    public function getContenidosEq(){
        $this->db->select('id,nombre,fotografia,descripcion');
		$this->db->from('cms_miembros');
		$this->db->order_by('titulo', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
    }

     public function getVerRegistroEq($id){
        $this->db->select('id,nombre,fotografia,descripcion');
		$this->db->from('cms_miembros');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->row();        
    }

	public function insertarEq($datos){
		return $this->db->insert("cms_miembros", $datos);
	}	

	public function eliminarEq($id){
		$this->db->where('id', $id);
		$this->db->delete('cms_miembros');
	}

	public function actualizarEq($id, $data){
		$this->db->where('id', $id);
		 $this->db->update('cms_miembros', $data);
		 return $this->db->affected_rows();
	}	


	/***********************************************************/
	// General functions
	/***********************************************************/

	public static function slugify($text)
	{
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, '-');

	  // remove duplicate -
	  $text = preg_replace('~-+~', '-', $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  return $text;
	}

	public function insertar($tabla, $datos){
		return $this->db->insert($tabla, $datos);
	}	

	public function actualizar($tabla, $pk, $id, $data)
	{
		$this->db->where($pk, $id);
		$this->db->update($tabla, $data);
		return $this->db->affected_rows();
	}	

	public function eliminar($tabla, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->delete($tabla);
		//return $this->db->delete("cms_menu", $datos);
	}

	public function active($tabla, $pk, $id, $field, $value){
		$this->db->set($field, $value, FALSE);
		$this->db->where($pk, $id);
		$this->db->update($tabla); 
	}

    /***********************************************************/
	// para el modulo de contenidos 
	/***********************************************************/

	

	public function getRegistrosContenidos(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,likes,hates,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    } 

    public function getCategoriasContenidos(){
        $this->db->select('id,nombre_categoria');
		$this->db->from('cms_categoriacontenido');
		$this->db->order_by('nombre_categoria', 'ASC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    } 


	 public function getVerRegistroContenido($id){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,likes,hates,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    }

/***********************************************************/
	// para el modulo de convocatorias 
	/***********************************************************/

	

	public function getRegistrosConvocatorias(){
        $this->db->select('id,titulo,descripcion,slugconvo,fechacierre,portada,statusPost');
		$this->db->from('cms_convocatorias');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    } 

   

	 public function getVerRegistroCovocatorias($id){
        $this->db->select('id,titulo,descripcion,slugconvo,fechacierre,portada,statusPost');
		$this->db->from('cms_convocatorias');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    }


    /***********************************************************/
	// para el modulo de eventos 
	/***********************************************************/

	

	public function getRegistrosEventos(){
        $this->db->select('id,nombreEvento,descripcion,fechaEvento,horaEvento,portadaEvento,Url,infoExtra,slug,estado');
		$this->db->from('cms_eventos');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();
        
    } 

	public function getVerRegistroEventos($id){
        $this->db->select('id,nombreEvento,descripcion,fechaEvento,horaEvento,portadaEvento,Url,infoExtra,slug,estado');
		$this->db->from('cms_eventos');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();  
    }

   // ****************************************************************
   // contenido index
   // 
   	
    public function getContenidoPrincial2(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,portada');
		$this->db->from('cms_entradas');
		$this->db->where('id', '40');
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getContenidoPrincial(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,portada');
		$this->db->from('cms_entradas');
		$this->db->where('id', '31');
		$resultados = $this->db->get();
		return $resultados->result();
    }
   // ****************************************************************

	public function getRegistrosSliders(){
        $this->db->select('id,nombre,fotografia,Url,descripcion,statusSlider');
		$this->db->from('cms_slider');
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();    
    } 

	public function getVerRegistroSliders($id){
        $this->db->select('id,nombre,fotografia,Url,descripcion,statusSlider');
		$this->db->from('cms_slider');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();    
    }


	 public function getMenu(){
        $this->db->select('id,nivel_menu,menupadre,tipomenu,nombre,slugArticulo,orden,programado,inicio,final,estado,fecha');
		$this->db->from('cms_menu');
		$this->db->where('tipomenu', '1');
		$this->db->where('estado', '1');
		$this->db->order_by("orden");
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
    public function getMenuPrincipal(){
    	$this->db->select("*");
    	$this->db->from('cms_menu');
		$this->db->where('tipomenu', '1');
		$this->db->where('estado', '1');
		$this->db->order_by("orden");
		$resultados = $this->db->get();
		$datos = array();
		foreach($resultados->result_array() as $r){
			//var_dump($r);
			$condicion = array(
				'cms_menu.menupadre'=>$r['id']
			);
			$r['submenus'] = $this->getSubMenus($condicion);
			$datos[] = $r;
		}
		return $datos;
		//return $resultados->result();
    }

    public function getMenuSecundario(){
    	$this->db->select("*");
    	$this->db->from('cms_menu');
		$this->db->where('tipomenu', '2');
		$this->db->where('estado', '1');
		$this->db->order_by("orden");
		$resultados = $this->db->get();
		$datos = array();
		foreach($resultados->result_array() as $r){
			//var_dump($r);
			$condicion = array(
				'cms_menu.menupadre'=>$r['id']
			);
			$r['submenus'] = $this->getSubMenus($condicion);
			$datos[] = $r;
		}
		return $datos;
		//return $resultados->result();
    }

   private function getSubMenus($where){
		$this->db->select("*");
		$this->db->from("cms_menu");
		$this->db->where($where);
		$this->db->order_by("cms_menu.orden", "ASC");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

     public function getMenuId($menu_id){
        $this->db->select('id,nivel_menu,menupadre, descripcion, tipomenu,nombre,slugArticulo,orden,programado,inicio,final,estado,fecha');
		$this->db->from('cms_menu');
		$this->db->where("id", $menu_id);
		$resultados = $this->db->get();
		return $resultados->first_row();
    }  

    public function getMenu2(){
        $this->db->select('id,nivel_menu, descripcion, menupadre,tipomenu,nombre,slugArticulo,orden,programado,inicio,final,estado,fecha');
		$this->db->from('cms_menu');
		$this->db->where('tipomenu', '2');
		$this->db->where('estado', 1);
		$resultados = $this->db->get();
		return $resultados->result();
    } 

    public function getPratrocinadores(){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_patrocinadores');
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getEquipov(){
        $this->db->select('id,nombre,fotografia,descripcion');
		$this->db->from('cms_miembros');
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getEventov(){
        $this->db->select('id,nombreEvento,descripcion,fechaEvento,horaEvento,portadaEvento,Url,infoExtra,slug,estado');
		$this->db->from('cms_eventos');
		$this->db->where('estado', 'A');
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function getGaleria(){
        $this->db->select('cms_galerias.id,nombre,descripcion, fecha_creacion, url');
		$this->db->from('cms_galerias');
		$this->db->join("cms_galeria_archivo", "cms_galeria_archivo.cms_galeria_id = cms_galerias.id");
		$this->db->where("cms_galerias.estado", 1);
		$this->db->order_by("cms_galerias.fecha_modificacion","desc");
		$resultados = $this->db->get();
		return $resultados->result();        
    } 
    
    public function getVerRegistroGaleria($id){
        $this->db->select('id,nombre,fotografia,descripcion');
		$this->db->from('cms_galeria');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'DESC');
		$resultados = $this->db->get();
		return $resultados->result();    
    }

    public function getEventos(){
        $this->db->select('id,nombreEvento,descripcion,fechaEvento,portadaEvento,Url,infoExtra,slug,estado');
		$this->db->from('cms_eventos');
		$resultados = $this->db->get();
		return $resultados->result();
    }   

    public function getEntradas(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,likes,hates,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$resultados = $this->db->get();
		return $resultados->result();
    } 

    public function getNoticias(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->where('id_categoria','1');
		$resultados = $this->db->get();
		return $resultados->result();
    }    

    public function getServicios(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->where('id_categoria','4');
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
    public function getServicioSlug($slug){
        $this->db->select('*');
		$this->db->where('slug',$slug);
		$resultados = $this->db->get("servicio");
		return $resultados->row();
    }
    
    public function getProductoSlug($slug){
        $this->db->select('*');
		$this->db->where('slug',$slug);
		$resultados = $this->db->get("producto");
		return $resultados->row();
    }
    
    public function getProductos2(){
        $this->db->select('*');
		$this->db->from('producto');
		$this->db->where('estado',1);
		$resultados = $this->db->get();
		return $resultados->num_rows();
    }   

    public function getServicios2(){
        $this->db->select('*');
		$this->db->from('servicio');
		$this->db->where('estado',1);
		$resultados = $this->db->get();
		return $resultados->num_rows();
    }       

    public function getNegociosverdes(){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,autor,fechacrea,portada,statusPost,video');
		$this->db->from('cms_entradas');
		$this->db->where('id_categoria','5');
		$resultados = $this->db->get();
		return $resultados->result();
    }          

    public function getAcercade(){
        $this->db->select('id, titulo, descripcion, cuerpo, id_categoria, postSlug, autor, fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->where('id_categoria','2');
		$resultados = $this->db->get();
		return $resultados->result();
    }   

    public function getDocumentos(){
        $this->db->select('id,nombre,Url,descripcion');
		$this->db->from('cms_documentos');
		$resultados = $this->db->get();
		return $resultados->result();
    }    

    public function getConvocatorias(){
        $this->db->select('id,titulo,descripcion,slugconvo,fechacierre,portada');
		$this->db->from('cms_convocatorias');
		$resultados = $this->db->get();
		return $resultados->result();
    }   

    public function getNoticiasSlug($slug){
        $this->db->select('id,titulo,descripcion,cuerpo,id_categoria,postSlug,autor,fechacrea,portada,statusPost');
		$this->db->from('cms_entradas');
		$this->db->where('statusPost',$slug);
		$resultados = $this->db->get();
		return $resultados->result();
    }     


    public function getConvocatoriaSlug($slug){
         $this->db->select('id,titulo,descripcion,slugconvo,fechacierre,portada');
		$this->db->from('cms_convocatorias');
		$this->db->where('slugconvo',$slug);
		$resultados = $this->db->get();
		return $resultados->result();
    }   

    public function getSlider(){
        $this->db->select('id, nombre, fotografia, Url, descripcion, statusSlider');
		$this->db->from('cms_slider');
		$this->db->where('statusSlider', 1);
		$resultados = $this->db->get();
		return $resultados->result();
    }   
    
    //Paginaci贸n
    public function getTotal($tabla, $where){

    	//echo $this->db->where($where);
    	return $this->db->get_where($tabla, $where)->num_rows();
    }

    public function getRowsTabla($config){
        $resultados = $this->db->get_where($config['tabla'], $config['where'], $config['limit'], $config['start']);
        
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return false;
  		}
    }

     public function getRowsTabla3($config){
    	$tabla = $config['tabla'];
    	$this->db->select("$tabla.*");
    	$this->db->from($tabla);
    	//$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		//$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		//$this->db->join("usuarios", "usuarios.id=$tabla.usuario_id", "left");
		//$this->db->join("persona", "persona.id=usuarios.persona_id", "left");
		//$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where($config['where']);
		$this->db->limit($config['limit'], $config['start']);
		$resultados = $this->db->get();
        
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return false;
  		}
    }
    
    

    //Convocatoria
    public function getConvocatoria($slug){
    	$this->db->where("slugconvo", $slug);
    	$resultado = $this->db->get("cms_convocatorias");
    	return $resultado->row();
    }

    public function getConvocatoriasVigentes($limit){
    	$this->db->where("statusPost", 'A');
    	$this->db->limit($limit);
    	$this->db->order_by("fechacierre", "DESC");
    	$resultados = $this->db->get("cms_convocatorias");
    	return $resultados->result();
    }

    //Noticias
     public function getNoticia($slug){
    	$this->db->where("postSlug", $slug);
    	$this->db->where("statusPost", 'A');
    	$resultado = $this->db->get("cms_entradas");
    	return $resultado->row();
    }

    public function getNoticiasVigentes($limit){
    	$this->db->where("statusPost", 'A');
    	$this->db->where("id_categoria", 1);
    	$this->db->limit($limit);
    	$this->db->order_by("fechacrea", "DESC");
    	$resultados = $this->db->get("cms_entradas");
    	return $resultados->result();
    }
    
    
    public function getBienesRegistrados(){
        
        $this->db->select('count(*) as bienes_registrados');
		$this->db->from('caracterizacion_empresa_bien_servicio ce');
		$this->db->join("empresa e", "e.id=ce.empresa_id AND e.estado=1");
		$resultados = $this->db->get();
		return $resultados->result();
		
	}

	public function getNumEmprendimientos(){
		$this->db->select("count(*) as emprendimientos");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
	$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getNumEvaluados(){
		$this->db->select("count(*) as evaluados");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
		$this->db->where("verificacion2", 1);
	$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getNumNoEvaluados(){
		$this->db->select("count(*) as no_evaluados");
		$this->db->from("empresa");
		$this->db->where("estado", 1);
		$this->db->where("verificacion2<>", 1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	
	public function getNegociosEvaluados(){
		$this->db->select(" e.razon_social_id, e.url_web,  e.razon_social, de.descripcion_negocio, url");
		$this->db->from("empresa e, descripcion_empresa de");
		$this->db->join("archivo", "archivo.id = e.archivo_id", "left");
		$this->db->where("e.estado = 1 AND e.verificacion2 = 1 AND de.empresa_id =e.id");
		$this->db->limit(3);  // Produces: LIMIT 10

		//$this->db->where("verificacion2<>", 1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
		public function getAllNegociosEvaluados(){
		$this->db->select(" e.razon_social_id, e.razon_social, de.descripcion_negocio");
		$this->db->from("empresa e, descripcion_empresa de");
		$this->db->where("e.estado = 1 AND e.verificacion2 = 1 AND de.empresa_id =e.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	  public function getStreaming(){
        $this->db->select("streaming as embebed, estado");
		$this->db->from("cms_contacto");
		$this->db->where("estado = 'A'");
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
     public function getContacto(){
        $this->db->select("c.*, a.url as imagen");
        $this->db->from("cms_contacto c");
        $this->db->join("archivo a ", "c.imagen_id = a.id", "left");
		$this->db->where("c.id = '1'");
		$resultados = $this->db->get();
		return $resultados->first_row();
    }  
    
    
    public function insertarTb($tb, $datos){
		return $this->db->insert($tb, $datos);
	}
    
     
    
    

    public function getNegociosEvaluados2($data){
    	//$this->db->select("e.id, e.razon_social, e.razon_social_id, CONCAT(p.nombre1,' ',p.apellido1) as representante_legal, c.nombre as bien_principal, d.descripcion_negocio");
    	$this->db->select("e.id, e.url_web,  e.razon_social, e.razon_social_id, CONCAT(p.nombre1,' ',p.apellido1) as representante_legal, c.nombre as bien_principal, a.url, d.descripcion_negocio");
    	$this->db->from("empresa e");
    	$this->db->join("caracterizacion_empresa_bien_servicio c", "c.empresa_id=e.id AND c.lider_estado=1","LEFT");
    	$this->db->join("persona p", "e.representante_legal_id=p.id","LEFT");
    	$this->db->join("descripcion_empresa d", "d.empresa_id=e.id","LEFT");
    	$this->db->join("archivo a", "e.archivo_id=a.id","LEFT");
    	$this->db->limit($data['limit'], $data['start']);
    	$this->db->where("e.verificacion2", 1);
    	$this->db->group_by("e.id");
    	$resultados = $this->db->get();
    	return $resultados->result();
    }

   
   //Funciones añadidadas
   public function getRowsTabla2($config){
    	$tabla = $config['tabla'];
    	$this->db->select("$tabla.*, archivo.url as portada, archivo.nombre as imagen, cms_documento.url as url_documento, cms_documento.nombre as documento, CONCAT(persona.nombres, ' ', persona.apellidos) as creador");
    	$this->db->from($tabla);
    	$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		$this->db->join("usuarios", "usuarios.id=$tabla.usuario_id", "left");
		$this->db->join("persona", "persona.id=usuarios.persona_id", "left");
		$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where($config['where']);
		$this->db->limit($config['limit'], $config['start']);
		$resultados = $this->db->get();
        
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return false;
  		}
    }

    public function getPublicacion($config){
    	$tabla = $config['tabla'];
    	$this->db->select("$tabla.*, archivo.url as portada, archivo.nombre as imagen, cms_documento.url as url_documento, cms_documento.nombre as documento, CONCAT(persona.nombre1, ' ', persona.nombre2) as creador");
    	$this->db->from($tabla);
    	$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		$this->db->join("usuarios", "usuarios.id=$tabla.usuario_id", "left");
		$this->db->join("persona", "persona.id=usuarios.persona_id", "left");
		$this->db->where($config['where']);
		$resultados = $this->db->get();
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->row();
        }else{
        	return false;
  		}
    }


    public function getPublicacionesRecientes($config){
    	$tabla = $config['tabla'];
    	$this->db->select("$tabla.*, archivo.url as portada, archivo.nombre as imagen, cms_documento.url as url_documento, cms_documento.nombre as documento");
    	$this->db->from($tabla);
    	$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where($config['where']);
		$this->db->limit(3);
		$resultados = $this->db->get();
        
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return array();
  		}
    }
    
    public function getSlider2(){
        $this->db->select('id, nombre, url_imagen, url, descripcion');
		$this->db->from('cms_slider');
		$this->db->where('estado', 1);
		$resultados = $this->db->get();
		return $resultados->result();
    }
    
    public function getPublicacionReciente(){
    	$tabla = 'cms_publicacion';
    	$limit = 5;
    	$where = array('cms_tipo_publicacion_id'=>'<3');
    	$this->db->select("$tabla.*, archivo.url as portada, archivo.nombre as imagen, cms_documento.url as url_documento, cms_documento.nombre as documento, (CASE WHEN $tabla.cms_tipo_publicacion_id = 1 THEN 'convocatorias/leer/' WHEN $tabla.cms_tipo_publicacion_id = 2 THEN 'eventos/leer/' ELSE 'noticias/leer/' END) as base");
    	$this->db->from($tabla);
    	$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where("cms_publicacion.cms_tipo_publicacion_id",4);
		$this->db->where("cms_publicacion.estado", 1);
		$this->db->limit($limit);
		$resultados = $this->db->get();
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return array();
  		}
    }
    
    public function getServicioSRecientes(){
    	$this->db->limit(3);
    	$resultados = $this->db->get("servicio");
    	return $resultados->result();
    }
    
    public function getProductoSRecientes(){
    	$this->db->limit(3);
    	$resultados = $this->db->get("producto");
    	return $resultados->result();
    }

    public function getPublicacionRecienteLimite($limit){
    	$tabla = 'cms_publicacion';
    	$where = array('cms_tipo_publicacion_id'=>'<3');
    	$this->db->select("$tabla.*, archivo.url as portada, archivo.nombre as imagen, cms_documento.url as url_documento, cms_documento.nombre as documento, (CASE WHEN $tabla.cms_tipo_publicacion_id = 1 THEN 'convocatorias/leer/' WHEN $tabla.cms_tipo_publicacion_id = 2 THEN 'eventos/leer/' ELSE 'noticias/leer/' END) as base");
    	$this->db->from($tabla);
    	$this->db->join("archivo", "archivo.id=$tabla.imagen_id", "left");
		$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where("cms_publicacion.cms_tipo_publicacion_id",4);
		$this->db->where("cms_publicacion.estado", 1);
		$this->db->limit($limit);
		$resultados = $this->db->get();
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return array();
  		}
    }
    
    /* Modificaciones */
    public function getNumObras($slug){
    	$this->db->select("o.*");
    	$this->db->from("obras o");
    	$this->db->join("tipo_obra t","o.tipo_obra_id=t.id");
    	$this->db->where("t.controlador",$slug);
    	$this->db->where("estado",1);
    	$resultados = $this->db->get();
    	return $resultados->num_rows();
    }

    public function getObraSlug($slug){
        $this->db->select('obras.*, tipo_obra.nombre as tipo_obra, tipo_obra.controlador');
        $this->db->from("obras");
        $this->db->join("tipo_obra","tipo_obra.id=obras.tipo_obra_id");
		$this->db->where('slug',$slug);
		$resultados = $this->db->get();
		return $resultados->row();
    }

    public function getObraRecurso($obra_id, $tipo_recurso_id){
        
		$this->db->where('obra_id',$obra_id);
		$this->db->where('tipo_recurso_id',$tipo_recurso_id);
		$resultados = $this->db->get("obra_recurso");
		return $resultados->result();
    }
    
    public function getObraRecursoRow($obra_id, $tipo_recurso_id){
		$this->db->where('obra_id',$obra_id);
		$this->db->where('tipo_recurso_id',$tipo_recurso_id);
		$this->db->where('url_recurso<>',"");
		$resultados = $this->db->get("obra_recurso");
		return $resultados->row();
    }
    

    public function getObrasRecientes($slug){
    	$this->db->select("o.*");
    	$this->db->from("obras o");
    	/*$this->db->join("tipo_obra t","t.id=o.tipo_obra_id");
    	$this->db->join("t.controlador",$slug);*/
		$this->db->limit(3);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) 
        {
            $i = 0;
            $datos = array();
            foreach($resultados->result() as $data){
                //echo $data->id." -- ".$data->nombre;
                $datos[$i] = new stdClass;
                $datos[$i]->id = $data->id;
                $datos[$i]->nombre = $data->nombre; 
                $datos[$i]->fecha_modificacion = $data->fecha_modificacion;
                $datos[$i]->slug = $data->slug;
                $resultado = $this->getObraRecursoRow($data->id, 1);
                $datos[$i]->url_imagen = (!empty($resultado))?$resultado->url_recurso:'';
                $i++;
            }            
            return $datos;
            //return $resultados->result();
        }else{
        	return false;
  		}
		//return $resultados->result();
    }


    public function getObras($config){
    	$tabla = $config['tabla'];
    	//$this->db->select("$tabla.*, obra_recurso.url_recurso as url_imagen");
    	$this->db->select("$tabla.*");
    	$this->db->from($tabla);
    	//$this->db->join("obra_recurso", "obra_recurso.obra_id=$tabla.id AND obra_recurso.tipo_recurso_id = 1", "left");
    	$this->db->join("tipo_obra","tipo_obra.id=$tabla.tipo_obra_id");
		//$this->db->join("cms_documento", "cms_documento.id=$tabla.cms_documento_id", "left");
		//$this->db->join("usuarios", "usuarios.id=$tabla.usuario_id", "left");
		//$this->db->join("persona", "persona.id=usuarios.persona_id", "left");
		//$this->db->order_by("cms_publicacion.fecha_apertura", "DESC");
		$this->db->where($config['where']);
		$this->db->limit($config['limit'], $config['start']);
		$this->db->group_by("$tabla.id");
		$resultados = $this->db->get();
        
        if ($resultados->num_rows() > 0) 
        {
            $i = 0;
            $datos = array();
            foreach($resultados->result() as $data){
                //echo $data->id." -- ".$data->nombre;
                $datos[$i] = new stdClass;
                $datos[$i]->id = $data->id;
                $datos[$i]->nombre = $data->nombre; 
                $datos[$i]->sinopsi = $data->sinopsi; 
                $datos[$i]->musicalizacion = $data->musicalizacion;
                $datos[$i]->tipo_obra_id = $data->tipo_obra_id;
                $datos[$i]->slug = $data->slug;
                $resultado = $this->getObraRecursoRow($data->id, 1);
                $datos[$i]->url_imagen = (!empty($resultado))?$resultado->url_recurso:'';
                $i++;
            }            
            return $datos;
            //return $resultados->result();
        }else{
        	return false;
  		}
    }
    
    /* Fin modificaciones */
    
    /* Testimonios */

    public function getNumTestimonios(){
    	$this->db->where("estado",1);
    	$resultados = $this->db->get("testimonio");
    	return $resultados->num_rows();
    }

    public function getTestimonios($config){
    	$tabla = $config['tabla'];
    	$this->db->select("$tabla.*, CONCAT(persona.nombres, '', persona.apellidos) as nombre_completo, FLOOR(TIMESTAMPDIFF(DAY , persona.fecha_nacimiento, CURDATE() ) /365 ) AS edad, IFNULL(archivo.url,'') as url_imagen");
    	$this->db->from($tabla);
    	$this->db->join("persona", "persona.id=$tabla.persona_id");
    	$this->db->join("usuarios","usuarios.persona_id=persona.id");
    	$this->db->join("archivo","archivo.id=usuarios.archivo_id","LEFT");
		$this->db->where($config['where']);
		$this->db->limit($config['limit'], $config['start']);
		//$this->db->group_by("$tabla.id");
		$resultados = $this->db->get();
        
        if ($resultados->num_rows() > 0) 
        {
            return $resultados->result();
        }else{
        	return false;
  		}
    }


    public function getTestimonioSlug($slug){
    	$this->db->select("testimonio.*, CONCAT(persona.nombres, '', persona.apellidos) as nombre_completo, FLOOR(TIMESTAMPDIFF(DAY , persona.fecha_nacimiento, CURDATE() ) /365 ) AS edad, IFNULL(archivo.url,'') as url_imagen");
    	$this->db->from('testimonio');
    	$this->db->join("persona", "persona.id=testimonio.persona_id");
    	$this->db->join("usuarios","usuarios.persona_id=persona.id");
    	$this->db->join("archivo","archivo.id=usuarios.archivo_id","LEFT");
		$this->db->where('testimonio.slug',$slug);
		$resultado = $this->db->get();
        return $resultado->row();
    }

    public function getTestimonioSRecientes(){
    	$this->db->select("testimonio.*, CONCAT(persona.nombres, '', persona.apellidos) as nombre_completo, FLOOR(TIMESTAMPDIFF(DAY , persona.fecha_nacimiento, CURDATE() ) /365 ) AS edad, IFNULL(archivo.url,'') as url_imagen");
    	$this->db->from('testimonio');
    	$this->db->join("persona", "persona.id=testimonio.persona_id");
    	$this->db->join("usuarios","usuarios.persona_id=persona.id");
    	$this->db->join("archivo","archivo.id=usuarios.archivo_id","LEFT");
		$resultados = $this->db->get();
        return $resultados->result();
    }


    /* FIn modificaciones*/
    
    

}