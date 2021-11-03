<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitado_model extends CI_Model {


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

		public function listandoReserva()
	{
		$this->db->select('idreserva id , CONCAT(fechaReserva ,"T", horaInicial) start, CONCAT(fechaReserva ,"T", horaFinal) end');
		$this->db->from('reserva');
		return $this->db->get()->result();
	}


	public function listaReser($idusuario)
	{
		$this->db->select('*');
		$this->db->from('reserva R');
		$this->db->join('usuario U','R.usuario_idusuario=U.idusuario');
		$this->db->join('canchas C','C.idcanchas=R.canchas_idcanchas');
		$this->db->where('U.idusuario',$idusuario);
		return $this->db->get();
	}

	public function listandoEventosInvi($rol)
	{
		$this->db->select('idevento id , fecha start , nombreEvento title');
		$this->db->from('evento');
		$this->db->where('rol_idrol',$rol);
		return $this->db->get()->result();
	}


}
