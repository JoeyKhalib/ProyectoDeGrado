<div class="content-wrapper">
  <div class="container">
    <div class="row">
     <div class="col-md-12">


<?php 
foreach ($infoevento->result() as $row)   
 {
  echo form_open_multipart('evento/modificarEvento');
 ?>

<br>
<div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">MODIFICACION DE EVENTOS</h3>
              </div>
                <div class="card-body">




<input type="hidden" name="idevento" value="<?php echo $row->idevento;?>">
<div class="form-group">
                <label for="inputName">Nombre del Evento/Anuncio</label>
                <input type="text" id="inputName" name="nombreEvento" class="form-control" value="<?php echo $row->nombreEvento;?>">
              </div>
              <div class="form-row">
                 <div class="col">
                <label for="inputName">Lugar del Evento</label>
                <input type="text" id="inputName" name="lugar" class="form-control" value="<?php echo $row->lugar;?>">
                </div>
                <div class="col">
                <label for="inputName">Hora del Evento</label>
                <input type="time" id="inputName" name="horaEvento" class="form-control" value="<?php echo $row->horaEvento;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripcion:</label>
                <textarea id="inputDescription" name="descripcion" class="form-control" rows="4"><?php echo $row->descripcion;?></textarea>

              </div>
              <div class="form-group">
                <label for="inputStatus">Tipo</label>
                <select id="inputStatus"  name="titulo" class="form-control custom-select" value="<?php echo $row->titulo;?>">
                  <option selected disabled>Seleccione Uno</option>
                  <option>Comunicado</option>
                  <option>Invitacion</option>
                  <option>Solicitud</option>
                  <option>Reunion</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Fecha de Evento</label>
                <input type="date"  name="fecha"  class="form-control" value="<?php echo $row->fecha;?>">
              </div>
              <div class="form-group">
                <label for="inputStatus">Destinado</label>
                <select id="destinatario"  name="destinatario" class="form-control custom-select">
                  <option selected disabled>Destinado</option>
                  <option value="1">Administrador</option>
                  <option value="2">Entrenador</option>
                  <option value="3">Invitado</option>
                  <option value="4">Padre</option>
                </select>
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