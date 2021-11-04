<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">




              <div class="card-header">
                <h3 class="card-title">Mis reservas</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover ">
                  <thead class="bg-success">
                    <tr>
                      <th>#</th>
                      <th>Fecha Reserva</th>
                      <th>Horas</th>
                      <th>Cancha</th>
                      <th>Ubicacion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

<?php 
$indice=1;
foreach ($reservas->result() as $row) {
 ?>

                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $indice;?></td>
                      <td><?php echo $row->fechaReserva;?></td>
                      <td><?php echo formatearHora($row->horaInicial);?> Hasta <?php echo formatearHora($row->horaFinal);?></td>
                      <td><?php echo $row->nombre;?></td>
                      <td><?php echo $row->ubicacion;?></td>
                      <td>
                        

       <?php     
         echo form_open_multipart('invitado/modificarReserva');
        ?>


                         <input type="hidden" name="idreserva" value="<?php echo $row->idreserva;?>">
                        <button type="submit" class="btn-sm btn-info">
                          </a>
                        <i class="fas fa-pencil-alt"></i>
                         Modificar</button>
        <?php 
          echo form_close();
         ?>



         <?php     
         echo form_open_multipart('invitado/modificarResDoH');
        ?>
                         <input type="hidden" name="idreserva" value="<?php echo $row->idreserva;?>">
                         <input type="hidden" name="desabilitar" value="<?php echo '0';?>">
                        <button type="submit" class="btn-sm btn-danger">
                          </a>
                        <i class="fas fa-trash"></i>
                         Eliminar</button>

            <?php 
          echo form_close();
         ?>




                      </td>

                   



                    </tr>
                    <tr class="expandable-body">
                      <td colspan="5">
                        <p>
                          <?php echo $row->descripcion;?>
                        </p>
                      </td>
<?php
 $indice++;
}
 ?>
              
                  </tbody>
                </table>
              </div>



</div>
</div>
</div>
</div>
