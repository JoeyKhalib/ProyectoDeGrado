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
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 <?php
                        $foto=$row->foto;
                        if ($foto=="") {
                          //mostrar una imagen por defecto
                           ?> 
                           <img src="<?php echo base_url(); ?>uploads/usuariosFotos/perfil.jpg"  class="img-circle img-fluid">  
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <img src="<?php echo base_url(); ?>uploads/usuariosFotos/<?php echo $foto;?>"  class="img-circle img-fluid">     
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



       <div class="col-md-9 ">
            <div class="card">
            <div class="card-header bg-dark">
            <h3 class="card-title">Datos del Usuario</h3>
            </div>

            <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="nombres" value="<?php echo $row->nombres;?>"readonly>
                  </div>

                  <div class="row">
    <div class="col">
     <label for="exampleInputEmail1">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoMaterno" value="<?php echo $row->apellidoPaterno;?>"readonly>
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoPaterno" value="<?php echo $row->apellidoMaterno;?>"readonly>
    </div>
                   </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $row->email;?>"readonly>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                    <input type="date" class="form-control" value="<?php echo $row->fechaNacimiento;?>"readonly>
                  </div>

                </div>
                <!-- /.card-body -->

      
              </form>



          </div>

<?php 
echo form_close(); 
}
?>


      </div><!-- /.container-fluid -->











        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>