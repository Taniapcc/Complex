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
                $usuario = $datos_array[0];
                $password = $datos_array[1];
                $data['usuario'] = $usuario;
                $data['password'] = $password;
                $data['recordar'] = "on";
    
            } else {
                $data = [];
            } 
              
        //} else{

            $data['tag_page'] = "Login -  Tienda Virtual ";
            $data['page_title'] = "Login- <small> Tienda Virtual </small>";
            $data['page_name'] = "Login";     
            //llamado a la vista      
            $this->views->getViews($this,"login",$data);
     //   }
       
    }

    function validaCorreo ($email){
        $data = $this->model->validaCorreo($email);
        return $data;
   }

   function infoCorreo($email){
    $data = $this->model->infoCorreo($email);
    //dep($data);
   return $data;
}
  
    //* Ingresar al sistema   
   function verifica(){
        $errores = array();

        if ($_SERVER['REQUEST_METHOD']=="POST") {

            
            $usuario= isset($_POST["usuario"])? strClean($_POST["usuario"]) :"";
            $password= isset($_POST["password"])? strClean($_POST["password"]) :"";
            $recordar = isset($_POST["recordar"])? strClean($_POST["recordar"]) :"";
            $tipousuario = isset($_POST["tipousuario"])? strClean($_POST["tipousuario"]) :"";

            // Recuerdame
            $valorCookie = $usuario."|".$password;

            if ($recordar== "on"){
                $fecha = time() + (60*60*24*7); // semana
            } else {
                $fecha = time()-1;
            }

            setcookie("datos",$valorCookie,$fecha,base_url());

            //////////
            // Rescatar variables en esta caso el usuario es el email
            $data['usuario'] = $usuario;
            $data['password'] = $password;
            $data['recordar'] = $recordar;
            
            //Validar informacion
                if ($usuario=="") {
                array_push($errores,"El email es requerido");
               }
               if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
                array_push($errores,"El email electrónico no es válido");
               }
               if ($password=="") {
                array_push($errores,"El password es requerido");
              }  

              if (count($errores)==0) {
                

                if($this->model->validaCorreo($usuario)){

                    // obtener toda la información del usuario
                    // en este caso es el correo de la vista login
                          $data = $this->model->infoCorreo($usuario);
                          $data ['usuario'] = $usuario;
                          $data ['timeout'] = time();
                          $data ['tipousuario'] = $tipousuario;
                          
                          //dep($data)  ;             
                          $sesion = new Sesion;
                          $sesion -> iniciarLogin($data);  
                            //INGRESAR AL PORTAL de ventas de  la tienda
                            //print "Bienvenido";

                         header("location:".base_url()."/Catalogo");

                }else{
                    // Si el correo no existe despliega errro
                    array_push($errores,"El usuario no existe");
                    $data['tag_page'] = "Login  ";
                    $data['page_title'] = "Login- <small> Tienda Virtual </small>";
                    $data['page_name'] = "Login Cuenta";
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

            //echo "else server";

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