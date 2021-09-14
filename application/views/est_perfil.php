    <div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Bienvenido/a <font size="4"> - Usted a ingresado al sistema de nuestra escuela de futbol.</font></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


<?php 
foreach ($infousuario->result() as $row)   
 {
 ?>


            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                  <div class="text-center">
                         <?php
                        $foto=$row->foto;
                        if ($foto=="") {
                          //mostrar una imagen por defecto
                           ?> 
                           <img src="<?php echo base_url(); ?>uploads/usuarios/perfil.jpg" alt="user-avatar" class="img-circle img-fluid">  
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <img src="<?php echo base_url(); ?>uploads/usuarios/<?php echo $foto;?>" alt="user-avatar" class="img-circle img-fluid">     
                            <?php
                        }
                      ?> 
                  
                </div> 



                <h3 class="profile-username text-center"><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></h3>



                <p class="text-muted text-center"><?php echo $row->nombreRol;?></p>

    



  <?php 
          echo form_open_multipart('usuario/logout');
          ?>

         <button type="submit" class="btn btn-primary btn-danger">Salir</button>
        
          <?php 
          echo form_close();
         ?>








              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Datos del Perfil</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone-alt mr-1"></i>Telefono/Celular</strong>

                <p class="text-muted">
                 <?php echo $row->telefono;?>
                </p>

                <hr>

               <!-- <strong><i class="fas fa-map-marker-alt mr-1"></i> localidad</strong>

                <p class="text-muted"><?php echo $row->nacionalidad;?></p>-->


                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Carnet</strong>

                <p class="text-muted"><?php echo $row->ci;?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

<?php 
echo form_close(); 
}
?>




          <div class="col-md-9 ">
            <?php 
foreach ($infousuario->result() as $row)   
 {
  echo form_open_multipart('usuario/modificarUsuariobd');
 ?>
 <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">

            <div class="card">
              <div class="card-header p-2 ">
                <ul class="nav nav-pills ">


                  <li  class="nav-item "><a class="nav-link active " href="#activity" data-toggle="tab">Notificaciones</a></li>
                  <li  class="nav-item">


                    <a  type="hidden" class="nav-link " href="#settings" data-toggle="tab">Configuracion</a>


                  </li>
                  
                </ul>
              </div><!-- /.card-header -->



              <div class="card-body ">
                <div class="tab-content ">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                   
   


                    <!-- /.post -->

                    <!-- Post -->

                    <!-- /.post -->

                    <!-- Post -->
                   
                    <!-- /.post -->
                  </div>



                 
                  <div class="tab-pane " id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row ">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" name="nombres" class="form-control"  value="<?php echo $row->nombres;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="apellidoPaterno" value="<?php echo $row->apellidoPaterno;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Apellido Materno</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="apellidoMaterno" value="<?php echo $row->apellidoMaterno;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email"  value="<?php echo $row->email;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $row->nombreUsuario;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password"  value="<?php echo $row->password;?>">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $row->fechaNacimiento;?>">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Carnet de Identidad</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="ci"  value="<?php echo $row->ci;?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Numero de Referencia</label>
                        <div class="col-sm-10">
                          <input type="number" name="telefono" class="form-control"   value="<?php echo $row->telefono;?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->

<?php 
echo form_close(); 
}
?>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
