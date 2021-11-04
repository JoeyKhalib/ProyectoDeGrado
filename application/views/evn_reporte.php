<div class="content-wrapper">

<div class="container">
  <div class="row">
    <div class="col-md-12">



    <section class="content-header">
        <h1>
        Reportes Eventos
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                    	<div class="card-body">
                        <div class="form-row">
                            <label for="" class="col control-label">Desde:</label>
                            <div class="col">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                            </div>
                            <label for="" class="col control-label">Hasta:</label>
                            <div class="col">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                            </div>

                        </div>

                          <br>
                            <div class="col-md-6">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url();?>index.php/evento/filtrarEvento" class="btn btn-danger">Restablecer</a>
                            </div>
                         </div>
                    </form>      
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-bordered table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Evento</th>
                                    <th>Ubicacion</th>
                                    <th>Fecha Evento</th>
                                    <th>Hora Evento</th>
                                    <th>Descripcion</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($historial)): ?>
                                	<?php $indice=1;?>
                                    <?php foreach($historial as $historia):?>
                                        <tr>
                                            <td><?php echo $indice;?></td>
                                            <td><?php echo $historia->nombreEvento;?> </td>
                                            <td><?php echo $historia->lugar;?></td>
                                            <td><?php echo $historia->fecha;?></td>
                                            <td></td>
                                            <td><?php echo $historia->descripcion;?></td>
                                        </tr>
                                         <?php $indice++;?>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

                            





<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



       </div>
	 </div>
   </div>
</div>