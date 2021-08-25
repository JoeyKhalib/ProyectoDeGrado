<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php 
foreach ($infocurso->result() as $row)   
 {
  echo form_open_multipart('cursos/modificarCursos');
 ?>

<input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MODIFICACION DE CURSOS</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre Curso</label>
                    <input type="text" class="form-control" name="nombreCurso" value="<?php echo $row->nombreCurso;?>">
                  </div>

  <div class="form-row">
    <div class="col">
      <label for="">Hora de Ingreso</label>
      <input type="time" class="form-control" name="horaIngreso"  value="<?php echo $row->horaIngreso;?>">
    </div>
    <div class="col">
       <label for="">Hora de Salida</label>
      <input type="time" class="form-control" name="horaSalida" value="<?php echo $row->horaSalida;?>">
    </div>
  </div>

<div class="form-group">
    <label for="rol">Seleccione la Categoria</label>
    <select class="form-control" name="categoria" value="<?php echo $row->categoria;?>">
      <option>Infatil</option>
      <option>Pre-Adolecente</option>
      <option>Adolecente</option>
      <option>Mayores</option>
    </select>
  </div>


             

<div class="form-row">
    <div class="col">
      <label for="">Ingrese el total de cupos</label>
      <input type="number" class="form-control" name="cupos"  value="<?php echo $row->cupos;?>">
    </div>
      <div class="col">
    <label for="rol">Seleccione el turno</label>
    <select class="form-control" name="turno"  value="<?php echo $row->turno;?>">
      <option>Dia</option>
      <option>Tarde</option>
       <option>Noche</option>
    </select>
  </div>
  </div>



<div class="form-group">
    <label for="exampleFormControlTextarea1">Descripcion del Curso</label>
    <input class="form-control" rows="3" name="descripcion" value="<?php echo $row->descripcion;?>">
  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modificar</button>
             
                </div>
            </div>

<?php 
echo form_close(); 
}
?>

     </div>
  </div>
</div>
