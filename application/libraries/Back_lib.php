<?php 

/**
* JGU
*/
class Back_lib
{
	private $CI;

	//llamo a la variable Superglobal de CI
	public function __construct()
	{
		$this->CI = & get_instance();
	}

	public function control(){

		//valido el logeo
		if (!$this->CI->session->userdata('login')) {
			redirect(base_url());
		}

		//valido las URLs
		$url = $this->CI->uri->segment(1);

		if ($this->CI->uri->segment(2)){
			 $url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);
		}

		//paso al model y obtengo el registro con la direccion
		$menu = $this->CI->Mback->getMenuId($url);
		//obtengo el reg. de permisos (read,update,insert,delete)
		$permisos = $this->CI->Mback->getpermisos($menu->id,$this->CI->session->userdata('rol'));


		//valido los permisos
		if ($permisos->read == 0){
			// no permite leer las Categorias (x el momento)
			redirect(base_url()."Cdashboard");
		}else {
			// pasa la url completa 
			return $permisos;
		} 
	}
}