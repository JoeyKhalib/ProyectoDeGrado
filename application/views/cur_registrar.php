<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">





 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE CURSOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('cursos/agregarCurso');
 ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombres del Curso</label>
                    <input type="text" class="form-control" name="nombreCurso" >
                  </div>



 <div class="form-row">
    <div class="col">
      <label for="">Hora de Ingreso</label>
      <input type="time" class="form-control" name="horaIngreso">
    </div>
    <div class="col">
       <label for="">Hora de Salida</label>
      <input type="time" class="form-control" name="horaSalida" >
    </div>
  </div>


 <div class="form-group">
    <label for="categoria">Seleccione la Categoria del Curso</label>

    <select class="form-control" name="categoria">
<?php 
$indice=1;
foreach ($categorias->result() as $row) {
 ?>
      <option value="<?php echo $row->idCategoria;?>"><?php echo $row->nombreCategoria;?></option>
  <?php
 $indice++;
}
 ?>
    </select>
  </div>


          <h5 >Rango del Curso:</h5>
          <div class="form-row">
                    <div class="col">
                    <label for="">Edad Inicial</label>
                    <input type="number" class="form-control" name="inicial" >
                  </div>
                  <div class="col">
                    <label for="">Edad Final</label>
                    <input type="number" class="form-control" name="final" >
                  </div>
                  </div>




<div class="form-row">
    <div class="col">
      <label for="">Ingrese el total de cupos</label>
      <input type="number" class="form-control" name="cupos" >
    </div>
      <div class="col">
    <label for="rol">Seleccione el turno</label>
    <select class="form-control" name="turno">
      <option>Dia</option>
      <option>Tarde</option>
       <option>Noche</option>
    </select>
  </div>
  </div>



   <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripcion del Curso</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
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


