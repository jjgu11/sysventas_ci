<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcategorias extends CI_Model {

	 
	public function getCategorias(){

		$this->db->where('estado','1');
		$data = $this->db->get("categorias");
		return $data->result();
	}
}