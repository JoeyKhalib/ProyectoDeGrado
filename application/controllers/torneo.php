<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torneo extends CI_Controller {


public function tornOpciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarT()
	{

		$lista=$this->usuario_model->listaEntrenadores();
		$data['entrenadores']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('torn_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarTEntr()
	{

		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('torn_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarTorneo()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombre']=$_POST['nombre'];
		$data['fechaTorneo']=$_POST['fechaTorneo'];
		$data['totalEquipos']=$_POST['totalEquipos'];
		$data['horaTorneo']=$_POST['horaTorneo'];
		$data['premio']=$_POST['premio'];
		$data['idRegistro']=$registro;
		$data['usuario_idusuario']=$_POST['entrenador'];
		$lista=$this->torneo_model->agregarTorneo($data);
		redirect('','refresh');
		/*if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaTorneo','refresh');
		}
		else
		{
			redirect('cursos/listaTorneoEntr','refresh');
		}*/
	}

	public function listaTorneo()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->torneo_model->listaTorneo();
		$data['listatorneos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function listadoEquiposTor()
	{


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_equipos'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaTorneoEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->torneo_model->listaTorneo();
		$data['listatorneos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('torn_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarTorn()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['infotorneo']=$this->torneo_model->recuperarTorneo($idtorneo);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarTornEntr()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['infotorneo']=$this->torneo_model->recuperarTorneo($idtorneo);



		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('torn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarTorneo()
	{
		$date = fechaActual();
		$idtorneo=$_POST['idtorneo'];
		$data['nombre']=$_POST['nombre'];
		$data['fechaTorneo']=$_POST['fechaTorneo'];
		$data['totalEquipos']=$_POST['totalEquipos'];
		$data['horaTorneo']=$_POST['horaTorneo'];
		$data['fechaActualizacion']=$date;
		$data['premio']=$_POST['premio'];
		$lista=$this->torneo_model->modificarTorneo($idtorneo,$data);
		redirect('','refresh');
		/*if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaCursos','refresh');
		}
		else
		{
			redirect('cursos/listaCursosEntr','refresh');
		}*/

	}


	public function desabilitarCur()
	{

		$idcursos=$_POST['idcursos'];
		$data['infocurso']=$this->curso_model->recuperarCursos($idcursos);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('cur_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitarCur()
	{

		$idcursos=$_POST['idcursos'];
		$data['infocurso']=$this->curso_model->recuperarCursos($idcursos);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('cur_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	
public function modificarTorDoH()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->torneo_model->modificarTorneo($idtorneo,$data);
		redirect('torneo/listaTorneo','refresh');
	}

public function imprimirCursos()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function imprimirCursosEntr()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}






}
