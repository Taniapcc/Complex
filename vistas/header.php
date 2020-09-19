<?php
if (strlen(session_id()) < 1) 
  session_start();
?>

<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ECVentas | www.ecolac.com</title> 
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="vaca" href="../public/img/vaca.png">
    <link rel="shortcut icon" href="../public/img/vaca.ico"> 

       <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>EC</b>VT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ECOLAC</b>Ventas</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="../public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen'];   ?>" class="user-image" alt="User Image"> 
                  <span class="hidden-xs"> <?php echo $_SESSION['nombre'];   ?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen'];   ?>" class="img-circle" alt="User Image">
                    <p> www.ecolac.com - Empresa Lechera 
                      <small><?php echo $_SESSION['tienda'];   ?></small>
                    </p>
                  </li>
              
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../controller/usuario.php?op=salir" class="btn btn-success btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php
             if ($_SESSION['escritorio'] == 1){
                echo '<li>
                <a href="#">
                  <i class="fa fa-tasks"></i> <span>Escritorio</span>
                </a>
              </li>';
             } 
            ?>

            <?php
            if ($_SESSION['admin']==1){
                echo '<li class="treeview">
                <a href="#">
                  <i class="fa fa-cog"></i> <span>Admin</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                  <ul class="treeview-menu">
                  <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                  <li><a href="rol.php"><i class="fa fa-circle-o"></i> Roles</a></li>
                  <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                  <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorías</a></li>
                  <li><a href="presentacion.php"><i class="fa fa-circle-o"></i> Presentacion</a></li>
                  <li><a href="medida.php"><i class="fa fa-circle-o"></i> Medida</a></li>
                  <li><a href="tienda.php"><i class="fa fa-circle-o"></i> Tienda</a></li>
                  <li><a href="tablas.php"><i class="fa fa-circle-o"></i> Tablas</a></li>
                </ul>
               </li>';
            } 
            ?>

            <?php
            if ($_SESSION['administrador']==1){
                echo '<li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Administrador</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    
                    <li><a href="producto.php"><i class="fa fa-circle-o"></i> Producto</a></li>
                    <li><a href="bodega.php"><i class="fa fa-circle-o"></i> Bodega</a></li>
                </ul>
              </li>';
            } 
            ?>

            <?php
              if ($_SESSION['ventas']==1){
                  echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-calculator"></i>
                    <span>Ventas</span>
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
                    <li><a href="cliente.php"><i class="fa fa-circle-o"></i>Cliente</a></li>
                    <li><a href="mapa.php"><i class="fa fa-circle-o"></i>Mapas</a></li>
                   </ul>
                </li>';
              } 
            ?>

            <?php
              if ($_SESSION['repartidor']==1){
                  echo '<li classrepartidor="treeview">
                  <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Repartidor</span>
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="repartidor.php"><i class="fa fa-circle-o"></i> Despachar</a></li>
                  </ul>
                </li>';
              } 
            ?>

            <?php
              if ($_SESSION['pedidos']==1){
                  echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Pedidos</span>
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="catalogo.php"><i class="fa fa-circle-o"></i> Pedidos</a></li>
                    <li><a href="catalogoDetalle.php"><i class="fa fa-circle-o"></i> Registro</a></li>
                  </ul>
                </li>';
              } 
            ?>

            <?php
              if ($_SESSION['consultap']==1){
                  echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>Consulta Pedidos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="consultapedidos.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
                  </ul>
                </li>';
              } 
            ?> 
            
            <?php
              if ($_SESSION['consultav']==1){
                  echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="ventasfechacliente.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>                
                  </ul>
                </li>';
              } 
            ?> 
             
                      
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
