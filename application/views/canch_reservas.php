<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">




              <div class="card-header">
                <h3 class="card-title">Mis reservas</h3>
              </div>
              <!-- ./card-header -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>#</th>
                                    <th>Reservo</th>
                                    <th>Fecha de Reserva</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Final</th>
                                    <th>Telefono</th>
                                    <th>Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($todoreservas)): ?>
                                  <?php $indice=1;?>
                                    <?php foreach($todoreservas as $row):?>
                                        <tr>
                                            <td><?php echo $indice;?></td>
                                            <td><?php echo $row->nombres;?> <?php echo $row->apellidoPaterno;?> <?php echo $row->apellidoMaterno;?></td>
                                            <td><?php echo $row->fechaReserva;?></td>
                                            <td><?php echo formatearHora($row->horaInicial);?></td>
                                            <td><?php echo formatearHora($row->horaFinal);?></td>
                                            <td><?php echo $row->telefono;?></td>
                                            <td>
                                            </td>
                                        </tr>
                                         <?php $indice++;?>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>



</div>
</div>
</div>
</div>





