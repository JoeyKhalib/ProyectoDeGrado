<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('material');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function recuperarMaterial($idmaterial)
	{
		$this->db->select('*');
		$this->db->from('material');
		$this->db->where('idmaterial',$idmaterial);
		return $this->db->get();
	}
	public function modificarCursos($idmaterial,$data)
	{
		
		$this->db->where('idmaterial',$idmaterial);
		$this->db->update('material',$data);
	}

	public function agregarCursos($data)
	{
		$this->db->insert('material',$data);
	}
	
	public function eliminarCursos($idmaterial)
	{
		$this->db->where('idmaterial',$idmaterial);
		$this->db->delete('material');
	}

	public function eliminarCursosl($idmaterial)
	{
	    $this->db->where('idmaterial',$idmaterial);
		$this->db->update('material',$data);
	}

}
