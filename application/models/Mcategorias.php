<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcategorias extends CI_Model {

	/*Obtine todas las Cateforias*/ 
	public function getCategorias(){

		$this->db->where('estado','1');
		$data = $this->db->get("categorias");
		return $data->result();
	}

	/*Inserta la new Categoria*/
	public function createCategorias($data){

		return $this->db->insert('categorias',$data);

	}

	/*Obtiene el Id para Edit*/
	public function getId($id){

		$this->db->where('id',$id);
		$rst= $this->db->get("categorias");

		return $rst->row();
	}

	public function updateCategorias($id,$data){

		$this->db->where('id',$id);
		$row = $this->db->update("categorias",$data);

		return $row;
	}
}