<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {



public function test()
	{
		//en este caso test es nuestra ventana principal
		$id=$_SESSION['idusuario'];
		$rol=$_SESSION['rol_idrol'];

		//$data2['infousuario']=$this->usuario_model->recuperarUsuario($id);
		$data3['infousuario']=$this->usuario_model->recuperarRol($rol,$id);
		//$data3['infousuario']=$this->usuario_model->recuperarEventos($rol);

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('est_perfil',$data3); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function listapdf()
	{
		$lista=$this->usuario_model->listaCompleta();
		$lista=$lista->result();

		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Usuarios");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'LISTA DE USUARIOS','LTBR',0,'C',1);
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(35,5,'NOMBRE','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'APELLIDO PATERNO','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'APELLIDO MATERNO','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'CI','TBLR',0,'L',0);
		$this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombres=$row->nombres;
			$apellidoPaterno=$row->apellidoPaterno;
			$apellidoMaterno=$row->apellidoMaterno;
			$ci=$row->ci;
			$telefono=$row->telefono;

			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(35,5,$nombres,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$apellidoPaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$ci,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',0);
			$this->pdf->Ln(5);
			$num++;
		}
		$this->pdf->Ln(15);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'L',0);



		$this->pdf->Output('listadeusuarios.pdf','I');
	}





	public function reporteUsuarios()
	{

		$totalUsuarios=$this->usuario_model->totalUsuarios();
		$totalActivos=$this->usuario_model->totalHabilitados();
		$totalDesactivos=$this->usuario_model->totalDesabilitados();
		$totalADMIN=$this->usuario_model->totalAdministradores();
		$toralENTR=$this->usuario_model->totalEntrenadores();
		$totalPADRE=$this->usuario_model->totalPadres();
		$totalINVI=$this->usuario_model->totalInvitados();
		$totalUsuarios=$totalUsuarios->result();
		$totalActivos=$totalActivos->result();
		$totalDesactivos=$totalDesactivos->result();
		$totalADMIN=$totalADMIN->result();
		$toralENTR=$toralENTR->result();
		$totalPADRE=$totalPADRE->result();
		$totalINVI=$totalINVI->result();


		$lista=$this->usuario_model->listaconRolesCompleto();
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Usuarios");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'REPORTE DE USUARIOS','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(50,5,'NOMBRES COMPLETO','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'ROL','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'CI','TBLR',0,'L',0);
		$this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombres=$row->nombres;
			$apellidoPaterno=$row->apellidoPaterno;
			$apellidoMaterno=$row->apellidoMaterno;
			$nombreRol=$row->nombreRol;
			$ci=$row->ci;
			$telefono=$row->telefono;
			$estado=$row->estado;
			$this->pdf->SetFillColor(245,30,30);

			if ($estado==1) {
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$nombres.' '.$apellidoPaterno.' '.$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$nombreRol,'TBLR',0,'L',0);
			//$this->pdf->Cell(40,5,$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$ci,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',0);
			$this->pdf->Ln(5);
			$num++;
			}
			else
			{
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',1);
			$this->pdf->Cell(50,5,$nombres.' '.$apellidoPaterno.' '.$apellidoMaterno,'TBLR',0,'L',1);
			$this->pdf->Cell(40,5,$nombreRol,'TBLR',0,'L',1);
			//$this->pdf->Cell(40,5,$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$ci,'TBLR',0,'L',1);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',1);
			$this->pdf->Ln(5);
			$num++;
			}


			
		}



		foreach ($totalUsuarios as $row) {
			$total=$row->total;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'TOTAL DE USUARIOS:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$total,'TBLR',0,'L',0);
		}
		foreach ($totalActivos as $row) {
			$habilitados=$row->habilitados;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'TOTAL DE USUARIOS ACTIVOS:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$habilitados,'TBLR',0,'L',0);
		}
		foreach ($totalDesactivos as $row) {
			$desabilitados=$row->desabilitados;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'TOTAL DE USUARIOS DESACTIVOS:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$desabilitados,'TBLR',0,'L',0);
		}
		foreach ($totalADMIN as $row) {
			$administradores=$row->administradores;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'USUARIOS ADMINISTRADORES:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$administradores,'TBLR',0,'L',0);
		}
		foreach ($toralENTR as $row) {
			$entrenador=$row->entrenadores;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'USUARIOS ENTRENADORES:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$entrenador,'TBLR',0,'L',0);
		}
		foreach ($totalPADRE as $row) {
			$padre=$row->padres;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'USUARIOS PADRES/TUTORES:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$padre,'TBLR',0,'L',0);
		}
		foreach ($totalINVI as $row) {
			$invitado=$row->invitados;
			$this->pdf->Ln(5);
			$this->pdf->Cell(53,5,'USUARIOS INVITADOS:','TBLR',0,'L',0);
			$this->pdf->Cell(10,5,$invitado,'TBLR',0,'L',0);


		}

		
		$this->pdf->Ln(16);
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'C',0);


		$this->pdf->Output('reportesdeusuarios.pdf','I');
	}



	public function usuarios()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->usuario_model->listaconRoles();
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
		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('est_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarbd()
	{
		$date = fechaActual();
		$idusuario=$_POST['idusuario'];
		$data['nombres']=$_POST['nombres'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['email']=$_POST['email'];
		$data['fechaActualizacion']=$date;
		$data['rol_idrol']=$_POST['rol_idrol'];
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
		$lista=$this->usuario_model->roles();
		$data['rol']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('est_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarbd()
	{
		$user=generarUsuario($_POST['nombres'],$_POST['ci']);
		$contra=generarContra($_POST['nombres'],$_POST['apellidoPaterno'],$_POST['apellidoMaterno'],$_POST['ci']);
		$registro=$_SESSION['idusuario'];
		$data['nombres']=$_POST['nombres'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['sexo']=$_POST['sexo'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$user;
		$data['rol_idrol']=$_POST['rol'];
		$data['idRegistro']=$registro;
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
				$this->session->set_userdata('rol_idrol',$row->rol_idrol);
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

	switch ($this->session->userdata('rol_idrol')) {
    case '1':
      redirect('usuario/test','refresh');
        break;
    case '2':
     redirect('entrenador/test','refresh');
        break;
    case '3':
      redirect('invitado/test','refresh');
        break;
    case '4':
       redirect('padre/test','refresh');
        break;
	}

}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}


	public function subirfoto()
	{
		$data['idusuario']=$_POST['idusuario'];


		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('subirform',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}
	public function subir()
	{
		$idusuario=$_POST['idusuario'];
		$nombrearchivo=$idusuario.".jpg";

		//ruta donde se guardan los ficheros
		$config['upload_path']="./uploads/usuariosFotos/";
		//configurar el nombre del archivo
		$config['file_name']=$nombrearchivo;

		//remplazar los archivos
		$direccion="./uploads/usuariosFotos/".$nombrearchivo;
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
			$lista=$this->usuario_model->modificarUsuario($idusuario,$data);
			$this->upload->data();
		}

			redirect('usuario/test','refresh');

	}







	

}
