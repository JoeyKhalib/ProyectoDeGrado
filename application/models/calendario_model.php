<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario_model extends CI_Model {


	public function listandoEventos()
	{
		$this->db->select('idevento id , fecha start , nombreEvento title');
		$this->db->from('evento');
		return $this->db->get()->result();
	}



}
