<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Modificaciones,Eliminacion de los usuarios</h3>
              </div>



                 


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Telefono</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Habilitar</th>
                    <th>Perfil</th>
                    <th>Subir</th>
                  </tr>
                  </thead>
                  <tbody>

<?php 
$indice=1;
foreach ($usuarios->result() as $row) {
 ?>


                  <tr>
                    <td><?php echo $indice;?></td>
                    <td><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></td>
                    <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo $row->rol;?></td>
                    <td><?php echo $row->telefono;?></td>
                    <td>
        <?php 
          echo form_open_multipart('usuario/modificar');
        ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
        <button type="submit" class="btn btn-primary btn-xs">Modificar</button>         
    <?php 
          echo form_close();
         ?>
      </td>
      <td>
        <?php 
          echo form_open_multipart('usuario/eliminarbd');
        ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
        <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
    <?php 
          echo form_close();
         ?>
      </td>
                  <td>
                       <?php     
          echo form_open_multipart('usuario/habilitar');
        ?>
                    <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
                    <button type="submit" class="btn btn-primary btn-xs" >Habilitar</button>
                  
                <?php 
                        echo form_close();
                       ?>

                       <?php     
          echo form_open_multipart('usuario/desabilitar');
        ?>
                        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
                        <button type="submit" class="btn btn-primary btn-xs" >Desabilitar</button>
                        <?php 
                        echo form_close();
                       ?>
                 </td>

                  <td>

                    <?php
                        $foto=$row->foto;
                        if ($foto=="") {
                          //mostrar una imagen por defecto
                           ?> 
                           <img width="100" src="<?php echo base_url(); ?>uploads/usuarios/perfil.jpg">
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                            <img width="100" src="<?php echo base_url(); ?>uploads/usuarios/<?php echo $foto; ?>">
                            <?php
                        }


                      ?> 
                    </td>


                  <td>
                      <?php 
          echo form_open_multipart('usuario/subirfoto');
        ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
        <button type="submit" class="btn btn-primary btn-xs">Subir</button>
                      <?php 
                        echo form_close();
                       ?>

                 </td>

                  </tr>

<?php
 $indice++;
}
 ?>




           
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Telefono</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Habilitar</th>
                    <th>Perfil</th>
                    <th>Subir</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



