<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Torneos</h1>
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


<table class="table">
  <thead class="bg-success">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Torneo</th>
      <th scope="col">Fecha de Torneo</th>
      <th scope="col">Total Equipos</th>
      <th scope="col">Premios</th>
      <th scope="col">Hora Torneo</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>


<?php 
$indice=1;
foreach ($listatorneos->result() as $row) {
 ?>
 <tr>
      <th scope="row"><?php echo $indice;?></th>
      <td><?php echo $row->nombre;?></td>
      <td><?php echo formatearFecha($row->fechaTorneo);?></td>
      <td><?php echo $row->totalEquipos;?></td>
      <td><?php echo $row->premio;?></td>
      <td><?php echo $row->horaTorneo;?></td>
      <td>
        <?php 
          echo form_open_multipart('torneo/modificarTorn');
        ?>
        <input type="hidden" name="idtorneo" value="<?php echo $row->idtorneo;?>">
        <button type="submit" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt">
                              </i> Modificar</button>
    <?php 
          echo form_close();
         ?>
        <?php 
          echo form_open_multipart('torneo/modificarTorDoH');
        ?>
        <input type="hidden" name="idtorneo" value="<?php echo $row->idtorneo;?>">
        <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
        <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash">
                              </i> Eliminar</button>
    <?php 
          echo form_close();
         ?>

         <?php 
          echo form_open_multipart('torneo/listadoEquiposTor');
        ?>
        <input type="hidden" name="idtorneo" value="<?php echo $row->idtorneo;?>">
        <button type="submit" class="btn btn-warning btn-xs"><i class="fas fa-users">
                              </i> Equipos</button>
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



