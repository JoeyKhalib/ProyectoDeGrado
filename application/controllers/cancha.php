<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancha extends CI_Controller {

	
public function test2()
	{
		$lista=$this->cancha_model->lista();
		$data['canchas']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('test2',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	
	public function modificar()
	{
		$idFutbol=$_POST['idFutbol'];
		$data['infocancha']=$this->cancha_model->recuperarCancha($idFutbol);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('canch_modificar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarbd()
	{
		$idFutbol=$_POST['idFutbol'];
		$data['nombre']=$_POST['nombre'];
		$data['turno']=$_POST['turno'];
		$lista=$this->cancha_model->modificarCancha($idFutbol,$data);
		redirect('cancha/test2','refresh');
	}
	
	public function agregar()
	{
		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('canch_agregar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['turno']=$_POST['turno'];
		$lista=$this->cancha_model->agregarCancha($data);

		redirect('cancha/test2','refresh');
	}

	public function eliminarbd()
	{
		$idFutbol=$_POST['idFutbol'];
		$this->cancha_model->eliminarCancha($idFutbol);

		redirect('cancha/test2','refresh');
	}

}
