<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador_model extends CI_Model {


	public function lista()
	{
		$this->db->select('*');
		$this->db->from('jugador');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function actInscripcion()
	{
		$this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}

	public function inscripcionForm($idjugador)
	{
		$this->db->select('*');
		$this->db->from('inscripcion I');
		$this->db->join('jugador J','J.idjugador=I.idjugador');
		$this->db->join('cursos C','C.idcursos=I.idcursos');
		$this->db->join('categoria CA','CA.idCategoria=C.Categoria_idCategoria');
		$this->db->join('usuario U','U.idusuario=J.usuario_idusuario');
		$this->db->where('J.idjugador',$idjugador);
		return $this->db->get();
	}


	public function obtenerInscripcion($idjugador)
	{
		$this->db->select('idjugador id , fechaInscripcionI start ,fechaInscripcionF end, costoDeInscripcion title');
		$this->db->from('inscripcion');
		$this->db->where('estado','1');
		$this->db->where('idjugador',$idjugador);
		return $this->db->get();
	}

	public function listaCompleta()
	{
		$this->db->select('*');
		$this->db->from('jugador J');
		$this->db->join('usuario U','U.idusuario=J.usuario_idusuario');
		$this->db->where('J.estado','1');
		return $this->db->get();
	}

	public function recuperarJugador($idjugador)
	{
		$this->db->select('*');
		$this->db->from('jugador');
		$this->db->where('idjugador',$idjugador);
		return $this->db->get();
	}


	public function modificarJugador($idjugador,$data)
	{
		
		$this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}

		public function modificarInscripcion($idjugador,$data)
	{
		
		$this->db->where('idjugador',$idjugador);
		$this->db->update('inscripcion',$data);
	}


	public function agregarJugador($data)
	{
		$this->db->insert('jugador',$data);
	}

	public function agregaHistorial($data)
	{
		$this->db->insert('historial',$data);
	}
	
	public function eliminarJugador($idjugador)
	{
		$this->db->where('idjugador',$idjugador);
		$this->db->delete('jugador');
	}

	public function eliminarJugadorl($idjugador)
	{
	    $this->db->where('idjugador',$idjugador);
		$this->db->update('jugador',$data);
	}


	public function obtenerTodas()
	{
		$this->db->select('idjugador id ,idtutor idp , fechaInscripcionI start ,fechaInscripcionF end, costoDeInscripcion title');
		$this->db->from('inscripcion');
		$this->db->where('estado','1');
		return $this->db->get();
}


	public function eliminarInscripcion($idjugador)
	{
		$this->db->where('idjugador',$idjugador);
		$this->db->delete('inscripcion');
	}



		//Consultas para generar reportes de Jugadores

	public function listaCompletaJugadores()
	{
		$this->db->select('*');
		$this->db->from('jugador');
		return $this->db->get();
	}

	public function totalJugadores()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('jugador');
		return $this->db->get();
	}
	
	public function totalHabJugadores()
	{
		$this->db->select('COUNT(*) AS habilitados');
		$this->db->from('jugador');
		$this->db->where('estado','1');
		return $this->db->get();
	}

	public function totalDesJugadores()
	{
		$this->db->select('COUNT(*) AS desabilitados');
		$this->db->from('jugador');
		$this->db->where('estado','0');
		return $this->db->get();
	}

		public function totalInscritos()
	{
		$this->db->select('COUNT(*) AS inscriptosS');
		$this->db->from('jugador');
		$this->db->where('inscripcion','1');
		return $this->db->get();
	}

	public function totalNoInscritos()
	{
		$this->db->select('COUNT(*) AS inscriptosN');
		$this->db->from('jugador');
		$this->db->where('inscripcion','0');
		return $this->db->get();
	}

	

		public function getHistorial(){
		$this->db->select("*");
		$this->db->from("historial H");
		$this->db->join("jugador J","H.jugador_idjugador = J.idjugador");
		$this->db->join("cursos C","H.idcursos = C.idcursos");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
		public function getHistorialbyDate($fechainicio,$fechafin){
		$this->db->select("*");
		$this->db->from("historial H");
		$this->db->join("jugador J","H.jugador_idjugador = J.idjugador");
		$this->db->join("cursos C","H.idcursos = C.idcursos");
		$this->db->where("H.fechaInscripcionI >=",$fechainicio);
		$this->db->where("H.fechaInscripcionI <=",$fechafin);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}




}
