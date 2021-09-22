<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrenador extends CI_Controller {



public function test()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$id=$_SESSION['idusuario'];
		$rol=$_SESSION['rol_idrol'];
		//$id=$_SESSION['idusuario'];
		//$data2['infousuario']=$this->usuario_model->recuperarUsuario($id);
		$data3['infousuario']=$this->usuario_model->recuperarRol($rol,$id);

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php',$data3); 
		$this->load->view('ent_perfil.php');
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function usuarios()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('test',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



public function imprimir()
	{

	$lista=$this->usuario_model->lista();
	$data['usuarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('est_mostrar',$data); //contenido
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
		$idusuario=$id=$_SESSION['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php');
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('ent_modificar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarbd()
	{
		$idusuario=$_POST['idusuario'];
		$data['nombres']=$_POST['nombres'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['email']=$_POST['email'];
		$data['password']=$_POST['password'];
		$lista=$this->entrenador_model->modificarEntrenador($idusuario,$data);
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
		$this->load->view('inc_headlogin.php'); //archivos cabecera
		$this->load->view('loginform',$data); //login
		$this->load->view('inc_footerlogin.php'); //archivos del footer
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
				$this->session->set_userdata('idusuario',$row->idusuario);
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

	
public function modificarbdDoH()
	{
		$idusuario=$_POST['idusuario'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->usuario_model->modificarUsuario($idusuario,$data);
		redirect('usuario/test','refresh');
	}



/*
switch ($this->session->userdata('tipo')=) {
    case 'Administrador':
      redirect('usuario/test','refresh');
        break;
    case 'Usuario':
     redirect('usuarioComun/test','refresh');
        break;
    case 'Entrenador':
      redirect('entrenador/test','refresh');
        break;
    case 'Padre':
       redirect('padre/test','refresh');
        break;
}
*/
		


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}

}
