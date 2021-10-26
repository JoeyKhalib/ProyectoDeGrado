<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo  extends CI_Controller {

public function crear()
  {
    //en este caso test es nuestra ventana principal
    $lista=$this->equipo_model->listaCategorias();
	$data['categorias']=$lista;


    $this->load->view('inc_headEquipoConEstilo.php'); 
    $this->load->view('inc_menu.php'); 
    $this->load->view('equi_registrar',$data); //contenido
    $this->load->view('inc_footerEquipo.php'); //archivos del footer
  }

  public function crearEquipo()
  {
  	$idCategoria=$_POST['idCategoria'];
  	$lista=$this->equipo_model->recuperarJugadoresDeCategoria($idCategoria);
	$data['jugadores']=$lista;

    $this->load->view('inc_headEquipoConEstilo.php'); 
    $this->load->view('inc_menu.php'); 
    $this->load->view('equi_crear',$data); 
    $this->load->view('inc_footerEquipo.php'); 
  }


}
