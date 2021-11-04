<div class="content-wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php 
foreach ($infousuario->result() as $row)   
 {
  echo form_open_multipart('usuario/modificarbd');
 ?>

<input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">

<br>
<div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">MODIFICACION DE DATOS </h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombres" value="<?php echo $row->nombres;?>">
                  </div>

 <div class="form-row">
    <div class="col">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoPaterno" value="<?php echo $row->apellidoPaterno;?>">
    </div>
    <div class="col">
       <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" name="apellidoMaterno" value="<?php echo $row->apellidoMaterno;?>">
    </div>
  </div>



     <div class="form-row">
    <div class="col">
      <label for="">Ingrese Carnet de Identidad</label>
      <input type="number" class="form-control" name="ci" value="<?php echo $row->ci;?>">
    </div>
    <div class="col">
       <label for="">Telefono/Celular</label>
      <input type="tel" class="form-control" name="telefono" value="<?php echo $row->telefono;?>">
    </div>
  </div>
                        
            <div class="form-group">
                <label for="">Email</label>
               <input type="email"class="form-control" name="email"  aria-describedby="helpId" value="<?php echo $row->email;?>">
                  </div>


<?php 

$rol=$row->rol_idrol;
 ?>
<?php if ($rol==1): ?>
  
    <div class="form-group">
    <label for="rol_idrol">Seleccione el Rol</label>
    <select class="form-control" name="rol_idrol">
    <option selected="true" value="1">Administrador</option>
    <option value="2">Entrenador</option>
    <option value="3">Invitado</option>
    <option value="4">Padre</option>
    </select>

  </div>

<?php endif ?>

<?php if ($rol==2): ?>
  
    <div class="form-group">
    <label for="rol_idrol">Seleccione el Rol</label>
    <select class="form-control" name="rol_idrol">
    <option value="1">Administrador</option>
    <option selected="true" value="2">Entrenador</option>
    <option value="3">Invitado</option>
    <option value="4">Padre</option>
    </select>

  </div>

<?php endif ?>

<?php if ($rol==3): ?>
  
    <div class="form-group">
    <label for="rol_idrol">Seleccione el Rol</label>
    <select class="form-control" name="rol_idrol">
    <option value="1">Administrador</option>
    <option value="2">Entrenador</option>
    <option selected="true" value="3">Invitado</option>
    <option value="4">Padre</option>
    </select>

  </div>

<?php endif ?>

<?php if ($rol==4): ?>
  
    <div class="form-group">
    <label for="rol_idrol">Seleccione el Rol</label>
    <select class="form-control" name="rol_idrol">
    <option selected="true" value="1">Administrador</option>
    <option value="2">Entrenador</option>
    <option value="3">Invitado</option>
    <option selected="true" value="4">Padre</option>
    </select>

  </div>

<?php endif ?>


  


              <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $row->fechaNacimiento;?>">
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