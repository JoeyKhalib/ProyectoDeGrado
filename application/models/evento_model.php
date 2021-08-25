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

}
