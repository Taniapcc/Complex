<?php

class LoginRegistro extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }

    /** Aqui empieza los métodos */
  
    public function loginRegistro(){
         //llamar al metodo de la clase View
        $data['page_id'] = 4;
        $data['tag_page'] = "Registro Login -  Tienda Virtual ";
        $data['page_title'] = "Registro Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Registro Login";
        //llamado a la vista
        $this->views->getViews($this, "loginRegistro", $data);
    }

    /* Listar registros */

    public function listar(){
        $data = $this->model->listar();
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
       }

    public function insertar (){       
        //llamar al metodo de la clase View

        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $errores = array();          
            $cedula = isset($_POST["cedula"])? $_POST["cedula"] :"";
            $nombre = isset($_POST["nombre"])? $_POST["nombre"] :"";
            $ciudad = isset($_POST["ciudad"])? $_POST["ciudad"] :"";
            $direccion = isset($_POST["direccion"])? $_POST["direccion"] :"";
            $telefono = isset($_POST["telefono"])? $_POST["telefono"] :"";
           
            $email= isset($_POST["email"])? $_POST["email"] :"";
            $clave1 = isset($_POST["clave1"])? $_POST["clave1"] :"";
            $clave2 = isset($_POST["clave2"])? $_POST["clave2"] :"";
            $ciudad = isset($_POST["ciudad"])? $_POST["ciudad"] :"";
            $login = isset($_POST["login"])? $_POST["login"] :"";         
            $codPostal = isset($_POST["codPostal"])? $_POST["codPostal"] :"";

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
                
                //print "Dar de alta los datos";
                //dep($data);
               // $r= $this->addRegistro($data);
                $r = $this -> model->insertar($data);
                
               // insertar($data);
                 if($r){
                        print "Se insertó correctamente el registro ";
                } else {
                        print "No se insertó el registro";
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


   



    public function LoginRegistro2(){
        //llamar al metodo de la clase View

        //llamar al metodo de la clase View
        $data['page_id'] = 4;
        $data['tag_page'] = "Login -  Tienda Virtual ";
        $data['page_title'] = "Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Login";     
        //llamado a la vista      
        $this->views->getViews($this,"loginRegistro",$data);

       
       if ($_SERVER['REQUEST_METHOD']=="POST") {
          
            $errores = array();          
            $cedula = isset($_POST["cedula"])? $_POST["cedula"] :"";
            $nombre = isset($_POST["nombre"])? $_POST["nombre"] :"";
            $ciudad = isset($_POST["ciudad"])? $_POST["ciudad"] :"";
            $direccion = isset($_POST["direccion"])? $_POST["direccion"] :"";
            $telefono = isset($_POST["telefono"])? $_POST["telefono"] :"";
           
            $email= isset($_POST["email"])? $_POST["email"] :"";
            $clave1 = isset($_POST["clave1"])? $_POST["clave1"] :"";
            $clave2 = isset($_POST["clave2"])? $_POST["clave2"] :"";
            $ciudad = isset($_POST["ciudad"])? $_POST["ciudad"] :"";
            $usuario = isset($_POST["usuario"])? $_POST["usuario"] :"";         
            $codPostal = isset($_POST["codPostal"])? $_POST["codPostal"] :"";

            // rescatar información del formulaio
            $data['cedula'] = $cedula;
            $data['nombre'] = $nombre;
            $data['ciudad'] = $ciudad;
            $data['direccion'] = $telefono;
            $data['email'] = $email;
            $data['clave1'] = $clave1;
            $data['clave2'] = $clave2;
            $data['usuario'] = $usuario;
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
            if (trim($usuario=="")) {
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
                
                print "Dar de alta los datos";
                dep($data);

               
                 
                /*$r =$this->modelo->insertarRegistro($data);

             
           
              
                if($r){
                print "Se insertó correctamente el registro ";
                } else {
                print "No se insertó el registro";
                }*/

               
             

              

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

    function olvido(){
        print "Hola desde el olvido";
      }


     

     


}

?>