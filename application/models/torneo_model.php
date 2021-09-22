<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torneo_model extends CI_Model {


	public function listaTorneo()
	{
		$this->db->select('*');
		$this->db->from('torneo');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function recuperarTorneo($idtorneo)
	{
		$this->db->select('*');
		$this->db->from('torneo');
		$this->db->where('idtorneo',$idtorneo);
		return $this->db->get();
	}

	public function recuperarTorneoCompleto($idtorneo)
	{
		$this->db->select('*');
		$this->db->from('torneo T');
		$this->db->join('usuario U','U.idusuario=T.usuario_idusuario');
		$this->db->where('idtorneo',$idtorneo);
		return $this->db->get();
	}


	public function modificarTorneo($idtorneo,$data)
	{
		
		$this->db->where('idtorneo',$idtorneo);
		$this->db->update('torneo',$data);
	}

	public function agregarTorneo($data)
	{
		$this->db->insert('torneo',$data);
	}
	
	public function eliminarTorneo($idusuario)
	{
		$this->db->where('idtorneo',$idtorneo);
		$this->db->delete('torneo');
	}




}
