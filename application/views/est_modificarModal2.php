





 <?php 
          echo form_open_multipart('usuario/modificar');
        ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                 Modificar
                </button>       
    <?php 
          echo form_close();
         ?>




<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             

       <form>
        <div class="row g-3">
           <div class="col-12">
              <label for="inputAddress2" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" name="nombreCompleto" value="<?php echo $row->nombreCompleto;?>">
            </div>
        </div>



           <div class="col-md-6">
             <label for="inputEmail4" class="form-label">Fecha de Nacimiento</label>
             <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $row->fechaNacimiento;?>">
           </div>


            <div class="col-md-6">
               <label for="inputPassword4" class="form-label">Email</label>
               <input type="email" class="form-control" name="email"  aria-describedby="helpId" value="<?php echo $row->email;?>">
             </div>

              <div class="form-group">
    <label for="rol">Seleccione el Rol</label>
    <select class="form-control" name="rol" value="<?php echo $row->rol;?>">
      <option>Usuario</option>
      <option>Administrador</option>
      <option>Entrenador</option>
      <option>Padre</option>
    </select>
  </div>



        </form>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

