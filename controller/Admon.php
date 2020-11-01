<?php
/**
 * Controlodar que maneja la plantilla de administradores
 */
class Admon extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function admon(){
        //llamar al metodo de la clase View
        $data['tag_page'] = "Admon";
        $data['page_title'] = "Login Administrador";
        $data['page_name'] = "Login Administrador";
       
        //llamar a la vista que queremos ver        
        $this->views->getViews($this,"admon",$data);
    }

    function validaCorreo ($email){
     $data = $this->model->validaCorreo($email);
     
     return $data;
    }

   function infoCorreo($email){
    $data = $this->model->infoCorreo($email);
    return $data;
    }

   function verifica(){
      $errores = array();
      
      if ($_SERVER['REQUEST_METHOD']=="POST") {
          //valido variables del formulario
          $usuario= isset($_POST["usuario"])? strClean($_POST["usuario"]) :"";
          $pass= isset($_POST["password"])? strClean($_POST["password"]) :"";
         // Rescatar variables
          $data['usuario'] = $usuario;
          //$data['password'] = $password;  
         // Validar informacion

         if ($usuario=="") {
                array_push($errores,"El email es requerido");
            }
        if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
                array_push($errores,"El email electrónico no es válido");
            }
        if ($pass=="") {
                array_push($errores,"El password es requerido");
            } 
         
         if (count($errores)==0) {

            $r= false;

            $arrData['usuario'] = $usuario;
            $arrData['pass'] = $pass;
            $r = $this->model->validaCorreo($arrData);

            // if ($this->model->validaCorreo($usuario) ) {
            if($r){    
                 # code...
                // obtener toda la información del usuario
                // en este caso es el correo de la vista login
                //$data = $this->model->infoCorreo($usuario);

                $data = $this->model->infoCorreo($usuario);
                $data ['usuario'] = $usuario;
                $data ['timeout'] = time();

                $sesion = new Sesion;
                $sesion -> iniciarLogin($data);  
                  //INGRESAR AL PORTAL de Administracion

                  header("location:".base_url()."/Dashboard");

             } else {
                 //No Existe usuario regresa al logearse
                array_push($errores  ,"El usuario no existe");
                $data['tag_page'] = "Administrador ";
                $data['page_title'] = "Administrador - <small> Tienda Virtual </small>";
                $data['page_name'] = "Administrador Cuenta";
                $data['errores'] = $errores;
                $data['datos'] = $data;
                //llamado a la vista              
                $this->views->getViews($this,"admon", $data); 
                
             } // fin valida Correo
          
            } else{
                // Existe errores en el ingreso de información
                // debe loguearse 

                $data['tag_page'] = "Admon";
                 $data['page_title'] = "Login Administrador";
                $data['page_name'] = "Login Administrador";
                $data['errores'] = $errores;
                   //llamado a la vista              
                $this->views->getViews($this,"admon", $data);
            } // errores
      }else{
            // otro tipo de obtencion de datos

            $data['tag_page'] = "Admon";
            $data['page_title'] = "Login Administrador";
            $data['page_name'] = "Login Administrador";
            $data['errores'] = $errores;
                    //llamado a la vista              
            $this->views->getViews($this,"admon", $data);


      }//fin SERVER
  

    } // fin verifica

}

?>

