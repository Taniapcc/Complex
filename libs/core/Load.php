<?php
    // verifica si existe clase o el metodos 
    $controller = ucwords($controller);

   $controllerFile = "controller/".$controller.".php";
   if(file_exists($controllerFile)){
        require_once($controllerFile);
        $controller = new $controller();
        if(method_exists($controller,$method)){
            $controller ->{$method}($params);
        } else{
            require_once("controller/error.php");
            echo ("no existe metodo");
        }

    }else{
            require_once("controller/error.php");
            echo ("no archivo controller");
    }

?>