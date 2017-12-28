<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mventas extends CI_Model {

	/*Obtine todos los comprobantes*/ 
	public function getComprobantes(){

		$data = $this->db->get("tipo_comprobante");
		return $data->result();
	}

	//obtiene los productos para las ventas
	public function getProductos($valor){

		$this->db->select("id,codigo,nombre as label,precio,stock");
		$this->db->from("productos");
		$this->db->where('estado','1');
		$this->db->like("nombre",$valor);

		$data = $this->db->get();

		return $data->result_array(); //retorna array para pasarlo a Json
	}

	// inserta las ventas
	public function createVentas($data){

		return $this->db->insert("ventas",$data);
	}

	//obtiene el ultimo id de la ventas
	public function lastId(){

		return $this->db->insert_id();
	}


	// Obtengo el comprobante especificado
	public function getComprobanteId($idComprobante){

		$this->db->where("id",$idComprobante);
		$resultado = $this->db->get("tipo_comprobante");
		return $resultado->row();

	}

	// Actualizo la new cantidad
	public function updateTipoComprobanteCant($idComprobante,$data){

		$this->db->where("id",$idComprobante);
		 $this->db->update("tipo_comprobante",$data);
	}

	// Actualizo el new Stock
	public function updateProductoStock($idProducto,$data){

		$this->db->where("id",$idProducto);
		 $this->db->update("productos",$data);
	}

	//Guardo el Detalle de la venta
	public function createDetalle($data){

		$this->db->insert("detalle_venta",$data);
	}

	//listando todas las ventas
	public function getVentas(){

		$this->db->select("v.*,c.nombres,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_com_id = tc.id");
		$resultados = $this->db->get();

		if ($resultados->num_rows() > 0) {
			
			//retorna todas los registros
			return $resultados->result();
		}else {

			return false;
		}


	}

	//listando solo la venta especifica - para el modal
	public function getVenta($id){

		/*select v.*,c.nombres,c.direccion,c.num_doc dni,c.telefono,tc.nombre as tipocomprobante
		from ventas v
		join clientes c on v.cliente_id = c.id
		join tipo_comprobante tc on v.tipo_com_id = tc.id*/

		$this->db->select("v.*,c.nombres,c.direccion,c.num_doc dni,c.telefono,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_com_id = tc.id");
		$this->db->where("v.id", $id);

		$resultados = $this->db->get();

		////retorna solo un registro
		return $resultados->row();


	}

	//listando la venta especifica - para el modal
	public function getDetalle($id){

		/*
		select dv.*,p.nombre,p.codigo
		from detalle_venta dv
		join productos p on dv.producto_id = p.id
		where dv.venta_id=28*/

		$this->db->select("dv.*,p.nombre,p.codigo");
		$this->db->from("detalle_venta dv");
		$this->db->join("productos p","dv.producto_id = p.id");
		$this->db->where("dv.venta_id", $id);

		$resultados = $this->db->get();

		////retorna mas de 1 registro
		return $resultados->result();


	}


	public function getVentasDate($fi,$ff){


		$this->db->select("v.*,c.nombres,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_com_id = tc.id");
		$this->db->where("v.fecha >=",$fi);
		$this->db->where("v.fecha <=",$ff);
		$resultados = $this->db->get();

		if ($resultados->num_rows() > 0) {
			
			//retorna todas los registros
			return $resultados->result();
		}else {

			return false;
		}


	}

	


}