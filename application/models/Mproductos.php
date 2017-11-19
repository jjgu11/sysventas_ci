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

	/*Inserta la new Productos*/
	public function createProductos($data){

		return $this->db->insert('productos',$data);

	}

	/*Obtiene el Id para Editar*/
	public function getId($id){

		$this->db->where('id',$id);
		$rst= $this->db->get("productos");

		return $rst->row();
	}

	/*Actualiza y elimina los Productos*/
	public function updateProductos($id,$data){

		$this->db->where('id',$id);
		$row = $this->db->update("productos",$data);

		//retorna un boolean
		return $row;
	}

}	