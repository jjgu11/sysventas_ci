<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccategorias extends CI_Controller {

	private $permisos;

	public function __construct(){

		parent::__construct();

		// Carga nuestra libreria permisos
		$this->permisos = $this->back_lib->control();

		$this->load->model("Mcategorias");
	}


	/*Carga lo lista de ategorias*/
	public function index()
	{	
		$data = array(
			'categorias' =>$this->Mcategorias->getCategorias(),
			'permisos' => $this->permisos
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/list',$data);
		$this->load->view('layouts/footer');

	}

	/*Button Formulario Agregar Categorias*/
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


		// regla de validacion (nombre_campo_db, alias_mostrar, validacion)
		$this->form_validation->set_rules('nombre','Nombre Categoria','required|is_unique[categorias.nombre]');

		if($this->form_validation->run()){

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

		}else{

			//redirige al formulario de agregar categorias
			$this->addCat();
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



	//Obtiene el id del POST 
	public function update(){

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');

		$categoriaActual = $this->Mcategorias->getId($id);

		//valido si es el mismo registro 
		if ($nombre == $categoriaActual->nombre) {
			$unique = '';
		} else {
			$unique = '|is_unique[categorias.nombre]';
		}

		// regla de validacion (nombre_campo_db, alias_mostrar, validacion)
		$this->form_validation->set_rules('nombre','Nombre Categoria','required'.$unique);
		

		if ($this->form_validation->run()) {

			//creo un array con los datos del POST
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

		} else {
			$this->preUpdate($id);
		}
		
	}


	/*pasa los datos a traves del metodo Ajax desde la vista y los devuelve a estos*/
	public function view($id){

		/*trae el reg. del modelo*/
		$data = array(
			'categoria' => $this->Mcategorias->getId($id)
		);

		/*envia la data a la vista*/
		$this->load->view("admin/categorias/view",$data);
	}



	public function delete($id){

		$data = array(
			'estado'=>"0"
		);

		$row = $this->Mcategorias->updateCategorias($id,$data);

		/*le paso la ruta como respuesta al ajax*/
	    echo "mantenimiento/Ccategorias";
	}



}