<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrenador_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		return $this->db->get();
	}

		public function modificarEntrenador($idusuario,$data)
	{
		
		$this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
	}


	public function validar($nombreUsuario,$password)
	{

		$query="SELECT * FROM usuario WHERE nombreUsuario='".$nombreUsuario."' AND password='".$password."'AND estado=1" ;
		return $this->db->query($query);


}


//		$query="SELECT * FROM personas WHERE login='".$login."' AND password='".$password."'"
//		return $this->db->query($query);
	



}
