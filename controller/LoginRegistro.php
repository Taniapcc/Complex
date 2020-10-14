<?php

class LoginRegistro extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }

    /** Aqui empieza los métodos */
  
    function loginRegistro(){
         //llamar al metodo de la clase View
        $data['page_id'] = 4;
        $data['tag_page'] = "Registro Login -  Tienda Virtual ";
        $data['page_title'] = "Registro Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Registro Login";
        //llamado a la vista
        $this->views->getViews($this, "loginRegistro", $data);
    }
   
     function insertar (){       
        //llamar al metodo de la clase View

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
            if (trim($email=="")) {
                array_push($errores, "Email  es requerido");
            }
            if (trim($codPostal =="")) {
                array_push($errores, "Código Postal  es requerido");
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
                 
              if (count($errores)==0) {
                /**  
                 * Insertar datos 
                 * */    
                $r = $this -> model->insertar($data);    
            
                           
                 if($r){
                 /**  
                 * Bienvenida
                 * */
                        //print "Se insertó correctamente el registro ";
                        $data['tag_page'] = "Bienvenida  ";
                        $data['page_title'] = "Bienvenida <small> Tienda Virtual </small>";
                        $data['page_name'] = "Bienvenida";
                        $data['color'] = "bg-primary";
                        $data['classbtn'] = "btn btn-primary";
                        $data['name_boton'] = "iniciar";
                        $data['url'] = base_url();
                        $data['texto'] = "En nombre de nuestra empresa te damos la más sincera bienvenida a nuestra tienda virtual
                        .<br><br>El objetivo principal de este canal de comunicación es la venta .<br><br>Desde 1999 nuestra empresa inicia sus actividades con idea sencilla la cual se ha desarrollado en el tiempo.<br><br>Sólo nos queda desearles un agradable experiencia en nuestra tienda.<br><br>Atentamente: Gerente General";

                         $this->views->getViews($this, "mensaje", $data);
                                         
                } else {
                        //print "No se insertó el registro";

                        $data['tag_page'] = "Error  ";
                        $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                        $data['page_name'] = "Error";
                        $data['color'] = "bg-danger";
                        $data['classbtn'] = "btn btn-danger";
                        $data['name_boton'] = "regresar";
                        $data['url'] = base_url()."/LoginRegistro";
                        $data['texto'] = "Existió un error en el registro, posiblemente el correo ya existe.";
                        $this->views->getViews($this, "mensaje", $data);
                }
           
        } else {  
                /**  Desplegar información de errores  */
                
                $data['page_id'] = 4;
                $data['tag_page'] = "Registrar Cuenta  ";
                $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
                $data['page_name'] = "Registrar Cuenta";
                $data['errores'] = $errores;
                //llamado a la vista              
                $this->views->getViews($this, "loginRegistro", $data);
          }
        }   
         else {
            $data['page_id'] = 4;    
            $data['tag_page'] = "Registrar Cuenta  ";
            $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
            $data['page_name'] = "Registrar Cuenta";
            //llamado a la vista            
            $this->views->getViews($this, "loginRegistro", $data);
        }   
               
    }
    
  
}

?>