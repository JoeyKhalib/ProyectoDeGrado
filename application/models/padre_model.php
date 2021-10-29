<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Padre_model extends CI_Model {



	public function recuperarPadres()
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('rol R','R.idrol=U.rol_idrol');
		$this->db->where('R.nombreRol','Padre');
		return $this->db->get();
	}

	public function recuperarJugadores($padre)
	{
		$this->db->select('*');
		$this->db->from('jugador J');
		$this->db->join('usuario U','J.usuario_idusuario=U.idusuario');
		$this->db->where('J.usuario_idusuario',$padre);
		return $this->db->get();
	}



}
