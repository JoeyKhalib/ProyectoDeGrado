<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subir Fotografia del Curso</h1>


  <?php 
echo form_open_multipart('cursos/subir');
?>
<input type="hidden" name="idcursos" value="<?php echo $idcursos;?>">
<input type="file" name="userfile">
<button type="submit" class="btn btn-primary btn-xs">Subir</button>
<?php 
 echo form_close();
 ?>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  </div>
