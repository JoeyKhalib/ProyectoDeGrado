<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
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
                <h3 class="card-title">Lista de los usuarios</h3>
              </div>




                 


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Cedula De Identidad</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Telefono</th>

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
                     <td><?php echo $row->ci;?></td>
                    <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo $row->rol;?></td>
                    <td><?php echo $row->telefono;?></td>
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
                    <th>Cedula De Identidad</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Telefono</th>

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



