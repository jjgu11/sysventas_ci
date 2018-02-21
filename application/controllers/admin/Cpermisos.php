<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpermisos extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("Mpermisos");
		$this->load->model("Mlogin");
	}



	/*Carga lo lista de los permisos*/
	public function index()
	{	
		$data = array(
			'permisos' =>$this->Mpermisos->getPermisos()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/list',$data);
		$this->load->view('layouts/footer');

	}


	public function addPer(){

		$data = array(
			'roles' =>$this->Mlogin->getRoles(),
			'menus' =>$this->Mpermisos->getMenus()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/agregar',$data);
		$this->load->view('layouts/footer');

	}

	public function insertar(){

		$menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = [
			'menu_id' =>$menu,
			'rol_id' =>$rol,
			'read' =>$read,
			'insert' =>$insert,
			'update' =>$update,
			'delete' =>$delete
		];

		if ($this->Mpermisos->createPermisos($data)) {
				redirect(base_url()."admin/Cpermisos");
			} else {
				$this->session->set_flashdata("error","No se pudo guardar el Permiso");
				redirect(base_url()."admin/Cpermisos/addPer");
		}

	}


	/*Obtiene el registro y pasa a la vista para editar*/
	public function preUpdate($id){

		/*guardo en el array el registro a editar*/
		$data = array(
			'roles' => $this->Mlogin->getRoles(),
			'menus' => $this->Mpermisos->getMenus(),
			'permisos' => $this->Mpermisos->getPermiso($id)
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/editar',$data);
		$this->load->view('layouts/footer');
	}

	// Actualizo por medio de GET(url) paso el id otra forma
	public function update($id){

		//echo $id;

		//$id_permiso = $this->input->post("id_permiso");

		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = [
			'read' =>$read,
			'insert' =>$insert,
			'update' =>$update,
			'delete' =>$delete
		];

		//exit($this->Mpermisos->updatePermiso($data,$id));

		if ($this->Mpermisos->updatePermiso($data,$id)) {
				redirect(base_url()."admin/Cpermisos");
			} else {
				$this->session->set_flashdata("error","No se pudo actualizar el Permiso");
				redirect(base_url()."admin/Cpermisos/preUpdate".$id_permiso);
		}

	}


	/* Elimina un registro*/
	public function delete($id){

	
		if($this->Mpermisos->delete($id)){

			redirect(base_url()."admin/Cpermisos");

		}else{

			$this->session->set_flashdata("error","No se pudo eliminar el Permiso");
			redirect(base_url()."admin/Cpermisos");

		}


	}

}