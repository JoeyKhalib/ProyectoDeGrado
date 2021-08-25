<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Padre_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		return $this->db->get();


	}

	public function recuperarUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idusuario',$idusuario);
		return $this->db->get();
	}
	public function modificarUsuario($idusuario,$data)
	{
		
		$this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
	}

	public function agregarUsuario($data)
	{
		$this->db->insert('usuario',$data);
	}
	
	public function eliminarUsuario($idusuario)
	{
		$this->db->where('idusuario',$idusuario);
		$this->db->delete('usuario');
	}

	public function validar($nombreUsuario,$password)
	{
		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nombreUsuario',$nombreUsuario);
		$this->db->where('password',$password);


		return $this->db->get();
}
public function eliminarUsuariol($idusuario)
		{
	    $this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
		}

//		$query="SELECT * FROM personas WHERE login='".$login."' AND password='".$password."'"
//		return $this->db->query($query);
	



}
