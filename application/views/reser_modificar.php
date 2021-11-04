<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE MODIFICACION DE RESERVA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


<?php 
foreach ($inforeserva->result() as $row)   
 {
  echo form_open_multipart('invitado/modificandoReserva');
 ?>


                <div class="card-body">
                  <div class="form-group">
                    <label for="">Total de Jugadores que entran en la Cancha</label>
                    <input type="number" class="form-control" name="totalJugadores" value="<?php echo $row->totalJugadores;?>">
                  </div>

<div class="col">
      <label for="">Fecha de Reserva</label>
      <input type="date" class="form-control" name="fechaReserva" value="<?php echo $row->fechaReserva;?>">
    </div>

 <div class="form-row">
    <div class="col">
       <label for="">Hora de Inicio</label>
      <input type="time" class="form-control" name="horaInicial" value="<?php echo $row->horaInicial;?>">
    </div>
    <div class="col">
       <label for="">Hora de Final</label>
      <input type="time" class="form-control" name="horaFinal" value="<?php echo $row->horaFinal;?>" >
    </div>
  </div>

<div class="form-group">
    

        <div class="form-row">
        <div class="form-row">
          <div class="col">
        <label for="">Descripcion:</label>
        <textarea disabled class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"><?php echo $row->descripcion;?></textarea>
        </div>
        <div class="col">
        
          <img src="<?php echo base_url(); ?>uploads/canchaFotos/<?php echo $row->foto;?>"class="img-thumbnail img-fluid">
        </div>
        </div>
        <div class="col">
        <label for="">Numero de Referencia:</label>
        <input type="number" class="form-control" value="<?php echo $row->numero;?>" disabled>
        </div>
         <div class="col">
        <label for="">Nombre de la cancha</label>
        <input type="text" class="form-control" value="<?php echo $row->nombre;?>" disabled>
        </div>
        </div>
         <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
         <input type="hidden" name="idreserva" value="<?php echo $row->idreserva;?>">
  </div>

             

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Modificar</button>
                </div>
               
                 
 </div>
                <?php 
                }
echo form_close();
?>

      </div>
  </div>
</div>
</div>
</div>




    