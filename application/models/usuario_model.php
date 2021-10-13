<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function listaCompleta()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		return $this->db->get();
	}
	
	public function lista()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function listaEntrenadores()
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('rol R','R.idrol=U.rol_idrol');
		$this->db->where('R.nombreRol','Entrenador');
		return $this->db->get();
	}

	public function roles()
	{
		$this->db->select('*');
		$this->db->from('rol');
		return $this->db->get();
	}

	public function listaconRoles()
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('rol R','R.idrol=U.rol_idrol');
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

	public function recuperarRol($rol,$idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('rol R','R.idrol=U.rol_idrol');
		$this->db->where('idusuario',$idusuario);
		$this->db->where('U.rol_idrol',$rol);
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function recuperarEventos($idusuario)
	{
		$this->db->distinct('U.idusuario');
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('rol R','U.rol_idrol=R.idrol');
		$this->db->join('evento E','E.rol_idrol=U.rol_idrol','E.rol_idrol=R.idrol');
		$this->db->where('U.idusuario',$idusuario);
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
