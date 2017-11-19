<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproductos extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mproductos");
		$this->load->model("Mcategorias");
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


	/*Button Agregar Productos*/
	public function addPro(){

		$data = [
			'categorias' => $this->Mcategorias->getCategorias()
		];

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/agregar',$data);
		$this->load->view('layouts/footer');
	}


	public function insertar(){

		$data = [
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'precio' => $this->input->post('precio'),
			'stock' => $this->input->post('stock'),
			'categoria_id' => $this->input->post('categoria'),
			'estado' => '1'
			];



		if($this->Mproductos->createProductos($data)){

			redirect(base_url()+"admin/productos/list");

		}else{

			$this->session->set_flashdata("error","No se pudo guardar la Categoria");
			redirect(base_url()."mantenimiento/Ccategorias/addPro");

		}
	}


	/*Obtiene el registro y pasa a la vista para editar*/
	public function preUpdate($id){

		/*guardo en el array el registro a editar*/
		$data = array(
			'productos' => $this->Mproductos->getId($id),
			'categorias' => $this->Mcategorias->getCategorias()
		);

		//echo var_dump($data);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/editar',$data);
		$this->load->view('layouts/footer');
	}


	public function update(){

		$id = $this->input->post('id');

		$nombre = $this->input->post('nombres');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$stock = $this->input->post('stock');
		$categoria = $this->input->post('categoria');

		$data = array(
			'nombre' => $nombre,
			'descripcion'=>$descripcion,
			'precio'=>$precio, 
			'stock'=>$stock, 
			'categoria_id'=>$categoria,
			'estado' => '1'  
			);

		if($this->Mproductos->updateProductos($id,$data)){


			/*$data = array(
			'msg' => "<span class='label label-primary'>Primary Label</span"  
			);


			$this->load->view('layouts/header');
			$this->load->view('admin/productos/list',$data);
			$this->load->view('layouts/aside');
			$this->load->view('layouts/footer');*/

			redirect(base_url()."mantenimiento/Cproductos");
			
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la Categoria");
			redirect(base_url()."mantenimiento/Cproductos/preUpdate/".$id);
		}
	}




}