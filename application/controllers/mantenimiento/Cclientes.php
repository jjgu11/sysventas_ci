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

		$data = [
			"tipoClientes" => $this->Mclientes->getTipoClientes(),
			"tipoDocumentos" => $this->Mclientes->getTipoDocumentos()
		];

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/agregar',$data);
		$this->load->view('layouts/footer');

	}


	/*Inserta new Clientes*/
	public function insertar(){

		$nombres = $this->input->post('nombres');
		$t_cliente = $this->input->post('tipo_cliente');
		$t_documento = $this->input->post('tipo_documento');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$n_documento = $this->input->post('num_documento');

		#reglas de validaciones
		$this->form_validation->set_rules("nombres","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipo_cliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("tipo_documento","Tipo de Documento","required");
		$this->form_validation->set_rules("telefono","Telefono del Cliente","required");
		$this->form_validation->set_rules("direccion","Direccion del Cliente","required");
		$this->form_validation->set_rules("num_documento","Numero de Documento","required|is_unique[clientes.num_doc]");

		#si procede / guarda la informacion
		if ($this->form_validation->run()) {
			
			$data = array(
			'nombres' => $nombres,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'tipo_cli_id' => $t_cliente,
			'tipo_doc_id' => $t_documento,
			'num_doc' => $n_documento,
			'estado' => '1'
			);

			if($this->Mclientes->createClientes($data)){

				$this->session->set_flashdata("bien","Cliente guardado con exito!");
				redirect(base_url()."mantenimiento/Cclientes") ;
			}else{
				$this->session->set_flashdata("error","No se pudo guardar el cliente");
				redirect(base_url()."mantenimiento/Cclientes/addCli");
			}

		#muestra la vista con los mensages de error en los imputs	
		} else {
			
			$this->addCli();	
		}
		
	}


	/*pasa los datos a traves del metodo Ajax desde la vista y los devuelve a estos*/
	public function view($id){
		/*trae el reg. del modelo*/
		$data = array(
			'clientes' => $this->Mclientes->getId($id),
		);
		/*envia la data a la vista*/
		$this->load->view("admin/clientes/view",$data);
	}




	/*pasa los datos al formulario a editar*/
	public function preUpdate($id){

		
		$data = array(
			'cliente' => $this->Mclientes->getId($id),
			"tipoClientes" => $this->Mclientes->getTipoClientes(),
			"tipoDocumentos" => $this->Mclientes->getTipoDocumentos()
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/editar', $data);
		$this->load->view('layouts/footer');


	}

	
	/*edita los registros */
	public function update(){

		$id = $this->input->post('id');

		$nombres = $this->input->post('nombres');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$t_cliente = $this->input->post('tipo_cliente');
		$t_documento = $this->input->post('tipo_documento');
		$n_documento = $this->input->post('num_documento');

		# Obtiene el cliente x su id
		$clienteActual = $this->Mclientes->getId($id);

		#------- validando --------
		if ($n_documento == $clienteActual->num_doc) {
			$is_unique = '';
		} else {
			$is_unique = '|is_unique[clientes.num_doc]';
		}

		#reglas de validaciones
		$this->form_validation->set_rules("nombres","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipo_cliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("tipo_documento","Tipo de Documento","required");
		$this->form_validation->set_rules("telefono","Telefono del Cliente","required");
		$this->form_validation->set_rules("direccion","Direccion del Cliente","required");
		$this->form_validation->set_rules("num_documento","Numero de Documento","required".$is_unique);

		#si procede / guarda la informacion
		if ($this->form_validation->run()) {

			$data = array(
			'nombres' => $nombres,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'tipo_cli_id' => $t_cliente,
			'tipo_doc_id' => $t_documento,
			'num_doc' => $n_documento,
			);

			if($this->Mclientes->updateClientes($id,$data)){

				$this->session->set_flashdata("bien","<strong>Cliente</strong> Actualizado con exito!!");
				redirect(base_url()."mantenimiento/Cclientes");

			}else{

				$this->session->set_flashdata("error","No se pudo editar el cliente");
				redirect(base_url()."mantenimiento/Cclientes/preUpdate").$id;

			}


		#muestra los mensages de errores en los imputs	
		}else{

			$this->preUpdate($id);
		}
		
	}


	/* Elimina un registro*/
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
