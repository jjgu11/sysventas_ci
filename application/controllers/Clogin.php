<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mlogin');
	}
	

	public function index()
	{	

		# si existe la variable de session ? redirecciona
		if ($this->session->userdata('login')) {

			redirect(base_url().'Cdashboard');

		} else {
			
			$this->load->view('admin/login');
		}	

	}


	public function login(){

		$user = $this->input->post('user');
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
		}

	}/*--- Fin login ---*/




	public function logout(){

		# elimina la session y redirige a la vista login
		$this->session->sess_destroy();
		redirect(base_url());
	}





}
