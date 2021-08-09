<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php 
foreach ($infousuario->result() as $row)   
 {
  echo form_open_multipart('usuario/modificarbd');
 ?>

<input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE USUARIOS</h3>
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



  <div class="form-group">
    <label for="rol">Seleccione el Rol</label>
    <select class="form-control" name="rol" value="<?php echo $row->rol;?>">
      <option>Usuario</option>
      <option>Administrador</option>
      <option>Entrenador</option>
      <option>Padre</option>
    </select>
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



  <div class="form-row">
    <div class="col">
      <label for="">Nombre Usuario</label>
      <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $row->nombreUsuario;?>">
    </div>
    <div class="col">
       <label for="">Contraseña</label>
      <input type="password" class="form-control" name="password" value="<?php echo $row->password;?>">
    </div>
  </div>


              <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $row->fechaNacimiento;?>">
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
