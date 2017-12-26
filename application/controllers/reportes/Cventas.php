<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cventas extends CI_Controller {

	public function __construct(){

		parent::__construct();

		# si no existe la variable de session ? redirecciona al login
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 


	}


	/*Carga lo lista*/
	public function index()
	{	

	
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/reportes/ventas');
		$this->load->view('layouts/footer');

	}


	}