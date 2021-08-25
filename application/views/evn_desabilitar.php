<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infoevento->result() as $row) 	
 {
 	echo form_open_multipart('evento/modificarEvnDoH');
 ?>

<input type="hidden" name="idevento" value="<?php echo $row->idevento;?>">
<input type="hidden" name="desabilitar" value="<?php echo '0';?>">



  <button type="submit" class="btn btn-primary">Eliminar Evento</button>
  <button class="btn btn-primary">Cancelar</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>