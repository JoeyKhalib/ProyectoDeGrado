<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('cursos');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function inscripcion($data)
	{
		$this->db->insert('inscripcion',$data);
	}

	public function categorias()
	{
		$this->db->select('*');
		$this->db->from('categoria');
		return $this->db->get();
	}

	public function recuperarCursos($idcursos)
	{
		$this->db->select('*');
		$this->db->from('cursos');
		$this->db->where('idcursos',$idcursos);
		return $this->db->get();
	}
	public function modificarCursos($idcursos,$data)
	{
		
		$this->db->where('idcursos',$idcursos);
		$this->db->update('cursos',$data);
	}

	public function agregarCursos($data)
	{
		$this->db->insert('cursos',$data);
	}
	
	public function eliminarCursos($idcursos)
	{
		$this->db->where('idcursos',$idcursos);
		$this->db->delete('cursos');
	}

	public function eliminarCursosl($idcursos)
	{
	    $this->db->where('idcursos',$idcursos);
		$this->db->update('cursos',$data);
	}

}
