<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infousuario->result() as $row) 	
 {
 	echo form_open_multipart('usuario/modificarbdDoH');
 ?>

<input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>">
<input type="hidden" name="desabilitar" value="<?php echo '0';?>">



  <button type="submit" class="btn btn-primary">Desabilitar</button>
  <button class="btn btn-primary">Cancelar</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>