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



		public function listaJInscritos()
	{
		//en este caso test es nuestra ventana principal
		$idcursos=$_POST['idcursos'];
		$lista=$this->curso_model->listaInscritos($idcursos);
		$data['todinscritos']=$lista;
		
		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('cur_inscritos',$data); //contenido
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
		$data['cupos']=$_POST['cupos'];
		$data['turno']=$_POST['turno'];
		$data['descripcion']=$_POST['descripcion'];
		$data['Categoria_idCategoria']=$_POST['categoria'];
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
		$config['upload_path']="./uploads/cursosFotos/";
		//configurar el nombre del archivo
		$config['file_name']=$nombrearchivo;
		//remplazar los archivos
		$direccion="./uploads/cursosFotos/".$nombrearchivo;
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
		
			redirect('cursos/listaCursos','refresh');

	}



	public function reporteCursos()
	{

		$totalCursos=$this->curso_model->totalCursos();
		$totalCurAct=$this->curso_model->totalCurHab();
		$totalCurDesc=$this->curso_model->totalCurDes();
		$cursosCategoria1=$this->curso_model->categoriaInf();
		$cursosCategoria2=$this->curso_model->categoriaPre();
		$cursosCategoria3=$this->curso_model->categoriaAdo();
		$cursosCategoria4=$this->curso_model->categoriaAdul();

		$totalCursos=$totalCursos->result();
		$totalCurAct=$totalCurAct->result();
		$totalCurDesc=$totalCurDesc->result();

		$cursosCategoria1=$cursosCategoria1->result();
		$cursosCategoria2=$cursosCategoria2->result();
		$cursosCategoria3=$cursosCategoria3->result();
		$cursosCategoria4=$cursosCategoria4->result();


		$lista=$this->curso_model->listaCompletaCursos();
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Cursos");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'REPORTE DE CURSOS','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'NOMBRE DEL CURSO','TBLR',0,'L',0);
		$this->pdf->Cell(30,5,'HORA INGRESO','TBLR',0,'L',0);
		$this->pdf->Cell(30,5,'HORA SALIDA','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'CUPOS','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'TURNO','TBLR',0,'L',0);
		$this->pdf->Cell(30,5,'CATEGORIA','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombreCurso=$row->nombreCurso;
			$horaIngreso=$row->horaIngreso;
			$horaSalida=$row->horaSalida;
			$cupos=$row->cupos;
			$turno=$row->turno;
			$nombreCategoria=$row->nombreCategoria;
			$estado=$row->estado;
			//$inscripcion=$row->inscripcion;
			//$fechaNacimiento=$row->fechaNacimiento;
			//$edad=edad($fechaNacimiento);

			$this->pdf->SetFillColor(245,30,30);

			if ($estado==1) {
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$nombreCurso,'TBLR',0,'L',0);
			$this->pdf->Cell(30,5,$horaIngreso,'TBLR',0,'L',0);
			$this->pdf->Cell(30,5,$horaSalida,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$cupos,'TBLR',0,'L',0);
			$this->pdf->Cell(20,5,$turno,'TBLR',0,'L',0);
			$this->pdf->Cell(30,5,$nombreCategoria,'TBLR',0,'L',0);


			$this->pdf->Ln(5);
			$num++;
			}
			else
			{
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$nombreCurso,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$horaIngreso,'TBLR',0,'L',1);
			$this->pdf->Cell(40,5,$horaSalida,'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,$cupos,'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,$turno,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$nombreCategoria,'TBLR',0,'L',1);
			$this->pdf->Ln(5);
			$num++;
			}


			
		}

			$this->pdf->Ln(10);
			$this->pdf->Cell(60,5,'TOTAL DE CURSOS ACTIVOS:','TBLR',0,'C',0);
			$this->pdf->Cell(60,5,'TOTAL DE CURSOS NO ACTIVOS:','TBLR',0,'C',0);
			$this->pdf->Cell(60,5,'TOTAL DE CURSOS:','TBLR',0,'C',0);
			$this->pdf->Ln(5);



		
		foreach ($totalCurAct as $row) {
			$habilitados=$row->habilitados;
			
			$this->pdf->Cell(60,5,$habilitados,'TBLR',0,'C',0);
		}
		foreach ($totalCurDesc as $row) {
			$desabilitados=$row->desabilitados;
			$this->pdf->Cell(60,5,$desabilitados,'TBLR',0,'C',0);
		}

		foreach ($totalCursos as $row) {
			$total=$row->total;
			$this->pdf->Cell(60,5,$total,'TBLR',0,'C',0);
		}



			$this->pdf->Ln(10);
			$this->pdf->Cell(73,5,'CATEGORIA INFANTIL:','TBLR',0,'C',0);
			$this->pdf->Cell(73,5,'CATEGORIA PRE-ADOLECENTE:','TBLR',0,'C',0);
			$this->pdf->Ln(5);
		foreach ($cursosCategoria1 as $row) {
			$infantiles=$row->infantiles;
			
			$this->pdf->Cell(73,5,$infantiles,'TBLR',0,'C',0);
		}
		foreach ($cursosCategoria2 as $row) {
			$preadolecentes=$row->preadolecentes;
			
			$this->pdf->Cell(73,5,$preadolecentes,'TBLR',0,'C',0);
		}



			$this->pdf->Ln(10);
			$this->pdf->Cell(73,5,'CATEGORIA ADOLECENTE:','TBLR',0,'C',0);
			$this->pdf->Cell(73,5,'CATEGORIA MAYORES','TBLR',0,'C',0);
			$this->pdf->Ln(5);

		
	
		foreach ($cursosCategoria3 as $row) {
			$adolecentes=$row->adolecentes;
			$this->pdf->Cell(73,5,$adolecentes,'TBLR',0,'C',0);
		}
		foreach ($cursosCategoria4 as $row) {
			$adultos=$row->adultos;

			
			$this->pdf->Cell(73,5,$adultos,'TBLR',0,'C',0);


		}



		
		$this->pdf->Ln(16);
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'C',0);


		$this->pdf->Output('ListadeJugadores.pdf','I');
	}



		public function listaJugcurso()
	{
		$idcursos=$_POST['idcursos'];
		$lista=$this->curso_model->listaInscritos($idcursos);
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista De Jugadores");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'Jugadores Lista','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,5,'No.','TBLR',0,'L',0);
		$this->pdf->Cell(40,5,'NOMBRE COMPLETO','TBLR',0,'L',0);
		$this->pdf->Cell(25,5,'CI','TBLR',0,'L',0);
		$this->pdf->Cell(15,5,'EDAD','TBLR',0,'L',0);
		$this->pdf->Cell(30,5,'TELEFONO','TBLR',0,'L',0);
		$this->pdf->Cell(50,5,'DIRECCION','TBLR',0,'L',0);
		$this->pdf->Ln(5);

		$this->pdf->SetFont('Arial','B',8);
		$num=1;
		foreach ($lista as $row) {
			$nombresJugador=$row->nombresJugador;
			$apellidoPaternoJugador=$row->apellidoPaternoJugador;
			$apellidoMaternoJugador=$row->apellidoMaternoJugador;
			$ciJugador=$row->ciJugador;
			$fechaNacimiento=$row->fechaNacimiento;
			$telefono=$row->telefono;
			$direc=$row->direc;
			$estado=$row->estado;
			//$inscripcion=$row->inscripcion;
			//$fechaNacimiento=$row->fechaNacimiento;
			//$edad=edad($fechaNacimiento);

			$this->pdf->SetFillColor(245,30,30);

			if ($estado==1) {
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(40,5,$nombresJugador.' '.$apellidoPaternoJugador.' '. $apellidoMaternoJugador,'TBLR',0,'L',0);
			$this->pdf->Cell(25,5,$ciJugador,'TBLR',0,'L',0);
			$this->pdf->Cell(15,5,edad($fechaNacimiento),'TBLR',0,'L',0);
			$this->pdf->Cell(30,5,$telefono,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$direc,'TBLR',0,'L',0);



			$this->pdf->Ln(5);
			$num++;
			}
			else
			{
			$this->pdf->Cell(10,5,$num,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$nombreCurso,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$horaIngreso,'TBLR',0,'L',1);
			$this->pdf->Cell(40,5,$horaSalida,'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,$cupos,'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,$turno,'TBLR',0,'L',1);
			$this->pdf->Cell(30,5,$nombreCategoria,'TBLR',0,'L',1);
			$this->pdf->Ln(5);
			$num++;
			}

			
		}

		
	


		
		$this->pdf->Ln(16);
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(42,5,'FIRMA DEL ADMINISTRADOR','T',0,'C',0);


		$this->pdf->Output('Lista de Jugadores.pdf','I');
	}




}
