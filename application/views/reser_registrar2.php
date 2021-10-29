

              
<div class="form-group">
    
<?php 
$indice=1;
foreach ($canchitas->result() as $row) {
 ?>
        <div class="form-row">
        <div class="form-row">
          <div class="col">
        <label for="">Descripcion:</label>
        <textarea disabled class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"><?php echo $row->descripcion;?></textarea>
        </div>
        <div class="col">
        
          <img src="<?php echo base_url(); ?>uploads/canchaFotos/<?php echo $row->foto;?>"class="img-thumbnail img-fluid">
        </div>
        </div>
        <div class="col">
        <label for="">Numero de Referencia:</label>
        <input type="number" class="form-control" value="<?php echo $row->numero;?>" disabled>
        </div>
         <div class="col">
        <label for="">Nombre de la cancha</label>
        <input type="text" class="form-control" value="<?php echo $row->nombre;?>" disabled>
        </div>
        </div>
         <input type="hidden" name="idcanchas" value="<?php echo $row->idcanchas;?>">
  </div>

    <?php
 $indice++;
}
 ?>                

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Registrar</button>
                </div>
               
                 
 </div>
                <?php 
echo form_close();
?>

      </div>
  </div>
</div>
</div>
</div>