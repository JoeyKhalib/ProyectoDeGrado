<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">




              <div class="card-header">
                <h3 class="card-title">Lista de Eventos</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover ">
                  <thead class="bg-success">
                    <tr>
                      <th>#</th>
                      <th>Nombre Evento</th>
                      <th>Fecha</th>
                      <th>Titulo</th>
                      <th>Lugar</th>
                    </tr>
                  </thead>
                  <tbody>

<?php 
$indice=1;
foreach ($todoevento->result() as $row) {
 ?>

                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $indice;?></td>
                      <td><?php echo $row->nombreEvento;?></td>
                      <td><?php echo $row->fecha;?></td>
                      <td><?php echo $row->titulo;?></td>
                      <td><?php echo $row->lugar;?></td>

                   



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
