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
		$this->load->model("Mclientes");
		$this->load->model("Mproductos");
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

		//var_dump($clientes);
	}


	public function insertarVenta(){

		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("idusuario");
		$numero_doc = $this->input->post("numero");
		$serie = $this->input->post("serie");

		//campos ocultos del formulario
		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$dataV = [
			'fecha' 	  => $fecha,
			'subtotal'    => $subtotal,
			'igv' 		  => $igv,
			'descuento'   => $descuento,
			'total' 	  => $total,
			'tipo_com_id' => $idcomprobante,
			'cliente_id'  => $idcliente,
			'usuario_id'  => $idusuario,
			'num_doc'      => $numero_doc,
			'serie' 	  => $serie

		];

		//var_dump($dataV);
		// 1- Guardo la venta generada
		if($this->Mventas->createVentas($dataV)){

			$idVentas = $this->Mventas->lastId();

			var_dump($idVentas);

			// 2- Actualizo la cantidad del comprobante para otra venta
			$this->updateComprobanteCant($idcomprobante);

			// 3- Inserto el detalle_venta y actualizo el stok del producto  ****** revisar ventaid
			$this->insertarDetalle($idproductos,$idVentas,$precios,$cantidades,$importes);

			redirect(base_url()."movimiento/Cventas");

		}else{
			redirect(base_url()."movimiento/Cventas/addVent");
		}


	}



	//buscamos el comprobante por su id y actualizamos la cantidad
	protected function updateComprobanteCant($id){

		//obtengo el array del comprobante actual
		$comprobanteActual = $this->Mventas->getComprobanteId($id);
		
		//aumento el campo cantidad ++
		$newCantidad = $comprobanteActual->cantidad + 1;

		$data = [
			'cantidad' => $newCantidad
		];

		//envio al modelo para actualizar la new cantidad (id del post, campo a actualizar)
		$this->Mventas->updateTipoComprobanteCant($id,$data);

	}


	protected function insertarDetalle($idpro,$idvent,$pre,$cant,$impo){

		for ($i=0; $i < count($idpro) ; $i++) { 
			
			$data = [
				'producto_id' => $idpro[$i],
				'venta_id' => $idvent,
				'precio' => $pre[$i],
				'cantidad' => $cant[$i],
				'importe' => $impo[$i]
			];

			//var_dump($data);
			$this->Mventas->createDetalle($data);
			$this->UpdateProductoStock($idpro[$i],$cant[$i]);

		}

	}


	//rreviasar********
	protected function UpdateProductoStock($idpro,$cant){

		$productoActual = $this->Mproductos->getId($idpro);

		$newStock = $productoActual->stock - $cant;

		$data = [
			'stock' => $newStock
		];

		//var_dump($data);

		$this->Mproductos->updateProductos($idpro,$data);

	}

}