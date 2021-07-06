<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 

 	echo form_open_multipart('cancha/agregarbd');
 ?>




  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre de la cancha de futbol">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Agregar turno de la cancha</label>
    <input type="text" class="form-control" name="turno" placeholder="Ingrese Turno">
  </div>
  
  

  <button type="submit" class="btn btn-primary">Agregar</button>


<?php 
echo form_close();
?>


  	</div>
  </div>
</div>