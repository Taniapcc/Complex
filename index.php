<?php
    require_once('Config/dirs.php');
    require_once('Config/config.php');
    require_once('Helpers/helpers.php');
    //require_once('Libs/Validaciones.php');

    if (isset($_GET['url'])){
       // eliminar caracteres al final
        $url = rtrim($_GET['url'],"/") ;
        $url = rtrim($_GET['url'],"\\") ;
        //QUITAR CARACTERES NO PROPIOS URL
        $url = filter_var($url,FILTER_SANITIZE_URL);
    }
    
    //$url = !empty($_GET['url']) ? $_GET['url']:'home/home' ;

    $url = !empty($url)?$url:'home/home' ;

    //convertir a array 
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
   
    require_once(LIBS."/core/Autoload.php");
    require_once(LIBS."/core/Load.php");
?>