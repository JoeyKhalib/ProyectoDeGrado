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
      </div>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de usuarios habilitados</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr class="bg-success">
                      <th>ID</th>
                      <th>Perfil</th>
                      <th>Nombre Completo</th>
                      <th>Cedula de Identidad</th>
                      <th>Fecha de Nacimiento</th>
                      <th>Telefono</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$indice=1;
foreach ($usuarios->result() as $row) {
 ?>



                    <tr>
                      <td><?php echo $indice;?></td>
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
                      <td><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></td>
                      <td><?php echo $row->ci;?></td>
                      <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                      <td><?php echo $row->telefono;?></td>
                      <td><?php echo $row->nombreRol;?></td>
                      <td class="project-actions text-right">
 <?php 
          echo form_open_multipart('usuario/modificar');
        ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
        <button type="submit" class="btn btn-info btn-sm btn-primary ">
 <i class="fas fa-pencil-alt">
                              </i>

        Modificar</button>         
    <?php 
          echo form_close();
         ?>




                        <?php     
                         echo form_open_multipart('usuario/modificarbdDoH');
                       ?>
                        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
                        <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
                        
                        <button type="submit" class="btn btn-danger btn-sm btn-primary ">
<i class="fas fa-trash">
                              </i>
                         Desabilitar</button>
                        <?php 
                        echo form_close();
                       ?>






                        <?php 
                echo form_open_multipart('usuario/subirfoto');
                 ?>
               <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
               <button type="submit" class="btn btn-succes btn-sm btn-primary ">
 <i class="far fa-image">
                              </i>

               Subir</button>
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
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>



