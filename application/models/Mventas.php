<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mventas extends CI_Model {

	/*Obtine todos los comprobantes*/ 
	public function getComprobantes(){

		$resultado = $this->db->get("tipo_comprobante");
		return $resultado->result();
	
	}


}