<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">



    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Creacion de un nuevo evento:</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>





  <section class="content">
      <div class="row">
        <div class="col">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Evento</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>




            <div class="card-body">
              <?php 
  echo form_open_multipart('evento/agregarEvento');
 ?>

              <div class="form-group">
                <label for="inputName">Nombre del Evento/Anuncio</label>
                <input type="text" id="inputName" name="nombreEvento" class="form-control">
              </div>
              <div class="form-row">
                 <div class="col">
                <label for="inputName">Lugar del Evento</label>
                <input type="text" id="inputName" name="lugar" class="form-control">
                </div>
                <div class="col">
                <label for="inputName">Hora del Evento</label>
                <input type="time" id="inputName" name="horaEvento" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripcion:</label>
                <textarea id="inputDescription" name="descripcion" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Tipo</label>
                <select id="inputStatus"  name="titulo" class="form-control custom-select">
                  <option selected disabled>Seleccione Uno</option>
                  <option>Comunicado</option>
                  <option>Invitacion</option>
                  <option>Solicitud</option>
                  <option>Reunion</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Fecha de Evento</label>
                <input type="date"  name="fecha"  class="form-control">
              </div>
  <div class="form-group">
    <label for="destinatario">Destinado:</label>

    <select class="form-control" name="destinatario">
<?php 
$indice=1;
foreach ($destinatarios->result() as $row) {
 ?>
      <option value="<?php echo $indice;?>"><?php echo $row->nombreRol;?></option>
  <?php
 $indice++;
}
 ?>
    </select>
  </div>




            </div>

<div class="row-center">
        <div class="col-12">
          <a href="#" class="btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-dark float-right">Crear Evento</button>
        </div>
      </div>

 <?php 
echo form_close();
?>


           
      
    </section>



      </div>
  </div>
</div>
</div>
