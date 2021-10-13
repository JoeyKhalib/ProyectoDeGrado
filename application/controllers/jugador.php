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
	
		$this->pdf->SetFont('Arial','', 8);
		$this->pdf->SetXY(145,60);
		$this->pdf->Cell(15, 8, 'FECHA:', 0, 'L');
		$this->pdf->Line(163, 65.5, 185, 65.5);
 
		//Nombre //Apellidos //DNI //TELEFONO
		$this->pdf->SetXY(25, 80);
		$this->pdf->Cell(20, 8, 'NOMBRE(S):', 0, 'L');
		$this->pdf->Line(52, 85.5, 120, 85.5);
		//*****
		$this->pdf->SetXY(25,100);
		$this->pdf->Cell(19, 8, 'APELLIDOS:', 0, 'L');
		$this->pdf->Line(52, 105.5, 180, 105.5);
		//*****
		$this->pdf->SetXY(25, 120);
		$this->pdf->Cell(10, 8, 'CI', 0, 'L');
		$this->pdf->Line(35, 125.5, 90, 125.5);
		//*****
		$this->pdf->SetXY(110, 120);
		$this->pdf->Cell(10, 8, utf8_decode('TELÉFONO:'), 0, 'L');
		$this->pdf->Line(135, 125.5, 170, 125.5);
 
		//LICENCIATURA  //CARGO   //CÓDIGO POSTAL
		$this->pdf->SetXY(25, 140);
		$this->pdf->Cell(10, 8, 'LINCECIATURA EN:', 0, 'L');
		$this->pdf->Line(27, 154, 65, 154);
		//*****
		$this->pdf->SetXY(80, 140);
		$this->pdf->Cell(10, 8, 'CARGO:', 0, 'L');
		$this->pdf->Line(75, 154, 105, 154);
		//*****
		$this->pdf->SetXY(125, 140);
		$this->pdf->Cell(10, 8, utf8_decode('CÓDIGO POSTAL:'), 0, 'L');
		$this->pdf->Line(120, 154, 170, 154);

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

			$this->pdf->SetXY(165, 61);
			$this->pdf->Cell(50,5,$date,'',0,'L',0);
			$this->pdf->SetXY(54, 81);
			$this->pdf->Cell(50,5,$nombresJugador,'',0,'L',0);
			$this->pdf->SetXY(54, 101);
			$this->pdf->Cell(40,5,$apellidoPaternoJugador,'',0,'L',0);
			$this->pdf->SetXY(70, 101);
			$this->pdf->Cell(40,5,$apellidoMaternoJugador,'',0,'L',0);
			$this->pdf->SetXY(37, 121);
			$this->pdf->Cell(25,5,$ciJugador,'',0,'L',0);
			$this->pdf->SetXY(137, 121);
			$this->pdf->Cell(25,5,$telefono,'',0,'L',0);
			$this->pdf->Ln(5);
			$num++;
		}
 

		$this->pdf->Output('RegistroJugador.pdf','D');
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
		$this->load->view('inc_headCalendarioInscripcion',$idjugador);
		$this->load->view('inc_menu');
		$this->load->view('v_calendario');
		$this->load->view('inc_footerCalendario');

	}

	public function getEventos()
  	{

   		$lista=$this->jugador_model->obtenerInscripcion();
   		echo json_encode($lista);


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
		$lista=$this->curso_model->inscripcion($data);
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
