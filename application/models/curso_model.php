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

	public function listaInscritos($idcursos)
	{
		$this->db->select('*');
		$this->db->from('inscripcion I');
		$this->db->join('jugador J','I.idjugador=J.idjugador');
		$this->db->join('cursos C','C.idcursos=I.idcursos');
		$this->db->where('I.estado','1');
		$this->db->where('C.idcursos',$idcursos);
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



	//Consultas para generar reportes de Cursos

	public function listaCompletaCursos()
	{
		$this->db->select('*');
		$this->db->from('cursos C');
		$this->db->join('categoria A','A.idCategoria=C.Categoria_idCategoria');
		return $this->db->get();
	}

	public function totalCursos()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('cursos');
		return $this->db->get();
	}
	
	public function totalCurHab()
	{
		$this->db->select('COUNT(*) AS habilitados');
		$this->db->from('cursos');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function totalCurDes()
	{
		$this->db->select('COUNT(*) AS desabilitados');
		$this->db->from('cursos');
		$this->db->where('estado','0');
		return $this->db->get();
	}

		public function categoriaInf()
	{
		$this->db->select('COUNT(*) AS infantiles');
		$this->db->from('cursos');
		$this->db->where('Categoria_idCategoria','1');
		return $this->db->get();
	}

	public function categoriaPre()
	{
		$this->db->select('COUNT(*) AS preadolecentes');
		$this->db->from('cursos');
		$this->db->where('Categoria_idCategoria','2');
		return $this->db->get();
	}

	public function categoriaAdo()
	{
		$this->db->select('COUNT(*) AS adolecentes');
		$this->db->from('cursos');
		$this->db->where('Categoria_idCategoria','3');
		return $this->db->get();
	}

	public function categoriaAdul()
	{
		$this->db->select('COUNT(*) AS adultos');
		$this->db->from('cursos');
		$this->db->where('Categoria_idCategoria','4');
		return $this->db->get();
	}


}
