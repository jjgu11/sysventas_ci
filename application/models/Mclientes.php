<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclientes extends CI_Model {

	/*Obtine todas los Clientes*/ 
	public function getClientes(){

		$this->db->where('estado','1');
		$data = $this->db->get("clientes");
		return $data->result();
	}

	/*Inserta new clientes*/
	public function createClientes($data){

		return $this->db->insert('clientes',$data);

	}

	/*muestra solo un registro*/
	public function getId($id){

		$this->db->where('id',$id);
		$rst = $this->db->get("clientes");

		return $rst->row();

	}

	/*Actualiza y elimina los clientes*/
	public function updateClientes($id,$data){

		$this->db->where('id',$id);
		$row = $this->db->update("clientes",$data);

		return $row;

	}



}
