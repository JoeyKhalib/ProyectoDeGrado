<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		return $this->db->get();
	}

	public function recuperarUsuario($idUsuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get();
	}
	public function modificarUsuario($idUsuario,$data)
	{
		
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);
	}

	public function agregarUsuario($data)
	{
		$this->db->insert('usuario',$data);
	}
	
	public function eliminarUsuario($idUsuario)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->delete('usuario');
	}

}
