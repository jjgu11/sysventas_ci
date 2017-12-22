<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mventas extends CI_Model {

	/*Obtine todos los comprobantes*/ 
	public function getComprobantes(){

		$data = $this->db->get("tipo_comprobante");
		return $data->result();
	}

	//obtiene los productos para las ventas
	public function getProductos($valor){

		$this->db->select("id,codigo,nombre as label,precio,stock");
		$this->db->from("productos");
		$this->db->where('estado','1');
		$this->db->like("nombre",$valor);

		$data = $this->db->get();

		return $data->result_array(); //retorna array para pasarlo a Json
	}

	// inserta las ventas
	public function createVentas($data){

		return $this->db->insert("ventas",$data);
	}

	//obtiene el ultimo id de la ventas
	public function lastId(){

		return $this->db->insert_id();
	}


	// Obtengo el comprobante especificado
	public function getComprobanteId($idComprobante){

		$this->db->where("id",$idComprobante);
		$resultado = $this->db->get("tipo_comprobante");
		return $resultado->row();

	}

	// Actualizo la new cantidad
	public function updateTipoComprobanteCant($idComprobante,$data){

		$this->db->where("id",$idComprobante);
		 $this->db->update("tipo_comprobante",$data);
	}

	// Actualizo el new Stock
	public function updateProductoStock($idProducto,$data){

		$this->db->where("id",$idProducto);
		 $this->db->update("productos",$data);
	}

	//Guardo el Detalle de la venta
	public function createDetalle($data){

		$this->db->insert("detalle_venta",$data);
	}

	


}