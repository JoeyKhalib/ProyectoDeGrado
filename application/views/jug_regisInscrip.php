

          <div class="col " >
            <div class="card">
              <!-- /.card-header -->
              

<div class="card-header bg-warning">
                <h3 class="card-title ">Llene los siguientes datos</h3>
              </div>
<div class="card-body">


                  <div class="form-group">


    <label for="curso">Cursos disponibles:</label>

    <select class="form-control" name="curso">
<?php 
$indice=1;
foreach ($cursos->result() as $row) {
 ?>
      <option value="<?php echo $row->idcursos;?>"><?php echo $row->nombreCurso;?></option>
  <?php
 $indice++;
}
 ?>
    </select>
<div class="form-row">
<div class="col">
    <label for="exampleInputEmail1" class="form-label">Fecha de Incripcion Inicial</label>
    <input type="date" class="form-control" name="fechaInicial" >
  </div>
  <div class="col">
    <label for="exampleInputEmail1" class="form-label">Fecha de Incripcion Final</label>
    <input type="date" class="form-control" name="fechaFinal" >
  </div>
   </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pago del Curso:</label>
                    <input type="number" class="form-control" name="pago"  >
                  </div>


                <div class="card-footer">



          <button type="submit" class="btn btn-info">REGISTRAR INSCRIPCION</button>
  

                </div>



                </div>

                <?php 
echo form_close();
?>



                <!-- /.card-body -->

            </div>
          </div>
       </div>
    </div>


