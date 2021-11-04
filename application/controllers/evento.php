<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {


public function opciones()
	{
		//en este caso test es nuestra ventana principal
		$lista=$this->evento_model->destinados();
		$data['destinatarios']=$lista;

		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_registrar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarE()
	{
		

		$this->load->view('inc_head.php');//archivos cabecera
		$this->load->view('inc_menu.php');
		$this->load->view('cur_registrar'); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}



	public function agregarEvento()
	{
		$registro=$_SESSION['idusuario'];
		$data['nombreEvento']=$_POST['nombreEvento'];
		$data['lugar']=$_POST['lugar'];
		$data['horaEvento']=$_POST['horaEvento'];
		$data['fecha']=$_POST['fecha'];
		$data['descripcion']=$_POST['descripcion'];
		$data['lugar']=$_POST['lugar'];
		$data['rol_idrol']=$_POST['destinatario'];
		$data['titulo']=$_POST['titulo'];
		$data['idRegistro']=$registro;
		$lista=$this->evento_model->agregarEvento($data);

		redirect('','refresh');
	}

	public function listaEventos()
	{
		//en este caso test es nuestra ventana principal
		
		$lista=$this->evento_model->lista();
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_vista',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function listaEventosEntr()
	{
		$rol=$_SESSION['rol_idrol'];
		
		$lista=$this->evento_model->listaEntrenador($rol);
		$data['todoevento']=$lista;


		$this->load->view('inc_head.php'); 
		$this->load->view('inc_menuEntrenador.php'); 
		$this->load->view('evn_vistaEntr',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}


	public function modificarEvn()
	{
		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->evento_model->recuperarEvento($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_modificarPrin',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer

	}


		public function modificarEvento()
	{
		$date = fechaActual();
		$idevento=$_POST['idevento'];
		$data['nombreEvento']=$_POST['nombreEvento'];
		$data['lugar']=$_POST['lugar'];
		$data['horaEvento']=$_POST['horaEvento'];
		$data['descripcion']=$_POST['descripcion'];
		$data['fecha']=$_POST['fecha'];
		$data['rol_idrol']=$_POST['destinatario'];
		$data['fechaActualizacion']=$date;
		$lista=$this->evento_model->modificarEvento($idevento,$data);
		redirect('','refresh');
	}


	public function desabilitarEvento()
	{

		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->evento_model->recuperarEvento($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('evn_desabilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	public function habilitarCur()
	{

		$idevento=$_POST['idevento'];
		$data['infoevento']=$this->curso_model->recuperarCursos($idevento);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('cur_habilitar',$data); //contenido
		$this->load->view('inc_footer.php'); //archivos del footer
	}

	
public function modificarEvnDoH()
	{
		$idevento=$_POST['idevento'];
		$data['estado']=$_POST['desabilitar'];
		$lista=$this->evento_model->modificarEvento($idevento,$data);
		redirect('evento/listaEventos','refresh');
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


	public function reporteEventos()
	{

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


		$lista=$this->evento_model->listaCompletaEventos();
		$lista=$lista->result();



		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de Eventos");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',15);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'REPORTE DE EVENTOS','LTBR',0,'C',1);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial','', 12);
		$this->pdf->MultiCell(178,3,('"PASION POR EL DEPORTE"'), 0, 'C');
		$this->pdf->Ln(20);
		$this->pdf->Image('\Xampp\htdocs\codeignaiter\ProyectoConGIT\application\third_party\fpdf\img\logo.jpg',10,8,33);


		$this->pdf->SetFont('Arial','B',8);
		$num=1;


		foreach ($lista as $row) {
			$nombreEvento=$row->nombreEvento;
			$lugar=$row->lugar;
			$fecha=$row->fecha;
			$descripcion=$row->descripcion;
			$estado=$row->estado;

			if ($estado==1) {
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(180,5,'','T',0,'L',0);
		$this->pdf->Ln(3);
		$this->pdf->Cell(75,5,$num,'',0,'L',0);
		$this->pdf->Cell(40,5,$nombreEvento,'',0,'C',0);
		$this->pdf->Ln(8);
		$this->pdf->Cell(150,5,$lugar,'',0,'L',0);
		$this->pdf->Cell(30,5,$fecha,'',0,'L',0);
		$this->pdf->Ln(8);
		$this->pdf->SetFont('Arial','', 10);
		$this->pdf->MultiCell(180,5,$descripcion, 0, 'C',0);

		$this->pdf->Ln(10);
			$num++;
			}
			else
			{
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(75,5,$num,'',0,'L',1);
		$this->pdf->Cell(40,5,$nombreEvento,'',0,'C',1);
		$this->pdf->Ln(8);
		$this->pdf->Cell(150,5,$lugar,'',0,'L',1);
		$this->pdf->Cell(30,5,$fecha,'',0,'L',1);
		$this->pdf->Ln(8);
		$this->pdf->SetFont('Arial','', 10);
		$this->pdf->MultiCell(180,5,$descripcion, 0, 'C',1);
			$num++;
			}
}




		$this->pdf->Output('listadeeventos.pdf','I');
	}





		public function filtrarEvento()
	{

		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");

		if ($this->input->post("buscar")) {
			$historial = $this->evento_model->getHistorialbyDate($fechainicio,$fechafin);
		}
		else{
			$historial = $this->evento_model->getHistorial();
		}

		$data = array(
			"historial" => $historial,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);

		$this->load->view('inc_head.php'); //archivos cabecera
		$this->load->view('inc_menu.php'); 
		$this->load->view('evn_reporte',$data); //contenido 
		$this->load->view('inc_footerReportes.php'); //archivos del footer
	}


}
