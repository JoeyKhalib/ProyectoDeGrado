<div class="container">
  <div class="row">
    <div class="col-md-12">
     

        <?php 
          echo form_open_multipart('usuario/agregar');
        ?>
        <button type="submit" class="btn btn-success btn-xs">Agregar Usuario</button>
          <?php 
          echo form_close();
         ?>




<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Carnet</th>
      <th scope="col">Liga</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>


<?php 
$indice=1;
foreach ($usuarios->result() as $row) {
 ?>
 <tr>
      <th scope="row"><?php echo $indice;?></th>
      <td><?php echo $row->nombre;?></td>
      <td><?php echo $row->ApellidoPaterno;?></td>
      <td><?php echo $row->ApellidoMaterno;?></td>
      <td><?php echo $row->carnet;?></td>
      <td><?php echo $row->liga;?></td>
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
</table>

  </div>
  </div>
</div>
