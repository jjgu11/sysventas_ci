<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproductos extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mproductos");
	}


	/*Carga lo lista de los productos*/
	public function index()
	{	
		$data = array(
			'productos' =>$this->Mproductos->getProductos()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/list',$data);
		$this->load->view('layouts/footer');

	}
}