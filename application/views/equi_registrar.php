<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

 <div class="card card-light">

<br>

              <div class="card-header">
                <h3 class="card-title">SELECCIONE LA CATEGORIA PARA CREAR UN EQUIPO DE FUTBOL</h3>
              </div>







<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">CATEGORIAS:</h5>
        <div class="row">


<?php 
$indice=1;
foreach ($categorias->result() as $row) {
 ?>



            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url(); ?>imagenes/Portadas/<?php echo $row->foto;?>" alt="card image"></p>
                                    <h4 class="card-title"><?php echo $row->nombreCategoria;?></h4>
                                    <p class="card-text">Seccion habilitada para poder crear un equipo de futbol.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">DESCRIPCION:</h4>
                                    <p class="card-text"><?php echo $row->descripcion;?></p>
                                    <ul class="list-inline">
                       <?php     
                         echo form_open_multipart('equipo/crearEquipo');
                       ?>
                                      <input type="hidden" name="idCategoria" value="<?php echo $row->idCategoria;?>">
                                      <button  class="btn btn-succes btn-sm btn-primary ">Crear Equipo <i class="fas fa-arrow-circle-right"></i></button>

                       <?php 
                        echo form_close();
                       ?>

                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->



<?php
 $indice++;
}
 ?>



  
 



      </div>
  </div>
</div>
</div>
</div>



