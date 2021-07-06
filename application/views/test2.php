<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reservas de Canchas de los Usuarios</h1>
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
                <h3 class="card-title">Lista de Canchas de futbol que se utilisan para el registro de los usuarios</h3>
              </div>

        <?php 
          echo form_open_multipart('cancha/agregar');
        ?>
                <input type="hidden" name="idUsuario" >
                 <button type="submit" class="btn btn-primary btn-xs">Ingresar Cancha</button>
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
                    <th>Turno</th>
                    <th>Reservado</th>
                  </tr>
                  </thead>
                  <tbody>

<?php 
$indice=1;
foreach ($canchas->result() as $row) {
 ?>


                  <tr>
                    <td><?php echo $indice;?></td>
                    <td><?php echo $row->nombre;?></td>
                    <td><?php echo $row->turno;?></td>
                    <td><?php echo formatearFecha($row->created_at);?></td>
                    <td>
        <?php 
          echo form_open_multipart('cancha/modificar');
        ?>
        <input type="hidden" name="idFutbol" value="<?php echo $row->idFutbol;?>">
        <button type="submit" class="btn btn-primary btn-xs">Modificar</button>
    <?php 
          echo form_close();
         ?>
      </td>
      <td>
        <?php 
          echo form_open_multipart('cancha/eliminarbd');
        ?>
        <input type="hidden" name="idFutbol" value="<?php echo $row->idFutbol;?>">
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
                    <th>turno</th>
                    <th>creado</th>
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
