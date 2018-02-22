<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mback extends CI_Model {

	//obtengo el id del menu al comparar
	public function getMenuId($url){

		$this->db->like('link', $url);
		$var = $this->db->get('menus');
		return $var->row();
	}

	//retorno el reg. de permiso, dependiendo el menu y rol donde esta usuario
	public function getPermisos($menu,$rol){

		$this->db->where('menu_id', $menu);
		$this->db->where('rol_id', $rol);
		$var = $this->db->get('permisos');
		return $var->row();
	}
}