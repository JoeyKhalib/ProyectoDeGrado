 <nav class="main-header navbar navbar-expand  navbar-dark navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      </li>
      <li class="nav-item d-none d-sm-inline-block">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo del ADMINTEMPLATE -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url();?>adminlte/dist/img/SpeedAndGOAL.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SpeedAndGoal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline ">
        <div class="input-group " data-widget="sidebar-search">
          <input class="form-control form-control-sidebar-seccundary " type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar ">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

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

              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/entrenador/test" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visualizar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/entrenador/modificar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar</p>
                </a>
              </li>
              <li class="nav-item">
                <?php 
                     echo form_open_multipart('entrenador/logout');
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
              <i class="nav-icon fas fa-futbol"></i>
              <p>
                Jugadores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/jugador/opciones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestionar Jugador</p>
                </a>
              </li>
                 <li class="nav-item">
                <?php 
                     echo form_open_multipart('/agregar');
                  ?>
                  <button class="nav-link btn btn-primary-outline text-left">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Listar Jugadores</p>
                  </button>
                   <?php 
                      echo form_close();
                      ?>    
              </li>
                 <li class="nav-item">
                <?php 
                     echo form_open_multipart('/agregar');
                  ?>
                  <button class="nav-link btn btn-primary-outline text-left">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Impresion Jugadores</p>
                  </button>
                   <?php 
                      echo form_close();
                      ?>    
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Material Deportivo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Material deportivo</p>
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