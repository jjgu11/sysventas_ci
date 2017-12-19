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

		$this->db->insert_id();
	}


	public function getComprobantes($idComprobante){

		$this->db->where("id",$idComprobante);

		$resultado = $this->db->get("tipo_comprobante");

		return $resultado->row();

	}

	public function updateTipoComprobanteCant($idComprobante,$data){

		$this->db->where("id",$idComprobante);
		 $this->db->update("tipo_comprobante",$data);
	}

	


}