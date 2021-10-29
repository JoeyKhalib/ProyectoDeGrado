<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE RESERVA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('invitado/agregarReserva');
 ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Total de Jugadores que entran en la Cancha</label>
                    <input type="number" class="form-control" name="totalJugadores" placeholder="Ingrese un numero aproximado">
                  </div>

<div class="col">
      <label for="">Fecha de Reserva</label>
      <input type="date" class="form-control" name="fechaReserva">
    </div>

 <div class="form-row">
    <div class="col">
       <label for="">Hora de Inicio</label>
      <input type="time" class="form-control" name="horaInicial" >
    </div>
    <div class="col">
       <label for="">Hora de Final</label>
      <input type="time" class="form-control" name="horaFinal" >
    </div>
  </div>






    