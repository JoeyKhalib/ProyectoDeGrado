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
                <h3 class="card-title">Lista de usuarios que tienen acceso al sistema para poder realizar una reserva de
                 una cancha de futbol</h3>
              </div>

        <?php 
          echo form_open_multipart('usuario/agregar');
        ?>
                <input type="hidden" name="idUsuario" >
                 <button type="submit" class="btn btn-primary btn-xs">Ingresar Usuario</button>
        <?php 
          echo form_close();
         ?>
        
                


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Carnet</th>
                    <th>Liga</th>
                    <th>Creado</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                  </tr>
                  </thead>
                  <tbody>

<?php 
$indice=1;
foreach ($usuarios->result() as $row) {
 ?>


                  <tr>
                    <td><?php echo $indice;?></td>
                    <td><?php echo $row->nombre;?></td>
                    <td><?php echo $row->ApellidoPaterno;?></td>
                    <td><?php echo $row->ApellidoMaterno;?></td>
                    <td><?php echo $row->carnet;?></td>
                    <td><?php echo $row->liga;?></td>
                    <td><?php echo formatearFecha($row->created_at);?></td>
                    <td>
        <?php 
          echo form_open_multipart('usuario/modificar');
        ?>
        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
        <button type="submit" class="btn btn-primary btn-xs">Modificar</button>
    <?php 
          echo form_close();
         ?>
      </td>
      <td>
        <?php 
          echo form_open_multipart('usuario/eliminarbd');
        ?>
        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
        <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
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
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Carnet</th>
                    <th>Liga</th>
                    <th>Creado</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
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





