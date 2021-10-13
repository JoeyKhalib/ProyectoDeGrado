<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Padre extends CI_Controller {



public function test()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->usuario_model->lista();
		$data['usuarios']=$lista;

		$id=$_SESSION['idusuario'];
		$rol=$_SESSION['rol_idrol'];
		//$data2['infousuario']=$this->usuario_model->recuperarUsuario($id);
		$data3['infousuario']=$this->usuario_model->recuperarRol($rol,$id);

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuPadre.php'); 
		$this->load->view('pdr_perfil',$data3); //contenido
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

/*
public function perfil()
	{

		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('est_perfil',); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}
*/
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
		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_modificarModal',$data); //contenido
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
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['email']=$_POST['email'];
		$data['rol']=$_POST['rol'];
		$lista=$this->usuario_model->modificarUsuario($idusuario,$data);
		redirect('','refresh');
	}

	public function modificarUsuariobd()
	{
		$idusuario=$_POST['idusuario'];
		$data['nombres']=$_POST['nombres'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['email']=$_POST['email'];
		$lista=$this->usuario_model->modificarUsuario($idusuario,$data);
		redirect('','refresh');
	}
	
	public function desabilitar()
	{

		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitar()
	{

		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('est_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function agregar()
	{
		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('est_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarbd()
	{
		$user=generarUsuario($_POST['nombres'],$_POST['ci']);
		$contra=generarContra($_POST['nombres'],$_POST['apellidoPaterno'],$_POST['apellidoMaterno'],$_POST['ci']);
		$data['nombres']=$_POST['nombres'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['sexo']=$_POST['sexo'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$user;
		$data['rol']=$_POST['rol'];
		$data['password']=md5($contra);
		$lista=$this->usuario_model->agregarUsuario($data);

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
				$this->session->set_userdata('rol',$row->rol);
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


	public function panel()
	{

	switch ($this->session->userdata('rol')) {
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

}

	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}


	


}
