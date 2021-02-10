<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'sitio';

$route['catalogo-servicios'] = 'ca';

$route['negocioVerde'] = 'emprendimiento/negocioVerde';

$route['negocio-verde-municipio/(:num)'] = 'emprendimiento/negocioVerde/negociosVerdesMunicipio/$1';

$route['cifras'] = 'sitio/cifras';

$route['negocioVerde/ver/(:num)'] = 'emprendimiento/negocioVerde/ver/$1';

$route['negocioVerde/guardar/web'] = 'emprendimiento/negocioVerde/gurlweb';

$route['negocio-verificacion/(:num)'] = 'sitio/verificacion/$1';





$route['estadoEmprendimiento/(:num)'] = 'emprendimiento/negocioVerde/estado/$1';

$route['negocioVerde/agregar'] = 'emprendimiento/negocioVerde/agregar';

$route['negocioVerde/unique'] = 'emprendimiento/negocioVerde/unique';

$route['negocioVerde/obtenerRepresentante'] = 'emprendimiento/negocioVerde/obtenerRepresentante';

$route['negocioVerde/obtenerRazonSocial'] = 'emprendimiento/negocioVerde/obtenerRazonSocial';

$route['negocioVerde/cargarCombo'] = 'emprendimiento/negocioVerde/cargarCombo';

$route['negocioVerde/almacenarInformacionGeneral'] = 'emprendimiento/negocioVerde/almacenarInformacionGeneral';

$route['negocioVerde/descripcionNegocio'] = 'emprendimiento/negocioVerde/descripcionNegocio';

$route['negocioVerde/categoriaNegocio'] = 'emprendimiento/negocioVerde/categoriaNegocio';

$route['negocioVerde/informacionEmpresa'] = 'emprendimiento/negocioVerde/informacionEmpresa';

$route['negocioVerde/informacionVerificacion'] = 'emprendimiento/negocioVerde/informacionVerificacion';

$route['negocioVerde/observacionGeneral'] = 'emprendimiento/negocioVerde/observacionGeneral';

$route['consolidado/(:num)'] = 'emprendimiento/negocioVerde/consolidado/$1';


$route['convocatorias/(:any)'] = 'convocatorias/convocatorias/$1';

$route['convocatorias'] = 'convocatorias/convocatorias';



$route['eventos/(:any)'] = 'eventos/eventos/$1';

$route['eventos'] = 'eventos/eventos';



$route['noticias/(:any)'] = 'noticias/noticias/$1';

$route['noticias'] = 'noticias/noticias';



$route['negocios-evaluados/(:num)'] = 'sitio/negociosEvaluados/$1';

$route['negocios-evaluados'] = 'sitio/negociosEvaluados';

$route['registro/agregar'] = 'registro/agregar';

$route['registro/unique'] = 'registro/unique';

$route['registro/cargarCombo'] = 'registro/cargarCombo';

$route['registro/almacenarInformacionGeneral'] = 'registro/almacenarInformacionGeneral';

$route['registro/descripcionNegocio'] = 'registro/descripcionNegocio';

$route['registro/categoriaNegocio'] = 'registro/categoriaNegocio';

$route['registro/informacionEmpresa'] = 'registro/informacionEmpresa';

$route['registro/observacionGeneral'] = 'registro/observacionGeneral';

$route['inspira/referentes/(:num)'] = 'persona/referentes/$1';
$route['inspira/referentes'] = 'persona/referentes';
$route['referente/perfil/(:num)'] = 'persona/perfil/$1';


$route['referente'] = 'basicos/referente';

$route['referente/agregar'] = 'basicos/referente/agregar';

$route['referente/almacenar'] = 'basicos/referente/almacenar';
$route['referente/eliminar/(:num)'] = 'basicos/referente/eliminar/$1';

$route['perfil'] = 'basicos/referente/perfil';

$route['referente/actualizarPerfil'] = 'basicos/referente/actualizarPerfil';

$route['referente/agregarHabilidad'] = 'basicos/referente/agregarHabilidad';

$route['referente/actualizarCredencial'] = 'basicos/referente/actualizarCredencial';

$route['referente/actualizarPerfilUsuario'] = 'basicos/referente/actualizarPerfil';

$route['referente/reestablecerCredencial'] = 'basicos/referente/reestablecerCredencial';

//$route['referente/perfil'] = 'basicos/referente/perfil';

$route['referente/(:num)'] = 'basicos/referente/editar/$1';

$route['referente/estado/(:num)'] = 'basicos/referente/estado/$1';



$route['negociose/(:any)'] = 'negociose/negociose/$1';





$route['formatoAS/(:num)'] = 'emprendimiento/formatoAS/editar/$1';



$route['modulo'] = 'administracion/modulo';

$route['modulo/(:num)'] = 'administracion/modulo/editar/$1';

$route['modulo/agregar'] = 'administracion/modulo/agregar';

$route['modulo/almacenar'] = 'administracion/modulo/almacenar';

$route['modulo/actualizar'] = 'administracion/modulo/actualizar';

$route['modulo/estado/(:num)'] = 'administracion/modulo/estado/$1';

$route['modulo/eliminar/(:num)'] = 'administracion/modulo/eliminar/$1';

$route['modulo/cargarCombo'] = 'administracion/modulo/cargarCombo';



$route['rol'] = 'administracion/rol';

$route['rol/agregar'] = 'administracion/rol/agregar';

$route['rol/actualizar'] = 'administracion/rol/actualizar';

$route['rol/almacenar'] = 'administracion/rol/almacenar';

$route['rol/(:num)'] = 'administracion/rol/editar/$1';

$route['rol/eliminar/(:num)'] = 'administracion/rol/eliminar/$1';

$route['rol/estado/(:num)'] = 'administracion/rol/estado/$1';





$route['perfiles'] = 'basicos/tipoPerfil';

$route['perfiles/agregar'] = 'basicos/tipoPerfil/agregar';

$route['perfiles/actualizar'] = 'basicos/tipoPerfil/actualizar';

$route['perfiles/almacenar'] = 'basicos/tipoPerfil/almacenar';

$route['perfiles/eliminar/(:num)'] = 'basicos/tipoPerfil/eliminar/$1';

$route['perfiles/(:num)'] = 'basicos/tipoPerfil/editar/$1';

$route['perfiles/estado/(:num)'] = 'basicos/tipoPerfil/estado/$1';








$route['verificador/(:num)'] = 'verificador/editar/$1';

$route['area'] = 'administracion/area';

$route['area/agregar'] = 'administracion/area/agregar';

$route['area/actualizar'] = 'administracion/area/actualizar';

$route['area/editar/(:num)'] = 'administracion/area/editar/$1';

$route['area/almacenar'] = 'administracion/area/almacenar';  

$route['area/estado/(:num)'] = 'administracion/area/estado/$1';

$route['area/eliminar/(:num)'] = 'administracion/area/eliminar/$1';



$route['entidad'] = 'administracion/entidad';

$route['entidad/agregar'] = 'administracion/entidad/agregar';

$route['entidad/actualizar'] = 'administracion/entidad/actualizar';

$route['entidad/editar/(:num)'] = 'administracion/entidad/editar/$1';

$route['entidad/almacenar'] = 'administracion/entidad/almacenar';  

$route['entidad/estado/(:num)'] = 'administracion/entidad/estado/$1';

$route['entidad/eliminar/(:num)'] = 'administracion/entidad/eliminar/$1';



$route['cargo'] = 'administracion/cargo';

$route['cargo/agregar'] = 'administracion/cargo/agregar';

$route['cargo/almacenar'] = 'administracion/cargo/almacenar';

$route['cargo/editar/(:num)'] = 'administracion/cargo/editar/$1';

$route['cargo/actualizar'] = 'administracion/cargo/actualizar';  

$route['cargo/eliminar/(:num)'] = 'administracion/cargo/eliminar/$1';

$route['cargo/estado/(:num)'] = 'administracion/cargo/estado/$1';



//dashboard 

$route['dashboard'] = "Dashboard";

$route['dashboard/municipio'] = "Dashboard/empresaPorMunicipio";



$route['usuario'] = 'administracion/usuario';

$route['usuario/agregar'] = 'administracion/usuario/agregar';

$route['usuario/almacenar'] = 'administracion/usuario/almacenar';

$route['usuario/actualizarPerfil'] = 'administracion/usuario/actualizarPerfil';

$route['usuario/actualizarCredencial'] = 'administracion/usuario/actualizarCredencial';

$route['usuario/actualizarPerfilUsuario'] = 'administracion/usuario/actualizarPerfilUsuario';

$route['usuario/reestablecerCredencial'] = 'administracion/usuario/reestablecerCredencial';

//$route['usuario/perfil'] = 'administracion/usuario/perfil';

$route['usuario/(:num)'] = 'administracion/usuario/editar/$1';

$route['usuario/estado/(:num)'] = 'administracion/usuario/estado/$1';



$route['permiso'] = 'administracion/permiso';

$route['cargarModulo'] = 'administracion/permiso/cargarModulo';

$route['permiso/(:num)'] = 'administracion/permiso/editar/$1';

$route['permiso/almacenar'] = 'administracion/permiso/almacenar';


//nuevos
$route['apadrinamiento/referente/(:any)'] = 'apadrinamiento/referente/$1';
$route['apadrinamiento/como-funciona'] = 'apadrinamiento/funcionamiento';
$route["apadrinamiento/guardar"] = "apadrinamiento/guradarSolicitud";
$route["apadrinamiento"] = "apadrinamiento";
$route["apadrinamiento/recibir-solicitud"] = "apadrinamiento/guardarSolicitud";
$route["apadrinamiento/gracias"] = "apadrinamiento/gracias";

$route["apadrinamiento/solicitudes"] = "basicos/apadrinamiento/solicitudes";


$route["apadrinamiento/historia"] = "basicos/apadrinamiento";
$route["apadrinamiento/historia/nueva"]  = "basicos/apadrinamiento/nuevaHistoria";

$route["apadrinamiento/historia/guardar/(:num)"]  = "basicos/apadrinamiento/guardarHistoria/$1";

$route["apadrinamiento/historia/(:num)/editar"]  = "basicos/apadrinamiento/verHistoria/$1";

$route["apadrinamiento/solicitud/(:num)/ver"] = "basicos/apadrinamiento/verSolicitud/$1";



$route['contenido/(:any)'] = "contenido/index/$1";

$route["informacion"] = "cms/Informacion/seleccionar";

$route["informacion/actualizar"] = "cms/Informacion/actualizar";

$route['cms_publicaciones'] = 'cms/publicacion';

$route['cms_publicacion/agregar'] = 'cms/publicacion/agregar';

$route['cms_publicacion/almacenar'] = 'cms/publicacion/almacenar';

$route['cms_publicacion/actualizar'] = 'cms/publicacion/actualizar';

$route['cms_publicacion/(:num)'] = 'cms/publicacion/editar/$1';

$route['cms_publicacion/eliminar/(:num)'] = 'cms/publicacion/eliminar/$1';

$route['cms_publicacion/estado/(:num)'] = 'cms/publicacion/estado/$1';





$route['cms_sliders'] = 'cms/slider';

$route['cms_slider/agregar'] = 'cms/slider/agregar';

$route['cms_slider/almacenar'] = 'cms/slider/almacenar';

$route['cms_slider/actualizar'] = 'cms/slider/actualizar';

$route['cms_slider/(:num)'] = 'cms/slider/editar/$1';

$route['cms_slider/eliminar/(:num)'] = 'cms/slider/eliminar/$1';

$route['cms_slider/estado/(:num)'] = 'cms/slider/estado/$1';



$route['cms_galerias'] = 'cms/galeriaCms';

$route['cms_galeria/agregar'] = 'cms/galeriaCms/agregar';

$route['cms_galeria/almacenar'] = 'cms/galeriaCms/almacenar';

$route['cms_galeria/actualizar'] = 'cms/galeriaCms/actualizar';

$route['cms_galeria/(:num)'] = 'cms/galeriaCms/editar/$1';

$route['cms_galeria/estado/(:num)'] = 'cms/galeriaCms/estado/$1';



$route['cms_fondos'] = 'cms/fondoInversion';

$route['cms_fondo/agregar'] = 'cms/fondoInversion/agregar';

$route['cms_fondo/almacenar'] = 'cms/fondoInversion/almacenar';

$route['cms_fondo/actualizar'] = 'cms/fondoInversion/actualizar';

$route['cms_fondo/(:num)'] = 'cms/fondoInversion/editar/$1';

$route['cms_fondo/estado/(:num)'] = 'cms/fondoInversion/estado/$1';



$route['cms_patrocinadores'] = 'cms/patrocinador';

$route['cms_patrocinador/agregar'] = 'cms/patrocinador/agregar';

$route['cms_patrocinador/almacenar'] = 'cms/patrocinador/almacenar';

$route['cms_patrocinador/actualizar'] = 'cms/patrocinador/actualizar';

$route['cms_patrocinador/(:num)'] = 'cms/patrocinador/editar/$1';

$route['cms_patrocinador/estado/(:num)'] = 'cms/patrocinador/estado/$1';

$route['cms_menu'] = 'cms/menu';
$route['cms_menu/agregar'] = 'cms/menu/agregar';
$route['cms_menu/almacenar'] = 'cms/menu/almacenar';
$route['cms_menu/actualizar'] = 'cms/menu/actualizar';
$route['cms_menu/(:num)'] = 'cms/menu/editar/$1';
$route['cms_menu/estado/(:num)'] = 'cms/menu/estado/$1';
$route['cms_menu/getNumRows'] = 'cms/menu/getNumRows';
$route['cms_menu/cargarCombo'] = 'cms/menu/cargarCombo';

//nuevas rutas
$route['referente'] = 'basicos/referente';
$route['referente/agregar'] = 'basicos/referente/agregar';
$route['referente/almacenar'] = 'basicos/referente/almacenar';
$route['inspira/referentes/(:num)'] = 'persona/referentes/$1';
$route['inspira/referentes'] = 'persona/referentes';
$route['referente/perfil/(:num)'] = 'persona/perfil/$1';
$route['perfil'] = 'basicos/referente/perfil';


$route['testimonio'] = 'basicos/testimonio';

$route['testimonio/agregar'] = 'basicos/testimonio/agregar';

$route['testimonio/almacenar'] = 'basicos/testimonio/almacenar';

$route['testimonio/actualizar'] = 'basicos/testimonio/actualizar';

$route['testimonio/(:num)'] = 'basicos/testimonio/editar/$1';

$route['testimonio/eliminar/(:num)'] = 'basicos/testimonio/eliminar/$1';

$route['testimonio/estado/(:num)'] = 'basicos/testimonio/estado/$1';
$route['testimonios/(:any)'] = 'testimonios';


$route['producto'] = 'basicos/producto';

$route['producto/agregar'] = 'basicos/producto/agregar';

$route['producto/almacenar'] = 'basicos/producto/almacenar';

$route['producto/actualizar'] = 'basicos/producto/actualizar';

$route['producto/(:num)'] = 'basicos/producto/editar/$1';

$route['producto/eliminar/(:num)'] = 'basicos/producto/eliminar/$1';

$route['producto/estado/(:num)'] = 'basicos/producto/estado/$1';

$route['productos/(:any)'] = 'productos';
$route['contenido/(:any)/productos'] = 'productos/contenido/$1';
$route['productos/contenidos/(:any)'] = 'productos/contenido/$1';




$route['servicio'] = 'basicos/servicio';

$route['servicio/agregar'] = 'basicos/servicio/agregar';

$route['servicio/almacenar'] = 'basicos/servicio/almacenar';

$route['servicio/actualizar'] = 'basicos/servicio/actualizar';

$route['servicio/(:num)'] = 'basicos/servicio/editar/$1';

$route['servicio/eliminar/(:num)'] = 'basicos/servicio/eliminar/$1';

$route['servicio/estado/(:num)'] = 'basicos/servicio/estado/$1';

$route['servicios/(:any)'] = 'servicios';
$route['contenido/(:any)/servicios'] = 'servicios/contenido/$1';
$route['servicios/contenidos/(:any)'] = 'servicios/contenido/$1';



$route['agenda'] = 'basicos/agenda';

$route['agenda/agregar'] = 'basicos/agenda/agregar';

$route['agenda/almacenar'] = 'basicos/agenda/almacenar';

$route['agenda/actualizar'] = 'basicos/agenda/actualizar';

$route['agenda/(:num)'] = 'basicos/agenda/editar/$1';

$route['agenda/eliminar/(:num)'] = 'basicos/agenda/eliminar/$1';

$route['agenda/estado/(:num)'] = 'basicos/agenda/estado/$1';

$route['obra'] = 'basicos/obra';
$route['obra/agregar'] = 'basicos/obra/agregar';
$route['obra/almacenar'] = 'basicos/obra/almacenar';
$route['obra/actualizar'] = 'basicos/obra/actualizar';
$route['obra/(:num)'] = 'basicos/obra/editar/$1';
$route['obra/eliminar/(:num)'] = 'basicos/obra/eliminar/$1';
$route['obra/estado/(:num)'] = 'basicos/obra/estado/$1';


$route['donacion'] = 'basicos/donacion';

$route['donacion/(:num)'] = 'basicos/donacion/editar/$1';
$route['solicitudDonacion/cargarCombo'] = 'solicitudDonacion/cargarCombo';
$route['solicitudDonacion/almacenar'] = 'solicitudDonacion/almacenar';

//nuevas
$route['organigrama'] = "contenido/organigrama";
$route['corporacion/(:any)'] = "contenido/index/$1";

$route['404_override'] = 'nofound/';

$route['translate_uri_dashes'] = FALSE;

