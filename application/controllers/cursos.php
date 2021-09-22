<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('cur_crear'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarC()
	{
		$lista=$this->curso_model->categorias();
		$data['categorias']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('cur_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarCEntr()
	{
		$lista=$this->curso_model->categorias();
		$data['categorias']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('cur_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarCurso()
	{
		$registro=$_SESSION['idusuario'];
		$resultado=$_POST['inicial'] .'-'. $_POST['final'];
		$data['nombreCurso']=$_POST['nombreCurso'];
		$data['horaIngreso']=$_POST['horaIngreso'];
		$data['horaSalida']=$_POST['horaSalida'];
		$data['cupos']=$_POST['cupos'];
		$data['turno']=$_POST['turno'];
		$data['categoria']=$_POST['categoria'];
		$data['rango']=$resultado;
		$data['descripcion']=$_POST['descripcion'];
		$data['idRegistro']=$registro;
		$data['Categoria_idCategoria']=$_POST['categoria'];
		$lista=$this->curso_model->agregarCursos($data);
		if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaCursos','refresh');
		}
		else
		{
			redirect('cursos/listaCursosEntr','refresh');
		}
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

	public function listaCursosEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->curso_model->lista();
		$data['todoscursos']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('cur_listaEntr',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarCur()
	{
		$idcursos=$_POST['idcursos'];
		$data['infocurso']=$this->curso_model->recuperarCursos($idcursos);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('cur_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarCurEntr()
	{
		$idcursos=$_POST['idcursos'];
		$data['infocurso']=$this->curso_model->recuperarCursos($idcursos);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menuEntrenador.php'); 
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
		if ($_SESSION['idusuario']==1) {
			redirect('cursos/listaCursos','refresh');
		}
		else
		{
			redirect('cursos/listaCursosEntr','refresh');
		}

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
