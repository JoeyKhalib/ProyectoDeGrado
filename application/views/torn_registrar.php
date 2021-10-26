<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

<br>

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE TORNEOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('torneo/agregarTorneo');
 ?>

<div class="card-body">


<div class="form-row">
                  <div class="col">
                    <label for="">Nombre del Torneo</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del Torneo">
                  </div>

 </div>

<br>

 <div class="form-row">
    <div class="col">
      <label for="">Fecha de Torneo</label>
      <input type="date" class="form-control" name="fechaTorneo" placeholder="Fecha del Torneo">
    </div>
    <div class="col">
       <label for="">Hora de Torneo</label>
      <input type="time" class="form-control" name="horaTorneo" placeholder="Hora del Torneo">
    </div>
  </div>


<br>

<div class="form-row">
    <div class="col">
      <label for="">Premios del ganador del torneo</label>
      <input type="text" class="form-control" name="premio" placeholder="Premios del Torneo">
    </div>
    <div class="col">
       <label for="">Total de Equipos</label>
      <input type="number" class="form-control" name="totalEquipos" placeholder="Total de Equipos">
    </div>
  </div>

  <div class="form-group">
    <label for="entrenador">Seleccione Entrenador a Cargo</label>

    <select class="form-control select2" name="entrenador">
      <option selected disabled="true">Entrenador encargado del torneo</option>
<?php 
$indice=1;
foreach ($entrenadores->result() as $row) {
 ?>
      <option value="<?php echo $row->idusuario;?>"><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></option>
  <?php
 $indice++;
}
 ?>
    </select>
  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Registrar</button>
                </div>
               
                 
 </div>
                <?php 
echo form_close();
?>

      </div>
  </div>
</div>
</div>
</div>