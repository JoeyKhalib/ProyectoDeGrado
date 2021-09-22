<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torneo extends CI_Controller {


public function tornOpciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarT()
	{

		$lista=$this->usuario_model->listaEntrenadores();
		$data['entrenadores']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('torn_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarTEntr()
	{

		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('torn_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarTorneo()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombre']=$_POST['nombre'];
		$data['fechaTorneo']=$_POST['fechaTorneo'];
		$data['totalEquipos']=$_POST['totalEquipos'];
		$data['horaTorneo']=$_POST['horaTorneo'];
		$data['premio']=$_POST['premio'];
		$data['idRegistro']=$registro;
		$data['usuario_idusuario']=$_POST['entrenador'];
		$lista=$this->torneo_model->agregarTorneo($data);
		redirect('','refresh');
		/*if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaTorneo','refresh');
		}
		else
		{
			redirect('cursos/listaTorneoEntr','refresh');
		}*/
	}

	public function listaTorneo()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->torneo_model->listaTorneo();
		$data['listatorneos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaTorneoEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->torneo_model->listaTorneo();
		$data['listatorneos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('torn_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarTorn()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['infotorneo']=$this->torneo_model->recuperarTorneo($idtorneo);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarTornEntr()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['infotorneo']=$this->torneo_model->recuperarTorneo($idtorneo);



		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('torn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarTorneo()
	{
		$date = fechaActual();
		$idtorneo=$_POST['idtorneo'];
		$data['nombre']=$_POST['nombre'];
		$data['fechaTorneo']=$_POST['fechaTorneo'];
		$data['totalEquipos']=$_POST['totalEquipos'];
		$data['horaTorneo']=$_POST['horaTorneo'];
		$data['fechaActualizacion']=$date;
		$data['premio']=$_POST['premio'];
		$lista=$this->torneo_model->modificarTorneo($idtorneo,$data);
		redirect('','refresh');
		/*if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaCursos','refresh');
		}
		else
		{
			redirect('cursos/listaCursosEntr','refresh');
		}*/

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

	
public function modificarTorDoH()
	{
		$idtorneo=$_POST['idtorneo'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->torneo_model->modificarTorneo($idtorneo,$data);
		redirect('torneo/listaTorneo','refresh');
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

	public function imprimirCursosEntr()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function subirfoto()
	{
		$data['idcursos']=$_POST['idcursos'];


		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('subirformCursos',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}
	public function subir()
	{
		$idcursos=$_POST['idcursos'];
		$nombrearchivo=$idcursos.".jpg";

		//ruta donde se guardan los ficheros
		$config['upload_path']="./uploads/cursos/";
		//configurar el nombre del archivo
		$config['file_name']=$nombrearchivo;

		//remplazar los archivos

		$direccion="./uploads/cursos/".$nombrearchivo;
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
			$lista=$this->curso_model->modificarCursos($idcursos,$data);
			$this->upload->data();
		}
		
			redirect('','refresh');

	}




}
