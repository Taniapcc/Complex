<?php
    require_once '../config/Conexion.php';
    $conn = new Conexion();
    if ($conn){
        echo "conexin";
        $clavea = "clave.123";
        $clavehash = hash("SHA256", $clavea);
        $sql = "UPDATE usuario SET clave = '$clavehash'";

        Conexion::ejecutarConsulta($sql);
      

    } else{
        echo ("no");
    }

?>