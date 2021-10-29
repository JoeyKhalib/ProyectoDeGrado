<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancha extends CI_Controller {



public function opcionesCancha()
	{

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('canch_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarC()
	{

		$lista=$this->usuario_model->listaEntrenadores();
		$data['entrenadores']=$lista;


		$this->load->view('inc_headEquipo.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('canch_registrar',$data); //contenido
		$this->load->view('inc_footerEquipo.php'); //archivos del footer
	}


		public function agregarCanchas()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombre']=$_POST['nombre'];
		$data['ubicacion']=$_POST['ubicacion'];
		$data['numero']=$_POST['numero'];
		$data['email']=$_POST['email'];
		$data['descripcion']=$_POST['descripcion'];
		$data['idRegistro']=$registro;
		$data['usuario_idusuario']=$_POST['entrenador'];
		$lista=$this->calendario_model->agregarCancha($data);
		redirect('','refresh');
	}



	public function listaCancha()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->calendario_model->listandoCanchas();
		$data['todoscanchas']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('canch_lista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function modificarCa()
	{
		$idcanchas=$_POST['idcanchas'];
		$data['infocancha']=$this->calendario_model->recuperarCancha($idcanchas);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('canch_modificarCancha',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

}



		public function modificarCancha()
	{
		
		$idcanchas=$_POST['idcanchas'];
		$date = fechaActual();
		$data['nombre']=$_POST['nombre'];
		$data['ubicacion']=$_POST['ubicacion'];
		$data['numero']=$_POST['numero'];
		$data['email']=$_POST['email'];
		$data['fechaActualizacion']=$date;
		$lista=$this->calendario_model->modificarCanchas($idcanchas,$data);
}


	public function modificarCanDoH()
	{
		$idcanchas=$_POST['idcanchas'];
		$data['estadoCancha']=$_POST['desabilitar'];
		$lista=$this->calendario_model->modificarCanchas($idcanchas,$data);
		redirect('cancha/listaCancha','refresh');
	}



	public function subirfotoC()
	{
		$data['idcanchas']=$_POST['idcanchas'];


		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('subirformCanchas',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}
	public function subirC()
	{
		$idcanchas=$_POST['idcanchas'];
		$nombrearchivo=$idcanchas.".jpg";

		//ruta donde se guardan los ficheros
		$config['upload_path']="./uploads/canchaFotos/";
		//configurar el nombre del archivo
		$config['file_name']=$nombrearchivo;
		//remplazar los archivos
		$direccion="./uploads/canchaFotos/".$nombrearchivo;
		unlink($direccion);
		//tipos de archivos
		$config['allowed_types']='jpg';	//'gif|jpg|png'
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload()) {
			//si  hay un error se para la vista
			$data['error']=$this->upload->display_errors();
		}
		else {
			$data['foto']=$nombrearchivo;
			$lista=$this->calendario_model->modificarCanchas($idcanchas,$data);
			$this->upload->data();
		}
		
			redirect('cancha/listaCancha','refresh');

	}



	public function eventosInvitado()
	{

		$rol=$_SESSION['rol_idrol'];
		$lista=$this->evento_model->listaEntrenador($rol);
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('inv_vistaEventos',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
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
