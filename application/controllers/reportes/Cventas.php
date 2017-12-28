<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cventas extends CI_Controller {

	public function __construct(){

		parent::__construct();

		# si no existe la variable de session ? redirecciona al login
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 

		$this->load->model("Mventas");

	}


	/*Carga lo lista*/
	public function index(){	

		$fechaIni = $this->input->post("fechainicio");
		$fechaFin = $this->input->post("fechafin");

		//filtro si hay busqueda por fechas de ventas
		if($this->input->post("buscar")){

			$ventas = $this->Mventas->getVentasDate($fechaIni,$fechaFin);

		}else{

			// retorna todas las ventas
			$ventas = $this->Mventas->getVentas();
		}

		// creo el array a enviar
		$data = [
			'ventas' => $ventas,
			'fechaIni' => $fechaIni,
			'fechaFin' => $fechaFin
		];
		
		// Paso a la vista 
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/reportes/ventas',$data);
		$this->load->view('layouts/footer');

	}


	}