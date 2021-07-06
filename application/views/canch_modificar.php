<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infocancha->result() as $row) 	
 {
 	echo form_open_multipart('cancha/modificarbd');
 ?>

<input type="hidden" name="idFutbol" value="<?php echo $row->idFutbol;?>">


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre;?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingrese turno</label>
    <input type="text" class="form-control" name="turno" value="<?php echo $row->turno;?>">
  </div>
 

  <button type="submit" class="btn btn-primary">Modificar Cancha de Futbol</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>