<?php
/**
 *   Controlador de Usuarios
 */

class AdmonUsuario extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }


    public function admonUsuario()
    {
        //Iniciar Sesion
        
        $sesion = new Sesion();

            
        if ($sesion->getLogin()) {

            //llamar al metodo de la clase View
            $data['tag_page'] = "Empleado Alta";
            $data['page_title'] = "Alta Empleado";
            $data['page_name'] = "Alta Empleado";
            //llamar a la vista que queremos ver
            $this->views->getViews($this, "admonUsuario", $data);
            //session_destroy();
        } else{
            // Si no ha abiertola sesión regresa
            header("location:".base_url()."/Admon");
           // session_destroy();

        }
    }

    function validaLogin ($login){
        $data = $this->model->validaLogin($login);           
        return $data;
   }

   function validaCorreo ($email){
    $data = $this->model->validaCorreo($email);        
    return $data;
}

   
    function alta(){

        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $errores = array();   
                       
            $cedula = isset($_POST["cedula"])? strClean($_POST["cedula"]) :"";
            $nombre = isset($_POST["nombre"])? strClean($_POST["nombre"]) :"";
            $ciudad = isset($_POST["ciudad"])? strClean($_POST["ciudad"]) :"";
            $direccion = isset($_POST["direccion"])? strClean($_POST["direccion"]) :"";
            $telefono = isset($_POST["telefono"])? strClean($_POST["telefono"]) :"";
           
            $email= isset($_POST["email"])? strClean($_POST["email"]) :"";
            $clave1 = isset($_POST["clave1"])? strClean($_POST["clave1"]) :"";
            $clave2 = isset($_POST["clave2"])? strClean($_POST["clave2"]) :"";
            $ciudad = isset($_POST["ciudad"])? strClean($_POST["ciudad"]) :"";
            $login = isset($_POST["login"])? strClean($_POST["login"]) :"";         
            $codPostal = isset($_POST["codPostal"])? strClean($_POST["codPostal"]) :"";

             // rescatar información del formulaio
             $data['cedula'] = $cedula;
             $data['nombre'] = $nombre;
             $data['ciudad'] = $ciudad;
             $data['direccion'] = $direccion;
             $data['telefono'] = $telefono;
             $data['email'] = $email;
             $data['clave1'] = $clave1;
             $data['clave2'] = $clave2;
             $data['login'] = $login;
             $data['codPostal'] = $codPostal;

             /** 
             * Validar datos en MysQL
             * **/     
            
                   
            if (trim($cedula=="")) {
                array_push($errores, "Cédula  es requerido");
            }
            if (trim($nombre)=="") {
                array_push($errores, "Nombre es requerido");
            }
            if (trim($ciudad)=="") {
                array_push($errores, "Ciudad es requerido");
            }
            if (trim($direccion=="")) {
                array_push($errores, "Dirección  es requerido");
            }

            if (trim($telefono=="")) {
                array_push($errores, "Teléfono  es requerido");
            }
            if (!filter_var($telefono, FILTER_VALIDATE_INT)) {
                array_push($errores," solo puede ir números");                         
            }

            if (trim($email=="")) {
                array_push($errores, "Email  es requerido");
            }
            if (trim($codPostal =="")) {
                array_push($errores, "Código Postal  es requerido");
            }
            if (!filter_var($codPostal, FILTER_VALIDATE_INT)) {
                array_push($errores," solo puede ir números");                         
            }

            if (trim($login=="")) {
                array_push($errores, "Nombre Usuario es requerido");
            }
            if (trim($clave1=="")) {
                array_push($errores, "Password  es requerido");
            }
            if (trim($clave2=="")) {
                array_push($errores, "Retype password  es requerido");
            }
            if ($clave1!=$clave2) {
                array_push($errores,"Las claves de acceso no coinciden");
             }
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores,"El correo electrónico no es válido");
              }
              // Revisa datos en base de datos
            
              if(!($this->validaCorreo($email))){
               array_push($errores,"Correo ya existe");               
            }
             
           
             if(!($this->validaLogin($login))){
                array_push($errores,"Login ya existe");
             } 

             dep($errores);
             dep ($data);
                        
             
             if (count($errores)==0) {
                    
                 $r = $this -> model->alta($data); 

                if ($r) {

                    if (NO_DEPURADOR) {
                        header("location:".base_url()."/AdmonUsuario");
                    }
                }
                else{
                    //actualizar
                    
                   
                    // Hubo algún error
                    $data['tag_page'] = "Error  ";
                        $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                        $data['page_name'] = "Error";
                        $data['color'] = "bg-danger";
                        $data['classbtn'] = "btn btn-danger";
                        $data['name_boton'] = "regresar";
                        $data['url'] = base_url()."/AdmonUsuario";
                        $data['texto'] = "Existió un error en el registro, posiblemente el correo ya existe.";
                       
                       if (NO_DEPURADOR) {
                           $this->views->getViews($this, "mensaje", $data);
                       }
                }
              }
              else {

                 /**  Desplegar información de errores  */
                                             
                 $data['tag_page'] = "Empleado Alta";
                 $data['page_title'] = "Alta Empleado";
                 $data['page_name'] = "Alta Empleado";
                 $data['errores'] = $errores;
                 //llamado a la vista
                
                 $this->views->getViews($this, "AdmonUsuario", $data);
                 
              } 



        }else{

              
            $data['tag_page'] = "Empleado Alta";
            $data['page_title'] = "Alta Empleado";
            $data['page_name'] = "Alta Empleado";
            //llamado a la vista            
            if (NO_DEPURADOR) {
                $this->views->getViews($this, "admonUsuario", $data);
            }   

        }// else SERVER

       
    
    }

   


     




    function baja(){
        print ("baja");
    }

    function cambio(){
        print ("cambio");
    }


}



?>