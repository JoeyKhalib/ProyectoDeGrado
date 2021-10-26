<div class="content-wrapper">
 <div class="container">
  <div class="row">
    <div class="col-md-12">

 <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE REGISTRO DE EQUIPOS</h3>
              </div>


               <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>LISTA DE JUGADORES DISPONIBLES PARA EL EQUIPO:</label>



                  <select class="duallistbox" multiple="multiple"  name="juga">
<?php 
foreach ($jugadores->result() as $row) {
 ?>


        <option value="<?php echo $row->idjugador;?>"><?php echo $row->nombresJugador;?>  <?php echo $row->apellidoPaternoJugador;?> <?php echo $row->apellidoMaternoJugador;?> <?php echo edad($row->fechaNacimiento);?>;</option>

 <?php
}
 ?>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>



      </div>
  </div>
</div>
</div>
</div>