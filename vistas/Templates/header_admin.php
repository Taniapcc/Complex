<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name = "description" content="Tienda Ecolac">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $data["tag_page"] ;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name ="author" content = "Tania Cueva Castillo">
  <!-- Definir color de la barra -->
  <meta name ="theme-color" content = "#00000"> 
  <link rel="shortcut icon" href="<?php echo media();?>/img/favicon.ico"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo media();?>/plugins/fontawesome-free/css/all.min.css"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href= "<?php echo media();?>/css/adminlte.min.css">
  <link rel="stylesheet" href= "<?php echo media();?>/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php require_once ("nav_admin.php");   ?>



