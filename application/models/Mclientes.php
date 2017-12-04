<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclientes extends CI_Model {

	/*Obtine todas los Clientes*/ 
	public function getClientes(){

		$this->db->select("c.*,tc.nombre as tipocliente, td.nombre as tipodocumento");
		$this->db->from("clientes c");
		$this->db->join(" tipo_cliente tc","c.tipo_cli_id = tc.id");
		$this->db->join(" tipo_documento td", "c.tipo_cli_id = td.id");
		$this->db->where('c.estado','1');
		$data = $this->db->get();
		return $data->result();
	}



	/*Obtiene todos los tipos de Clientes*/
	public function getTipoClientes(){
		
		//$this->db->where('estado','1');
		$data = $this->db->get("tipo_cliente");
		return $data->result();
	}

	/*Obtiene todos los tipos de documetos*/
	public function getTipoDocumentos(){
		
		//$this->db->where('estado','1');
		$data = $this->db->get("tipo_documento");
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
