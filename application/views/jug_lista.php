<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jugadores</h1>
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

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Modificaciones,Eliminacion de Jugadores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="bg-success">




                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Cedula de Identidad</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
    
<?php 
$indice=1;
foreach ($jugadores->result() as $row) {
 ?>



                  <tr>
                    <td><?php echo $indice;?></td>
                    <td><?php echo $row->nombresJugador;?> <?php echo $row->apellidoPaternoJugador;?> <?php echo $row->apellidoMaternoJugador;?></td>
                    <td><?php echo $row->ciJugador;?></td>
                    <td><?php echo $row->telefono;?></td>
                    <td><?php echo $row->direc;?></td>
                     
                     <td class="project-actions text-right ">



                        <!--  <button class="btn btn-primary btn-sm" href="#" type="submit">
                              <i class="fas fa-folder">
                              </i>
                              Datos
                          </button>-->



<?php 
          echo form_open_multipart('jugador/modificarJug');
        ?>

        <input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">
                          <button class="btn btn-info btn-sm" href="#" type="submit" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </button>

   <?php 
          echo form_close();
         ?>

 <?php     
          echo form_open_multipart('jugador/modificarJugDoH');
        ?>
        <input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">
        <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
                          <button class="btn btn-danger btn-sm" href="#" type="submit" >
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </button>
                      
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
                  <tfoot class="bg-success">
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Cedula de Identidad</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                  </tr>       
                  </tfoot>
                       </table>
              </div>


              </div>
              </div>
              </div>
              </div>
              </div>
              




