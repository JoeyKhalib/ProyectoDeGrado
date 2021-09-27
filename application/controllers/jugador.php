<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function opcionesEntrenador()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_optionsEntr'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarJug()
	{
		$lista=$this->padre_model->recuperarPadres();
		$data['padres']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('jug_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarJugEntr()
	{
		$lista=$this->padre_model->recuperarPadres();
		$data['padres']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('jug_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarJugador()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombresJugador']=$_POST['nombres'];
		$data['apellidoPaternoJugador']=$_POST['apellidoPaterno'];
		$data['apellidoMaternoJugador']=$_POST['apellidoMaterno'];
		$data['ciJugador']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['direc']=$_POST['direc'];
		$data['sexo']=$_POST['sexo'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['idRegistro']=$registro;
		$data['usuario_idusuario']=$_POST['padre'];
		$lista=$this->jugador_model->agregarJugador($data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
	}

	public function listaJugador()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->jugador_model->lista();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_lista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaJugadorEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->jugador_model->lista();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_listaEntr',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaInscripcion()
	{

		
		$lista=$this->jugador_model->listaCompleta();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_Inscripcion',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function registrarInscripcion()
	{

		
		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_regisInscrip2'); 
		$this->load->view('jug_regisInscrip');
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarJug()
	{
		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarJugEntre()
	{
		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarJugador()
	{
		$idjugador=$_POST['idjugador'];
		$data['nombresJugador']=$_POST['nombres'];
		$data['apellidoPaternoJugador']=$_POST['apellidoPaterno'];
		$data['apellidoMaternoJugador']=$_POST['apellidoMaterno'];
		$data['ciJugador']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['direc']=$_POST['direc'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$lista=$this->jugador_model->modificarJugador($idjugador,$data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
		
	}


	public function desabilitarJug()
	{

		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('jug_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitarJug()
	{

		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('jug_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	
public function modificarJugDoH()
	{
		$idjugador=$_POST['idjugador'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->jugador_model->modificarJugador($idjugador,$data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
	}

public function imprimirJugadores()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

public function imprimirJugadoresEntre()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


}
