<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancha_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('canchafutbol');
		return $this->db->get();
	}

	public function recuperarCancha($idFutbol)
	{
		$this->db->select('*');
		$this->db->from('canchafutbol');
		$this->db->where('idFutbol',$idFutbol);
		return $this->db->get();
	}
	public function modificarCancha($idFutbol,$data)
	{
		
		$this->db->where('idFutbol',$idFutbol);
		$this->db->update('canchafutbol',$data);
	}

	public function agregarCancha($data)
	{
		$this->db->insert('canchafutbol',$data);
	}
	
	public function eliminarCancha($idFutbol)
	{
		$this->db->where('idFutbol',$idFutbol);
		$this->db->delete('canchafutbol');
	}

}
