<!-- Navbar -->

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="navbar-brand">
            <img src="<?php echo media(); ?>/img/VacaLogo.png" alt="Ecolac Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Ecolac</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/Catalogo" class="nav-link">Productos</a>
                </li>
                                
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/LoginRegistro" class="nav-link">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/LoginCambiar/cambiar/2" class="nav-link">CambiarPassword</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/Login" class="nav-link">Ingresar</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/Admon" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/Logout " class="nav-link">Salir</a>
                </li>
                
            </ul>
                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                  
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-cart-plus fa-lg"></i>
                            <span class="badge badge-warning navbar-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">2 Notifications</span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                     class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
 <body class="hold-transition layout-top-nav">
<div class="wrapper
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> SuperMarket <small>Ecolac</small></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                               <!-- <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>-->
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <?php
    if (isset($data['errores'])){
       // dep($data['nombre']);
            
         if ( count($data['errores'])>0){
             print "<div class= 'alert alert-danger mt-3'>";
             foreach ($data['errores'] as $key => $valor) {
                 print "<strong> *.$valor. </strong> <br>";
             }
             print "</div>";
         }
        }//

?>