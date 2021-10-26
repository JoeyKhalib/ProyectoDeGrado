<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function destinados()
	{
		$this->db->select('*');
		$this->db->from('rol');
		return $this->db->get();
	}



	public function recuperarEvento($idevento)
	{
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where('idevento',$idevento);
		return $this->db->get();
	}
	public function modificarEvento($idevento,$data)
	{
		
		$this->db->where('idevento',$idevento);
		$this->db->update('evento',$data);
	}

	public function agregarEvento($data)
	{
		$this->db->insert('evento',$data);
	}
	
	public function eliminarEvento($idevento)
	{
		$this->db->where('idevento',$idevento);
		$this->db->delete('evento');
	}

	public function eliminarEventol($idevento)
	{
	    $this->db->where('idevento',$idevento);
		$this->db->update('evento',$data);
	}



	//Consultas para generar reportes de Eventos

	public function listaCompletaEventos()
	{
		$this->db->select('*');
		$this->db->from('evento');
		return $this->db->get();
	}

	public function totalEventos()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('evento');
		return $this->db->get();
	}
	
	public function totalEvenHab()
	{
		$this->db->select('COUNT(*) AS habilitados');
		$this->db->from('evento');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function totalEvenDes()
	{
		$this->db->select('COUNT(*) AS desabilitados');
		$this->db->from('evento');
		$this->db->where('estado','0');
		return $this->db->get();
	}

		public function categoriaReunion()
	{
		$this->db->select('COUNT(*) AS reunion');
		$this->db->from('evento');
		$this->db->where('titulo','Reunion');
		return $this->db->get();
	}

	public function categoriaInvitacion()
	{
		$this->db->select('COUNT(*) AS invitacion');
		$this->db->from('evento');
		$this->db->where('titulo','Invitacion');
		return $this->db->get();
	}

	public function categoriaComunicado()
	{
		$this->db->select('COUNT(*) AS comunicado');
		$this->db->from('evento');
		$this->db->where('titulo','Comunicado');
		return $this->db->get();
	}

	public function categoriaSolicitud()
	{
		$this->db->select('COUNT(*) AS solicitud');
		$this->db->from('evento');
		$this->db->where('titulo','Solicitud');
		return $this->db->get();
	}






}
