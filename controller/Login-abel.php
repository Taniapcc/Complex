<?php

class Login extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function login(){
        //llamar al metodo de la clase View
        $data['page_id'] = 3;
        $data['tag_page'] = "Login -  Tienda Virtual ";
        $data['page_title'] = "Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Login";


      
        //llamado a la vista      
        $this->views->getViews($this,"login",$data);
    }

    function olvido(){
        print "Hola desde el olvido";
      }

     function registro(){

        $errores = array();

        if ($_SERVER['REQUEST_METHOD']=="POST") {
          $cedula = isset($_POST["cedula"])?$_POST["cedula"]:"";
          $nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
          $ciudad = isset($_POST["ciudad"])?$_POST["ciudad"]:"";
          $direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
          $telefono = isset($_POST["telefono"])?$_POST["telefono"]:"";
          $email = isset($_POST["correo"])?$_POST["correo"]:"";
          $clave1 = isset($_POST["clave1"])?$_POST["clave1"]:"";
          $clave2 = isset($_POST["clave2"])?$_POST["clave2"]:"";
          $direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
          $codigopostal = isset($_POST["codigopostal"])?$_POST["codigopostal"]:"";
          $pais = isset($_POST["pais"])?$_POST["pais"]:"";
          $usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
          //Validación Requerido

         
          if ($cedula=="") {
            array_push($errores,"El cedula es requerido");
          }
          if ($nombre=="") {
            array_push($errores,"El nombre paterno es requerido");
          }
          if ($email=="") {
            array_push($errores,"El correo es requerido");
          }
          if ($clave1=="") {
            array_push($errores,"La clave de acceso es requerida");
          }
          if ($clave2=="") {
            array_push($errores,"La clave de acceso es de verificación es requerida");
          }
          if ($direccion=="") {
            array_push($errores,"La direccion es requerida");
          }
                   
          if ($codigopostal=="") {
            array_push($errores,"El código postal es requerido");
          }
          
          if ($clave1!=$clave2) {
            array_push($errores,"Las claves de acceso no coinciden");
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errores,"El correo electrónico no es válido");
          }
          if(count($errores)==0){
            print "Dar de alta los datos";         

          } else {
            $data["errores"] = $errores;
            $this->views->getViews($this,"login",$data);
            var_dump($errores);
            dep($errores);
          }
        } else 
        
        {
        

         /* $datos = [
          "titulo" => "Registro usuario",
          "menu" => false
          ];
          $this->views("loginRegistroVista",$datos);*/
        } 
      }





        




   

}

?>