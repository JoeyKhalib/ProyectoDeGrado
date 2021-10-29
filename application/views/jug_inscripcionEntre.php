<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscripciones</h1>
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

    <!-- Main content -->
    <section class="content">



        <!-- row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de jugadores Inscritos</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr class="bg-success">
                      <th>ID</th>
                      <th>Nombre Jugador</th>
                      <th>CI Jugador</th>
                      <th>Direccion</th>
                      <th>Nombre Padre/Tutor</th>
                      <th>Estatus</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$indice=1;
foreach ($jugadores->result() as $row) {
 ?>



                    <tr >
                      <td><?php echo $indice;?></td>
                      <td><?php echo $row->nombresJugador;?> <?php echo $row->apellidoPaternoJugador;?> <?php echo $row->apellidoMaternoJugador;?></td>
                      <td><?php echo $row->ciJugador;?></td>
                      <td><?php echo $row->direc;?></td>
                      <td><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></td>
                      <td>

                           <?php
                        $inscripcion=$row->inscripcion;
                        if ($inscripcion=="0") {
                          //mostrar una imagen por defecto
                           ?> 
                           <span class="badge badge-danger">NO INSCRITO</span>   
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <span class="badge badge-success">INSCRITO</span>      
                            <?php
                        }
                      ?> 

                           
                            

                      </td>
                      <td class="project-actions text-right">



                       <?php
                       if ($inscripcion=="0") 
                         {
                        ?> 

                         <span class="badge badge-primary">NO VIGENTE</span> 
                           <?php
                        }
                        else {
                          //mostrar la foto del usuario
                            ?> 
                             <span class="badge badge-warning">VIGENTE</span>      
                            <?php
                        }
                      ?> 

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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
    </section>   <!-- /.content -->
</div>