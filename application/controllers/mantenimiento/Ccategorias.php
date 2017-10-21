<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccategorias extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mcategorias");
	}


	/*Carga lo lista de ategorias*/
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

	/*Button Agregar Categorias*/
	public function addCat(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/agregar');
		$this->load->view('layouts/footer');
	}

	/*Insertar new Categoria*/
	public function insertar(){

		$nombre = $this->input->post('nombre');
		$des = $this->input->post('descripcion');

		$data = array(
			'nombre' => $nombre,
			'descripcion' => $des,
			'estado' => "1"
		);

		if ($this->Mcategorias->createCategorias($data)) {
			redirect(base_url()."mantenimiento/Ccategorias");
		} else {
			$this->session->set_flashdata("error","No se pudo guardar la Categoria");
			redirect(base_url()."mantenimiento/Ccategorias/addCat");
		}	
	}

	/*Obtiene el registro y pasa a la vista para editar*/
	public function preUpdate($id){

		/*guardo en el array el registro a editar*/
		$data = array(
			'categoria' => $this->Mcategorias->getId($id)
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/editar',$data);
		$this->load->view('layouts/footer');
	}


	public function update(){

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');

		$data = array(
			'nombre' => $nombre,
			'descripcion'=>$descripcion 
			);


		if($this->Mcategorias->updateCategorias($id,$data)){
			redirect(base_url()."mantenimiento/Ccategorias");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la Categoria");
			redirect(base_url()."mantenimiento/Ccategorias/preUpdate/".$id);

		}
	}



}