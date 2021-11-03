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
                      <td><?php echo $row->horaInicial;?> <?php echo $row->horaFinal;?></td>
                      <td><?php echo $row->nombre;?></td>
                      <td><?php echo $row->ubicacion;?></td>

                   



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
