<?php
    /** cargar directorio origen */
    function base_url(){
        return BASE_URL;
    }
    /** Cargar los plugins y plantillas */
    function media(){
        return BASE_URL."/Assets";
    }
    /* Para cargar cabeceras */
    function header_admin($data=""){
        $view_hearder = VIEWS."Templates/header_admin.php";
        require_once($view_hearder);
    }
    /** Cargar footer */
    function footer_admin($data=""){
        $view_footer = VIEWS."Templates/footer_admin.php";
        require_once($view_footer);
    }
    /** LLamar a Modales Con Parámetros */
    function getModal(string $nameModal,$data){
        $view_modal = VIEWS."Templates/Modals/{$nameModal}.php";
        require_once($view_modal);
    }
    /** Realizar seguimiento */
    function dep($data){
        $format = print_r('<pre>');
        $format = print_r($data);
        $format = print_r('</pre>');
        return $format;
      }

     function inactividadSesion(){
        // Comprobar si $_SESSION["timeout"] está establecida
        $r = false;
        if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
            $sessionTTL = time() - $_SESSION["timeout"];
            if($sessionTTL > INACTIVIDAD){
                $r = true;
               // session_destroy();
                //header("Location: /logout.php");                
            }
         }
      return $r;    
       
     }


      function limpiarCadena($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = htmlentities(addslashes($data));
		return $data;
     }

    /** Eliminar procesos de inyección */
    function strClean($strCadena){
        //$string = preg_replace(['/\s+','/^\s|\s$/'],[' ',''],$strCadena );
        $string = trim($strCadena);
        $string = str_replace("<script>","",$string);
        $string = str_replace("</script>","",$string);
        $string = str_replace("<script scr>","",$string);
        $string = str_replace("<script type>","",$string);
        $string = str_replace("SELECT * FROM","",$string);
        $string = str_replace("DELETE FROM","",$string);
        $string = str_replace("INSERT INTO","",$string);
        $string = str_replace("SELECT COUNT(*) FROM","",$string);
        $string = str_replace("DROP TABLE","",$string);
        $string = str_replace("OR '1'='1'","",$string);
        $string = str_replace('OR "1"="1"',"",$string);
        $string = str_replace('OR "1"="1"',"",$string);
        $string = str_replace("IS NULL, --","",$string);
        
        $string = str_ireplace("--","",$string);
        $string = str_replace("^","",$string);
        $string = str_replace("[","",$string);
        $string = str_replace("]","",$string);
        
        //Sanitizacion
        $string = strip_tags($string);
        //Evitar ingresar link dentro de comentarios
         $string = stripslashes($string);
         //Proteger la integridad de datos
		$string = htmlspecialchars($string);
        $string = htmlentities(addslashes($string));
        return $string;
    }

    /** Generador de password automático */
    function passGenerador($Length = 10)
    {
        $longitudPass = $Length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVXYXZabcdefghijklmnopqrstuvxyz1234567890.#%&!$?";
        $longitudCadena = strlen($cadena);
        $pass= "";
        for ($i=1; $i < $longitudPass ; $i++) {
            $pos = rand(0, $longitudCadena-1);
            $pass .= substr($cadena, $pos,1);
        }

        return $pass;
    }
    /** token para usar en las claves */
    function token (){
        $r1  = bin2hex(random_bytes(10));
        $r2  = bin2hex(random_bytes(10));
        $r3  = bin2hex(random_bytes(10));
        $r4  = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }
    /** Dar formato a los valores númericos */
    function formatMoney($cantidad){
        $cantidad = SMONEY.number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }

    /** Validar valores Requeridos */
    function validaRequerido($nombreCampo,$data){
        $aresultado = "";
        if (trim($data) == '') {
             $aresultado =  $nombreCampo." es Requerido ";            
        }
        return  $aresultado;
     }
     
     /** Validar Solo Letras */
     function  validaLetras($nombreCampo,$data)
     {   $aresultado = "";     
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
		if (preg_match($patron_texto, $data) == FALSE){
            $aresultado =  $nombreCampo." solo puede ir letras y espacios ";            
        }
        return $aresultado;
     } 

     function validaEntero($nombreCampo, $data)
     {   $aresultado = ""; 
         if (!filter_var($data, FILTER_VALIDATE_INT)) {
             $aresultado =  $nombreCampo." solo puede ir números ";                         
         }
         return $aresultado;
     }

     function validaEmail($nombreCampo, $data)
     {
        $aresultado = "";  
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)){
             $aresultado =  $nombreCampo." solo puede ir números ";                      
         }     
         return $aresultado;
     }

    function validaFloat($nombreCampo, $data, &$aErrores){
     $aresultado = ""; 
     if(!filter_var($data,FILTER_VALIDATE_FLOAT)){
        $aresultado =  $nombreCampo." solo puede ir números ";         
        }
        return $aresultado;
    }

    



?>