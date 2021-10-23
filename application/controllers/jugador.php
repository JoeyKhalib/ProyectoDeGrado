<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function opcionesEntrenador()
	{
		//en este caso test es nuestra ventana principal
		

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_optionsEntr'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


		public function formulariopdf()
	{
		$idjugador=$_POST['idjugador'];
		$lista=$this->jugador_model->inscripcionForm($idjugador);
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
		$this->pdf->Cell(115,10,'ESCUELA DE FUTBOL SPEED AND GOAL','LTBR',0,'C',1);
		$this->pdf->SetFont('Arial','B', 12);
		$this->pdf->Ln(12);
		$this->pdf->SetXY(31,29);
		$this->pdf->MultiCell(138, 3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Courier','', 10);
		$this->pdf->SetXY(35,34);
		$this->pdf->MultiCell(138, 3,('"Formando talentos y nuevas promesas deportivas"'), 0, 'C');
		$this->pdf->Line(20,40,180,40);
		$this->pdf->Ln(5);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\decoracion.png', 165, 8, 33, 22, 'PNG');
		$this->pdf->SetFont('Arial','B',13);
		$this->pdf->SetXY(20,40);
		$this->pdf->Cell(115,10,'FORMULARIO DE INSCRIPCION',0,'C',0);

		//$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\decoracion.png',60,50, 100, 70,'PNG');
	
		$this->pdf->SetFont('Arial','', 8);
		$this->pdf->SetXY(145,60);
		$this->pdf->Cell(15, 8, 'FECHA:', 0, 'L');
		$this->pdf->Line(163, 65.5, 185, 65.5);
 
		//Nombre //Apellidos //DNI //TELEFONO
		$this->pdf->SetXY(25, 90);
		$this->pdf->Cell(20, 8, 'NOMBRE(S):', 0, 'L');
		$this->pdf->Line(52, 95, 120, 95);
		//*****
		$this->pdf->SetXY(25,100);
		$this->pdf->Cell(19, 8, 'APELLIDOS:', 0, 'L');
		$this->pdf->Line(52, 105.5, 180, 105.5);
		//*****
		$this->pdf->SetXY(25, 110);
		$this->pdf->Cell(10, 8, 'CI:', 0, 'L');
		$this->pdf->Line(35, 115, 90, 115);
		//*****
		$this->pdf->SetXY(110, 110);
		$this->pdf->Cell(10, 8, utf8_decode('TELÉFONO:'), 0, 'L');
		$this->pdf->Line(135, 115, 170, 115);

		$this->pdf->SetXY(25,120);
		$this->pdf->Cell(15, 8, 'FECHA INICIO:', 0, 'L');
		$this->pdf->Line(55, 125, 90, 125);


		$this->pdf->SetXY(110,120);
		$this->pdf->Cell(15, 8, 'FECHA FINAL:', 0, 'L');
		$this->pdf->Line(140, 125, 170, 125);

 
		//LICENCIATURA  //CARGO   //CÓDIGO POSTAL
		$this->pdf->SetXY(25, 129);
		$this->pdf->Cell(10, 8, 'CATEGORIA:', 0, 'L');
		$this->pdf->Line(27, 143, 65, 143);
		//*****
		$this->pdf->SetXY(75, 129);
		$this->pdf->Cell(10, 8, 'TURNO:', 0, 'L');
		$this->pdf->Line(75, 143, 105, 143);
		//*****
		$this->pdf->SetXY(125, 129);
		$this->pdf->Cell(10, 8, utf8_decode('NOMBRE DEL CURSO:'), 0, 'L');
		$this->pdf->Line(120, 143, 170, 143);

		$this->pdf->SetXY(25, 150);
		$this->pdf->Cell(20, 8, 'NOMBRE(S) DEL PADRE O TUTOR:', 0, 'L');
		$this->pdf->Line(26, 165, 80, 165);
		//*****
		$this->pdf->SetXY(25,170);
		$this->pdf->Cell(19, 8, 'APELLIDOS DEL PADRE O TUTOR:', 0, 'L');
		$this->pdf->Line(26, 185, 150, 185);

		$this->pdf->SetXY(110, 150);
		$this->pdf->Cell(10, 8, utf8_decode('CI DEL PADRE/TUTOR:'), 0, 'L');
		$this->pdf->Line(110, 165, 150, 165);
		

		$this->pdf->SetXY(30, 200);
		$this->pdf->Cell(10, 8, utf8_decode('-LA INCRIPCION ESTA REALIZADA PAGANDO EL MONTO DE:'), 0, 'L');
		$this->pdf->SetXY(30, 210);
		$this->pdf->Cell(10, 8, utf8_decode('-SE RECOMIENDA PUNTUALIDAD EN LOS ENTRENAMIENTOS DE FUTBOL.'), 0, 'L');
		$this->pdf->SetXY(30, 220);
		$this->pdf->Cell(10, 8, utf8_decode('-DISIPLINA Y BUENA CONDUCTA HACEN A UN BUEN DEPORTISTA BIENVENIDO.'), 0, 'L');


		$this->pdf->SetXY(33, 255);
		$this->pdf->Cell(10, 8, 'FIRMA DEL ADMINISTRADOR:', 0, 'L');
		$this->pdf->Line(110, 254.5, 150, 254.5);

		$this->pdf->SetXY(110, 255);
		$this->pdf->Cell(10, 8, 'FIRMA DEL PADRE O TUTOR:', 0, 'L');
		$this->pdf->Line(34, 254.5, 74, 254.5);



		$misCoordenadas = array(
                        array('x' => 165, 'y' => 58), //Fecha
                        array('x' => 54, 'y' => 78), //Nombre
                        array('x' => 54, 'y' => 98), //Apellidos
                        array('x' => 37, 'y' => 118), //DNI
                        array('x' => 137, 'y' => 118), //Teléfono
                        array('x' => 29, 'y' => 148), //Licenciatura
                        array('x' => 77, 'y' => 148), //Cargo
                        array('x' => 135, 'y' => 148) //Código postal
                  );


		$num=1;
		foreach ($lista as $row) {
			$date = fechaAhora();
			$nombresJugador=$row->nombresJugador;
			$apellidoPaternoJugador=$row->apellidoPaternoJugador;
			$apellidoMaternoJugador=$row->apellidoMaternoJugador;
			$ciJugador=$row->ciJugador;
			$telefono=$row->telefono;
			$fechaInscripcionI=$row->fechaInscripcionI;
			$fechaInscripcionF=$row->fechaInscripcionF;
			$categoria=$row->categoria;
			$turno=$row->turno;
			$nombreCurso=$row->nombreCurso;

			$nombres=$row->nombres;
			$apellidoPaterno=$row->apellidoPaterno;
			$apellidoMaterno=$row->apellidoMaterno;
			$ci=$row->ci;


			$this->pdf->SetXY(165, 61);
			$this->pdf->Cell(50,5,$date,'',0,'L',0);
			$this->pdf->SetXY(54, 90);
			$this->pdf->Cell(50,5,$nombresJugador,'',0,'L',0);
			$this->pdf->SetXY(54, 101);
			$this->pdf->Cell(40,5,$apellidoPaternoJugador,'',0,'L',0);
			$this->pdf->SetXY(70, 101);
			$this->pdf->Cell(40,5,$apellidoMaternoJugador,'',0,'L',0);
			$this->pdf->SetXY(45, 110.5);
			$this->pdf->Cell(25,5,$ciJugador,'',0,'L',0);
			$this->pdf->SetXY(137, 110.5);
			$this->pdf->Cell(25,5,$telefono,'',0,'L',0);
			$this->pdf->SetXY(63, 120);
			$this->pdf->Cell(25,5,$fechaInscripcionI,'',0,'L',0);
			$this->pdf->SetXY(146, 120);
			$this->pdf->Cell(25,5,$fechaInscripcionF,'',0,'L',0);
			$this->pdf->SetXY(34, 138);
			$this->pdf->Cell(25,5,$categoria,'',0,'L',0);
			$this->pdf->SetXY(80, 138);
			$this->pdf->Cell(25,5,$turno,'',0,'L',0);
			$this->pdf->SetXY(135, 138);
			$this->pdf->Cell(25,5,$nombreCurso,'',0,'L',0);
			$this->pdf->Ln(5);

			$this->pdf->SetXY(30, 160);
			$this->pdf->Cell(50,5,$nombres,'',0,'L',0);
			$this->pdf->SetXY(30, 180);
			$this->pdf->Cell(40,5,$apellidoPaterno,'',0,'L',0);
			$this->pdf->SetXY(55, 180);
			$this->pdf->Cell(40,5,$apellidoMaterno,'',0,'L',0);
			$this->pdf->SetXY(120, 160);
			$this->pdf->Cell(40,5,$ci,'',0,'L',0);
			$num++;
		}
 

		$this->pdf->Output('RegistroJugador'.$ciJugador.'.pdf','I');
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


		$this->pdf->Output('listadeusuario.pdf','I');
	}






	public function inscrito()
	{
		$idjugador=$_POST['idinscri'];
		$data['inscripcion']=$_POST['habili'];
		$lista=$this->usuario_model->modificarUsuario($idjugador,$data);
		
		redirect('jugador/listaInscripcion','refresh');
	}



	public function agregarJug()
	{
		$lista=$this->padre_model->recuperarPadres();
		$data['padres']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('jug_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarJugEntr()
	{
		$lista=$this->padre_model->recuperarPadres();
		$data['padres']=$lista;


		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menuEntrenador.php');
		$this->load->view('jug_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function pagoVista()
	{
		$idjugador=$_POST['idjugador'];
		$data['inscritos']=$this->jugador_model->obtenerInscripcion($idjugador);
		
		
		$this->load->view('inc_headCalendarioInscripcion');
		$this->load->view('inc_menu');
		$this->load->view('v_calendarioInscripcion',$data);
		$this->load->view('inc_footerCalendario');
		
	}





	public function agregarJugador()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombresJugador']=$_POST['nombres'];
		$data['apellidoPaternoJugador']=$_POST['apellidoPaterno'];
		$data['apellidoMaternoJugador']=$_POST['apellidoMaterno'];
		$data['ciJugador']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['direc']=$_POST['direc'];
		$data['sexo']=$_POST['sexo'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['idRegistro']=$registro;
		$data['usuario_idusuario']=$_POST['padre'];
		$lista=$this->jugador_model->agregarJugador($data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
	}

	public function listaJugador()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->jugador_model->lista();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_lista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaJugadorEntr()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->jugador_model->lista();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_listaEntr',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function listaInscripcion()
	{

		
		$lista=$this->jugador_model->listaCompleta();
		$data['jugadores']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_Inscripcion',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function agregarInscripcion()
	{
		$registro=$_SESSION['idusuario'];
		$data['fechaInscripcionI']=$_POST['fechaInicial'];
		$data['fechaInscripcionF']=$_POST['fechaFinal'];
		$data['costoDeInscripcion']=$_POST['pago'];
		$data['idcursos']=$_POST['curso'];
		$data['idjugador']=$_POST['idjugador'];
		$data['idtutor']=$_POST['idtutor'];
		$data['idRegistro']=$registro;
		$idjuga=$_POST['idinscrip'];
		$data2['inscripcion']=$_POST['desabilitar'];
		$lista=$this->curso_model->inscripcion($data);
		$lista=$this->jugador_model->modificarJugador($idjuga,$data2);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
	}




	public function registrarInscripcion()
	{
		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);
		$data2['cursos']=$this->curso_model->lista();
			
		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_regisInscrip2',$data); 
		$this->load->view('jug_regisInscrip',$data2);
		$this->load->view('inc_footer.php'); //archivos del footer
	}




	public function modificarJug()
	{
		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}

	public function modificarJugEntre()
	{
		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarJugador()
	{
		$idjugador=$_POST['idjugador'];
		$data['nombresJugador']=$_POST['nombres'];
		$data['apellidoPaternoJugador']=$_POST['apellidoPaterno'];
		$data['apellidoMaternoJugador']=$_POST['apellidoMaterno'];
		$data['ciJugador']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
		$data['direc']=$_POST['direc'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$lista=$this->jugador_model->modificarJugador($idjugador,$data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
		
	}


	public function desabilitarJug()
	{

		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('jug_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitarJug()
	{

		$idjugador=$_POST['idjugador'];
		$data['infojugador']=$this->jugador_model->recuperarJugador($idjugador);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('jug_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	
public function modificarJugDoH()
	{
		$idjugador=$_POST['idjugador'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->jugador_model->modificarJugador($idjugador,$data);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaJugador','refresh');
		}
		else
		{
			redirect('jugador/listaJugadorEntr','refresh');
		}
	}

public function imprimirJugadores()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

public function imprimirJugadoresEntre()
	{

	$lista=$this->jugador_model->lista();
	$data['jugadores']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_mostrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


}
