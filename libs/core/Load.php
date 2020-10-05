<?php
    // verifica si existe clase o el metodos 

   $controllerFile = "controller/".$controller.".php";
   if(file_exists($controllerFile)){
        require_once($controllerFile);
        $controller = new $controller();
        if(method_exists($controller,$method)){
            $controller ->{$method}($params);
        } else{
            require_once("controller/Error.php");
            echo ("no existe metodo");
        }

    }else{
            require_once("controller/Error.php");
            echo ("no archivo controller");
    }

?>