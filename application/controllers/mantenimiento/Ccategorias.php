<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccategorias extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mcategorias");
	}

	public function index()
	{	
		$data = array(
			'categorias' =>$this->Mcategorias->getCategorias()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/list',$data);
		$this->load->view('layouts/footer');

	}
}