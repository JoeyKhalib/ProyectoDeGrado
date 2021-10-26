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


		$this->load->view('inc_headEquipo.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('torn_registrar',$data); //contenido
		$this->load->view('inc_footerEquipo.php'); //archivos del footer
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



	public function listadoEquiposTor()
	{


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('torn_equipos'); //contenido
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



	public function reporteTorneo()
	{
		/*
		$totalEventos=$this->evento_model->totalEventos();
		$totalEventosAct=$this->evento_model->totalEvenHab();
		$totalEventosDesc=$this->evento_model->totalEvenDes();
		$reunion=$this->evento_model->categoriaReunion();
		$invitacion=$this->evento_model->categoriaInvitacion();
		$comunicado=$this->evento_model->categoriaComunicado();
		$solicitud=$this->evento_model->categoriaSolicitud();

		$totalEventos=$totalEventos->result();
		$totalEventosAct=$totalEventosAct->result();
		$totalEventosDesc=$totalEventosDesc->result();

		$reunion=$reunion->result();
		$invitacion=$invitacion->result();
		$comunicado=$comunicado->result();
		$solicitud=$solicitud->result();

*/
		$lista=$this->torneo_model->listaCompletaTorneo();
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Torneo");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'REPORTE DE TORNEOS','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);


		$this->pdf->SetFont('Arial','B',8);
		$num=1;


		foreach ($lista as $row) {
			$nombre=$row->nombre;
			$premio=$row->premio;
			$horaTorneo=$row->horaTorneo;
			$fechaTorneo=$row->fechaTorneo;
			$totalEquipos=$row->totalEquipos;
			$estado=$row->estado;

			if ($estado==1) {
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(180,5,'','T',0,'L',0);
		$this->pdf->Ln(3);
		$this->pdf->Cell(75,5,$num,'',0,'L',0);
		$this->pdf->Cell(40,5,$nombre,'',0,'C',0);
		$this->pdf->Ln(8);
		$this->pdf->Cell(150,5,$premio,'',0,'L',0);
		$this->pdf->Cell(30,5,$fechaTorneo,'',0,'L',0);
		$this->pdf->Ln(8);
		$this->pdf->SetFont('Arial','', 10);
		$this->pdf->MultiCell(180,5,'El Torneo '.$nombre.' iniciara a las '.hora($horaTorneo).' la fecha '.$fechaTorneo.' el numero de equipos que se admitiran '.$totalEquipos.' con los siguientes premios: '.$premio, 0, 'C',0);

		$this->pdf->Ln(10);
			$num++;
			}
			else
			{
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(180,5,'','T',0,'L',1);
		$this->pdf->Ln(3);
		$this->pdf->Cell(75,5,$num,'',0,'L',1);
		$this->pdf->Cell(40,5,$nombre,'',0,'C',1);
		$this->pdf->Ln(8);
		$this->pdf->Cell(150,5,$premio,'',0,'L',1);
		$this->pdf->Cell(30,5,$fechaTorneo,'',0,'L',1);
		$this->pdf->Ln(8);
		$this->pdf->SetFont('Arial','', 10);
		$this->pdf->MultiCell(180,5,$horaTorneo, 0, 'C',1);
			$num++;
			}
}




		$this->pdf->Output('listadetorneos.pdf','I');
	}






}
