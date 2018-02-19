<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cusuarios extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mlogin");
	}



	/*Carga lo lista de los usarios*/
	public function index()
	{	
		$data = array(
			'usuarios' =>$this->Mlogin->getUsuarios()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/list',$data);
		$this->load->view('layouts/footer');

	}

	/*redirige al formulario para agregar*/
	public function addUsu(){

		$data = [
			"roles" => $this->Mlogin->getRoles()
		];

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/agregar',$data);
		$this->load->view('layouts/footer');

	}


	/*Inserta new Usuario*/
	public function insertar(){

		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$rol = $this->input->post('rol');

		#reglas de validaciones
		/*$this->form_validation->set_rules("nombres","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipo_cliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("tipo_documento","Tipo de Documento","required");
		$this->form_validation->set_rules("telefono","Telefono del Cliente","required");
		$this->form_validation->set_rules("direccion","Direccion del Cliente","required");
		$this->form_validation->set_rules("num_documento","Numero de Documento","required|is_unique[clientes.num_doc]");*/

		#si procede / guarda la informacion
		#if ($this->form_validation->run()) {
		#if () {
			
		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'rol_id' => $rol,
			'estado' => '1'
		);

		//si es true lo que devuelve la BD
		if($this->Mlogin->createUsuarios($data)){

			//$this->session->set_flashdata("bien","Cliente guardado con exito!");
			redirect(base_url()."admin/Cusuarios") ;
		}else{
			$this->session->set_flashdata("error","No se pudo guardar el cliente");
			redirect(base_url()."admin/Cusuarios/addUsu");
		}

		#muestra la vista con los mensages de error en los imputs	
		/*} else {
			
			$this->addCli();	
		}*/
		
	}


	/*pasa los datos al formulario a editar*/
	public function preUpdate($id){

		
		$data = array(
			"roles" => $this->Mlogin->getRoles(),
			"usuario" => $this->Mlogin->getUsuario($id)
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/editar',$data);
		$this->load->view('layouts/footer');


	}

	public function update(){

		$idusuario = $this->input->post('idusuario');

		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$rol = $this->input->post('rol');

		#reglas de validaciones
		/*$this->form_validation->set_rules("nombres","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipo_cliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("tipo_documento","Tipo de Documento","required");
		$this->form_validation->set_rules("telefono","Telefono del Cliente","required");
		$this->form_validation->set_rules("direccion","Direccion del Cliente","required");
		$this->form_validation->set_rules("num_documento","Numero de Documento","required|is_unique[clientes.num_doc]");*/

		#si procede / guarda la informacion
		#if ($this->form_validation->run()) {
		#if () {
			
		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $email,
			'username' => $username,
			'rol_id' => $rol,
		);

		//si es true lo que devuelve la BD
		if($this->Mlogin->updateUsuario($data,$idusuario)){

			//$this->session->set_flashdata("bien","Cliente guardado con exito!");
			redirect(base_url()."admin/Cusuarios") ;
		}else{
			$this->session->set_flashdata("error","No se pudo guardar el cliente");
			redirect(base_url()."admin/Cusuarios/preUpdate/".$idusuario);
		}
	}


	public function delete($id){

		$data = array(
			'estado'=>"0"
		);

		$row = $this->Mlogin->updateUsuario($data,$id);

		/*le paso la ruta como respuesta al ajax*/
	    echo "admin/Cusuarios";
	    
	}


}

