<div class="content-wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php 
foreach ($infotorneo->result() as $row)   
 {
  echo form_open_multipart('torneo/modificarTorneo');
 ?>

<input type="hidden" name="idtorneo" value="<?php echo $row->idtorneo;?>">

<br>
<div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">MODIFICACION DE TORNEO</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre del Torneo</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre;?>">
                  </div>

<div class="form-row">
    <div class="col">
      <label for="">Fecha de Torneo</label>
      <input type="date" class="form-control" name="fechaTorneo"value="<?php echo $row->fechaTorneo;?>">
    </div>
    <div class="col">
       <label for="">Hora de Torneo</label>
      <input type="time" class="form-control" name="horaTorneo" value="<?php echo $row->horaTorneo;?>">
    </div>
  </div>

<div class="form-row">
    <div class="col">
      <label for="">Premios del ganador del torneo</label>
      <input type="text" class="form-control" name="premio" value="<?php echo $row->premio;?>">
    </div>
    <div class="col">
       <label for="">Total de Equipos</label>
      <input type="number" class="form-control" name="totalEquipos" value="<?php echo $row->totalEquipos;?>">
    </div>
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
</div>