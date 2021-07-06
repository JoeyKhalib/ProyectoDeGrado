<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 

 	echo form_open_multipart('usuario/agregarbd');
 ?>




  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Escriba los nombres del usuario">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control" name="ApellidoPaterno" placeholder="Escriba el apellido paterno">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
    <input type="text" class="form-control" name="ApellidoMaterno" placeholder="Escriba el apellido Materno">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cedula de Identidad</label>
    <input type="text" class="form-control" name="Cedula" placeholder="Escriba la Cedula de Identidad">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Liga</label>
    <input type="text" class="form-control" name="Liga" placeholder="Ingrese la liga en la que participa">
  </div>


  <button type="submit" class="btn btn-primary">Agregar</button>


<?php 
echo form_close();
?>


  	</div>
  </div>
</div>