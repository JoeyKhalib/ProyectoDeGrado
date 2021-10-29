<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

<br>

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE CANCHAS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('cancha/agregarCanchas');
 ?>

<div class="card-body">


<div class="form-row">
                  <div class="col">
                    <label for="">Nombre de la Cancha</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre de la cancha">
                  </div>

 </div>

<br>

 <div class="form-row">
    <div class="col">
      <label for="">Ubicacion</label>
      <input type="text" class="form-control" name="ubicacion" placeholder="Ubicacion de la cancha de futbol">
    </div>
    <div class="col">
       <label for="">Numero de Referencia</label>
      <input type="number" class="form-control" name="numero" placeholder="Numero de referencia">
    </div>
  </div>


<br>

<div class="form-row">
    <div class="col">
      <label for="">Email(opcional)</label>
      <input type="email" class="form-control" name="email" placeholder="Email de la cancha">
    </div>
    <div class="col">
      <label for="">Descripcion</label>
      <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de la cancha">
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