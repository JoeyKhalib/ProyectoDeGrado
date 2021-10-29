<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario_model extends CI_Model {


	public function listandoEventos()
	{
		$this->db->select('idevento id , fecha start , nombreEvento title');
		$this->db->from('evento');
		return $this->db->get()->result();
	}

	public function agregarCancha($data)
	{
		$this->db->insert('canchas',$data);
	}

	public function listandoCanchas()
	{
		$this->db->select('*');
		$this->db->from('canchas');
		return $this->db->get();
	}
	

	public function modificarCanchas($idcancha,$data)
	{
		
		$this->db->where('idcanchas',$idcancha);
		$this->db->update('canchas',$data);
	}

		public function recuperarCancha($idcanchas)
	{
		$this->db->select('*');
		$this->db->from('canchas');
		$this->db->where('idcanchas',$idcanchas);
		return $this->db->get();
	}

		public function registroCancha($data)
	{
		$this->db->insert('reserva',$data);
	}


	public function listandoReserv()
	{
		$this->db->select('idreserva id , fechaReserva start ');
		$this->db->from('reserva');
		return $this->db->get()->result();
	}


}
