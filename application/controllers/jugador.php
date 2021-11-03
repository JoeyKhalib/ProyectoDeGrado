<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->jugador_model->obtenerTodas();
		$lista=$lista->result();



		foreach ($lista as $row) {
			
			$final=$row->end;
			$idjugador=$row->id;
			$idtutor=$row->idp;

		if ($final<=fechaAhora()) {
		$data['estado']='0';
		$data2['inscripcion']='0';
		$lista=$this->jugador_model->eliminarInscripcion($idjugador);
		//$lista=$this->jugador_model->modificarInscripcion($idjugador,$data);
		$lista2=$this->jugador_model->modificarJugador($idjugador,$data2);
		}

		}

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_options'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function opcionesEntrenador()
	{
		$lista=$this->jugador_model->obtenerTodas();
		$lista=$lista->result();



		foreach ($lista as $row) {
			
			$final=$row->end;
			$idjugador=$row->id;
			$idtutor=$row->idp;

		if ($final<=fechaAhora()) {
		$data['estado']='0';
		$data2['inscripcion']='0';
		$lista=$this->jugador_model->eliminarInscripcion($idjugador);
		//$lista=$this->jugador_model->modificarInscripcion($idjugador,$data);
		$lista2=$this->jugador_model->modificarJugador($idjugador,$data2);
		}

		}

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
			$nombreCategoria=$row->nombreCategoria;
			$turno=$row->turno;
			$nombreCurso=$row->nombreCurso;

			$nombres=$row->nombres;
			$apellidoPaterno=$row->apellidoPaterno;
			$apellidoMaterno=$row->apellidoMaterno;
			$ci=$row->ci;

			$costoDeInscripcion=$row->costoDeInscripcion;

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
			$this->pdf->Cell(25,5,$nombreCategoria,'',0,'L',0);
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

			$this->pdf->SetFont('Arial','', 12);
			$this->pdf->SetXY(115, 200);
			$this->pdf->Cell(10, 8,$costoDeInscripcion, 0, 'L');



			$num++;
		}
 

		$this->pdf->Output('RegistroJugador.pdf','I');
	}



	

	public function reporteJugador()
	{

		$totalJugadores=$this->jugador_model->totalJugadores();
		$totalAct=$this->jugador_model->totalHabJugadores();
		$totalDes=$this->jugador_model->totalDesJugadores();
		$jugadoresInsc=$this->jugador_model->totalInscritos();
		$jugadoresNoInsc=$this->jugador_model->totalNoInscritos();

		$totalJugadores=$totalJugadores->result();
		$totalAct=$totalAct->result();
		$totalDes=$totalDes->result();
		$jugadoresInsc=$jugadoresInsc->result();
		$jugadoresNoInsc=$jugadoresNoInsc->result();


		$lista=$this->jugador_model->listaCompletaJugadores();
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Jugadores");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'REPORTE DE JUGADORES','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(50,5,'NOMBRES COMPLETO','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'CI','TBLR',0,'L',0);
		$this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',0);
		$this->pdf->Cell(45,5,'ESTADO DE INCRIPCION','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'EDAD','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombresJugador=$row->nombresJugador;
			$apellidoPaternoJugador=$row->apellidoPaternoJugador;
			$apellidoMaternoJugador=$row->apellidoMaternoJugador;
			$ciJugador=$row->ciJugador;
			$telefono=$row->telefono;
			$estado=$row->estado;
			$inscripcion=$row->inscripcion;
			$fechaNacimiento=$row->fechaNacimiento;
			$edad=edad($fechaNacimiento);

			$this->pdf->SetFillColor(190,190,190);

			if ($estado==1) {
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$nombresJugador.' '.$apellidoPaternoJugador.' '.$apellidoMaternoJugador,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$ciJugador,'TBLR',0,'L',0);
			//$this->pdf->Cell(40,5,$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',0);
			if ($inscripcion==1) {
			$this->pdf->Cell(45,5,'Jugador Inscrito','TBLR',0,'L',0);
			}
			else
			{
			$this->pdf->Cell(45,5,'Jugador No Inscrito','TBLR',0,'L',0);
			}

			$this->pdf->Cell(20,5,$edad,'TBLR',0,'L',0);


			$this->pdf->Ln(5);
			$num++;
			}
			else
			{
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',1);
			$this->pdf->Cell(50,5,$nombresJugador.' '.$apellidoPaternoJugador.' '.$apellidoMaternoJugador,'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,$ciJugador,'TBLR',0,'L',1);
			//$this->pdf->Cell(40,5,$apellidoMaterno,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',1);

			if ($inscripcion==1) {
			$this->pdf->Cell(45,5,'Jugador Inscrito','TBLR',0,'L',1);
			}
			else
			{
			$this->pdf->Cell(45,5,'Jugador No Inscrito','TBLR',0,'L',1);
			}
			$this->pdf->Cell(20,5,$edad,'TBLR',0,'L',1);

			$this->pdf->Ln(5);
			$num++;
			}


			
		}
			$this->pdf->SetFillColor(40,167,69);

			$this->pdf->Ln(10);
			$this->pdf->Cell(50,5,'TOTAL DE JUGADORES ACTIVOS:','TBLR',0,'C',1);
			$this->pdf->Cell(60,5,'TOTAL DE JUGADORES NO ACTIVOS:','TBLR',0,'C',1);
			$this->pdf->Cell(40,5,'TOTAL DE JUGADORES:','TBLR',0,'C',1);
			$this->pdf->Ln(5);


			foreach ($totalAct as $row) {
			$habilitados=$row->habilitados;
			$this->pdf->Cell(50,5,$habilitados,'TBLR',0,'C',0);
		}
		foreach ($totalDes as $row) {
			$desabilitados=$row->desabilitados;
			
			$this->pdf->Cell(60,5,$desabilitados,'TBLR',0,'C',0);
		}
				foreach ($totalJugadores as $row) {
			$total=$row->total;
			$this->pdf->Cell(40,5,$total,'TBLR',0,'C',0);
		}


		$this->pdf->Ln(10);
			$this->pdf->Cell(75,5,'JUGADORES INSCRITOS:','TBLR',0,'C',1);
			$this->pdf->Cell(75,5,'JUGADORES NO INSCRITOS:','TBLR',0,'C',1);
			$this->pdf->Ln(5);
		
		foreach ($jugadoresInsc as $row) {
			$inscriptosS=$row->inscriptosS;
			
			$this->pdf->Cell(75,5,$inscriptosS,'TBLR',0,'C',0);
		}
		foreach ($jugadoresNoInsc as $row) {
			$inscriptosN=$row->inscriptosN;
			
			$this->pdf->Cell(75,5,$inscriptosN,'TBLR',0,'C',0);
		}





		
		$this->pdf->Ln(16);
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'C',0);


		$this->pdf->Output('ListadeJugadores.pdf','I');
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


		$this->load->view('inc_headEquipo.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('jug_registrar',$data); //contenido
		$this->load->view('inc_footerEquipo.php'); //archivos del footer
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


		public function listaInscripcionEntre()
	{

		
		$lista=$this->jugador_model->listaCompleta();
		$data['jugadores']=$lista;

		
		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('jug_InscripcionEntre',$data); //contenido
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


		$data3['fechaInscripcionI']=$_POST['fechaInicial'];
		$data3['fechaInscripcionF']=$_POST['fechaFinal'];
		$data3['costoDeInscripcion']=$_POST['pago'];
		$data3['idcursos']=$_POST['curso'];
		$data3['jugador_idjugador']=$_POST['idjugador'];
		$data3['jugador_usuario_idusuario']=$_POST['idtutor'];


		$idjuga=$_POST['idinscrip'];
		$data2['inscripcion']=$_POST['desabilitar'];
		$lista=$this->curso_model->inscripcion($data);
		$lista=$this->jugador_model->agregaHistorial($data3);
		$lista=$this->jugador_model->modificarJugador($idjuga,$data2);
		if ($_SESSION['idusuario']==1) {
			redirect('jugador/listaInscripcion','refresh');
		}
		else
		{
			redirect('jugador/listaInscripcion','refresh');
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

	public function reportesJugadores()
	{

		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");

		if ($this->input->post("buscar")) {
			$historial = $this->jugador_model->getHistorialbyDate($fechainicio,$fechafin);
		}
		else{
			$historial = $this->jugador_model->getHistorial();
		}

		$data = array(
			"historial" => $historial,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('jug_reporte',$data); //contenido 
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



public function listaJugpdf()
	{
		$lista=$this->jugador_model->lista();
		$lista=$lista->result();

		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Jugadores");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'LISTA DE JUGADORES','LTBR',0,'C',1);
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(60,5,'NOMBRE COMPLETO','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'CI','TBLR',0,'L',0);
		$this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'DIRECCION','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'EDAD','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombresJugador=$row->nombresJugador;
			$apellidoPaternoJugador=$row->apellidoPaternoJugador;
			$apellidoMaternoJugador=$row->apellidoMaternoJugador;
			$ciJugador=$row->ciJugador;
			$telefono=$row->telefono;
			$direc=$row->direc;
			$fechaNacimiento=$row->fechaNacimiento;

			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(60,5,$nombresJugador.' '.$apellidoPaternoJugador.' '.$apellidoMaternoJugador,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$ciJugador,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$telefono,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$direc,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,edad($fechaNacimiento),'TBLR',0,'L',0);
			$this->pdf->Ln(5);
			$num++;
		}
		$this->pdf->Ln(15);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'L',0);



		$this->pdf->Output('listadeusuarios.pdf','I');
	}






}
