<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	
public function test()
	{
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('test',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function index()
	{
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_lista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}
	public function modificar()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idUsuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_modificar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['ApellidoPaterno']=$_POST['ApellidoPaterno'];
		$data['ApellidoMaterno']=$_POST['ApellidoMaterno'];
		$data['carnet']=$_POST['Cedula'];
		$data['liga']=$_POST['Liga'];
		$lista=$this->usuario_model->modificarUsuario($idUsuario,$data);
		redirect('','refresh');
	}
	
	public function agregar()
	{
		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_agregar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['ApellidoPaterno']=$_POST['ApellidoPaterno'];
		$data['ApellidoMaterno']=$_POST['ApellidoMaterno'];
		$data['carnet']=$_POST['Cedula'];
		$data['liga']=$_POST['Liga'];
		$lista=$this->usuario_model->agregarUsuario($data);

		redirect('','refresh');
	}

	public function eliminarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$this->usuario_model->eliminarUsuario($idUsuario);

		redirect('','refresh');
	}

}
