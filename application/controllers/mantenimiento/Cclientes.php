<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cclientes extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mclientes");
	}


	/*Carga lo lista de los clientes*/
	public function index()
	{	
		$data = array(
			'cliente' =>$this->Mclientes->getClientes()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/list',$data);
		$this->load->view('layouts/footer');

	}

}
