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

	/* redirige al formulario para agregar*/
	public function addCli(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/agregar');
		$this->load->view('layouts/footer');


	}


	/*Inserta new Clientes*/
	public function insertar(){

		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$ruc = $this->input->post('ruc');
		$empresa = $this->input->post('empresa');


		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'ruc' => $ruc,
			'empresa' => $empresa,
			'estado' => '1'
		);

		if($this->Mclientes->createClientes($data)){

			redirect(base_url()."mantenimiento/Cclientes") ;

		}else{

			$this->session->set_flashdata("error","No se pudo guardar el cliente");
			redirect(base_url()."mantenimiento/Ccliente/addCli");

		}
	}


	/*pasa los datos a traves del metodo Ajax desde la vista y los devuelve a estos*/
	public function view($id){

		/*trae el reg. del modelo*/
		$data = array(
			'clientes' => $this->Mclientes->getId($id)
		);

		/*envia la data a la vista*/
		$this->load->view("admin/clientes/view",$data);
	}



	public function preUpdate($id){

		
		$data = array(
			'cliente' => $this->Mclientes->getId($id)
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/editar', $data);
		$this->load->view('layouts/footer');


	}

	public function update(){

		$id = $this->input->post('id');

		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$ruc = $this->input->post('ruc');
		$empresa = $this->input->post('empresa');

		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'ruc' => $ruc,
			'empresa' => $empresa,
			'estado' => '1'
		);

		if($this->Mclientes->updateClientes($id,$data)){

			redirect(base_url()."mantenimiento/Cclientes") ;

		}else{

			$this->session->set_flashdata("error","No se pudo editar el cliente");
			redirect(base_url()."mantenimiento/Ccliente/preUpdate").$id;

		}


	}

	public function delete($id){

		$data = array(
			'estado' => '0'
		);

		
		if($this->Mclientes->updateClientes($id,$data)){

			/*le paso la ruta como respuesta al ajax*/
			echo "mantenimiento/Cclientes";

		}else{

			$this->session->set_flashdata("error","No se pudo eliminar el cliente");
			redirect(base_url()."mantenimiento/Ccliente/preUpdate").$id;

		}


	}

}
