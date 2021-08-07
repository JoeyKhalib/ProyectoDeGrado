 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE USUARIOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

 <?php 
  echo form_open_multipart('usuario/agregarbd');
 ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombreCompleto" placeholder="Ingrese su nombre completo">
                  </div>

  <div class="form-group">
    <label for="rol">Seleccione el Rol</label>
    <select class="form-control" name="rol">
      <option>Usuario</option>
      <option>Administrador</option>
      <option>Entrenador</option>
      <option>Padre</option>
    </select>
  </div>

     <div class="form-check">
                    <label for="">Sexo:</label>
                    <br>
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sexo" id="sexo" value="H" checked>
                  Hombre
                  <br>
                  <input type="radio" class="form-check-input" name="sexo" id="sexo" value="M" checked>
                  Mujer
                  </label>
                </div>

            <div class="form-group">
                <label for="">Email</label>
               <input type="email"class="form-control" name="email"  aria-describedby="helpId" placeholder="">
                  </div>



  <div class="form-row">
    <div class="col">
      <label for="">Nombre Usuario</label>
      <input type="text" class="form-control" name="nombreUsuario" placeholder="Usuario">
    </div>
    <div class="col">
       <label for="">Contraseña</label>
      <input type="password" class="form-control" name="password" placeholder="password">
    </div>
  </div>


              <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" placeholder="Fecha de Nacimiento">
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

                <?php 
echo form_close();
?>

            </div>
