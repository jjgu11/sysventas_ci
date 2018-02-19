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

	// obtengo todos los usuarios activos
	public function getUsuarios(){

		$this->db->select("u.*,r.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles r","u.rol_id=r.id");
		$this->db->where("estado","1");
		$resultados = $this->db->get();

		return $resultados->result();
	}

	//obtengo los roles de usuarios
	public function getRoles(){

		$resultados = $this->db->get("roles");
		return $resultados->result();

	}

	// Guardo los nuevos usuarios
	public function createUsuarios($data){

		return $this->db->insert("usuarios",$data);

	}

	// obtengo todos los usuarios activos
	public function getUsuario($id){

		$this->db->select("u.*,r.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles r","u.rol_id=r.id");
		$this->db->where("estado","1");
		$this->db->where("u.id",$id);
		$resultados = $this->db->get();

		return $resultados->row();
	}

	/*Actualiza y elimina(por ajax)*/
	public function updateUsuario($data,$id){

		$this->db->where('id',$id);
		$row = $this->db->update("usuarios",$data);

		return $row;
	}
}