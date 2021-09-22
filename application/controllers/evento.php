<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->evento_model->destinados();
		$data['destinatarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarE()
	{
		

		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('cur_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarEvento()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombreEvento']=$_POST['nombreEvento'];
		$data['lugar']=$_POST['lugar'];
		$data['fecha']=$_POST['fecha'];
		$data['descripcion']=$_POST['descripcion'];
		$data['lugar']=$_POST['lugar'];
		$data['rol_idrol']=$_POST['destinatario'];
		$data['titulo']=$_POST['titulo'];
		$data['idRegistro']=$registro;
		$lista=$this->evento_model->agregarEvento($data);

		redirect('','refresh');
	}

	public function listaEventos()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->evento_model->lista();
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_vista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function listaEventosEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->evento_model->lista();
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('evn_vistaEntr',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarEvn()
	{
		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->evento_model->recuperarEvento($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarEvento()
	{
		$date = fechaActual();
		$idevento=$_POST['idevento'];
		$data['nombreEvento']=$_POST['nombreEvento'];
		$data['lugar']=$_POST['lugar'];
		$data['descripcion']=$_POST['descripcion'];
		$data['fecha']=$_POST['fecha'];
		$data['rol_idrol']=$_POST['destinatario'];
		$data['fechaActualizacion']=$date;
		$lista=$this->evento_model->modificarEvento($idevento,$data);
		redirect('','refresh');
	}


	public function desabilitarEvento()
	{

		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->evento_model->recuperarEvento($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('evn_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitarCur()
	{

		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->curso_model->recuperarCursos($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('cur_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	
public function modificarEvnDoH()
	{
		$idevento=$_POST['idevento'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->evento_model->modificarEvento($idevento,$data);
		redirect('evento/listaEventos','refresh');
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




}
