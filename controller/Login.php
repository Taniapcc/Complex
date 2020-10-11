<?php

class Login extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function login(){
        //llamar al metodo de la clase View
        $data['page_id'] = 4;
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
          $nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
          $apellidoPaterno = isset($_POST["apellidoPaterno"])?
          $_POST["apellidoPaterno"]:"";
          $apellidoMaterno = isset($_POST["apellidoMaterno"])?
          $_POST["apellidoMaterno"]:"";
          $email = isset($_POST["email"])?$_POST["email"]:"";
          $clave1 = isset($_POST["clave1"])?$_POST["clave1"]:"";
          $clave2 = isset($_POST["clave2"])?$_POST["clave2"]:"";
          $direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
          $ciudad = isset($_POST["ciudad"])?$_POST["ciudad"]:"";
          $colonia = isset($_POST["colonia"])?$_POST["colonia"]:"";
          $estado = isset($_POST["estado"])?$_POST["estado"]:"";
          $codpos = isset($_POST["codpos"])?$_POST["codpos"]:"";
          $pais = isset($_POST["pais"])?$_POST["pais"]:"";
          //Validación
          if ($nombre=="") {
            array_push($errores,"El nombre es requerido");
          }
          if ($apellidoPaterno=="") {
            array_push($errores,"El apellido paterno es requerido");
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
          if ($ciudad=="") {
            array_push($errores,"La ciudad es requerida");
          }
          if ($colonia=="") {
            array_push($errores,"La colonia es requerida");
          }
          if ($estado=="") {
            array_push($errores,"El estado es requerido");
          }
          if ($codpos=="") {
            array_push($errores,"El código postal es requerido");
          }
          if ($pais=="") {
            array_push($errores,"El país es requerido");
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
            var_dump($errores);
          }
        } else {
          $datos = [
          "titulo" => "Registro usuario",
          "menu" => false
          ];
          $this->vista("loginRegistroVista",$datos);
        } 
      }





        




   

}

?>