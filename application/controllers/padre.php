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


	public function listaJugadores()
	{
		$id=$_SESSION['idusuario'];
		$lista=$this->padre_model->recuperarJugadores($id);
		$data['jugadorsitos']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuPadre.php'); 
		$this->load->view('pdr_inscritos',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

public function eventosJugador()
	{

		$rol=$_SESSION['rol_idrol'];
		$lista=$this->evento_model->listaEntrenador($rol);
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuPadre.php'); 
		$this->load->view('pdr_vistaEventos',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
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
