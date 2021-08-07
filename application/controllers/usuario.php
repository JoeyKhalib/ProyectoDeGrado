<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {



public function test()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('test',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function index2()
	{
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_registrar.php',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function modificar()
	{
		$idUsuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_modificar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarbd()
	{
		$idUsuario=$_POST['idusuario'];
		$data['nombre']=$_POST['nombre'];
		$data['ApellidoPaterno']=$_POST['ApellidoPaterno'];
		$data['ApellidoMaterno']=$_POST['ApellidoMaterno'];
		$data['carnet']=$_POST['Cedula'];
		$data['liga']=$_POST['Liga'];
		$lista=$this->usuario_model->modificarUsuario($idusuario,$data);
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
		$data['nombreCompleto']=$_POST['nombreCompleto'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['sexo']=$_POST['sexo'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		$data['rol']=$_POST['rol'];
		$data['password']=$_POST['password'];
		$lista=$this->usuario_model->agregarUsuario($data);

		redirect('','refresh');
	}

	public function eliminarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$this->usuario_model->eliminarUsuario($idUsuario);

		redirect('','refresh');
	}

		public function index()
	{

		//index.php/usuarios/index/2
		$data['msg']=$this->uri->segment(3);
		if ($this->session->userdata('nombreUsuario')) 
		{
			redirect('usuario/panel','refresh');
		}
		else
		{
			//cargar un login form
		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('loginform',$data); //login
		$this->load->view('inc_footer.php'); //archivos del footer
		}

	}

	public function validarusuario()
	{

		$nombreUsuario=$_POST['nombreUsuario'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($nombreUsuario,$password);

		if ($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				//crear las variables de session
				$this->session->set_userdata('idPersona',$row->idPersona);
				$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuario/panel','refresh');

			}
			}
			else
			{
				//sino redirigimos a index enviando 1 en el urisegment 3
				redirect('usuario/index/1','refresh');
			}
		}

	



	public function panel()
	{
		if ($this->session->userdata('nombreUsuario')) 
		{
			redirect('usuario/test','refresh');

			/*
			if($this->session->userdata('tipo')=='Administrador')
			{
				//menu admin
				//panel admin
			}
			else
			{
				//menu inv
				//panel inv
			}
			*/

		}
		else
		{
			redirect('usuario/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}

}
