<?php

class Login extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    
    public function login(){
        //llamar al metodo de la clase View
        if (isset($_COOKIE['datos'])){
            $datos_array = explode("|",$_COOKIE["datos"]);
            $email = $datos_array[0];
            $password = $datos_array[1];
            $data['email'] = $email;
            $data['password'] = $password;
            $data['recordar'] = "on";

        } else {
            $data = [];
        }

        
        $data['tag_page'] = "Login -  Tienda Virtual ";
        $data['page_title'] = "Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Login";     
        //llamado a la vista      
        $this->views->getViews($this,"login",$data);
    }

    function validaCorreo ($email){
        $data = $this->model->validaCorreo($email);
       // dep($data);
         return $data;
   }


  
   
   
   
   
   function verifica(){
        $errores = array();

        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //valido variables del formulario
            $email= isset($_POST["email"])? strClean($_POST["email"]) :"";
            $password= isset($_POST["password"])? strClean($_POST["password"]) :"";
            $recordar = isset($_POST["recordar"])? strClean($_POST["recordar"]) :"";

            // Recuerdame
            $valorCookie = $email."|".$password;

            if ($recordar== "on"){
                $fecha = time() + (60*60*24*7); // semana
            } else {
                $fecha = time()-1;
            }

            setcookie("datos",$valorCookie,$fecha,base_url());

            //////////
            // Rescatar variables
            $data['email'] = $email;
            $data['password'] = $password;
            $data['recordar'] = $recordar;
            
            //Validar informacion
                if ($email=="") {
                array_push($errores,"El email es requerido");
               }
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores,"El email electrónico no es válido");
               }
               if ($password=="") {
                array_push($errores,"El password es requerido");
              }  

              if (count($errores)==0) {

                

                if($this->model->validaCorreo($email)){
                   
                    print "Bienvenido";
                    header("location:".base_url()."/Tienda");

                }else{
                    // Si el correo no existe despliega errro
                    array_push($errores,"El email no existe");
                    $data['tag_page'] = "Login  ";
                    $data['page_title'] = "Login- <small> Tienda Virtual </small>";
                    $data['page_name'] = "Loging Cuenta";
                    $data['errores'] = $errores;
                    $data['datos'] = $data;
                    //llamado a la vista              
                    $this->views->getViews($this,"login", $data);                    
                } 
              }else{
                // Si existe Errorees
                                
                $data['tag_page'] = "Login  ";
                 $data['page_title'] = "Login- <small> Tienda Virtual </small>";
                 $data['page_name'] = "Loging Cuenta";
                 $data['errores'] = $errores;
                 $data['datos'] = $data;
                 //llamado a la vista              
                 $this->views->getViews($this,"login", $data);
         

              }

        }else {

            $data['tag_page'] = "Login  ";
            $data['page_title'] = "Login Cuenta- <small> Tienda Virtual </small>";
            $data['page_name'] = "Login Password";
            $data['errores'] = $errores;
                    //llamado a la vista              
            $this->views->getViews($this,"login", $data);
  
        }// fin server



    }


     
      }


   


?>