<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">





<div class="row row-cols-1 row-cols-md-3 g-4">

<?php 
$indice=1;
foreach ($todoscursos->result() as $row) {
 ?>


  <div class="col">
   <div class="card" >
   <!--<img src="..." class="card-img-top" alt="...">-->
  <div class="card-body">
    <h5 class="card-title"><?php echo $row->nombreCurso;?></h5>
    <p class="card-text"><?php echo $row->descripcion;?></p>
   <div class="d-grid gap-2 d-md-block">
    <?php 
          echo form_open_multipart('cursos/modificarCur');
        ?>
        <input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
  <button class="btn btn-primary" type="submit" >Editar</button>
  <?php 
          echo form_close();
         ?>
          <?php 
          echo form_open_multipart('cursos/desabilitarCur');
        ?>
        <input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
  <button class="btn btn-danger" type="submit">Eliminar</button>
      <?php 
         echo form_close();
         ?>
</div>
  </div>
</div>
  </div>





<?php
 $indice++;
}
 ?>

</div>











              </div>
         </div>
     </div>
   </div>
              







