<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-4">
            <h1>Inscripciones</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="container-fluid content-row">
          <div class="col" >
            <div class="card">
              <!-- /.card-header -->
              

<div class="card-header bg-success">
                <h3 class="card-title">Datos del Jugador:</h3>
              </div>

 <?php 
  echo form_open_multipart('jugador/agregarInscripcion');
 ?>


<div class="card-body">

<?php 
foreach ($infojugador->result() as $row)   
 {
 ?>





  <div class="form-row">
    <div class="col">
      <label for="">Nombre Completo:</label>
       <input type="text" class="form-control" name="nombres" value="<?php echo $row->nombresJugador;?> <?php echo $row->apellidoPaternoJugador;?> <?php echo $row->apellidoMaternoJugador;?>" disabled>
    </div>
     <div class="col">

       <?php
          $fotoJugador=$row->fotoJugador;
             if ($fotoJugador=="") {
                //mostrar una imagen por defecto
                   ?> 
                   <img src="<?php echo base_url(); ?>uploads/jugadores/perfil.jpg" class="img-fluid img-thumbnail rounded float-center" style="height:180px;">  
                   <?php
                    }
              else {
                          //mostrar la foto del usuario
                   ?> 
                  <img src="<?php echo base_url(); ?>uploads/jugadores/<?php echo $fotoJugador;?>" class="img-fluid img-thumbnail rounded float-center" style="height:180px;">     
                     <?php
                   }
                ?> 



       
    </div>

  </div>


                  <div class="form-row">
                  <div class="col">
                    <label for="exampleInputEmail1">Cedula del Jugador:</label>
                    <input type="number" class="form-control" name="ci" value="<?php echo $row->ciJugador;?>" disabled>
                  </div>
                  <div class="col">
                    <label for="exampleInputPassword1">Direccion:</label>
                    <input type="text" class="form-control" name="nombreTutor" value="<?php echo $row->direc;?>" disabled>
                  </div>
                  </div>
                  <div class="form-row">
                  <div class="col">
                    <label for="exampleInputEmail1">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" value="<?php echo $row->telefono;?>" disabled>
                  </div>
                  <div class="col">
                    <label for="exampleInputPassword1">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="nombreTutor" value="<?php echo $row->fechaNacimiento;?>" disabled>
                  </div>
                  </div>

                  <input type="hidden" name="idtutor" value="<?php echo $row->usuario_idusuario;?>">
                  <input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">
                  <input type="hidden" name="idinscrip" value="<?php echo $row->idjugador;?>">
                  <input type="hidden" name="desabilitar" value="<?php echo '1';?>">




<?php 
}
?>


                </div>
                <!-- /.card-body -->

            </div>



              <!-- /.card-body -->
            </div>
            <!-- /.card -->