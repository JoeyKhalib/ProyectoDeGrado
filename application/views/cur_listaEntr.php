<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">


<div class="container-fluid content-row">
    
       


<div class="row row-cols-1 row-cols-md-3 g-4">

<?php 
$indice=1;
foreach ($todoscursos->result() as $row) {
 ?>


  <div class="col">
   <div class="card" >

    <br class="project-actions text-right">

    <?php
        $foto=$row->foto;
          if ($foto=="") {
         //mostrar una imagen por defecto
     ?> 
          <img src="<?php echo base_url(); ?>uploads/cursosFotos/escuelita.jpg" class="card-img-top"  height="200">
     <?php
      }
     else {
         //mostrar la foto del usuario
     ?> 
       <img src="<?php echo base_url(); ?>uploads/cursosFotos/<?php echo $foto; ?>"  height="200">
      <?php
       }
      ?> 

   
  <div class="card-body">
    <h5 class="card-title"><?php echo $row->nombreCurso;?></h5>
    <p class="card-text"><?php echo $row->descripcion;?></p>
    
   <div class="d-grid gap-2 d-md-block ">
    <div class="btn-group">
    <?php 
          echo form_open_multipart('cursos/modificarCurEntr');
        ?>
        <input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
  <button class="btn btn-info btn-sm" type="submit" ><i class="fas fa-pencil-alt">
                              </i> Editar</button>
  <?php 
          echo form_close();
         ?>


          <?php 
          echo form_open_multipart('cursos/modificarCurDoH');
        ?>
        <input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
          <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
  <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash">
                              </i> Eliminar</button>
      <?php 
         echo form_close();
         ?>


           <?php 
  echo form_open_multipart('cursos/listaJInscritos');
 ?>
        <input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
  <button class="btn btn-success btn-sm" type="submit"> <i class="fas fa-users">
                              </i> Jugadores</button>
      <?php 
         echo form_close();
         ?>




         </div>


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
 </div>         







