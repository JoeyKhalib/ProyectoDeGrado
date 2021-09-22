 <nav class="main-header navbar navbar-expand  navbar-dark navbar-light" style="background-color: #17a048">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
      <!-- Navbar Search -->
      <li class="nav-item" >
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
 
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Logo del ADMINTEMPLATE -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     <div class="form-inline">
        <div class="image">
          <a title="Los Tejos" href="http://www.lostejos.com"><img src="<?php echo base_url();?>imagenes/principal.png" class="img-fluid" alt="Responsive image" /></a>
        </div>
         <div class="info">
          <a href="http://www.lostejos.com" class="d-block"><h4 class="text-center">Sistema de Gestion de Escuela De Futbol</h4></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
<hr>

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Perfil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--<li class="nav-item">
                <?php 
                     //echo form_open_multipart('usuario/test');
                  ?>
                  <button class="nav-link btn btn-primary-outline text-left">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Visualizar</p>
                  </button>
                   <?php 
                      //echo form_close();
                      ?>    
              </li>-->
               <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/padre/test" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visualizar</p>
                </a>
              </li>
              <li class="nav-item">
                <?php 
                     echo form_open_multipart('usuario/logout');
                  ?>
                  <button class="nav-link btn btn-primary-outline text-left">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Salir</p>
                  </button>
                   <?php 
                      echo form_close();
                      ?>    
              </li>


</ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Rendimiento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asistencia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seguimiento Academico</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eventos</p>
                </a>
              </li>
            </ul>
          </li>
          



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>