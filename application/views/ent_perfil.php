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
                           <img src="<?php echo base_url(); ?>uploads/usuarios/perfil.jpg"  class="img-circle img-fluid">  
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <img src="<?php echo base_url(); ?>uploads/usuarios/<?php echo $foto;?>"  class="img-circle img-fluid">     
                            <?php
                        }
                      ?> 
                </div>

                <h3 class="profile-username text-center"><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></h3>


                <p class="text-muted text-center"><?php echo $row->nombreRol;?></p>



  <?php 
          echo form_open_multipart('entrenador/logout');
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

               


                 <!--<strong><i class="fas fa-pencil-alt mr-1"></i> Carnet</strong>

               <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p> -->

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



          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active"  href="#activity" data-toggle="tab">Notificaciones</a></li>
                  <li class="nav-item">


                    <a type="hidden" class="nav-link" href="#settings" data-toggle="tab">Configuracion</a>


                  </li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                   
   


                    <!-- /.post -->

                    <!-- Post -->

                    <!-- /.post -->

                    <!-- Post -->
                   
                    <!-- /.post -->
                  </div>
                 
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nombre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Primer Apellido">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Usuario">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName2" placeholder="Contraseña">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName2" placeholder="fecha de nacimiento">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Carnet de Identidad</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputName2" placeholder="Carnet">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Numero de Referencia</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputSkills" placeholder="Telefono/Celular">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>