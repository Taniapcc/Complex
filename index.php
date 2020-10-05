<?php

//Tienda Virtual en PHP, MySql, POO, PDO, MVC (Enviar datos al Controlador)
//Abel OS
//https://www.youtube.com/watch?v=O2By5jlvVVs

    require_once('config/dirs.php');
    $url = !empty($_GET['url']) ? $_GET['url']:'home/home' ;
    //convertir a array Abel os
    $arrurl = explode("/",$url);
    $controller = $arrurl[0];
    $method = $arrurl[0];
    $params ="";

    // identificando metodo

   if (!empty($arrurl[1])) {
       # code...
       if ($arrurl[1] != "") {
           # code...
           $method =$arrurl[1];
       }
   }

   // capturando parámetros
   if (!empty($arrurl[2])) {
    # code...
    if ($arrurl[2] != "") {
        # code...
        for ($i=2; $i < count($arrurl) ; $i++) { 
            # code...
            $params .= $arrurl[$i]. ',';
        }  
        $params = trim($params,',');  

    }
    }
    // realizar la auto carga
    require_once("libs/core/Autoload.php");
    require_once("libs/core/Load.php");
?>