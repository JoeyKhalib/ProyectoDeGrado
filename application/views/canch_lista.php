<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">


<div class="container-fluid content-row">
    
       <br>


<div class="row row-cols-1 row-cols-md-3 g-4">

<?php 
$indice=1;
foreach ($todoscanchas->result() as $row) {
 ?>


  <div class="col">
   <div class="card" >

    <br class="project-actions text-right">

    <?php
        $foto=$row->foto;
          if ($foto=="") {
         //mostrar una imagen por defecto
     ?> 
          <img src="<?php echo base_url(); ?>uploads/canchaFotos/escuelita.jpg" height="200">
     <?php
      }
     else {
         //mostrar la foto del usuario
     ?> 
       <img src="<?php echo base_url(); ?>uploads/canchaFotos/<?php echo $foto;?>" height="200">
      <?php
       }
      ?> 

   
  <div class="card-body">
    <h2 class="card-title"><?php echo $row->nombre;?></h2>
    <p class="card-text"><mark>DIRECCION: </mark><?php echo $row->ubicacion;?></p>
    <p class="card-text"><mark>NUMERO DE REFERENCIA: </mark><?php echo $row->numero;?></p>
    <p class="card-text"><mark>DESCRIPCION: </mark><?php echo $row->descripcion;?></p>
    
             <?php
                        $estadoCancha=$row->estadoCancha;
                        if ($estadoCancha==0) {
                          //mostrar una imagen por defecto
                           ?> 
                           <div class="text-right">
                           <span class="badge badge-danger">EN MANTENIMIENTO</span>
                           </div>
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                            <div class="text-right">
                             <span class="badge badge-primary">HABILITADO</span>
                             </div>

                                 
                            <?php
                        }
                      ?> 

   <div class="d-grid gap-2 d-md-block ">

    <div class="btn-group">
    <?php 
          echo form_open_multipart('cancha/modificarCa');
        ?>
        <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
  <button class="btn btn-info btn-sm" type="submit" ><i class="fas fa-pencil-alt">
                              </i> Editar</button>
  <?php 
          echo form_close();
         ?>


            <?php 
          if ($estadoCancha==1) {
            ?>
          <?php 
              echo form_open_multipart('cancha/modificarCanDoH');
        ?>
        <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
          <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
  <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash">
                              </i> Deshabilitar</button>
      <?php 
         echo form_close();
         ?>
         <?php 
          }
          else
            {
         ?>

          <?php 
          echo form_open_multipart('cancha/modificarCanDoH');
        ?>
        <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
          <input type="hidden" name="desabilitar" value="<?php echo '1';?>">
  <button class="btn btn-warning btn-sm" type="submit"><i class="fas fa-trash">
                              </i> Habilitar</button>
      <?php 
         echo form_close();
         ?>
         <?php 
}
?>

       


             








 <?php 
  echo form_open_multipart('cancha/subirfotoC');
 ?>
        <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
  <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-folder">
                              </i>Foto</button>
      <?php 
         echo form_close();
         ?>


          <?php 
  echo form_open_multipart('cancha/listaJInscritos');
 ?>
        <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
  <button class="btn btn-success btn-sm" type="submit"> <i class="far fa-address-book">
                              </i> Reservas</button>
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







