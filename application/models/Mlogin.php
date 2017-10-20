<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	 
	public function login($user,$password){

		$this->db->where("username",$user);
		$this->db->where("password",$password);

		$data = $this->db->get("usuarios");

		if ($data->num_rows() > 0) {

			return $data->row();

		}else{

			return false;
		}


	}
}