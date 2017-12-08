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



		// regla de validacion (nombre_campo_db, alias_mostrar, validacion)
		$this->form_validation->set_rules('codigo','codigo Producto se repite, ','required|is_unique[productos.codigo]');
		$this->form_validation->set_rules('nombre','nombre Producto','required');
		$this->form_validation->set_rules('descripcion','descripcion Producto','required');
		$this->form_validation->set_rules('precio','precio Producto','required');
		$this->form_validation->set_rules('stock','stock Producto','required');

		// 
		if($this->form_validation->run()){

			$data = [
				'codigo' => $this->input->post('codigo'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'precio' => $this->input->post('precio'),
				'stock' => $this->input->post('stock'),
				'categoria_id' => $this->input->post('categoria'),
				'estado' => '1'
			];

			if($this->Mproductos->createProductos($data)){
				redirect(base_url()."mantenimiento/Cproductos");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la Categoria");
				redirect(base_url()."mantenimiento/Ccategorias/addPro");
			}

		}else{
			$this->addPro();
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
		$codigo = $this->input->post('codigo');
		$nombre = $this->input->post('nombres');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$stock = $this->input->post('stock');
		$categoria = $this->input->post('categoria');


		$productoActual = $this->Mproductos->getId($id);

		//valido si es el mismo registro 
		if ($codigo == $productoActual->codigo) {
			$unique = '';
		} else {
			$unique = '|is_unique[productos.codigo]';
		}


		// regla de validacion (nombre_campo_db, alias_mostrar, validacion)
		$this->form_validation->set_rules('nombres','codigo Producto se repite','required'.$unique);
		$this->form_validation->set_rules('nombres','nombre Producto','required');
		$this->form_validation->set_rules('descripcion','descripcion Producto','required');
		$this->form_validation->set_rules('precio','precio Producto','required');
		$this->form_validation->set_rules('stock','stock Producto','required');

		if ($this->form_validation->run()){
			
			$data = array(
				'codigo' => $codigo,
				'nombre' => $nombre,
				'descripcion'=>$descripcion,
				'precio'=>$precio, 
				'stock'=>$stock, 
				'categoria_id'=>$categoria,  
			);

			if($this->Mproductos->updateProductos($id,$data)){

				redirect(base_url()."mantenimiento/Cproductos");
				
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la Categoria");
				redirect(base_url()."mantenimiento/Cproductos/preUpdate/".$id);
			}

		} else {
			
			$this->preUpdate($id);
		}
		

	}


	public function delete($id){

		$data = array(
			'estado'=>"0"
		);

		$row = $this->Mproductos->updateProductos($id,$data);

		/*le paso la ruta como respuesta al ajax*/
	    echo "mantenimiento/Cproductos";
	}




}