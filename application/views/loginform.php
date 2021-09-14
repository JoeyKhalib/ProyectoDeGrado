<?php

switch ($msg) {
  case '1':
    $mensaje="ERROR DE INGRESO";
    break;
   case '2':
    $mensaje="ACCESO NO VALIDO";
    break;
     case '3':
    $mensaje="GRACIAS POR USAR EL SISTEMA";
    break;
  default:
    $mensaje="INGRESE SUS DATOS";
    break;
}


?>



  <body class="hold-transition login-page" style="background: url(<?php echo base_url();?>imagenes/football4.jpg) no-repeat; background-size: cover; background-attachment: fixed; background-color: #66999;" >




<div class="login-box rounded " >
  
  <!-- /.login-logo -->
  <div class="card bg-dark" >

  <div class="login-logo" >
    <a href="../../index2.html"><b class="font-weight-bold   text-light ">Bienvenidos a Sistema Web de Futbol</b></a>

<br>
    <img src="<?php echo base_url();?>imagenes/Nuevo.jpg"  class="img-circle img-fluid">



   </div> 
 

 

    <div class="card-body login-card-body"  >
    <p class="login-box-msg text-dark font-weight-bold"> <?php echo $mensaje;?></p>


<?php 
echo form_open_multipart('usuario/validarusuario');
?>




        <div class="input-group mb-3" >
          <input type="text" name="nombreUsuario" class="form-control" placeholder="Nombre de Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" ></span>
            </div>
          </div>
        </div>
        
          <div class="row justify-content-center justify-content-md-start">
            <button type="submit" class="btn btn-dark btn-block ">INGRESAR</button>
          </div>
          <!-- /.col -->

     

<?php 
echo form_close();
?>



      <!-- <div class="social-auth-links text-center mb-3">
        <p>- Tambien -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Ingresar con facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Ingresar con Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->