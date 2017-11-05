<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproductos extends CI_Model {

	/*Obtine todas los Productos*/ 
	public function getProductos(){

		$this->db->select("p.*,c.nombre as categoria");
		$this->db->from("productos as p");
		$this->db->join("categorias c", "p.categoria_id = c.id");
		$this->db->where('p.estado','1');
		$data = $this->db->get();
		return $data->result();
	}
}	