<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infojugador->result() as $row) 	
 {
 	echo form_open_multipart('jugador/modificarJugDoH');
 ?>

<input type="hidden" name="idjugador" value="<?php echo $row->idjugador;?>">
<input type="hidden" name="desabilitar" value="<?php echo '1';?>">



  <button type="submit" class="btn btn-primary">Habilitar</button>
  <button class="btn btn-primary">Cancelar</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>