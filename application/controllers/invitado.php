<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitado extends CI_Controller {



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
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('inv_perfil',$data3); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
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




	public function reservasVista()
	{



		$this->load->view('inc_headCalendarioReserv.php'); 
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('reserva_calendario'); //contenido
		$this->load->view('inc_footerCalendario.php'); //archivos del footer
	}

	 public function getRerserva()
  	{

    $lista=$this->invitado_model->listandoReserva();
    echo json_encode($lista);
 	 }




	public function reservasCanchasOpcion()
	{
		$lista=$this->calendario_model->listandoCanchas();
		$data['todoscanchas']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('canch_seleccion',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function reserva()
	{
		$idcanchas=$_POST['idcanchas'];
		$lista=$this->calendario_model->recuperarCancha($idcanchas);
		$data['canchitas']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('reser_registrar'); //contenido
		$this->load->view('reser_registrar2',$data); //contenido
		$this->load->view('inc_footerCalendario.php'); //archivos del footer
	}

	public function agregarReserva()
	{
		$this->db->trans_begin();
		$registro=$_SESSION['idusuario'];
		$data['fechaReserva']=$_POST['fechaReserva'];
		$data['totalJugadores']=$_POST['totalJugadores'];
		$data['horaInicial']=$_POST['horaInicial'];
		$data['horaFinal']=$_POST['horaFinal'];
		$data['canchas_idcanchas']=$_POST['idcanchas'];
		$data['usuario_idusuario']=$registro;


		$lista=$this->calendario_model->registroCancha($data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){      
         //Hubo errores en la consulta, entonces se cancela la transacción.   
         $this->db->trans_rollback();      
         return false;    
      }else{      
         //Todas las consultas se hicieron correctamente.  
         $this->db->trans_commit();
         redirect('invitado/test','refresh');    
         return true;    
      }  

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


	public function misReservas()
	{
		$idusuario=$_SESSION['idusuario'];
		$lista=$this->invitado_model->listaReser($idusuario);
		$data['reservas']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuUser.php'); 
		$this->load->view('inv_reservas',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function invitadoCalendario()
	{
	$this->load->view('inc_headCalendarioinvi');
	$this->load->view('inc_menuUser');
	$this->load->view('v_calendario');
	$this->load->view('inc_footerCalendario');
	}

    public function getEventos()
  	{
  	$rol=$_SESSION['rol_idrol'];	
    $lista=$this->invitado_model->listandoEventosInvi($rol);
    echo json_encode($lista);

  	}




}
