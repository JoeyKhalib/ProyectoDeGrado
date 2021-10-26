<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model {


	public function listaCategorias()
	{
		$this->db->select('*');
		$this->db->from('categoria');
		return $this->db->get();
	}

	public function recuperarJugadoresDeCategoria($idCategoria)
	{
		$this->db->select('*');
		$this->db->from('inscripcion I');
		$this->db->join('cursos C','C.idcursos=I.idcursos');
		$this->db->join('categoria CA','C.Categoria_idCategoria=CA.idCategoria');
		$this->db->join('jugador J','J.idjugador=I.idjugador');
		$this->db->where('CA.idCategoria',$idCategoria);
		$this->db->where('J.estado','1');
		return $this->db->get();
	}

}
