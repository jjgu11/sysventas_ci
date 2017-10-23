<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclientes extends CI_Model {

	/*Obtine todas los Clientes*/ 
	public function getClientes(){

		$this->db->where('estado','1');
		$data = $this->db->get("clientes");
		return $data->result();
	}

}
