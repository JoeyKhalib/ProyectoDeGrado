<div class="content-wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php 
foreach ($infojugador->result() as $row)   
 {
  echo form_open_multipart('jugador/modificarJugador');
 ?>

<input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">

<br>
<div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">MODIFICACION DE JUGADOR</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombres" value="<?php echo $row->nombresJugador;?>">
                  </div>

 <div class="form-row">
    <div class="col">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoPaterno" value="<?php echo $row->apellidoPaternoJugador;?>">
    </div>
    <div class="col">
       <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoMaterno" value="<?php echo $row->apellidoMaternoJugador;?>">
    </div>
  </div>



     <div class="form-row">
    <div class="col">
      <label for="">Ingrese Carnet de Identidad</label>
      <input type="number" class="form-control" name="ci" value="<?php echo $row->ciJugador;?>">
    </div>
    <div class="col">
       <label for="">Telefono/Celular</label>
      <input type="tel" class="form-control" name="telefono" value="<?php echo $row->telefono;?>">
    </div>
  </div>
             



            <div class="form-group">
                <label for="">Direccion</label>
               <input type="text"class="form-control" name="direc"  aria-describedby="helpId" value="<?php echo $row->direc;?>">
                  </div>




              <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $row->fechaNacimiento;?>">
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Modificar</button>
             
                </div>
            </div>

<?php 
echo form_close(); 
}
?>

     </div>
  </div>
</div>
</div>