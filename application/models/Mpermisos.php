<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpermisos extends CI_Model {

	// obtengo el listado de los permisos
	public function getPermisos(){

		$this->db->select("p.*,m.nombre as menu,r.nombre as rol");
		$this->db->from("permisos p");
		$this->db->join("roles r","p.rol_id = r.id");
		$this->db->join("menus m","p.menu_id = m.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//listo todos los menus
	public function getMenus(){

		$resultados = $this->db->get('menus');
		return $resultados->result();
	}


	// Guardo los nuevos permisos
	public function createPermisos($data){

		return $this->db->insert("permisos",$data);

	}

	// obtengo el permiso especifico
	public function getPermiso($id){

		$this->db->where("id",$id);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	/*Actualiza*/
	public function updatePermiso($data,$id){

		$this->db->where('id',$id);
		$row = $this->db->update("permisos",$data);

		return $row;
	}


	/* elimina*/
	public function delete($id){

		$this->db->where('id',$id);
		$row = $this->db->delete("permisos");

		return $row;
	}



}