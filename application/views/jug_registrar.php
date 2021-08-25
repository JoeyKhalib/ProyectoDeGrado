<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE JUGADORES</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('jugador/agregarJugador');
 ?>

<div class="card-body">


<div class="form-row">
                  <div class="col">
                    <label for="">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingrese su nombre">
                  </div>
                  <div class="col">
                    <label for="">Edad</label>
                    <input type="number" class="form-control" name="edad" placeholder="Ingrese su edad">
                  </div>
 </div>

<br>

 <div class="form-row">
    <div class="col">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoPaterno" placeholder="Primer Apellido">
    </div>
    <div class="col">
       <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoMaterno" placeholder="Segundo Apellido">
    </div>
  </div>


<br>

<div class="form-row">
    <div class="col">
      <label for="">Ingrese Carnet de Identidad</label>
      <input type="number" class="form-control" name="ci" placeholder="Carnet de Identidad">
    </div>
    <div class="col">
       <label for="">Telefono/Celular</label>
      <input type="tel" class="form-control" name="telefono" placeholder="Numero de Referencia">
    </div>
  </div>

<br>
     <div class="form-check">
                    <label for="">Sexo:</label>
                    <br>
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sexo" id="sexo" value="H" checked>
                  Hombre
                  <br>
                  <input type="radio" class="form-check-input" name="sexo" id="sexo" value="M" checked>
                  Mujer
                  </label>
                </div>

<br>


  <div class="form-group">
    <label for="">Direccion</label>
    <input class="form-control" name="direc"  placeholder="Direccion donde usted vive"></input>
  </div>






              <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" placeholder="Fecha de Nacimiento">
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
