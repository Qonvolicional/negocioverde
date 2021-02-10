<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		 $this->load->model("Cms_model");
	}

	public function index(){
	    $destinatario = "menadeimer@gmail.com";
	    $mensaje = "Felicidades!
	    Te has registrado en nuestro programa de negocios verdes.
	    Próximamente te asignaremos un verificador que se encargará de explicarte claramente lo que son los negocios verdes y te realizará la respectiva aplicación y verificación de criterios para determinar el nivel de avance de tu iniciativa o emprendimiento verde.
	    
	    Somos Ventanilla de Emprendimientos Verdes del Chocó.";
	    
        $config = array(
         'protocol' => 'smtp',
         'smtp_host' => 'mail.ventanilladenegociosverdes.com',
         'smtp_user' => '_mainaccount@ventanilladenegociosverdes.com', //Su Correo
         'smtp_pass' => 'X93@Kyp[0Ap7Ps', // Su Password
         'smtp_port' => '465',
         'smtp_crypto' => 'ssl',
         'mailtype' => 'text',
         'wordwrap' => TRUE,
         'charset' => 'utf-8'
         );
    	$this->load->library('email');
    	$this->load->library('email', $config);
    	 
    	$this->email->from('_mainaccount@ventanilladenegociosverdes.com');
    	$this->email->subject('Registro de emprendimiento verde');
    	$this->email->message($mensaje);
    	 $this->email->to($destinatario);
    	 if($this->email->send(FALSE)){
    	     echo "enviado<br/>";
    	     echo $this->email->print_debugger(array('headers'));
    	 }else {
    	     echo "fallo <br/>";
    	     echo "error: ".$this->email->print_debugger(array('headers'));
    	 }
	}




}
