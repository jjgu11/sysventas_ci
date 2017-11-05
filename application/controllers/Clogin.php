<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mlogin');

	}
	

	public function index()
	{	
		/*pasamos la libreria  05/11/17 */
		$this->load->library('Recaptcha');

		# si existe la variable de session ? redirecciona
		if ($this->session->userdata('login')) {

			redirect(base_url().'Cdashboard');

		} else {
			
			/*pasamos la libreria  05/11/17 */
			$this->load->library('Recaptcha');
			$this->load->view('admin/login');
				
		}	

	}


	public function login(){


		// Load the library
		$this->load->library('recaptcha');

		// Catch the user's answer
		$captcha_answer = $this->input->post('g-recaptcha-response');

		// Verify user's answer
		$response = $this->recaptcha->verifyResponse($captcha_answer);

		// Processing ...
		if ($response['success']) {
		    $this->load->view('validado');
		} else {
		    //redirect('Crecaptcha');
		    // var_dump($response);
		    echo "no se valido el captcha";
		}

		/*$user = $this->input->post('user');
		$password = $this->input->post('password');

		#almacena los resultados traidos del Modelo
		$result = $this->Mlogin->login($user,sha1($password));

		if (!$result) {

			$this->session->set_flashdata("error","El usuario y/o Contraseña son incorrectos");
			
			redirect(base_url());
			//	echo "error al ingrear";

		}else{

			$data = array(
				'id' => $result->id,
				'nombre'=> $result->nombres." - ".$result->apellidos,
				'rol' => $result->rol_id,
				'login' => TRUE 
				);

			$this->session->set_userdata($data);


			//var_dump($result);
			//var_dump($data);
			redirect(base_url().'Cdashboard');
		}*/

	}/*--- Fin login ---*/




	public function logout(){

		# elimina la session y redirige a la vista login
		$this->session->sess_destroy();
		redirect(base_url());
	}





}
