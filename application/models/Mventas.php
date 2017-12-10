<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mventas extends CI_Model {

	/*Obtine todos los comprobantes*/ 
	public function getComprobantes(){

		$data = $this->db->get("tipo_comprobante");
		return $data->result();
	
	}

	public function getProductos($valor){

		$this->db->select("id,codigo,nombre as label,precio,stock");
		$this->db->from("productos");
		$this->db->where('estado','1');
		$this->db->like("nombre",$valor);

		$data = $this->db->get();

		return $data->result_array(); //retorna array para pasarlo a Json
	}

	


}