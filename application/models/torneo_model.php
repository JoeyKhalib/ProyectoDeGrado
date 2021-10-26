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





		//Consultas para generar reportes de torneos

	public function listaCompletaTorneo()
	{
		$this->db->select('*');
		$this->db->from('torneo');
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
