<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">


<div class="container-fluid content-row">
    
       <br>
<section class="content">



      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">

<?php 
$indice=1;
foreach ($todinscritos->result() as $row) {
 ?>

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  JUGADOR
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $row->nombresJugador;?> <?php echo $row->apellidoPaternoJugador;?></b></h2>
                      <p class="text-muted text-sm"><b>CARNET DE IDENTIDAD: </b> <?php echo $row->ciJugador;?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>DIRECCION: <?php echo $row->direc;?></li>
                        <br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>TELEFONO: <?php echo $row->telefono;?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">

                       <?php
                        $fotoJugador=$row->fotoJugador;
                        if ($fotoJugador=="") {
                          //mostrar una imagen por defecto
                           ?> 
                           <img src="<?php echo base_url(); ?>uploads/jugadores/perfil.jpg" alt="user-avatar" class="img-circle img-fluid">  
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <img src="<?php echo base_url(); ?>uploads/jugadores/<?php echo $foto;?>" alt="user-avatar" class="img-circle img-fluid">     
                            <?php
                        }
                      ?> 
                  

                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
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
      <!-- /.card -->
</section>
 </div>
 </div>
 </div>
</div>
