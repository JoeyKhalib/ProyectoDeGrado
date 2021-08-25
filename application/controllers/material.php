<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('mat_crear'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarM()
	{
		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('mat_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarMaterial()
	{
		$data['nombreCurso']=$_POST['nombreCurso'];
		$data['horaIngreso']=$_POST['horaIngreso'];
		$data['horaSalida']=$_POST['horaSalida'];
		$data['cupos']=$_POST['cupos'];
		$data['turno']=$_POST['turno'];
		$data['categoria']=$_POST['categoria'];
		$data['rango']=$_POST['inicial'.'-'.'final'];
		$data['descripcion']=$_POST['descripcion'];
		$lista=$this->curso_model->agregarCursos($data);

		redirect('','refresh');
	}

	public function listaCursos()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->curso_model->lista();
		$data['todoscursos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('cur_lista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarCur()
	{
		$idcursos=$_POST['idcursos'];
		$data['infocurso']=$this->curso_model->recuperarCursos($idcursos);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('cur_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarCursos()
	{
		$idcursos=$_POST['idcursos'];
		$data['nombreCurso']=$_POST['nombreCurso'];
		$data['horaIngreso']=$_POST['horaIngreso'];
		$data['horaSalida']=$_POST['horaSalida'];
		$data['categoria']=$_POST['categoria'];
		$data['cupos']=$_POST['cupos'];
		$data['turno']=$_POST['turno'];
		$data['descripcion']=$_POST['descripcion'];
		$lista=$this->curso_model->modificarCursos($idcursos,$data);
		redirect('','refresh');
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

	
public function modificarCurDoH()
	{
		$idcursos=$_POST['idcursos'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->curso_model->modificarCursos($idcursos,$data);
		redirect('cursos/listaCursos','refresh');
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
