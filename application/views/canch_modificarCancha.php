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


<div class="card-body">

<?php 
foreach ($infocancha->result() as $row)   
 {
  echo form_open_multipart('cancha/modificarCancha');
 ?>

<div class="form-row">
                  <div class="col">
                    <label for="">Nombre de la Cancha</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre;?>">
                  </div>

 </div>

<br>

 <div class="form-row">
    <div class="col">
      <label for="">Ubicacion</label>
      <input type="text" class="form-control" name="ubicacion" value="<?php echo $row->ubicacion;?>">
    </div>
    <div class="col">
       <label for="">Numero de Referencia</label>
      <input type="number" class="form-control" name="numero" value="<?php echo $row->numero;?>">
    </div>
  </div>


<br>

<div class="form-row">
    <div class="col">
      <label for="">Email(opcional)</label>
      <input type="email" class="form-control" name="email" value="<?php echo $row->email;?>">
    </div>
  </div>



                <div class="card-footer">
                  <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
                  <button type="submit" class="btn btn-dark">Registrar</button>
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
</div>