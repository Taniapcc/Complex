<?php
    Session_start();
    require_once "../config/Conexion.php";
    $op = $_REQUEST ['op'];
  
     switch ($op) {
        case 1:
            # code...
           // https://www.youtube.com/watch?v=ALhxavmY7uY&list=PLnWAzeXp9V4l4k4B5mpmAWG8-Gybzxdzl&index=8
           //Listar productos
            unset($_SESSION['lista']);
            $conexion = new Conexion();
            $sql = "SELECT * FROM producto";
            $lista = $conexion->listarMatriz($sql);
            //var_dump($lista);
            $_SESSION ['lista'] = $lista;
            header("Location:../vistas/CatalogoDAO.php");   
           
            break;
        
        default:
            # code...
            break;
    }

?>

