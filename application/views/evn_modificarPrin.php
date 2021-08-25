<div class="container">
  <div class="row">
    <div class="col-md-12">


<?php 
foreach ($infoevento->result() as $row)   
 {
  echo form_open_multipart('evento/modificarEvento');
 ?>


<input type="hidden" name="idevento" value="<?php echo $row->idevento;?>">
<div class="form-group">
                <label for="inputName">Nombre del Evento/Anuncio</label>
                <input type="text" id="inputName" name="nombreEvento" class="form-control" value="<?php echo $row->nombreEvento;?>">
              </div>
              <div class="form-group">
                <label for="inputName">Lugar del Evento</label>
                <input type="text" id="inputName" name="lugar" class="form-control" value="<?php echo $row->lugar;?>">
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripcion:</label>
                <input id="inputDescription" name="descripcion" class="form-control" rows="4" value="<?php echo $row->descripcion;?>">
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
                <label for="inputProjectLeader">Destinado:</label>
                <input type="text" name="destinatario" class="form-control" value="<?php echo $row->destinatario;?>">
              </div>
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
