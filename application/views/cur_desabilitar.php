<div class="container">
  <div class="row">
    <div class="col-md-12">
 
<?php 
foreach ($infocurso->result() as $row) 	
 {
 	echo form_open_multipart('cursos/modificarCurDoH');
 ?>

<input type="hidden" name="idcursos" value="<?php echo $row->idcursos;?>">
<input type="hidden" name="desabilitar" value="<?php echo '0';?>">



  <button type="submit" class="btn btn-primary">Eliminar Curso</button>
  <button class="btn btn-primary">Cancelar</button>


<?php 
echo form_close(); 
}
?>


  	</div>
  </div>
</div>