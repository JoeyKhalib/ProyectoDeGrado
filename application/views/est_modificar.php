<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infousuario->result() as $row) 	
 {
 	echo form_open_multipart('usuario/modificarbd');
 ?>

<input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre;?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control" name="ApellidoPaterno" value="<?php echo $row->ApellidoPaterno;?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
    <input type="text" class="form-control" name="ApellidoMaterno" value="<?php echo $row->ApellidoMaterno;?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cedula de Identidad</label>
    <input type="text" class="form-control" name="Cedula" value="<?php echo $row->carnet;?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Liga</label>
    <input type="text" class="form-control" name="Liga" value="<?php echo $row->liga;?>">
  </div>


  <button type="submit" class="btn btn-primary">Modificar</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>