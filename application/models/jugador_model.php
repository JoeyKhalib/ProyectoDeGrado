<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('jugador');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function actInscripcion()
	{
		$this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}

	public function inscripcionForm($idjugador)
	{
		$this->db->select('*');
		$this->db->from('inscripcion I');
		$this->db->join('jugador J','J.idjugador=I.idjugador');
		$this->db->join('usuario U','U.idusuario=J.usuario_idusuario');
		$this->db->where('J.idjugador',$idjugador);
		return $this->db->get();
	}


	public function obtenerInscripcion($idjugador)
	{
		$this->db->select('idjugador id , fechaInscripcionI start ,fechaInscripcionF end, costoDeInscripcion title');
		$this->db->from('inscripcion');
		$this->db->where('estado','1');
		$this->db->where('idjugador',$idjugador);
		return $this->db->get()->result();
	}

	public function listaCompleta()
	{
		$this->db->select('*');
		$this->db->from('jugador J');
		$this->db->join('usuario U','U.idusuario=J.usuario_idusuario');
		$this->db->where('J.estado','1');
		return $this->db->get();
	}

	public function recuperarJugador($idjugador)
	{
		$this->db->select('*');
		$this->db->from('jugador');
		$this->db->where('idjugador',$idjugador);
		return $this->db->get();
	}


	public function modificarJugador($idjugador,$data)
	{
		
		$this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}

	public function agregarJugador($data)
	{
		$this->db->insert('jugador',$data);
	}
	
	public function eliminarJugador($idjugador)
	{
		$this->db->where('idjugador',$idjugador);
		$this->db->delete('jugador');
	}

	public function eliminarJugadorl($idjugador)
	{
	    $this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}

}
