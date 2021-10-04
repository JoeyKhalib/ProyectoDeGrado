<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario  extends CI_Controller {


public function index()
{
$this->load->view('inc_headCalendario');
$this->load->view('inc_menu');
$this->load->view('v_calendario');
$this->load->view('inc_footerCalendario');
}

    public function getEventos()
  {
    $lista=$this->calendario_model->listandoEventos();
    echo json_encode($lista);

  }



}
