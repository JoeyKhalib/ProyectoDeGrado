<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">


<div class="card">
              <div class="card-header">
                <h3 class="card-title">Modificaciones,Eliminacion de Jugadores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Cedula de Identidad</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                  </tr>
                  </thead>
                  <tbody>
    
<?php 
$indice=1;
foreach ($jugadores->result() as $row) {
 ?>



                  <tr>
                    <td><?php echo $indice;?></td>
                    <td><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></td>
                    <td><?php echo $row->ci;?></td>
                     <td><?php echo $row->edad;?></td>
                    <td><?php echo $row->telefono;?></td>
                    <td><?php echo $row->direc;?></td>
                     
                     <td class="project-actions text-right">



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
          echo form_open_multipart('jugador/desabilitarJug');
        ?>
        <input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">
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
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Cedula de Identidad</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                  </tr>       
                  </tfoot>
                       </table>
              </div>


              </div>
              </div>
              </div>
              </div>
              </div>
              







