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
    $this->load->view('inc_headEquipoConEstilo.php'); 
    $this->load->view('inc_menu.php'); 
    $this->load->view('equi_crear'); 
    $this->load->view('inc_footerEquipo.php'); 
  }



  public function prueba()
  {

    $this->load->view('inc_headEquipoConEstilo.php'); 
    $this->load->view('inc_menu.php'); 
    $this->load->view('equi_prueba'); //contenido
    $this->load->view('inc_footerEquipo.php'); //archivos del footer
  }


}
