<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cventas extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mventas");
		$this->load->model("Mclientes");
	}


	/*Carga lo lista*/
	public function index()
	{	
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/list');
		$this->load->view('layouts/footer');

	}

	//agrega los clientes para la venta
	public function addVent(){

		$data = [
			'comprobantes' => $this->Mventas->getComprobantes(),
			'clientes' => $this->Mclientes->getClientes(),

		];

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/agregar',$data);
		$this->load->view('layouts/footer');

	}

	// busca los productos para la ventas
	public function getProductos(){

		$valorAjax = $this->input->post("valor");
		$clientes = $this->Mventas->getProductos($valorAjax);

		echo json_encode($clientes);
	}

}